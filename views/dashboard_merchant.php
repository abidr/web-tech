<?php 
$pageTitle = "Merchant Dashboard";
include './parts/merchant_header.php';
include "../controls/dashboard_merchant.php";
?>
<div class="container">
  <div class="dashboard-header">
    <h1>Hello, <?php echo $loginData['first_name']; ?>!</h1>
    <p>Welcome to your merchant dashboard.</p>
  </div>
  <div class="card">
    <p>Balance</p>
    <h2><?php echo $loginData['balance']; ?> BDT</h2>
  </div>
  <div class="card">
    <p>Recent Transactions</p>
    <table width="100%" border="1" class="table table-striped">
      <thead>
        <tr>
          <th>Date</th>
          <th>Description</th>
          <th>Amount</th>
          <th>Status</th>
          <th>Type</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($transactions as $transaction) { ?>
        <tr id="trx-<?php echo $transaction['id']; ?>">
          <td><?php echo $transaction['date']; ?></td>
          <td><?php echo $transaction['description']; ?></td>
          <td><?php echo $transaction['amount']; ?> BDT</td>
          <td><?php echo $transaction['status']; ?></td>
          <td><?php echo $transaction['type']; ?></td>
          <td>
            <button class="button" onclick="deleteTransaction(<?php echo $transaction['id']; ?>)">Delete</button>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<?php
include "./parts/merchant_footer.php";