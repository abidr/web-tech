<?php 
$pageTitle = "Merchant Transfer";
include './parts/merchant_header.php';
include "../controls/dashboard_merchant.php";
?>
<div class="container">
  <div class="dashboard-header">
    <h1>Transfer</h1>
    <p>Send money to other users.</p>
  </div>
  <div class="form">
  <form id="transferForm" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateFormTransfer()">
    <table>
      <tbody>
        <tr>
          <td>Email Adress</td>
          <td>
            <input type="text" name="email" id="email" />
            <span class="error" id="email_error"></span>
          </td>
        </tr>
        <tr>
          <td>Amount</td>
          <td>
            <input type="number" name="amount" id="amount"  />
            <span class="error" id="amount_error"></span>
            <p>Available Balance: <span id="available_balance"><?php echo $loginData['balance']; ?></span> BDT</p>
          </td>
        </tr>
        <tr>
          <td>
            <button class="button" type="submit" name="submit">Send</button>
            <p class="success" id="transfer_success"></p>
            <p class="error" id="transfer_error"></p>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
  </div>
</div>
<?php
include "./parts/merchant_footer.php";