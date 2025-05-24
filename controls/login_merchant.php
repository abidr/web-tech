<?php 
  include '../model/db.php';
  if (isset($_SESSION['email'])) {
    header("Location: ../views/dashboard_merchant.php");
  }

  $emailError = "";
  $passwordError = "";

  $errorMessage = "";

  $db = new Db();

  if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $emailError = empty($email) ? "Email is required" : "";
    $passwordError = empty($password) ? "Password is required" : "";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Invalid email format";
    }
    if (strlen($password) < 8) {
      $passwordError = "Password must be at least 8 characters long";
    }
    
    if (empty($emailError) && empty($passwordError)) {
      $loginData = $db->loginMerchant($email, $password);
      if($loginData) {
        $_SESSION['id'] = $loginData['id'];
        $_SESSION['email'] = $loginData['email'];
        header("Location: ../views/dashboard_merchant.php");
      } else {
        $errorMessage = "Invalid email or password";
      }
    }
  }
?>