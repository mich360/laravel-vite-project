<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

// カート機能のルート
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index'); // カートの表示
    Route::post('/add', [CartController::class, 'addToCart'])->name('cart.add'); // 商品を追加
    Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove'); // 商品を削除
});

// ItemControllerのリソースルートを使用
Route::resource('items', ItemController::class);

// TestControllerの特定ビューを表示するルート
Route::get('/test', [TestController::class, 'show']);  

// 初期表示
Route::get('/', function () {
    return view('welcome');
});

// ダッシュボード
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 認証が必要なルート
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 認証ルートの追加
require __DIR__.'/auth.php';
