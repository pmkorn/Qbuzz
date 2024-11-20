<?php

    $gemeente = $_POST['gemeente'];

    include('../conn/db.inc.php');

    if (isset($_POST['gemeente'])) {
        $sql = "SELECT * FROM plaatsen WHERE gemeente LIKE '%$gemeente%'";
        if ($result = mysqli_query($conn, $sql)) {
            while ($row = mysqli_fetch_array($result)) {
                echo '<option value="'.$row['plaats'].'">';
            }
        }
    }

?>