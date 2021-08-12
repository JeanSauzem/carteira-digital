<?php

$router->group(['prefix' => 'register'], function () use ($router) {
    $router->group(['prefix' => 'users'], function () use ($router) {
        $router->post('/', 'User\UserController@create');
    });
});