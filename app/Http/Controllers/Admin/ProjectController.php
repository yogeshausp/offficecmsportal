<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ProjectDetail;

class ProjectController extends Controller
{
    
    public function index()
    {
        $get_projects = ProjectDetail::get(['*']);                                               
        return view('admin-view.listing-projects',['get_projects_data'=> $get_projects]);
    }

    public function project_add()
    {
        return view('admin-view.project-add');
    }

    public function insert_project(Request $request)
    {
        $validatedData = $request->validate([
            'project_name' => 'required',
            'client_name' => 'required',
            'project_url' => 'required',
            'platform' => 'required',
            'designer' => 'required',
            'developer' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $project_insert = new ProjectDetail;
        $project_insert->project_name = $request->input('project_name');
        $project_insert->client_name = $request->input('client_name');
        $project_insert->project_url = $request->input('project_url');
        $project_insert->platform = $request->input('platform');
        $project_insert->designer = $request->input('designer');
        $project_insert->developer = $request->input('developer');
        $project_insert->username = $request->input('username');
        $project_insert->password = $request->input('password');
        $project_insert->description = $request->input('description');
        $project_insert->status = '1';
        
        $project_insert->save();

        return redirect('/project-add')->with('status',"Insert successfully");
    }

    public function get_project_detail($id)
    {
        $get_project_detail = ProjectDetail::where('id','=',$id)->get(['*']);

        return view('admin-view.detail-project',['get_project_detail_data'=>$get_project_detail]);
    }


    public function project_edit($id)
    {
        $get_project_detail_data = ProjectDetail::where('id','=',$id)->get(['*']);
        
        return view('admin-view.edit-project',['get_project_detail_data'=>$get_project_detail_data]);
    }


    public function update_project(Request $request, $id)
    {
        $validatedData = $request->validate([
            'project_name' => 'required',
            'client_name' => 'required',
            'project_url' => 'required',
            'platform' => 'required',
            'designer' => 'required',
            'developer' => 'required',
            'username' => 'required',
            'password' => 'required',
            'status' => 'required'
        ]);

              
        ProjectDetail::where('id', $id)->update([

            'project_name' => $request->input('project_name'),
            'client_name' => $request->input('client_name'),
            'project_url' => $request->input('project_url'),
            'platform' => $request->input('platform'),
            'designer' => $request->input('designer'),
            'developer' => $request->input('developer'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        return redirect('/project-edit/'.$id)->with('status',"Update successfully");
    }

    public function delete_project(Request $request, $id)
    {
        ProjectDetail::where('id', $id)->delete();
        return redirect('/project-list')->with('status',"Delete successfully");
    }

}
