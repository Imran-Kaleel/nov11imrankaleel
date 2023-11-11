<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\subject;

class student extends Model
{
    use HasFactory;

    public function subject(){
        return $this->hasMany(subject::class);
    }

}
