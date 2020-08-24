<?php
 require('database.php');
 session_start();
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $query = "SELECT * FROM cart WHERE userid='{$_SESSION['userid']}' ";
    $result = mysqli_query($conn, $query);
    $response = '';
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $response .= $row["name_buy"]. "^" .$row["price_buy"]. "^" . $row["amount_buy"]. "^" .$row["cart_id"]. "^" .$row["ems"]. "^" .$row["extra"]."^0000000000";
        }
        echo "success_" .$response;
    } else {
        echo "0 results";
    }

    mysqli_close($conn);

?>