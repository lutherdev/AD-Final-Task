<?php

require_once BASE_PATH . '/bootstrap.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user'])) {
    $role = $_SESSION['user']['role'] ?? 'customer'; 

    return [
        'customer' => [
            'Home' => '/',
            'About Us' => 'aboutUs',
            'Store' => 'store',
            'Contact Us' => 'contactUs',
            'Logout' => 'logout' 
        ],
        'admin' => [
            'Home' => '/',
            'About Us' => 'aboutUs',
            'Store' => 'store',
            'Contact Us' => 'contactUs',
            'Manage Items' => 'manageUsers',
            'Logout' => 'logout'
        ]
        ];
} else {
    return [
        'customer' => [
        'Home' => '/',
        'About Us' => 'aboutUs',
        'Store' => 'store',
        'Contact Us' => 'contactUs',
        'Account' => [
                'Login' => 'login',
                'Register' => 'register'
            ]
        ]
    ];
}

