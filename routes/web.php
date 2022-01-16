<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
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

//  auth
Route::get('/register', function () { return view('auth.register'); })->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', function () { return view('auth.login'); })->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/', [HomeController::class, 'viewCategory']);
Route::get('/about', function () { return view('about');});

Route::get('/products/{name}', [ProductController::class, 'index']);
Route::get('/products/{categoryNname}/{productName}/detail', [ProductController::class, 'show']);

Route::get('/search', [HomeController::class, 'search']);

Route::get('/shop/{name}', [ShopController::class, 'show']);

//admin
Route::get('/add-shop', function () { return view('admin.add-shop');})->middleware('admin');
Route::post('/add-shop', [ShopController::class, 'store']);
Route::get('/add-product', [ProductController::class, 'create'])->middleware('admin');
Route::post('/add-product', [ProductController::class, 'store']);
Route::delete('/admin/product/{id}/delete', [ProductController::class, 'destroy']);
Route::get('/admin/update-product/{id}', [ProductController::class, 'edit'])->middleware('admin');
Route::put('/admin/update-product/{id}', [ProductController::class, 'update']);
Route::get('/all-transaction', [TransactionController::class, 'index'])->middleware('admin');

// user
Route::get('/cart', [CartController::class, 'index'])->middleware('login');
Route::post('/addCart', [CartController::class, 'store'])->middleware('login');
Route::post('/updateCart', [CartController::class, 'update']);
Route::delete('/deleteCart/{id}', [CartController::class, 'destroy']);
Route::get('/cart/checkout', [CheckoutController::class, 'index'])->middleware('login');
Route::get('/transaction-detail/{id}', [TransactionController::class, 'show'])->middleware('auth');
Route::get('/profile', function () { return view('user.profile');})->middleware('login');
Route::put('/updateProfile', [AuthController::class, 'updateProfile'])->middleware('login');

Route::get('/transaction-history', [TransactionController::class, 'index'])->middleware('login');
Route::post('/buying', [TransactionController::class, 'store']);

Route::get('/change-password', function () { return view('user.change-password');})->middleware('login');
Route::post('/change-password', [AuthController::class, 'changePassword']);

Route::get('/create-symbolic', function () {
  symlink(storage_path('/app/public'), public_path('storage'));
});