<?php

class Auth{
    public static function init(): void
{
    if (session_status() === PHP_SESSION_NONE) { //IF SESSION IS NONE : LIKE NO STARTED SESSION THEN =
        session_start(); // START THE SESSION NOW!
        $_SESSION['user'] = [ //HARD CODED ACCOUNT
            'id' => 1,
            'username' => 'notched',
            'password' => 'notched',
            'first_name' => 'Notch',
            'last_name' => 'Ford',
            'role' => 'admin',
            'wallet' => 999999
        ];
        echo "You are now logged in as " . $_SESSION['user']['first_name'] . '<br>';
        echo 'Your money is : ' . $_SESSION['user']['wallet'];
    }
}

}