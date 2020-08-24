<?php session_start() ?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"> <!--bulma-->
        <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">  <!--googleFont-->

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!--bulma-->
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
            max-width:960px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
            }
            button {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            background-color:#222d33;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            transition: 1s;
            }

            button:hover {
            opacity: 0.7;
            }
    </style>
     <script>
        var checkformatcompare = ''; 
        var checkratiocompare = ''; 
        var checktypecompare = ''; 
        $(document).ready(function() {

        });
        function ratio(){
            var $format = $('#format')[0].value; 
            var htmlQuery = '';
            if($format == $('#135M')[0].value){
                htmlQuery +='<p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:16px">Ratio</p>'
                htmlQuery +='<select style="width:25%;margin-bottom:10px" id="ratio">'
                htmlQuery +='<option value="Standard 3000x2000 PX">Standard 3000x2000 PX</option>'
                htmlQuery +='<option value="Half Frame2000x1400 PX">Half Frame2000x1400 PX</option>'
                htmlQuery +='<option value="Panorama 5400x2000 PX">Panorama 5400x2000 PX</option>'
                htmlQuery +='<option value="Sprocket Hole 3600x3600 PX">Sprocket Hole 3600x3600 PX</option>'
                htmlQuery +='</select>'
                $('#2').append(htmlQuery)
                $('#3').empty(null)
                $('#4').empty(null)
            }else if($format == $('#135L')[0].value){
                htmlQuery +='<p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:16px">Ratio</p>'
                htmlQuery +='<select style="width:25%;margin-bottom:10px" id="ratio">'
                htmlQuery +='<option value="Standard 5400x3600 PX">Standard 5400x3600 PX</option>'
                htmlQuery +='<option value="Half Frame3600x2500 PX">Half Frame3600x2500 PX</option>'
                htmlQuery +='<option value="Panorama 9750x3600 PX">Panorama 9750x3600 PX</option>'
                htmlQuery +='</select>'
                $('#3').append(htmlQuery)
                $('#2').empty(null)
                $('#4').empty(null)
            }else{
                htmlQuery +='<p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:16px">Ratio</p>'
                htmlQuery +='<select style="width:25%;margin-bottom:10px" id="ratio">'
                htmlQuery +='<option value="Standard 6x6 3600x3600 PX">Standard 6x6 3600x3600 PX</option>'
                htmlQuery +='<option value="Standard 6x7 3600x4200 PX">Standard 6x7 3600x4200 PX</option>'
                htmlQuery +='<option value="Standard 6x9 3600x5400 PX">Standard 6x9 3600x5400 PX</option>'
                htmlQuery +='</select>'
                $('#4').append(htmlQuery)
                $('#2').empty(null)
                $('#3').empty(null)
            }
        }
        function compare(){
            var htmlQuery = '';
            var $formatcompare = ''; 
            var $ratiocompare = ''; 
            var $typecompare = ''; 
                $formatcompare = $('#format')[0].value; 
                $ratiocompare = $('#ratio')[0].value;
                $typecompare = $('#type')[0].value;
                console.log($formatcompare)
                console.log($ratiocompare)
                console.log($typecompare)
            $.ajax({
                url:'comparescan.php',
                type:'post',
                data:{format:$formatcompare,
                      ratio:$ratiocompare,
                      type:$typecompare},
                success: function(response){
                    console.log(response)
                    var result = response.split('success_')[1].split('0000000000')
                    console.log(result)
                    var list = result[0].split('^')
                    console.log(list)
                    htmlQuery +='<h1 style="color:white">'+list[2]+'</h1>'
                    $('#serviceprice').empty()
                    $('#serviceprice').append(htmlQuery)
                }
            })
        }
        function addservicetocart(){
            var json = [];
            checkformatcompare = $('#format')[0].value; 
            checkratiocompare = $('#ratio')[0].value;
            checktypecompare = $('#type')[0].value;
            checkbuyamount = $('#buyamount')[0].value;
            checkprice = $('#serviceprice')[0].innerText;
            checkfilm = $('#film')[0].value;
           
            json.push({format:checkformatcompare,ratio:checkratiocompare,type:checktypecompare,name:checkfilm,status:"service"})
            // console.log(checkformatcompare)
            // console.log(checkratiocompare)
            // console.log(checktypecompare)
            // console.log(json)
            if(confirm('ยืนยันการสั่งซื้อ')){
                window.location.href = './cart.php'
                $.ajax({
                url:'insertserviceCart.php',
                type:'post',
                data:{  
                    service:JSON.stringify(json),
                    buyamount:checkbuyamount,
                    price:checkprice,
                    },
                success: function(response){
                    console.log(response)
                }
            })
            }else{
                console.log('Cancle')
            }
        }
    </script>  
    <body style="margin:0;background-color:#0c0d10">
    <?php include('./navbar.php') ?>
        <div class="container">
            <div class="wrapper" style="display:flex;flex-direction:row;width:100%;height:auto;margin-top:30px">
                <div style="display:flex;flex-direction:row;justify-content:center;;width:50%;height:auto">
                <img src="./img/scan.jpg" style="width:300px;height:300px;object-fit:contain;" alt="">
                </div>
                <div style="display:flex;flex-direction:column;width:50%;height:auto">
                <div style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:30px;margin-bottom:5px">Scan</div>
                    <div style="display:flex;flex-direction:column;width:50%;height:auto;color:white;margin-bottom:10px">
                        <li>เลือกขนาดฟิล์ม</li>
                        <li>เลือกสัดส่วนที่ต้องการ</li>
                        <li>เลือกประเภทของฟิล์ม</li>
                    </div>
                    <p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:16px">Format</p>
                        <div id="1">
                            <select onchange="ratio();compare()" style="width:25%;margin-bottom:10px" id="format">
                                <option id="135M" value="135M">135M</option>
                                <option id="135L" value="135L">135L</option>
                                <option id="120" value="120">120</option>
                            </select>
                        </div>

                    <!-- <p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:16px">Approx Pixel Dimensions</p>     -->
                    <div id="2">
                    </div>

                    <div id="3">
                    </div>

                    <div id="4">
                    </div>

                    <p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:16px">Type</p>
                    <select style="width:25%;margin-bottom:10px" id="type">
                        <option value="scan">scan</option>
                    </select>
                    <p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:16px">amount</p>
                    <input style="color:black;background:white;width:25%" type="number" id="buyamount" min="1" max="5" value="1">
                    <p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:16px;margin-top:15px">ชื่อฟิล์ม</p>
                    <input style="width:25%;font-size:15px;font-family:'Kanit',sans-serif;margin-bottom:10px" type="text" id="film" placeholder="ชื่อฟิล์ม" required>
                    <p style="color:white;background-color:#0c0d10;font-family:Oxanium;font-size:16px;margin-top:10px">Price</p>
                    <div id="serviceprice" ></div>
                    <div style="display:flex;flex-direction:row;justify-content:flex-star">
                        <button onclick="addservicetocart()" type="submit" style="color:white;font-family:Oxanium;width:30%;margin-top:20px">Add to cart</button>
                    </div>
                </div>
            </div>
            <?php include('./footer.php') ?>
        </div>
    </body>
</html>