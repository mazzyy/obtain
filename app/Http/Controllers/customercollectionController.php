<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customercollectionController extends Controller
{
    //
    public function index(){


        return view('transactions.customerCollection');
    }
}
