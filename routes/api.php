<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//dsach san pham
Route::get('/v1/product/list', [ProductController::class, 'index']);
//view dsach san pham
Route::get('/listProduct', [ProductController::class, 'list']);
//them
Route::post('/v1/product/add', [ProductController::class, 'store']);
//sua
Route::post('/v1/product/update/{idProduct}', [ProductController::class, 'update'])->name('product.update');
//xoa
Route::delete('/v1/product/delete/{idProduct}', [ProductController::class, 'destroy'])->name('product.destroy');

//login
Route::post('/login', [AuthController::class, 'login'])->name('login');
//signUp
Route::post('/signup', [AuthController::class, 'signUp'])->name('signup');

// Route::get('/logout', function () {
//     Auth::logout(); // Đăng xuất
//     return redirect('/');
// })->name('logout');
