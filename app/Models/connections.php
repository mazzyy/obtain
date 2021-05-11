<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class connections extends Model
{


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
