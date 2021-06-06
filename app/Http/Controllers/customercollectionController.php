<?php

namespace App\Http\Controllers;

use App\Models\bill;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class customercollectionController extends Controller
{
    //
    public function index(){
        $companyid = Auth::user()->companyid;
        $Customers = User::where('role', '4')->Where('companyid', $companyid)->get();
        $locations = location::where('company_id', $companyid)->get();


        return view('transactions.customerCollection')
        ->with('locations' ,$locations );
    }

    public function find(Request $request){

        $search=$request->input('searchId');
        $Area=$request->input('Area');

        $companyid = Auth::user()->companyid;
        if($search){
            if($Area==0){
                $searchedCustomers=  DB::select('SELECT * ,users.id as userid FROM `users` INNER JOIN connections ON users.id=connections.user_id WHERE connections.company_id='.$companyid.' AND users.role=4 AND (users.name LIKE "'.$search.'%" OR connections.internetId LIKE "'.$search.'%" OR connections.address LIKE "'.$search.'%" OR connections.contact LIKE "'.$search.'%") LIMIT 15');
            }else if($Area > 0){
                $searchedCustomers=  DB::select('SELECT * ,users.id as userid FROM `users` INNER JOIN connections ON users.id=connections.user_id WHERE connections.company_id='.$companyid.' AND users.role=4  AND connections.Sublocality='.$Area.' AND (users.name LIKE "'.$search.'%" OR connections.internetId LIKE "'.$search.'%" OR connections.address LIKE "'.$search.'%" OR connections.contact LIKE "'.$search.'%") LIMIT 15');
            }
            // $searchedCustomers= User::where('role','4')->where('company_id',$companyid)->where('internetId','LIKE',"$search%")->join('connections', 'users.id', '=', 'connections.user_id')->get();
        // $generatedbill=bill::where( 'companie_id',$companyid)->where('year',$year)->where('month',$month)->leftJoin('Users', 'users.id', '=', 'bills.user_id')->join('connections', 'users.id', '=', 'connections.user_id')->get();
        }else{

            $searchedCustomers='';
        }

    return $searchedCustomers;
    }

    public function customerbill(Request $request){
        $id=$request->input('name');

        $userRecord=bill::where('user_id',$id)->get();


    return $userRecord;
    }

    public function reveive(Request $request){

        $receivingDate=$request->input('receivingDate');
        $recieptID=$request->input('recieptID');
        $value=$request->input('value');
        $cusId=$request->input('cusId');

           $receviedBy=Auth::user()->name;
           $Userbills=bill::where('user_id',$cusId)->where('billStatus','unpaid')->orwhere('billStatus','partial')->where('user_id',$cusId)->get(['id','netAmount']);


           foreach($Userbills as $Userbill){
            $bill = bill::find($Userbill->id);

             $currentUserNA=$bill->netAmount;
            if(  $value >= $currentUserNA ){
                $value=$value-$currentUserNA;
                $bill->recevieAmount= $currentUserNA;
                $bill->receivingDate=$receivingDate;
                $bill->receviedBy=$receviedBy;
                $bill->billStatus='paid';

                $bill->save();

            }
            else if($value < $currentUserNA){

                $bill->recevieAmount=$value;
                $bill->receivingDate=$receviedBy;
                $bill->receivingDate=$receivingDate;
                $bill->receviedBy=$receviedBy;
                $bill->billStatus='partial';
                $bill->save();
                $value=0;

            }

        }
        $userRecord=bill::where('user_id',$cusId)->get();

        return $userRecord;
    }

    public function newAmount(Request $request){
        $companyid=Auth::user()->companyid;
        $id=$request->input('txtid');
        $name=$request->input('txtNam');
        $internetId=$request->input('txtintid');
        $netAmount=$request->input('text');
        $month=$request->input('cmbmnth');
        $year=$request->input('cmbyear');


        $subId=$request->input('codexdbugysub');
        $subName=$request->input('erx3extr12o404subn');
        $type=$request->input('asdh89haskltype');



        $bill = new bill();
                    $bill->year=$year;
                    $bill->month=$month;
                    $bill->netAmount= $netAmount;
                    $bill->recevieAmount=0;
                    $bill->billStatus='unpaid';
                    $bill->receviedBy='';
                    $bill->user_id= $id;
                    $bill->companie_id=$companyid;
                    $bill->sublocality= $subId;
                    $bill->sublocalityName=$subName;
                    $bill->billType=$type;
                    $bill->user_name=$name;
                    $bill->internetId=$internetId;
        $bill->save();


    return $bill;
    }



}
