<link rel="stylesheet" href="pages/store/assets/css/store.css">

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
    <aside class="cart-box">
      <h2>Cart</h2>
      <ul>
        <li>Pickaxe<span></span></li>
        <li>Pickaxe<span></span></li>
      </ul>
      <div class="total"></div>
    </aside>

    <div class="products-grid">
      <!-- Repeat this block for each product -->
      <div class="product-card">
        <img src="/pages/store/assets/img/pickaxe.png" alt="Iron Ore">
        <div class="product-info">
          <h3>Iron Ore</h3>
          <p>Raw metal for crafting tools and armor.</p>
          <div class="price-action">
            <span class="price">₱50</span>
            <button>Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card">
        <img src="/pages/store/assets/img/pickaxe.png" alt="Gold Nugget">
        <div class="product-info">
          <h3>Gold Nugget</h3>
          <p>Precious gold used for trading and decorations.</p>
          <div class="price-action">
            <span class="price">₱120</span>
            <button>Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card">
        <img src="/pages/store/assets/img/pickaxe.png" alt="Iron Pickaxe">
        <div class="product-info">
          <h3>Iron Pickaxe</h3>
          <p>Essential for mining stone and ore.</p>
          <div class="price-action">
            <span class="price">₱200</span>
            <button>Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card">
        <img src="/pages/store/assets/img/pickaxe.png" alt="Head Lamp">
        <div class="product-info">
          <h3>Head Lamp</h3>
          <p>Keep your tunnels lit and safe.</p>
          <div class="price-action">
            <span class="price">₱90</span>
            <button>Add to Cart</button>
          </div>
        </div>
      </div>

      <div class="product-card">
        <img src="/pages/store/assets/img/pickaxe.png" alt="Miner's Helmet">
        <div class="product-info">
          <h3>Miner's Helmet</h3>
          <p>Protects your head from falling rocks.</p>
          <div class="price-action">
            <span class="price">₱150</span>
            <button>Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
