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
    $_SESSION['user'] = [
        'id' => $_POST['id'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'first_name' => $_POST['firstname'],
        'last_name' => $_POST['lastname'],
        'role' => $_POST['role'],
        'wallet' => $_POST['wallet']
    ];
    
    $dbfiles = [DATABASE_PATH . '/users.model.sql'];
    foreach ($dbfiles as $dbfile){
        $num = 1;
        $sql = file_get_contents($dbfile);
        if (!$sql) {
            throw new RuntimeException("❌ Could not read the SQL file");
        }
    $pdo->exec($sql);
    }

    // foreach (['users'] as $table) {
    //     $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
    // } 

    //TODO: DATABASE: FIX THIS DATABASE STUFF, CHANGE THE CODE INSIDE PREPARE, AND ADD MORE DATA TO BE INPUTTED
        $id = $_POST['id'];
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $role = $_POST['role'];
        $wallet = $_POST['wallet'];
        $rawPassword = $_POST['password'];
        $hashedPassword = password_hash($rawPassword, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (id, username, password, first_name, last_name, role, wallet) VALUES (:id, :username, :password, :firstname, :lastname, :role, :wallet)");
        $stmt->execute([
            ':id' => $id,
            ':username' => $username,
            ':password' => $hashedPassword,
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':role' => $role,
            ':wallet' => $wallet
        ]);
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
