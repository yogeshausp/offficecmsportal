<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_meta extends Model
{
    protected $table = 'employee_metas';
    public $timestamps = true;
  
    protected $fillable = [
        'employee_id','alternate_contact','age','aadhar_number','pan_number','blood_group',
        'bank_name','account_number','branch_name','ifsc_code'
    ];
}
