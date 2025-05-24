<?php 
include '../controls/login_merchant.php';

$pageTitle = "Merchant Login";
include './parts/merchant_header.php';
?>
<div class="form">
  <h1>Merchant Login</h1>
  <form action="" method="POST" enctype="multipart/form-data">
    <table>
      <tbody>
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
          <td>
            <button class="button" type="submit" name="submit">Login</button>
            <p class="error"><?php echo $errorMessage; ?></p>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>
<?php include './parts/merchant_footer.php'; ?>