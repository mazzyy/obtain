<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\company;

class dealerDetails extends Model
{

     public function company(){

        return $this->hasMany(company::class);
     }
    use HasFactory;
}
