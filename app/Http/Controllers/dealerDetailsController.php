<?php

namespace App\Http\Controllers;

use App\Models\dealerDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class dealerDetailsController extends Controller
{
    //

   public function index(){
    $companyId=Auth::user()->companyid;

    $dealerDetails=dealerDetails::where('company_id',$companyId)->get();
    return view('master.packages.dealerdetails')->with('dealerDetails',$dealerDetails);
   }

   public function create(Request $Request){

    $validator = Validator::make($Request->all(), [
        'name' => 'required',
        'contact' => 'required',
        'address' => 'required',
        'status' => 'required',
    ]);



        $name= $Request->input('name');
        $address=  $Request->input('address');
        $contact= $Request->input('contact');
        $CNIC= $Request->input('CNIC');
        $joiningDate=$Request->input('joiningDate');
        $leavingDate=$Request->input('leavingDate');
        $status=$Request->input('status');
        $companyid=Auth::user()->companyid;

// return $contact;
        if ($validator->passes()) {
                $dealer =new dealerDetails();

                $dealer->Name=$name;
                $dealer->address=$address;
                $dealer->contact=$contact;
                $dealer->CNIC=$CNIC;
                $dealer->joiningDate=$joiningDate;
                $dealer->leavingDate=$leavingDate;
                $dealer->status=$status;
                $dealer->company_id=$companyid;
                $dealer->save();
                return response()->json(['success'=> 'success']);
        }else{
                return response()->json(['error'=>$validator->errors()]);
        }

   }
}
