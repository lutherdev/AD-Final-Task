<?php

class Auth{
    public static function init(): void
{
    if (session_status() === PHP_SESSION_NONE) { //IF SESSION IS NONE : LIKE NO STARTED SESSION THEN =
        session_start(); // START THE SESSION NOW!
    } 

    if (isset($_SESSION['user'])) {
        echo "You are now logged in as " . $_SESSION['user']['first_name'] . '<br>';
        echo "Your role is : " . $_SESSION['user']['role'] . '<br>';
        echo 'Your money is : ' . $_SESSION['user']['wallet'];
    } else {
        echo "No user is logged in.";
}
}

}