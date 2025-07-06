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

$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";

try {
    //TODO: DATABASE: UNCOMMENT THIS TO BE CONNECTED SA DATABASE (ONLY WORKS ON DOCKER SO ON MO MUNA)
        $pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);

    if (session_status() === PHP_SESSION_NONE) {  //THIS IS NEEDED SINCE EVEN IF LOGIN INDEX CALLED THIS FILE, ROUTER AND ITS AUTH INIT WASNT USED SINCE ERROR CAME FAST SOO YEAH
            session_start(); 
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'login') {
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        //TODO: DATABASE: CREATE A WAY TO COMPARE THE INPUT WITH DATABASE FETCH INSTEAD OF $defaultAccs
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header("Location: /");
                exit;
            } else {
                header("Location: /login?error=Invalid+password");
                exit;
            }
        } else {
            header("Location: /login?error=Invalid+username");
            exit;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'register') {
    
    //TODO: BACKEND: CREATE A UTIL THAT JUDGES THE USERNAME AND PASSWORD AND ALL OTHER INPUTS
    //TODO: BACKEND: SHOULD EXIT IF JUDGE FAILED BEFORE CREATING THIS USER SESSION ARRAY
 
    //TODO: DATABASE: FIX THIS DATABASE STUFF, CHANGE THE CODE INSIDE PREPARE, AND ADD MORE DATA TO BE INPUTTED
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $role = $_POST['role'];
        $wallet = $_POST['wallet'];
        $rawPassword = $_POST['password'];
        $hashedPassword = password_hash($rawPassword, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (username, password, first_name, last_name, role, wallet) VALUES (:username, :password, :firstname, :lastname, :role, :wallet)");
        $stmt->execute([
            ':username' => $username,
            ':password' => $hashedPassword,
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':role' => $role,
            ':wallet' => $wallet
        ]);


    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user'] = $user;
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
