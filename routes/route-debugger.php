<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Arackal\RouteDebugger')
    ->get('route-list', [
        'as' => 'route-debugger',
        'uses' => 'RoutesController@index'
    ]);