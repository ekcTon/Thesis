<?php
 require('database.php');
            $id = $_POST['id'];
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $query = "UPDATE receipt SET status_receipt = 'paid' 
                            WHERE receipt_id = '$id'";

            if ($conn->query($query) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();
?>