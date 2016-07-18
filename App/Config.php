<?php

namespace App;

class Config
{

    const DB_USER = 'root';

    const DB_PASS = 'testing';

    const DB_HOST = 'localhost';

    const DB_NAME = 'esposas';

    const DEP_ARRAY = [
        'App\Controllers\Homes' => ['App\Interfaces\Viewing' => 'Core\View'],
        'App\Controllers\Login' => ['App\Interfaces\Viewing' => 'Core\View',
                                    'App\Interfaces\UserEditing' => 'App\Controllers\User',
                                    'App\Interfaces\Cookieing' => 'App\Controllers\Cookies'],
        // TODO How to add databasing implicitly
        'App\Controllers\User' =>  ['App\Interfaces\Modelling' => 'App\Models\UserModel'],
        'App\Controllers\Cookies' => ['App\Interfaces\Modelling' => 'App\Models\LoginCookieModel'],
    ];
}
