<?php
 require('database.php');

            $track = $_POST['track'];
            $id = $_POST['id'];
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $query = "UPDATE orderproduct SET emstracking = '$track' 
                            WHERE ordernumber = '$id'";

            if ($conn->query($query) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();
?>