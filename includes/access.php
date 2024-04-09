<?php

  function access($rank, $redirect = true) {
    if (isset($_SESSION['ACCESS']) && !$_SESSION['ACCESS'][$rank]) {
      if ($redirect) {
        header("Location: /toegang-geweigerd/");
        die;
      }
      return false;
    }
    return true;
  }

  $_SESSION['ACCESS']['ADMIN'] = isset($_SESSION['employeeRole']) && trim($_SESSION['employeeRole']) == "admin";
  $_SESSION['ACCESS']['USER'] = isset($_SESSION['employeeRole']) && (trim($_SESSION['employeeRole']) == "user" || trim($_SESSION['employeeRole']) == 'admin');

?>