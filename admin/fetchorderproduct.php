<?php
 require('db.php');
 session_start();
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $query = "SELECT * FROM orderproduct";
    $result = mysqli_query($conn, $query);
    $response = '';
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $response .= $row["ordernumber"]. "^" .$row["orderproduct"]. "^" . $row["sumtotal"]. "^" .$row["slip_img"]. "^" .$row["date"]. "^" .$row["statusreceipt"]. "^" .$row["getbill"]. "^" .$row["addresscus"]. "^" .$row["workstatus"]. "^" .$row["process"]. "^" .$row["emstracking"]. "^" .$row["ems"]. "^" .$row["extra"]. "^" .$row["note"]. "^0000000000";
        }
        echo "success_" .$response;
    } else {
        echo "0 results";
    }

    mysqli_close($conn);

?>