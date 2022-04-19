<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\customerController;
use Illuminate\Support\Facades\Route;

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
Route::get('/home', function () {
    return view('layouts.home');
});
Auth::routes(['verify' => true]);

Route::get('/home',[HomeController::class,'index'])->name('home');
// Employeess route
Route::get('/add-employee',[EmployeeController::class,'addEmployee'])->name('add.employee');
Route::post('/insert-employee',[EmployeeController::class,'insertEmployee'])->name('insert.employee');
Route::get('/all-employee',[EmployeeController::class,'allEmployee'])->name('all.employee');
Route::get('/delete-employee/{id}',[EmployeeController::class,'deleteEmployee']);
Route::get('/view-employee/{id}',[EmployeeController::class,'viewEmployee']);
Route::get('/edit-employee/{id}',[EmployeeController::class,'editEmployee']);
Route::post('/update-employee/{id}',[EmployeeController::class,'updateEmployee']);

// Customers route

Route::get('/add-customer',[customerController::class,'addCustomer'])->name('add.customer');
Route::post('/insert-customer',[customerController::class,'insertCustomer'])->name('insert.customer');
Route::get('/all-customer',[customerController::class,'allCustomer'])->name('all.customer');
Route::get('/delete-customer/{id}',[customerController::class,'deleteCustomer']);
Route::get('/view-customer/{id}',[customerController::class,'viewCustomer']);
Route::get('/edit-customer/{id}',[customerController::class,'editCustomer']);
Route::post('/update-customer/{id}',[customerController::class,'updateCustomer']);

// Suppliers route

Route::get('/add-customer',[customerController::class,'addCustomer'])->name('add.customer');
Route::post('/insert-customer',[customerController::class,'insertCustomer'])->name('insert.customer');
Route::get('/all-customer',[customerController::class,'allCustomer'])->name('all.customer');
Route::get('/delete-customer/{id}',[customerController::class,'deleteCustomer']);
Route::get('/view-customer/{id}',[customerController::class,'viewCustomer']);
Route::get('/edit-customer/{id}',[customerController::class,'editCustomer']);
Route::post('/update-customer/{id}',[customerController::class,'updateCustomer']);