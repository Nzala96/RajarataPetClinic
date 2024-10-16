<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 //get all appointments
Route::get('appointments', 'App\Http\Controllers\AppointmentController@getAppointment');

//get specific appointments
Route::get('appointment/{id}','App\Http\Controllers\AppointmentController@getAppointmentById');

//create appointment
Route::post('addappointment', 'App\Http\Controllers\AppointmentController@addAppointment');

//Route::post('addappointment', [AppointmentController::class, 'addAppointment']); // Create appointment

//update appointment
Route::put('updateappointments/{id}', 'App\Http\Controllers\AppointmentController@updateAppointment');

//delete appointment
Route::delete('deleteappointment/{id}', 'App\Http\Controllers\AppointmentController@deleteAppointment');



//get all customer
Route::get('customers', 'App\Http\Controllers\CustomerController@getCustomer');

//get specific customer
Route::get('customer/{id}','App\Http\Controllers\CustomerController@getCustomerById');

//add customer
Route::post('addcustomer', 'App\Http\Controllers\CustomerController@addCustomer');

//update customer details
Route::put('updatecustomer/{id}', 'App\Http\Controllers\CustomerController@updateCustomer');

//delete customer
Route::delete('deletecustomer/{id}', 'App\Http\Controllers\CustomerController@deleteCustomer');


//get all doctors
Route::get('doctors', 'App\Http\Controllers\DocController@getDoctors');

//get specific
Route::get('doctor/{id}','App\Http\Controllers\DocController@getDoctorById');

//create
Route::post('addDoc', 'App\Http\Controllers\DocController@addDoc');

//update
Route::put('updatedoc/{id}', 'App\Http\Controllers\DocController@updateDoc');

//delete
Route::delete('deletedoc/{id}', 'App\Http\Controllers\DocController@deleteDoc');

// Get all users
Route::get('users', [UserController::class, 'getUsers']);

// Get a specific user by ID
Route::get('user/{id}', [UserController::class, 'getUserById']);

// Add a new user
Route::post('adduser', [UserController::class, 'addUser']);

// Update an existing user
Route::put('updateuser/{id}', [UserController::class, 'updateUser']);

// Delete a user
Route::delete('deleteuser/{id}', [UserController::class, 'deleteUser']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/signup', [AuthController::class, 'signup']);

