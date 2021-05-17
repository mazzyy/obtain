<?php

namespace App\Imports;

use App\Models\connections;
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


        // return new User([
        //     'name' =>   $row["name"],
        //     'email' =>   $row["email"],
        //     'password' =>   Hash::make($row["password"]),
        //      'role' =>   $row["role"],
        //     'companyName' =>   $companyname,
        //     'companyid' =>   $companyid,
        // ]);

        $companyid = Auth::user()->companyid;
        $companyname = Auth::user()->companyName;

        $user = new User([
            'name' =>   $row["name"],
            'email' =>   $row["email"],
            'password' =>   Hash::make($row["internetid"]),
            'role' =>   4,
            'companyName' =>   $companyname,
            'companyid' =>   $companyid,
        ]);
        $user->save();


        $connections = new connections();
        $connections->name =  $user->name;
        $connections->company_id = $companyid;
        $connections->Sublocality = $row["sublocality"];
        $connections->user_id = $user->id;
        $connections->internetId = $row["internetid"];
        $connections->address = $row["address"];
        $connections->contact = $row["txtphone1"];
        $connections->contact2 = $row["txtphone2"];
        $connections->connectiontype = $row["type"];
        $connections->installationAmount = $row["installationamount"];
        $connections->installDate = $row["installationdate"];
        $connections->rechargeDate = $row["rechargedate"];
        $connections->otherAmount = $row["otheramount"];
        $connections->wifiAmount = $row["wifiamount"];
        $connections->wireAmount = $row["wireamount"];
        $connections->status = $row["status"];
        $connections->connectionProvider = $row["provider"];
        $connections->boxNumber = $row["box"];
        $connections->internetPackage = 1;
        $connections->internetPrice = 1;
        $connections->internetdiscont = 1;
        $connections->cablePackage = 1;
        $connections->cablePrice = 1;
        $connections->cablediscount = 1;
        $connections->save();
    }
}
