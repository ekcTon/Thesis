<?php
session_start();
 require('database.php');
        $fnamesend = $_POST['fnamesend'];
        $lnamesend = $_POST['lnamesend'];
        // $cnamesend = $_POST['cnamesend'];
        $addresssend = $_POST['addresssend'];
        $districtsend = $_POST['districtsend'];
        $postcodesend = $_POST['postcodesend'];
        $citysend = $_POST['citysend'];
        $telsend = $_POST['telsend'];
        $emailsend = $_POST['emailsend'];
    if(isset($fnamesend) && isset($lnamesend) && isset($addresssend)){

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            $query = "INSERT INTO addresssend (fnamesend , lnamesend , addresssend , districtsend , 
                                                postcodesend , citysend , telsend , emailsend , userid) 
                            VALUES ('$fnamesend' , '$lnamesend' , ' $addresssend' , 
                                        '$districtsend' , '$postcodesend' , '$citysend' , '$telsend' , 
                                            '$emailsend' , '{$_SESSION['userid']}')";
                            

            if($conn->query($query) === TRUE){
                echo "success2";
            }else{
                alert("กรุณากรอกข้อมูลให้ครบถ้วน");
            }

            //  $headfile = move_uploaded_file($_FILES['imgfile']['tmp_name'][$i] , 'image/'.$filename);
        // }
        
        $conn->close();
    }
?>