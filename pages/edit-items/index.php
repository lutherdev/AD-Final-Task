<div class="edit-outer">
  <div class="edit">
    <h2>Edit Item</h2>
    <form action="handlers/edit_item.handler.php" method="POST">
        <label>ID:</label>
        <input type="text" name="id" required>

        <label>Item Name:</label>
        <input type="text" name="item-name">

        <label>What to Edit:</label>
        <input type="text" name="edit">

        <label>Changes:</label>
        <input type="text" name="changes">

        <button type="submit">Edit Item</button>
    </form>
  </div>
</div>