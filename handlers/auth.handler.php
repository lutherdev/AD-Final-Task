<?php

require_once BASE_PATH . '/bootstrap.php';

require_once UTILS_PATH . '/envSetter.util.php';

require_once STATICDATAS_PATH . '/dummies/accounts.staticData.php';

$pgConfig = [
'host' => $dbConfig['pgHost'],
'port' => $dbConfig['pgPort'],
'db'   => $dbConfig['pgDB'],
'user' => $dbConfig['pgUser'],
'pass' => $dbConfig['pgPassword'],
];

if (file_exists('/.dockerenv')) {
    $pgConfig['host'] = $_ENV['PG_HOST'] = 'postgresql';
    $pgConfig['port'] = '5432'; 
} else {
    $pgConfig['host'] = 'localhost';
}

$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";

try {
// $pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
// ]);
// echo "Connected to PostgreSQL!\n";

    if (session_status() === PHP_SESSION_NONE) {  //THIS IS NEEDED SINCE EVEN IF LOGIN INDEX CALLED THIS FILE, ROUTER AND ITS AUTH INIT WASNT USED SINCE ERROR CAME FAST SOO YEAH
            session_start(); 
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'login') {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        if ($username == $defaultAccs[0]['username']){
            if ($password == $defaultAccs[0]['password']){
                $_SESSION['user'] = $defaultAccs[0];
                header("Location: /"); //passes this location to the routing control which is router.php then processes the "/"
                exit;
            } else {
                header("Location: /login?error=Invalid+password");
                exit;
            }
        }else {
                header("Location: /login?error=Invalid+username");
                exit;
            }
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'register') {
    $username = $_POST['username'];
    $rawPassword = $_POST['password'];

    $hashedPassword = password_hash($rawPassword, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->execute([
        ':username' => $username,
        ':password' => $hashedPassword
    ]);
    echo 'register success';
    header("Location: /");
    exit;
    }

}   catch (Exception $e) {
echo "❌ ERROR: " . $e->getMessage() . "\n";
exit(255);
}

// if (Auth::attempt($pdo, $username, $password)) {
//     header("Location: /dashboard");
//     exit;
// }



?>
