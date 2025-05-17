<?php 
include 'controls/action.php';
?>
<!DOCTYPE html>
  <html>
  <head>
    <title>Merchant Registration</title>
    <link rel="stylesheet" href="register_merchant.css" />
  </head>
  <body>
    <h1>Merchant Registration</h1>
    <form action="" method="POST" enctype="multipart/form-data">
      <table>
        <tbody>
          <tr>
            <td>First Name</td>
            <td>
              <input type="text" name="first_name" id="first_name" />
              <span class="error" id="first_name_error"><?php echo $firstNameError; ?></span>
            </td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td>
              <input type="text" name="last_name" id="last_name" />
              <span class="error" id="last_name_error"><?php echo $lastNameError; ?></span>
            </td>
          </tr>
          <tr>
            <td>Email Adress</td>
            <td>
              <input type="text" name="email" id="email" />
              <span class="error" id="email_error"><?php echo $emailError; ?></span>
            </td>
          </tr>
          <tr>
            <td>Password</td>
            <td>
              <input type="password" name="password" id="password" />
              <span class="error" id="password_error"><?php echo $passwordError; ?></span>
            </td>
          </tr>
          <tr>
            <td>Phone Number</td>
            <td>
              <input type="text" name="phone" id="phone" />
              <span class="error" id="phone_error"><?php echo $phoneError; ?></span>
            </td>
          </tr>
          <tr>
            <td>Date of Birth</td>
            <td>
              <input type="date" name="date_of_birth" id="dob" />
              <span class="error" id="dob_error"><?php echo $dobError; ?></span>
            </td>
          </tr>
          <tr>
            <td>Gender</td>
            <td>
              <input type="radio" name="gender" value="Male" id="gender_male" />
              <label for="gender_male">Male</label>
              <input type="radio" name="gender" value="Female" id="gender_female" />
              <label for="gender_female">Female</label>
              <span class="error" id="gender_error"><?php echo $genderError; ?></span>
            </td>
          </tr>
          <tr>
            <td>Business Name</td>
            <td>
              <input type="text" name="business_name" id="business_name" />
              <span class="error" id="business_name_error"><?php echo $businessNameError; ?></span>
            </td>
          </tr>
          <tr>
            <td>Business Type</td>
            <td>
              <select name="business_type" id="business_type">
                <option value="food">Food</option>
                <option value="clothing">Clothing</option>
                <option value="electronics">Electronics</option>
                <option value="furniture">Furniture</option>
              </select>
              <span class="error" id="business_type_error"><?php echo $businessTypeError; ?></span>
            </td>
          </tr>
          <tr>
            <td>Business Logo</td>
            <td>
              <input type="file" name="logo" id="logo" />
              <span class="error" id="logo_error"><?php echo $logoError; ?></span>
            </td>
          </tr>
          <tr>
            <td>
            <input type="checkbox" id="agree_terms" name="agree_terms" value="agree" />
            <label for="agree_terms">I agree to all terms and conditions</label><br>
            <span class="error" id="agree_terms_error"><?php echo $termsError; ?></span>
            </td>
          </tr>
          <tr>
            <td>
              <button type="submit" name="submit">Register</button>
              <p class="success"><?php echo $successMessage; ?></p>
              <p class="error"><?php echo $errorMessage; ?></p>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
    <script src="merchant_form.js"></script>
  </body>
</html>