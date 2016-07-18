<?php

namespace App;

class Config
{

    const DB_USER = 'root';

    const DB_PASS = 'testing';

    const DB_HOST = 'localhost';

    const DB_NAME = 'esposas';

    const DEP_ARRAY = [
        'App\Controllers\Login' => ['App\Interfaces\UserEditing' => 'App\Controllers\User',
                                    'App\Interfaces\Cookieing' => 'App\Controllers\Cookies'],
        'App\Controllers\User' =>  ['App\Interfaces\Modelling' => 'App\Models\UserModel'],
        'App\Controllers\Cookies' => ['App\Interfaces\Modelling' => 'App\Models\LoginCookieModel'],
        'App\Controllers\Register' => ['App\Interfaces\UserEditing' => 'App\Controllers\User'],
        'App\Controllers\Profiles' => ['App\Interfaces\UserEditing' => 'App\Controllers\User',
                                        'App\Interfaces\Tasking' => 'App\Controllers\Tasks'],
    ];
}
