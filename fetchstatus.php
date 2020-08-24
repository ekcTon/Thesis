<?php
 require('database.php');
 session_start();
        $tracking = $_POST['tracknum'];
    // echo $tracking;
        if(isset($tracking)){
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

                $query = "SELECT * FROM orderproduct WHERE ordernumber = $tracking ";
                $result = mysqli_query($conn, $query);
                $response = '';
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $response .= $row["statusreceipt"]. "^" .$row["ordernumber"]. "^" . $row["workstatus"]. "^" . $row["emstracking"]. "^" . $row["note"]. "^0000000000";
                    }
                    echo "success_" .$response;
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
        }

?>