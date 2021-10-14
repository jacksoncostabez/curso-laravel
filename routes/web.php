<?php

use Illuminate\Support\Facades\Route;

//formato de rota simples
Route::view('/view', 'welcome');

//formato de rota simples
Route::redirect('/redirect1', '/redirect2');
/*
Route::get('redirect1', function (){
    return redirect('/redirect2');
});
*/

Route::get('redirect2', function (){
    return 'Redirect 02';
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contato', function (){
    return view('contato');
});

Route::get('/empresa', function (){
    return view('site.empresa');
});

Route::post('/register', function (){
    return '';
});

/*permite todo tipo de acesso http, ou seja, se acessar com get, post, put etc. ela vai funcionar. 
No entanto deve ser usada com cautela pois pode botar a aplicação em risco.*/
Route::any('/any', function (){
    return 'Any';
});

/*Você pode especificar os tipos de verbos que pode acessar essa rota*/
Route::match(['get','post'], 'match', function (){
    return 'Match';
});

//Nesse caso o parâmetro da função não precisa ser igual ao parâmetro da url
Route::get('/categorias/{flag}', function ($parametro){
    return "Produtos da categoria {$parametro}";
});

//Nesse caso o parâmetro {flag} precisa ser condizente com o parâmetro da função $flag. (Lembrando que o nome {flag} é opcional)
Route::get('/categoria/{flag}/posts', function ($flag){
    return "Posts da categoria {$flag}";
});

/* '/produtos/{idProduct?}' o '?' informa que o parâmetro é opcional. E $idProduct = '' possui valor default
Com isso, você pode definir regras depois como: Se $idProduct == default, exibe todos os produtos.*/
Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produto(s) {$idProduct}";
});
