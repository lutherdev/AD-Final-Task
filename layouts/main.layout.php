<?php
declare(strict_types=1);

// 1. Bootstrap, Autoload, Auth
require_once BASE_PATH . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';
// require_once UTILS_PATH . '/auth.util.php'; the login page
// Auth::init(); for login purposes

// 2. Load templates
require_once TEMPLATES_PATH . '/head.component.php';
require_once TEMPLATES_PATH . '/nav.component.php';
//require_once TEMPLATES_PATH . '/foot.component.php';
require_once UTILS_PATH . "/envSetter.util.php";

// 3. Load nav data
$nav_config = require STATICDATAS_PATH . '/navConfig.staticData.php';


function renderMainLayout(callable $content, string $title, string $pageCss = ""): void
{
    // Use the globals loaded above
    global $headNavList, $user;
    head($title, $pageCss);
    //navHeader($headNavList, $user);
    require_once COMPONENTS_PATH . '/templates/nav.component.php';
    $content();
    footer();
}
