<?php
session_start();
 require('database.php');
        $ordername = $_POST['ordername'];
        // $total = $_POST['total'];
        $sumtotal = $_POST['sumtotal'];
        $fnamebill = $_POST['fnamebill'];
        $lnamebill = $_POST['lnamebill'];
        $addressbill = $_POST['addressbill'];
        $districtbill = $_POST['districtbill'];
        $postcodebill = $_POST['postcodebill'];
        $citybill = $_POST['citybill'];
        $telbill = $_POST['telbill'];
        $emailbill = $_POST['emailbill'];
        $date = date('Y-m-d H:i:s');
        $ems = $_POST['ems'];
        $extra = $_POST['extra'];

        $_SESSION['sumtotal'] = $sumtotal;
    if(isset($fnamebill) && isset($lnamebill) && isset($addressbill)){
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            $query = "INSERT INTO receipt (order_buy , sumtotal , first_name , last_name , address , 
                                                district , postcode , city , tel ,email ,status_payment , userid , date , status_receipt , ems , extra) 
                            VALUES ('$ordername' , '$sumtotal' , ' $fnamebill' , '$lnamebill' , '$addressbill' , '$districtbill' , 
                                        '$postcodebill' , '$citybill' , '$telbill' , '$emailbill' , 'unpaid' , '{$_SESSION['userid']}' , '$date' , 'unpaid' , '$ems' , '$extra')";
                            

            if($conn->query($query) === TRUE){
                echo "success";
            }else{
                alert("กรุณากรอกข้อมูลให้ครบถ้วน");
            }

            //  $headfile = move_uploaded_file($_FILES['imgfile']['tmp_name'][$i] , 'image/'.$filename);
        // }
        
        $conn->close();
    }
?>