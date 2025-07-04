<?php
require_once 'bootstrap.php';
$team_members = require STATICDATAS_PATH . '/dummies/aboutUs.staticData.php'; 

?>

<main class="aboutus-container">
    <section class="about-story">
        <h1>MineForge - Delvers of the Underdark</h1>
        <p>Founded in the bustling trade era of Baldur's Gate's expansion, MineForge began as a modest consortium of skilled miners and metalsmiths seeking to bring quality craftsmanship to the growing city. Over decades, we've grown from a single hillside quarry to multiple operations across the West Heartlands, always maintaining our commitment to excellence. </p>
    </section>
    <section class="about-service">
        <h2>Our Work</h2>
        <p>MineForge specializes in ethically sourced metals and minerals, supplying Baldur's Gate's finest smiths and builders. Our high-grade iron and steel form the backbone of the city's weapons and structures, while carefully selected gemstones—some with intriguing natural properties—are prized by jewelers and arcanists alike. Using time-honored techniques blending dwarven precision with human innovation, we extract quality stone for the city's growing architecture, though some of our deeper operations require... particularly specialized expertise..</p>
    </section>
    <section class="about-team">
        <h2>Our Team</h2>
        <div class="team-grid">
            <?php foreach ($team_members as $member) : ?>
                <div class="team-card">
                    <img src="<?= htmlspecialchars($member['image']) ?>"
                         alt="<?= htmlspecialchars($member['name']) ?>"
                         class="team-photo">
                    <h3><?= htmlspecialchars($member['name']) ?></h3>
                    <p><?= htmlspecialchars($member['role']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        </div>
    </section>
</main>