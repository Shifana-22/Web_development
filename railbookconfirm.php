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


    $sql = "INSERT INTO `customer_rail`(`Date_of_travel`, `Depature_city`, `Arrival_city`,`Class_type`) 
            VALUES ('$travel_date', '$departure_city', '$arrival_city','$class_type')";
    
    if ($con->query($sql) === true) {
        echo "Booking details saved successfully!<br>";
        echo "Available trains:<br>";
        $train_query = "SELECT * FROM `train` WHERE `start_station`='$departure_city' AND `end_station`='$arrival_city'";
        $train_result = $con->query($train_query);
        if ($train_result->num_rows > 0) {
            echo "<form method='post' action='book_train.php'>";
            while ($row = $train_result->fetch_assoc()) {
                echo "<input type='radio' name='train_name' value='" . $row["train_name"] . "'>" . $row["train_name"] . "<br>";
            }
            echo "<input type='hidden' name='travel_date' value='$travel_date'>";
            echo "<input type='hidden' name='departure_city' value='$departure_city'>";
            echo "<input type='hidden' name='arrival_city' value='$arrival_city'>";
            echo "<input type='hidden' name='class_type' value='$class_type'>";
            echo "<input type='submit' value='Book'>";
            echo "</form>";
        } else {
            echo "No trains available for the given route.";
        }
    } else {
       echo "Booking failed: " . $con->error;
    }
}

$con->close();
?>
