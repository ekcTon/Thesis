<?php session_start(); ?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/detailproductStyle.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!--w3-->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!--bulma-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"> <!--bulma-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> <!--google calendar-->
        <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet"> <!--google font-->
    </head>
    <style>
    </style>
    <script>
    var length = '';
         $(document).ready(function() {
            fetchorderproduct()
        });
        function fetchorderproduct(){
            var json = '';
            var htmlQuery = '';
            $.ajax({
            url: 'fetchorderproduct.php',
            type: 'post',
            data: {},
            success: function(response){
                if(response.indexOf('success') >= 0 ){
                //   console.log(response)
                  var result = response.split('success_')[1].split('0000000000')
                //   console.log(result)

                            htmlQuery +='<tr style="width:100%;height:30px;background-color:#101010;">'
                            // htmlQuery +='<th style="width:5%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">No.</th>'
                            htmlQuery +='<th style="width:9%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Order no.</th>'
                            htmlQuery +='<th style="width:10%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Date</th>'
                            htmlQuery +='<th style="width:20%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Order list</th>'
                            htmlQuery +='<th style="width:10%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Address</th>'
                            htmlQuery +='<th style="width:10%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Total price</th>'
                            htmlQuery +='<th style="width:18%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Slip Transfer</th>'
                            htmlQuery +='<th style="width:20%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">EMS Track</th>'
                            htmlQuery +='<th style="width:9%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Status</th>'
                            htmlQuery +='<th style="width:9%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Delivery</th>'
                            htmlQuery +='<th style="width:9%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center"></th>'
                            htmlQuery +='</tr>'
                            length = result.length -1
                    for(var i = 0 ; i < result.length - 1 ; i++){
                        var list = result[i].split('^')
                        console.log(list)
                        console.log(list[1])
                        // json = JSON.parse(list[1])
                        // console.log(json)
                        // json = list[1].toString()
                        

                        // var number = list[0].split('ORDER NUMBER :')
                        // console.log(number[1])
                        var status = list[5].split('PAYMENT STATUS :')
                        // console.log(address)
                        // var address = list[7].split('name :')
                            htmlQuery +='<tr>'
                            htmlQuery +='<td style="height:30px;color:white;font-size:15px;text-align:center;padding:10px;background-color:#101010" id="orderno">'+list[0]+'</td>'
                            htmlQuery +='<td style="height:30px;color:white;font-size:15px;text-align:center;padding:10px;background-color:#181818" id="date">'+list[4]+'</td>'
                            htmlQuery +='<td style="height:30px;color:white;font-size:15px;padding:10px;background-color:#101010">'+list[1]+'</td>'
                            htmlQuery +='<td style="height:30px;color:white;font-size:15px;padding:10px;background-color:#181818">'+list[7]+'</td>'
                            htmlQuery +='<td style="text-align:center;height:30px;color:white;font-size:15px;padding:10px;background-color:#101010" id="sum">'+list[2]+'</td>'
                            htmlQuery +='<td style="text-align:center;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;padding:10px;background-color:#181818"><img src="../'+list[3]+'" style="width:150px;height:150px"></td>'
                            htmlQuery +='<td style="text-align:center;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;padding:10px;background-color:#101010">'+list[10]+'</td>'
                            htmlQuery +='<td style="text-align:center;height:30px;color:white;font-family:Kanit,sans-serif;font-size:15px;padding:10px;background-color:#181818">payment' 
                            htmlQuery +='<select style="font-size:15px" id="spaid'+list[0]+'"><option value="'+list[5]+'" disabled selected hidden>'+status[1]+'</option> <option value="PAYMENT STATUS : paid">paid</option> <option value="PAYMENT STATUS : unpaid">unpaid</option> </select> work' 
                            htmlQuery +='<select style="font-size:15px" id="swork'+list[0]+'"><option value="'+list[6]+'" disabled selected hidden>'+list[6]+'</option> <option value="Accept">Accept</option> <option value="Decline">Decline</option></select></td>'
                            htmlQuery +='<td style="text-align:center;height:30px;color:white;font-size:15px;padding:10px;background-color:#101010">EMS : '+list[11]+'<br>Extra : '+list[12]+'</td>'
                            htmlQuery +='<td style="text-align:center;height:30px;color:white;font-size:15px;padding:10px;background-color:#181818"><button onclick="updatestatus(`'+list[0]+'`)" style="margin-top:10px;font-size:15px">submit</button></td>'
                            htmlQuery +='</tr>'

                    }
                }
                $('#content').empty()
                $('#content').append(htmlQuery)
            }
        })
        }
        function updatestatus(id){
            var pay = '';
            var work = '';
            var orderno = '';
            pay = $('#spaid'+id+'')[0].value;
            work = $('#swork'+id+'')[0].value;
            orderno = id;
            console.log(pay)
            console.log(work)
            console.log(orderno)
            if(confirm("ยืนยันสถานะเสร็จสิ้น")){
                        $.ajax({
                    url: 'updateorderstatus.php',
                    type: 'post',
                    data: {
                            spay:pay,
                            swork:work,
                            ordernumber:orderno,
                            },
                    success: function(response){
                        console.log(response)
                    }
                })
            } 
        }
    </script>
    <body>
    <div style="display:flex;flex-direction:row;width:100%;height:auto;background-color:black">
            <div style="width:20%">
                <?php include('menubar.php') ?>
            </div>
            <div style="display:flex;flex-direction:column;width:80%">
                <div style="display:flex;flex-direction:column;padding-top:20px;width:100%;height:auto;background-color:black;">
                    <div class="head-adddetail">ORDER</div>
                    <table style="width:100%;height:auto;" id="content">
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>