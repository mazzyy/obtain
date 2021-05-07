<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Datatables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class EmployeesController extends Controller

{
    //

    public function index(){
        $companyid=Auth::user()->companyid;
        $Employees=User::where('role','1')->Where('companyid',$companyid)->orWhere('role','2')->Where('companyid',$companyid)->get();


    return view('users.createEmployees')->with('Employees',$Employees);
    }


    public function create(Request $request){

        $companyid=Auth::user()->companyid;
        $companyName=Auth::user()->companyName;

          $user=new User();
          $user->name=$request->input('name');
          $user->email=$request->input('email');
          $user->password=Hash::make($request->input('password'));
          $user->role=$request->input('role');
          $user->companyid=$companyid;
          $user->companyName= $companyName;
          $user->save();

          return '123';
    }
}
