<?php
session_start();
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/detailproductStyle.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!--w3-->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!--bulma-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"> <!--bulma-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> <!--google calendar-->
    </head>
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
                  
                        htmlQuery += '<table style="width:100%">'
                            htmlQuery += '<tr>'
                            htmlQuery +=    '<th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">No.</th>'
                            htmlQuery +=    '<th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Product name</th>'
                            htmlQuery +=    '<th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Type</th>'
                            htmlQuery +=    '<th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Price</th> '
                            htmlQuery +=    '<th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Detail</th>'
                            htmlQuery +=    '<th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Amount</th>'
                            htmlQuery +=    '<th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center"></th>'
                            htmlQuery += '</tr>'
                  for(var i = 0 ; i < result.length - 1 ; i++){
                    // console.log(result[i].split('^'))
                    var order = result[i].split('^')
                    // console.log(order)

                            htmlQuery += '<tr>'
                            htmlQuery +=    '<th style="color:white;margin-bottom:5px !important;">'+order[0]+'</th>'
                            htmlQuery +=    '<th style="height:40px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">'+order[1]+'</th>'
                            htmlQuery +=    '<th style="height:40px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">'+order[2]+'</th>'
                            htmlQuery +=    '<th style="height:40px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">'+order[3]+'</th>' 
                            htmlQuery +=    '<th style="height:40px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">'+order[4]+'</th>' 
                            htmlQuery +=    '<th style="height:40px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">'+order[5]+'</th>' 
                            htmlQuery +=    '<th><button onclick="clickeditproduct(`'+order[0]+'`)" style="font-family:Orbitron,sans-serif" type="submit">Edit</button></th>'
                            htmlQuery +=    '<th><button onclick="deleteproduct(`'+order[0]+'`);window.location.reload()" style="font-family:Orbitron,sans-serif" type="submit">delete</button></th>'
                            htmlQuery += '</tr>'
                  
                  }
                        htmlQuery += '</table>'
                            
                }
                $('#fetchproduct').empty()
                $('#fetchproduct').append(htmlQuery)
            }
        })
        }

        function clickeditproduct(id){
                console.log(id)
                window.location.href = './editproductdetail.php?id='+id
        }
        function deleteproduct(id){
            var $product = id ;

            $.ajax({
            url: 'productdelete.php',
            type: 'post',
            data: {productid: $product},
            success: function(response){

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
            url: 'getimageproduct.php',
            type: 'post',
            data: $form_data,
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
                console.log(response)
                // htmlQuery +=' <input type="file" name="uploadimage" id="'+response+'">'
                htmlQuery +='<img  src="'+response+'">'
                $('#upload').val(response)
                $('#imageupload').empty()
                $('#imageupload').append(htmlQuery)
            }
            
        })
        }
    </script>
    <body>
        <div style="display:flex;flex-direction:row;width:100%;height:auto;background-color:black">
            <div style="width:20%">
                <?php include('menubar.php') ?>
            </div>
            <div style="display:flex;flex-direction:column;width:80%">
                <div style="display:flex;flex-direction:column;padding-top:20px;width:100%;height:auto;background-color:black;">
                    <div class="head-adddetail">ADD &nbsp; PRODUCT</div>
                    <div style="display:flex;flex-direction:row">

                        <div style="display:flex;flex-direction:column;width:45%;height:500px;padding:0 20;align-items:flex-end;font-size:15px;font-family:'Orbitron',sans-serif;color:white">
                            <span style="margin-bottom:10px">NAME</span>
                            <span style="margin-bottom:10px">TYPE</span>
                            <span style="margin-bottom:15px">PRICE</span>
                            <span style="margin-bottom:10px">AMOUNT</span>
                            <span style="margin-bottom:10px">DETAIL</span>
                            <span style="margin-bottom:10px;margin-top:230px;">IMAGES</span>
                        </div>
                      
                        <form action="insertProduct.php" method="post" target="iframe_target" enctype="multipart/form-data" style="display:flex;flex-direction:column;width:50%;height:500px;padding:0 20">
                            <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                            <input style="width:25%;font-size:15px;font-family:'Orbitron',sans-serif;margin-bottom:10px" type="text" name="name" placeholder="name" required>
                            
                            <select style="width:25%;margin-bottom:10px" name="type">
                                <option value="ฟิล์มสี 135">ฟิล์มสี 135</option>
                                <option value="ฟิล์มขาวดำ 135">ฟิล์มขาวดำ 135</option>
                                <option value="ฟิล์มสี 120">ฟิล์มสี 120</option>
                                <option value="ฟิล์ขาวดำ 120">ฟิล์ขาวดำ 120</option>
                            </select>

                            <input style="width:25%;font-size:15px;font-family:'Orbitron',sans-serif;margin-bottom:10px" type="text" name="price" placeholder="price" required>
                            <input style="width:25%;font-size:15px;font-family:'Orbitron',sans-serif;margin-bottom:10px" type="text" name="amount" placeholder="amount" required>
                            
                            <textarea style="margin-bottom:10px;font-family:'Orbitron',sans-serif;" cols="30" rows="10" name="detail" placeholder="detail"></textarea>
                            
                                <input onchange="imageupload()" type="file" name="image" id="getimage">
                                <input type='hidden' name="uploadimage" id="upload">
                                <div style="width:200px;height:200px;margin-top:20px" id="imageupload"></div>
                            
                            <div style="display:flex;flex-direction:row;justify-content:center;">
                                <input onclick="window.location.reload()" type="submit" value="submit" name="submit" style="width:20%;margin-right:5px">
                            </div>

                        </form>
                    </div>
                </div>

                <div style="display:flex;flex-direction:column;width:100%;height:550px;background-color:black;">
                    <div class="head-adddetail">INSTOCK</div>

                    <table style="width:100%">
                        <th id="fetchproduct"></th>
                    </table>
                
                </div>
                
            </div>
        </div>
    </body>
</html>