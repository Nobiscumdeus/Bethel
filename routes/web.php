<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BethelTabernacleController;
use App\Http\Controllers\SundaybethelattendanceController;
use App\Http\Controllers\WednesdaybethelattendanceController;
use App\Http\Controllers\SundayChartController;
use App\Http\Controllers\WednesdayChartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/** Routes for the simpe CRUD Application  */



/** Routes for the BethelAttendance Application  */
Route::get('/home', 'App\Http\Controllers\SundaybethelattendanceController@index')->name('bethelattendance.index');
Route::get('/bethelattendace','App\Http\Controllers\SundaybethelattendanceController@home')->name('bethelattendance.home');

Route::post('/bethelattendance/sunday', 'App\Http\Controllers\SundaybethelattendanceController@store')->name('bethelattendancesunday.store');
Route::post('/bethelattendance/wednesday', 'App\Http\Controllers\WednesdaybethelattendanceController@store')->name('bethelattendancewednesday.store');


Route::get('/bethelattendance/sundaychart', 'App\Http\Controllers\SundayChartController@show')->name('sundaychartcontroller');
//Route::post('/bethelattendance/sundaychart','App\Http\Controllers\SundayChartController@show')->middleware('web');

Route::get('/bethelattendance/wednesdaychart', 'App\Http\Controllers\WednesdayChartController@show')->name('wednesdaychartcontroller');

Route::get('/bethelattendance/sunday', 'App\Http\Controllers\SundayChartController@index')->name('bethelattendance.sundaychart');
Route::get('/bethelattendance/wednesday', 'App\Http\Controllers\WednesdayChartController@index')->name('bethelattendance.wednesdaychart');

Route::get('/bethelattendance/sundaytable','App\Http\Controllers\SundayChartController@sundaytable')->name('bethelattendance.sundaytable');
Route::get('/bethelattendance/wednesdaytable','App\Http\Controllers\WednesdayChartController@wednesdaytable')->name('bethelattendance.wednesdaytable');
Route::get('bethelattendance/sundayform','App\Http\Controllers\SundayChartController@sundayform')->name('bethelattendance.sundayform');

Route::get('bethelattendance/wednesdayform','App\Http\Controllers\WednesdayChartController@wednesdayform')->name('bethelattendance.wednesdayform');