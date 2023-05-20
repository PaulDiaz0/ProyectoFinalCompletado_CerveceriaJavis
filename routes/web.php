<?php

use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoUbicacionController;
use App\Models\Producto;
use App\Models\ProductoUbicacion;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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


Route::get('/',[ProductoController::class, 'home']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('about',function(){
    return view('productos.aboutProductos');
})->name('about');


Route::get('contact',function(){
    return view('productos.contactoProducto');
} );

Route::resource('/productos',ProductoController::class)->except(['home']);  


Route::get('/stock/{producto}/{ubicacion}/edit',[ProductoUbicacionController::class,'edit'])->middleware('verified');
Route::get('/stock/{producto}/{ubicacion}',[ProductoUbicacionController::class, 'update'])->middleware('verified');

Route::get('enviar-reporte',[ProductoController::class,'enviarResponsiva']);

Route::post('archivo',[ArchivoController::class, 'store'])->name('archivo.store')->middleware('verified');

Route::delete('archivo/{archivo}',[ArchivoController::class, 'destroy'])->name('archivo.destory')->middleware('verified'); 

/*Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');*/

/*Route::get('productos',function(){
    return view('productos.indexProductos');
} )->middleware('auth');    //->middleware('auth'); 

Route::get('formProductos',function(){
    return view('productos.formProductos');
} )->middleware('auth');
*/