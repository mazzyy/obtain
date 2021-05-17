<?php

namespace App\Http\Controllers;

use App\Models\bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class excelController extends Controller
{
    //

    public function excelbill(Request $request){
        $year=$request->input('year');
        $month=$request->input('mth');
        $companyid=Auth::user()->companyid;
        // dd($month);
        $generatedbill=bill::where( 'companie_id',$companyid)->where('year',$year)->where('month',$month)->leftJoin('Users', 'users.id', '=', 'bills.user_id')->join('connections', 'users.id', '=', 'connections.user_id')->get();

        return view('transactions.billexcel')->with('generatedbill',$generatedbill);
    }
}
