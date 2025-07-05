<div class="add">
    <h2>Add New Item</h2>
    <form action="handlers/add_item.handler.php" method="POST">
        <label>Item Name:</label>
        <input type="text" name="item_name" required>

        <label>Description:</label>
        <input type="text" name="description">

        <label>Price:</label>
        <input type="number" name="price" step="0.01" required>

        <label>Quantity:</label>
        <input type="number" name="quantity" required>

        <button type="submit">Add Item</button>
    </form>
  </div>