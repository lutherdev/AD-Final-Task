<?php
$error = $_GET['error'] ?? '';
?>

<div class="login-container">
  <div class="parchment-login">
    <h2 class="login-title">MineForge Access</h2>
    <div class = "login-divider">⚒⚒⚒</div>


<form action="utils/authhandler.util.php" method="POST" class="login-form">
  <div class="form-group">
    <label>Username: </label>
    <input type="text" name="username" required>
  </div>

  <div class="form-group">
    <label>Password: </label>
    <input type="password" id="password" name="password" class="form-input" required>
  </div>
      <input type="hidden" name="action" value="login">
      <button type="submit" class="login-btn">Login</button>

      <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
      <?php endif; ?>
    </form>
  </div>
</div>
