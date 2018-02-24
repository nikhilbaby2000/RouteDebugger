<?php

use Illuminate\Support\Facades\Route;

Route::get('route-list', [
    'as' => 'route-debugger',
    'uses' => 'Http\Controllers\RoutesController@index'
]);