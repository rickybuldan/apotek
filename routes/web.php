<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\JsonDataController;
use App\Models\MenusAccess;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenerateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'index'])->name('login');
// Rute untuk melakukan proses login
Route::post('/login', [AuthController::class, 'login']);
Route::get('/sign-up', [AuthController::class, 'signup'])->name('sign-up');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/generateview', [GenerateController::class, 'generateview']);
Route::get('/gendataview', [GenerateController::class, 'gendataview']);


Route::middleware(['auth'])->group(function () {
    Route::get('/', [GeneralController::class, 'based']);

    Route::middleware(['role:Superadmin'])->group(function () {
        Route::post('/generate', [GenerateController::class, 'generate'])->name('generate');
    });

    


    $allowedRoutes = MenusAccess::all();
    foreach ($allowedRoutes as $routeData) {
        // Route::middleware(['role:' . $routeData->role])->group(function () use ($routeData) {
            // Anda dapat menggunakan $routeData->id untuk mengidentifikasi setiap entri secara unik
            if ($routeData->param_type == "VIEW"){
                Route::get($routeData->url, [GeneralController::class, $routeData->method])->name($routeData->name);
            }else{
                Route::post($routeData->url, [JsonDataController::class, $routeData->method])->name($routeData->name);
            }
        // });
    }
});
