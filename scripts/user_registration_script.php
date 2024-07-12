<?php

  $employeeFirstName = $_POST['employeeFirstName'];
  $employeeLastName = $_POST['employeeLastName'];
  $employeeEmail = $_POST['employeeEmail'];
  $employeeUserName = strtolower(substr($employeeFirstName, 0, 1).''.str_replace(" ","", $employeeLastName));
  $employeeUserPassword = $_POST['employeeUserPassword'];
  $hashedEmployeeUserPassword = hash('sha256', $employeeUserPassword);
  $employeeSignupDate = date("Y-m-d H:i:s");
  $employeeSecretCode = rand(0000, 9999);
  $employeeIsActive = '0';
  $employeeRole = 'user';
  $employeeOnlineStatus = '0';

  include('../includes/db.inc.php');

  $sqlInsertUser = "INSERT INTO employees (employeeFirstName, employeeLastName, employeeEmail, employeeUserName, employeeUserPassword, employeeSignupDate, employeeSecretCode, employeeIsActive, employeeRole, employeeOnlineStatus)
                    VALUES ('".$employeeFirstName."', '".$employeeLastName."', '".$employeeEmail."', '".$employeeUserName."', '".$hashedEmployeeUserPassword."', now(), '".$employeeSecretCode."', '".$employeeIsActive."', '".$employeeRole."', '".$employeeOnlineStatus."')";

  if (mysqli_query($conn, $sqlInsertUser)) {
    $employeeID = mysqli_insert_id($conn);
    mkdir('../users/'.$employeeID, 0755);

    //Send mail to user for account activation
    /*$to = $email;
    $subject = "Email activatie!";
    $message = "Welkom op patrickkorn.nl";
    $headers = "From: noreply@patrickkorn.nl";
    mail($to, $subject, $message, $headers);

    header("Location: ../register.php?register=success");*/
    //echo "ok";
  } else {
    /*header("Location: ../register.php?register=fail");*/
    //echo "not ok";
  }
  mysqli_close($conn);

?>