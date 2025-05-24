<?php
session_start();
if (!isset($_SESSION['id'])) {
  http_response_code(403);
  echo "Access denied. You must be logged in to delete a transaction.";
  exit();
}
include '../model/db.php';
$db = new Db();
$trxId = $_POST['transactionId'];
$merchantId = $_SESSION['id'];
$sql = "DELETE FROM transactions WHERE id = $trxId AND merchant_id = $merchantId";
if ($db->conn->query($sql) === TRUE) {
    http_response_code(200);
    echo "Transaction deleted successfully.";
} else {
  http_response_code(400);
  echo "Error deleting transaction: " . $db->conn->error;
}
$db->close();
?>