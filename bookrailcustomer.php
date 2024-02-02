<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "railwayreservation";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("CONNECTION FAILED: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $travel_date = $_POST["travel-date"];
    $departure_city = $_POST["departure-city"];
    $arrival_city = $_POST["arrival-city"];
    $class_type = $_POST["class-type"];

    $sql = "INSERT INTO `customer_rail`(`Date_of_travel`, `Depature_city`, `Arrival_city`, `Class_type`) 
            VALUES ('$travel_date', '$departure_city', '$arrival_city', '$class_type')";
    
    if ($con->query($sql) === true) {
        $message = "Booking successful!";
    } else {
        $message = "Booking failed: " . $con->error;
    }
}

$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Page</title>
    <style>
        /* styles omitted for brevity */
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($message)) : ?>
            <h1><?php echo $message; ?></h1>
        <?php else: ?>
            <h1>Book your Train Journey</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <!-- form fields omitted for brevity -->
                <input type="submit" value="Book Now">
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
