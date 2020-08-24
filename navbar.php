<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> <!--google calendar-->
        <link href="https://fonts.googleapis.com/css?family=Oxanium&display=swap" rel="stylesheet"> <!--google font-->
        <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" data-auto-replace-svg="nest"></script> <!--font awsome-->
    </head>
    <style>
        .container1 {
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
        }
        .brand {
            position: absolute;
            padding-left: 20px;
            float: left;
            line-height: 70px;
            text-transform: uppercase;
            font-size: 1.4em;
        }
        .brand a, .brand a:visited {
            color: #fff;
            text-decoration: none;
        }
        nav {
            float: right;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            float: left;
            position: relative;
        }
        nav ul li a, nav ul li a:visited {
            display: block;
            padding: 0 20px;
            line-height: 50px;
            background: #262626;
            color: #fff;
            text-decoration: none;
        }
        nav ul li a:hover, nav ul li a:visited:hover {
            background: #2581dc;
            color: #fff;
        }
        nav ul li a:not(:only-child):after, nav ul li a:visited:not(:only-child):after {
            padding-left: 4px;
            content: ' ▾';
        }
        nav ul li ul li {
            min-width: 190px;
        }
        nav ul li ul li a {
            padding: 15px;
            line-height: 20px;
        }
        .nav-dropdown {
            position: absolute;
            display: none;
            z-index: 1;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
        }
        .nav-mobile {
            display: none;
            position: absolute;
            top: 0;
            right: 0;
            background: #262626;
            height: 70px;
            width: 70px;
        }
    @media only screen and (max-width: 798px) {
        .nav-mobile {
            display: block;
        }
        nav {
            width: 100%;
            padding: 70px 0 15px;
        }
        nav ul {
            display: none;
        }
        nav ul li {
            float: none;
        }
        nav ul li a {
            padding: 15px;
            line-height: 20px;
        }
        nav ul li ul li a {
            padding-left: 30px;
        }
        .nav-dropdown {
            position: static;
        }
    }
    @media screen and (min-width: 799px) {
        .nav-list {
            display: block !important;
        }
    }
        #nav-toggle {
            position: absolute;
            left: 18px;
            top: 22px;
            cursor: pointer;
            padding: 10px 35px 16px 0px;
        }
        #nav-toggle span, #nav-toggle span:before, #nav-toggle span:after {
            cursor: pointer;
            border-radius: 1px;
            height: 5px;
            width: 35px;
            background: #fff;
            position: absolute;
            display: block;
            content: '';
            transition: all 300ms ease-in-out;
        }
        #nav-toggle span:before {
            top: -10px;
        }
        #nav-toggle span:after {
            bottom: -10px;
        }
        #nav-toggle.active span {
            background-color: transparent;
        }
        #nav-toggle.active span:before, #nav-toggle.active span:after {
            top: 0;
        }
        #nav-toggle.active span:before {
            transform: rotate(45deg);
        }
        #nav-toggle.active span:after {
            transform: rotate(-45deg);
        }
    </style>
    <script>
        (function($) { // Begin jQuery
            $(function() { // DOM ready
                // If a link has a dropdown, add sub menu toggle.
                $('nav ul li a:not(:only-child)').click(function(e) {
                $(this).siblings('.nav-dropdown').toggle();
                // Close one dropdown when selecting another
                $('.nav-dropdown').not($(this).siblings()).hide();
                e.stopPropagation();
                });
                // Clicking away from dropdown will remove the dropdown class
                $('html').click(function() {
                $('.nav-dropdown').hide();
                });
                // Toggle open and close nav styles on click
                $('#nav-toggle').click(function() {
                $('nav ul').slideToggle();
                });
                // Hamburger to X toggle
                $('#nav-toggle').on('click', function() {
                this.classList.toggle('active');
                });
            }); // end DOM ready
            })(jQuery); // end jQuery   
    </script>

    <body style="margin:0px;background-color:#6d6e71">
        <div class="container1" style="background-color:#0c0d10;display:felx;flex-direction:column;height:150px;width:100%">
            <!-- <div id="totalnav" style="display:flex;flex-direction:row;width:100%;height:100px">

            </div> -->
            <div style="display:flex;flex-direction:row;width:100%;height:100px">
                <img style="height:100px;width:400;margin-top:3px;" src="./img/logo.png">
                <div style="width:580px;display:flex;flex-direction:row;color:white;align-items:center;margin-left:590px;background-color:#0c0d10;font-family: 'Oxanium'">
                    <!-- <a href="./cart.php" style="color:white;text-decoration: none;"><i class="fas fa-shopping-basket" style="padding-right:10px;padding-bottom:5px;"></i><i id="totalnav"></i> &nbsp; bath</a> -->
                    <a href="./cart.php" style="color:white;text-decoration: none;"><i class="fas fa-shopping-basket" style="padding-right:10px;padding-bottom:5px;"></i>  <?php echo $_SESSION['sumtotal']; ?>&nbsp; bath</a>
                </div>
            </div>
            <div style="display:flex;flex-direction:row">
                    <nav>
                        <div class="nav-mobile"><a id="nav-toggle" href="#!">
                            <span></span></a>
                        </div>
                        <ul class="nav-list">
                            <li><a href="index.php" style="font-family: 'Oxanium';background-color:#0c0d10">Home</a></li>
                            <li><a href="./gallery.php" style="font-family: 'Oxanium';background-color:#0c0d10">Gallery</a></li>
                            <li><a href="#!" style="font-family: 'Oxanium';background-color:#0c0d10">Product</a>
                                <ul class="nav-dropdown">
                                    <li><a href="./productflim.php" style="font-family: 'Oxanium';background-color:#0c0d10">Film</a></li>
                                    <li><a href="./productservice.php" style="font-family: 'Oxanium';background-color:#0c0d10">Service</a></li>
                                </ul>
                            </li>
                            <!-- <li><a href="./payment.php" style="font-family: 'Oxanium';background-color:#0c0d10">Payment</a></li>
                            <li><a href="#!" style="font-family: 'Oxanium';background-color:#0c0d10">Check</a></li> -->
                           
                            <?php
                                if($_SESSION['username']){
                                    ?>
                                     <!-- <li><a href="./payment.php" style="font-family: 'Oxanium';background-color:#0c0d10">Payment</a></li> -->
                                     <li><a href="checkstatusreceipt.php" style="font-family: 'Oxanium';background-color:#0c0d10">Check status</a></li>
                                     <li><a href="ems.php" style="font-family: 'Oxanium';background-color:#0c0d10">EMS tracking</a></li>
                                     <li><a href="historymem.php" style="font-family: 'Oxanium';background-color:#0c0d10">History</a></li>
                                     <!-- <li><a href="history.php" style="font-family: 'Oxanium';background-color:#0c0d10">History</a></li> -->
                                     <li><a href="logout.php" style="font-family: 'Oxanium';background-color:#0c0d10;margin-left:360px">Log out</a></li>
                                    
                                    <?php
                                }else{
                                    ?>
                                    <!-- <a href="RegisLoginform.php" style="font-family:'Orbitron',sans-serif;font-size: 15px;">Log/Sign up</a> -->
                                    <li><a href="RegisLoginform.php" style="font-family: 'Oxanium';background-color:#0c0d10;margin-left:650px">Login/Sign up</a></li>
                                    <?php                        }
                            ?>
                        </ul>
                    </nav>
            </div>
            <!-- <div style="height:50px;width:100%">
                <img src="./img/line-xanap.png" alt="" style="object-fit:contain;height:50px;"> 
            </div> -->
        </div>
    </body>
</html>