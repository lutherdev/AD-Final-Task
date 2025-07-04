<?php

require_once BASE_PATH . '/bootstrap.php';

return [
    'customer' => [
        'Home' => 'home.php',
        'About Us' => PAGES_PATH . '/aboutUs/index.php',
        'Shop' => 'shop.php',
        'Contact Us' => PAGES_PATH . '/contactUs/index.php',
        'Logout' => 'logout.php'
    ],
    'admin' => [
        'Dashboard' => 'admin/dashboard.php',
        'Manage Users' => 'admin/users.php',
        'Reports' => 'admin/reports.php',
        'Logout' => 'logout.php'
    ]
];
