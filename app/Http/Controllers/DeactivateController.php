<?php

namespace App\Http\Controllers;

use App\Models\connections;
use App\Models\User;
use App\Models\deactivate;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DeactivateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function index()
    {
        //testing
        $var = '6/11/2021';
        $date = str_replace('/', '-', $var);
        $date=date('Y-m-d', strtotime($date));

        $originalDate ='6/11/2021';
        $newDate = date("Y-m-d", strtotime($originalDate));


        return $newDate ;
    }


    public function update(Request $request, deactivate $deactivate)
    {
        //
        $companyid=Auth::user()->companyid;
        if(connections::where('company_id',$companyid)->where('user_id', $request->input('id'))->exists()){

            $deactivates = new deactivate();
            $deactivates->name =    $request->input('name');
            $deactivates->company_id =   $companyid;
            $deactivates->Customer_id =   $request->input('id');
            $deactivates->address = $request->input('address');
            $deactivates->contact = $request->input('cell');
            $deactivates->leavingDate =  $request->input('name');
            $deactivates->address = $request->input('ldate');
            $deactivates->otherComments =$request->input('browser');
            $deactivates->save();


        }

        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\deactivate  $deactivate
     * @return \Illuminate\Http\Response
     */
    public function destroy(deactivate $deactivate)
    {
        //
    }
}
