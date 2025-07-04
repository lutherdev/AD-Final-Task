<?php
require_once "layouts/main.layout.php";
require_once "bootstrap.php";
// Get the URI path
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");

// Default page
if ($uri === "") {
    $folder = "home";
} else {
    $folder = $uri;
}

$pageFile = PAGES_PATH . "/{$folder}/index.php";
$pageCssPath = "pages/{$folder}/assets/css/{$folder}.css";
$title = ucfirst($folder);

renderMainLayout(function () use ($pageFile) {
    if (file_exists($pageFile)) {
        require $pageFile;
    } else {
        echo "<h1>404 - Page Not Found</h1>";
    }
}, $title, $pageCssPath);
