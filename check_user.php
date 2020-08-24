<?php
require('database.php');
$username = $_POST['username'];
$query = "SELECT * FROM user WHERE username='$username' ";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "username: " . $row['username']. "<br>";
        
    }
} else {
    echo "0 results";
}
$conn->close();
?>