<?php
/*
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "qbuzz";
*/

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'qbuzz');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$conn) {
    die("Verbinding met de database is mislukt: " . mysqli_connect_error());
} else {
    /*echo "Verbinding met de database is gelukt!";*/
}

?>