<?php
session_start();
 require('database.php');
            $service = $_POST['service'];
            $buyamount = $_POST['buyamount'];
            $price = $_POST['price'];
            // echo $service;
            // echo $buyamount;
            // echo $price;
    if(isset($service) && isset($buyamount)){

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            $query = "INSERT INTO cart (cart_id , name_buy , price_buy , amount_buy , userid , status , type_) 
                            VALUES (null , '$service' , '$price' , '$buyamount' , '{$_SESSION['userid']}' , '{$_SESSION['userid']}' , 'service')";
                            

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