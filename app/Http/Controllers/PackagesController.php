<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PackagesController extends Controller
{
    public function index() {

        $company_id=Auth::user()->companyid;
        return view("master.packages.packages", [
            "packages" => Package::where('company_id', $company_id)->get()
        ]);
    }

    public function store(Request $request) {
        // $name=$request->input('pckg-name');


        $validator = Validator::make($request->all(), [
            "pckg-name" => "required",
            "pckg-price" => ["required",'integer'],
            "pckg-type" => "required",

        ]);

        if($validator->passes()){
            $package = new Package();
            $package["company_id"] = Auth::user()->companyid;
            $package["package"] = $request["pckg-name"];
            $package["price"] = $request["pckg-price"];
            $package["type"] = $request["pckg-type"];
            $package->save();

            return response()->json(['success'=>'Added new records.']);
        }else{

            return response()->json(['error'=>$validator->errors()]);
        }
    }

    public function update(Request $request){
        $company_id=Auth::user()->companyid;
        $name=$request->input('pckg-name');
        $price=$request->input('pckg-price');
        $type=$request->input('pckg-type');
        $id=$request->input('nill');
       if(DB::table('Packages')->where('company_id',$company_id)->where('id',$id)->exists()){

        DB::table('Packages')->where('id',$id)->update(['type' => $type,'price' => $price,'package'=>$name]);

        return  'updated successfully';
       }
        return  'not updated';
    }


}
