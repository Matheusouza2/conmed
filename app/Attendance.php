<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = "attendance";
    
    protected $fillable = [
        "doctor",
        "patient",
        "data",
        "anamnesis",
        "medicines",
        "exams",
        "images",
        "hash"
    ];
}
