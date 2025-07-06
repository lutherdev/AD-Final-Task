<?php

require_once BASE_PATH . '/bootstrap.php';
require_once UTILS_PATH . '/envSetter.util.php';

$host = $dbConfig['pgHost']; 
$port = $dbConfig['pgPort'];
$username = $dbConfig['pgUser'];
$password = $dbConfig['pgPassword'];
$dbname = $dbConfig['pgDB'];

$conn_string = "host=$host port=$port dbname=$dbname user=$username password=$password";
$dbconn = pg_connect($conn_string);
if (!$dbconn) {
    echo "❌ Connection Failed: ", pg_last_error() . "  <br>";
    exit();
} else {
    echo "✔️ PostgreSQL Connection  <br>";
    echo "✔️ PostgreSQL: " . $dbConfig['pgHost'];


$conn_string2 = "pgsql:" . $conn_string;
$pdo = new PDO($conn_string2, $dbConfig['pgUser'], $dbConfig['pgPassword'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);

$files = ['/database/users.model.sql', '/database/users_messages.model.sql'];

foreach ($files as $file) {
    $sql = file_get_contents(BASE_PATH . $file);
    try {
        $pdo->exec($sql);
        echo "✅ SQL file $file executed successfully!<br>";
    } catch (PDOException $e) {
        echo "❌ SQL error in $file: " . $e->getMessage() . "<br>";
    }
}

$stmt = $pdo->query("SELECT * FROM users");

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    echo "---------------------------\n";
    echo "User ID: " . $user['id'] . "\n";
    echo "Username: " . $user['username'] . "\n";
    echo "First Name: " . $user['first_name'] . "\n";
    echo "Last Name: " . $user['last_name'] . "\n";
    echo "Role: " . $user['role'] . "\n";
    echo "---------------------------\n";
}

$stmt = $pdo->query("SELECT * FROM users_messages");

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    echo "---------------------------<br>";
    echo "User ID: " . $user['id'] . "<br>";
    echo "Username: " . $user['username'] . "<br>";
    echo "First Name: " . $user['name'] . "<br>";
    echo "Last Name: " . $user['email'] . "<br>";
    echo "Message: " . $user['message'] . "<br>";
    echo "---------------------------<br>";
}

    pg_close($dbconn);
}