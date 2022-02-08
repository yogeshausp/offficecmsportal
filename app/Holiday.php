<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    
    protected $table = 'holidays';
    public $timestamps = true;
  
    protected $fillable = [
        'title','start_date','end_date'
    ];

}
