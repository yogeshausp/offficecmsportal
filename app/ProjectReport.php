<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectReport extends Model
{
    protected $table = 'project_reports';
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_name','work_done','time_dedicated_details','link_submission_details','user_name','user_id','status',
    ];
}
