<?php
// Redirect /product{id}/edit ke /product/{id}/edit
Route::get('/product{id}/edit', function($id) {
    return redirect("/product/$id/edit");
})->where('id', '[0-9]+');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/about', function () {
    return view('pages.about', [
        'nama' => 'Bryann',
        'umur' => 17,
        'alamat' => 'Indonesia',
    ]);
});


Route::view('/contact', 'pages.contact');

// Route untuk Produk
Route::get('/product', [ProdukController::class, 'index']);
Route::get('/product/create', [ProdukController::class, 'create']); 
Route::post('/product', [ProdukController::class, 'store']);
Route::get('/product/{id}', [ProdukController::class, 'show']);

Route::get('/product/{id}/edit', [ProdukController::class, 'edit']);
Route::put('/product/{id}', [ProdukController::class, 'update']);
Route::delete('/product/{id}', [ProdukController::class, 'destroy']);