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
         .container{
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
        }
        .wrapper{
            max-width:750px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
            }
    </style>
    <script>
          $(document).ready(function() {
            history()
            });

            function history(){
                var htmlQuery = '';
                $.ajax({
                url:'fetchreceiptmem.php',
                type:'post',
                data:{},
                success: function(response){
                  console.log(response)
                  if(response.indexOf('success') >= 0 ){
                    var result = response.split('success_')[1].split('0000000000')
                    console.log(result)
                    
                            htmlQuery +='<tr>'
                            htmlQuery +='<th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">No.</th>'
                            htmlQuery +='<th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Order number</th>'
                            htmlQuery +='<th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Date</th>'
                            htmlQuery +='<th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Tracking number</th>'
                            htmlQuery +='<th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Price</th>'
                            htmlQuery +='<th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Status</th>'
                            htmlQuery +='</tr>'
                    for(var i = 0 ; i < result.length - 1; i++){
                         var arorder = result[i].split('^')
                         console.log(arorder)
                        //  json = JSON.parse(arorder[2])
                        //  console.log(json)
                         htmlQuery +='<tr>'
                         htmlQuery +='<td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">'+i+'</td>'
                         htmlQuery +='<td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">'+arorder[1]+'</td>'
                         htmlQuery +='<td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">'+arorder[0]+'</td>'
                         htmlQuery +='<td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">'+arorder[1]+'</td>'
                         htmlQuery +='<td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">'+arorder[3]+'</td>'
                         htmlQuery +='<td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">'+arorder[9]+'</td>'
                         htmlQuery +='</tr>'
                    }
                    
                  }
                  $('#history').empty()
                  $('#history').append(htmlQuery)
                }
            })
            }
    </script>
    <body style="margin:0;background:#0c0d10;">
    <?php include('./navbar.php') ?>
        <div class="container">
            <div style="display:flex;flex-direction:row;justify-content:center;align-items:center;width:100%;height:50px;font-family:'Orbitron',sans-serif;font-weight:bold;font-size:30px;color:white;padding-top:30px;margin-bottom:20px">
                History
            </div>
            <div class="wrapper" style="display:flex;flex-direction:column;width:70%;padding:15px">
                <table style="width:100%" id="history">
                    <!-- <tr>
                        <th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Order number</th>
                        <th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Tracking number</th>
                        <th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Item list</th>
                        <th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Price</th>
                        <th style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Status</th>
                    </tr> -->
                    <!-- <tr>
                        <td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">date</td>
                        <td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">ordernum</td>
                        <td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">tracking</td>
                        <td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">list item</td>
                        <td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">price</td>
                    </tr> -->
                    <!-- <tr>
                        <td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Eve</td>
                        <td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Jackson</td>
                        <td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">94</td>
                        <td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">Jackson</td>
                        <td style="height:30px;color:white;font-family:Kanit,sans-serif;font-size:20px;text-align:center">94</td>
                    </tr> -->
                </table>
            </div>
        </div> 
        <div class="container">
            <?php include('./footer.php') ?>
        </div>
    </body>
</html>