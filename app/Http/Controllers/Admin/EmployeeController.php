<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Employee;
use App\Employee_meta;
use DB;


class EmployeeController extends Controller
{
    
    public function index()
    {
        $get_employees = DB::select('select emp_id,emp_name,designation,department,email,date_of_birth,date_of_joining,status from employees');
                                                
        return view('admin-view.listing-employees',['get_employees_data'=> $get_employees]);
    }

    public function employee_add()
    {
        $get_designations = DB::select('select * from designations');

        $get_departments = DB::select('select * from departments');
        
        return view('admin-view.employee-add',['get_designations_data'=>$get_designations,'get_departments_data'=>$get_departments]);
    }

    public function insert_employee(Request $request)
    {
        $validatedData = $request->validate([
            'emp_id' => 'required',
            'emp_name' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'department' => 'required',
            'doj' => 'required',
            'salary' => 'required',
            'contact' => 'required',
            'alt_contact' => 'required',
            'aadhar_number' => 'required',
            'bank_name' => 'required',
            'acc_number' => 'required',
            'branch_name' => 'required',
            'ifsc' => 'required',
        ]);

        $employee_insert = new Employee;
        $employee_insert->emp_id = $request->input('emp_id');
        $employee_insert->emp_name = $request->input('emp_name');
        $employee_insert->designation = $request->input('designation');
        $employee_insert->department = $request->input('department');
        $employee_insert->email = $request->input('email');
        $employee_insert->address = $request->input('address');
        $employee_insert->city = $request->input('city');
        $employee_insert->state = $request->input('state');
        $employee_insert->contact = $request->input('contact');
        $employee_insert->salary = $request->input('salary');
        $employee_insert->guardian_name = $request->input('gname');
        $employee_insert->guardian_contact = $request->input('gcontact');
        $employee_insert->date_of_birth = $request->input('dob');
        $employee_insert->date_of_joining = $request->input('doj');
        $employee_insert->status = 1;
        
        $employee_insert->save();

        $emp_id = $employee_insert->id;

        $employee_meta_insert = new Employee_meta;
        $employee_meta_insert->employee_id = $emp_id;
        $employee_meta_insert->alternate_contact = $request->input('alt_contact');
        $employee_meta_insert->age = $request->input('age');
        $employee_meta_insert->aadhar_number = $request->input('aadhar_number');
        $employee_meta_insert->pan_number = $request->input('pan_number');
        $employee_meta_insert->blood_group = $request->input('bgroup');
        $employee_meta_insert->bank_name = $request->input('bank_name');
        $employee_meta_insert->account_number = $request->input('acc_number');
        $employee_meta_insert->branch_name = $request->input('branch_name');
        $employee_meta_insert->ifsc_code = $request->input('ifsc');

        $employee_meta_insert->save();

        return redirect('/employee-add')->with('status',"Insert successfully");
    }

    public function get_employee_list()
    {
        $get_employees = Employee::get(['*']);

        return view('admin-view.listing-employees',['get_employees_data'=>$get_employees]);
    }

    public function get_employee_detail($id)
    {
        $get_employees_detail = Employee::join('employee_metas','employee_metas.employee_id','=','employees.id')
              		->get(['employees.*','employee_metas.*']);

        return view('admin-view.detail-employee',['get_employees_detail_data'=>$get_employees_detail]);
    }



    public function employee_edit($id)
    {
        $get_designations_data = DB::select('select * from designations');

        $get_departments_data = DB::select('select * from departments');

        $get_employees_detail_data = Employee::join('employee_metas','employee_metas.employee_id','=','employees.id')
              		->get(['employees.*','employee_metas.*']);
        
        return view('admin-view.edit-employee',['get_designations_data'=>$get_designations_data,'get_departments_data'=>$get_departments_data, 'get_employees_detail_data'=>$get_employees_detail_data]);
    }


    public function update_employee(Request $request, $id)
    {
        $validatedData = $request->validate([
            'emp_id' => 'required',
            'emp_name' => 'required',
            'email' => 'required',
            'designation' => 'required',
            'department' => 'required',
            'doj' => 'required',
            'salary' => 'required',
            'contact' => 'required',
            'alt_contact' => 'required',
            'aadhar_number' => 'required',
            'bank_name' => 'required',
            'acc_number' => 'required',
            'branch_name' => 'required',
            'ifsc' => 'required',
        ]);

              
        Employee::where('id', $id)
       ->update([

            'emp_id' => $request->input('emp_id'),
            'emp_name' => $request->input('emp_name'),
            'designation' => $request->input('designation'),
            'department' => $request->input('department'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'contact' => $request->input('contact'),
            'salary' => $request->input('salary'),
            'guardian_name' => $request->input('gname'),
            'guardian_contact' => $request->input('gcontact'),
            'date_of_birth' => $request->input('dob'),
            'date_of_joining' => $request->input('doj'),
            'status' => 1

        ]);

        $meta_id = Employee_meta::where('employee_id','=', $id)->get(['id']);

        $mid =  $meta_id[0]->id;

        Employee_meta::where('id', $mid)
        ->update([

            'employee_id' => $id,
            'alternate_contact' => $request->input('alt_contact'),
            'age' => $request->input('age'),
            'aadhar_number' => $request->input('aadhar_number'),
            'pan_number' => $request->input('pan_number'),
            'blood_group' => $request->input('bgroup'),
            'bank_name' => $request->input('bank_name'),
            'account_number' => $request->input('acc_number'),
            'branch_name' => $request->input('branch_name'),
            'ifsc_code' => $request->input('ifsc')

        ]);

        return redirect('/employee-edit/'.$id)->with('status',"Update successfully");
    }


    public function delete_employee(Request $request, $id)
    {
        $meta_id = Employee_meta::where('employee_id','=', $id)->get(['id']);

        $mid =  $meta_id[0]->id;
    
        Employee_meta::where('id', $mid)->delete();
        
        Employee::where('id', $id)->delete();

        return redirect('/employee-list')->with('status',"Delete successfully");

    }
}
