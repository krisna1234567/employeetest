<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\JabatanController;
use App\Http\Controllers\Api\KaryawanController;
use App\Http\Controllers\Api\DepartementController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\API\Soal2Controller;
use App\Http\Controllers\API\Soal1Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     // return $request->user();
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// crud karyawan
Route::get('karyawan', [KaryawanController::class, 'get']);
Route::get('karyawan/{id}', [KaryawanController::class, 'get']);
Route::post('karyawan', [KaryawanController::class, 'store']);
Route::put('karyawan/{id}', [KaryawanController::class, 'update']);
Route::delete('karyawan/{id}', [KaryawanController::class, 'destroy']);

// crud jabatan
Route::get('jabatan', [JabatanController::class, 'get']);
Route::get('jabatan/{id}', [JabatanController::class, 'get']);
Route::post('jabatan', [JabatanController::class, 'store']);
Route::put('jabatan/{id}', [JabatanController::class, 'update']);
Route::delete('jabatan/{id}', [JabatanController::class, 'destroy']);

// crud departement
Route::get('departement', [DepartementController::class, 'get']);
Route::get('departement/{id}', [DepartementController::class, 'get']);
Route::post('departement', [DepartementController::class, 'store']);
Route::put('departement/{id}', [DepartementController::class, 'update']);
Route::delete('departement/{id}', [DepartementController::class, 'destroy']);


// crud level
Route::get('level', [LevelController::class, 'get']);
Route::get('level/{id}', [LevelController::class, 'get']);
Route::post('level', [LevelController::class, 'store']);
Route::put('level/{id}', [LevelController::class, 'update']);
Route::delete('level/{id}', [LevelController::class, 'destroy']);

// NO 2
Route::get('terbilang/{angka}', [Soal2Controller::class, 'get']);
Route::get('terbilang', [Soal2Controller::class, 'test']);

// NO 1
Route::get('bintang/{type}/{angka}', [Soal1Controller::class, 'index']);
