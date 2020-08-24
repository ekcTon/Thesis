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
            var json = '';

          $(document).ready(function() {
            receipt()
        });
        function receipt(){
            var htmlQuery = '';
            var totalprice = '';
            var sumtotalprice = 0;
            $.ajax({
                url:'fetchreceipt.php',
                type: 'post',
                data:{},
                success: function(response){
                    console.log(response)

                    if(response.indexOf('success') >= 0 ){
                            var result = response.split('success_')[1].split('0000000000')
                            console.log(result)
                            var arorder = result[0].split('^')
                            console.log(arorder)
                           
                              
                            htmlQuery+='<div style="display:flex;flex-direction:row;justify-content: center;width:100%;margin-bottom:15px"><img src="./img/LOGOXANAP.png"></div>'
                            htmlQuery+='<div style="text-align:center;font-family:Kanit,sans-serif;font-size:15px;color:red;margin-bottom:15px">กรุณาทำรายการภายในเวลา 15 นาที <br>(ก่อนอัพโหลดสลิปกรุณาปริ้นรายละเอียดเพื่อแนบหรือแปะที่ม้วนฟิล์มม้วนดังกล่าว)</div>'
                            htmlQuery+='<div style="color:white;background-color:#0c0d10;font-size:20px;margin-bottom:5px" id="ordernumber">ORDER NUMBER : '+arorder[1]+'</div>'
                            htmlQuery+='<div style="color:white;background-color:#0c0d10;font-size:20px;margin-bottom:5px">TRACKING RECEIPT : '+arorder[1]+'</div>'
                            htmlQuery+='<div style="color:white;background-color:#0c0d10;font-size:20px;margin-bottom:5px">ORDER DATE : '+arorder[0]+'</div>'
                            htmlQuery+='<div style="color:white;background-color:#0c0d10;font-size:20px;margin-bottom:5px">EMAIL : '+arorder[8]+'</div>'
                            htmlQuery+='<div style="color:white;background-color:#0c0d10;font-size:20px;margin-bottom:5px">TOTAL PRICE : '+arorder[3]+' &nbsp; Bath</div>'
                            htmlQuery+='<div style="color:white;background-color:#0c0d10;font-size:20px;margin-bottom:5px">PAYMENT METHOD : ชำระเงินผ่านธนาคาร</div>'

                            json = JSON.parse(arorder[2])
                            console.log(json)

                          
                                htmlQuery+='<div style="display:flex;flex-direction:row;justify-content:center;color:white;background-color:#0c0d10;font-family:Oxanium;font-size:30px;margin-top:15px">ORDER DETAIL</div>'
                                htmlQuery+='<table style="width:100%;margin-top:15px" id="printTable">' 
                                htmlQuery+='<tr>'
                                htmlQuery+='<th style="width:10%;height:50px;color:white;font-family:Oxanium;font-size:20px">No.</th>'
                                htmlQuery+='<th style="height:50px;width:70%;color:white;font-family:Oxanium;font-size:20px">Product</th>'
                                htmlQuery+='<th style="height:50px;width:20%;color:white;font-family:Oxanium;font-size:20px">Price</th>'
                                htmlQuery+='</tr>'
                            for(var i = 0 ; i < json.length ; i++){
                                totalprice = json[i].amount*json[i].price
                                console.log(totalprice)
                                sumtotalprice += totalprice
                                console.log(sumtotalprice)
                                htmlQuery+='<tr>'
                                htmlQuery+='<td style="width:10%;height:50px;color:white;font-family:Oxanium;font-size:15px" id="idpro'+i+'">'+json[i].id+'</td>'
                                htmlQuery+='<td style="height:65px;width:70%;color:white;font-family:Oxanium;font-size:15px" id="product'+i+'">'+json[i].name+'&nbsp;x&nbsp;'+json[i].amount+'</td>'
                                htmlQuery+='<td style="width:20%;color:white;font-family:Oxanium;font-size:15px">'+totalprice+'</td>'
                                htmlQuery+='</tr>'
                            } 
                                htmlQuery+='<tr>'
                                htmlQuery+='<td style="width:10%;height:50px;color:white;font-family:Oxanium;font-size:20px"></td>'
                                htmlQuery+='<td style="width:70%;color:white;font-family:Oxanium;font-size:15px">Total(รวมค่าส่ง)</td>'
                                htmlQuery+='<td style="width:20%;color:white;font-family:Oxanium;font-size:15px" id="sum">'+arorder[3]+'</td>'
                                htmlQuery+='</tr>'
                                htmlQuery+='</table>'
                                htmlQuery+='<div style="margin-left:530px;;width:100%">'
                                htmlQuery+='<button style="width:10%" onclick="printData()">Print</button>'
                                htmlQuery+='</div>'
                                htmlQuery+='<div style="color:white;background-color:#0c0d10;font-family:Kanit,sans-serif;font-size:25px;margin-top:5px" id="status">PAYMENT STATUS : '+arorder[9]+'</div>'
                                htmlQuery+='<div style="color:white;background-color:#0c0d10;font-family:Kanit,sans-serif;font-size:30px;margin-top:15px;margin-bottom:5px">ชำระเงินผ่านบัญชีด้านล่าง</div>'
                
                                htmlQuery+='<div style="color:white;background-color:#0c0d10;font-family:Kanit,sans-serif;font-size:15px">ชื่อบัญชี : KOBKARN THEPSUPORNKUL<br>เลขบัญชี : 232-4-63668-3<br>ธนาคาร : กรุงเทพ</div>'
                                htmlQuery+='<div style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:30px;margin-top:20px">Delivery address</div>'
                                htmlQuery+='<div style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:20px;margin-top:5px" id="add">name :คุณ&nbsp;'+arorder[4]+'&nbsp;'+arorder[5]+'<br>address : '+arorder[7]+'<br>'+arorder[10]+'&nbsp;'+arorder[11]+'&nbsp;'+arorder[12]+'<br>tel : '+arorder[6]+'<br>Email : '+arorder[8]+'</div>'
                                htmlQuery+='<div style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:20px;margin-top:5px" id="ems" hidden>'+arorder[13]+'</div>'
                                htmlQuery+='<div style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:20px;margin-top:5px" id="extra" hidden>'+arorder[14]+'</div>'
                    }
                    $('#receipt').empty()
                    $('#receipt').append(htmlQuery)
                }
            })
        }

        function imageupload(){
            var $getimage = '';
            var htmlQuery = ''; 
            $getimage = $('#getimage').prop('files')[0]
            // console.log($getimage)
            var $form_data = new FormData();                  
            $form_data.append('file', $getimage);
            $.ajax({
            url: 'transferSlip.php',
            type: 'post',
            data: $form_data,
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
                // console.log(response)
                htmlQuery +='<img  src="'+response+'" style="width:200px;height:200px">'
                $('#upload').val(response)
                $('#imageupload').empty()
                $('#imageupload').append(htmlQuery)
            }
            
        })
        }

        function sliptransfer(){
            var slip = '';
            var order = '';
            var product = '';
            var sumtotal = '';
            var status = '';
            var addresscus = '';
            var id = '';
            var ems = '';
            var extra = ''; 
            var nameproduct = [];

            slip = $('#upload')[0].value;
            order = $('#ordernumber')[0].innerText.split('ORDER NUMBER : ');
            ordersplit = order[1];
            sumtotal = $('#sum')[0].innerText;
            status = $('#status')[0].innerText;
            addresscus = $('#add')[0].innerText;
            ems = $('#ems')[0].innerText;
            extra = $('#extra')[0].innerText;

            console.log(slip)
            console.log(order)
            console.log(sumtotal)
            console.log(addresscus)
            console.log(status)

            for(var i = 0 ; i < json.length ; i++){
                product = $('#product'+i+'')[0].textContent;
                console.log(product)
                console.log(id)
                nameproduct.push(product)
                console.log(nameproduct)
            }
                
            if(confirm('ชำระค่าบริการเรียบร้อย')){
                window.location.href = './index.php'
                $.ajax({
                    url: 'insertslip.php',
                    type: 'post',
                    data: {
                            sliptrans:slip,
                            ordernumber:ordersplit,
                            orderproduct:JSON.stringify(nameproduct),
                            sum:sumtotal,
                            receiptstatus:status,
                            address:addresscus,
                            ems:ems,
                            extra:extra
                        },
                    success: function(response){
                        console.log(response)
                        
                    }
                    
                })
            }
           
        }
        // function deletereceipt(){
        //         $.ajax({
        //         url: 'deletereceipt.php',
        //         type: 'post',
        //         data: {},
        //         success: function(response){
        //             console.log(response)
        //         }
        //     })
        // }
        function updatestatusreceipt(){
            var orderid = $('#ordernumber')[0].innerText
            var id = orderid.split('ORDER NUMBER : ')
            var ordernumber = id[1]
            console.log(ordernumber)
                $.ajax({
                url: 'updatestatusreceipt.php',
                type: 'post',
                data: {id:ordernumber},
                success: function(response){
                    console.log(response)
                }
            })
        }

        $(function(){
            var fiveMinutes = 60 * 100000,  // เวลาในการชำระเงิน เช่น 5 นาที => 60 * 5
            display = document.querySelector('#time');
            startTimer(fiveMinutes, display);       
        });
        
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            var x = setInterval(function () {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                // console.log(minutes);
                // console.log(seconds);
                // console.log(duration);
                // console.log(timer);

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    // ถ้าหมดเวลา ให้แสดงข้อความว่า EXPIRED
                    display.textContent = "EXPIRED";
                    if(confirm("หมดเวลาทำรายการ")){
                        window.location.href = './index.php'
                        $.ajax({
                            url: 'deletereceipt.php',
                            type: 'post',
                            data: {},
                            success: function(response){
                                console.log(response)
                            }
                        })
                        clearInterval(x);
                    }
                    
                    
                    
                }

            }, 1000);
        }

         function printData(){
            var divToPrint=document.getElementById("printTable");
            newWin= window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }
    </script>
    <body style="margin:0;background:#0c0d10;"> 
        <?php include('./navbar.php') ?>
            <div class="container">
                <div class="wrapper">
                    <div style="display:flex;flex-direction:row;justify-content:center;align-items:center;width:100%;height:50px;font-family:'Orbitron',sans-serif;font-weight:bold;font-size:30px;color:white;">
                        RECEIPT
                    </div>
                    <div style="padding-top:2em;font-size: 2em;color:#000;font-weight:600;display:none">
                        <span id="time" style="color:white">3:00</span> minutes!
                    </div>
                    <table style="width:100%">
                        <th id="receipt"></th>
                    </table>
                    <div style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:30px;margin-top:20px">Store address</div>
                    <div style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:20px;margin-top:5px">- XANAP FILMLAB อาคาร LIDO CONNECT &nbsp; เลขที่252004-2005<br>
                                                                                                                            ถ.พระราม 1 แขวงปทุมวัน เขตปทุมวัน กรุงเทพฯ 10330 ชั้น 2 ห้อง <br>
                                                                                                                            (ร้านหยุดวันพุธ-พฤหัสบดี)&nbsp;โทร 02-001-4636<br>
                                                                                                                            - ส่ง Grab,Lineman ปัก location “LIDO CONNECT” 
                                                                                                                            และพิมพ์แจ้ง messenger ว่า<br> “ร้าน XANAP FILMLAB <br
                                                                                                                            >ชั้น 2 ขึ้นบันไดตรงร้าน Cha Bar เลี้ยวซ้าย” <br>
                                                                                                                            (ร้านหยุดวันพุธ-พฤหัสบดี)</div>
                    <div style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:30px;margin-top:15px">Upload Transfer slip</div>
                    
                    <div style="width:200px;height:200px;margin-top:20px" id="imageupload"></div>
                    <input onchange="imageupload()" type="file" name="image" id="getimage">
                    <input type="hidden" name="uploadimage" id="upload">
                    
                    <button onclick="sliptransfer();updatestatusreceipt()" type="submit" style="color:white;font-family:Oxanium;width:30%;margin-top:20px;color:black;font-size:15px">SUBMIT</button>
                   
                </div> 
                <?php include('./footer.php') ?>
            </div> 
    </body>
</html>