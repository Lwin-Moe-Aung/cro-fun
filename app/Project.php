<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=[
    'name','nrc','dob','address',
    'photo','pdf'
    ];
}
