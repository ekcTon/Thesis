<?php
session_start();
    require('database.php');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM receipt WHERE userid = '{$_SESSION['userid']}'";
   
    $result = mysqli_query($conn, $query);
    $response = '';
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $response .= $row["date"]. "^" .$row["receipt_id"]. "^" 
            .$row["order_buy"]. "^" . $row["sumtotal"]. "^" . $row["first_name"]. "^" 
            . $row["last_name"]. "^" . $row["tel"]. "^" . $row["address"]. "^" 
            . $row["email"]. "^" . $row["status_payment"]. "^" . $row["district"]. "^" . $row["city"]. "^" . $row["postcode"]. "^0000000000";
        }
        echo "success_" .$response;
    } else {
        echo "0 results";
    }
    
    mysqli_close($conn);
?>
