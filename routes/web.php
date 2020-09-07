<?php

use Illuminate\Support\Facades\Route;

//Any permite todo tipo de acesso de verbo http. funciona com get, post, put...
Route::any('/any', function(){
    return 'Any';
});

//match permite todo tipo de verbo http, sendo especificado antes.
Route::match(['get', 'post'], '/match', function(){
    return 'match';
});

Route::get('/empresa', function(){
    return 'Historia da Enmpresa';
});

Route::get('/contato', function(){
    return view ('site.contact');
});

Route::get('/', function () {
    return view('welcome');
});

