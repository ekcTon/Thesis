<?php
session_start();
 require('db.php');
            $order = $_POST['Torder'];
            $work = $_POST['Twork'];
            $process = $_POST['Tprocess'];
            $emstrack = $_POST['Ttrack'];
            $note = $_POST['Tnote'];
            echo $order;
            echo $work;
            echo $process;
    if(isset($order)){

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            $query = "UPDATE orderproduct SET workstatus = '$work' , process = '$process' , emstracking = '$emstrack' , note = '$note' WHERE ordernumber = '$order'";
                            

            if($conn->query($query) === TRUE){
                echo "success";
            }else{
                echo "error";
            }
        
        $conn->close();
    }
?>