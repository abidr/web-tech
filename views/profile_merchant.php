<?php 
$pageTitle = "Merchant Profile";
include './parts/merchant_header.php';
include "../controls/dashboard_merchant.php";
?>
<div class="container">
  <div class="dashboard-header">
    <h1>My Profile</h1>
    <p>Here you can update your profile information.</p>
  </div>
  <div class="form">
  <form id="profileForm" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <table>
      <tbody>
        <tr>
          <td>First Name</td>
          <td>
            <input type="text" name="first_name" id="first_name" value="<?php echo $loginData['first_name']; ?>" />
            <span class="error" id="first_name_error"></span>
          </td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td>
            <input type="text" name="last_name" id="last_name" value="<?php echo $loginData['last_name']; ?>" />
            <span class="error" id="last_name_error"></span>
          </td>
        </tr>
        <tr>
          <td>Email Adress</td>
          <td>
            <input type="text" name="email" id="email" value="<?php echo $loginData['email']; ?>" />
            <span class="error" id="email_error"></span>
          </td>
        </tr>
        <tr>
          <td>Password</td>
          <td>
            <input type="password" name="password" id="password" />
            <span class="error" id="password_error"></span>
          </td>
        </tr>
        <tr>
          <td>Phone Number</td>
          <td>
            <input type="text" name="phone" id="phone"value="<?php echo $loginData['phone']; ?>" />
            <span class="error" id="phone_error"></span>
          </td>
        </tr>
        <tr>
          <td>Date of Birth</td>
          <td>
            <input type="date" name="date_of_birth" id="dob"value="<?php echo $loginData['dob']; ?>" />
            <span class="error" id="dob_error"></span>
          </td>
        </tr>
        <tr>
          <td>Gender</td>
          <td>
            <input type="radio" name="gender" value="Male" id="gender_male" <?php echo $loginData['gender'] == 'Male' ? 'checked' : '' ?> />
            <label for="gender_male">Male</label>
            <input type="radio" name="gender" value="Female" id="gender_female" <?php echo $loginData['gender'] == 'Female' ? 'checked' : '' ?> />
            <label for="gender_female">Female</label>
            <span class="error" id="gender_error"></span>
          </td>
        </tr>
        <tr>
          <td>Business Name</td>
          <td>
            <input type="text" name="business_name" id="business_name" value="<?php echo $loginData['business_name']; ?>" />
            <span class="error" id="business_name_error"></span>
          </td>
        </tr>
        <tr>
          <td>Business Type</td>
          <td>
            <select name="business_type" id="business_type">
              <option value="food" <?php echo $loginData['business_type'] == 'food' ? 'selected' : '' ?>>Food</option>
              <option value="clothing" <?php echo $loginData['business_type'] == 'clothing' ? 'selected' : '' ?>>Clothing</option>
              <option value="electronics" <?php echo $loginData['business_type'] == 'electronics' ? 'selected' : '' ?>>Electronics</option>
              <option value="furniture" <?php echo $loginData['business_type'] == 'furniture' ? 'selected' : '' ?>>Furniture</option>
            </select>
            <span class="error" id="business_type_error"></span>
          </td>
        </tr>
        <tr>
          <td>
            <button class="button" type="submit" name="submit">Update</button>
            <p class="success" id="profile_success"></p>
            <p class="error" id="profile_error"></p>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
  </div>
</div>
<?php
include "./parts/merchant_footer.php";