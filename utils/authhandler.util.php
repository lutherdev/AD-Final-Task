<?php

require_once BASE_PATH . '/bootstrap.php';
if (session_status() === PHP_SESSION_NONE) { 
        session_start(); 
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'login') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if ($username == $_SESSION['user']['username']){
        if ($password == $_SESSION['user']['password']){
            echo "login success";
            echo "welcome : " . $_SESSION['user']['username'];
            header("Location: /"); 
            exit;
        } else {
            echo "wrong pass";
        }
        
    }else {
            echo "wrong username";
        }
}



// if (Auth::attempt($pdo, $username, $password)) {
//     header("Location: /dashboard");
//     exit;
// }



?>
