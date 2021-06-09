<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\customerbillReport;
use App\Models\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CustomerbillReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companyid = Auth::user()->companyid;
        $location = location::where('company_id', $companyid)->get();
        $employees = DB::table('users')->where('companyid', $companyid)->whereBetween('role', [1, 3])->get('name');


        return view('reports.customerbill')->with('location', $location)
                                           ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        //


        $firstDate=$request->input('fdate');
        $lastDate=$request->input('ldate');
        // $reportType=$request->input('reportType');
        $Type=$request->input('type');
        $Sublocality=$request->input('Sublocality');
        $employee=$request->input('employee');
        $status=$request->input('status');
        $sort=$request->input('cmbSort');
        if($sort !='fullDate' && $sort !='user_id' && $sort !='billType' && $sort !='billStatus' && $sort !='sublocality')
        {
            $sort='fullDate';

        }

        $companyid=Auth::user()->companyid;
        $location = location::where('company_id', $companyid)->get();
        $employees = DB::table('users')->where('companyid', $companyid)->whereBetween('role', [1, 3])->get('name');
// return $sort;


        if($Sublocality=='0'){
            $Sublocality='';
        }
        if($employee=='0'){
            $employee='';
        }
        if($Type=='0'){
            $Type='';
        }
        if($status=='0'){
            $status='';
        }
        // return  $sort;
        DB::enableQueryLog(); // Enable query log

// Your Eloquent query executed by using get()




// $report=bill::where('companie_id',$companyid)->whereBetween('fullDate', [$firstDate, $lastDate])->where('sublocalityName','=',$Sublocality)->where('billStatus','=',$status)->where('receviedBy','=',$employee)->where('billType',$Type)->get();

        $report=bill::where('companie_id',$companyid)->whereBetween('fullDate', [$firstDate, $lastDate])->where('sublocalityName','LIKE',"{$Sublocality}%")->where('billStatus','LIKE',"{$status}%")->where('receviedBy','LIKE',"{$employee}%")->where('billType','LIKE',"{$Type}%")->orderBy($sort, 'ASC')->get();
        // $count=bill::where('companie_id',$companyid)->whereBetween('fullDate', [$firstDate, $lastDate])->where('sublocalityName','LIKE',"{$Sublocality}%")->where('billStatus','LIKE',"{$status}%")->where('receviedBy','LIKE',"{$employee}%")->where('billType','LIKE',"{$Type}%")->orderBy($sort, 'DESC')->count('id')->sum('');
        // $stat=DB::select('SELECT  sum(`netAmount`)as netsum, sum(`recevieAmount`)as receviesum ,count("id") as count FROM `bills` WHERE `companie_id` = 2 AND `fullDate` BETWEEN "'.$firstDate.'" AND "'.$lastDate.'" AND `sublocalityName` LIKE "'.$Sublocality.'%" AND `billStatus` LIKE "'.$status.'%" AND `receviedBy` LIKE "'.$employee.'%" AND `billType` LIKE "'.$Type.'%" ');


        return ($report);

        return view('reports.customerbill')->with('location', $location)
                                           ->with('employees', $employees)
                                           ->with('report',$report);
                                        //    ->with('stat',$stat);

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
     * @param  \App\Models\customerbillReport  $customerbillReport
     * @return \Illuminate\Http\Response
     */
    public function show(customerbillReport $customerbillReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customerbillReport  $customerbillReport
     * @return \Illuminate\Http\Response
     */
    public function edit(customerbillReport $customerbillReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customerbillReport  $customerbillReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customerbillReport $customerbillReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customerbillReport  $customerbillReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(customerbillReport $customerbillReport)
    {
        //
    }
}
