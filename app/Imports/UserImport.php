<?php

namespace App\Imports;

use App\Models\logs;
use App\Models\connections;
use App\Models\Package;
use App\Models\User;
use App\User as AppUser;
// use Carbon\Traits\Date;
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
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use PhpOffice\PhpSpreadsheet\Shared\Date;
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
         (isset($row["internet_discount"])) ?  : $row["internet_discount"]=0;
         (isset($row["cable_discount"])) ?  : $row["cable_discount"]=0;



        $installationdate=Date::excelToDateTimeObject( $row["installationdate"]);
        $installationdate=$installationdate->format('Y-m-d');

        $rechargedate=Date::excelToDateTimeObject($row["rechargedate"]);
        $rechargedate=$rechargedate->format('Y-m-d');
        $cable_package=package::where('id',(integer)$row["cable_packageid"])->where(  'company_id',$companyid)->get();

        $package=package::where('id',(integer)$row["internet_packageid"])->where(  'company_id',$companyid)->get();
        $type="";
        if((integer)$row["internet_packageid"] > 0){
        $packageName=$package[0]->package;
        $packagePrice=$package[0]->price;
        $afterDiscount=(integer)$packagePrice- (integer)$row["internet_discount"];
        $type="Internet";
            }else{
                $packageName=0;
                $packagePrice=0;
                $afterDiscount=0;
            }

        if((integer)$row["cable_packageid"] > 0){
            $cable_packageName=$cable_package[0]->package;
            $cable_packagePrice=$cable_package[0]->price;
            $cable_packageafterDiscount=(integer)$cable_packagePrice- (integer)$row["cable_discount"];
            $type="Cable";

            }else{
                $cable_packageName=0;
                $cable_packagePrice=0;
                $cable_packageafterDiscount=0;
            }
            if((integer)$row["cable_packageid"] > 0  && (integer)$row["internet_packageid"] > 0 ){

                $type="Both";
            }
// dd($cable_package);
       if(DB::table('users')->where('email', $email)->exists()){



            $logs =new logs();
            $logs->email=(string)$row["email"];
            $logs->name= (string)$row["name"];
            $logs->extra= $rechargedate;
            $logs->save();




       }else{


                    $companyid = $companyid;
                    $companyname = Auth::user()->companyName;
                    $name=  (string)$row["name"];
                    $sublocality=  (string)$row["sublocality"];
                    $internetid=  (string)$row["internetid"];
                    $address=  (string)$row["address"];
                    $txtphone1=  (string)$row["txtphone1"];
                    // $txtphone2=  (string)$row["txtphone2"];
                    // $type=  (string)$row["type"];
                    $installationamount=  (string)$row["installationamount"];
                    $installationdate=  $installationdate;
                    $rechargedate=  $rechargedate;
                    $otheramount=  (string)$row["otheramount"];
                    $wifiamount=  (string)$row["wifiamount"];
                    $wireamount=  (string)$row["wireamount"];
                    // $status=  (string)$row["status"];
                    $provider=  (string)$row["provider"];
                    $box=  (string)$row["box"];
                    $status=  'Active';


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
                    // $connections->contact2 = $txtphone2;
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
                    $connections->internetPackage = $packageName;
                    $connections->internetPrice =  $packagePrice;
                    $connections->internetdiscont = $afterDiscount;

                    $connections->cablePackage =   $cable_packageName;
                    $connections->cablePrice = $cable_packagePrice;
                    $connections->cablediscount =  $cable_packageafterDiscount;
                    $connections->save();

                    // dd( $rechargedate);
                    $logs =new logs();
                    $logs->email=(string)$row["email"];
                    $logs->name= (string)$row["email"];
                    $logs->extra= $rechargedate;
                    $logs->save();

             }
            //  $exists = Storage::disk('local')->exists('file.txt',$error);

}


    public function onError(Throwable $error){


    }
}
