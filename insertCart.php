<?php
session_start();
 require('database.php');
            $buyname = $_POST['buyname'];
            $buyprice = $_POST['buyprice'];
            $buyamount = $_POST['buyamount'];
    if(isset($buyname) && isset($buyprice)){

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            $query = "INSERT INTO cart (cart_id , name_buy , price_buy , amount_buy , userid , type_) 
                            VALUES (null , '$buyname' , '$buyprice' , '$buyamount' , '{$_SESSION['userid']}' , 'product')";

                            // $query = "INSERT INTO cart (cart_id , name_buy , price_buy , amount_buy , userid , status , service_type , product_type) 
                            // VALUES (null , '$buyname' , '$buyprice' , '$buyamount' , '{$_SESSION['userid']}' , '{$_SESSION['userid']}') , 'null' , 'product' ";
                            
                            

            if($conn->query($query) === TRUE){
                echo "success";
            }else{
                echo "error";
            }

            //  $headfile = move_uploaded_file($_FILES['imgfile']['tmp_name'][$i] , 'image/'.$filename);
        // }
        
        $conn->close();
    }
?>