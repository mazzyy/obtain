<?php

namespace App\Imports;

use App\Models\connections;
use App\Models\location;
use App\Models\User;
use App\User as AppUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;


class UserImport implements ToModel, WithHeadingRow, SkipsOnError, SkipsOnFailure
{

    use Importable,SkipsErrors,SkipsFailures ;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $email=  (string)$row["email"];
        $companyid=Auth::user()->companyid;
        // $packages = DB::table('package')->where('company_id', '=', $companyid)->get();
        //     foreach($packages as $pk){
        //     if($pk->id==)


        //     }


       if(DB::table('users')->where('email', $email)->exists()){


       }else{

                    $companyid = $companyid;
                    $companyname = Auth::user()->companyName;
                    $name=  (string)$row["name"];
                    $sublocality=  (string)$row["sublocality"];
                    $internetid=  (string)$row["internetid"];
                    $address=  (string)$row["address"];
                    $txtphone1=  (string)$row["txtphone1"];
                    $txtphone2=  (string)$row["txtphone2"];
                    $type=  (string)$row["type"];
                    $installationamount=  (string)$row["installationamount"];
                    $installationdate=  (string)$row["installationdate"];
                    $rechargedate=  (string)$row["rechargedate"];
                    $otheramount=  (string)$row["otheramount"];
                    $wifiamount=  (string)$row["wifiamount"];
                    $wireamount=  (string)$row["wireamount"];
                    $status=  (string)$row["status"];
                    $provider=  (string)$row["provider"];
                    $box=  (string)$row["box"];


            // dd($name);

                    // print_r($row);

                    $user = new User([
                        'name' =>$name,
                        'email' =>$email,
                        'password' =>   Hash::make($row["internetid"]),
                        'role' =>4,
                        'companyName' =>$companyname,
                        'companyid' =>$companyid,
                    ]);
                    $user->save();


                    $connections = new connections();
                    $connections->name =  $user->name;
                    $connections->company_id = $companyid;
                    $connections->Sublocality = $sublocality;
                    $connections->user_id = $user->id;
                    $connections->internetId = $internetid;
                    $connections->address = $address;
                    $connections->contact = $txtphone1;
                    $connections->contact2 = $txtphone2;
                    $connections->connectiontype = $type;
                    $connections->installationAmount = $installationamount;
                    $connections->installDate = $installationdate;
                    $connections->rechargeDate = $rechargedate;
                    $connections->otherAmount = $otheramount;
                    $connections->wifiAmount = $wifiamount;
                    $connections->wireAmount = $wireamount;
                    $connections->status = $status;
                    $connections->connectionProvider = $provider;
                    $connections->boxNumber = $box;
                    $connections->internetPackage = 1;
                    $connections->internetPrice = 1;
                    $connections->internetdiscont = 1;
                    $connections->cablePackage = 1;
                    $connections->cablePrice = 1;
                    $connections->cablediscount = 1;
                    $connections->save();
             }
}


    public function onError(Throwable $error){


    }
}
