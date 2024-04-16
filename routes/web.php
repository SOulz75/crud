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
})->middleware('auth');;

//Show data emp
Route::get('/pegawai',[EmployeeController::class, 'index'])->name('pegawai')->middleware('auth');

//add data emp
Route::get('/addData',[EmployeeController::class, 'addData'])->name('addData')->middleware('auth');;

Route::post('/insertData',[EmployeeController::class, 'insertData'])->name('insertData')->middleware('auth');;


//EDIT DATA
//get data based on ID
Route::get('/showDataEmployee/{id}',[EmployeeController::class, 'showDataEmployee'])->name('showDataEmployee')->middleware('auth');;
Route::post('/updateDataEmployee/{id}',[EmployeeController::class, 'updateDataEmployee'])->name('updateDataEmployee')->middleware('auth');;

//Delete Data
Route::get('/deleteDataEmployee/{id}',[EmployeeController::class, 'deleteDataEmployee'])->name('deleteDataEmployee')->middleware('auth');;

// Export PDF
Route::get('/exportPDF',[EmployeeController::class, 'exportPDF'])->name('exportPDF')->middleware('auth');;

// Export PDF
//Route::get('/exportExcel',[EmployeeController::class, 'exportExcel'])->name('exportExcel');

Route::get('/exportExcel', function () {
    //$okay= Employee::all();
    //return (new FastExcel($okay))->export('file.xlsx');
    return (new FastExcel(Employee::all()))->download('file.xlsx');
})->middleware('auth');;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');;

//login
Route::get('/login', [LoginController::class, 'login'])->name('login'); //login linking
Route::get('/loginProcess', [LoginController::class, 'loginProcess'])->name('loginProcess');

//register
Route::get('/register', [LoginController::class, 'register'])->name('register'); //register linking
Route::post('/create', [RegisterController::class, 'create'])->name('create');

//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth'); //logout linking

//function for count total?
Route::get('/countingEmp', function () {
    $totalEmployee = Employee::count();
    $totalManEmp = Employee::where('gender', 'man')->count();
    $totalWomanEmp = Employee::where('gender', 'woman')->count();
})->middleware('auth');;
