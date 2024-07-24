<?php

use App\Console\Commands\DeleteExpiredMedicines;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MedController;
use App\Http\Controllers\MyCartController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('get', [MedController::class, 'getRandomMed']);
Route::post('details', [MedController::class, 'details']);
Route::get('all', [MedController::class, 'listAllMed']);
Route::post('add', [MedController::class, 'addMed']);
Route::post('update', [MedController::class, 'updateMed']);
Route::post('wareMeds', [MedController::class, 'wareMeds']);

Route::post('cat', [CatController::class, 'getCatMed']);
Route::get('cats', [CatController::class, 'getCats']);
Route::post('search', [CatController::class, 'search']);
Route::post('wareCats', [CatController::class, 'wareCatMed']);

Route::post('pharRegister', [AuthController::class, 'pharRegister']);
Route::post('whRegister', [AuthController::class, 'whRegister']);
Route::post('Login', [AuthController::class, 'Login']);
Route::get('Logout', [AuthController::class, 'Logout']);

Route::post('addCart', [CartController::class, 'addToCart']);
Route::post('myCart', [CartController::class, 'myCart']);
Route::post('deleteCart', [CartController::class, 'deleteCart']);

Route::post('orderMed', [OrderController::class, 'orderMeds']);
Route::post('state', [OrderController::class, 'changeState']);
Route::post('wareOrders', [OrderController::class, 'allWarehouseOrder']);
Route::post('order', [OrderController::class, 'order']);
Route::post('browse', [OrderController::class, 'myOrders']);

Route::post('favorite', [FavoriteController::class, 'addToFavorite']);
Route::post('myFavorite', [FavoriteController::class, 'myFavorite']);
Route::post('remove', [FavoriteController::class, 'removeFromFavorite']);

Route::post('read', [NotificationController::class, 'read']);
Route::post('unread', [NotificationController::class, 'allUnreadNotifications']);
Route::post('allNotifications', [NotificationController::class, 'allNotifications']);
Route::post('asRead', [NotificationController::class, 'markAllAsRead']);

Route::post('report', [ReportController::class, 'newReport']);
Route::post('myReports', [ReportController::class, 'myReports']);

Artisan::command('delete:expired-medicines', function (){
    $deleteExpiredMedicines = new DeleteExpiredMedicines();
    $deleteExpiredMedicines->handle();
});





Route::middleware('auth:sanctum')->group(function (){
    Route::middleware('warehouse')->group(function (){
    });
    Route::middleware('pharmacist')->group(function (){
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
