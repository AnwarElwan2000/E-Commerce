<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/redirect',[HomeController::class , 'redirect']);
Route::get('/',[HomeController::class , 'index']);
Route::get('/product',[AdminController::class , 'product']);
Route::post('/UploadProduct',[AdminController::class , 'uploadproduct']);
Route::get('/ShowProducts',[AdminController::class , 'ShowProducts']);
Route::get('/ProductDelete/{id}',[AdminController::class , 'ProductDelete']);
Route::get('/UpdateView/{id}',[AdminController::class , 'UpdateView']);
Route::post('/UpdateProduct/{id}',[AdminController::class , 'UpdateProduct']);
Route::get('/search',[HomeController::class , 'Search']);
Route::post('/AddCart/{id}',[HomeController::class , 'AddCart']);
Route::get('/ShowCarts',[HomeController::class , 'ShowCarts']);
Route::get('/DeleteCart/{id}',[HomeController::class , 'DeleteCart']);
Route::post('/Order',[HomeController::class , 'ConfirmOrder']);
Route::get('/ShowOrders',[AdminController::class , 'ShowOrders']);
Route::get('/UpdateStatus/{id}',[AdminController::class , 'UpdateStatus']);

require __DIR__.'/auth.php';
