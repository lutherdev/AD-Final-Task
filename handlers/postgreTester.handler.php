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
    pg_close($dbconn);
}