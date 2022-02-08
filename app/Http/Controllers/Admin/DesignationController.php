<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Designation;
use DB;


class DesignationController extends Controller
{
    public function index()
    {
        $get_designations = DB::select('select id,title,identifier from designations');
                                                
        return view('admin-view.listing-designations',['get_designations_data'=> $get_designations]);
    }



    public function insert_designation(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $title = $request->input('title');
        $identifier = str_replace(' ', '_', strtolower($title));
               
        $designation_insert = new Designation;
        $designation_insert->title = $title;
        $designation_insert->identifier = $identifier;
        $designation_insert->save();
                           
        return redirect()->to('/designation-list'); 

    }


    public function update_designation(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        $title = $request->title;
        $identifier = str_replace(' ', '_', strtolower($title));
               
        $designation_edit = Designation::where('id', $id)->update([

            'title' => $title,
            'identifier' => $identifier,
        ]);

        return response()->json([ 'success' => true ]);
    }


    public function get_designation($id)
    {
    	$designation = Designation::find($id);

	    return response()->json([
	      'data' => $designation
	    ]);
    }


    public function delete_designation($id)
    {
    	$holiday = Designation::where('id', $id)->delete();

        return response()->json([ 'success' => true ]);
	   
    }
}
