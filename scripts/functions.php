<?php

    // Import the database connection
    require 'conn/db.inc.php';

    // Define the database connection parameters
    function dbConnect() {
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if ($mysqli->connect_error != 0) {
            return false;
        } else {
            return $mysqli;
        }
    }

    // Define function to retrieve data for vestiging
    function getDepotName() {
        $mysqli = dbConnect();

        $result = $mysqli->query("SELECT * FROM vestiging ORDER BY vestiging ASC");

        while ($row = $result->fetch_assoc()) {
            $depots[] = $row;
        }
        return $depots;
    }

?>