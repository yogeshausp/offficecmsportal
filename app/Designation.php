<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class designation extends Model
{
    protected $table = 'designations';
    public $timestamps = true;
  
    protected $fillable = [
        'title','identifier'
    ];
}
