<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\dealerDetails;

class company extends Model
{



    public function dealerDetails(){

        return $this->belongsTo(dealerDetails::class);
    }
    use HasFactory;
}
