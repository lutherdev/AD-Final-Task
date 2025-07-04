<?php
$carousel_items = [
  [
    'src' => '/assets/img/carousel1.jpg',
    'alt' => 'MineForge Excavation',
    'caption' => 'Quality Minerals Since 1357 DR'
  ],
  [
    'src' => '/assets/img/carousel2.jpg',
    'alt' => 'Our Mining Team',
    'caption' => 'Expert Miners & Craftsmen'
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
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/pages/homepage/assets/css/carousel.css">

<section class="carousel">
  <div id="mineCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php foreach ($carousel_items as $i => $item): ?>
        <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
          <img src="/pages/homepage/assets/img/<?= htmlspecialchars($item['src']) ?>"
               class="d-block w-100"
               alt="<?= htmlspecialchars($item['alt']) ?>">
          <div class="carousel-caption">
            <h2><?= htmlspecialchars($item['caption']) ?></h2>
          </div>
      </div>
      <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mineCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mineCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</section>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>