<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function () {
    return str_random(32);
});

$router->get('/users', ['uses'=>'UserController@index']);

$router->get('/senals', ['uses'=>'SeñalizacionController@index']);
$router->post('/senalCreate', ['uses'=>'SeñalizacionController@create']);
$router->post('/modificarSenal', ['uses'=>'SeñalizacionController@modificarSeñal']);
$router->post('/verificarUsuario', ['uses'=>'UserController@verificarUser']);
$router->post('/registrarSenalMovil', ['uses'=>'SeñalizacionController@registrarSenalMovil']);
$router->get('/insidencias', ['uses'=>'InsidenciasController@index']);
$router->post('/eliminarSenal', ['uses'=>'SeñalizacionController@eliminar']);
$router->post('/senal', ['uses'=>'SeñalizacionController@senal']);
