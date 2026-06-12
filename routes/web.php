<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JilbabController;
use App\Http\Controllers\ProductController;
use App\Models\Jilbab;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Mengubah halaman utama agar menampilkan Landing Page Hervina Collections secara dinamis
Route::get('/', function () {
    // Mengambil semua data jilbab terbaru dari database untuk di-looping di welcome.blade.php
    $jilbabs = Jilbab::latest()->get();
    return view('welcome', compact('jilbabs'));
});

// 2. Route Resource untuk mengaktifkan semua fungsi CRUD Jilbab (Admin)
Route::resource('jilbabs', JilbabController::class);

// 3. TAMBAHAN: Route Resource untuk mengaktifkan semua fungsi CRUD Product (Admin)
Route::resource('products', ProductController::class);