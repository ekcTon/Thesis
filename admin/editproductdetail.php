<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"> <!--bulma-->
        <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">  <!--googleFont-->

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!--bulma-->
        <link rel="stylesheet" href="./css/detailproductStyle.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"> <!--bulma-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> <!--google calendar-->
    </head>
    <script>
    var temp = ''
    var tempEdit = ''
          $(document).ready(function() {
            getparameditproduct()

        });
            function getparameditproduct(){
                var url_string = window.location.href ; //window.location.href
                var url = new URL(url_string);
                var c = url.searchParams.get('id');
                var htmlQuery = '';

                $.ajax({
                url: 'processeditdetail.php',
                type: 'post',
                data: {id:c},
                success: function(response){
                    console.log(response);
                    var result = response.split('^')
                        console.log(result)

                        htmlQuery += '<div style="display:flex;flex-direction:column;padding-top:20px;width:100%;height:auto;background-color:black;">'
                        htmlQuery += '<div class="head-adddetail">EDIT DETAIL</div>'
                        htmlQuery += '<div style="display:flex;flex-direction:row">'
                        htmlQuery += '<div style="display:flex;flex-direction:column;width:45%;height:500px;padding:0 20;align-items:flex-end;font-size:15px;font-family:Orbitron,sans-serif;color:white">'
                        htmlQuery += '<span style="margin-bottom:10px">NAME</span>'
                        htmlQuery += '<span style="margin-bottom:10px">TYPE</span>'
                        htmlQuery += '<span style="margin-bottom:15px">PRICE</span>'
                        htmlQuery += '<span style="margin-bottom:10px">AMOUNT</span>'
                        htmlQuery += '<span style="margin-bottom:10px">DETAIL</span>'
                        htmlQuery += '<span style="margin-bottom:10px;margin-top:200px;">IMAGES</span>'
                        htmlQuery += '</div>'
                        htmlQuery += '<div style="display:flex;flex-direction:column;width:50%;height:500px;padding:0 20">'
                        htmlQuery += '<input type="hidden" style="width:25%;font-size:15px;font-family:Orbitron,sans-serif;margin-bottom:10px" type="text" id="productid" value="'+result[5]+'">'
                        htmlQuery += '<input style="width:25%;font-size:15px;font-family:Orbitron,sans-serif;margin-bottom:10px" type="text" id="nameupdate" placeholder="name" value="'+result[0]+'" require>'
                        htmlQuery += '<select style="width:25%;margin-bottom:10px" id="typeupdate">'
                        htmlQuery += '<option value="'+result[1]+'" disabled selected hidden>'+result[1]+'</option>'
                        htmlQuery += '<option value="ฟิล์มสี 135">ฟิล์มสี 135</option>'
                        htmlQuery += '<option value="ฟิล์มขาวดำ 135">ฟิล์มขาวดำ 135</option>'
                        htmlQuery += '<option value="ฟิล์มสี 120">ฟิล์มสี 120</option>'
                        htmlQuery += '<option value="ฟิล์มขาวดำ 120">ฟิล์มขาวดำ 120</option>'
                        htmlQuery += '</select>'
                        htmlQuery += '<input style="width:25%;font-size:15px;font-family:Orbitron,sans-serif;margin-bottom:10px" type="text" id="priceupdate" placeholder="price" value="'+result[2]+'" require>'
                        htmlQuery += '<input style="width:40%;font-size:15px;font-family:Orbitron,sans-serif;margin-bottom:10px" type="text" id="amountupdate" placeholder="ใส่จำนวนที่ต้องการเพิ่ม" require>'
                        htmlQuery += '<textarea cols="30" rows="10" style="margin-bottom:10px;font-family:Orbitron,sans-serif;" id="detailupdate" placeholder="detail" >'+result[3]+'</textarea>'
                        htmlQuery += '<input onchange="newimageupload()" type="file" name="image" id="imageupdate">'
                        htmlQuery += '<input value="'+result[4]+'" name="uploadimage" id="update" type="hidden">'
                        htmlQuery += '<div id="sure">'
                        htmlQuery += '<img src="./'+result[4]+'" style="width:200px;height:200px" id="pic'+4+'">'
                        htmlQuery += '</div>'
                        htmlQuery += '<div style="width:200px;height:200px;margin-top:20px" id="imagedate"></div>'
                        htmlQuery += '<div style="display:flex;flex-direction:row;width:100%">'
                        htmlQuery += '<div style="display:flex;flex-direction:row;justify-content:center;width:50%">'
                        htmlQuery += '<button onclick="deleteimg('+4+')" style="width:50%;margin-right:10px">Delete</button>'
                        htmlQuery += '<input  onclick="updatedetail();" type="submit" value="submit" style="width:20%;margin-right:5px">'
                        htmlQuery += '</div>'
                        // htmlQuery += '<div style="display:flex;flex-direction:row;justify-content:center;width:50%">'
                        // htmlQuery += '<input  onclick="updatedetail();" type="submit" value="submit" style="width:20%;margin-right:5px">'
                        // htmlQuery += '</div>'
                        htmlQuery += '</div>'
                        htmlQuery += '</div>'
                        htmlQuery += '</div>'

                    $('#edit').empty()
                    $('#edit').append(htmlQuery)
                }
                 
            })
            }
            function newimageupload(){
            var $getnewimage = '';
            var htmlQuery = ''; 
            $getnewimage = $('#imageupdate').prop('files')[0]
            console.log($getnewimage)
            var $newimage = new FormData();                  
            $newimage.append('file', $getnewimage);
            $('#sure').empty(null)
            $.ajax({
            url: 'getupdateimageproduct.php',
            type: 'post',
            data: $newimage,
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
                console.log(response)
                
                htmlQuery +='<img  src="'+response+'">'
                $('#update').val(response)
                $('#imagedate').empty()
                $('#imagedate').append(htmlQuery)
            }
            
        })
        }
            function deleteimg(index){
                if(confirm('ลบรูปภาพใช่หรือไม่')){
                    tempEdit = temp.split(',')[index]
                    temp = temp.replace(tempEdit+',','')
                    $('#pic'+index).css('display','none')
                }else{

                }
                
            }
            function updatedetail(){
                var $nameupdate = '';
                var $typeupdate = '';
                var $priceupdate = '';
                var $amountupdate = '';
                var $datailupdate = '';
                var $imageupdate = '';
                var $productid = '';

                $nameupdate = $('#nameupdate')[0].value;
                $typeupdate = $('#typeupdate')[0].value;
                $priceupdate = $('#priceupdate')[0].value;
                $amountupdate = $('#amountupdate')[0].value;
                $detailupdate = $('#detailupdate')[0].value;
                $imageupdate = $('#update')[0].value;
                $productid = $('#productid')[0].value;
                console.log($nameupdate)
                console.log($typeupdate)
                console.log($priceupdate)
                console.log($amountupdate)
                console.log($detailupdate)
                console.log($imageupdate)
                console.log($productid)
                alert("success")
                window.location.href = './adddetailproduct.php'
                    $.ajax({
                        url: 'updatedetail.php',
                        type: 'post',
                        data: {
                            nameupdate:$nameupdate,
                            typeupdate:$typeupdate,
                            priceupdate:$priceupdate,
                            amountupdate:$amountupdate,
                            detailupdate:$detailupdate,
                            imageupdate:$imageupdate,
                            productid:$productid
                        },
                        suscess:function(response){
                            // console.log(response)
                          
                        }
                    })
            }
    </script>
    <body style="background-color:black;">
    <div style="display:flex;flex-direction:column;width:100%">
    <div id="edit"></div>
    <!-- <div style="display:flex;flex-direction:row;width:auto;height:auto">
            <button>Delete</button>
            <input type="file">
    </div> -->
    <!-- <input  name="uploadimage" id="update"> -->
    </div>
    </body>
</html>