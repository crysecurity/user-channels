<?php

use Illuminate\Support\Facades\Route;

Route::group([
        'namespace' => 'Cr4Sec\UserChannels\Http\Controllers',
        'prefix' => config('cr4sec.channels.routes.path'),
        'middleware' => config('cr4sec.channels.routes.middleware')
    ], static function () {
        Route::get('/', 'ChannelsController@index');
        Route::post('/attach', 'ChannelsController@attach');
        Route::post('/detach', 'ChannelsController@detach');
});
