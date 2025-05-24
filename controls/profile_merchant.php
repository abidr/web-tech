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
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$dob = $_POST['date_of_birth'];
$gender = $_POST['gender'];
$businessName = $_POST['business_name'];
$businessType = $_POST['business_type'];

if($db->updateMerchant($id, $firstName, $lastName, $email, $password, $phone, $dob, $gender, $businessName, $businessType)) {
    echo "Profile updated successfully.";
} else {
    http_response_code(400);
    echo "Error updating profile: " . $db->conn->error;
}
