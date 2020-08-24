<?php session_start(); ?>
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
                            htmlQuery +='<th style="width:9%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Order no.</th>'
                            htmlQuery +='<th style="width:10%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Order list</th>'
                            htmlQuery +='<th style="width:10%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Pay status</th>'
                            htmlQuery +='<th style="width:10%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Working status</th>'
                            htmlQuery +='<th style="width:10%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Process</th>'
                            htmlQuery +='<th style="width:10%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Note</th>'
                            htmlQuery +='<th style="width:10%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">EMS tracking</th>'
                            htmlQuery +='</tr>'
                            length = result.length -1
                    for(var i = 0 ; i < result.length - 1 ; i++){
                        var list = result[i].split('^')
                        console.log(list)
                        console.log(list[1])
                        
                        // var number = list[0].split('ORDER NUMBER :')
                        // console.log(number[1])
                        var status = list[5].split('PAYMENT STATUS : ')
                        console.log(status)
                        // var address = list[7].split('name :')
                            htmlQuery +='<tr>'
                            htmlQuery +='<td style="width:9%;height:30px;color:white;font-size:15px;text-align:center;padding:10px;background-color:#101010">'+list[0]+'</td>'
                            htmlQuery +='<td style="width:10%;height:30px;color:white;font-size:15px;padding:10px;background-color:#181818" id="trackingno">'+list[1]+'</td>'
                            htmlQuery +='<td style="width:10%;height:30px;color:white;font-size:15px;text-align:center;padding:10px;background-color:#181818" id="paymentstatus">'+status+'</td>'
                           
                            htmlQuery +='<td style="text-align:center;width:10%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:15px;padding:10px;background-color:#101010">Work &nbsp;&nbsp;' 
                            htmlQuery +='<select style="font-size:15px" id="workstatus'+list[0]+'"> <option value="'+list[8]+'" disabled selected hidden>'+list[8]+'</option> <option value="ขั้นที่ 1 รับฟิล์มเรียบร้อย">ขั้นที่ 1 รับฟิล์มเรียบร้อย</option> <option value="ขั้นที่ 2 เช็ครายละเอียดการทำงาน">ขั้นที่ 2 เช็ครายละเอียดการทำงาน</option> <option value="ขั้นที่ 3 นำฟิล์มเข้าสู่กระบวนการ">ขั้นที่ 3 นำฟิล์มเข้าสู่กระบวนการ</option> <option value="ขั้นที่ 4 เช็คความถูกต้อง">ขั้นที่ 4 เช็คความถูกต้อง</option> <option value="ขั้นที่ 5 เตรียมนำส่ง">ขั้นที่ 5 เตรียมนำส่ง</option> </select></td>' 
                            
                            htmlQuery +='<td style="text-align:center;width:10%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:15px;padding:10px;background-color:#181818">Process&nbsp;&nbsp;' 
                            htmlQuery +='<select style="font-size:15px;" id="process'+list[0]+'"> <option value="'+list[9]+'" disabled selected hidden>'+list[9]+'</option> <option value="finish">finish</option> <option value="unfinished">unfinished</option> </select></td>' 
                            
                            htmlQuery +='<td style="text-align:center;width:10%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:15px;padding:10px;background-color:#101010"><textarea id="note'+list[0]+'" style="color:black;font-size:15px;font-family:Kanit,sans-serif;margin-top:17px" value="'+list[13]+'" cols="30" rows="5" name="detail" placeholder="detail"></textarea></td>'
                            htmlQuery +='<td style="text-align:center;width:10%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:15px;padding:10px;background-color:#101010"><input style="color:black;font-size:15px;font-family:Kanit,sans-serif" placeholder="กรอกเลขพัสดุ" id="emstrack'+list[0]+'" value="'+list[10]+'"><button onclick="tracking(`'+list[0]+'`)" style="margin-top:10px;font-size:15px">submit</button></td>'
                            htmlQuery +='</tr>'

                    }
                }
                $('#content').empty()
                $('#content').append(htmlQuery)
            }
        })
        }
        function tracking(id){
            var work = '';
            var process = '';
            var orderid = '';
            var emstrack = '';
            var note = '';
            work = $('#workstatus'+id+'')[0].value;
            process = $('#process'+id+'')[0].value;
            emstrack = $('#emstrack'+id+'')[0].value;
            note = $('#note'+id+'')[0].value;
            orderid = id;
            console.log(work);
            console.log(process);
            console.log(orderid);
            console.log(emstrack);
            console.log(note);
            if(confirm('ยืนยันสถานะ')){
                    $.ajax({
                    url: 'updatetracking.php',
                    type: 'post',
                    data: {
                                Torder:orderid,
                                Twork:work,
                                Tprocess:process,
                                Ttrack:emstrack,
                                Tnote:note
                            },
                    success: function(response){
                        console.log(response)
                    }
                })
            }
                
        }

    </script>
    <div style="display:flex;flex-direction:row;width:100%;height:auto;background-color:black">
        <div style="width:20%">
            <?php include('menubar.php') ?>
        </div>
        <div style="display:flex;flex-direction:column;width:80%">
            <div style="display:flex;flex-direction:column;padding-top:20px;width:100%;height:auto;background-color:black;">
                <div class="head-adddetail">WORKING &nbsp; STATUS</div>
                    <table style="width:100%;height:auto;" id="content">
                    </table>
            </div>        
        </div>
    </div>
</html>