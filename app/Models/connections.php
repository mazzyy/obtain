<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\location;


class connections extends Model
{

    public function location()
    {
        return $this->belongsTo(location::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
