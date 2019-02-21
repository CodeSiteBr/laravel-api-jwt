<?php

Route::prefix('v1')->group(function () {
    Route::post('login', 'Api\AuthController@login')->name('api.v1.login');
    Route::post('refresh', 'Api\AuthController@refresh')->name('api.v1.refresh');

    Route::group(['middleware' => ['auth:api','jwt.refresh'], 'namespace' => 'Api', 'as' => 'api.v1.'], function () {
        Route::post('logout', 'AuthController@logout')->name('logout');

        Route::resource('usuarios', 'UserController', ['except' => ['create', 'edit']]);
        Route::resource('produtos', 'ProdutoController', ['except' => ['create', 'edit']]);
    });
});

Route::resource('produtos', 'Api\ProdutoController', ['as' => 'api', 'except' => ['create', 'edit']]);

/*
    Route::resource('produtos', 'ProdutoController');

    Essa declaração de rota resource cria várias rotas para manipular
    uma variedade de ações RESTful no recurso de foto.
    Da mesma forma, o controlador gerado já terá métodos para cada uma
    dessas ações, incluindo notas informando quais URIs e verbos eles
    manipulam.

    +-----------+--------------------------+------------------+----------------------------+
    | Method    | URI                      | Name             | Action                     |
    +-----------+--------------------------+------------------+----------------------------+
    | GET|HEAD  | /produtos                | produtos.index   | ProdutoController@index    |
    | GET|HEAD  | /produtos/{produto}      | produtos.show    | ProdutoController@show     |
    | GET|HEAD  | /produtos/create         | produtos.create  | ProdutoController@create   |
    | POST      | /produtos                | produtos.store   | ProdutoController@store    |
    | GET|HEAD  | /produtos/{produto}/edit | produtos.edit    | ProdutoController@edit     |
    | PUT|PATCH | /produtos/{produto}      | produtos.update  | ProdutoController@update   |
    | DELETE    | /produtos/{produto}      | produtos.destroy | ProdutoController@destroy  |
    +-----------+--------------------------+------------------+----------------------------+

    // Rotas manuais que o tipo resource faz

    Route::get('/produtos', 'ProdutoController@index')->name('produtos.index');
    Route::get('/produtos/{produto}', 'ProdutoController@show')->name('produtos.show');
    Route::get('/produtos/create', 'ProdutoController@create')->name('produtos.create');
    Route::post('/produtos', 'ProdutoController@store')->name('produtos.store');
    Route::get('/produtos/{produto}/edit', 'ProdutoController@edit')->name('produtos.edit');
    Route::put('/produtos/{produto}', 'ProdutoController@update')->name('produtos.update');
    Route::delete('/produtos/{produto}', 'ProdutoController@destroy')->name('produtos.destroy');
*/
