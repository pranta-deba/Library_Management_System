<?php 
if(session_status() === PHP_SESSION_NONE){
  session_start();
};
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && $_SESSION['role'] == "admin"){

  }else{
    // header("HTTP/1.1 401 Unauthorized");
    header("location: ../index.php");
  };
?>