<?php
require('db.php');

$productid = $_POST['productid'];
// echo $orderid;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "DELETE FROM productdetail WHERE product_id = '$productid'";

if ($conn->query($query) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>