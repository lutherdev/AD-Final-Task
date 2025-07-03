<?php
require_once BASE_PATH . '/bootstrap.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/nav.component.css">
</head>
<body>
    <?php 
    require_once 'components/templates/nav.component.php';
    include_once HANDLERS_PATH . "/postgreTester.handler.php";
?>
</body>
</html>