<?php
require_once "layouts/main.layout.php";
require_once "bootstrap.php";
// Get the URI path
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");

// Default page
if ($uri === "") {
    $folder = "homepage";
} else {
    $folder = $uri;
}

$pageFile = PAGES_PATH . "/{$folder}/index.php";
$pageCssPath = "pages/{$folder}/assets/css/{$folder}.css";
$title = ucfirst($folder);

if (isset($_SESSION['user'])) {
        echo "You are now logged in as " . $_SESSION['user']['first_name'] . '<br>';
        echo "Your role is : " . $_SESSION['user']['role'] . '<br>';
        echo 'Your money is : ' . $_SESSION['user']['wallet'];
    } else {
        echo "No user is logged in.";
    }
renderMainLayout(function () use ($pageFile) {
    if (file_exists($pageFile)) {
        require $pageFile;
    } else {
        echo "<h1>404 - Page Not Found</h1>";
    }
}, $title, $pageCssPath);
