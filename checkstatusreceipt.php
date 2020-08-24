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
            .container {
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
            }
            .wrapper{
            max-width:740px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
            }
    </style>
    <script>
          $(document).ready(function() {
            
        });
        function inserttracking(){
            var htmlQuery = '';
            var tracking = '';
            tracking = $('#track')[0].value;
            console.log(tracking)
            $.ajax({
            url: 'fetchstatus.php',
            type: 'post',
            data: {tracknum:tracking},
            success: function(response){
                console.log(response)
                if(response.indexOf('success') >= 0 ){
                    var result = response.split('success_')[1].split('0000000000')
                    console.log(result)
                    var data = result[0].split('^')
                    console.log(data)

                    htmlQuery +='<div style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:25px;margin-bottom:5px">'+data[0]+'</div>'
                    htmlQuery +='<p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:24px">Tracking number : '+data[1]+'</p>'
                    htmlQuery +='<p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:24px">Status : '+data[2]+'</p>'
                    htmlQuery +='<p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:24px">EMS Tracking : '+data[3]+'</p>'
                    htmlQuery +='<p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:24px">หมายเหตุ : '+data[4]+'</p>'
                }
                    $('#content').empty()
                    $('#content').append(htmlQuery)
            }
        })
        }
    </script>
     <body style="margin:0;background-color:#0c0d10">
        <?php include('./navbar.php') ?>
        <div class="container">
            <div class="wrapper" style="display:flex;flex-direction:column;width:100%;height:auto;margin-top:30px">
            <div style="display:flex;flex-direction:row;justify-content:center;align-items:center;width:100%;height:50px;font-family:'Orbitron',sans-serif;font-weight:bold;font-size:30px;color:white;">
                CHECK STATUS
            </div>
            <div style="display:flex;flex-direction:row;width:100%">

                <div style="display:flex;flex-direction:column;width:50%;padding:15px">
                    <p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:25px">Tracking Number</p>
                    <div style="display:flex;flex-direction:column;width:100%;height:auto;color:white;margin-bottom:15px">
                        <li>Tracking number สำหรับตรวจสอบสถานะการทำงานของใบเสร็จนั้นๆ</li>
                        <li>Tracking number ได้จากใบเสร็จที่ทำการชำระแล้วเท่านั้น</li>
                    </div>
                    
                    <input style="width:50%;height:30px;font-size:15px;font-family:'Kanit',sans-serif;margin-bottom:10px;margin-bottom:15px" type="text" id="track" placeholder="Tracking Number" required>
                    <button onclick="inserttracking()" type="submit" style="width:25%;height:25px;font-family:'Kanit',sans-serif;">Submit</button>
                </div>

                <div style="display:flex;flex-direction:column;width:50%;padding:15px">
                    <p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:25px">ขั้นตอนการดำเนินงานมีด้วยกัน 5 ขั้นตอนดังนี้</p>
                    <div style="display:flex;flex-direction:column;width:100%;height:auto;color:white;margin-bottom:15px">
                        <li>ขั้นที่ 1 รับฟิล์มเรียบร้อย</li>
                        <li>ขั้นที่ 2 เช็ครายละเอียดการทำงาน</li>
                        <li>ขั้นที่ 3 นำฟิล์มเข้าสู่กระบวนการ</li>
                        <li>ขั้นที่ 4 เช็คความถูกต้อง</li>
                        <li>ขั้นที่ 5 เตรียมนำส่ง</li>
                    </div>
                    <div style="display:flex;flex-direction:column;border-bottom: 3px solid white;width:100%"></div>
                    <!-- <div style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:25px;margin-bottom:5px">Status payment : Paid</div>
                    <p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:24px">Tracking number xxxxxx</p>
                    <p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:24px">Status</p> -->
                  <div id="content"></div>
                </div>

            </div>
           
            </div>
            <?php include('./footer.php') ?>
        </div>
    </body>
</html>
   