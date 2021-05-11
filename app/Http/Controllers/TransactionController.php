<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class TransactionController extends Controller
{


    public function billCreator() {
        $companyid=Auth::user()->companyid;
        $locations = DB::table('locations')->where('company_id', '=', $companyid)->get();

        return view("transactions.bills", [
            "locations" => $locations
        ]);
    }
}
