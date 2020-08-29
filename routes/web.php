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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@allpatients')->name('allpatients');
Route::get('patientregister','HomeController@patientregister')->name('patientregister');
Route::post('patientsave','HomeController@patientsave')->name('patientsave');
Route::get('allpatients','HomeController@allpatients')->name('allpatients');
Route::get('patientrecords/{id}','HomeController@patientrecords')->name('patientrecords');
Route::get('editpatient/{id}','HomeController@editpatient')->name('editpatient');
Route::post('patienteditsave','HomeController@patienteditsave')->name('patienteditsave');
Route::get('weight/{id}','HomeController@weight')->name('weight');
Route::post('saveweight','HomeController@saveweight')->name('saveweight');
// Route::get('plotteddata/{id}','ChartController@plotteddata')->name('plotteddata');
Route::get('vaccines/{id}','HomeController@vaccines')->name('vaccines');
// Route::get('chartline/{id}','ChartController@pchartline')->name('chartline');
Route::post('providedvaccine','HomeController@providedvaccine')->name('providedvaccine');

Route::post('savevaccine','HomeController@savevaccine')->name('savevaccine');
Route::get('users','HomeController@users')->name('users');
Route::get('editstaff/{id}','HomeController@editstaff')->name('editstaff');
Route::post('saveuser','HomeController@saveuser')->name('saveuser');
Route::get('staffregistration','HomeController@staffregistration')->name('staffregistration');
Route::post('saveregistration','HomeController@saveregistration')->name('saveregistration');
Route::get('medicaldetails/{id}/{vid}/{whz}','HomeController@medicaldetails')->name('medicaldetails');
Route::post('savemedics','HomeController@savemedics')->name('savemedics');
Route::get('recordspdf/{id}/{vid}/{whz}','HomeController@recordspdf')->name('recordspdf');
Route::get('password','HomeController@password')->name('password');
Route::post('passwordsave','HomeController@passwordsave')->name('passwordsave');
