<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\AnggotaController;
use App\Http\Controllers\Api\TransaksiController;
use App\Models\Transaksi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/users', UserController::class);
Route::apiResource('/books', BookController::class);
Route::apiResource('/anggota', AnggotaController::class);
Route::apiResource('/transaksi', TransaksiController::class);

Route::get('/bookandanggota', [TransaksiController::class, 'create']);
