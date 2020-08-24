<?php
require('database.php');
session_start();
// echo $orderid;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "DELETE FROM receipt WHERE userid = '{$_SESSION['userid']}' ";

if ($conn->query($query) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>