<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\ProjectReport;
use DB;

class UserController extends Controller
{
    public function index()
    {
        return view('users-view/dashboard');
    }
    
     public function user_mytask()
    {
    	 $get_tasks = DB::table('users')
        ->select('users.id','users.name','tasks.project_name','tasks.brief_slug','tasks.project_assign','tasks.created_at','tasks.updated_at')
        ->join('tasks','tasks.project_assign','=','users.id')
        ->get();

        return view('users-view/user-mytask-view',['get_tasks_data'=>$get_tasks]);
    }

    public function user_project_report()
    {
         $get_project_report = DB::table('users')
        ->select('tasks.id','users.name','tasks.project_name','tasks.brief_slug','tasks.project_assign','tasks.created_at','tasks.updated_at')
        ->join('tasks','tasks.project_assign','=','users.id')
        ->get();

        return view('users-view/user-project-report',['get_project_data'=>$get_project_report]);
    }

    public function insert_project_reports(Request $request)
    {
        $validatedData = $request->validate([
            'project_name' => 'required',
            'work_done' => 'required',
            'time_ded_project_fist' => 'required',
            'link_submission_project_fist' => 'required',
             'project_status' => 'required',
        ]);



        $project_reports_insert = new projectReport;
        $project_reports_insert->project_name = $request->input('project_name');
        $project_reports_insert->work_done = $request->input('work_done');
        $project_reports_insert->time_dedicated_details = $request->input('time_ded_project_fist');
        $project_reports_insert->link_submission_details = $request->input('link_submission_project_fist');
         
         $project_reports_insert->user_name = $request->input('user_name');
        $project_reports_insert->user_id = $request->input('user_id');
        $project_reports_insert->status = $request->input('project_status');
       

        $project_reports_insert->save();

        return redirect('/user-project-report')->with('status',"Insert successfully");
    }

}
