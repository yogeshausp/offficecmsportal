<?php

namespace App;

use App\Employee;

use App\LeaveType;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    

    public function getFormattedUserIdAttribute() {

        $user_id = Employee::where('id','=', $this->user_id)->get(['emp_name']);
        $user_id = $user_id[0]->emp_name;

        return $user_id;
    }

    public function getFormattedLeaveTypeAttribute() {

        $leave_type = LeaveType::where('id','=', $this->leave_type)->get(['title']);
        $leave_type = $leave_type[0]->title;

        return $leave_type;
    }



    public function getFormattedFromAttribute() {

        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $this->from)
                    ->format('F d, Y');

        return $from;
    }

    public function getFormattedToAttribute() {

        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $this->to)
                    ->format('F d, Y');

        return $to;
    }

    public function getPendingCasualAttribute()
    {
        $cid = LeaveType::where('identifier','casual_leave')->get(['id']);
        $sid = LeaveType::where('identifier','short_leave')->get(['id']);

        $row_count =  Leave::where('user_id','=',$this->user_id)->where('leave_type','=',$cid[0]->id)->where('status','=','1')->count();

        if($row_count > 0)
        { 

            $fromDate = Leave::where('user_id','=',$this->user_id)->where('leave_type','=',$cid[0]->id)->where('status','=','1')->get(['from']);

            $toDate = Leave::where('user_id','=',$this->user_id)->where('leave_type','=',$cid[0]->id)->where('status','=','1')->get(['to']);

            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $fromDate[0]->from);
            $from = \Carbon\Carbon::createFromFormat('Y-m-d', $toDate[0]->to);
            $diff_in_days = $to->diffInDays($from);

            $diff_in_days = $diff_in_days + 1;
        }
        else
        {
            $diff_in_days = 0;

        }
        $pending_count = 12 - $diff_in_days;

        return $pending_count;

    }

    public function getPendingHalfAttribute()
    {
        $cid = LeaveType::where('identifier','casual_leave')->get(['id']);
        $hid = LeaveType::where('identifier','half_day_leave')->get(['id']);

        $row_count =  Leave::where('user_id','=',$this->user_id)->where('leave_type','=',$cid[0]->id)->where('status','=','1')->count();

        if($row_count > 0)
        {
            $fromDate = Leave::where('user_id','=',$this->user_id)->where('leave_type','=',$cid[0]->id)->where('status','=','1')->get(['from']);

            $toDate = Leave::where('user_id','=',$this->user_id)->where('leave_type','=',$cid[0]->id)->where('status','=','1')->get(['to']);
           
            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $fromDate[0]->from);
            $from = \Carbon\Carbon::createFromFormat('Y-m-d', $toDate[0]->to);
            $diff_in_days = $to->diffInDays($from);

            $diff_in_days = $diff_in_days + 1;
        }
        else
        {
            $diff_in_days = 0;

        }

        $casual_count = 12 - $diff_in_days;

        $half_count = Leave::where('user_id','=',$this->user_id)->where('leave_type','=',$hid[0]->id)->where('status','=','1')->count();

        $pending_half = $casual_count * 2 - $half_count;

        return $pending_half;

    }

    public function getFormattedStatusAttribute() {

        if($this->status == 0)
            $status = 'Unapproved';
        elseif($this->status == 1)
            $status = 'Approved';
        elseif($this->status == 2)
            $status = 'In-process';
        elseif($this->status == 3)
            $status = 'Applied';
        return $status;
    }



}
