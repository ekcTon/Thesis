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
    <script>
          $(document).ready(function() {
            fetchproduct()
            
        });
        function fetchproduct(){
            var htmlQuery = '';
            $.ajax({
            url: 'fetchproduct.php',
            type: 'post',
            data: {},
            success: function(response){
                if(response.indexOf('success') >= 0 ){
                //   console.log(response)
                  var result = response.split('success_')[1].split('0000000000')
                //   console.log(result)
                  
                    htmlQuery += '    <div class="columns is-multiline" style="display:flex;flex-direction:row;justify-content:center;">'
                  for(var i = 0 ; i < result.length - 1 ; i++){
                    console.log(result[i].split('^'))
                    var roe = result[i].split('^')
                    // console.log(roe[5],'-----',i)
                    htmlQuery += '<div class="card">'
                    htmlQuery += '<img src="./admin/'+roe[4]+'" style="width:250px;height:250px;background-color:#0c0d10;padding-bottom:20;object-fit:contain">'
                    htmlQuery += '<h1 id="buyname" style="color:white;background-color:#0c0d10;font-family:Oxanium">'+roe[0]+'</h1>'
                    htmlQuery += '<h1 name="name" style="color:white;background-color:#0c0d10;font-family:Oxanium">'+roe[1]+'mm</h1>'
                    htmlQuery += '<p id="buyprice" style="background-color:#0c0d10;font-family:Oxanium;color:white">'+roe[2]+'Bath</p>'
                    htmlQuery += '<p style="color:white;background-color:#0c0d10;font-family:Oxanium">'+roe[3]+'</p>'
                    htmlQuery += '<p style="color:white;background-color:#0c0d10">amount:'+roe[6]+'</p>'
                    htmlQuery += '<p><button onclick="cartproduct(`'+roe[5]+'`)" type="submit" name="add_to_cart" style="color:white;font-family:Oxanium;background-color:#0c0d10" id="test">View</button></p>'
                    htmlQuery += '</div>'
                  }
                    htmlQuery += '     </div>'
                }
                $('#producttest').empty()
                $('#producttest').append(htmlQuery)
            }
        })
        }
        function cartproduct(id){
            console.log(id)
            window.location.href = './viewproduct.php?id='+id
        }
    </script>
    <body style="margin:0;background-color:#0c0d10">
    <?php include('./navbar.php') ?>
        <div class="container">
            <div class="" style="display:flex;flex-direction:column;width:100%;height:auto;background-color:#0c0d10">
                <div style="display:flex;flex-direction:row;margin:20 0 10 0;">
                    <img src="/ThesisEKC/img/XANAPLOGO.png" alt="">
                </div>
                    <div id="producttest"></div>
            </div>
            <?php include('./footer.php') ?>
        </div>
    </body>
</html>