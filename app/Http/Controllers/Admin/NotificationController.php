<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    
    public function index()
    {
        $get_notifications = Notification::get(['*']);

        return view('admin-view.listing-notifications',['get_notifications_data'=>$get_notifications]);
    }



    public function insert_notification(Request $request)
    {

        $validatedData = $request->validate([
            'subject' => 'required|max:255',
            'message' => 'required|max:1000',
        ]);
               
        $notification_insert = new Notification;
        $notification_insert->subject = $request->input('subject');
        $notification_insert->message = $request->input('message');
        $notification_insert->save();
                           
        return redirect()->to('/notification-list'); 

    }


    public function update_notification(Request $request, $id)
    {
        $validatedData = $request->validate([
            'subject' => 'required|max:255',
            'message' => 'required|max:1000',
        ]);
               
        $notification_edit = Notification::where('id', $id)->update([

            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json([ 'success' => true ]);
    }


    public function get_notification($id)
    {
    	$notification = Notification::find($id);

	    return response()->json([
	      'data' => $notification
	    ]);
    }


    public function delete_notification($id)
    {
    	$notification = Notification::where('id', $id)->delete();

        return response()->json([ 'success' => true ]);
	   
    }

}
