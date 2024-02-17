<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardKelasController;
use App\Http\Controllers\DashboardStudentController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\HomeAfterLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Models\student;
use App\Http\Controllers\StudentsController;

Route::get('/', function () {
    return redirect('/home');
});


Route::get('/homeafter',[HomeAfterLoginController::class,'index']);
Route::get('/home',[HomeController::class,'index']);
Route::get('/admindashboard',[AdminDashboardController::class,'index']);
Route::get('/extra', [ExtracurricularController::class,'utama']);

Route::get('/home', [DashboardController::class,'index']);
Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "nama" => "Ilhami",
        "kelas" => "11 PPLG 1",
        "foto" => "asset/ballpoints.jpeg"]);
});

Route::get('/student/all', [StudentsController::class,'index'])->name('student.all',);
Route::get('/student/detail/{student}',[StudentsController::class,'show']);

Route::group(["prefix" => "/student"],function (){
    Route::get('/filter/{id_kelas}', [StudentsController::class, 'filter'])->name('student.filter');
    Route::get('/create',[StudentsController::class,'create']) -> middleware('auth');
    Route::post('/add',[StudentsController::class,'store']) -> middleware('auth');
    Route::delete('/delete/{student}',[StudentsController::class,'destroy']) -> middleware('auth');
    Route::get('/edit/{id}', [StudentsController::class,'edit'])->name('student.edit') -> middleware('auth');
    Route::post("/update/{id}",[StudentsController::class,'update']) -> middleware('auth');
}) ;

Route::group(["prefix" => "/class"],function (){

    Route::get('/all',[KelasController::class,'index'])-> name('class.all');
    Route::get('/create',[KelasController::class,'create'])-> middleware('auth');
    Route::post('/add',[KelasController::class,'store'])-> middleware('auth');
    Route::delete('/delete/{class}', [KelasController::class, 'destroy'])-> middleware('auth');
    Route::get('/edit/{id}', [KelasController::class,'edit'])->name('class.edit')-> middleware('auth');
    Route::post('/update/{id}', [KelasController::class, 'update'])-> middleware('auth');
});


Route::get('/login', [LoginController::class,'index'])-> middleware('guest') -> name('login');
Route::post('/register',[RegisterController::class,'store']);
Route::get('/register', [RegisterController::class,'index'])-> middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::group(["prefix" => "/dashboard"],function (){
    Route::get('/all',function (){
        return view('dashboard.index',[
            'title' => 'Dashboard'
        ]);
    }) -> middleware('auth');

    Route::group(["prefix" => "/class"],function (){
        Route::get('/all',[DashboardKelasController::class,'index'])-> name('class.all');
        Route::get('/create',[DashboardKelasController::class,'create'])-> middleware('auth');
        Route::post('/add',[DashboardKelasController::class,'store'])-> middleware('auth');
        Route::delete('/delete/{class}', [DashboardKelasController::class, 'destroy'])-> middleware('auth');
        Route::get('/edit/{id}', [DashboardKelasController::class,'edit'])->name('class.edit')-> middleware('auth');
        Route::post('/update/{id}', [DashboardKelasController::class, 'update'])-> middleware('auth');
    });


    Route::group(["prefix" => "/student"],function (){
        Route::get('/filter/{id_kelas}', [DashboardStudentController::class, 'filter'])->name('student.filter.dashboard');
        Route::get('/all', [DashboardStudentController::class,'index'])->name('student.all',);
        Route::get('/create',[DashboardStudentController::class,'create']) -> middleware('auth');
        Route::post('/add',[DashboardStudentController::class,'store']) -> middleware('auth');
        Route::delete('/delete/{student}',[DashboardStudentController::class,'destroy']) -> middleware('auth');
        Route::get('/edit/{id}', [DashboardStudentController::class,'edit'])->name('student.edit') -> middleware('auth');
        Route::post("/update/{id}",[DashboardStudentController::class,'update']) -> middleware('auth');
    }) ;
});








