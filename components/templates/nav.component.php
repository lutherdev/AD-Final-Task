<?php
    require_once BASE_PATH . '/bootstrap.php';

    $site_name = 'MineForge';

    $user_role = $_SESSION['user']['role'] ?? 'customer';
    $nav_config = require STATICDATAS_PATH . '/navConfig.staticData.php';
    $navbar_items = $nav_config[$user_role] ?? [];

    $current_page = basename($_SERVER['PHP_SELF']);
    $logo_path = $logo_path ?? 'assets/img/logo.png';
    $alt_logo = $alt_logo ?? $site_name . ' logo';
?>

    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-logo">
                <a href="/">
                <img src ="<?php echo htmlspecialchars($logo); ?>"
                     alt ="<?php echo htmlspecialchars($alt_logo); ?>"
                     class="logo-img">
                </a>
            </div>

            <div class="navbar-menu">
                <?php foreach ($navbar_items as $title => $url): ?>
                    <?php if (is_array($url)): ?>
                        <div class="navbar-item dropdown">
                            <span class="dropdown-title"><?php echo htmlspecialchars($title); ?></span>
                            <div class="dropdown-content">
                                <?php foreach ($url as $subTitle => $subUrl): ?>
                                    <a href="<?php echo htmlspecialchars($subUrl); ?>"><?php echo htmlspecialchars($subTitle); ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo htmlspecialchars($url); ?>"
                        class="navbar-item <?php echo ($current_page === $url) ? 'is-active' : ''; ?>">
                        <?php echo htmlspecialchars($title); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
         </div>
    </nav>