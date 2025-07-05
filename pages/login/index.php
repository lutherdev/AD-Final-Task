<div class="login-container">
  <div class="login-box">
    <h2>Login</h2>

    <form action="utils/authhandler.util.php" method="POST">
      <label>Username: </label>
      <input type="text" name="username" required>

      <label>Password: </label>
      <input type="password" name="password" required>

      <input type="hidden" name="action" value="login">
      <button type="submit">Login</button>

      <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
      <?php endif; ?>
    </form>
  </div>
</div>
