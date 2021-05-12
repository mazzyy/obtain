<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        $companyid=Auth::user()->companyid;
        $companyname=Auth::user()->companyName;

        // $connections = new connections();
        // $connections->name = $request->input('name');
        // $connections->company_id = $companyid;
        // $connections->internetId = $request->input('internetId');
        // $connections->Sublocality = $request->input('Sublocality');
        // $connections->user_id = $userid['id'];
        // $connections->internetId = $request->input('internetId');
        // $connections->address = $request->input('address');
        // $connections->contact = $request->input('txtPhone1');
        // $connections->contact2 = $request->input('txtPhone2');
        // $connections->connectiontype = $request->input('type');
        // $connections->installationAmount = $request->input('installationAmount');
        // $connections->installDate = $request->input('installationDate');
        // $connections->rechargeDate = $request->input('rechargeDate');
        // $connections->otherAmount = $request->input('otherAmount');
        // $connections->wifiAmount = $request->input('wifiAmount');
        // $connections->wireAmount = $request->input('wireAmount');
        // $connections->status = 'Active';
        // $connections->connectionProvider = $request->input('provider');
        // $connections->boxNumber = $request->input('box');
        // $connections->internetPackage = $pkgname;
        // $connections->internetPrice = $internetprice;
        // $connections->internetdiscont = $internetdiscountedPrice;
        // $connections->cablePackage = $cablepkgname;
        // $connections->cablePrice = $cablenetprice;
        // $connections->cablediscount = $cablediscountedPrice;
        // $connections->save();

        return new User([
            'name' =>   $row["name"],
            'email' =>   $row["email"],
            'password' =>   Hash::make($row["password"]),
            'companyName' =>   $companyname,
            'companyid' =>   $companyid,
        ]);
    }
}
