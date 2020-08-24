<?php
    require('db.php');

        if(isset($_POST['submit'])){
            $sumfile = '';
            $name = $_POST['name_gallery'];
            $totalFile = count($_FILES['imgfile']['name']);

            // $_FILES['imgfile']['name'][$i];
            // move_uploaded_file($_FILES['imgfile']['tmp_name'][$i] , 'image/'.$filename);
            for ($i = 0 ; $i < $totalFile ; $i++){
                $sumfile .= $_FILES['imgfile']['name'][$i].',';
                move_uploaded_file($_FILES['imgfile']['tmp_name'][$i] , 'image/'.$sumfile);
                // $sumfile .= $sumfile,$_FILES['imgfile']['name'][$i];
            }
            $query = "INSERT INTO gallery (gallery_name , img_name) 
                            VALUES ('$name' , '$sumfile')";

                if($conn->query($query) === TRUE){
                    echo "success";
                }else{
                    echo "error";
                }

        }
?>



