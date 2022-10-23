<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::resource('produtos', ProdutoController::class)->except([
    'destroy', 'update', 'edit'
]);

Route::post('produtos/destroy/{produto}', [ProdutoController::class, 'destroy'])
    ->name('produtos.destroy');