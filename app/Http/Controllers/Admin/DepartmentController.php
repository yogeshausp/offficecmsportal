<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Department;
use DB;

class DepartmentController extends Controller
{
    public function index()
    {
        $get_departments = DB::select('select id,title,identifier from departments');
                                                
        return view('admin-view.listing-departments',['get_departments_data'=> $get_departments]);
    }



    public function insert_department(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $title = $request->input('title');
        $identifier = str_replace(' ', '_', strtolower($title));
               
        $department_insert = new Department;
        $department_insert->title = $title;
        $department_insert->identifier = $identifier;
        $department_insert->save();
                           
        return redirect()->to('/department-list'); 

    }


    public function update_department(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $title = $request->title;
        $identifier = str_replace(' ', '_', strtolower($title));
               
        $department_edit = Department::where('id', $id)->update([

            'title' => $title,
            'identifier' => $identifier,
        ]);

        return response()->json([ 'success' => true ]);
    }


    public function get_department($id)
    {
    	$department = Department::find($id);

	    return response()->json([
	      'data' => $department
	    ]);
    }


    public function delete_department($id)
    {
    	$holiday = Department::where('id', $id)->delete();

        return response()->json([ 'success' => true ]);
	   
    }
}
