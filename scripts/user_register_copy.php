<?php
  
  $employeeFirstName  = 'Patrick';
  $employeePrefix     = '';
  $EmployeeLastName   = 'Korn';
  $email              = 'patrick.korn@qbuzz.nl';
  $userName           = strtolower(substr($firstName, 0, 1).''.str_replace(" ","", $lastName));
  $userPassword       = 'PatrickK0rn1978';
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