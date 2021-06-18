<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DefaulterReportController extends Controller
{
    //

    public function index(){

        $companyid = Auth::user()->companyid;
        $location = location::where('company_id', $companyid)->get();

        return view('reports.defaulter')
                    ->with('location',$location);
    }

    public function filter(Request $request){

        $firstDate=$request->input('fDate');
        $lastDate=$request->input('ldate');
        $Type=$request->input('type');
        $Sublocality=$request->input('sub');
        $reportType=$request->input('rtype');
        $companyid = Auth::user()->companyid;

        if($Sublocality=='All'){
            $Sublocality='';
        }

        if($Type=='All'){
            $Type='';
        }

        DB::enableQueryLog();
        // $report=bill::where('companie_id',$companyid)->whereBetween('fullDate', [$firstDate, $lastDate])->where('billType','LIKE',"{$Type}%")->where('sublocalityName','LIKE',"{$Sublocality}%")->where('billStatus','=',"unpaid")->orWhere('billStatus','=',"partial")->groupBy('user_name')->orderBy('user_id', 'ASC')->get(array(DB::raw('internetId,address,sublocalityName,user_name,sum(netAmount) as netA,sum(recevieAmount) as recA')));

        $report=bill::where('companie_id',$companyid)->where('billType','LIKE',"{$Type}%")->where('sublocalityName','LIKE',"{$Sublocality}%")->where('billStatus','=',"unpaid")->orWhere('billStatus','=',"partial")->groupBy('user_name')->orderBy('user_id', 'ASC')->get(array(DB::raw('internetId,address,sublocalityName,user_name,sum(netAmount) as netA,sum(recevieAmount) as recA')));


        return $report;
    }
}
