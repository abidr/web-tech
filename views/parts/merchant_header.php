<?php
$loggedIn = false;
$loginEmail = "";

session_start();
if (isset($_SESSION['email'])) {
  $loggedIn = true;
  $loginEmail = $_SESSION['email'];
}
?>

<!DOCTYPE html>
  <html>
  <head>
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="../style_merchant.css" />
  </head>
  <body>
    <div class="header">
      <div class="logo">
        <h2>Wallet System</h2>
      </div>
      <div class="navbar">
        <?php 
        if ($loggedIn) {
        ?>
        <ul>
          <li><a href="./dashboard_merchant.php">Dashboard</a></li>
          <li><a href="./trx_merchant.php">Transactions</a></li>
          <li><a href="./transfer_merchant.php">Transfer</a></li>
          <li><a href="./profile_merchant.php">Profile</a></li>
          <li><a href="../controls/logout_merchant.php">Logout</a></li>
        </ul>
        <?php 
        } else {
        ?>
        <ul>
          <li><a href="./login_merchant.php">Login</a></li>
          <li><a href="./register_merchant.php">Register</a></li>
        </ul>
        <?php 
        }
        ?>
      </div>
    </div>