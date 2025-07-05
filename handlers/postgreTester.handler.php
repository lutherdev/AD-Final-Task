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

    pg_close($dbconn);
}