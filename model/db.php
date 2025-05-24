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

    public function close() {
      $this->conn->close();
    }
}
?>