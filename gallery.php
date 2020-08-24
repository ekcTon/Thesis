<?php session_start() ?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> <!--google calendar-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!--bulma-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"> <!--bulma-->
        <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">  <!--googleFont-->
        <link href="https://fonts.googleapis.com/css?family=Oxanium&display=swap" rel="stylesheet"> <!--googleFont-->
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v6.0"></script> <!--facebook-->
    </head>
    <style>
            .containerbody {
            position: relative;
            width: 50%;
            }

            .image {
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
            }

            .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
            }

            .containerbody:hover .image {
            opacity: 0.3;
            }

            .containerbody:hover .middle {
            opacity: 1;
            }

            .text {
            /* background-color: #4CAF50; */
            font-family:'Orbitron',sans-serif;
            color: white;
            font-size: 20px;
            padding: 16px 32px;
            }

            .img {
                height: auto;
                width: 60%;
                margin-top: 3px;
            }
            body {
            margin: 0px;
            font-family: 'segoe ui';
            }
            .container1 {
                max-width: 1200px;
                margin: 0 auto;
                padding-left: 15px;
                padding-right: 15px;
            }
    </style>
    <script>
        $(document).ready(function() {
           gallery()
        });
         function gallery() {
                var inner = ""
                var descrip = [
                    "#XANAP",
                    "#XANAP1",
                    "#XANAP2",
                    "#XANAP3",
                    "#XANAP4",
                    "#XANAP5",
                    "#XANAP6",
                    "#XANAP7"
                ]
                // inner += '<div class="" style="display:flex;flex-direction:column;width:100%;height:auto;background-color:#0c0d10;">'
                inner += '    <div class="columns is-multiline" style="display:flex;flex-direction:row;justify-content:center;margin-top:30px">'
                for (var i = 0; i < 8; i++) {

                    inner += '<div class="containerbody">'
                    inner += '<img src="./img/gallery-pok.jpg" alt="Avatar" class="image" style="width:100%">'
                    inner += '<div class="middle">'
                    inner += '<div class="text">'+descrip[i]+'</div>'
                    inner += '</div>'
                    inner += '</div>'
                    // inner += '<div class="containerbody">'
                    // inner += '<div style="display:flex;flex-direction:row;margin:20 0 10 10;">'
                    // inner += '<img src="./img/gallery-pok.jpg" style="object-fit:contain;height:400px;" class="image">'
                    // inner += '<div class="middle">'
                    // inner += '<div class="text">'+descrip[i]+'</div>'
                    // inner += '</div>'
                    // inner += '</div>'
                    // inner += '</div>'
                   
                }
                // inner += '             </div>'
                inner += ' </div>'

                $('#gallery').append(inner);
            }
    </script>
    <body style="margin:0;background:#0c0d10;">
    <?php include('navbar.php') ?>
        <div class="container1">
        <div style="width:100%;display:flex;flex-direction:row">
            <div style="color:white;height:auto;width:100%">
                <p style="text-align:center;font-family:'Oxanium';font-size:250%">XANAP ‘photo of the month’</p>
                <p style="text-align:center;font-family:'Kanit';font-size:100%">ประจำเดือนกุมภาพันธ์มาแล้ว ✨✨</p>
                <p style="text-align:center;font-family:'Kanit';font-size:100%">🔵 กติกาง่ายๆ เพียงโพสท์ภาพที่คุณถ่ายด้วยกล้องฟิล์ม<br>
                    ซึ่งใช้บริการล้าง-สแกนจาก XANAP ภายในเดือนกุมภาพันธ์2020<br>
                    ใต้ comment โพสท์หน้าแฟนเพจ<br>(ตั้งแต่วันนี้ ถึงวันที่ 25 กุมภาพันธ์ เวลา 23.00 น.
                    และประกาศผลในวันที่ 29 กุมภาพันธ์นี้)<br>
                    พร้อมชื่อของคุณ / หมายเลขงานที่อยู่หน้าชื่อในอีเมล์ / ชื่อฟิล์มที่ใช้ถ่าย<br>
                    ก็เตรียมลุ้นของรางวัลฟิล์ม Fuji Superia Premium400 (มูลค่า 430 บาท)จากเราไปได้เลย</p>
                    <br>
                    <p style="font-family:'Kanit';font-size:80%">หมายเหตุ :
                    - ขอความร่วมมือหนึ่งคน ส่งภาพถ่ายเพียงหนึ่งภาพนะครับ<br>
                    - หลังจากประกาศผลแล้ว ผู้โชคดีสามารถมารับรางวัลได้ที่หน้าร้าน XANAP (Lido ชั้น2) (ร้านปิดทุกพุธ-พฤหัสนะครับ)<br>
                    - ร้านขออนุญาตนำภาพที่ทุกคนส่งกันเข้ามา ไปทำเป็น online content ต่อไปครับ</p>
            </div>
            
        </div>
            <div class="" style="display:flex;flex-direction:column;width:100%;height:auto;background-color:#0c0d10;">
                <div id="gallery">
                </div>
            </div>
            <!-- <div class="" style="display:flex;flex-direction:column;width:100%;height:auto;background-color:#0c0d10;">
                <div style="display:flex;flex-direction:row;margin:20 0 10 10;">
                    <img src="./img/test.png" alt="">
                </div>
            </div> -->
            <?php include('footer.php') ?>
        </div>
    </body>
</html>