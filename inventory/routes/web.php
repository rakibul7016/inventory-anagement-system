<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\CartController;

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

Route::get('/add-supplier',[supplierController::class,'addSupplier'])->name('add.supplier');
Route::post('/insert-supplier',[supplierController::class,'insertSupplier'])->name('insert.supplier');
Route::get('/all-supplier',[supplierController::class,'allSupplier'])->name('all.supplier');
Route::get('/delete-supplier/{id}',[supplierController::class,'deleteSupplier']);
Route::get('/view-supplier/{id}',[supplierController::class,'viewSupplier']);
Route::get('/edit-supplier/{id}',[supplierController::class,'editSupplier']);
Route::post('/update-supplier/{id}',[supplierController::class,'updateSupplier']);

// Advance salary
Route::get('/add-advance-salary',[SalaryController::class,'addsalary'])->name('add.advanceSalary');
Route::post('/insert-advance-salary',[SalaryController::class,'insertslary'])->name('insert.salary');
 Route::get('/all-pay-salary',[SalaryController::class,'allpaysalary'])->name('all.paysalary');


//  Catagory route
Route::get('/add-catagories',[CatagoryController::class,'addcatagories'])->name('add.catagories');
Route::post('/insert-catagories',[CatagoryController::class,'insertcatagories'])->name('insert.catagories');
Route::get('/all-catagories',[CatagoryController::class,'allcatagories'])->name('all.catagories');
Route::get('/delete-catagories/{id}',[CatagoryController::class,'deleteCatagories']);


// Product route
Route::get('/add-product',[ProductController::class,'addProduct'])->name('add.product');
Route::post('/insert-product',[ProductController::class,'insertProduct'])->name('insert.product');
Route::get('/all-product',[ProductController::class,'allProduct'])->name('all.product');
Route::get('/delete-product/{id}',[ProductController::class,'deleteProduct']);
Route::get('/view-product/{id}',[ProductController::class,'viewProduct']);
Route::get('/import-product',[ProductController::class,'importProduct'])->name('import.product');
Route::get('/export',[ProductController::class,'export'])->name('export');
Route::post('/import',[ProductController::class,'import'])->name('import');

// Attendance Route
Route::get('/take-attendance',[AttendanceController::class,'takeAttendance'])->name('take.attendance');
Route::post('/insert-attendance',[AttendanceController::class,'insertAttendance'])->name('insert.attendance');
Route::get('/all-attentance',[AttendanceController::class,'allAttendance'])->name('all.attendance');

// point Of sell (Pos)
Route::get('/point-of-sell',[PosController::class,'pos'])->name('pos');

// Cart Route
Route::post('/add-cart',[CartController::class,'index'])->name('add.cart');
Route::post('/cart-update/{rowId}',[CartController::class,'CartUpdate'])->name('cart.update');
Route::get('/cart-remove/{rowId}',[CartController::class,'CartRemove'])->name('cart.remove');
Route::get('/creat-invoice',[CartController::class,'CreatInvoice'])->name('creat.invoice');
Route::post('/final-invoice',[CartController::class,'FinalInvoice'])->name('final.invoice');

