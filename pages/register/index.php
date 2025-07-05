<?php
$error = $_GET['error'] ?? '';
?>

<div class="register-container">
  <div class="register-box">
    <h2>Register</h2>
    <form action="handlers/auth.handler.php" method="POST">
        <label>ID: </label>
        <input type="text" name="id" required>

        <label>Username: </label>
        <input type="text" name="username" required>

        <label>Password: </label>
        <input type="password" name="password" required>

        <label>Firstname: </label>
        <input type="text" name="firstname" required>

        <label>Lastname: </label>
        <input type="text" name="lastname" required>

        <label>Role: </label>
        <input type="text" name="role" required>

        <label>Wallet: </label>
        <input type="text" name="wallet" required>

        <input type="hidden" name="action" value="register">
        <button type="submit">Register</button>

        <?php if (!empty($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
    </form>
  </div>
</div>