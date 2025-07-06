<?php
require_once BASE_PATH . '/utils/auth.util.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

Auth::logout();

header("Location: /login");
exit;
