<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    protected $table = 'project_details';
    public $timestamps = true;
  
    protected $fillable = [
        'project_name','client_name','project_url','platform','designer','developer','username','password','description','status'
    ];

    public function getFormattedStatusAttribute() {

        if($this->status == 0)
            $status = 'Delivered';
        elseif($this->status == 1)
            $status = 'Inprocess';
        return $status;
    }
}
