<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Imports\UserImport;
use App\Models\bill;
use Illuminate\Http\Request;
use App\Models\location;
use App\Models\connections;
use App\Models\logs;
use App\Models\Package;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


// use Illuminate\Foundation\Validation\ValidatesRequests;




class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $companyid = Auth::user()->companyid;
        $Customers = User::where('role', '4')->Where('companyid', $companyid)->get();
        $location = location::where('company_id', $companyid)->get();
        $internetPkg = Package::where('company_id', $companyid)->where('type', 'internet')->get();
        $cablePkg = Package::where('company_id', $companyid)->where('type', 'tv')->get();
        // dd(User::find(98));

        return view('users.createCustomers')->with('Customers', $Customers)
            ->with('location', $location)
            ->with('internetPkg', $internetPkg)
            ->with('cablePkg', $cablePkg);
    }



    public function create(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'internetId' => ['required'],
            "name" => "required",
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            "Sublocality" => "required",
            "txtPhone1" => "required",
            "rechargeDate" => "required",
            "type" => "required",
            "provider" => "required",
            "box" => "required",



        ]);

        // return $validator->errors()->keys()[0];

        // check if data is not(not empty) is short if there is no error
        if ($validator->passes()) {

            $companyid = Auth::user()->companyid;
            $companyName = Auth::user()->companyName;

            if (!User::where('email', $request->input('email'))->exists()) {
                $user = new User();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('internetId'));
                $user->role = 4;
                $user->companyid = $companyid;
                $user->companyName = $companyName;
                $user->save();
            }

            //interenet
            if ($request->input('cmbPackageint')) {
                list($pkgname, $internetprice) = (explode("-", $request->input('cmbPackageint')));
                $internetdiscountedPrice = $internetprice - (int)($request->input('txtAmountint'));
            } else {
                $pkgname = 0;
                $internetprice = 0;
                $internetdiscountedPrice = 0;
            }

            //cable
            if ($request->input('cmbPackage')) {
                list($cablepkgname, $cablenetprice) = (explode("-", $request->input('cmbPackage')));
                $cablediscountedPrice = $cablenetprice - (int)($request->input('txtAmount'));
            } else {
                $cablepkgname = 0;
                $cablenetprice = 0;
                $cablediscountedPrice = 0;
            }




            $userid = User::where('email', $request->input('email'))->where('companyid', $companyid)->first('id');

            if ($userid['id'] || !connections::where('users_id', $userid['id'])->exisit()) {
                $connections = new connections();
                $connections->name = $request->input('name');
                $connections->company_id = $companyid;
                $connections->internetId = $request->input('internetId');
                $connections->Sublocality = $request->input('Sublocality');
                $connections->user_id = $userid['id'];
                $connections->internetId = $request->input('internetId');
                $connections->address = $request->input('address');
                $connections->contact = $request->input('txtPhone1');
                $connections->contact2 = $request->input('txtPhone2');
                $connections->connectiontype = $request->input('type');
                $connections->installationAmount = $request->input('installationAmount');
                $connections->installDate = $request->input('installationDate');
                $connections->rechargeDate = $request->input('rechargeDate');
                $connections->otherAmount = $request->input('otherAmount');
                $connections->wifiAmount = $request->input('wifiAmount');
                $connections->wireAmount = $request->input('wireAmount');
                $connections->status = 'Active';
                $connections->connectionProvider = $request->input('provider');
                $connections->boxNumber = $request->input('box');
                $connections->internetPackage = $pkgname;
                $connections->internetPrice = $internetprice;
                $connections->internetdiscont = $internetdiscountedPrice;
                $connections->cablePackage = $cablepkgname;
                $connections->cablePrice = $cablenetprice;
                $connections->cablediscount = $cablediscountedPrice;
                $connections->save();
            } else {
                return false;
            }
            // return $validator->errors();
            return response()->json(['success'=> $user->name]);
        } else {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }

    public function import(Request $request)
    {
        Excel::import(new UserImport, $request->file);
        return back();
    }

    public function show(Request $request){

        $selectedUser=DB::table('users')->where('users.id',$request->input('id'))->join('connections', 'users.id', '=', 'connections.user_id')->get();

        return $selectedUser;
    }
    public function update(Request $request){
        $companyid = Auth::user()->companyid;
        $userid=$request->input('aasdjaIdsas');
        $name=$request->input('name');
        $email=$request->input('email');
        $connectionId=$request->input('nill');
        $type=$request->input('tp');

    //    return  $request->input('cmbPackageint');
         //interenet

         if ($request->input('cmbPackageint')) {
            list($pkgname, $internetprice) = (explode("-", $request->input('cmbPackageint')));
            $internetdiscountedPrice = $internetprice - (int)($request->input('txtAmountint'));
        } else {
            $pkgname = 0;
            $internetprice = 0;
            $internetdiscountedPrice = 0;
        }

        //cable
        if ($request->input('cmbPackage')  ) {
            list($cablepkgname, $cablenetprice) = (explode("-", $request->input('cmbPackage')));
            $cablediscountedPrice = $cablenetprice - (int)($request->input('txtAmount'));
        } else {
            $cablepkgname = 0;
            $cablenetprice = 0;
            $cablediscountedPrice = 0;
        }

        $updated=User::where('companyid',  $companyid)
        ->where('id', $userid)
        ->update(['name' =>  $name,'email' =>  $email]);

        $connections = connections::find($connectionId);

                $connections->name = $request->input('name');
                $connections->company_id = $companyid;
                $connections->internetId = $request->input('internetId');
                $connections->Sublocality = $request->input('Sublocality');
                // $connections->internetId = $request->input('internetId');
                $connections->address = $request->input('address');
                $connections->contact = $request->input('txtPhone1');
                $connections->contact2 = $request->input('txtPhone2');
                $connections->connectiontype = $request->input('type');
                $connections->installationAmount = $request->input('installationAmount');
                $connections->installDate = $request->input('installationDate');
                $connections->rechargeDate = $request->input('rechargeDate');
                $connections->otherAmount = $request->input('otherAmount');
                $connections->wifiAmount = $request->input('wifiAmount');
                $connections->wireAmount = $request->input('wireAmount');
                $connections->connectionProvider = $request->input('provider');
                $connections->boxNumber = $request->input('box');

                $connections->internetPackage = $pkgname;
                $connections->internetPrice = $internetprice;
                $connections->internetdiscont = $internetdiscountedPrice;
                $connections->cablePackage = $cablepkgname;
                $connections->cablePrice = $cablenetprice;
                $connections->cablediscount = $cablediscountedPrice;
                $connections->save();

        return $connections;
    }

    public function changestatus(Request $request){
        $status=$request->input('desicion');
        $id=$request->input('id');
        $name=$request->input('name');
       $companyid=Auth::user()->companyid;
       $deletedBy=Auth::user()->name;

            switch ($status) {

                case "deactive":
                    $userdata=connections::where('user_id',$id)->update(['status' => 'Deactive']);
                    return 'deactive';
                    break;

                case "active":
                    $userdata=connections::where('user_id',$id)->update(['status' => 'Active']);
                    return "active";
                    break;

                case "delete":


                    $log =new logs();
                    $log->name=$name;
                    $log->company_id=$companyid;
                    $log->extra='Customer '.$name.' deleted by '. $deletedBy;
                    $log->save();
                    $userdata=connections::where('user_id',$id)->delete();
                    bill::where('user_id',$id)->delete();
                    user::where('id',$id)->delete();

                    return "delete";
                    break;
            }

    return $request;
    }
}
