<?php
require_once 'bootstrap.php';
$team_members = require STATICDATAS_PATH . '/dummies/aboutUs.staticData.php'; 

?>

<main class="aboutus-container">
    <section class="about-hero">
        <div class="hero-background"></div>
        <div class="hero-content">
            <div class="story-header">
                <h1>OUR FOUNDING</h1>
                <div class="mineforge-banner">
                    <span>MineForge</span>
                    <span>Delvers of the Underdark</span>
                </div>
            </div>
        </div>
    </section>

    <section class="about-story">
        <div class="parch-container">
        <p class="parch-text">Founded in the bustling trade era of Baldur's Gate's expansion, MineForge began as a modest consortium of skilled miners and metalsmiths seeking to bring quality craftsmanship to the growing city. Over decades, we've grown from a single hillside quarry to multiple operations across the West Heartlands, always maintaining our commitment to excellence.</p>
        </div>
    </section>
    <section class="about-service">
        <div class="forge-container">
        <h2 class="forge-title">Our Work</h2>
        <div class="ore-divider"></div>
        <p class="forge-text">MineForge specializes in ethically sourced metals and minerals, supplying Baldur's Gate's finest smiths and builders. Our high-grade iron and steel form the backbone of the city's weapons and structures, while carefully selected gemstones—some with intriguing natural properties—are prized by jewelers and arcanists alike. Using time-honored techniques blending dwarven precision with human innovation, we extract quality stone for the city's growing architecture, though some of our deeper operations require... particularly specialized expertise.
        </p>
        <div class="mining-pick"></div>
        </div>
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