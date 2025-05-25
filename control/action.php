<?php
$firstNameError = "";
$lastNameError = "";
$emailError = "";
$passwordError = "";
$dobError = "";
$genderError = "";
$termsError = "";
$fileError = "";
$successMessage = "";

$firstName = "";
$lastName = "";
$email = "";
$password = "";
$dob = "";
$gender = "";
$terms = "";

if (isset($_POST['submit'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['date_of_birth'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $terms = isset($_POST['agree_terms']) ? $_POST['agree_terms'] : "";

    // File upload validation
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $fileName = $_FILES['profile_picture']['name'];
        $fileTmp = $_FILES['profile_picture']['tmp_name'];
        $fileSize = $_FILES['profile_picture']['size'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($fileExt, $allowedExts)) {
            $fileError = "Only JPG, JPEG, PNG & GIF files are allowed";
        } elseif ($fileSize > 2 * 1024 * 1024) {
            $fileError = "File size should be less than 2MB";
        } else {
            $newFileName = uniqid("IMG_", true) . "." . $fileExt;
            $uploadPath = "uploads/" . $newFileName;
            move_uploaded_file($fileTmp, $uploadPath);
        }
    } else {
        $fileError = "Profile picture is required";
    }

    // Validate inputs
    if (empty($firstName)) $firstNameError = "First name is required";
    if (empty($lastName)) $lastNameError = "Last name is required";
    if (empty($dob)) $dobError = "Date of birth is required";

    if (empty($email)) {
        $emailError = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
    }

    if (empty($password)) {
        $passwordError = "Password is required";
    } elseif (strlen($password) < 6) {
        $passwordError = "Password must be at least 6 characters";
    }

    if (empty($gender)) $genderError = "Gender is required";
    if (empty($terms)) $termsError = "You must accept the terms and conditions";

    // Proceed if no validation errors
    if (
        $firstNameError === "" &&
        $lastNameError === "" &&
        $emailError === "" &&
        $passwordError === "" &&
        $dobError === "" &&
        $genderError === "" &&
        $termsError === "" &&
        $fileError === ""
    ) {
        $conn = mysqli_connect("localhost", "root", "", "user_registration");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $checkEmail = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $checkEmail);

        if (mysqli_num_rows($result) > 0) {
            $emailError = "Email already exists. Try another.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (first_name, last_name, email, password, date_of_birth, gender, profile_picture)
                    VALUES ('$firstName', '$lastName', '$email', '$hashedPassword', '$dob', '$gender', '$newFileName')";

            if (mysqli_query($conn, $sql)) {
                $successMessage = "Your Registration is successful!";
                $firstName = $lastName = $email = $password = $dob = $gender = $terms = "";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
    }
}
?>
