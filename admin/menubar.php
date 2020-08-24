<?php
// session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"> <!--bulma-->
        <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">  <!--googleFont-->

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!--bulma-->
        <link rel="stylesheet" type="text/css" href="    https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"> <!--bulma-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> <!--google calendar-->
    </head>
    <body style="margin:0">
        <div style="width:100%;height:1100px;background:black;">
            <div style="width:100%">
                <div style="width:75%;padding:15px;">
                    <img src="img/XANAPLOGO.png" alt="">
                </div>
                <div style="width:100%;height:500px;background:black;display:flex;flex-direction:column;align-items:center">
                <img src="../img/XANAPLOGO.png" style="padding: 5 20px;" alt="">
                    <a href="addDetailproduct.php" style="width:70%;height:40px;font-size:18px;color:white;font-family:'Orbitron'">
                    Productdetail
                    </a>
                    <a href="addServicedetail.php" style="width:70%;height:40px;font-size:18px;color:white;font-family:'Orbitron'">
                    Service detail
                    </a>
                    <a href="addGallery.php" style="width:70%;height:40px;font-size:18px;color:white;font-family:'Orbitron'">
                    Gallery
                    </a>
                    <a href="workingstatus.php" style="width:70%;height:40px;;font-size:18px;color:white;font-family:'Orbitron'">
                    Working status 
                    </a>
                    <!-- <a href="workingstatus.php" style="width:70%;height:40px;;font-size:18px;color:white;font-family:'Orbitron'">
                    EMS tracking 
                    </a> -->
                    <a href="orderproduct.php" style="width:70%;height:40px;font-size:18px;color:white;font-family:'Orbitron'">
                    Order 
                    </a>
                    <a href="user.php" style="width:70%;height:40px;font-size:18px;color:white;font-family:'Orbitron'">
                    User list 
                    </a>
                    <?php
                        if($_SESSION['username']){
                            ?>
                            <a href="../logout.php" style="font-family:'Orbitron',sans-serif;font-size: 18px;color:white">Logout</a>
                            <?php
                        }else{
                            ?>
                           
                            <?php                        }
                      ?>
                </div>
            </div>
        </div>
    </body>
</html>