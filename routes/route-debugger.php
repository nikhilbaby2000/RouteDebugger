<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Arackal\RouteDebugger')
    ->group(function () {

        Route::get('route-list', [
            'as' => 'route-debugger',
            'uses' => 'RoutesController@index'
        ]);
    });