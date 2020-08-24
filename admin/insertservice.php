<?php
            require('db.php');

                $format = $_POST['format'];
                $ratio = $_POST['ratio'];
                $price = $_POST['price'];
                $service = $_POST['service'];

                $query = "INSERT INTO servicedetail (formatfilm , ratio , price  , typeservice)
                            VALUES ('$format','$ratio', '$price' , '$service')";
                
                $result = $conn->query($query);
                echo $result;
        ?>