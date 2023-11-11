<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\student;

class subject extends Model
{
    protected $fillable = [
        'id',
        'name' ,
        'english' ,
        'maths' ,
        'history' ,
];

public function student(){
    return $this->belongsTo(student::class);
}

}
