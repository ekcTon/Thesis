<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thesis";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);mysqli_set_charset($conn, "utf8");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    // $servername = "127.0.0.1";
    // $username = "root";
    // $password = "root3004";

    // try {
    //     $conn = new PDO("mysql:host=$servername;dbname=register", $username, $password);
    //     // set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     echo "Connected successfully";
    //     }
    // catch(PDOException $e)
    //     {
    //     echo "Connection failed: " . $e->getMessage();
    //     }
?>