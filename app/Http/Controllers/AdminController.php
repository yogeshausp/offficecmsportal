<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Project;
use App\Task;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin-view/dashboard');
    }

    public function calender()
    {
        return view('admin-view.calender');
    }

    public function charts()
    {
        return view('admin-view.charts');
    }

     public function inbox()
    {
        return view('admin-view.inbox');
    }

     public function compose()
    {
        return view('admin-view.compose');
    }

     public function read_mail()
    {
        return view('admin-view.read-mail');
    }

     public function user_manage()
    {
        $users = DB::select('select * from users');
        return view('admin-view.user-manage-data',['get_user_data'=>$users]);
    }
    
     public function projects()
    {
       return view('admin-view.projects');
    }

     public function insert_projects(Request $request)
    {

         $validatedData = $request->validate([
            'project_name' => 'required',
            'project_details' => 'required',
            'project_slug' => 'required',
        ]);

        $project_insert = new project;
        $project_insert->role_id = $request->input('role');
        $project_insert->email = $request->input('email');
        $project_insert->user_id = $request->input('id');
        $project_insert->user_name = $request->input('name');

        $project_insert->project_name = $request->input('project_name');
        $project_insert->project_details = $request->input('project_details');
        $project_insert->project_slug = $request->input('project_slug');

        $project_insert->save();

        return redirect('/projects')->with('status',"Insert successfully");
    }

      public function task_add()
    {
       $projects = DB::select('select * from projects');
       $get_users = DB::select('select * from users');

       return view('admin-view.task-add',['get_projects_data'=>$projects,'get_users'=>$get_users]);
    }

    public function insert_task(Request $request)
    {
         $validatedData = $request->validate([
            'project_name' => 'required',
            'brief_slug' => 'required',
            'project_assign' => 'required',
        ]);

        $task_insert = new Task;
        $task_insert->role_id = $request->input('role');
        $task_insert->email = $request->input('email');
        $task_insert->user_id = $request->input('id');
        $task_insert->user_name = $request->input('name');


        $task_insert->project_name = $request->input('project_name');
        $task_insert->brief_slug = $request->input('brief_slug');
        $task_insert->project_assign = $request->input('project_assign');

         $task_insert->save();

        return redirect('/task-add')->with('status',"Insert successfully");
    }


    public function get_task_listed()
    {
       $get_tasks = DB::table('users')
        ->select('users.id','users.name','tasks.project_name','tasks.brief_slug','tasks.project_assign','tasks.created_at','tasks.updated_at')
        ->join('tasks','tasks.project_assign','=','users.id')
        ->get();


        //$get_tasks = DB::select('select * from tasks');
        return view('admin-view.listing-tasks',['get_tasks_data'=>$get_tasks]);
    }

    
     public function user_project_listing()
    {
      $user_roject_listing_details = DB::select('select * from project_reports');

       return view('admin-view.user-project-listing',['get_tasks_data'=>$user_roject_listing_details]);
    }


}
