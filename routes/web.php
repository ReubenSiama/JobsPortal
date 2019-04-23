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

Route::get('/', 'HomeController@index');
Route::get('/contact_us','HomeController@contact_us');
Route::get('/login','HomeController@login')->name('login');
Route::get('/signup','HomeController@signup');
Route::post('/post_register','HomeController@post_register')->name('register');
Route::post('/post_login','HomeController@post_login')->name('post_login');
Route::get('/view_job/{id}','HomeController@getJob')->name('single_job');
Route::get('/view_all','HomeController@view_all_jobs')->name('view_all');
Route::get('/category/{id}','HomeController@get_category_job')->name('category_job');
Route::get('/all_categories','HomeController@get_all_categories')->name('all_categories');
Route::get('/search','HomeController@get_search')->name('search');

Route::middleware(['auth'])->group(function(){
    Route::get('/logout','HomeController@logout');
    Route::get('/apply_job/{id}','HomeController@apply_job')->name('apply');
    Route::post('/post_apply/{id}','HomeController@post_apply')->name('post_apply');
    Route::get('/profile','HomeController@getProfile');
});
// admin
Route::prefix('admin')->middleware(['admin'])->group(function(){
    Route::get('/','AdminController@index')->name('admin_home');
    Route::get('/skills','AdminController@skills')->name('skills');
    Route::get('/locations','AdminController@locations')->name('locations');
    Route::post('/add_skill','AdminController@addSkill');
    Route::post('/add_location','AdminController@addLocation')->name('add_location');
    Route::get('/company/companies','AdminController@companies')->name('companies');
    Route::get('/company/add_company','AdminController@add_company')->name('add.company');
    Route::post('/post_add_company','AdminController@post_add_company');
    Route::put('/post_add_company','AdminController@post_update_company');
    Route::get('/job/add_job','AdminController@add_job')->name('addJob');
    Route::post('/post_add_job','AdminController@post_add_job')->name('post_job');
    Route::put('/post_add_job','AdminController@post_update_job')->name('post_job');
    Route::get('/job/add_category','AdminController@add_category')->name('addCategory');
    Route::post('/post_add_category','AdminController@post_add_category')->name('post_category');
    Route::get('/qualification','AdminController@qualification')->name('qualification');
    Route::post('/add_qualification','AdminController@add_qualification')->name('add_qualification');
    Route::get('/job/applications','AdminController@application_list')->name('applications');
    Route::delete('/delete','AdminController@delete')->name('delete');
    Route::put('/edit','AdminController@edit')->name('edit');
    Route::get('/edit_company/{id}','AdminController@edit_company')->name('edit_company');
    Route::get('/view_company/{id}','AdminController@view_company')->name('view_company');
    Route::get('/view_job/{id}','AdminController@view_job')->name('view_job');
    Route::get('/edit_job/{id}','AdminController@edit_job')->name('edit_job');
    Route::post('/shortlist/{id}','AdminController@shortlist')->name('shortlist');
    Route::post('/reject/{id}','AdminController@reject')->name('reject');
});
