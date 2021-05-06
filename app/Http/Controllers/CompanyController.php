<?php

namespace App\Http\Controllers;

use App\Models\company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyid=Auth::user()->companyid;
 
        $company=company::where('id','=',$companyid);

        if($company){
            $company=$company->get();
        }else{
           
        }
        // dd($company[0]);
    //    return view('company.companyProfile')->with('company',$company[0]);
       return view('company.companyProfile')->with('company',$company[0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
    {
        //
        // if (User::where('email', $request->email)->exists()) {
        //     //email exists in user table
        //  }
    // dd($request);
        $ownerid=$request->input('ownerid');
        $name=$request->input('companyName');
        $address=$request->input('address');
        $phone=$request->input('phone');
        $phone2=$request->input('phone2');
        $email=$request->input('email');
        $description=$request->input('description');
        
        $companyid=Auth::user()->companyid;
 
        
        if(company::where('id','=',$companyid)->exists()){
           
            //update
            $company=company::where('id','=',$companyid)->update(['companyName'=>$name,'address'=>$address,'phone1'=>$phone,'phone2'=>$phone2,'email'=>$email,'ownerid'=>$ownerid,'description'=>$description]);
            // $company=company::where('id','=',$companyid)->get();
           
        
        }
      
        $company=company::where('id','=',$companyid)->get()->all();
        // $company=company::find($companyid);
        //  return dd($company);
        return redirect('company')->with('company',$company[0]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        //
    }
}
