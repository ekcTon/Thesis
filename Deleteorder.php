<?php
require('database.php');

$orderid = $_POST['orderid'];
// echo $orderid;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "DELETE FROM cart WHERE cart_id = '$orderid'";

if ($conn->query($query) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>