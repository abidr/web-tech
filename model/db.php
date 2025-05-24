<?php 
class Db {
    private $host = 'circlecodes.co';
    private $db_name = 'web_tech';
    private $username = 'web_tech';
    private $password = 'YLrwjsSkxYYFXk8H';
    public $conn;

    public function __construct() {
      $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
      if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
      }
    }
    public function insertMerchant($firstName, $lastName, $email, $password, $phone, $dob, $gender, $businessName, $businessType, $logo) {
      $sql = "INSERT INTO merchants (first_name, last_name, email, password, phone, dob, gender, business_name, business_type, logo) VALUES ('$firstName', '$lastName', '$email', '$password', '$phone', '$dob', '$gender', '$businessName', '$businessType', '$logo')";

      if ($this->conn->query($sql)) {
        return true;
      } else {
        return $this->conn->error;
      }
    }
    public function loginMerchant($email, $password) {
      $sql = "SELECT * FROM merchants WHERE email = '$email' AND password = '$password'";
      $result = $this->conn->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row; // Return the merchant data
      } else {
        return false; // No matching merchant found
      }
    }
    public function updateMerchant($id, $firstName, $lastName, $email, $password, $phone, $dob, $gender, $businessName, $businessType) {
      if (empty($password)) {
        $sql = "UPDATE merchants SET first_name = '$firstName', last_name = '$lastName', email = '$email', phone = '$phone', dob = '$dob', gender = '$gender', business_name = '$businessName', business_type = '$businessType' WHERE id = '$id'";
      } else {
        $sql = "UPDATE merchants SET first_name = '$firstName', last_name = '$lastName', email = '$email', password = '$password', phone = '$phone', dob = '$dob', gender = '$gender', business_name = '$businessName', business_type = '$businessType' WHERE id = '$id'";
      }
      if ($this->conn->query($sql)) {
        return true;
      } else {
        return $this->conn->error;
      }
    }
    public function sendMoney($senderId, $receiverEmail, $amount) {
      $sql = "SELECT * FROM merchants WHERE email = '$receiverEmail'";
      $result = $this->conn->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $newBalance = $row['balance'] + $amount;
        $sql = "UPDATE merchants SET balance = '$newBalance' WHERE email = '$receiverEmail'";
        if ($this->conn->query($sql)) {
          $senderEmail = $_SESSION['email'];
          $sql = "INSERT INTO transactions (merchant_id, amount, type, description, status) VALUES ('$row[id]', '$amount', 'credit', 'Received from $senderEmail', 'Completed')";
          if ($this->conn->query($sql)) {
            $sql = "INSERT INTO transactions (merchant_id, amount, type, description, status) VALUES ('$senderId', '$amount', 'debit', 'Sent to $receiverEmail', 'Completed')";
            if ($this->conn->query($sql)) {
              $sql = "UPDATE merchants SET balance = balance - '$amount' WHERE id = '$senderId'";
              if ($this->conn->query($sql)) {
                return true; // Money sent successfully
              } else {
                return $this->conn->error; // Error updating sender's balance
              }
            } else {
              return $this->conn->error; // Error inserting sender's transaction
            }
          } else {
            return $this->conn->error;
          }
        } else {
          return $this->conn->error;
        }
      } else {
        return 'Email';
      }
    }
    public function merchantInfo($email) {
      $sql = "SELECT * FROM merchants WHERE email = '$email'";
      $result = $this->conn->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row; // Return the merchant data
      } else {
        return false; // No matching merchant found
      }
    }
    public function getMerchantTransactions($id) {
      $sql = "SELECT * FROM transactions WHERE merchant_id = '$id' ORDER BY date DESC LIMIT 10";
      $result = $this->conn->query($sql);
      foreach ($result as $row) {
        $transactions[] = $row;
      }
      if (!isset($transactions)) {
        $transactions = [];
      }
      return $transactions;
    }
    public function getMerchantTransactionsAll($id) {
      $sql = "SELECT * FROM transactions WHERE merchant_id = '$id' ORDER BY date DESC";
      $result = $this->conn->query($sql);
      foreach ($result as $row) {
        $transactions[] = $row;
      }
      return $transactions;
    }

    public function close() {
      $this->conn->close();
    }
}
?>