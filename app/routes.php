<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses' => 'DashboardController@dashboard', 'as' => 'dashboard'));
Route::get('/dashboard', array('uses' => 'DashboardController@dashboard', 'as' => 'dashboard'));
Route::get('/new-issue', array('uses' => 'IssueController@newIssue', 'as' => 'new-issue'));
Route::get('/login', array('uses' => 'UserController@login', 'as' => 'login'));
Route::get('/new-project', array('uses' => 'ProjectController@newProject', 'as' => 'new-project'));
Route::post('/add-project', array('uses' => 'ProjectController@addProject', 'as' => 'add-project'));
Route::get('/project/{id}', array('uses' => 'ProjectController@getProject', 'as' => 'get-project'));