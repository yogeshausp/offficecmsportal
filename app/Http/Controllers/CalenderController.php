<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Holiday;

class CalenderController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {  
            $data = Holiday::whereDate('start_date', '>=', $request->start)
                ->whereDate('end_date',   '<=', $request->end)
                ->get(['id', 'title', 'start_date', 'end_date']);
            return response()->json($data);
        }
        return view('admin-view.holidayCalender');
    }
 

    public function calendarEvents(Request $request)
    {
 
        switch ($request->type) {
           case 'create':
              $event = Holiday::create([
                  'title' => $request->event_name,
                  'start_date' => $request->event_start,
                  'end_date' => $request->event_end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'edit':
              $event = Holiday::find($request->id)->update([
                'title' => $request->event_name,
                'start_date' => $request->event_start,
                'end_date' => $request->event_end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Holiday::find($request->id)->delete();
  
              return response()->json($event);
             break;

             case 'fetch':
              $event = Holiday::where('id', '>=', 0)
                ->get(['id', 'title', 'start_date', 'end_date']);
                return response()->json($event);
             break;
             
           default:
             # ...
             break;
        }
    }

   
}
