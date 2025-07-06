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
            'About Us' => 'about-us',
            'Store' => 'store',
            'Contact Us' => 'contact-us',
            'Logout' => 'handlers/logout.handler.php' 
        ],
        'admin' => [
            'Home' => '/',
            'About Us' => 'about-us',
            'Store' => 'store',
            'Contact Us' => 'contact-us',
            'Manage Items' => 'manage-items',
            'Manage' => [
                'Add Item' => 'add-items',
                'Edit Item' => 'edit-items',
                'Remove Item' => 'remove-items'
            ],
            'Logout' => 'handlers/logout.handler.php'
        ]
        ];
} else {
    return [
        'customer' => [
        'Home' => '/',
        'About Us' => 'about-us',
        'Store' => 'store',
        'Contact Us' => 'contact-us',
        'Account' => [
                'Login' => 'login',
                'Register' => 'register'
            ]
        ]
    ];
}

