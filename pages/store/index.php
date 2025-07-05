<?php
require_once STATICDATAS_PATH . '/dummies/store.staticData.php';
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
      <div class="cart-image-wrapper">
        <aside class="cart-box">
          <h2>Cart</h2>
          <ul id="cart-items"></ul>
          <div class="total">Total: ₱<span id="cart-total">0</span></div>
        </aside>
      </div>

      <div class="cart-image-wrapper">
        <aside class="cart-box2">
          <h2>SAMPLE BOX</h2>
          <ul>
            <li>Miner's Helmet<span>₱150</span></li>
            <li>Gold Nugget<span>₱120</span></li>
          </ul>
          <div class="total">Total: ₱270</div>
        </aside>
      </div>
    </div>

    <div class="products-image-wrapper">
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
    </div>
    
  </div>
</section>

<script src="/pages/store/assets/js/store.js"></script>
