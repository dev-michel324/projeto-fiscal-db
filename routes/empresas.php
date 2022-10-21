<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

Route::resource('empresas', EmpresaController::class)->except([
    'destroy'
]);

Route::post('empresas/destroy/{empresa}', [EmpresaController::class, 'destroy'])
    ->name('empresas.destroy');