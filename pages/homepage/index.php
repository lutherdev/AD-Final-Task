<?php
$carousel_items = [
  [
    'src' => 'carousel1.jpg',
    'alt' => 'Kingdom of WyrmForge',
  ],
  [
    'src' => 'carousel2.jpg',
    'alt' => 'Lower Cities',
  ],
  [
    'src' => 'carousel3.jpg',
    'alt' => "MineForge's Hall",
  ]
];


$products = [
  [
    'title' => 'Iron Ore',
    'desc' => 'High-grade smelting quality'
  ],
  [
    'title' => 'Gold Ore',
    'desc' => 'Purest in the Sword Coast'
  ]
];

$homePageCss = '/pages/homepage/assets/css/homepage.css';
$carouselCss = '/pages/homepage/assets/css/carousel.css';
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= htmlspecialchars($carouselCss) ?>">
<main class="homepage-container">
<section class="hero-section">
  <div class="hero-carousel">
    <div id="mineCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-inner">
        <?php foreach ($carousel_items as $i => $item): ?>
          <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
            <img src="/pages/homepage/assets/img/<?= htmlspecialchars($item['src']) ?>"
                class="d-block w-100"
                alt="<?= htmlspecialchars($item['alt']) ?>">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class = "hero-overlay"></div>
    <div class = "hero-content">
      <h1>KINGDOM OF WYRMFORGE</h1>
      <p>Mine the most exquisite, high-grade veins beneath the Sword Coast mountains.</p>
      <div class="hero-btn">
        <a href="store" class="btn-gold">Browse Our Wares</a>
        <a href="aboutUs" class="btn-outline">Learn Our History</a>
      </div>
    </div>
  </div>
</section>
<section class="intro-container">
  <div class="intro-content">
    <h2 class="intro-title">MineForge's Legacy</h2>
    <div class="intro-divider"></div>
    <p class="intro-text">
      Forged in the depths of the Sword Coast mountains, MineForge has supplied Baldur's Gate
      with premium metals and minerals since 1357 DR. Our dwarven-crafted wares are
      unearthed through ancient techniques perfected over centuries.
    </p>
    <div class="intro-icon">⚒️</div>
  </div>
</section>

<div class="content-wrapper">
  <section class="products">
    <h2>Our Offerings</h2>
    <div class="product-grid">
      <?php foreach ($products as $product): ?>
        <div class="product-card">
          <h3><?= htmlspecialchars($product['title'])?></h3>
          <p><?= htmlspecialchars($product['desc'])?></p>
        </div>
        <?php endforeach; ?>
    </div>
  </section>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>