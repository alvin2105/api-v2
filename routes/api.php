<?php

use App\Http\Controllers\ParkirController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::resource('products', ProductController::class);

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/add-booking', [BookingController::class, 'createBooking']);
Route::get('/riwayat', [BookingController::class, 'riwayat']);
Route::put('/accept/{id}', [BookingController::class, 'verifikasiPembayaran']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    //admin
    Route::post('/parkir', [ParkirController::class, 'store']);
    Route::put('/parkir/{id}', [ParkirController::class, 'update']);
    Route::delete('/parkir/{id}', [ParkirController::class, 'destroy']);
    Route::put('/accept/{id}', [BookingController::class, 'updateBooking']);
    Route::get('/riwayat/all', [BookingController::class, 'semuaRiwayat']);
    //user
    Route::get('/parkir', [ParkirController::class, 'index']);
    Route::get('/parkir/{id}', [ParkirController::class, 'show']);
    Route::get('/parkir/search/{nama_parkir}', [ParkirController::class, 'search']);
    Route::get('/user', [UserController::class, 'index']);//belum bisa
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::get('/booking', [BookingController::class, 'getVA']);
    Route::post('/booking/add', [BookingController::class, 'createBooking']);
    Route::get('/riwayat/{email}', [BookingController::class, 'riwayat']);
    Route::delete('/booking/{id}', [BookingController::class, 'cancelBooking']);
    //admin+user
    Route::post('/logout', [AuthController::class, 'logout']);
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
