<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\location;
use App\Models\Package;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $companyid=Auth::user()->companyid;
        $Customers=User::where('role','3')->Where('companyid',$companyid)->get();
        $location=location::where('company_id',$companyid)->get();
        $internetPkg=Package::where('company_id',$companyid)->where('type','internet')->get();
        $cablePkg=Package::where('company_id',$companyid)->where('type','tv')->get();
// dd($companyid);
        return view('users.createCustomers')->with('Customers',$Customers)
        ->with('location',$location)
        ->with('internetPkg', $internetPkg)
        ->with('cablePkg', $cablePkg);
    }

    public function create(Request $request){

        $companyid=Auth::user()->companyid;
        $companyName=Auth::user()->companyName;

          $user=new User();
          $user->name=$request->input('name');
          $user->email=$request->input('email');
          $user->password=Hash::make($request->input('password'));
          $user->role=3;
          $user->companyid=$companyid;
          $user->companyName= $companyName;
          $user->save();

          return $request;
    }
}
