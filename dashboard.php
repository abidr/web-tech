<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php?error=Please login first");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome to your dashboard!</h2>
        <p>You have successfully logged in as <strong><?php echo htmlspecialchars($_SESSION['user_email']); ?></strong></p>
        <a class="logout-btn" href="logout.php">Logout</a>
    </div>
</body>
</html>
