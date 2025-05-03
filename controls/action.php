<?php 
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

  $successMessage = "";

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

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Invalid email format";
    }
    if (strlen($password) < 8) {
      $passwordError = "Password must be at least 8 characters long";
    }
    if (!$terms) {
      $termsError = "You must accept the terms and conditions";
    }
    
    if (empty($firstNameError) && empty($lastNameError) && empty($emailError) && empty($passwordError) && empty($phoneError) && empty($dobError) && empty($genderError) && empty($businessNameError) && empty($businessTypeError) && empty($termsError)) {
      $successMessage = "Registration successful!";
    }
  }
?>