<!DOCTYPE html>
<html>
<head>
    <title>Add Column Form</title>
</head>
<body>
    <h1>Add Column Form</h1>
    <form action="add_column.php" method="post">
        <table>
        <tr>
        <td><label for="column_name">New Column Name:</label></td>
        <td><input type="text" name="column_name" id="column_name"></td>
</tr>
<tr>
        <td><label for="column_type">New Column Type:</label></td>
        <td><input type="text" name="column_type" id="column_type"></td>
</tr>
        </table>
        <input type="submit" value="Add Column">
    </form>
</body>
</html>


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

// Get the new column name and data type from the form data
$newColumnName = $_POST['column_name'];
$newColumnType = $_POST['column_type'];

// Construct the ALTER TABLE statement
$sql = "ALTER TABLE Rail_Agent ADD COLUMN $newColumnName $newColumnType";

// Execute the ALTER TABLE statement
if (mysqli_query($con, $sql)) {
    echo "New column added successfully";
} else {
    echo "Error adding new column: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
