<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Datatables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller

{
    //

    public function index()
    {
        $companyid = Auth::user()->companyid;
        $Employees = User::where('role', '1')->Where('companyid', $companyid)->orWhere('role', '2')->Where('companyid', $companyid)->orWhere('role', '3')->Where('companyid', $companyid)->get();


        return view('users.createEmployees')->with('Employees', $Employees);
    }


    public function create(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => 'required',
            'password' => 'required',
        ]);

        $companyid = Auth::user()->companyid;
        $companyName = Auth::user()->companyName;

        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->role = $request->input('role');
            $user->companyid = $companyid;
            $user->companyName = $companyName;
            $user->save();

            return response()->json(['success'=> $user->name]);

        }else{

        return response()->json(['error'=>$validator->errors()]);
        }


    }
}
