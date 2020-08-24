<?php session_start() ?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"> <!--bulma-->
        <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">  <!--googleFont-->

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!--bulma-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"> <!--bulma-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> <!--google calendar-->


    </head>
    <style>
            .card {
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
            transition: 0.5s;
            }

            .card button:hover {
            opacity: 0.7;
            }

            .containerbody {
            position: relative;
            width: 24%;
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

        .buttonnone {
            background: none;
            border: none;
            color: #efefef;
        }
        .img {
            height: auto;
            width: 60%;
            margin-top: 3px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
        }
    </style>
    <script>
        var $checkamount = '';
        var $checkname = '';
          $(document).ready(function() {
            getparam()

        });
            function getparam(){
                var url_string = window.location.href ; //window.location.href
                var url = new URL(url_string);
                var c = url.searchParams.get('id');
                var htmlQuery = '';

                $.ajax({
                url: 'order.php',
                type: 'post',
                data: {id:c},
                success: function(response){
                    // console.log(response);
                    var result = response.split('^')
                        // console.log(result)
                        htmlQuery += '    <div method="post" class="columns is-multiline" style="display:flex;flex-direction:row;justify-content:center;background:#0c0d10">'
                        htmlQuery += '<div class="card">'
                        htmlQuery += '<img src="./admin/'+result[4]+'" style="width:250px;height:250px;background:#0c0d10;padding-bottom:20;object-fit:contain">'
                        htmlQuery += '<h1 id="buyname" style="color:white;background:#0c0d10;">'+result[0]+'</h1>'
                        htmlQuery += '<h1 style="color:white;background:#0c0d10;">'+result[1]+'mm</h1>'
                        htmlQuery += '<p class="price" id="buyprice" style="background:#0c0d10">'+result[2]+'Bath</p>'
                        htmlQuery += '<p style="color:white;background:#0c0d10">'+result[3]+'</p>'
                        htmlQuery += 'amount: <input style="color:white;background:#0c0d10" type="number" id="buyamount" min="1" max="'+result[6]+'" value="1">'
                        // htmlQuery += '<p style="display:none;color:white;background-color:black" id="amount">'+result[6]+'</p>'
                        htmlQuery += '<p><button style="background:#0c0d10" onclick="addtocart();updateamountbuy()">Add to cart</button></p>'
                        htmlQuery += '</div>'
                        htmlQuery += '     </div>'

                    $('#test').empty()
                    $('#test').append(htmlQuery)
                }
                 
            })
            }
            function addtocart(){
                var json = [];
                var $checkprice = $('#buyprice')[0].textContent;
                $checkname = $('#buyname')[0].textContent;
                $checkamount = $('#buyamount')[0].valueAsNumber;
            // console.log($checkname,$checkprice,$checkamount);
            json.push({format:$checkname,ratio:" ",type:" ",name:" ",status:"product"})
            if(confirm('Confirm')){
                window.location.href = './cart.php'
                $.ajax({
                    url:'insertCart.php',
                    type:'post',
                    data:{
                        buyname:JSON.stringify(json),
                        buyprice:$checkprice,
                        buyamount:$checkamount
                        },
                    success: function(response){
                        console.log(response)
                    }
                })
            }else{
                console.log('Cancle')
            }

            }
            function updateamountbuy(){
                $checkamount = $('#buyamount')[0].valueAsNumber;
                $checkname = $('#buyname')[0].textContent;
                $.ajax({
                    url:'updateamount.php',
                    type:'post',
                    data:{
                        updateamount:$checkamount,
                        updatename:$checkname
                        },
                    success: function(response){
                        console.log(response)
                    }
                })
            }
    </script>
    <body style="margin:0;background:#0c0d10;">
        <?php include('./navbar.php') ?>
        <div class="container">
            <div class="" style="display:flex;flex-direction:column;width:100%;height:auto;background:#0c0d10;">
                <div style="display:flex;flex-direction:row;margin:20 0 10 0;">
                    <img src="/ThesisEKC/img/XANAPLOGO.png" alt="">
                </div>
                    <div id="test"></div>
            </div>
        </div>
    </body>
</html>


