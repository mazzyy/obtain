<?php

namespace App\Http\Controllers;

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
                $searchedCustomers=  DB::select('SELECT * FROM `users` INNER JOIN connections ON users.id=connections.user_id WHERE connections.company_id='.$companyid.' AND users.role=4 AND (users.name LIKE "'.$search.'%" OR connections.internetId LIKE "'.$search.'%" OR connections.address LIKE "'.$search.'%" OR connections.contact LIKE "'.$search.'%") LIMIT 15');
            }else if($Area > 0){
                $searchedCustomers=  DB::select('SELECT * FROM `users` INNER JOIN connections ON users.id=connections.user_id WHERE connections.company_id='.$companyid.' AND users.role=4  AND connections.Sublocality='.$Area.' AND (users.name LIKE "'.$search.'%" OR connections.internetId LIKE "'.$search.'%" OR connections.address LIKE "'.$search.'%" OR connections.contact LIKE "'.$search.'%") LIMIT 15');
            }
            // $searchedCustomers= User::where('role','4')->where('company_id',$companyid)->where('internetId','LIKE',"$search%")->join('connections', 'users.id', '=', 'connections.user_id')->get();
        // $generatedbill=bill::where( 'companie_id',$companyid)->where('year',$year)->where('month',$month)->leftJoin('Users', 'users.id', '=', 'bills.user_id')->join('connections', 'users.id', '=', 'connections.user_id')->get();
        }else{

            $searchedCustomers='';
        }

    return $searchedCustomers;
    }
}
