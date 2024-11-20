<?php

    $provincie = $_POST['provincie'];

    include('../conn/db.inc.php');

    if (isset($_POST['provincie'])) {
        $sql = "SELECT * FROM gemeentes WHERE provincie LIKE '%$provincie%'";
        if ($result = mysqli_query($conn, $sql)) {
                echo '<option value="">---Selecteer gemeente---</option>';
            while ($row = mysqli_fetch_array($result)) {
                echo '<option value="'.$row['gemeente'].'" data-gemeente="'.$row['gemeente'].'">'.$row['gemeente'].'</option>';
            }
        }
    }

?>