<?php include 'control/action.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration for User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Registration for User</h1>
    </header>
    <main>
        <form action="" method="POST">
            <fieldset>
                <legend><h3>User Info:</h3></legend>
                <table>
                    <tr>
                        <td>First Name:</td>
                        <td>
                            <div class="form-group">
                                <input type="text" name="first_name" id="first_name" value="<?php echo htmlspecialchars($firstName); ?>">
                                <span class="error"><?php echo $firstNameError; ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td>
                            <div class="form-group">
                                <input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($lastName); ?>">
                                <span class="error"><?php echo $lastNameError; ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td>
                            <div class="form-group">
                                <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($password); ?>">
                                <span class="error"><?php echo $passwordError; ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Email Address:</td>
                        <td>
                            <div class="form-group">
                                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
                                <span class="error"><?php echo $emailError; ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Date of Birth:</td>
                        <td>
                            <div class="form-group">
                                <input type="date" name="date_of_birth" id="date_of_birth" value="<?php echo htmlspecialchars($dob); ?>">
                                <span class="error"><?php echo $dobError; ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td>
                            <div class="form-group">
                                <input type="radio" name="gender" value="male" <?php if ($gender == "male") echo "checked"; ?>> Male
                                <input type="radio" name="gender" value="female" <?php if ($gender == "female") echo "checked"; ?>> Female
                                <span class="error"><?php echo $genderError; ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <input type="checkbox" name="agree_terms" value="yes" <?php if ($terms == "yes") echo "checked"; ?>>
                                I agree to all terms and conditions
                                <span class="error"><?php echo $termsError; ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Register">
                            <p class="success"><?php echo $successMessage; ?></p>
                        </td>
                    </tr>

                    <tr>
                     <td>Upload Picture:</td>
                      <td><input type="file" name="myfile" id="myfile"></td>
                       <td><span class="error"><?php echo $fileError; ?></span></td>
                      </tr>

                    


                </table>
            </fieldset>
            <p>Go to  <a href="login.php">Login</a></p>
        </form>
    </main>
</body>
</html>
