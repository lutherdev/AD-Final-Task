<?php

require_once BASE_PATH . '/bootstrap.php';

if (login){
    return [
        'customer' => [
            'Home' => '/',
            'About Us' => 'aboutUs',
            'Store' => 'store',
            'Contact Us' => 'contactUs',
            'Login' => 'login',
            'Logout' => 'logout'
        ],
        'admin' => [
            'Home' => '/',
            'About Us' => 'aboutUs',
            'Store' => 'store',
            'Contact Us' => 'contactUs',
            'Manage Items' => 'manageUsers',
            'Login' => 'login',
            'Logout' => 'logout'
            
        ]
    ];
}

