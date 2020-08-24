<?php session_start() ?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"> <!--bulma-->
        <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">  <!--googleFont-->

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!--bulma-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"> <!--bulma-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> <!--google calendar-->
    </head>
    <style>
            .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 200px;
            margin: auto;
            margin-top:30px;
            text-align: center;
            font-family: arial;
            }

            .price {
            color: white;
            font-size: 22px;
            }

            .card button {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            transition: 1s;
            }

            .card button:hover {
            opacity: 0.7;
            }
            .container {
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
            }

    </style>
     <!-- <script>
          $(document).ready(function() {
            fetchproduct()
            
        });
        function fetchproduct(){
            var htmlQuery = '';
            $.ajax({
            url: 'fetchservice.php',
            type: 'post',
            data: {},
            success: function(response){
               console.log(response)
            }
        })
        }
        function cartproduct(id){
            console.log(id)
            window.location.href = './viewproduct.php?id='+id
        }
    </script> -->
    <body style="margin:0;background-color:#0c0d10">
    <?php include('./navbar.php') ?>
        <div class="container">
            <div style="display:flex;flex-direction:row">
                <div class="card">
                    <img src="./img/devscan.jpg" style="width:250px;height:250px;background-color:#0c0d10;padding-bottom:20;object-fit:contain">
                    <h1 id="buyname" style="color:white;background-color:#0c0d10;font-family:Oxanium">Dev&Scan</h1>
                    <h1 name="name" style="color:white;background-color:#0c0d10;font-family:Oxanium"></h1>
                    <p id="buyprice" style="background-color:#0c0d10;font-family:Oxanium;color:white"></p>
                    <p style="color:white;background-color:#0c0d10;font-family:Oxanium"></p>
                    <p style="color:white;background-color:#0c0d10"></p>
                    <p><button onclick="window.location.href='devscan.php'" style="color:white;font-family:Oxanium;background-color:#0c0d10">View</button></p>
                </div>
                <div class="card">
                    <img src="./img/scan.jpg" style="width:250px;height:250px;background-color:#0c0d10;padding-bottom:20;object-fit:contain">
                    <h1 id="buyname" style="color:white;background-color:#0c0d10;font-family:Oxanium">Scan</h1>
                    <h1 name="name" style="color:white;background-color:#0c0d10;font-family:Oxanium"></h1>
                    <p id="buyprice" style="background-color:#0c0d10;font-family:Oxanium;color:white"></p>
                    <p style="color:white;background-color:#0c0d10;font-family:Oxanium"></p>
                    <p style="color:white;background-color:#0c0d10"></p>
                    <p><button onclick="window.location.href='scan.php'" style="color:white;font-family:Oxanium;background-color:#0c0d10">View</button></p>
                </div>
            </div>
            <?php include('./footer.php') ?>
        </div>
    </body>
</html>