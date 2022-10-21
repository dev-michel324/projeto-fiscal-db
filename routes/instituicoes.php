<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituicaoController;

Route::resource('instituicoes', InstituicaoController::class)->except([
    'destroy'
]);

Route::post('instituicoes/destroy/{instituicao}', [InstituicaoController::class, 'destroy'])
    ->name('instituicoes.destroy');