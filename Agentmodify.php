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
    $state_name = $_POST['state_name'];

    // Prepare the SQL update statement
    $sql = "UPDATE Rail_Agent SET state_name=? WHERE agent_id=?";

    // Prepare the statement
    $stmt = $con->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ss", $state_name, $agent_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "RECORD STATE MODIFIED SUCCESSFULLY";
    } else {
        echo "UPDATE ERROR: " . $stmt->error;
    }

    $stmt->close();
}

?>

<form method="post">
    <table>
    <tr>
    <td><label for="agent_id">Agent ID:</label></td>
    <td><input type="text" name="agent_id" id="agent_id" required></td>
    </tr>
    <tr>
    <td><label for="state_name">State Name:</label></td>
    <td><input type="text" name="state_name" id="state_name" required></td>
    </tr>
    </table>
    <button type="submit">Update Record</button>
</form>

<?php
$con->close();
?>
