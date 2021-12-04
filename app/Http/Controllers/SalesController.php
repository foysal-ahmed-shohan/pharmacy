<?php

namespace App\Http\Controllers;

use Validator;
use App\Bank;
use App\Customer;
use App\Medicine;
use App\MedicineUnit;
use App\Purchaseinfo;
use App\Sales;
use App\Salesinfo;
use App\Company;
use Illuminate\Http\Request;
Use \Carbon\Carbon;
use App\SalesDue;
use DB;


class SalesController extends Controller
{
    function index()
    {
        // $p=2;
        // $p=-abs($p);
     
        $sales = Sales::orderBy('id', 'desc')->get();
        //return $sales;
        $customer = Customer::orderBy('customer_name', 'asc')->get();
        $title = 'All Sales';
        $icon = 'fa fa-shopping-cart';
         $ck=0;
         $date=\Carbon\Carbon::today()->format('d-m-Y');
         return view('sales.index', compact('title','icon', 'sales','ck','date'))->with('no', 1);


    }
    function add()
    {   
        $sales = Sales::latest('invoice_no', 'desc')->first(); 
        $s= $sales['invoice_no'];
        if ($sales['invoice_no']== null ) {
        $s=1001;
        //return $s;
           $invoice='INV-'.$s;
        }
        else {            
        $invoice= $sales['invoice_no'];  
        $str = $invoice;
        $str= preg_replace('/[^0-9]/', '',$str);
        $str=$str+1;
        $invoice='INV-'.$str;
        }

        // $medicine = Medicine::orderBy('unit_id', 'asc')->get();
        // return $medicine;

        $customer_id = Customer::orderBy('customer_name', 'asc')->get();
        $medicine_id = Medicine::orderBy('product_name', 'asc')->get();
        $bank_id = Bank::orderBy('bank_name', 'asc')->get();
        $title = 'Add Sales';
        $icon = 'fa fa-shopping-cart';
        return view('sales.add', compact('title','icon','customer_id','bank_id', 'medicine_id','invoice'));
    }
    public function batchID(Request $request)
    {
        $batchid = Purchaseinfo::where("medicine_id",$request->medicine_id)
            ->pluck("batch_id","id");
    
        return response()->json($batchid);
    }
    public function expired(Request $request)
    {
        $data = Purchaseinfo::select('expired_date')->where('id',$request->batch_id)->first();
        return response()->json($data);
    }
    public function unitPrice(Request $request)
    {
        $data = Medicine::all()->where('id',$request->id)->first();
        //$data = MedicineUnit::select('name')->where('id',$request->batch_id)->first();
       return response()->json($data);
    }

    
    public function delete($id) {
        $sales = Sales::findOrFail($id);
        $sales->delete();
        $salesinfo = Salesinfo::where('sales_id',$id);
        $salesinfo->delete();
        return redirect()->to('/sales');
    }


    public function show($id)
    {
        $sales=sales::with('customer')->where('id',$id)->first();
       // return $sales;
        if ($sales==null){
            return abort(404);
        }
        $salesinfo = Salesinfo::where('sales_id',$id)->get();

        $customer = Customer::orderBy('customer_name', 'asc')->get();
        //
        //dd($sales);
        $company=Company::first();
        $title = 'Show';
        $icon = 'fa fa-shopping-cart';
        $data['title']=$title;
        $data['sales']=$sales;
        $data['company']=$company;
        $data['salesinfo']=$salesinfo;
        $data['icon']=$icon;

         return view('sales.show', compact('title','icon', 'sales','company', 'salesinfo','customer'))->with('no', 1);
    }


    public function store(Request $request) {
//return $request->customer_id;
       

        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|integer|max:255',
            'sale_date' => 'required|max:255',
            'invoice_no' => 'required|max:255',
            'details' => 'max:255|nullable',
            'payment_type' => 'required|max:255',
            'bank_id' => 'max:255|nullable',
            'bkash' => 'max:255|nullable',
            'sub_total' => 'required|max:255',
            'invoice_discount' => 'max:255|nullable',
            'total_discount' => 'max:255|nullable',
            'vat' => 'max:255|nullable',
            'tax' => 'max:255|nullable',
            'igst' => 'max:255|nullable',
            'total_tax' => 'max:255|nullable',
            'grand_total' => 'required|max:255',
            'paid_amount' => 'max:255|nullable',
            'due_amount' => 'max:255|nullable',
            'change_amount' => 'max:255|nullable',
            'medicine_id[]' => 'max:255|nullable',
            'batch_id[]' => 'max:255|nullable',
            'available_qty' => 'max:255|nullable',
            'expired_date[]' => 'max:255|nullable',
            'unit_id[]' => 'max:255|nullable',
            'quantity[]' => 'max:255|nullable',
            'price[]' => 'max:255|nullable',
            'discount[]' => 'max:255|nullable',
            'total_amount[]' => 'max:255|nullable',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $saleses= new Sales;
 
        $saleses->customer_id=$request->customer_id;
        $saleses->sale_date=$request->sale_date;
        $saleses->invoice_no=$request->invoice_no;
        $saleses->details=$request->details;
        $saleses->payment_type=$request->payment_type;
        $saleses->bank_id=$request->bank_id;
        $saleses->bkash=$request->bkash;
        $saleses->sub_total=$request->sub_total;
        $saleses->invoice_discount=$request->invoice_discount;
        $saleses->total_discount=$request->total_discount;
        $saleses->vat=$request->vat;
        $saleses->tax=$request->tax;
        $saleses->igst=$request->igst;
        $saleses->total_tax=$request->total_tax;
        $saleses->grand_total=$request->grand_total;
        $saleses->paid_amount=$request->paid_amount;
        $saleses->due_amount=$request->due_amount;
        $saleses->change_amount=$request->change_amount;
      // return $saleses;
        if($saleses->save()){
            $id=$saleses->id;
            foreach ($request->medicine_id as $key => $vl){
                $data = array(
                    'sales_id'=>$id,
                    'medicine_id'=>$vl,
                    'batch_id'=>$request->batch_id [$key],
                    'available_qty'=>$request->available_qty [$key],
                    'expired_date'=>$request->expired_date [$key],
                    'unit_id'=>$request->unit_id [$key],
                    'quantity'=>$request->quantity [$key],
                    'price'=>$request->price [$key],
                    'discount'=>$request->discount [$key],
                    'total_amount'=>$request->total_amount [$key],
                );
                Salesinfo::insert($data);
                if ($request->due_amount != 0) {
                    $sales_dues= new SalesDue;
                    $sales_dues->customer_id = $request->customer_id;
                    $sales_dues->due_amount = $request->due_amount;
                    $sales_dues->save();
                }
            }
        }

        return redirect()->to('/sales');
    }



     public function search(Request $request) {



       $title = 'Sales Result Found';
       $icon = 'fa fa-shopping-cart';

       $from=$request->from;
       $to=$request->to;


       $from= \Carbon\Carbon::parse($from)->format('Y-m-d');
        //return $from;
       $to= \Carbon\Carbon::parse($to)->format('Y-m-d'); 
          //return $to;    
       $ck=1;

       $sales = DB::table('sales')->where([ ['created_at', '>=', $from],
        ['created_at', '<=',  $to]])->get();


       $from=\Carbon\Carbon::parse($from)->format('d M Y');
       $to=\Carbon\Carbon::parse($to)->format('d M Y');

       $date=\Carbon\Carbon::today()->format('d-m-Y');
        return view('sales.index', compact('title','icon','sales','ck','from','to','date'))->with('no', 1);

        
    }

}
