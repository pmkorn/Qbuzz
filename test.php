<?php

  // Verschil in dagen
  // $date1 = date_create(date("Y-m-d"));
  // $date2 = date_create("2023-11-17");

  // $intval = date_diff($date1, $date2);


  // echo $intval->format("Verschil is: %a");
  // $dateString = date('Ymd'); //Generate a datestring.
  // $branchNumber = 101; //Get the branch number somehow.
  // $receiptNumber = 1;  //You will query the last receipt in your database 
  // //and get the last $receiptNumber for that branch and add 1 to it.;
  
  // if($receiptNumber < 9999) {
  
  //   $receiptNumber = $receiptNumber + 1;
  
  // }else{
  //  $receiptNumber = 1;
  // }
  // echo $dateString . '-' . $branchNumber . '-' . $receiptNumber;

    $gebruikersnaam = "FrederikeBosma";
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $length = 8;
    $wachtwoord = substr(str_shuffle($chars),0,$length);
    
    echo "Gebruikersnaam: <strong>" . $gebruikersnaam . "</strong>.<br><br>";
    echo "Wachtwoord: <strong>FBosma-" . $wachtwoord .  "</strong>.<br><br>";
    echo "md5 = " . md5($wachtwoord) . "<br>";
    echo uniqid('user_', true) . "<br>";
    echo random_int(100000, 999999) . "<br>";
    try {
      $bytes = random_bytes(10);
      echo bin2hex($bytes);
  } catch (Exception $e) {
      echo 'Error: ' . $e->getMessage();
  }


?>