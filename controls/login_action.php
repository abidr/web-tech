<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "user_registration");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize and fetch form inputs
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Check if the user exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        $hashedPassword = $user['password'];

        // Verify the hashed password
        if (password_verify($password, $hashedPassword)) {
            // Set session variable
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['first_name']; // Optional, for display

            // Redirect to dashboard
            header("Location: /lab/dashboard.php");

            exit();
        } else {
            header("Location: ../login.php?error=Incorrect password");
            exit();
        }
    } else {
        header("Location: ../login.php?error=User not found");
        exit();
    }

    // Close DB connection
    mysqli_close($conn);
}
?>
