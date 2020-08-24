 <?php
            require('database.php');
            // var_dump($_REQUEST);
            // echo isset($_POST['username']);

            if (isset($_POST['username']) ) {
                // echo 'testy';
                $username = $_POST['username'];
                $username = stripslashes($_REQUEST['username']);
                $username = mysqli_real_escape_string($conn,$username);
                $email = ($_REQUEST['email']);
                $email = mysqli_real_escape_string($conn,$email);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($conn,$password);

                // $firstname = $_POST['firstname'];
                // $lastname = $_POST['lastname'];
                // $tel = $_POST['tel'];
                // $address = $_POST['address'];
                
                // echo "come";
                $sql = "SELECT * from user where username = '$username'";
                $result = mysqli_query($conn, $sql);
                $response = '';
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    echo 'มีผู้ใช้นี้แล้ว';
                } else {
                    $query = "INSERT INTO user (username, password ,email ,status)
                            VALUES ('$username', '".md5($password)."', '$email' , 'b')";
                
                    //$result = $conn->query($query);
                    if ($conn->query($query) === TRUE) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                    echo $result;
                }
                

                // $strusername = $_POST["username"];
                // echo "alert('Sucess : $strusername ');";

            //     if ($result) {
            //         echo "<div class='form'>
            //                 <span style='font-size:100%;font-family:kanit;'>Register successfull</span>
            //                 <br> <a href='loginform.php'>Click here to Login</a>
            //                 </div>";
            //     } else {
            //         echo "Error: " . $query . "<br>" . $conn->error;
            // }
        }
        ?>
