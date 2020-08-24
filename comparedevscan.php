<?php
    require('database.php');
    $formatcompare = $_POST['format'];
    $ratiocompare = $_POST['ratio'];
    $typecompare = $_POST['type'];
    echo $formatcompare;
    echo $ratiocompare;
    echo $typecompare;
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM servicedetail WHERE formatfilm = '$formatcompare' AND ratio = '$ratiocompare' AND typeservice = '$typecompare' ";
    $result = mysqli_query($conn, $query);
    $response = '';
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $response .= $row["formatfilm"]. "^" .$row["ratio"]. "^" . $row["price"]. "^" . $row["typeservice"]. "^0000000000";
        }
        echo "success_" .$response;
    } else {
        echo "0 results";
    }
    
    mysqli_close($conn);
?>