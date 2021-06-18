<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\connections;
use App\Models\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{

    public function index(){
        $generatedbill="";
        $companyid=Auth::user()->companyid;
        $locations = DB::table('locations')->where('company_id', '=', $companyid)->get();


        return view("transactions.bills", [
            "locations" => $locations,
            'generatedbill'=> $generatedbill
        ]);
    }



    public function create(Request $request){
        DB::enableQueryLog();
        $month=$request->input('month');
        $year=$request->input('year');
        $billtype=$request->input('bill-type');
        $sublocality=$request->input('sublocality');
        $companyid=Auth::user()->companyid;
        $action=$request->input('action');

         $date = $month.' '.' 28'.' '.$year;
         $fullDate=date('Y/m/d', strtotime($date));
// return  $date;

        $validator = Validator::make($request->all(), [
            "month" => "required",
            "year" => "required",
            "bill-type" => "required",
            "sublocality" => "required",
        ]);

    if($validator->passes()){



            if($action=='delete'){
                if($sublocality==0){
                    $check=bill::where( 'companie_id',$companyid)->where('year',$year)->where('billType',$billtype)->where('month',$month)->delete();
                    $sublocalityName="All sublocality";
                }
                else{
                list($sublocality,$sublocalityName)=explode('-',$sublocality);
                $check=bill::where( 'companie_id',$companyid)->where('year',$year)->where('billType',$billtype)->where('month',$month)->where('Sublocality',$sublocality)->delete();

                }

                $locations = DB::table('locations')->where('company_id', '=', $companyid)->get();
                $generatedbill=null;
                $message="The ".$billtype." bill for ".$year."-".$month." of ".$sublocalityName. " has been removed";
                return view('transactions.bills')->with('locations',$locations)->with('generatedbill',$generatedbill)->with('message',  $message);

            }

            if($sublocality!=0){
            list($sublocality,$sublocalityName)=explode('-',$sublocality);
            }

            // $data=connections::where('connectiontype',$billtype)->where('Sublocality',$sublocality)->where('company_id',$companyid)->get();
        if($sublocality!=0){
            $customers = User::where('companyid', '=', $companyid)->where('role','4')->where('connectiontype',$billtype)->where('Sublocality',$sublocality)->join('connections', 'users.id', '=', 'connections.user_id')->get();
            // dd($customers);

            }

            $check=bill::where( 'companie_id',$companyid)->where('year',$year)->where('billType',$billtype)->where('month',$month)->where('Sublocality',$sublocality)->exists();


            if($check){

            }else if($sublocality==0){
                $sublocalityName="All sublocality";
                $subId=location::where('company_id', '=', $companyid)->get();

                foreach($subId as $id){

                    $customers = User::where('companyid', '=', $companyid)->where('role','4')->where('connectiontype',$billtype)->where('Sublocality',$id['id'])->join('connections', 'users.id', '=', 'connections.user_id')->get();
// dd( $customers);
                    $check=bill::where( 'companie_id',$companyid)->where('year',$year)->where('month',$month)->where('billType',$billtype)->where('Sublocality',$id['id'])->exists();

                if($check==null){
                        foreach($customers as $customer){
                            $bill = new bill();
                            $bill->year=$year;
                            $bill->month=$month;
                            $bill->fullDate=$fullDate;
                            $bill->netAmount=$customer->internetdiscont+$customer->cablediscount;
                            $bill->recevieAmount=0;
                            $bill->billStatus='unpaid';
                            $bill->receviedBy='';
                            $bill->user_id=$customer->user_id;
                            $bill->companie_id=$companyid;
                            $bill->sublocality=$id['id'];
                            $bill->sublocalityName=$id['sublocality'];
                            $bill->address=$customer->address;
                            $bill->billType=$billtype;
                            $bill->user_name=$customer->name;
                            $bill->internetId=$customer->internetId;

                            $bill->save();
                        }
                    }
                }

            }else{
                foreach($customers as $customer){
                    $bill = new bill();
                    $bill->year=$year;
                    $bill->month=$month;
                    $bill->fullDate=$fullDate;
                    $bill->netAmount=$customer->internetdiscont+$customer->cablediscount;
                    $bill->recevieAmount=0;
                    $bill->billStatus='unpaid';
                    $bill->receviedBy='';
                    $bill->user_id=$customer->user_id;
                    $bill->companie_id=$companyid;
                    $bill->sublocality=$sublocality;
                    $bill->sublocalityName=$sublocalityName;
                    $bill->billType=$billtype;
                    $bill->user_name=$customer->name;
                    $bill->internetId=$customer->internetId;

                    $bill->save();
            }

        }
        $generatedbill=bill::where( 'companie_id',$companyid)->where('year',$year)->where('month',$month)->leftJoin('Users', 'users.id', '=', 'bills.user_id')->join('connections', 'users.id', '=', 'connections.user_id')->orderBy('connections.address', 'ASC')->get();
        $locations = DB::table('locations')->where('company_id', '=', $companyid)->get();

        $message="The ".$billtype." bill for ".$year."-".$month." of ".$sublocalityName;

        return view('transactions/bills')->with('generatedbill',$generatedbill)->with('locations',$locations)->with('message',  $message);;
        }else{
            $generatedbill="";
        $locations = DB::table('locations')->where('company_id', '=', $companyid)->get();
        return view('transactions/bills')->with('errors',$validator->errors())->with('generatedbill',$generatedbill)->with('locations',$locations);
        // return response()->json(['error'=>$validator->errors()]);
    }


    }



}
