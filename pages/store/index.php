<?php
$products = [
    [
        'name' => 'Pickaxe',
        'price' => 200,
        'description' => 'Essential for mining stone and ore.',
        'category' => 'Tools',
        'image' => '/pages/store/assets/img/pickaxe.png'
    ],
    [
        'name' => 'Gold Nugget',
        'price' => 120,
        'description' => 'Precious gold used for trading and decorations.',
        'category' => 'Ore',
        'image' => '/pages/store/assets/img/pickaxe.png'
    ],
    [
        'name' => 'Iron Pickaxe',
        'price' => 200,
        'description' => 'Raw metal for crafting tools and armor.',
        'category' => 'Tools',
        'image' => '/pages/store/assets/img/pickaxe.png'
    ],
    [
        'name' => 'Head Lamp',
        'price' => 90,
        'description' => 'Keep your tunnels lit and safe.',
        'category' => 'Gear',
        'image' => '/pages/store/assets/img/pickaxe.png'
    ],
    [
        'name' => 'Miner\'s Helmet',
        'price' => 150,
        'description' => 'Protects your head from falling rocks.',
        'category' => 'Gear',
        'image' => '/pages/store/assets/img/pickaxe.png'
    ],
];
?>

<section class="store-container" id="inventory">
    <div class="store-header">
      <h1>Miner's Inventory</h1>
      <div class="store-filters">
        <button class="menu-btn">Ore</button>
        <button class="menu-btn">Tools</button>
        <button class="menu-btn">Gear</button>
      </div>
    </div>

    <div class="store-main">
      <div class="sidebar">
        <aside class="cart-box">
          <h2>Cart</h2>
          <ul id="cart-items">

          </ul>
          <div class="total">Total: ₱<span id="cart-total">0</span></div>
        </aside>

        <aside class="cart-box2">
          <h2>SAMPLE BOX</h2>
          <ul>
            <li>Miner's Helmet<span>₱150</span></li>
            <li>Gold Nugget<span>₱120</span></li>
          </ul>
          <div class="total">Total: ₱270</div>
        </aside>
      </div>

      <div class="products-grid">
    <?php foreach ($products as $product): ?>
        <div class="product-card">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
            <div class="product-info">
                <h3><?= $product['name'] ?></h3>
                <p><?= $product['description'] ?></p>
                <div class="price-action">
                    <span class="price">₱<?= $product['price'] ?></span>
                    <button onclick="addToCart('<?= $product['name'] ?>', <?= $product['price'] ?>, '<?= $product['category'] ?>')">Add to Cart</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
  </section>
<script src="/pages/store/assets/js/store.js"></script>
 