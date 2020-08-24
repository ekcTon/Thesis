<?php
 require('database.php');

    $id = $_POST['id'];
    // print_r($id);
    $query = "SELECT * FROM productdetail WHERE product_id = '$id' ";

    $result = $conn->query($query);
    $response = '';
    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {

            $response .= $row["product_name"]. "^" .$row["product_type"]. "^" . $row["product_price"]. "^" . $row["product_detail"]. "^" . $row["product_img"]. "^" . $row["product_id"]. "^" . $row["product_amount"]. "^0000000000";
            echo $response;
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>