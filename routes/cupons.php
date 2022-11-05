<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CupomController;

Route::resource('cupons', CupomController::class)->except([
    'destroy', 'create', 'store', 'update'
]);

Route::post('cupons/update/{cupon}', [CupomController::class, 'update'])
    ->name('cupons.update');