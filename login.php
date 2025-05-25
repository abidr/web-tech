<?php include 'control/login_action.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <input type="submit" value="Login" class="btn">
            <p class="error">
                <?php if (isset($_GET['error'])) echo htmlspecialchars($_GET['error']); ?>
            </p>
        </form>
        <p>Don't have an account? <a href="register_user.php">Register</a></p>
    </div>
</body>
</html>