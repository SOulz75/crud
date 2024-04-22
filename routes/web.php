<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TaskController;
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

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    //EmployeeeController - Admin
    //Dashboard
    Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('dashboard');
    //Show all emp data
    Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');
    //Add emp data
    Route::get('/addData', [EmployeeController::class, 'addData'])->name('addData');
    //Funct insert emp data into db
    Route::post('/insertData', [EmployeeController::class, 'insertData'])->name('insertData');
    //Edit Data
    Route::get('/showDataEmployee/{id}', [EmployeeController::class, 'showDataEmployee'])->name('showDataEmployee');
    Route::post('/updateDataEmployee/{id}', [EmployeeController::class, 'updateDataEmployee'])->name('updateDataEmployee');
    //Delete Data
    Route::get('/deleteDataEmployee/{id}', [EmployeeController::class, 'deleteDataEmployee'])->name('deleteDataEmployee');
    //Export PDF Data Emp
    Route::get('/exportPDF', [EmployeeController::class, 'exportPDF'])->name('exportPDF');


    //TaskController -  Admin
    //Show all task data
    Route::get('/taskData', [TaskController::class, 'index'])->name('taskData');
    //Add task data
    Route::get('/addTask', [TaskController::class, 'addTask'])->name('addTask');
    //Funct insert task data into db
    Route::post('/insertTask', [TaskController::class, 'insertTask'])->name('insertTask');
    //Edit Task
    Route::get('/showTask/{id}', [TaskController::class, 'showTask'])->name('showTask');
    Route::post('/updateTask/{id}', [TaskController::class, 'updateTask'])->name('updateTask');
    //Delete task
    Route::get('/deleteTask/{id}', [TaskController::class, 'deleteTask'])->name('deleteTask');
    //Export PDF task
    Route::get('/exportPDFTask', [TaskController::class, 'exportPDFTask'])->name('exportPDFTask');



});


//Export Excel Files Data Emp
Route::get('/exportExcel', function () {
    return (new FastExcel(Employee::all()))->download('file.xlsx');
})->middleware('auth');;

 //LoginController Admin
    //Login
    Route::get('/login', [LoginController::class, 'login'])->name('login'); //login linking
    Route::get('/loginProcess', [LoginController::class, 'loginProcess'])->name('loginProcess');
    //register
    Route::get('/register', [LoginController::class, 'register'])->name('register'); //register linking
    Route::post('/create', [RegisterController::class, 'create'])->name('create');
    //logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); //logout linking





// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');;

// //login
// Route::get('/login', [LoginController::class, 'login'])->name('login'); //login linking
// Route::get('/loginProcess', [LoginController::class, 'loginProcess'])->name('loginProcess');

// //register
// Route::get('/register', [LoginController::class, 'register'])->name('register'); //register linking
// Route::post('/create', [RegisterController::class, 'create'])->name('create');

// //logout
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth'); //logout linking



// Route::get('/dashboard',[EmployeeController::class, 'dashboard'])->name('dashboard')->middleware('auth');
// Route::get('/', function () {
//     return view('dashboard');
// })->middleware('auth');;
// //Show data emp
// Route::get('/pegawai',[EmployeeController::class, 'index'])->name('pegawai')->middleware('auth');
// //add data emp
// Route::get('/addData',[EmployeeController::class, 'addData'])->name('addData')->middleware('auth');;
// Route::post('/insertData',[EmployeeController::class, 'insertData'])->name('insertData')->middleware('auth');;
// //EDIT DATA
// //get data based on ID
// Route::get('/showDataEmployee/{id}',[EmployeeController::class, 'showDataEmployee'])->name('showDataEmployee')->middleware('auth');;
// Route::post('/updateDataEmployee/{id}',[EmployeeController::class, 'updateDataEmployee'])->name('updateDataEmployee')->middleware('auth');;
// //Delete Data
// Route::get('/deleteDataEmployee/{id}',[EmployeeController::class, 'deleteDataEmployee'])->name('deleteDataEmployee')->middleware('auth');;
// // Export PDF
// Route::get('/exportPDF',[EmployeeController::class, 'exportPDF'])->name('exportPDF')->middleware('auth');;
// //Export Excel Files Data Emp
// Route::get('/exportExcel', function () {
//     return (new FastExcel(Employee::all()))->download('file.xlsx');
// })->middleware('auth');;

