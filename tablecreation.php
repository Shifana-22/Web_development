<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "railwayreservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$table_name = $_POST['table_name'];
$column1_name = $_POST['column1_name'];
$column2_name = $_POST['column2_name'];
$column3_name = $_POST['column3_name'];
$column4_name = $_POST['column4_name'];

// Construct SQL query
$sql = "CREATE TABLE IF NOT EXISTS $table_name (
    $column1_name VARCHAR(8) NOT NULL PRIMARY KEY,
    $column2_name VARCHAR(25) NOT NULL,
    $column3_name VARCHAR(30) NOT NULL,
    $column4_name VARCHAR(40) NOT NULL
)";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "Table $table_name created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
}
?>
