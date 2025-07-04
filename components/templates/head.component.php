<?php
require_once UTILS_PATH . "/htmlEscape.util.php";

function head(string $pageTitle, string $pageCss = '') {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= htmlEscape($pageTitle) ?></title>
        <!-- Core CSS -->
        <link rel="stylesheet" href="assets/css/nav.component.css">
        <?php if (!empty($pageCss)): ?>
            <!-- Page-specific CSS -->
            <link rel="stylesheet" href="<?= htmlEscape($pageCss) ?>">
        <?php endif; ?>
    </head>
    <body>
        <main>
    <?php
}
?>