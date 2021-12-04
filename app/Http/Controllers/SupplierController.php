<?php

namespace App\Http\Controllers;

use Validator;
use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index() {
        $suppliers = Supplier::get();
        $title = 'All Supplier';
        $icon = 'fa fa-user-plus';
        return view('supplier.index', compact('suppliers','title', 'icon'))->with('no', 1);
    }

    public function add() {
        $title = 'Add Supplier';
        $icon = 'fa fa-user-plus';
        return view('supplier.add', compact('title','icon'));
    }


    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'sup_name' => 'required|max:255',
            'sup_phone' => 'min:11|unique:customers,customer_phone|nullable',
            'sup_address' => 'nullable',
            'sup_details' => 'nullable',
            'sup_balance' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Supplier::create([
            'sup_name'=> $request->get('sup_name'),
            'sup_phone'=> $request->get('sup_phone'),
            'sup_address'=> $request->get('sup_address'),
            'sup_details'=> $request->get('sup_details'),
            'sup_balance'=> $request->get('sup_balance')
        ]);
        return redirect()->to('/supplier');
    }

    public function edit($id) {
        $supplier = Supplier::findOrFail($id);
        $title = 'Edit Supplier';
        $icon = 'fa fa-user-plus';
        return view('supplier.edit', compact('supplier','title','icon'));
    }

    public function update($id) {
        $supplier = Supplier::findOrFail($id);
        $supplier->sup_name = request('sup_name');
        $supplier->sup_phone = request('sup_phone');
        $supplier->sup_address = request('sup_address');
        $supplier->sup_details = request('sup_details');
        $supplier->sup_balance = request('sup_balance');
        $supplier->save();
        return redirect()->to('/supplier');
    }

    public function delete($id) {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->to('/supplier');
    }
}
