<?php
 require('db.php');
    $spay = $_POST['spay'];
    $swork = $_POST['swork'];
    $ordernumber = $_POST['ordernumber'];

    echo $spay;
    echo $swork;
    echo $ordernumber;
    $query = "UPDATE orderproduct SET statusreceipt = '$spay' , getbill = '$swork'  WHERE ordernumber = '$ordernumber' ";

    if ($conn->query($query) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>