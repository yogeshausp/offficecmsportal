<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Holiday;
use DB;

class HolidayController extends Controller
{



    public function index()
    {
        $get_holidays = DB::select('select id,title,start_date,end_date from holidays');

        $dataArray = array();
            
       foreach( $get_holidays as $get_holiday)
       {

           $start_date = $get_holiday->start_date;
           $end_date = $get_holiday->end_date;
           $title = $get_holiday->title;
           $id = $get_holiday->id;

           $newStartDate = \Carbon\Carbon::createFromFormat('Y-m-d', $start_date)
                    ->format('F d, Y');

           $newEndDate = \Carbon\Carbon::createFromFormat('Y-m-d', $end_date)
                    ->format('F d, Y');

           $data = array(
            "id" => $id,
            "title" => $title,
            "start_date" => $newStartDate,
            "end_date"=>$newEndDate
          );

          array_push($dataArray, $data);
        }
                                          
        return view('admin-view.listing-holidays',['get_holidays_data'=>$dataArray]);
    }



    public function insert_holiday(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
               
        $holiday_insert = new Holiday;
        $holiday_insert->title = $request->input('title');
        $holiday_insert->start_date = $request->input('start_date');
        $holiday_insert->end_date = $request->input('end_date');
        $holiday_insert->save();
                           
        return redirect()->to('/holiday-list'); 

    }


    public function update_holiday(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
               
        $holiday_edit = Holiday::where('id', $id)->update([

            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return response()->json([ 'success' => true ]);
    }


    public function get_holiday($id)
    {
    	$holiday = Holiday::find($id);

	    return response()->json([
	      'data' => $holiday
	    ]);
    }


    public function delete_holiday($id)
    {
    	$holiday = Holiday::where('id', $id)->delete();

        return response()->json([ 'success' => true ]);
	   
    }
}
