<?php

namespace App\Http\Controllers;
use App\Purchase;
use App\Purchaseinfo;
use App\Sales;
use App\Salesinfo;
use App\Medicine;
use DB;

use Illuminate\Http\Request;

class StockController extends Controller
{
     function quantity()
    {
       //  $medicine = Medicine::orderBy('id', 'asc')->get();    
       //  //$medicine= $medicine['id']; 
       //  foreach ($medicine as $medicine) {
       //  	$medicine_id=$medicine->id;
       //  	//echo $medicine->id.'<br>';
       // $sales = Salesinfo::where('medicine_id',$medicine_id );
       // ret

       //  }

   
    $medicine = Medicine::orderBy('id', 'asc')->get();


     $sales = DB::table('medicines')
    ->join('salesinfos', 'medicines.id', '=', 'salesinfos.medicine_id')
    ->groupBy('medicines.id')
    ->selectRaw('*, sum(quantity) as sum')
    ->get();

     $purchase = DB::table('medicines')
    ->join('purchaseinfos', 'medicines.id', '=', 'purchaseinfos.medicine_id')
    ->groupBy('medicines.id')
    ->selectRaw('*, sum(quantity) as sum')
    ->get();
    
    $title = 'All Medicine Stock List';
    $icon = 'fa fa-shopping-cart';
    return view('stock.index', compact('medicine','sales','purchase','title','icon'))->with('no', 1);        
       
    }
}
