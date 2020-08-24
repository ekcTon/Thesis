<?php
 require('db.php');
    $nameupdate = $_POST['nameupdate'];
    $typeupdate = $_POST['typeupdate'];
    $priceupdate = $_POST['priceupdate'];
    $amountupdate = $_POST['amountupdate'];
    $detailupdate = $_POST['detailupdate'];
    $imageupdate = $_POST['imageupdate'];
    $productid = $_POST['productid'];
// echo $productid;
    $query = "UPDATE productdetail SET product_name = '$nameupdate' , product_type = '$typeupdate' , product_price = '$priceupdate' , product_detail = '$detailupdate' , product_img  = '$imageupdate' , product_amount  = product_amount + '$amountupdate' WHERE product_id = '$productid' AND product_amount >= 0;";
    // $query = "UPDATE productdetail SET product_name = '$nameupdate' , product_type = '$typeupdate' , product_price = '$priceupdate' , product_detail = '$detailupdate' , product_img  = '$imageupdate' , product_amount  = product_amount + '$amountupdate' WHERE product_id = '$productid' AND product_amount >= 0;";


    if ($conn->query($query) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>