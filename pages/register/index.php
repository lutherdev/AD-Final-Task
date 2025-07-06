<?php
$error = $_GET['error'] ?? '';
?>

<div class="register-container">
  <div class="register-box">
    <h2>Register</h2>
    <form action="handlers/auth.handler.php" method="POST">

      <div class="input-group">
        <label>Username: </label>
        <input type="text" name="username" required>
      </div>

      <div class="input-group">
        <label>Password: </label>
        <input type="password" name="password" required>
      </div>

      <div class="input-group">
        <label>Firstname: </label>
        <input type="text" name="firstname" required>
      </div>

      <div class="input-group">
        <label>Lastname: </label>
        <input type="text" name="lastname" required>
      </div>

      <div class="input-group">
        <label>Role: </label>
        <select name="role" required>
          <option value="">--Select Role--</option>
          <option value="customer">Customer</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <div class="input-group">
        <label>Wallet: </label>
        <input type="text" name="wallet" required>
      </div>

        <input type="hidden" name="action" value="register">
        <button type="submit">Register</button>

        <?php if (!empty($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
    </form>
  </div>
</div>