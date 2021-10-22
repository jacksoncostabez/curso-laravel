<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::any('teste/search', 'App\Http\Controllers\TesteController@search')->name('teste.search')->middleware('auth');
Route::resource('teste','App\Http\Controllers\TesteController')->middleware(['auth', 'check.is.admin']);

Route::resource('produto', 'App\Http\Controllers\ProdutoController');
//Route::resource('produto', 'App\Http\Controllers\ProdutoController')->middleware('auth');

//Route::resource('produto', 'App\Http\Controllers\ProdutoController');

//Essa rota substitui todas essas rotas aqui abaixo.
Route::resource('products', 'App\Http\Controllers\ProductController');

/*ROTAS PARA CRUD NÃO SIMPLIFICADA*/
/*
Route::delete('/products/{id}', 'App\Http\Controllers\ProductController@destroy')->name('products.destroy');
Route::put('/products/{id}', 'App\Http\Controllers\ProductController@update')->name('products.update');
Route::get('/products/{id}/edit', 'App\Http\Controllers\ProductController@edit')->name('products.edit');
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('products.create');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('products.show');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products.index');
Route::post('/products', 'App\Http\Controllers\ProductController@store')->name('products.store'); //tem o mesmo nome da url do get, mas não tem problema, pois os verbos são diferentes.
*/

/*Route::get('login', function () {
    return 'Login Ok';
})->name('login'); */

//Renomeando o prefixo do Controller com Route::namespace
/*
Route::middleware([])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::namespace('App\Http\Controllers\Admin')->group(function () {

            Route::name('admin.')->group(function () { //adiciona o prefixo admin. antes de dashboard1.

                Route::get('/dashboard1', 'TesteController@teste')->name('dashboard1');

                Route::get('/financeiro1', 'TesteController@teste')->name('financeiro1');

                Route::get('/caixa1', 'TesteController@teste')->name('caixa1');

                Route::get('/', function () {
                    return redirect()->route('admin.dashboard1');
                })->name('home');
            });
        });
    });
});
*/

//Forma simplificada de fazer as rotas feitas acima.
Route::group([
    'middleware' => [],
    'prefix'     => 'admin',
    'namespace'  => 'App\Http\Controllers\Admin',
    'name'       => 'admin.'
], function () {
    Route::get('/dashboard1', 'TesteController@teste')->name('dashboard');

    Route::get('/financeiro1', 'TesteController@financeiro')->name('financeiro');

    Route::get('/caixa1', 'TesteController@caixa')->name('caixa');

    /*Route::get('/', function () {
        return redirect()->route('dashboard');
    })->name('home'); */

    Route::get('/testando', function () {
        return redirect()->route('financeiro');
    })->name('testando');
});

//Aplica middleware(['auth']) nesse grupo de rotas. Lembrando que você add ['auth'] ou 'auth'.
//prefix('admin') - define o prefixo da url.Ex: ele add: admin/dashboard
Route::middleware([])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return 'Home admin';
        });

        Route::get('/financeiro', function () {
            return 'Financeiro admin';
        });

        Route::get('/caixa', function () {
            return 'Caixa Admin';
        });

        // Route::get('/', 'App\Http\Controllers\Admin\TesteController@teste');
        //quando alguém acessar /admin essa rota redireciona para a função teste.
    });
});

/*Aplicando o middleware('auth') em cada rota não seria vantajoso caso precisasse alterar. */
/* 
Route::get('/admin/dashboard', function () {
    return 'Home admin';
})->middleware('auth'); 
//middleware('auth') - Só permite o acesso a essa rota quem estiver autenticado.
//Caso o usuário não esteja autenticado ele redireciona para o login automaticamente.

Route::get('/admin/financeiro', function () {
    return 'Financeiro admin';
})->middleware('auth');

Route::get('/admin/produtos', function () {
    return 'Produtos admin';
})->middleware('auth');
*/

//redirecionando para o name da rota ao invés da url.
Route::get('redirect3', function () {
    return redirect()->route('url.name');
});

Route::get('/nome-url', function () {
    return 'Hey hey hey';
})->name('url.name');
/*->name('url.name') - nome da rota -> serve para referenciar a url definida em get. Dessa forma, se você 
precisar alterar a url no get, não precisará mexer nas demais rotas que usam essa url. Pois eles estarão 
usando o name que dá referência a rota. */

//formato de rota simples
Route::view('/view', 'welcome');

//formato de rota simples
Route::redirect('/redirect1', '/redirect2');
/*
Route::get('redirect1', function (){
    return redirect('/redirect2');
});
*/

Route::get('redirect2', function () {
    return 'Redirect 02';
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contato', function () {
    return view('contato');
});

Route::get('/empresa', function () {
    return view('site.empresa');
});

Route::post('/register', function () {
    return '';
});

/*permite todo tipo de acesso http, ou seja, se acessar com get, post, put etc. ela vai funcionar. 
No entanto deve ser usada com cautela pois pode botar a aplicação em risco.*/
Route::any('/any', function () {
    return 'Any';
});

/*Você pode especificar os tipos de verbos que pode acessar essa rota*/
Route::match(['get', 'post'], 'match', function () {
    return 'Match';
});

//Nesse caso o parâmetro da função não precisa ser igual ao parâmetro da url
Route::get('/categorias/{flag}', function ($parametro) {
    return "Produtos da categoria {$parametro}";
});

//Nesse caso o parâmetro {flag} precisa ser condizente com o parâmetro da função $flag. (Lembrando que o nome {flag} é opcional)
Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria {$flag}";
});

/* '/produtos/{idProduct?}' o '?' informa que o parâmetro é opcional. E $idProduct = '' possui valor default
Com isso, você pode definir regras depois como: Se $idProduct == default, exibe todos os produtos.*/
Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produto(s) {$idProduct}";
});

// Auth::routes(); //Criado por Padrão
Auth::routes(['register' => false]); //desativa a função register

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
