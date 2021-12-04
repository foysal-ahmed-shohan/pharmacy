<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
      
    }
      

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exp_name = ExpenseName::get();
        $title = 'Expense';
        $icon = 'fa fa-university';
        return view ('account.expense_name', compact('title','exp_name','icon'))->with('no', 1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validator = Validator::make($request->all(), [
            'exp_name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        ExpenseName::create([
            'exp_name'=> $request->get('exp_name')
        ]);
        return redirect()->to('account/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $exp = ExpenseName::find($id);

        $exp->delete();
        return redirect()->to('/account/create');
    }

    ////>>.....end expense name section......<<<<<////

     public function expadd()
        {

       $exp = ExpenseName::orderBy('id', 'desc')->get();
       //return $exp;

       $title = 'Add Expense';
       $icon = 'fa fa-university';
       return view ('account.addexpense', compact('title','icon','exp'))->with('no', 1);
        }




     public function exp_create(Request $request)
        {

       $validator = Validator::make($request->all(), [
            'exp_id' => 'required|max:255',
            'amount' => 'required|max:255',
            'date' => 'required|max:255',
          
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       // return $request->date;
      

        Expense::create([
            'exp_id'=> $request->get('exp_id'),
            'amount'=> $request->get('amount'),
            'date'=> $request->get('date'),
      
        ]);
        return redirect()->to('/account/create');
        }



         public function exp_list()
        {

         $exp = DB::table('expense_names')
        ->join('expenses', 'expense_names.id', '=', 'expenses.exp_id')
        ->get();

       $title = 'All Expense List';
       $icon = 'fa fa-university';
       return view ('account.all_expense', compact('title','icon','exp'))->with('no', 1);
        }



    
    public function d($id)
    {
       //return $id;
        Expense::where('id', $id)->delete();
 

        return redirect()->back();
    }


    public function income()
    {
        $sales=Sales::get()->sum("grand_total");
        $sales_due=SalesDue::get()->sum("due_amount");
        $purchase=Purchase::get()->sum("grand_total");
        $expense=Expense::get()->sum("amount");
        $parchase_due=PurchaseDue::get()->sum("due_amount");
        //return $parchase_due;

       $title = 'All Incomes and Expenses';
       $icon = 'fa fa-university';
       return view ('account.income', compact('title','icon','sales','sales_due','purchase','expense','parchase_due'))->with('no', 1);
    }

}
