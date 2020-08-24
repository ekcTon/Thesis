<?php
            require('db.php');              

                $temp = explode(".", $_FILES["file"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
   
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($newfilename,PATHINFO_EXTENSION));
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["file"]["tmp_name"]);
                    if($check !== false) {
                        
                        $uploadOk = 1;
                    } else {
                        
                        $uploadOk = 0;
                    }
                }

                if ($uploadOk == 0) {

                } else {
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], "./image/" . $newfilename)) {
                        echo "./image/" . $newfilename ;
                    } else {
  
                    }
                }

        ?>