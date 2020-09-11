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

//recebendo parâmetros pelas rotas
Route::get('/categorias/{flag}', function($flag){
    return "Produtos da categoria: {$flag}";
});
Route::get('/categoria/{flag}/posts', function($flag){
    return "Posts da categoria: {$flag}";
});

//Recebendo parâmetros opcionais pela rota
Route::get('/produtos/{idProduct?}', function($idProduct=''){
    return "Protudo(s) {$idProduct}";
});

//redirencionando rotas
// Route::get('redirect1', function(){
//     return redirect('/redirect2');
// });
Route::redirect('/redirect1', 'redirect2');
Route::get('redirect2', function(){
    return 'Redirect 2';
});

//Retornando uma view, usar somente se for uma view muito simples
//Route::view('/view', 'site.contact');

//Nomeando rotas no laravel
Route::get('redirect3', function(){
    return redirect()->route('url.name');
});
Route::get('/outra-url', function (){
    return "Podera mudar o nome da url quando quiser aqui nessa função!!";
})->name('url.name');
//sempre tera que se referir a rota da seguite forma:
    // route('url.name');


//Grupo de rotas
/*
Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/', function(){
            return "Administrador Raiz";
        });
        Route::get('/dashboard', function(){
            return 'Home Admin';
        });
        Route::get('/financeiro', function(){
            return 'Financeiro Admin';
        });
        Route::get('/products', function(){
            return 'Produtos Admin';
        }); 
    });
});*/
/*
Route::middleware([])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::namespace('Admin')->group(function (){
            Route::name('admin.')->group(function (){
                Route::get('/', function(){
                    return redirect()->route('admin.dashboard');
                })->name('home');
                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
                Route::get('/products', 'TesteController@teste')->name('products');
            });
        });
    }); 
});
*/
Route::group([
    'midlleware'=>[],
    'prefix'=>'admin',
    'namespace'=>'Admin',
    'name'=>'admin.'
], function(){
    Route::get('/', function(){
        return redirect()->route('admin.dashboard');
    })->name('home');
    Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
    Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
    Route::get('/products', 'TesteController@teste')->name('products');

});


Route::get('/login', function(){
    return 'Login';
})->name('login');