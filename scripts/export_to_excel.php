<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'your_database_name';

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data
$query = "SELECT * FROM your_table_name";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Set headers for Excel file download
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=data_export.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    // Output column names
    $columns = $result->fetch_fields();
    foreach ($columns as $column) {
        echo $column->name . "\t";
    }
    echo "\n";

    // Output rows
    while ($row = $result->fetch_assoc()) {
        echo implode("\t", array_values($row)) . "\n";
    }
} else {
    echo "No data found.";
}

$conn->close();
?>