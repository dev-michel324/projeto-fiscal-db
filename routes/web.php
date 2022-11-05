<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/empresas.php';
require __DIR__ . '/instituicoes.php';
require __DIR__ . '/produtos.php';
require __DIR__ . '/vendas.php';
require __DIR__ . '/cupons.php';