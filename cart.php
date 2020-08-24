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
        .bgbanner{
            
            opacity: 0.7;
        }
        .img {
            height: auto;
            width: 60%;
            margin-top: 3px;
            
        }
        .container-cart {
        max-width: 1200px;
        height:auto;
        margin: 0 auto;
        padding-left: 15px;
        padding-right: 15px;
        }
        .container{
        max-width: 1200px;
        margin: 0 auto;
        padding-left: 15px;
        padding-right: 15px;
        background-image: url("./img/bg-forall.png");
        }
    </style>
    <script>
        var $Lengthorder = '';
        var idendity = '';
          $(document).ready(function() {
            fetchorder()
        });
        function fetchorder(){
            var htmlQuery = '';
            var test = '';
            var $total = '';
            
            var $sumtotal = 0 ;
            $.ajax({
            url: 'fetchorder.php',
            type: 'post',
            data: {},
            success: function(response){
                if(response.indexOf('success') >= 0 ){
                  var result = response.split('success_')[1].split('0000000000')
                //   console.log(result)
                        htmlQuery += '<table style="width:100%">'
                            htmlQuery += '<tr>'
                            htmlQuery +=    '<td style="font-family:Kanit,sans-serif;color:white;height:50px">No.</th>'
                            htmlQuery +=    '<td style="font-family:Kanit,sans-serif;color:white">Product name</th>'
                            htmlQuery +=    '<td style="font-family:Kanit,sans-serif;color:white">Price</th>'
                            htmlQuery +=    '<td style="font-family:Kanit,sans-serif;color:white">Amount</th> '
                            htmlQuery +=    '<th style="font-family:Kanit,sans-serif;color:white">Total</th>'
                            htmlQuery +=    '<th style="font-family:Kanit,sans-serif;color:white"></th>'
                            htmlQuery += '</tr>'
                    $Lengthorder = result.length - 1;   
                    for(var i = 0 ; i < result.length - 1 ; i++){
                    var order = result[i].split('^')
                    console.log(order)
                    var json = JSON.parse(order[0])
                            console.log(json)
                        $price = order[1].split('Bath')[0]
                        $total = $price*order[2]
                        $sumtotal +=  $total
                        // idendity = order[3];

                            htmlQuery += '<tr id="a'+i+'">'
                            htmlQuery +=    '<th style="font-family:Kanit,sans-serif;color:white;height:50px" id="product_id'+order[3]+'">'+order[3]+'</th>'
                            htmlQuery +=    '<th  style="font-family:Kanit,sans-serif;color:white" id="OrderNamehead'+order[3]+'">'+json[0].name+'&nbsp;-&nbsp;<span id="order_name'+order[3]+'">'+json[0].format+'</span>&nbsp;'+json[0].type+'&nbsp;<br>'+json[0].ratio+'</th>'
                            htmlQuery +=    '<th id="order_price'+order[3]+'" style="font-family:Kanit,sans-serif;color:white">'+$price+'</th>'
                            htmlQuery +=    '<th id="order_amount'+order[3]+'" style="font-family:Kanit,sans-serif;color:white">'+order[2]+'</th>' 
                            htmlQuery +=    '<th id="total'+order[3]+'" style="font-family:Kanit,sans-serif;color:white">'+$total+'</th>'
                            htmlQuery +=    '<th><button id="b'+order[3]+'" style="font-family:Kanit,sans-serif;" onclick="deleteorder(`'+order[3]+'`);amountrefund(`'+order[3]+'`);window.location.reload()" type="submit" name="add_to_cart">Delete</button></th>'
                            htmlQuery += '</tr>'
                  
                  }
                            htmlQuery += '<tr>'
                            htmlQuery +=    '<td style="color:white"></td>'
                            htmlQuery +=    '<td style="color:white"></td>'
                            htmlQuery +=    '<td style="color:white"></td>'
                            htmlQuery +=    '<td style="color:white"></td>'
                            htmlQuery +=    '<td id="sumtotal" value="'+$sumtotal+'" style="font-family:Kanit,sans-serif;color:white">'+$sumtotal+'</td> '
                            htmlQuery +=    '<td style="color:white">Total</td> '
                            htmlQuery += '</tr>'

                            htmlQuery+='<tr>'
                            htmlQuery+='<th style="font-family:Kanit,sans-serif;color:white;padding-right:5px">ค่าจัดส่ง</th>'
                            htmlQuery+='<th style="font-family:Kanit,sans-serif;display:flex;flex-direction:column;color:white;padding-left:5px">'
                            // htmlQuery+='<div class="radio">'
                            // htmlQuery+='<label style="font-family:Kanit,sans-serif;color:white"><input onclick="send()" name="optradio" type="radio" id="ems">EMS +50 Bath</label>'
                            // htmlQuery+='</div>'
                            // htmlQuery+='<div class="radio">'
                            // htmlQuery+='<label style="font-family:Kanit,sans-serif;color:white"><input name="optradio" type="radio" id="extra">extra +100 Bath</label>'
                            // htmlQuery+='</div>'
                            htmlQuery+='<div id="test">'
                            htmlQuery+='<input onchange="send();sende();" type="radio" id="male" name="gender" value="male">'
                            htmlQuery+='<label for="male">EMS +50 Bath</label><br>'
                            htmlQuery+='<input onchange="sende();send()" type="radio" id="female" name="gender" value="female">'
                            htmlQuery+='<label for="female">extra +100 Bath(ในกรณีรับกลักฟิล์มที่ล้างแล้วคืน)</label><br>'
                            htmlQuery+='</div>'
                            
                            htmlQuery+='<th style="color:white;padding-left:5px"></th>'
                            htmlQuery+='</tr>'
                        htmlQuery += '</table>'
                }
                $('#order').empty()
                $('#order').append(htmlQuery)
                $('#ems').click()
            }
            
        })
        }
        // function sumtotalsend() {
        //     if ($('#ems')[0].checked == true && $('#extra')[0].checked == false ) { 
        //         $('#sumtotal').text(parseInt($('#sumtotal').text())+50); 
        //     } else if ($('#ems')[0].checked == false && $('#extra')[0].checked == true) {
        //         $('#sumtotal').text(parseInt($('#sumtotal').text())+100);
        //     } else {
        //         console.log("pls check");
        //     }
        // }

        function send(){
            var a = $('#sumtotal')[0].innerText
            var b = 150
            var c = 50
            var e = 0
            console.log(a)
            if($('#male')[0].checked == true && $('#female')[0].checked == false){
                // console.log("555")
                e = parseInt(a)+b; 
                console.log(e)
                $('#sumtotal').text(e)   
            } else if($('#male')[0].checked == false && $('#female')[0].checked == true){
                e = parseInt(a)-c; 
                console.log(e)
                $('#sumtotal').text(e)
            } else{
                console.log("pls check");
            }
        }
        function sende(){
            var a = $('#sumtotal')[0].innerText
            var b = 50
            var c = 100
            var e = 0
            console.log(a)
            if($('#female')[0].checked == true && $('#male')[0].checked == false){
                // console.log("555")
                e = parseInt(a)+c; 
                console.log(e)
                $('#sumtotal').text(e)   
            } else if($('#female')[0].checked == false && $('#male')[0].checked == true){
                e = parseInt(a)-c; 
                console.log(e)
                $('#sumtotal').text(e)
            } else{
                console.log("pls check");
            }
        }

        function deleteorder(id){
            var $order = id ;
            console.log($order)
            $.ajax({
            url: 'Deleteorder.php',
            type: 'post',
            data: {orderid: $order},
            success: function(response){

            }
        })
        }
        function amountrefund(id){
            $checkOrderAmount = '';
            $checkOrderName = '';
       
                    $checkOrderAmount = $('#order_amount'+id+'')[0].textContent;
                    $checkOrderName = $('#order_name'+id+'')[0].textContent
                    console.log($checkOrderAmount)
                    console.log($checkOrderName)
        
                $.ajax({
                    url:'updateamountrefund.php',
                    type:'post',
                    data:{
                        amountrefund:$checkOrderAmount,
                        namerefund:$checkOrderName,
                        },
                    success: function(response){
                        console.log(response)
                    }
                })
            }
        function Payment(){ 
            var data = []
            var $checkSend = $('#test')
            var $checksumtotal =  $('#sumtotal')[0].textContent;
            var $checkems =  $('#male')[0].checked;
            var $checkextra =  $('#female')[0].checked;
            // console.log($checkems) 
            // console.log($checkextra) 
            var $checkfnamebill = $('#fnamebill')[0].value;
            var $checklnamebill = $('#lnamebill')[0].value;
            var $checkaddressbill = $('#addressbill')[0].value;
            var $checkdistrictbill = $('#districtbill')[0].value;
            var $checkpostcodebill = $('#postcodebill')[0].value;
            var $checkcitybill = $('#citybill')[0].value;
            var $checktelbill = $('#telbill')[0].value;
            var $checkemailbill = $('#emailbill')[0].value;
            for(i = 0 ; i < $('tr button').length ; i++){
                var id = $('tr button')[i].id.split('b')[1]
                // console.log(id)
                var orderId = $('#product_id'+id).text()
                var orderName = $('#OrderNamehead'+id).text()
                var orderPrice = $('#order_price'+id).text()
                var orderAmount = $('#order_amount'+id).text()
                data.push({
                    id : orderId,
                    name : orderName,
                    price : orderPrice,
                    amount :orderAmount
                })
            }
            // console.log(data)
            window.location.href = './payment.php'
            $.ajax({
                url: 'insertreceipt.php',
                type:'post',
                data:{
                    ordername:JSON.stringify(data),
                    sumtotal:$checksumtotal, 
                    fnamebill:$checkfnamebill,
                    lnamebill:$checklnamebill,
                    addressbill:$checkaddressbill,
                    districtbill:$checkdistrictbill,
                    postcodebill:$checkpostcodebill,
                    citybill:$checkcitybill,
                    telbill:$checktelbill,
                    emailbill:$checkemailbill,
                    ems:$checkems,
                    extra:$checkextra
                },
                suscess:function(response){
                    console.log(response)
                }
            })
        }
        function myFunction() {
            alert("Please Login");
            window.location.href = './RegisLoginform.php'
        }

        $(function(){
            var fiveMinutes = 60 * 1000000,  // เวลาในการชำระเงิน เช่น 5 นาที => 60 * 5
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
                            url: 'deletecart.php',
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
        function deletecart(){
            $.ajax({
                url: 'deletecart.php',
                type: 'post',
                data: {},
                success: function(response){
                    console.log(response)
                }
            })
        }
    </script>
    <body style="margin:0;background:#0c0d10;">
    <?php include('./navbar.php') ?>
        <div class="container-cart">
            <div style="display:flex;flex-direction:row;justify-content:center;align-items:center;width:100%;height:50px;font-family:'Orbitron',sans-serif;font-weight:bold;font-size:30px;color:white;padding-top:30px;margin-bottom:20px">
                ORDER LIST
            </div>

            <div style="padding-top:2em;font-size: 2em;color:#000;font-weight:600;display:none">
                <span id="time" style="color:white">3:00</span> minutes!
            </div>

            <div  style="display:flex;width:100%;flex-direction:column;justify-content:center;align-items:center;">
                <div style="width: 80%;" id="order">
                </div>
            </div>


            <div style="display:flex;flex-direction:row;padding:0 100px">
                <div style="display:flex;flex-direction:column;width:50%;padding:0 30px">
                    <div style="display:flex;flex-direction:row;justify-content:center;align-items:center;width:100%;height:50px;font-family:Kanit,sans-serif;font-weight:bold;font-size:30px;color:white;">
                        ที่อยู่ในการจัดส่ง
                    </div>
                    <div style="display:flex;flex-direction:column;justify-content:center;align-items:flex-start;width:100%;height:auto">
                        <div style="display:flex;flex-direction:row;width:100%">
                            <div style="display:flex;flex-direction:column;width:35%">
                                <p style="font-family:Kanit,sans-serif;font-size:15px;color:white">ชื่อ *.</p>
                                <input style="width:100%;height:40px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:Kanit,sans-serif;" type="text" id="fnamebill" placeholder="ชื่อ" required>
                            </div>
                            <div style="display:flex;flex-direction:column;width:65%">
                                <p style="font-family:Kanit,sans-serif;font-size:15px;color:white">นามสกุล *.</p>
                                <input style="width:100%;height:40px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:Kanit,sans-serif;" type="text" id="lnamebill" placeholder="นามสกุล" required>
                            </div>
                        </div>
                        <p style="font-family:Kanit,sans-serif;font-size:15px;color:white">ที่อยู่ (กรุณากรอกให้ครบถ้วน) *.</p>
                        <input style="width:100%;height:40px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:Kanit,sans-serif;" type="text" id="addressbill"placeholder="ที่อยู่" required>
                        <p style="font-family:Kanit,sans-serif;font-size:15px;color:white">เขต/อำเภอ *.</p>
                        <input style="width:100%;height:40px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:Kanit,sans-serif;" type="text" id="districtbill" placeholder="อำเภอ" required>
                        <p style="font-family:Kanit,sans-serif;font-size:15px;color:white">รหัสไปรษณีย์ *.</p>
                        <input style="width:100%;height:40px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:Kanit,sans-serif;" type="text" id="postcodebill" placeholder="รหัสไปรษณี" required>
                        <p style="font-family:Kanit,sans-serif;font-size:15px;color:white">จังหวัด *.</p>
                        <select style="font-family:Kanit,sans-serif;width:50%;margin-bottom:10px" id="citybill">
                            <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                            <option value="กระบี่">กระบี่ </option>
                            <option value="กาญจนบุรี">กาญจนบุรี </option>
                            <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                            <option value="กำแพงเพชร">กำแพงเพชร </option>
                            <option value="ขอนแก่น">ขอนแก่น</option>
                            <option value="จันทบุรี">จันทบุรี</option>
                            <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                            <option value="ชัยนาท">ชัยนาท </option>
                            <option value="ชัยภูมิ">ชัยภูมิ </option>
                            <option value="ชุมพร">ชุมพร </option>
                            <option value="ชลบุรี">ชลบุรี </option>
                            <option value="เชียงใหม่">เชียงใหม่ </option>
                            <option value="เชียงราย">เชียงราย </option>
                            <option value="ตรัง">ตรัง </option>
                            <option value="ตราด">ตราด </option>
                            <option value="ตาก">ตาก </option>
                            <option value="นครนายก">นครนายก </option>
                            <option value="นครปฐม">นครปฐม </option>
                            <option value="นครพนม">นครพนม </option>
                            <option value="นครราชสีมา">นครราชสีมา </option>
                            <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                            <option value="นครสวรรค์">นครสวรรค์ </option>
                            <option value="นราธิวาส">นราธิวาส </option>
                            <option value="น่าน">น่าน </option>
                            <option value="นนทบุรี">นนทบุรี </option>
                            <option value="บึงกาฬ">บึงกาฬ</option>
                            <option value="บุรีรัมย์">บุรีรัมย์</option>
                            <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                            <option value="ปทุมธานี">ปทุมธานี </option>
                            <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                            <option value="ปัตตานี">ปัตตานี </option>
                            <option value="พะเยา">พะเยา </option>
                            <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                            <option value="พังงา">พังงา </option>
                            <option value="พิจิตร">พิจิตร </option>
                            <option value="พิษณุโลก">พิษณุโลก </option>
                            <option value="เพชรบุรี">เพชรบุรี </option>
                            <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                            <option value="แพร่">แพร่ </option>
                            <option value="พัทลุง">พัทลุง </option>
                            <option value="ภูเก็ต">ภูเก็ต </option>
                            <option value="มหาสารคาม">มหาสารคาม </option>
                            <option value="มุกดาหาร">มุกดาหาร </option>
                            <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                            <option value="ยโสธร">ยโสธร </option>
                            <option value="ยะลา">ยะลา </option>
                            <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                            <option value="ระนอง">ระนอง </option>
                            <option value="ระยอง">ระยอง </option>
                            <option value="ราชบุรี">ราชบุรี</option>
                            <option value="ลพบุรี">ลพบุรี </option>
                            <option value="ลำปาง">ลำปาง </option>
                            <option value="ลำพูน">ลำพูน </option>
                            <option value="เลย">เลย </option>
                            <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                            <option value="สกลนคร">สกลนคร</option>
                            <option value="สงขลา">สงขลา </option>
                            <option value="สมุทรสาคร">สมุทรสาคร </option>
                            <option value="สมุทรปราการ">สมุทรปราการ </option>
                            <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                            <option value="สระแก้ว">สระแก้ว </option>
                            <option value="สระบุรี">สระบุรี </option>
                            <option value="สิงห์บุรี">สิงห์บุรี </option>
                            <option value="สุโขทัย">สุโขทัย </option>
                            <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                            <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                            <option value="สุรินทร์">สุรินทร์ </option>
                            <option value="สตูล">สตูล </option>
                            <option value="หนองคาย">หนองคาย </option>
                            <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                            <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                            <option value="อุดรธานี">อุดรธานี </option>
                            <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                            <option value="อุทัยธานี">อุทัยธานี </option>
                            <option value="อุบลราชธานี">อุบลราชธานี</option>
                            <option value="อ่างทอง">อ่างทอง </option>
                        </select>
                        <p style="font-family:Kanit,sans-serif;font-size:15px;color:white">เบอร์โทรติดต่อ *.</p>
                        <input style="width:100%;height:40px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:Kanit,sans-serif;" type="text" id="telbill" placeholder="เบอร์โทรศัพท์" required>
                        <p style="font-family:Kanit,sans-serif;font-size:15px;color:white">Email *.</p>
                        <input style="width:100%;height:40px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:Kanit,sans-serif;" type="text" id="emailbill" placeholder="email" required>
                    </div>
                </div>
            </div>
            <!-- <div style="display:flex;flex-direction:row;justify-content:flex-end;padding:0 130px">
                <button onclick="Payment();sendaddress()" type="submit">Payment</button>
            </div> -->
            <?php
                if($_SESSION['username']){
                    ?>
                        <!-- <li><a href="logout.php" style="font-family: 'Oxanium';background-color:#0c0d10;margin-left:540px">Log out</a></li> -->
                        <div style="display:flex;flex-direction:row;justify-content:flex-end;padding:0 130px">
                            <button onclick="Payment();deletecart()" type="submit">Payment</button>
                        </div>
                    <?php
                }else{
                    ?>
                    <!-- <a href="RegisLoginform.php" style="font-family:'Orbitron',sans-serif;font-size: 15px;">Log/Sign up</a> -->
                    <!-- <li><a href="RegisLoginform.php" style="font-family: 'Oxanium';background-color:#0c0d10;margin-left:470px">Login/Sign up</a></li> -->
                    <div style="display:flex;flex-direction:row;justify-content:flex-end;padding:0 130px">
                        <button onclick="myFunction()">Payment</button>
                    </div>
                    <?php                        }
            ?>
        </div> 
        <div class="container">
            <?php include('./footer.php') ?>
        </div>
    </body>
</html>