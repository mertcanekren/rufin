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

Route::get('/', array('uses' => 'DashboardController@dashboard', 'as' => 'home', 'before' => 'auth'));
Route::get('/dashboard', array('uses' => 'DashboardController@dashboard', 'as' => 'dashboard', 'before' => 'auth'));

/* Talep */
Route::get('/new-issue', array('uses' => 'IssueController@newIssue', 'as' => 'new-issue', 'before' => 'auth'));
Route::post('/add-issue', array('uses' => 'IssueController@addIssue', 'as' => 'add-issue', 'before' => 'auth'));
Route::get('/issue/{id}', array('uses' => 'IssueController@getIssue', 'as' => 'issue', 'before' => 'auth'));
Route::get('/issue/{id}/edit', array('uses' => 'IssueController@editIssuePage', 'as' => 'edit-issue', 'before' => 'auth'));
Route::post('/edit-issue', array('uses' => 'IssueController@editIssue', 'as' => 'editing-issue', 'before' => 'auth'));
/* Talep */

/* Proje */
Route::get('/new-project', array('uses' => 'ProjectController@newProject', 'as' => 'new-project', 'before' => 'auth'));
Route::post('/add-project', array('uses' => 'ProjectController@addProject', 'as' => 'add-project', 'before' => 'auth'));
Route::get('/project/{id}', array('uses' => 'ProjectController@getProject', 'as' => 'get-project', 'before' => 'auth'));
Route::get('/project/{id}/edit', array('uses' => 'ProjectController@editProjectPage', 'as' => 'edit-project', 'before' => 'auth'));
Route::post('/edit-project', array('uses' => 'ProjectController@editProject', 'as' => 'editing-project', 'before' => 'auth'));
/* Proje */


/* Kullanıcı */
Route::get('/login', array('uses' => 'UserController@login', 'as' => 'login'));
Route::post('/signin', array('uses' => 'UserController@signIn', 'as' => 'signin'));
Route::get('/logout', array('uses' => 'UserController@logout', 'as' => 'logout', 'before' => 'auth'));
Route::get('/profile/{id}', array('uses' => 'UserController@profile', 'as' => 'profile', 'before' => 'auth'));
/* Kullanıcı */

/* Ajax */
Route::get('/getProjectsList', array('uses' => 'AjaxController@getProjectsList', 'as' => 'get-projectslist', 'before' => 'auth'));
Route::post('/workIssue', array('uses' => 'AjaxController@workIssue', 'as' => 'work-issue', 'before' => 'auth'));
/* Ajax*/

/* Kullanıcı */
Route::get('/settings', array('uses' => 'SettingsController@index', 'as' => 'settings'));

/* Kullanıcı */
