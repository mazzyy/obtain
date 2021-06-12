<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class UserImportController extends Controller
{
    //

    public function store(Request $request){
        $file=$request->file('file')->store('import');
        // Excel::import(new UserImport,$file);

        // (new UserImport)->import($file);
        $import = new UserImport();
        $import->import($file);
        $import->errors();




    return back()->withStatus('Imported');
    }
}
