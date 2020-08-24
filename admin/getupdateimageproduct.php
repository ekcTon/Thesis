<?php
            require('db.php');              
                // $target_dir = "image/";
                // $target_file = $target_dir .basename($_FILES["file"]["name"]);
                $temp = explode(".", $_FILES["file"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                // move_uploaded_file($_FILES["file"]["tmp_name"], "./image/" . $newfilename);
                // echo print_r($_FILES['file']);
                // echo $target_file;

                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($newfilename,PATHINFO_EXTENSION));
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["file"]["tmp_name"]);
                    if($check !== false) {
                        // echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        // echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }

                if ($uploadOk == 0) {
                    // echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], "./image/" . $newfilename)) {
                        echo "./image/" . $newfilename ;
                    } else {
                        // echo "Sorry, there was an error uploading your file.";
                    }
                }

                                                                     
                
                // $result = $conn->query($query);
                // echo $result;
        ?>