<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Company;
use Carbon\Carbon;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::get();
        $title = 'Company Profile';
        $icon = 'fa fa-home';
        return view('cominfo.index', compact('company','title','icon'))->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Company Profile';
        $icon = 'fa fa-home';
        return view('cominfo.add', compact('company','title','icon'))->with('no', 1);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $company = new Company();
         $validator = Validator::make($request->all(), [
            'cname' => 'required|max:255',
            'tag' => 'required|max:255',
            'phone' => 'required|max:255',
            'phone2' => 'required|max:255',
            'email1' => 'email|required',
            'email2' => 'nullable',           
            'logo' => 'nullable',
            'address' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
      

        
         $image = time().'.'.request()->logo->getClientOriginalExtension();
        request()->logo->move(public_path('uploads\company'), $image);


        company::create([
            'cname'=> $request->get('cname'),
            'phone'=> $request->get('phone'),
            'tag'=> $request->get('tag'),
            'phone2'=> $request->get('phone2'),
            'logo'=> $image,
            'email1'=> $request->get('email1'),
            'email2'=> $request->get('email2'),
            'address'=> $request->get('address'),
        ]);
        return redirect()->to('/company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //  $bank = Bank::findOrFail($id);
        // $title = 'Edit Bank';
        // $icon = 'fa fa-university';
        // return view('bank.edit', compact('bank','title','icon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $company = Company::findOrFail($id);
        $title = 'Edit Home';
        $icon = 'fa fa-university';
        return view('cominfo.edit', compact('company','title','icon'));
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

        $company = Company::findOrFail($id);
        $slug = str_slug($request->phone);


        if (isset($image)) {

            $currentDate = Carbon::now()->toDateString();
            
            $image_name = $slug.'-'.$currentDate .uniqid(). '.' .$image->getClientOriginalExtension();
            
            unlink('uploads\bank'.$company->logo);
            $image->move('uploads\bank',$image_name);

        }else{
            $image_name = $company->logo;
        }



        
        $company->cname = request('cname');
        $company->phone = request('phone');
        $company->tag = request('tag');
        $company->phone2 = request('phone2');
        $company->email1 = request('email1');
        $company->email2 = request('email2');
        $company->address = request('address');
        
        $company->logo = $image_name;
        $company->save();
        return redirect()->to('/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $company = Company::find($id);
        $company->delete();
        return redirect()->to('/company');
        //return redirect()->back(); 
    }
}
