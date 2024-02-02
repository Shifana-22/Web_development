<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "railwayreservation";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("CONNECTION FAILED: " . $con->connect_error);
}

// Check if form submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $agent_id = $_POST["agent_id"];
    $password = $_POST["password"];

    // Fetch agent details from rail_agent table
    $sql = "SELECT * FROM `rail_agent` WHERE `Agent_id` = '$agent_id' AND `Password` = '$password'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Agent ID and password matched, redirect to train search form
        echo "LOGIN SUCCESSFUL";
        header("Location: booking.html");
        exit();
    } else {
        // Agent ID and/or password did not match
        $message = "Invalid agent ID or password. Please try again.";
    }
}

$con->close();
?>
