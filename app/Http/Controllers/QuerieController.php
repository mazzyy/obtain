<?php

namespace App\Http\Controllers;

use App\Models\Querie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class QuerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companyId=Auth::user()->companyid;

        $Queries=Querie::where('company_id',$companyId)->get();

        return view('master.packages.query')->with('Queries',$Queries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
       $name= $request->input('name');
       $number= $request->input('contact');
       $descripition= $request->input('description');
       $company_id=Auth::user()->companyid;

    $Query = new Querie();
    $Query->name=$name;
    $Query->number= $number;
    $Query->description= $descripition;
    $Query->company_id=$company_id;
    $Query->save();





      return $Query;
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
     * @param  \App\Models\Querie  $querie
     * @return \Illuminate\Http\Response
     */
    public function show(Querie $querie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Querie  $querie
     * @return \Illuminate\Http\Response
     */
    public function edit(Querie $querie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Querie  $querie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Querie $querie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Querie  $querie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Querie $querie)
    {
        //
    }
}
