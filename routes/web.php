<?php

$router->get('/', function () use ($router) {
    //return $router->app->version();
    return "fuimonos";
});

$router->get('/authors', 'AuthorController@index');          //listado
$router->post('/authors', 'AuthorController@store');         //crear
$router->get('/authors/{author}', 'AuthorController@show');      //detalle
$router->put('/authors/{author}', 'AuthorController@update');      //editar
$router->delete('/authors/{author}', 'AuthorController@destroy');   //eliminar
