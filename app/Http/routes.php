<?php

/**
 * Agents Routes
 *
 */

Route::get('/', 'AgentController@index');
Route::get('/attendance','AgentController@showAttendance');



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



