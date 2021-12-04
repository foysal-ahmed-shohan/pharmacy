<?php

namespace App\Http\Controllers;


use Validator;
use App\Medicine;
use App\MedicineCat;
use App\MedicineType;
use App\MedicineUnit;
use App\Manufacturer;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index() {
        $medicine = Medicine::all();
    /*    $medicine_cat = MedicineCat::get();
        $medicine_type = MedicineType::get();
        $medicine_unit = MedicineUnit::get();
        $manufacturer = Manufacturer::get();*/
        $title = 'All Medicine';
        $icon = 'fa fa-medkit';
        return view('medicine.index', compact('medicine', 'title','icon'))->with('no', 1);
    }
    public function add() {
        $medicine_cat = MedicineCat::orderBy('name', 'asc')->get();
        $medicine_type = MedicineType::orderBy('name', 'asc')->get();
        $medicine_unit = MedicineUnit::orderBy('name', 'asc')->get();
        $manufacturer_id = Manufacturer::orderBy('manufacturer_name', 'asc')->get();
        $title = 'Add Medicine';
        $icon = 'fa fa-medkit';
        return view('medicine.add', compact('title', 'icon', 'medicine_cat', 'medicine_type', 'medicine_unit', 'manufacturer_id'));
    }
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'product_name' => 'required|max:255',
            'generic_name' => 'required|max:255',
            'box_size' => 'required|max:255',
            'unit_id' => 'required|max:255',
            'type_id' => 'required|max:255',
            'cat_id' => 'required|max:255',
            'barcode' => 'max:255|nullable',
            'shelf' => 'max:255|nullable',
            'details' => 'max:255|nullable',
            'sell_price' => 'required|max:255',
            'vat' => 'max:255|nullable',
            'tax' => 'max:255|nullable',
            'igst' => 'max:255|nullable',
            'manufacturer_id' => 'required|max:255',
            'manufacturer_price' => 'required|max:255',
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $imageName = time().'.'.request()->images->getClientOriginalExtension();
        request()->images->move(public_path('uploads\medicine'), $imageName);
        // dd($request->all());
        Medicine::create([
            'product_name'=> $request->get('product_name'),
            'generic_name'=> $request->get('generic_name'),
            'box_size'=> $request->get('box_size'),
            'unit_id'=> $request->get('unit_id'),
            'type_id'=> $request->get('type_id'),
            'cat_id'=> $request->get('cat_id'),
            'barcode'=> $request->get('barcode'),
            'shelf'=> $request->get('shelf'),
            'sell_price'=> $request->get('sell_price'),
            'details'=> $request->get('details'),
            'vat'=> $request->get('vat'),
            'tax'=> $request->get('tax'),
            'igst'=> $request->get('igst'),
            'manufacturer_id'=> $request->get('manufacturer_id'),
            'manufacturer_price'=> $request->get('manufacturer_price'),
            'images'=> $imageName,
        ]);
        return redirect()->to('/medicine');
    }
    public function edit($id) {
        $medicine_cat = MedicineCat::orderBy('name', 'asc')->get();
        $medicine_type = MedicineType::orderBy('name', 'asc')->get();
        $medicine_unit = MedicineUnit::orderBy('name', 'asc')->get();
        $manufacturer_id = Manufacturer::orderBy('manufacturer_name', 'asc')->get();
        $medic = Medicine::findOrFail($id);
        $title = 'Edit Medicine';
        $icon = 'fa fa-medkit';
        return view('medicine.edit', compact('medic', 'medicine_cat', 'medicine_type', 'medicine_unit', 'manufacturer_id','title','icon'));
    }
    public function update(Request $request, $id) {
        $medic = Medicine::findOrFail($id);
        if($request->hasfile('images'))
        {
            $imageName = time().'.'.request()->images->getClientOriginalExtension();
            request()->images->move(public_path('uploads\medicine'), $imageName);
        }

        $medic->product_name = request('product_name');
        $medic->generic_name = request('generic_name');
        $medic->box_size = request('box_size');
        $medic->unit_id = request('unit_id');
        $medic->type_id = request('type_id');
        $medic->cat_id = request('cat_id');
        $medic->barcode = request('barcode');
        $medic->shelf = request('shelf');
        $medic->sell_price = request('sell_price');
        $medic->details = request('details');
        $medic->vat = request('vat');
        $medic->tax = request('tax');
        $medic->igst = request('igst');
        $medic->manufacturer_id = request('manufacturer_id');
        $medic->details = request('details');
        $medic->manufacturer_price = request('manufacturer_price');
        $medic->images = $imageName;
        $medic->status = request('status');
        $medic->save();
        return redirect()->to('/medicine');
    }

    public function delete($id) {
        $medic = Medicine::findOrFail($id);
        $medic->delete();
        return redirect()->to('/medicine');
    }
    // Medicine Category
    public function medicine_cat() {
        $medicinecat = MedicineCat::get();
        $title = 'Medicine Category';
        $icon = 'fa fa-medkit';
        return view('medicine.category', compact('medicinecat','title','icon'))->with('no', 1);
    }

    public function cat_store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        MedicineCat::create([
            'name'=> $request->get('name')
        ]);
        return redirect()->to('/medicine/category');
    }

    public function cat_edit($id) {
        $mcat = MedicineCat::findOrFail($id);
        $title = 'Edit Medicine Category';
        $icon = 'fa fa-medkit';
        return view('medicine.cat_edit', compact('mcat','title','icon'));
    }

    public function cat_update($id) {
        $mcat = MedicineCat::findOrFail($id);
        $mcat->name = request('name');
        $mcat->status = request('status');
        $mcat->save();
        return redirect()->to('/medicine/category');
    }

    public function cat_delete($id) {
        $mcat = MedicineCat::findOrFail($id);
        $mcat->delete();
        return redirect()->to('/medicine/category');
    }

// Medicine Type
    public function medicine_type() {
        $medicinetype = MedicineType::get();
        $title = 'Medicine Type';
        $icon = 'fa fa-medkit';
        return view('medicine.type', compact('medicinetype','title','icon'))->with('no', 1);
    }

    public function type_store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        MedicineType::create([
            'name'=> $request->get('name')
        ]);
        return redirect()->to('/medicine/type');
    }

    public function type_edit($id) {
        $mtype = MedicineType::findOrFail($id);
        $title = 'Edit Medicine Type';
        $icon = 'fa fa-medkit';
        return view('medicine.type_edit', compact('mtype','title','icon'));
    }

    public function type_update($id) {
        $mtype = MedicineType::findOrFail($id);
        $mtype->name = request('name');
        $mtype->status = request('status');
        $mtype->save();
        return redirect()->to('/medicine/type');
    }

    public function type_delete($id) {
        $mtype = MedicineType::findOrFail($id);
        $mtype->delete();
        return redirect()->to('/medicine/type');
    }

    // Medicine Unit
    public function medicine_unit() {
        $medicineunit = MedicineUnit::get();
        $title = 'Medicine Unit';
        $icon = 'fa fa-medkit';
        return view('medicine.unit', compact('medicineunit','title','icon'))->with('no', 1);
    }

    public function unit_store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        MedicineUnit::create([
            'name'=> $request->get('name')
        ]);
        return redirect()->to('/medicine/unit');
    }

    public function unit_edit($id) {
        $munit = MedicineUnit::findOrFail($id);
        $title = 'Edit Medicine Unit';
        $icon = 'fa fa-medkit';
        return view('medicine.unit_edit', compact('munit','title','icon'));
    }

    public function unit_update($id) {
        $munit = MedicineUnit::findOrFail($id);
        $munit->name = request('name');
        $munit->status = request('status');
        $munit->save();
        return redirect()->to('/medicine/unit');
    }

    public function unit_delete($id) {
        $munit = MedicineUnit::findOrFail($id);
        $munit->delete();
        return redirect()->to('/medicine/unit');
    }
}
