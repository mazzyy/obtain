<?php

namespace App\Http\Controllers;

use App\Models\connections;
use App\Models\User;
use App\Models\deactivate;
use App\Models\location;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class DeactivateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */


    public function index()
    {

        $companyid = Auth::user()->companyid;
        $location = location::where('company_id', $companyid)->get();

        return view('reports.deactivate')->with('location',$location);
    }


    public function update(Request $request, deactivate $deactivate)
    {
        //
        $companyid=Auth::user()->companyid;
        if(connections::where('company_id',$companyid)->where('user_id', $request->input('id'))->exists()){

            $deactivates = new deactivate();
            $deactivates->name =    $request->input('name');
            $deactivates->company_id =   $companyid;
            $deactivates->Customer_id =   $request->input('id');
            $deactivates->address = $request->input('address');
            $deactivates->contact = $request->input('cell');
            $deactivates->leavingDate =  $request->input('ldate');
            $deactivates->otherComments =$request->input('txtcnnComnt');
            $deactivates->sublocality =$request->input('sb');
            $deactivates->leavingReasion =$request->input('browser');
            $deactivates->type =$request->input('tp');
            $deactivates->save();


        }

        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\deactivate  $deactivate
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {

        $lastDate =$request->input('ldate');
        $firstDate=$request->input('fDate');
        $Sublocality=$request->input('sub');
        $Type=$request->input('type');
        $companyid =Auth::user()->companyid;


        if($Sublocality=='All'){
            $Sublocality='';
        }

        if($Type=='All'){
            $Type='';
        }

        DB::enableQueryLog();
        // $report=deactivate::join('locations', 'locations.id', '=', 'deactivate.sublocality')->where('deactivates.company_id',$companyid)->whereBetween('leavingDate', [$firstDate, $lastDate])->where('type','LIKE',"{$Type}%")->where('deactivate.sublocality','LIKE',"{$Sublocality}%")->get();


        $report=deactivate::where('company_id',$companyid)->whereBetween('leavingDate', [$firstDate, $lastDate])->where('type','LIKE',"{$Type}%")->where('sublocality','LIKE',"{$Sublocality}%")->get();



        return  $report;
    }
}
