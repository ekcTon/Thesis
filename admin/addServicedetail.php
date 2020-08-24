<?php
session_start();
?>
<html>
<script>
   
</script>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/detailproductStyle.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!--w3-->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!--bulma-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"> <!--bulma-->
    </head>
    <body>
        <div style="display:flex;flex-direction:row;width:100%;height:auto;background-color:black">
            <div style="width:20%">
                <?php include('menubar.php') ?>
            </div>
            <div style="display:flex;flex-direction:column;width:80%;">
                <div style="display:flex;flex-direction:column;padding-top:20px;width:100%;height:auto;background-color:black;">
                    <div class="head-adddetail">ADD &nbsp; SERVICE</div>
                    <div style="display:flex;flex-direction:row">

                        <div style="display:flex;flex-direction:column;width:45%;height:auto;padding:0 20;align-items:flex-end;font-size:15px;font-family:'Orbitron',sans-serif;color:white">
                            <span style="margin-bottom:17px">FORMAT</span>
                            <span style="margin-bottom:17px">RATIO</span>
                            <span style="margin-bottom:17px">Type</span>
                            <span style="margin-bottom:17px">Price</span>
                        </div>

                        <form action="insertservice.php" method="post" target="iframe_target" enctype="multipart/form-data" style="display:flex;flex-direction:column;width:50%;height:auto;padding:0 20">
                        <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                            <!-- <input style="width:25%;font-size:15px;font-family:'Orbitron',sans-serif;margin-bottom:10px" type="text" name="format" placeholder="format" require> -->
                            <select style="width:25%;margin-bottom:10px" name="format">
                                <option value="135M">135M</option>
                                <option value="135L">135L</option>
                                <option value="120">120</option>
                            </select>
                            <input style="width:25%;font-size:15px;font-family:'Orbitron',sans-serif;margin-bottom:10px" type="text" name="ratio" placeholder="ratio" require>

                           
                            <select style="width:25%;margin-bottom:10px" name="service">
                                <option value="Dev&ScanC">Dev&Scan Color</option>
                                <option value="Dev&ScanBW">Dev&Scan Black&white</option>
                                <option value="scan">scan</option>
                                <option value="dev">dev</option>
                            </select>
                            <input style="width:25%;font-size:15px;font-family:'Orbitron',sans-serif;margin-bottom:10px" type="text" name="price" placeholder="price" require>
                   

                            
                            
                         
                                <!-- <input onchange="imageuploadservice()" type="file" name="image" id="getimageservice">
                                <input type='hidden' name="uploadimage" id="uploadservice">
                                <div style="width:200px;height:200px;margin-top:20px" id="imageuploadservice"></div> -->
                                <!-- <input type="submit" value="Upload" name="submit"> -->
                            <!-- </div> -->
                            
                            <div style="display:flex;flex-direction:row;justify-content:flex-star;">
                                <input onclick="window.location.reload()" type="submit" value="submit" name="submit" style="width:20%;margin-right:5px">
                            </div>

                        </form>
                    </div>
                </div>
        </div>
    </body>
</html>