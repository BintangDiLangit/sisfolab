<?php

use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ReverseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorsController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/tes', function () {
    return view('admin.material.create');
});

Auth::routes();
Route::get('admin/home', [HomeController::class,'adminHome'])->name('admin.home')->middleware('is_admin');


Route::resource('/material',MaterialController::class);

Route::prefix('/user')->group(function (){
    Route::prefix('/mahasiswa')->group(function (){
        Route::get('/',[UserController::class,'indexMahasiswa'])->name('user.mahasiswa.index');
        Route::get('/create',[UserController::class,'createMahasiswa'])->name('user.mahasiswa.create');
        Route::post('/create',[UserController::class,'storeMahasiswa'])->name('user.mahasiswa.store');
        Route::get('/{mahasiswa}/edit',[UserController::class,'editMahasiswa'])->name('user.mahasiswa.edit');
        Route::put('/{mahasiswa}',[UserController::class,'updateMahasiswa'])->name('user.mahasiswa.update');
        Route::delete('/{mahasiswa}',[UserController::class,'destroyMahasiswa'])->name('user.mahasiswa.destroy');

    });
    Route::prefix('/dosen')->group(function (){
        Route::get('/',[UserController::class,'indexDosen'])->name('user.dosen.index');
        Route::get('/create',[UserController::class,'createDosen'])->name('user.dosen.create');
        Route::post('/create',[UserController::class,'storeDosen'])->name('user.dosen.store');
        Route::get('/{dosen}/edit',[UserController::class,'editDosen'])->name('user.dosen.edit');
        Route::put('/{dosen}',[UserController::class,'updateDosen'])->name('user.dosen.update');
        Route::delete('/{dosen}',[UserController::class,'destroyDosen'])->name('user.dosen.destroy');

    });
    Route::prefix('/instansi')->group(function (){
        Route::get('/',[UserController::class,'indexInstansi'])->name('user.instansi.index');
        Route::get('/create',[UserController::class,'createInstansi'])->name('user.instansi.create');
        Route::post('/create',[UserController::class,'storeInstansi'])->name('user.instansi.store');
        Route::get('/{instansi}/edit',[UserController::class,'editInstansi'])->name('user.instansi.edit');
        Route::put('/{instansi}',[UserController::class,'updateInstansi'])->name('user.instansi.update');
        Route::delete('/{instansi}',[UserController::class,'destroyInstansi'])->name('user.instansi.destroy');
    });

});

Route::prefix('/transaction')->group(function(){
    Route::resource('/borrow',BorrowController::class);
    Route::get('/borrow/edit/material/{material}/{borrow}',[BorrowController::class,'editBorrowMaterial'])->name('edit.borrow.material');
    Route::put('/borrow/edit/material/{material}/{borrow}',[BorrowController::class,'updateBorrowMaterial'])->name('update.borrow.material');
    Route::resource('/reverse',ReverseController::class);
    // Route::post('/reverse/{reverse}/approve',[ReverseController::class,'approve'])->name('wes');
    Route::post('/borrow/{borrow}/approve',[BorrowController::class,'approve'])->name('approve');
});
Route::prefix('/absensi')->group(function(){
    Route::resource('/practice',PracticeController::class);
    Route::resource('/visitor',VisitorsController::class);
    Route::post('/visitor/fetch_data', [VisitorsController::class,'fetch_data'])->name('visitor.fetch_data');
    Route::post('/visitor/create/fetch',[VisitorsController::class, 'fetch'])->name('visitor.create.fetch');
    Route::post('/practice/create/fetch',[PracticeController::class, 'fetch'])->name('practice.create.fetch');
});

// User
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/pinjam', [ClientController::class, 'index'])->name('index.pinjam');
Route::get('/profile', [ClientController::class, 'profile'])->name('profile');
Route::put('/{profile}', [ClientController::class, 'update'])->name('profile.update');