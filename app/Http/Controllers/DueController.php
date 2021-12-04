<?php

namespace App\Http\Controllers;

use Validator;
use App\ExpenseName;
use App\Expense;
use Illuminate\Http\Request;
use App\SalesDue;
use App\PurchaseDue;
use App\Customer;
use App\Sales;
use App\Manufacturer;
use App\Purchase;
use DB;

class DueController extends Controller
{
    
   public function customer()
    {

    $due = DB::table('sales_dues')
        ->join('customers', 'sales_dues.customer_id', '=', 'customers.id')
        ->groupBy('sales_dues.customer_id')
        ->selectRaw('*, sum(due_amount) as sum')
        ->get();
        //return $due;

    $title = 'Customer Due List';
    $icon = 'fa fa-university';
     return view ('sales.customerDue', compact('title','icon','exp','due'))->with('no', 1);
        
    }

    public function show($id)
    {
    

    $title = 'Customer Due List';
    $icon = 'fa fa-university';

    $due = DB::table('sales_dues')
        ->join('customers', 'sales_dues.customer_id', '=', 'customers.id')
        ->groupBy('sales_dues.customer_id')
        ->selectRaw('*, sum(due_amount) as sum')
        ->get();

  //$customer = Customer::orderBy('customer_name', 'asc')->get();
  //return $customer;

    return view ('sales.dueShow', compact('title','icon','due','customer','id'))->with('no', 1);
    
    }


    public function store(Request $request)
    {

    	$amount=-abs($request->amount);
    	$c=$request->customer_id;

		  if ($request->amount <=$request->due ) {
		  	$sales_dues= new SalesDue;
            $sales_dues->customer_id = $request->customer_id;
            $sales_dues->due_amount = $amount;
            $sales_dues->save();
            return redirect()->to('due/CustomerDue');            
        }
    }


    public function total($id){
        $due = DB::table('sales_dues')
        ->join('customers', 'sales_dues.customer_id', '=', 'customers.id')
        ->get();

         $sales = Sales::where('customer_id',$id)->get();
         $name = Customer::where('id',$id)->first();


        $customer = DB::table('sales_dues')
        ->join('customers', 'sales_dues.customer_id', '=', 'customers.id')
        ->groupBy('sales_dues.customer_id')
        ->selectRaw('*, sum(due_amount) as sum')
        ->get();


          $title = 'Customer Due Details';
          $icon = 'fa fa-university';

          return view ('sales.income', compact('title','icon','due','id','sales','name','customer'))->with('no', 1);
    
    }

    /////........start manufacturer.......//////


     public function manufacturer()
    {

    $due = DB::table('purchase_dues')
        ->join('manufacturers', 'purchase_dues.manufacturer_id', '=', 'manufacturers.id')
        ->groupBy('purchase_dues.manufacturer_id')
        ->selectRaw('*, sum(due_amount) as sum')
        ->get();
       // return $due;

    $title = 'Manufacturers Due List';
    $icon = 'fa fa-university';
     return view ('purchase.manufacturerDue', compact('title','icon','exp','due'))->with('no', 1);
        
    }


     public function manushow($id)
    {
    

    $title = 'Manufacturer Due Details';
    $icon = 'fa fa-university';

     $due = DB::table('purchase_dues')
        ->join('manufacturers', 'purchase_dues.manufacturer_id', '=', 'manufacturers.id')
        ->groupBy('purchase_dues.manufacturer_id')
        ->selectRaw('*, sum(due_amount) as sum')
        ->get();

  //$customer = Customer::orderBy('customer_name', 'asc')->get();
  //return $customer;

    return view ('purchase.dueShow', compact('title','icon','due','customer','id'))->with('no', 1);
    
    }


      public function manustore(Request $request)
    {

        $amount=-abs($request->amount);
        $c=$request->manufacturer_id;

          if ($request->amount <=$request->due ) {
            $purchase_dues= new PurchaseDue;
            $purchase_dues->manufacturer_id = $request->manufacturer_id;
            $purchase_dues->due_amount = $amount;
            $purchase_dues->save();
            return redirect()->to('due/ManufacturerDue');            
        }
    }



 public function manutotal($id){
        $due = DB::table('purchase_dues')
        ->join('manufacturers', 'purchase_dues.manufacturer_id', '=', 'manufacturers.id')
        ->get();

         $purchase = PurchaseDue::where('manufacturer_id',$id)->get();
         $invoice = Purchase::where('manufacturer_id',$id)->get();
         $name = Manufacturer::where('id',$id)->first();


        $manufacturer = DB::table('purchase_dues')
        ->join('manufacturers', 'purchase_dues.manufacturer_id', '=', 'manufacturers.id')
        ->groupBy('purchase_dues.manufacturer_id')
        ->selectRaw('*, sum(due_amount) as sum')
        ->get();

        //return $invoice;


          $title = 'Manufacturer Due Details';
          $icon = 'fa fa-university';

          return view ('purchase.duelist', compact('title','icon','due','id','purchase','name','manufacturer','invoice'))->with('no', 1);
    }

    }




//     <!-- 
// @foreach($due as $due)

// @if ($due->customer_id == $id)

// @foreach($sales as $sales)

// @if($sales->due_amount>0)

// <p>{{ $due->due_amount}}    </p>

// <p> </p>
// @endif
// @endforeach
// @endif
// @endforeach
//  -->




// @foreach($sales as $sales)

// @if($sales->due_amount>0)
// <p>{{ $sales->due_amount}}  </p>

// <p> </p>
// @endif
// @endforeach






