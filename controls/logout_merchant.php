<?php
include '../model/db.php';
session_start();

session_unset();

header("Location: ../views/login_merchant.php");
?>