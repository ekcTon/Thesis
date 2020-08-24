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
    <style>
        .container {
        max-width: 1000px;
        margin: 0 auto;
        }
    </style>
    <script>
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img style="width:200px;height:200px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallery-photo-add').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });
        function imageupload(){
            var $getimage = '';
            var htmlQuery = ''; 
            $getimage = $('#getimage').prop('files')[0]
            // console.log($getimage)
            var $form_data = new FormData();                  
            $form_data.append('file', $getimage);
            $.ajax({
            url: 'getimagegallery.php',
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
        <div style="display:flex;flex-direction:row;width:100%">
            <div style="width:20%">
                <?php include('menubar.php') ?>
            </div>
            <div style="display:flex;flex-direction:column;width:80%">
                <div style="display:flex;flex-direction:column;padding-top:20px;width:100%;height:1100px;background-color:black;">
                    <div class="head-adddetail">ADDGALLERY</div> 
                    <div style="display:flex;flex-direction:row">
                        <div class="gallery"></div>
                    </div>    
                    <div style="display:flex;flex-direction:row;">
                        <div style="display:flex;flex-direction:column;width:45%;height:500px;padding:0 20;align-items:flex-end;font-size:15px;font-family:'Orbitron',sans-serif;color:white">
                            <span style="margin-bottom:10px">NAME ALBUM</span>
                            <span style="margin-bottom:10px;">IMAGES</span>
                        </div>
                        
                        <form runat="server" action="insertGallery.php" target="iframe_target" method="post" enctype="multipart/form-data" style="display:flex;flex-direction:column;width:50%;height:500px;padding:0 20">
                                <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                                <!-- <input style="width:25%;font-size:15px;font-family:'Orbitron',sans-serif;margin-bottom:10px" type="text" name="name_gallery" placeholder="name" require>
                                <input type="file" name="imgfile[]" multiple="multiple" multiple id="gallery-photo-add">
                                <input type="submit" value="Upload" name="submit" onclick="window.location.reload();"> -->

                                <input style="width:25%;font-size:15px;font-family:'Orbitron',sans-serif;margin-bottom:10px" type="text" name="name_gallery" placeholder="name" require>
                                <input onchange="imageupload()" type="file" name="imgfile[]" multiple="multiple" multiple id="gallery-photo-add">
                                <div style="width:200px;height:200px;margin-top:20px" id="imageupload"></div>
                                
                                <input type='hidden' name="uploadimage" id="upload">
                                <input style="width:45%" type="submit" value="Upload" name="submit" onclick="window.location.reload();">
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

       
    </body>
</html>