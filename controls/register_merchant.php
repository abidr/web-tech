<?php 
  include '../model/db.php';

  if (isset($_SESSION['email'])) {
    header("Location: ../views/dashboard_merchant.php");
  }

  $firstNameError = "";
  $lastNameError = "";
  $emailError = "";
  $passwordError = "";
  $phoneError = "";
  $dobError = "";
  $genderError = "";
  $businessNameError = "";
  $businessTypeError = "";
  $termsError = "";
  $logoError = "";

  $db = new Db();

  $successMessage = "";
  $errorMessage = "";

  if(isset($_POST['submit'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $dob = $_POST['date_of_birth'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $businessName = $_POST['business_name'];
    $businessType = $_POST['business_type'];
    $terms = isset($_POST['agree_terms']) ? $_POST['agree_terms'] : null;
    $logo = isset($_FILES['logo']) ? $_FILES['logo'] : null;

    $firstNameError = empty($firstName) ? "First name is required" : "";
    $lastNameError = empty($lastName) ? "Last name is required" : "";
    $emailError = empty($email) ? "Email is required" : "";
    $passwordError = empty($password) ? "Password is required" : "";
    $phoneError = empty($phone) ? "Phone number is required" : "";
    $dobError = empty($dob) ? "Date of birth is required" : "";
    $genderError = empty($gender) ? "Gender is required" : "";
    $businessNameError = empty($businessName) ? "Business name is required" : "";
    $businessTypeError = empty($businessType) ? "Business type is required" : "";
    $termsError = empty($terms) ? "You must accept the terms and conditions" : "";
    $logoError = empty($logo) ? "Logo is required": "";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Invalid email format";
    }
    if (strlen($password) < 8) {
      $passwordError = "Password must be at least 8 characters long";
    }
    if (!$terms) {
      $termsError = "You must accept the terms and conditions";
    }
    
    if (empty($firstNameError) && empty($lastNameError) && empty($emailError) && empty($passwordError) && empty($phoneError) && empty($dobError) && empty($genderError) && empty($businessNameError) && empty($businessTypeError) && empty($termsError) && empty($logoError)) {
      $extension = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
      $target_name = uniqid() . '.' . $extension;
      $target_file = "../uploads/" . $target_name;

      if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
        if($db->insertMerchant($firstName, $lastName, $email, $password, $phone, $dob, $gender, $businessName, $businessType, $target_name) === true) {
          $successMessage = "Registration successful!";
        } else {
          $errorMessage = $db->conn->error;
        }
      } else {
        $errorMessage = "Sorry, there was an error uploading your file.";
      }

    }
  }
?>