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
// Route::middleware('jwt.auth')->get('users', function(Request $request) {
//     return auth()->user();
// });
 Route::post('user/register', 'usersController@register');
 Route::post('user/login', 'usersController@login');
Route::resource('employees','EmployeeController');
Route::post('user/logout','usersController@logout');