<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackagesController extends Controller
{
    public function index() {
        return view("master.packages.packages", [
            "packages" => Package::all()
        ]);
    }

    public function store(Request $request) {
        // $name=$request->input('pckg-name');
        $package = new Package();
        $package["company_id"] = Auth::user()->companyid;
        $package["package"] = $request["pckg-name"];
        $package["price"] = $request["pckg-price"];
        $package["type"] = $request["pckg-type"];
        $package->save();
    }
}
