<?php
require('db.php');

$imgproduct = $_POST['imgproduct'];
// echo $orderid;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "DELETE producy_img FROM productdetail WHERE product_id = '$id'";

if ($conn->query($query) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>