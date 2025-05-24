<?php
include '../model/db.php';
session_start();
if (!isset($_SESSION['id'])) {
  http_response_code(403);
  echo "Access denied. You must be logged in.";
  exit();
}
$id = $_SESSION["id"];
$db = new Db();
$email = $_POST['email'];
$amount = $_POST['amount'];

if($db->merchantInfo($email)) {
  $merchantData = $db->merchantInfo($_SESSION['email']);
  if($merchantData['balance'] >= $amount) {
    $result = $db->sendMoney($id, $email, $amount);
    if ($result === true) {
        http_response_code(200);
        $merchantData = $db->merchantInfo($_SESSION['email']);
        echo json_encode($merchantData);
        exit();
    }
  } else {
    http_response_code(400);
    echo "Insufficient balance.";
    exit();
  }
} else {
    http_response_code(400);
    echo "Invalid email address.";
}
