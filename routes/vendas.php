<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendaController;

Route::resource('vendas', VendaController::class)->except([
    'destroy', 'update', 'edit'
]);