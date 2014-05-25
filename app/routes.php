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

Route::get('/', array('uses' => 'DashboardController@dashboard', 'as' => 'home'));
Route::get('/dashboard', array('uses' => 'DashboardController@dashboard', 'as' => 'dashboard', 'before' => 'auth'));

/* Talep */
Route::get('/new-issue', array('uses' => 'IssueController@newIssue', 'as' => 'new-issue'));
Route::post('/add-issue', array('uses' => 'IssueController@addIssue', 'as' => 'add-issue'));
Route::get('/issue/{id}', array('uses' => 'IssueController@getIssue', 'as' => 'issue'));
Route::get('/issue/{id}/edit', array('uses' => 'IssueController@editIssue', 'as' => 'edit-issue'));

/* Talep */

/* Proje */
Route::get('/new-project', array('uses' => 'ProjectController@newProject', 'as' => 'new-project'));
Route::post('/add-project', array('uses' => 'ProjectController@addProject', 'as' => 'add-project'));
Route::get('/project/{id}', array('uses' => 'ProjectController@getProject', 'as' => 'get-project'));
/* Proje */


/* Kullanıcı */
Route::get('/login', array('uses' => 'UserController@login', 'as' => 'login'));
Route::post('/signin', array('uses' => 'UserController@signIn', 'as' => 'signin'));
Route::get('/logout', array('uses' => 'UserController@logout', 'as' => 'logout'));
Route::get('/profile/{id}', array('uses' => 'UserController@profile', 'as' => 'profile'));

/* Kullanıcı */

/* Ajax */
Route::get('/getProjectsList', array('uses' => 'AjaxController@getProjectsList', 'as' => 'get-projectslist'));

/* Ajax*/
