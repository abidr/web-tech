<?php 
  include '../model/db.php';

  if (!isset($_SESSION['email'])) {
    header("Location: ../views/login_merchant.php");
  }

  $db = new Db();

  $loginData = $db->merchantInfo($_SESSION['email']);
  if(!$loginData) {
    header("Location: ../views/login_merchant.php");
  }

  $transactions = $db->getMerchantTransactions($loginData['id']);
?>