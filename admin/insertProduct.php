<?php
            require('db.php');

                $name = $_POST['name'];
                $type = $_POST['type'];
                $price = $_POST['price'];
                $detail = $_POST['amount'];
                $amount = $_POST['detail'];
                $uploadimage = $_POST['uploadimage'];
               
                $query = "INSERT INTO productdetail (product_name, product_type, product_price ,product_detail, product_img, product_amount)
                            VALUES ('$name','$type', '$price' , '$detail', '$uploadimage' , '$amount')";
                
                $result = $conn->query($query);
                echo $result;
        ?>