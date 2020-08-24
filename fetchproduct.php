<?php
    require('database.php');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM productdetail";
    $result = mysqli_query($conn, $query);
    $response = '';
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $response .= $row["product_name"]. "^" .$row["product_type"]. "^" . $row["product_price"]. "^" . $row["product_detail"]. "^" . $row["product_img"]. "^" . $row["product_id"]. "^" . $row["product_amount"]. "^0000000000";
        }
        echo "success_" .$response;
    } else {
        echo "0 results";
    }
    
    mysqli_close($conn);
?>