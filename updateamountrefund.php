<?php
 require('database.php');

            $amountrefund = $_POST['amountrefund'];
            $namerefund = $_POST['namerefund'];
            // $idrefund = $_POST['']
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            echo $amountrefund;
            echo $namerefund;
            $query = "UPDATE productdetail SET product_amount = product_amount + '$amountrefund' 
                            WHERE product_name = '$namerefund' AND product_amount >= 0;";

            if ($conn->query($query) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();
?>