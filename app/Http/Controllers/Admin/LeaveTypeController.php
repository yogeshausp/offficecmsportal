<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\LeaveType;
use DB;

class LeaveTypeController extends Controller
{
    public function index()
    {
        $get_leave_type = LeaveType::get(['*']);
                                                
        return view('admin-view.listing-leavetypes',['get_leave_types_data'=> $get_leave_type]);
    }



    public function insert_leaveType(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $title = $request->input('title');
        $identifier = str_replace(' ', '_', strtolower($title));
               
        $leaveType_insert = new LeaveType;
        $leaveType_insert->title = $title;
        $leaveType_insert->identifier = $identifier;
        $leaveType_insert->save();
                           
        return redirect()->to('/leaveType-list'); 

    }


    public function update_leaveType(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $title = $request->title;
        $identifier = str_replace(' ', '_', strtolower($title));
               
        $department_edit = LeaveType::where('id', $id)->update([

            'title' => $title,
            'identifier' => $identifier,
        ]);

        return response()->json([ 'success' => true ]);
    }


    public function get_leaveType($id)
    {
    	$leaveType = LeaveType::find($id);

	    return response()->json([
	      'data' => $leaveType
	    ]);
    }


    public function delete_leaveType($id)
    {
    	$leaveType = LeaveType::where('id', $id)->delete();

        return response()->json([ 'success' => true ]);
	   
    }
}
