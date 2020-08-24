<?php
session_start();
 require('database.php');
            $sliptransfer = $_POST['sliptrans'];
            $ordernumber = $_POST['ordernumber'];
            $orderproduct = $_POST['orderproduct'];
            $sumtotal = $_POST['sum'];
            $receiptstatus = $_POST['receiptstatus'];
            $address = $_POST['address'];
            $date = date('Y-m-d H:i:s');
            $ems = $_POST['ems'];
            $extra = $_POST['extra'];
            echo $sliptransfer;
            echo $ordernumber;
            echo $orderproduct;
            echo $sumtotal;
            echo $sliptransfer;

    if(isset($sliptransfer) && isset($ordernumber)){

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            $query = "INSERT INTO orderproduct (order_id , slip_img , ordernumber , orderproduct , sumtotal , date , statusreceipt , getbill , workstatus , process , addresscus , emstracking , note , ems , extra) 
                            VALUES (null , '$sliptransfer' , '$ordernumber' , '$orderproduct' , '$sumtotal' , '$date' , '$receiptstatus' , 'Decline' , 'null' , 'null' ,'$address' , 'null' , 'null' , '$ems' , '$extra')";
                            

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