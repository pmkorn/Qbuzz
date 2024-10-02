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

  $_SESSION['ACCESS']['ADMIN'] = isset($_SESSION['userRole']) && trim($_SESSION['userRole']) == "admin";
  $_SESSION['ACCESS']['EDITOR'] = isset($_SESSION['userRole']) && (trim($_SESSION['userRole']) == "editor" || trim($_SESSION['userRole']) == "admin");
  $_SESSION['ACCESS']['USER'] = isset($_SESSION['userRole']) && (trim($_SESSION['userRole']) == "user" || trim($_SESSION['userRole']) == "editor" || trim($_SESSION['userRole']) == "admin");

?> 