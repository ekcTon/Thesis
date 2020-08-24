<?php
session_start();
$sumtotalnav = $_POST['sumtotalnav'];

$_SESSION['sumtotalnav'] = $sumtotalnav;
// if(isset($_POST['sumtotalnav'])){
//     $_SESSION['sumtotalnav'] = $sumtotalnav;
//     echo "no"; 
// }else{
//     echo "no";
// }
?>