<?php

namespace App\Http\Controllers;
use App\Models\location;
use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ControllerArea extends Controller
{
    //

    public function index(){

        $companyid=Auth::user()->companyid;

        $locations = DB::table('locations')->where('company_id', '=', $companyid)->get();
 


       
        return view('Area')->with('locations',$locations);
    } 

    public function create(){




    }


}
