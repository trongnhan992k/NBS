<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// 1. NHÓM DÀNH CHO KHÁCH HÀNG (Ai cũng vào được)
Route::get('/', [CustomerController::class, 'home'])->name('home');

// 2. NHÓM DÀNH CHO ADMIN (Phải qua 2 chốt bảo vệ: 'auth' và 'admin')
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    
    // Đường dẫn thực tế sẽ là: http://127.0.0.1:8000/admin/dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Sau này bạn có thể viết thêm các route khác của admin ở đây
    // Route::get('/products', [AdminController::class, 'products']);
});
require __DIR__.'/auth.php';
