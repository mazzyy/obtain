<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\connections;
use App\Models\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;



class UserListController extends Controller
{
    //

    public function index(){


        $companyid = Auth::user()->companyid;
        $location = location::where('company_id', $companyid)->get();

        return view('reports.userlist')
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
        $report=connections::where('company_id',$companyid)->whereBetween('installDate', [$firstDate, $lastDate])->where('connectiontype','LIKE',"{$Type}%")->where('Sublocality','LIKE',"{$Sublocality}%")->orderBy('user_id', 'ASC')->get();
        // dd(DB::getQueryLog());
        return $report;

    }
}
