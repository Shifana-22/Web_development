<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "railwayreservation";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("CONNECTION FAILED: " . $con->connect_error);
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $agent_id = $_POST['agent_id'];
    $agent_name = $_POST['agent_name'];
    $state_name = $_POST['state_name'];
    $email = $_POST['email'];

    // Prepare the SQL update statement
    $sql = "UPDATE Rail_Agent SET Agent_name=?, State_name=?, email=? WHERE Agent_id=?";

    // Prepare the statement
    $stmt = $con->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssss", $agent_name, $state_name, $email, $agent_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "RECORD UPDATED SUCCESSFULLY";
    } else {
        echo "UPDATE ERROR: " . $stmt->error;
    }

    $stmt->close();
}

?>

<form method="post">
    <label for="agent_id">Agent ID:</label>
    <input type="text" name="agent_id" id="agent_id" required><br>

    <label for="agent_name">Agent Name:</label>
    <input type="text" name="agent_name" id="agent_name" required><br>

    <label for="state_name">State Name:</label>
    <input type="text" name="state_name" id="state_name" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br>

    <button type="submit">Update Record</button>
</form>

<?php
$con->close();
?>
