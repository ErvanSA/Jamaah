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

$router->post('/register', "AuthController@register");
$router->post('/login', "AuthController@login");
$router->group(['middleware' => 'auth'], function() use($router){
    $router->get('/jamaah',"JamaahController@index");
    $router->post('/jamaah/create', "JamaahController@create");
    $router->put('/jamaah/update/{idJamaah}',"JamaahController@update");
    $router->delete('/jamaah/delete/{idJamaah}',"JamaahController@delete");
    $router->get('/jamaah/show/{idJamaah}',"JamaahController@show");
});