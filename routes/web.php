<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use Rap2hpoutre\FastExcel\FastExcel;
use App\User;
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

//Show data emp
Route::get('/pegawai',[EmployeeController::class, 'index'])->name('pegawai');

//add data emp
Route::get('/addData',[EmployeeController::class, 'addData'])->name('addData');

Route::post('/insertData',[EmployeeController::class, 'insertData'])->name('insertData');


//EDIT DATA
//get data based on ID
Route::get('/showDataEmployee/{id}',[EmployeeController::class, 'showDataEmployee'])->name('showDataEmployee');
Route::post('/updateDataEmployee/{id}',[EmployeeController::class, 'updateDataEmployee'])->name('updateDataEmployee');

//Delete Data
Route::get('/deleteDataEmployee/{id}',[EmployeeController::class, 'deleteDataEmployee'])->name('deleteDataEmployee');

// Export PDF
Route::get('/exportPDF',[EmployeeController::class, 'exportPDF'])->name('exportPDF');

// Export PDF
//Route::get('/exportExcel',[EmployeeController::class, 'exportExcel'])->name('exportExcel');

Route::get('/exportExcel', function () {
    //$okay= Employee::all();
    //return (new FastExcel($okay))->export('file.xlsx');
    return (new FastExcel(Employee::all()))->download('file.xlsx');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//login
Route::get('/login', [LoginController::class, 'login'])->name('login'); //login linking
Route::get('/loginProcess', [LoginController::class, 'loginProcess'])->name('loginProcess');

//register
Route::get('/register', [LoginController::class, 'register'])->name('register'); //register linking
Route::post('/create', [RegisterController::class, 'create'])->name('create');

//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); //logout linking
