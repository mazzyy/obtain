<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\connections;
use App\Models\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class TransactionController extends Controller
{

    public function index(){
        $companyid=Auth::user()->companyid;
        $locations = DB::table('locations')->where('company_id', '=', $companyid)->get();

        return view("transactions.bills", [
            "locations" => $locations
        ]);
    }



    public function create(Request $request){
        $month=$request->input('month');
        $year=$request->input('year');
        $billtype=$request->input('bill-type');
        $sublocality=$request->input('sublocality');
        $companyid=Auth::user()->companyid;

        // $data=connections::where('connectiontype',$billtype)->where('Sublocality',$sublocality)->where('company_id',$companyid)->get();
       if($sublocality!=0){
        $customers = User::where('companyid', '=', $companyid)->where('role','3')->where('Sublocality',$sublocality)->join('connections', 'users.id', '=', 'connections.user_id')->get();
       }
       $check=bill::where( 'companie_id',$companyid)->where('year',$year)->where('month',$month)->where('Sublocality',$sublocality)->exists();




        if($check){

        }else if($sublocality==0){

            $subId=location::get('id');

            foreach($subId as $id){

                $customers = User::where('companyid', '=', $companyid)->where('role','3')->where('Sublocality',$sublocality)->join('connections', 'users.id', '=', 'connections.user_id')->get();
dd($companyid);
            foreach($customers as $customer){
                $bill = new bill();
                $bill->year=$year;
                $bill->month=$month;
                $bill->netAmount=$customer->internetdiscont+$customer->cablediscount;
                $bill->recevieAmount=0;
                $bill->status='unpaid';
                $bill->receviedBy='';
                $bill->user_id=$customer->id;
                $bill->companie_id=$companyid;
                $bill->sublocality=$sublocality;
                $bill->billType=$billtype;

                $bill->save();
               }
            }
            return $subId;
        }else{
            foreach($customers as $customer){
                $bill = new bill();
                $bill->year=$year;
                $bill->month=$month;
                $bill->netAmount=$customer->internetdiscont+$customer->cablediscount;
                $bill->recevieAmount=0;
                $bill->status='unpaid';
                $bill->receviedBy='';
                $bill->user_id=$customer->id;
                $bill->companie_id=$companyid;
                $bill->sublocality=$sublocality;
                $bill->billType=$billtype;

                $bill->save();
        }

       }
    //    bill::where( 'companie_id',$companyid)->where('year',$year)->where('month',$month)->get();

      return $check;
    }

}
