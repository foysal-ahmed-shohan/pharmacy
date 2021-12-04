<?php

namespace App\Http\Controllers;

use Validator;
use App\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index() {
        $bank = Bank::get();
        $title = 'All Bank';
        $icon = 'fa fa-university';
        return view('bank.index', compact('bank','title','icon'))->with('no', 1);
    }

    public function add() {
        $title = 'Add Bank';
        $icon = 'fa fa-university';
        return view('bank.add', compact('title','icon'));
    }


    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'bank_name' => 'required|unique:banks,bank_name|max:255',
            'ac_name' => 'required|max:255',
            'ac_no' => 'required|max:255',
            'branch_name' => 'required|max:255',
            'bank_sing' => 'nullable',
            'balance' => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $imageSign = time().'.'.request()->bank_sing->getClientOriginalExtension();
        request()->bank_sing->move(public_path('uploads\bank'), $imageSign);

        Bank::create([
            'bank_name'=> $request->get('bank_name'),
            'ac_name'=> $request->get('ac_name'),
            'ac_no'=> $request->get('ac_no'),
            'branch_name'=> $request->get('branch_name'),
            'bank_sing'=> $imageSign,
            'balance'=> $request->get('balance')
        ]);
        return redirect()->to('/bank');
    }

    public function edit($id) {
        $bank = Bank::findOrFail($id);
        $title = 'Edit Bank';
        $icon = 'fa fa-university';
        return view('bank.edit', compact('bank','title','icon'));
    }

    public function update($id) {
        $imageSign = time().'.'.request()->bank_sing->getClientOriginalExtension();
        request()->bank_sing->move(public_path('uploads\bank'), $imageSign);

        $bk = Bank::findOrFail($id);
        return $bk;
        $bk->bank_name = request('bank_name');
        $bk->ac_name = request('ac_name');
        $bk->ac_no = request('ac_no');
        $bk->branch_name = request('branch_name');
        $bk->bank_sing = $imageSign;
        $bk->save();
        return redirect()->to('/bank');
    }

    public function delete($id) {
        $bk = Bank::findOrFail($id);
        $bk->delete();
        return redirect()->to('/bank');
    }
}
