<?php

namespace App;

use App\Designation;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    public $timestamps = true;
  
    protected $fillable = [
        'emp_id','emp_name','designation','department','email','address',
        'city','state','contact','salary','guardian_name','guardian_contact','date_of_birth',
        'date_of_joining','status'
    ];

    public function getFormateDobAttribute() {

        $dob = \Carbon\Carbon::createFromFormat('Y-m-d', $this->date_of_birth)
                    ->format('F d, Y');

        return $dob;
    }

    public function getFormateDojAttribute() {

        $dob = \Carbon\Carbon::createFromFormat('Y-m-d', $this->date_of_joining)
                    ->format('F d, Y');

        return $dob;
    }

    public function getFormattedDesignationAttribute() {

        $designation = Designation::find($this->designation);

        $designation_title = $designation->title;

        return $designation_title;
    }

    public function getFormattedDepartmentAttribute() {

        $department = Department::find($this->department);

        $department_title = $department->title;

        return $department_title;
    }
}
