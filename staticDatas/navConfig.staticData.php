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
            'About Us' => 'aboutus',
            'Store' => 'store',
            'Contact Us' => 'contactus',
            'Logout' => 'handlers/logout.handler.php' 
        ],
        'admin' => [
            'Home' => '/',
            'About Us' => 'aboutus',
            'Store' => 'store',
            'Contact Us' => 'contactus',
            'Manage Items' => 'manageUsers',
            'Logout' => 'handlers/logout.handler.php'
        ]
        ];
} else {
    return [
        'customer' => [
        'Home' => '/',
        'About Us' => 'aboutus',
        'Store' => 'store',
        'Contact Us' => 'contactus',
        'Account' => [
                'Login' => 'login',
                'Register' => 'register'
            ]
        ]
    ];
}

