<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class bill extends Model
{
    protected $fillable = [
        'year',
        'month',
        'netAmount',
        'recevieAmount',
        'status',
        'receviedBy',
        'user_id',
        'companie_id',
        'billType',
        'sublocality',

    ];

   public function user(){


    return $this->hasMany(User::class);
   }

    use HasFactory;
}
