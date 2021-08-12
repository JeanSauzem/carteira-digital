<?php

$router->group(['prefix' => 'transaction'], function () use ($router) {
    $router->post('/deposit', 'Transaction\TransactionController@deposit');
    $router->post('/', 'Transaction\TransactionController@transfer');
});