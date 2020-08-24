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
                fetchuser()
            });
            function fetchuser(){
                var htmlQuery = '';
                $.ajax({
                    url: 'fetchuser.php',
                    type: 'post',
                    data: {},
                    success: function(response){
                        console.log(response)
                        if(response.indexOf('success') >= 0 ){
                            var result = response.split('success_')[1].split('0000000000')
                            console.log(result)

                            htmlQuery +='<tr>'
                            htmlQuery +='<th style="width:9%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">No.</th>'
                            htmlQuery +='<th style="width:9%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Userid</th>'
                            htmlQuery +='<th style="width:9%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Username</th>'
                            htmlQuery +='<th style="width:9%;height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Email</th>'
                            htmlQuery +='</tr>'
                            for(var i = 0 ; i < result.length - 1 ; i++){
                                var user = result[i].split('^')
                                console.log(user)
                                htmlQuery +='<tr>'
                                htmlQuery +='<td style="width:9%;height:30px;color:white;font-size:15px;text-align:center;padding:10px;background-color:#101010">'+i+'</td>'
                                htmlQuery +='<td style="width:9%;height:30px;color:white;font-size:15px;text-align:center;padding:10px;background-color:#181818">'+user[0]+'</td>'
                                htmlQuery +='<td style="width:9%;height:30px;color:white;font-size:15px;text-align:center;padding:10px;background-color:#101010">'+user[1]+'</td>'
                                htmlQuery +='<td style="width:9%;height:30px;color:white;font-size:15px;text-align:center;padding:10px;background-color:#181818">'+user[2]+'</td>'
                                htmlQuery +='</tr>'
                            }
                        }
                        $('#content').empty()
                        $('#content').append(htmlQuery)
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
                    <div class="head-adddetail">USER &nbsp; LIST</div>
                    <table style="width:100%;margin-top:15px" id="content"></table>
                </div>
            </div>
        </div>
    </body>
</html>