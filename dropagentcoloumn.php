<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "railwayreservation";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("CONNECTION FAILED: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Get the column name to be dropped from the form data
$columnName = $_POST['column_name'];

// Construct the ALTER TABLE statement
$sql = "ALTER TABLE Rail_Agent DROP COLUMN $columnName";

// Execute the ALTER TABLE statement
if (mysqli_query($con, $sql)) {
    echo "Column dropped successfully";
} else {
    echo "Error dropping column: " . mysqli_error($con);
}
}
// Close the database connection
mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Column Form</title>
</head>
<body>
    <h1>Delete Column Form</h1>
    <form  method="post">
        <table>
        <tr>
        <td><label for="column_name">Column Name:</label></td>
        <td><input type="text" name="column_name" id="column_name"></td>
</tr>
        </table>
        <input type="submit" value="Add Column">
    </form>
</body>
</html>