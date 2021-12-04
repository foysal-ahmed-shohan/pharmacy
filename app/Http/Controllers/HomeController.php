<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\ExpenseName;
use App\Expense;
use App\Sales;
use App\SalesDue;
use App\Customer;
use App\Medicine;
use App\Manufacturer;
use App\Supplier;
use App\Purchase;
use App\PurchaseDue;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $title = 'Dashboard';
        $icon = 'fa fa-dashboard';

        $sales=Sales::get()->sum("grand_total");
        $sales_due=SalesDue::get()->sum("due_amount");
        $purchase=Purchase::get()->sum("grand_total");
        $expense=Expense::get()->sum("amount");
        $parchase_due=PurchaseDue::get()->sum("due_amount");

        $customer=Customer::get()->count();
        $medicine=Medicine::get()->count();
        $manufacturer=Manufacturer::get()->count();
        $supplier=Supplier::get()->count();


       $medicine_all = Medicine::orderBy('id', 'asc')->get();
         $sales_medicine = DB::table('medicines')
        ->join('salesinfos', 'medicines.id', '=', 'salesinfos.medicine_id')
        ->groupBy('medicines.id')
        ->selectRaw('*, sum(quantity) as sum')
        ->get();
         $purchase_medicine = DB::table('medicines')
        ->join('purchaseinfos', 'medicines.id', '=', 'purchaseinfos.medicine_id')
        ->groupBy('medicines.id')
        ->selectRaw('*, sum(quantity) as sum')
        ->get();

        return view('layouts.index', compact('title','icon','sales','sales_due','purchase','expense','parchase_due','customer','medicine','manufacturer','supplier','medicine_all','sales_medicine','purchase_medicine'))->with('no', 1);
    }


}
