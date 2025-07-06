<div class="remove-outer">
  <div class="remove">
    <h2>Remove Item</h2>
    <form action="handlers/remove-item.handler.php" method="POST">
        <label>ID:</label>
        <input type="text" name="id" required>

        <label>Item Name:</label>
        <input type="text" name="item-name">

        <button type="submit">Remove Item</button>
    </form>
  </div>
</div>