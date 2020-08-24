<html>
    <head>

    </head>
    <body>
      <?php
        require('database.php');
        session_start();

        if (isset($_POST['username'])) {
          $username = stripslashes($_REQUEST['username']);
          $username = mysqli_real_escape_string($conn, $username);
          $password = stripslashes($_REQUEST['password']);
          $password = mysqli_real_escape_string($conn, $password);

          $query = "SELECT * FROM user WHERE username='$username' AND password='".md5($password)."'";
          $result = mysqli_query($conn, $query);
          $rows = mysqli_num_rows($result);
          $row = mysqli_fetch_assoc($result);
          // echo print_r($row['userid']);
          if($rows==1) {
              $_SESSION['username'] = $username;
              $_SESSION['userid'] = $row["userid"];
              $_SESSION["userlevel"] = $row["status"];
              if($_SESSION["userlevel"]=="a"){ 
 
                header("Location: .\admin\addDetailproduct.php");
                

              }

              if ($_SESSION["userlevel"]=="b"){

                header("Location: .\index.php");
             

              }
              
          } else {
            echo 
            "<h3>Username and Password is incorrect</h3>
            <br>
            <a href='login.php'>Click here to Login</a>";
          } 
        
          } else {
            
        
      ?>
          <?php
          }
          ?>
    </body>
</html>