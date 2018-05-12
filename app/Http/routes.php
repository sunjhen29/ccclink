<?php

/**
 * Agents Routes
 *
 */

Route::get('/', 'AgentController@index');
Route::get('/attendance','AgentController@showAttendance');
Route::get('/punch','AgentController@showPunch');
Route::get('/agent_leave','AgentController@showLeave');
Route::post('/agent_leave/create','AgentController@createLeave');
Route::post('/agent_leave/{leave}/edit','AgentController@updateLeave');


Route::post('/tasks','TaskController@store');
Route::post('/task/{task}','TaskController@update');



//Agent Authentication
Route::auth();


/**
 * Admin Routes
 *
 */

//Login Routes...
Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
Route::post('/admin/login','AdminAuth\AuthController@login');
Route::get('/admin/logout','AdminAuth\AuthController@logout');

// Registration Routes...
Route::get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
Route::post('admin/register', 'AdminAuth\AuthController@register');

Route::post('admin/password/email','AdminAuth\PasswordController@sendResetLinkEmail');
Route::post('admin/password/reset','AdminAuth\PasswordController@reset');
Route::get('admin/password/reset/{token?}','AdminAuth\PasswordController@showResetForm');

Route::get('/admin', 'AdminController@index');


Route::get('/reports/login','ReportController@showLogin');
Route::get('/reports/activity','ReportController@showActivity');


Route::get('/users','UserController@index');
Route::post('/users/create','UserController@create');
Route::get('/user/{user}','UserController@showUser');
Route::post('/user/{user}/edit','UserController@update');
Route::get('/user/dept/{dept_id}','UserController@findByDeptId');


Route::get('/department','DepartmentController@index');
Route::post('/department/create','DepartmentController@create');
Route::get('/department/{dept}','DepartmentController@showDepartment');
Route::post('/department/{dept}/edit','DepartmentController@update');

Route::get('/leave_type','LeaveTypeController@index');
Route::post('/leave_type/create','LeaveTypeController@create');
Route::get('/leave_type/{leave_type}','LeaveTypeController@show');
Route::post('/leave_type/{leave_type}/edit','LeaveTypeController@update');

Route::get('/leave','LeaveController@index');
Route::post('/leave/create','LeaveController@create');
Route::get('/leave/{leave}','LeaveController@show');
Route::post('/leave/{leave}/edit','LeaveController@update');
Route::post('/leave/{leave}/approve','LeaveController@approve');
Route::post('/leave/{leave}/decline','LeaveController@decline');

Route::get('/settings/adminuser','AdminUserController@index');


Route::get('/timetable','LeaveController@index');
Route::post('/timetable/create','LeaveController@create');
Route::get('/timetable/{leave}','LeaveController@show');
Route::post('/timetable/{leave}/edit','LeaveController@update');
Route::post('/timetable/{leave}/approve','LeaveController@approve');
Route::post('/timetable/{leave}/decline','LeaveController@decline');



Route::get('/attendance/timerecord','ReportController@showTimeInOut');





Route::post('/dailytimerecord/create','DailyTimeRecordController@create');
Route::get('/dailytimerecord/{dtr}','DailyTimeRecordController@show');



Route::get('/email/login/{email}','EmailController@emailLogin');


Route::get('/imports/dtr','ImportController@dtr');
Route::post('/imports/dtr','ImportController@importDtr');


Route::get('/imports/timeinout','ImportController@TimeInOut');
Route::post('/imports/timeinout','ImportController@importTimeInOut');

Route::get('/imports/timelog','ImportController@TimeLog');
Route::post('/imports/timelog','ImportController@importTimeLog');
Route::get('/imports/biometric','ReportController@showBiometric');


Route::get('/exports/payroll','ExportController@export_payroll');


/** Test Controller */
Route::get('/test/sqlserver','TestController@sqlserver');

