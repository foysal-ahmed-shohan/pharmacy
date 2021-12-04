<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Manufacturer;
class ManufacturerController extends Controller
{

    public function index() {
        $manufacturers = Manufacturer::get();
        $title = 'All Manufacturers';
        $icon = 'fa fa-building-o';
        return view('manufacturers.index', compact('manufacturers','title','icon'))->with('no', 1);
    }

    public function add() {
        $title = 'Add Manufacturer';
        $icon = 'fa fa-building-o';
    	return view('manufacturers.add', compact('title','icon'));
    }


    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'manufacturer_name' => 'required|max:255',
            'manufacturer_mobile' => 'min:11|unique:manufacturers,manufacturer_mobile|nullable',
            'manufacturer_address' => 'nullable',
            'manufacturer_details' => 'nullable',
            'manufacturer_balance' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    Manufacturer::create([
        'manufacturer_name'=> $request->get('manufacturer_name'),
        'manufacturer_mobile'=> $request->get('manufacturer_mobile'),
        'manufacturer_address'=> $request->get('manufacturer_address'),
        'manufacturer_details'=> $request->get('manufacturer_details'),
        'manufacturer_balance'=> $request->get('manufacturer_balance')
    ]);
        return redirect()->to('/manufacturers');
}

    public function edit($id) {
        $manufacturer = Manufacturer::findOrFail($id);
        $title = 'Edit Manufacturer';
        $icon = 'fa fa-building-o';
        return view('manufacturers.edit', compact('manufacturer','title','icon'));
    }

    public function update($id) {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->manufacturer_name = request('manufacturer_name');
        $manufacturer->manufacturer_mobile = request('manufacturer_mobile');
        $manufacturer->manufacturer_address = request('manufacturer_address');
        $manufacturer->manufacturer_details = request('manufacturer_details');
        $manufacturer->save();
        return redirect()->to('/manufacturers');
    }

    public function delete($id) {
    $manufacturer = Manufacturer::findOrFail($id);
    $manufacturer->delete();
    return redirect()->to('/manufacturers');
}
}
