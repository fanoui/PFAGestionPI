<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiale extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOneThrough(User::class,$this,"id","id",null,"user_id");
    }
}
