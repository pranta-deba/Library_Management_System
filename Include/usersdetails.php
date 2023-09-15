<?php 
require "Include/databaseConn.php";
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $qx = "SELECT * FROM users WHERE id='" . $userid . "' limit 1";
    $rx = $conn->query($qx);
    if (!$rx->num_rows) {
      header("Location: index.php");
    }
    $rowx = $rx->fetch_assoc();
  }