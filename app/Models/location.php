<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\connections;

class location extends Model
{

    public function connections()
    {
        return $this->hasMany(connections::class,'Sublocality');
    }

    use HasFactory;
}
