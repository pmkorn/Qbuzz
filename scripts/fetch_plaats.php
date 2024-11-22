<?php

    $gemeente = $_POST['gemeente'];

    include('../conn/db.inc.php');

    if (isset($_POST['gemeente'])) {
        $sql = "SELECT * FROM plaatsen WHERE gemeente LIKE '%$gemeente%'";
        if ($result = mysqli_query($conn, $sql)) {
            echo '<option value="'.$row['plaats'].'">--Selecteer Plaats---</option>';
            while ($row = mysqli_fetch_array($result)) {
                echo '<option value="'.$row['plaats'].'">'.$row['plaats'].'</option>';
            }
        }
    }

?>