<?php

  session_start();
  
  include('../conn/db.inc.php');
  
  $userName = mysqli_real_escape_string($conn, $_POST['userName']);
  $userPassword = mysqli_real_escape_string($conn, $_POST['userPassword']);
  $userPassword = stripslashes($userPassword);
  $hashedUserPassword = hash('sha256', $userPassword);

  $sqlMemberLogin = "SELECT * FROM members WHERE userName = '$userName' AND userPassword = '$hashedUserPassword' AND isActive = 1 LIMIT 1";

  if ($sqlMemberLoginResult = mysqli_query($conn, $sqlMemberLogin)) {
    if (mysqli_num_rows($sqlMemberLoginResult) > 0 ) {
      while ($row = mysqli_fetch_array($sqlMemberLoginResult)) {
        $memberID = $row['memberID'];
        $_SESSION['memberID'] = $memberID;

        $userRole = $row['userRole'];
        $_SESSION['userRole'] = $userRole;

        $memberName = $row['firstName']." ".$row['lastName'];
        $_SESSION['memberName'] = $memberName;

        $memberLoginUpdate = "UPDATE members SET lastLogin = now(), onlineStatus = '1' WHERE memberID = '$memberID'";
        $memberResultUpdate = mysqli_query($conn, $memberLoginUpdate);
        mysqli_close($conn);
      }
      echo "success";
    } else {
      echo "fail";
    }
    
  } else {
    
  }
  
?>