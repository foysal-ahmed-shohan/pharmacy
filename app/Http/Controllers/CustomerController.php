<?php

namespace App\Http\Controllers;

use Validator;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::get();
        $title = 'All Customers';
        $icon = 'fa fa-handshake-o';
        return view('customers.index', compact('customers','title','icon'))->with('no', 1);
    }

    public function add() {
        $title = 'Add Customer';
        $icon = 'fa fa-handshake-o';
        return view('customers.add', compact('title','icon'));
    }


    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|max:255',
            'customer_email' => 'email|unique:customers,customer_email|nullable',
            'customer_mobile' => 'min:11|unique:customers,customer_phone|required',
            'manufacturer_address' => 'nullable',
            'manufacturer_balance' => 'nullable',
            'customer_balance' => 'nullable|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Customer::create([
            'customer_name'=> $request->get('customer_name'),
            'customer_email'=> $request->get('customer_email'),
            'customer_phone'=> $request->get('customer_phone'),
            'customer_address'=> $request->get('customer_address'),
            'customer_balance'=> $request->get('customer_balance')
        ]);
        return redirect()->to('/customers');
    }

    public function edit($id) {
        $customer = Customer::findOrFail($id);
        $title = 'Edit Customer';
        $icon = 'fa fa-handshake-o';
        return view('customers.edit', compact('customer','title','icon'));
    }

    public function update($id) {
        $customer = Customer::findOrFail($id);
        $customer->customer_name = request('customer_name');
        $customer->customer_email = request('customer_email');
        $customer->customer_phone = request('customer_phone');
        $customer->customer_address = request('customer_address');
        $customer->save();
        return redirect()->to('/customers');
    }

    public function delete($id) {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->to('/customers');
    }
}
