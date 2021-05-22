<?php

namespace App\Http\Controllers;
use App\Models\location;
use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ControllerArea extends Controller
{
    //

    public function index(){

        $companyid=Auth::user()->companyid;

        $locations = DB::table('locations')->where('company_id', '=', $companyid)->get();
        $locationsGroupby = DB::table('locations')->where('company_id', '=', $companyid)->groupBy('country','city')->get();


        return view('Area')->with('locations',$locations)->with('locationsGroupby',$locationsGroupby);
    }

    public function create(Request $request){


        $companyid=Auth::user()->companyid;

        $validator = Validator::make($request->all(), [
            "country" => "required",
            "city" => "required",
            "locality" => "required",
            "sublocality" => "required",
        ]);
        if( $validator->passes()){
        $country=$request->input('country');
        $city=$request->input('city');
        $locality=$request->input('locality');
        $sublocality=$request->input('sublocality');

        $location=new location();
        $location->company_id=$companyid;
        $location->country=$country;
        $location->city=$city;
        $location->locality=$locality;
        $location->sublocality=$sublocality;
        $location->save();

        return response()->json(['success'=>'Added new records.']);
        }else{

        return response()->json(['error'=>$validator->errors()]);
        }




      return  true;

    }


}
