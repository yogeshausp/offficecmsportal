<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\LeaveType;
use App\Leave;
use App\Employee;
use DB;

class LeaveController extends Controller
{
    public function index()
    {
        $get_leaves = Leave::get(['*']);
        $get_casual = Leave::where('leave_type','=','2')->get(['*']);
        $get_half = Leave::where('leave_type','=','3')->get(['*']);
        $get_short = Leave::where('leave_type','=','4')->get(['*']);
        $get_unpaid = Leave::where('leave_type','=','5')->get(['*']);
        $get_employees = Employee::get(['*']);
                                      
        return view('admin-view.listing-leaves',['get_leaves_data'=> $get_leaves,'get_casuals_data'=> $get_casual,'get_halves_data'=> $get_half,'get_shorts_data'=> $get_short,'get_unpaids_data'=> $get_unpaid,'get_employees_data'=> $get_employees]);
    }

    public function leave_add()
    {
        $get_employees = Employee::get(['*']);

        $get_leaves = LeaveType::get(['*']);
        
        return view('admin-view.leave-add',['get_employees_data'=>$get_employees,'get_leave_type_data'=>$get_leaves]);
    }

    public function insert_leave(Request $request)
    {
        $validatedData = $request->validate([
            'employee' => 'required',
            'leave_type' => 'required',
            'from' => 'required',
            'to' => 'required',
            'reason' => 'required'
        ]);

        $leave_insert = new Leave;
        $leave_insert->user_id = $request->input('employee');
        $leave_insert->leave_type = $request->input('leave_type');
        $leave_insert->from = $request->input('from');
        $leave_insert->to = $request->input('to');
        $leave_insert->reason = $request->input('reason');
        $leave_insert->status = 3;
        $leave_insert->save();

        return redirect('/leave-add')->with('status',"Insert successfully");
    }

    public function leave_edit($id)
    {
        $get_employees = Employee::get(['*']);

        $get_leaves = LeaveType::get(['*']);

        $get_leaves_detail = Leave::where('id','=',$id)->get(['*']);
                
        return view('admin-view.edit-leave',['get_employees_data'=>$get_employees,'get_leaves_data'=>$get_leaves,'get_leaves_detail_data'=>$get_leaves_detail]);
    }


    public function update_leave(Request $request, $id)
    {

        $validatedData = $request->validate([
            'employee' => 'required',
            'leave_type' => 'required',
            'from' => 'required',
            'to' => 'required',
            'reason' => 'required'
        ]);



        Leave::where('id', $id)
        ->update([

            'user_id' => $request->input('employee'),
            'leave_type' =>$request->input('leave_type'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'reason' => $request->input('reason'),
            'status' => $request->input('status'),
        ]);
        
        return redirect('/leave-edit/'.$id)->with('status',"Update successfully");

    }


    public function delete_leave(Request $request, $id)
    {                         
        Leave::where('id', $id)->delete();
        return redirect('/leave-list')->with('status',"Delete successfully");

    }
   
    public function filters(Request $request){
        $employee = $request->employee;
        $month = $request->month;
        $year = $request->year;
       
        $get_employees = Employee::get(['*']);
       
        if(empty($employee) && empty($month) && empty($year)){
            $get_leaves = Leave::get(['*']);
            $get_casual = Leave::where('leave_type','=','2')->get(['*']);
            $get_half = Leave::where('leave_type','=','3')->get(['*']);
            $get_short = Leave::where('leave_type','=','4')->get(['*']);
            $get_unpaid = Leave::where('leave_type','=','5')->get(['*']);
        }elseif(!empty($employee) && !empty($month) && !empty($year)){
            $get_leaves = Leave::where('user_id','=',$employee)->whereMonth('from','=',$month)->whereYear('from','=',$year)->get(['*']);
            $get_casual = Leave::where('leave_type','=','2')->where('user_id','=',$employee)->whereMonth('from','=',$month)->whereYear('from','=',$year)->get(['*']);
            $get_half = Leave::where('leave_type','=','3')->where('user_id','=',$employee)->whereMonth('from','=',$month)->whereYear('from','=',$year)->get(['*']);
            $get_short = Leave::where('leave_type','=','4')->where('user_id','=',$employee)->whereMonth('from','=',$month)->whereYear('from','=',$year)->get(['*']);
            $get_unpaid = Leave::where('leave_type','=','5')->where('user_id','=',$employee)->whereMonth('from','=',$month)->whereYear('from','=',$year)->get(['*']);
        }elseif(empty($employee) && !empty($month) && !empty($year)){
            $get_leaves = Leave::whereMonth('from','=',$month)->whereYear('from','=',$year)->get(['*']);
            $get_casual = Leave::where('leave_type','=','2')->whereMonth('from','=',$month)->whereYear('from','=',$year)->get(['*']);
            $get_half = Leave::where('leave_type','=','3')->whereMonth('from','=',$month)->whereYear('from','=',$year)->get(['*']);
            $get_short = Leave::where('leave_type','=','4')->whereMonth('from','=',$month)->whereYear('from','=',$year)->get(['*']);
            $get_unpaid = Leave::where('leave_type','=','5')->whereMonth('from','=',$month)->whereYear('from','=',$year)->get(['*']);
        }elseif(!empty($employee) && empty($month) && !empty($year)){
            $get_leaves = Leave::where('user_id','=',$employee)->whereYear('from','=',$year)->get(['*']);
            $get_casual = Leave::where('leave_type','=','2')->where('user_id','=',$employee)->whereYear('from','=',$year)->get(['*']);
            $get_half = Leave::where('leave_type','=','3')->where('user_id','=',$employee)->whereYear('from','=',$year)->get(['*']);
            $get_short = Leave::where('leave_type','=','4')->where('user_id','=',$employee)->whereYear('from','=',$year)->get(['*']);
            $get_unpaid = Leave::where('leave_type','=','5')->where('user_id','=',$employee)->whereYear('from','=',$year)->get(['*']);
        }elseif(!empty($employee) && !empty($month) && empty($year)){
            $get_leaves = Leave::where('user_id','=',$employee)->whereMonth('from','=',$month)->get(['*']);
            $get_casual = Leave::where('leave_type','=','2')->where('user_id','=',$employee)->whereMonth('from','=',$month)->get(['*']);
            $get_half = Leave::where('leave_type','=','3')->where('user_id','=',$employee)->whereMonth('from','=',$month)->get(['*']);
            $get_short = Leave::where('leave_type','=','4')->where('user_id','=',$employee)->whereMonth('from','=',$month)->get(['*']);
            $get_unpaid = Leave::where('leave_type','=','5')->where('user_id','=',$employee)->whereMonth('from','=',$month)->get(['*']);
        }elseif(!empty($employee) && empty($month) && empty($year)){
            $get_leaves = Leave::where('user_id','=',$employee)->get(['*']);
            $get_casual = Leave::where('leave_type','=','2')->where('user_id','=',$employee)->get(['*']);
            $get_half = Leave::where('leave_type','=','3')->where('user_id','=',$employee)->get(['*']);
            $get_short = Leave::where('leave_type','=','4')->where('user_id','=',$employee)->get(['*']);
            $get_unpaid = Leave::where('leave_type','=','5')->where('user_id','=',$employee)->get(['*']);
        }elseif(empty($employee) && !empty($month) && empty($year)){
            $get_leaves = Leave::whereMonth('from','=',$month)->get(['*']);
            $get_casual = Leave::where('leave_type','=','2')->whereMonth('from','=',$month)->get(['*']);
            $get_half = Leave::where('leave_type','=','3')->whereMonth('from','=',$month)->get(['*']);
            $get_short = Leave::where('leave_type','=','4')->whereMonth('from','=',$month)->get(['*']);
            $get_unpaid = Leave::where('leave_type','=','5')->whereMonth('from','=',$month)->get(['*']);
        }elseif(empty($employee) && empty($month) && !empty($year)){
            $get_leaves = Leave::whereYear('from','=',$year)->get(['*']);
            $get_casual = Leave::where('leave_type','=','2')->whereYear('from','=',$year)->get(['*']);
            $get_half = Leave::where('leave_type','=','3')->whereYear('from','=',$year)->get(['*']);
            $get_short = Leave::where('leave_type','=','4')->whereYear('from','=',$year)->get(['*']);
            $get_unpaid = Leave::where('leave_type','=','5')->whereYear('from','=',$year)->get(['*']);
        }else{
            $get_leaves = Leave::get(['*']);
            $get_casual = Leave::where('leave_type','=','2')->get(['*']);
            $get_half = Leave::where('leave_type','=','3')->get(['*']);
            $get_short = Leave::where('leave_type','=','4')->get(['*']);
            $get_unpaid = Leave::where('leave_type','=','5')->get(['*']);
        }
        return view('admin-view.listing-leaves',['get_leaves_data'=> $get_leaves,'get_casuals_data'=> $get_casual,'get_halves_data'=> $get_half,'get_shorts_data'=> $get_short,'get_unpaids_data'=> $get_unpaid,'get_employees_data'=> $get_employees]);
    }


}
