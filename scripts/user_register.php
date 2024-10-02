<?php
  
  $firstName          = $_POST['firstName'];
  $lastName           = $_POST['lastName'];
  $email              = $_POST['email'];
  $userName           = strtolower(substr($firstName, 0, 1).''.str_replace(" ","", $lastName));
  $userPassword       = $_POST['userPassword'];
  $hashedUserPassword = hash('sha256', $userPassword);
  $repeatUserPassword = $_POST['repeatUserPassword'];
  $secretCode         = rand(000000, 999999);
  $isActive           = '0';
  $userRole           = 'user';
  $userMembership     = 'standard';

  include('../conn/db.inc.php');
  
  $sql = "INSERT INTO members (firstName, lastName, email, userName, userPassword, signUpDate, secretCode, isActive, userRole, userMembership) VALUES ('$firstName', '$lastName', '$email', '$userName', '$hashedUserPassword', now(), '$secretCode', '$isActive', '$userRole', '$userMembership')";
  if (mysqli_query($conn, $sql)) {
    echo "success";
  } else {
    echo "error";
  }

?>