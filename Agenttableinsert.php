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
    $agent_id = $_POST["agent_id"];
    $agent_name = $_POST["agent_name"];
    $state_name = $_POST["state_name"];
    $email = $_POST["email"];

    $sql = "INSERT INTO Rail_Agent (Agent_id, Agent_name, State_name, email) VALUES ('$agent_id', '$agent_name', '$state_name', '$email')";

    if ($con->query($sql) === true) {
        echo "RECORDS INSERTED SUCCESSFULLY";
    } else {
        echo "INSERT ERROR: " . $con->error;
    }
}

$con->close();
?>

<html>
<head>
    <title>Agent Form</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="agent_id">Agent ID:</label>
        <input type="text" name="agent_id" required>
        <br>
        <label for="agent_name">Agent Name:</label>
        <input type="text" name="agent_name" required>
        <br>
        <label for="state_name">State Name:</label>
        <input type="text" name="state_name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
