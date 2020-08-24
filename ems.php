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
         .container{
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
        }
        .wrapper{
            max-width:750px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
            }
    </style>
    <script>
          $(document).ready(function() {
            // EMS()
            });

            function EMS(){
                var track = $('#track')[0].value
                var id = $('#id')[0].value
                console.log(track)
                console.log(id)
                $.ajax({
                url:'updateEMS.php',
                type:'post',
                data:{track:track,id:id},
                success: function(response){
                  console.log(response)
                }
            })
            }
    </script>
    <body style="margin:0;background:#0c0d10;">
    <?php include('./navbar.php') ?>
        <div class="container">
            <div style="display:flex;flex-direction:row;justify-content:center;align-items:center;width:100%;height:50px;font-family:'Orbitron',sans-serif;font-weight:bold;font-size:30px;color:white;padding-top:30px;margin-bottom:20px">
                EMS Tracking
            </div>
            <div class="wrapper" style="display:flex;flex-direction:column;width:50%;padding:15px">
                <p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:25px">Tracking Number</p>
                <div style="display:flex;flex-direction:column;width:100%;height:auto;color:white;margin-bottom:15px">
                    <li>สำหรับผู้ที่ส่งฟิล์มเข้ารับบริารกับทางร้าน</li>
                    <li>หลังชำระค่าบริการเสร็จสิ้นให้ส่งกลักฟิล์มแล้วให้นำเลขพัสดุส่งให้ทางร้าน</li>
                </div>
                <p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:15px">Tracking Number</p>
                <input style="width:50%;height:30px;font-size:15px;font-family:'Kanit',sans-serif;margin-bottom:10px;margin-bottom:15px" type="text" id="track" placeholder="Tracking Number" required>
                <p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:15px">Order number</p>
                <input style="width:50%;height:30px;font-size:15px;font-family:'Kanit',sans-serif;margin-bottom:10px;margin-bottom:15px" type="text" id="id" placeholder="Order number" required>
                <button onclick="EMS()" type="submit" style="width:25%;height:25px;font-family:'Kanit',sans-serif;">Submit</button>
            </div>
        </div> 
        <div class="container">
            <?php include('./footer.php') ?>
        </div>
    </body>
</html>