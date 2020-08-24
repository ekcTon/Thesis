<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css"> <!--bulma-->
        <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">  <!--googleFont-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> <!--google calendar-->
        <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    </head>
    <style>
        ::-webkit-input-placeholder { /* Edge */
        padding-left:10px;
        }

        :-ms-input-placeholder { /* Internet Explorer */
        padding-left:10px;
        }

        ::placeholder {
        padding-left:10px;
        }
        .container {
        max-width: 1000px;
        margin: 0 auto;
        padding-left: 15px;
        padding-right: 15px;
        }

        .login{
            width:20%;
            height:40px;
            margin: 10 0 20 0;
            background: black;
            border-style:none;
            color: white;
            font-size:15px;
            font-family:'Orbitron',sans-serif;
            border-radius:4px;
        }
        .login:hover{
            background-color: grey;
        }
    </style>
    <script>
        function check_username(){
            $.ajax({
            url: 'check_user.php',
            type: 'post',
            data: { username:$('#username_regis').val()},
            success: function(response){
                if(response){
                  console.log(response)
                  
                }
            }
        })
        }

        function check_email(){
            $.ajax({
            url: 'database.php',
            type: 'post',
            data: { email:"email"},
            success: function(response){
                if(response){
                  
                }
            }
        })
        }
    </script>
    <body style="margin:0;display:flex;width:100%;height:100%;background:black;">
            <div class="container" style="display:flex;width:100%;height:100%;">
                <div style="display:flex;flex-direction:row;width:100%;height:100%;background:black;">
                    <div style="display:flex;flex-direction:column;width:50%;background:black;">
                            <div style="display:flex;justify-content: center;font-size:40px;font-family:'Orbitron',sans-serif;font-weight:bold;margin:100 0 40 0;color:white;">LOGIN</div>
                            
                            <form action="login.php" method="post" name="login" style="display:flex;flex-direction:column;align-items:center;">
                                <input style="width:71%;height:40px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:'Orbitron',sans-serif;" type="text" id="username" name="username" placeholder="username" require>
                                <input style="width:71%;height:40px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:'Orbitron',sans-serif;" type="password" id="email" name="password" placeholder="password" require>
                                <button class="login" type="submit" name="submit" style="background-color:white;color:black">Login</button>
                            </form>
                    </div>

                    <div style="display:flex;flex-direction:column;width:50%;background:black;align-items:center;">
                            <div style="display:flex;justify-content: center;font-size:40px;font-family:'Orbitron',sans-serif;font-weight:bold;margin:100 0 40 0;color:white;">REGISTER</div>
                            <form name="registration" action="regis.php" target="iframe_target" method="post" style="display:flex;flex-direction:column;justify-content:center;align-items:center;width:100%"require>
                                <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                                <input onchange="check_username()" style="width:71%;height:40px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:'Orbitron',sans-serif;" type="text" id="username_regis" name="username" placeholder="username" require>
                                <input onchange="check_email()" style="width:71%;height:40px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:'Orbitron',sans-serif;" type="text" name="email" placeholder="email" require>
                                <input style="width:71%;height:40px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:'Orbitron',sans-serif;" type="password" name="password" placeholder="password" require>
<!-- 
                                <input style="width:71%;height:40px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:'Orbitron',sans-serif;" type="text" name="firstname" placeholder="firstname" require>
                                <input style="width:71%;height:40px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:'Orbitron',sans-serif;" type="text" name="lastname" placeholder="lastname" require>
                                <input style="width:71%;height:40px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:'Orbitron',sans-serif;" type="text" name="tel" placeholder="tel" require>
                                <textarea style="width:71%;height:100px;margin: 0 0 20 0;border-style:solid;font-size:15px;font-family:'Orbitron',sans-serif;" type="text" name="address" placeholder="address" require></textarea> -->
                                <!-- <button style="width:20%;height:40px;margin: 10 0 20 0;background: black;border-style:none;color: white;font-size:15px;font-family:'Orbitron',sans-serif;color:white" class="button is-black" type="submit" name="submit" value="Register" >Sign up</button> -->
                                <button class="login" type="submit" name="submit" style="background-color:white;color:black" onclick="window.alert('ลงทะเบียนเสร็จสิ้น');window.location.reload()">Sign up</button>
                            </form> 
                    </div>
                </div>
            </div>
    </body>
</html>