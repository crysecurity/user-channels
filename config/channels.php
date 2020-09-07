<?php

return [
    'tables' => [
        'users' => 'users',
        'channels' => 'channels',
        'user_channel' => 'user_channel',
    ],

    'user_model' => 'App\\User',

    'routes' => [
        'path' => 'channels',
        'middleware' => ['auth']
    ]
];
