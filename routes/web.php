<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');


Route::group(['middleware' => 'admin'], function () {
                Route::get('/admin', 'AdminController@index')->name('admin');
                Route::get('/calender', 'AdminController@calender')->name('admin');
                Route::get('/charts', 'AdminController@charts')->name('chssarts');
                Route::get('/inbox', 'AdminController@inbox')->name('inbox');
                Route::get('/compose', 'AdminController@compose')->name('compose');
                Route::get('/read-mail', 'AdminController@read_mail')->name('read-mail');
                Route::get('/user-manage', 'AdminController@user_manage')->name('user-manage');
                Route::get('/projects', 'AdminController@projects')->name('projects');
                Route::post('/projects', 'AdminController@insert_projects')->name('projects');
                Route::get('/task-add', 'AdminController@task_add')->name('task_add');
                Route::post('/task-add', 'AdminController@insert_task')->name('task-add');
                Route::get('/task-list', 'AdminController@get_task_listed')->name('task-list');
                Route::get('/project-listing', 'AdminController@user_project_listing')->name('project-listing');

                Route::get('/holiday-list', 'Admin\HolidayController@index')->name('admin');
                Route::post('/holiday-add', 'Admin\HolidayController@insert_holiday')->name('holiday-add');
                Route::get('/holiday-update/{id}', 'Admin\HolidayController@update_holiday')->name('holiday-update');
                Route::get('/holiday-edit/{id}', 'Admin\HolidayController@get_holiday')->name('holiday-get');
                Route::get('/holiday-delete/{id}', 'Admin\HolidayController@delete_holiday')->name('holiday-delete');


                Route::get('/designation-list', 'Admin\DesignationController@index')->name('admin');
                Route::post('/designation-add', 'Admin\DesignationController@insert_designation');
                Route::get('/designation-update/{id}', 'Admin\DesignationController@update_designation');
                Route::get('/designation-edit/{id}', 'Admin\DesignationController@get_designation');
                Route::get('/designation-delete/{id}', 'Admin\DesignationController@delete_designation');



                Route::get('/department-list', 'Admin\DepartmentController@index')->name('admin');
                Route::post('/department-add', 'Admin\DepartmentController@insert_department');
                Route::get('/department-update/{id}', 'Admin\DepartmentController@update_department');
                Route::get('/department-edit/{id}', 'Admin\DepartmentController@get_department');
                Route::get('/department-delete/{id}', 'Admin\DepartmentController@delete_department');


                Route::get('/employee-add', 'Admin\EmployeeController@employee_add');
                Route::post('/employee-add', 'Admin\EmployeeController@insert_employee');
                Route::get('/employee-list', 'Admin\EmployeeController@get_employee_list');
                Route::get('/employee-detail/{id}', 'Admin\EmployeeController@get_employee_detail');
                Route::get('/employee-edit/{id}', 'Admin\EmployeeController@employee_edit');
                Route::post('/employee-update/{id}', 'Admin\EmployeeController@update_employee');
                Route::get('/employee-delete/{id}','Admin\EmployeeController@delete_employee');



                Route::get('/leaveType-list', 'Admin\LeaveTypeController@index');
                Route::post('/leaveType-add', 'Admin\LeaveTypeController@insert_leaveType');
                Route::get('/leaveType-update/{id}', 'Admin\LeaveTypeController@update_leaveType');
                Route::get('/leaveType-edit/{id}', 'Admin\LeaveTypeController@get_leaveType');
                Route::get('/leaveType-delete/{id}', 'Admin\LeaveTypeController@delete_leaveType');


                Route::get('/leave-add', 'Admin\LeaveController@leave_add');
                Route::post('/leave-add', 'Admin\LeaveController@insert_leave');
                Route::get('/leave-list', 'Admin\LeaveController@index')->name('leaveList');
                Route::get('/leave-edit/{id}', 'Admin\LeaveController@leave_edit');
                Route::post('/leave-update/{id}', 'Admin\LeaveController@update_leave');
                Route::get('/leave-delete/{id}', 'Admin\LeaveController@delete_leave');
                Route::get('/leave-filter/{id}', 'Admin\LeaveController@filter')->name('leaveFilter');
                Route::get('/leave-filter','Admin\LeaveController@filters')->name('leave-filter');

                Route::get('/notification-list', 'Admin\NotificationController@index')->name('admin');
                Route::post('/notification-add', 'Admin\NotificationController@insert_notification')->name('notification-add');
                Route::get('/notification-update/{id}', 'Admin\NotificationController@update_notification')->name('notification-update');
                Route::get('/notification-edit/{id}', 'Admin\NotificationController@get_notification')->name('notification-get');
                Route::get('/notification-delete/{id}', 'Admin\NotificationController@delete_notification')->name('notification-delete');


                Route::get('/project-add', 'Admin\ProjectController@project_add');
                Route::get('/project-list', 'Admin\ProjectController@index')->name('admin');
                Route::post('/project-add', 'Admin\ProjectController@insert_project');
                Route::get('/project-detail/{id}', 'Admin\ProjectController@get_project_detail');
                Route::get('/project-edit/{id}', 'Admin\ProjectController@project_edit');
                Route::post('/project-update/{id}', 'Admin\ProjectController@update_project');
                Route::get('/project-delete/{id}','Admin\ProjectController@delete_project');

                // Route::get('/calendar-event', 'CalenderController@index')->name('admin');
                // Route::get('/calendar-crud-ajax', 'CalenderController@calendarEvents')->name('admin');

    
});

Route::group(['middleware' => 'user'], function () {

  Route::get('/user', 'UserController@index')->name('user');
    Route::get('/user-mytask', 'UserController@user_mytask')->name('user-mytask');
      Route::get('/user-project-report', 'UserController@user_project_report')->name('user-project-report');
        Route::post('/user-project-report', 'UserController@insert_project_reports')->name('user-project-report');
});

//Route::get('/home', 'HomeController@index')->name('home');
