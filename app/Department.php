<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $table = 'departments';
    public $timestamps = true;
  
    protected $fillable = [
        'title','identifier'
    ];
}
