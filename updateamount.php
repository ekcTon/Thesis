<?php
 require('database.php');

            $updateamount = $_POST['updateamount'];
            $updatename = $_POST['updatename'];

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // $query = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
            $query = "UPDATE productdetail SET product_amount = product_amount - '$updateamount' 
                            WHERE product_name = '$updatename' AND product_amount > 0;";

            if ($conn->query($query) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();
?>