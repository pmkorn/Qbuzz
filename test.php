<?php

  // Verschil in dagen
  // $date1 = date_create(date("Y-m-d"));
  // $date2 = date_create("2023-11-17");

  // $intval = date_diff($date1, $date2);


  // echo $intval->format("Verschil is: %a");
  $dateString = date('Ymd'); //Generate a datestring.
  $branchNumber = 101; //Get the branch number somehow.
  $receiptNumber = 1;  //You will query the last receipt in your database 
  //and get the last $receiptNumber for that branch and add 1 to it.;
  
  if($receiptNumber < 9999) {
  
    $receiptNumber = $receiptNumber + 1;
  
  }else{
   $receiptNumber = 1;
  }
  echo $dateString . '-' . $branchNumber . '-' . $receiptNumber;

?>