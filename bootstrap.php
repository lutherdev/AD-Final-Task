<?php
//REQUIRE THIS FILE IF YOU NEED SETTER SUCH AS ENVIRONMENT/AUTHENTICATION/PATHS/CONNECTION TO PDO

define('BASE_PATH', realpath(__DIR__));
define('UTILS_PATH', BASE_PATH . '/utils');
define('STATICDATAS_PATH', BASE_PATH . '/staticDatas');
define('SQL_PATH', BASE_PATH . '/sql');
define('PAGES_PATH', BASE_PATH . '/pages');
define('LAYOUTS_PATH', BASE_PATH . '/layouts');
define('HANDLERS_PATH', BASE_PATH . '/handlers');
define('ERRORS_PATH', BASE_PATH . '/errors');
define('DOCS_PATH', BASE_PATH . '/docs');
define('DATABASE_PATH', BASE_PATH . '/database');
define('COMPONENTS_PATH', BASE_PATH . '/components');
define('TEMPLATES_PATH', COMPONENTS_PATH . '/templates');
define('ASSETS_PATH', BASE_PATH . '/assets');

chdir(BASE_PATH);

require_once UTILS_PATH . '/envSetter.util.php';

// $host = $dbConfig['pgHost']; 
// $port = $dbConfig['pgPort'];
// $username = $dbConfig['pgUser'];
// $password = $dbConfig['pgPassword'];
// $dbname = $dbConfig['pgDB'];

// $conn_string = "pgsql:host=$host port=$port dbname=$dbname user=$username password=$password";

// $pdo = new PDO($conn_string, $dbConfig['pgUser'], $dbConfig['pgPassword'], [
//             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//         ]);
