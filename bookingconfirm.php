<?php
// include the database credentials file
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "railwayreservation";
// connect to the database
$con = new mysqli($servername, $username, $password, $dbname);

// check the database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// retrieve the form data
$date = mysqli_real_escape_string($conn, $_POST['travel-date']);
$departure = mysqli_real_escape_string($conn, $_POST['departure-city']);
$arrival = mysqli_real_escape_string($conn, $_POST['arrival-city']);
$class = mysqli_real_escape_string($conn, $_POST['class-type']);

// insert the data into the database using a prepared statement
$stmt = mysqli_prepare($conn, "INSERT INTO customer_rail(Cust_id, Date_of_travel, Depature_city, Arrival_city,Class_type) VALUES (?,?,?,?,?)");
$sql=mysqli_stmt_bind_param($stmt, 'ssss', '16789301',$date, $departure, $arrival, $class);
mysqli_stmt_execute($stmt);

if (mysqli_affected_rows($conn) > 0) {
    echo "Booking confirmed!";
} else {
    echo "Error: " . mysqli_error($conn);
}

// close the database connection
mysqli_close($conn);
?>
