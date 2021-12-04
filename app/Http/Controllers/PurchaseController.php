<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Purchase;
use App\Purchaseinfo;
use Illuminate\Http\Request;
use Validator;
use App\Bank;
use App\Manufacturer;
use App\Medicine;
use App\Company;
use App\PurchaseDue;
use DB;


class PurchaseController extends Controller
{
    function index()
    {
        $purchases = Purchase::get();
        $title = 'All Purchases';
        $icon = 'fa fa-shopping-basket';
        $ck=0;
        $date=\Carbon\Carbon::today()->format('d-m-Y');
        return view('purchase.index', compact('title','icon', 'purchases','ck','date'))->with('no', 1);
    }
    function add()
    {
         $purchases = Purchase::latest('invoice_no')->first(); 

        $s= $purchases['invoice_no'];
         //return $s;
        if ($purchases['invoice_no']== null ) {
        $s=1001;
        
           $invoice='INV-P-'.$s;
        }

        else {            
        $invoice= $purchases['invoice_no']; 
        //return  $invoice;        
        $str = $invoice;
        //return  $str; 
        $str= preg_replace('/[^0-9]/','',$str);
        //return $str;
        
        $str=$str+1;
        
        $invoice='INV-P-'.$str;
        //return $invoice;
        }



        $manufacturer_id = Manufacturer::orderBy('manufacturer_name', 'asc')->get();
    //    $medicine_id = Medicine::orderBy('product_name', 'asc')->get();
        $bank_id = Bank::orderBy('bank_name', 'asc')->get();
        $title = 'Add Purchase';
        $icon = 'fa fa-shopping-basket';
        return view('purchase.add', compact('title','icon','invoice','manufacturer_id','bank_id'));
    }
    public function addajax(Request $request)
    {
        $medicines = Medicine::where("manufacturer_id",$request->manufacturer_id)
            ->pluck("product_name","id");
        return response()->json($medicines);


    }
    public function addprice(Request $request)
    {
        $data = Medicine::select('manufacturer_price')->where('id',$request->id)->first();
        return response()->json($data);
    }
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'manufacturer_id' => 'required|max:255',
            'purchase_date' => 'required|max:255',
            'invoice_no' => 'required|max:255',
            'details' => 'max:255|nullable',
            'payment_type' => 'required|max:255',
            'bank_id' => 'max:255|nullable',
            'grand_total' => 'required|max:255',
            'medicine_id[]' => 'max:255|nullable',
            'batch_id[]' => 'max:255|nullable',
            'expired_date[]' => 'max:255|nullable',
            'stock_id[]' => 'max:255|nullable',
            'quantity[]' => 'max:255|nullable',
            'rate[]' => 'max:255|nullable',
            'total_price[]' => 'max:255|nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $purchases= new Purchase;
        $purchases->manufacturer_id=$request->manufacturer_id;
        $purchases->purchase_date=$request->purchase_date;
        $purchases->invoice_no=$request->invoice_no;
        $purchases->details=$request->details;
        $purchases->payment_type=$request->payment_type;
        $purchases->bank_id=$request->bank_id;
        $purchases->grand_total=$request->grand_total;

        if($purchases->save()){
            $id=$purchases->id;
            foreach ($request->medicine_id as $key => $v){
            $data = array(
                'purchase_id'=>$id,
                'medicine_id'=>$v,
                'batch_id'=>$request->batch_id [$key],
                'expired_date'=>$request->expired_date [$key],
                'stock_id'=>$request->stock_id [$key],
                'quantity'=>$request->quantity [$key],
                'rate'=>$request->rate [$key],
                'total_price'=>$request->total_price [$key],
            );
            Purchaseinfo::insert($data);
             if ($request->due_amount != 0) {
                    $purchase_due= new PurchaseDue;
                    $purchase_due->invoice_no = $request->invoice_no;
                    $purchase_due->manufacturer_id = $request->manufacturer_id;
                    $purchase_due->due_amount = $request->due_amount;
                    $purchase_due->save();
                }
            }
        }

        return redirect()->to('/purchase');
    }

      public function delete($id) {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        return redirect()->to('/purchase');
    }



    //      public function show($id)
    // {
    //     $purchase=Purchase::where('id',$id)->first();
        
    //      if ($purchase==null){
            
    //         //return 'Post Not found';
    //         return abort(404);


    //      }
         
    //   $title = 'All Purchases';
    //   $icon = 'fa fa-shopping-basket';
    //   return view('purchase.show', compact('title','icon', 'purchase'))->with('no', 1);



    // }



     public function show($id)
    {
        $purchase=purchase::with('manufacturer')->where('id',$id)->first();
        if ($purchase==null){
            return abort(404);
        }
         //dd($purchase);
       $purchaseinfo = Purchaseinfo::where('purchase_id',$id)->get();
        //return $purchase;
        $company=Company::first();
 
        //return $company;
        $title = 'Show';
        $icon = 'fa fa-shopping-cart';
       
        return view('purchase.show', compact('title','icon', 'purchase','purchaseinfo', 'company'))->with('no', 1);
    }



      public function search(Request $request) {
     
       $title = 'All Purchase Results';
       $icon = 'fa fa-shopping-cart';

       $from=$request->from;
       $to=$request->to;
       $from= \Carbon\Carbon::parse($from)->format('Y-m-d');
       $to= \Carbon\Carbon::parse($to)->format('Y-m-d'); 
 
       $ck=1;

        $purchases = DB::table('purchases')->where([ ['created_at', '>=', $from],
         ['created_at', '<=', $to]])->get();
       $manufacturer_id = Manufacturer::orderBy('manufacturer_name', 'asc')->get();
       
       $from=\Carbon\Carbon::parse($from)->format('d M Y');
       $to=\Carbon\Carbon::parse($to)->format('d M Y');

      
        $date=\Carbon\Carbon::today()->format('d-m-Y');
       
       return view('purchase.index', compact('title','icon','purchases','ck','date','from','to'))->with('no', 1);

        //return back();
    }

}
