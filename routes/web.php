<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
