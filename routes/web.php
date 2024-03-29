<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserLogin;
use App\Http\Middleware\UserAuth;
use App\Http\Controllers\EventosAdversosController;
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

//Login routes
Route::middleware([UserAuth::class])->group(function () {

    Route::get('/', function () {
        return view('login');
    });
    
    Route::post('user-login', [UserController::class, 'login']);

});

//------------

Route::middleware([UserLogin::class])->group(function () {

    //Logout user
    Route::get('/logout', [UserController::class, 'logout']);

    Route::get('/inicio', function () {
        return view('home');
    });

    Route::get('/reporte-ADR', [EventosAdversosController::class, 'index'])->name('eventos.index');
    Route::post('/eventos/consultar', [EventosAdversosController::class, 'consultar'])->name('eventos.consultar');
    Route::get('/eventos/{id}', [EventosAdversosController::class, 'detalle'])->name('eventos.detalle');

    Route::get('/reporte-EAM', function () {
        return view('adrMed');
    });

    Route::get('/clasi-Rep-Intra', function () {
        return view('classyIntraInstRep');
    });

    Route::get('/ae-Adversos', function () {
        return view('AdverEventsAnaly');
    });

    Route::get('/reporte-Extra-Ins', function () {
        return view('extrlReport');
    });

    Route::get('/acci-Mejora', function () {
        return view('ImprovActions');
    });

    Route::get('/consu-Parame', function () {
        return view('qryConfig');
    });


    Route::get('/info-Gral', function () {
        return view('genInfo');
    });

    Route::get('/pista-Aud', function () {
        return view('auditTrail');
    });

    Route::get('/tecno-Vig', function () {
        return view('techVigilance');
    });

    Route::get('/registrar', function () {
        return view('UserReg');
    });

    Route::get('/cambiar-Contra', function () {
        return view('ChangePwd');
    });

    Route::get('/mas-Conf', function () {
        return view('moreSettings');
    });

    Route::get('/elim-Datos', function () {
        return view('dataDeletion');
    });

});