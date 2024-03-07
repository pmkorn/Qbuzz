<?php

  $date1 = date_create(date("Y-m-d"));
  $date2 = date_create("2023-11-17");

  $intval = date_diff($date1, $date2);


  echo $intval->format("Verschil is: %a");

?>