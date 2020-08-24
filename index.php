<?php session_start() ?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">  <!--googleFont-->

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!--bulma-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"> <!--bulma-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> <!--google calendar-->

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <style>
            .about{
                background-image: url("./img/about.jpg");
                opacity:0.2;
            }
            .card {
            /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); */
            max-width: 200px;
            margin: auto;
            margin-top:10px;
            text-align: center;
            font-family: arial;
            background-color: #0c0d10;
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
            background-color: #0c0d10;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            transition: 1s;
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
            addphoto()
            fetchproduct()
        });
        
        function fetchproduct(){
            var htmlQuery = '';
            $.ajax({
            url: './fetchproduct.php',
            type: 'post',
            data: {},
            success: function(response){
                if(response.indexOf('success') >= 0 ){
                  console.log(response)
                  var result = response.split('success_')[1].split('0000000000')
                  console.log(result)
                  
                    htmlQuery += '    <div class="columns is-multiline" style="display:flex;flex-direction:row;justify-content:center;background-color:#0c0d10">'
                  for(var i = 0 ; i < 5 - 1 ; i++){
                    console.log(result[i].split('^'))
                    var roe = result[i].split('^')
                  

                    htmlQuery += '<div class="card">'
                    htmlQuery += '<img src="./admin/'+roe[4]+'" style="width:250px;height:250px;background-color:#0c0d10;padding-bottom:20;object-fit:contain">'
                    htmlQuery += '<p style="color:white;background-color:#0c0d10;">'+roe[0]+'<br>'+roe[1]+'mm</p>'
                    htmlQuery += '<p class="price" style="background-color:#0c0d10">'+roe[2]+'Bath</p>'
                    htmlQuery += '<p style="color:white;background-color:#0c0d10">'+roe[3]+'</p>'
                    htmlQuery += '<p style="color:white;background-color:#0c0d10">amount:'+roe[6]+'</p>'
                    htmlQuery += '<p><button onclick="cartproduct(`'+roe[5]+'`)" type="submit" name="add_to_cart" style="color:white;font-family:Oxanium;background-color:#0c0d10">View</button></p>'
                    htmlQuery += '</div>'
                  }
                    htmlQuery += '             </div>'
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

        function addphoto() {

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
            var img = [
                "./img/04.jpg",
                "./img/02.jpg",
                "./img/03.jpg",
                "./img/01.jpg",
                "./img/11.jpg",
                "./img/18.jpg",
                "./img/10.jpg",
                "./img/17.jpg"
            ]

            inner += '    <div class="columns is-multiline" style="display:flex;flex-direction:row;justify-content:center;">'
            for (var i = 0; i < 8; i++) {

                inner += '<div class="containerbody">'
                inner += '<img src="'+img[i]+'" alt="Avatar" class="image" style="width:100%">'
                inner += '<div class="middle">'
                inner += '<div class="text">'+descrip[i]+'</div>'
                inner += '</div>'
                inner += '</div>'

            }
            inner += '             </div>'
            $('#photo').append(inner);


        }
    </script>
    
    <body style="margin:0;background:#0c0d10;">
    <?php include('navbar.php') ?>
        <div class="container1">
        <!-- <div style="height:50px;width:100%">
        <img src="./img/line-xanap.png" alt="" style="object-fit:contain;height:50px;"> 
        </div> -->
        
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" >
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="./img/test.png" style="object-fit:contain;height:400px;width:100%"> 
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="./img/footer.jpg" style="object-fit:contain;height:400px;width:100%"> 
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="./img/test.png" style="object-fit:contain;height:400px;width:100%"> 
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
                    </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div> 

                <div class="" style="display:flex;flex-direction:column;width:100%;height:auto;background-color:#0c0d10;">
                    <div style="display:flex;flex-direction:row;margin-bottom:30px;margin-top:10px">
                        <img src="./img/logo-gallery.png" alt=""> 
                    </div>

                    <div id="photo">
                    </div>
                </div>

                <div class="" style="display:flex;flex-direction:column;width:100%;height:auto;background-color:#0c0d10;">
                    <div style="display:flex;flex-direction:row;margin:20 0 10 10;">
                        <img src="./img/logo-product2.png" alt="">
                    </div>
                        <div id="producttest"></div>
                </div>

                <div class="" style="display:flex;flex-direction:column;width:100%;height:auto;background-color:#0c0d10;">
                <!-- <div style="display:flex;flex-direction:row;margin:20 0 10 10;">
                        <img src="./img/logo-about.png" alt="">
                    </div> -->
                    <div class="about" style="display:flex;flex-direction:row;width:100%;height:auto;display:flex;flex-direction:row;margin:20 0 10 0;">
                        <div class="about" style="width:50%">

                        </div>
                        <div style="width:50%;">
                            <div style="font-family:'Orbitron',sans-serif;font-size:25px;color:white">Xanap</div>
                            <div style="font-family:'Orbitron',sans-serif;font-size:14px;color:white">
                                Xanap Filmlab is a film developing and scanning service for both color and black-and-white films, 
                            as well as Selling film cameras, film rolls and related gadgets. Xanan also wrillingly give an 
                            advice about filmphotography Xanap was founded by a group of people who are fond of and interested 
                            in film photography. Our shop wลร officially opened in 2018, September located at Samyan. As time passed,
                            อn increasing number of people are interested in film photography, resulting in Xanap 's increasing 
                            number of customers who would be happy t our shop it moved to the Center of the city with convenient 
                            transportation. So, Xanap decided to move to Lido Connect (2nd floor), Siam Square as requested. We all 
                            have same intention to make Kaกออ to be a space for everyone who is interested in film photography We are 
                            willing to give an advice to those who want since the tronoy believe that once you understand what a film 
                            photography, you will enjoy and love it. In 2000, Film photography almost disapeared. Many companies and 
                            film manufacturers were closed back then. However, there are a group of people who are fond of film photography
                            maintaining the use of film up to now Nowadays, film photography has painted a popularity again which is a very 
                            good news to hear. Xanan, one of those who are fond of film photography, a trying our best to conserve this way 
                            of photography Although it seeemed to be a difficult thing in the past, many people are now Penjoying taking 
                            photographs by film. It is considered as one of memory recorder, as well as a life stylee tool of our generation,
                            </div>
                        </div>
                    </div>
                </div>
                <?php include('./footer.php') ?>
        </div>
    </body>
</html>