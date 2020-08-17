<?php
session_start();
$month = $_SESSION["Month"];
$year  = $_SESSION["Year"];
if($year == date("Y")){
    if($month > 1){
        $month -= 1;
    }
}
else{
    if($month > 1){
        $month -= 1;
    }
    
    else{
        $month = 12;
        $year -= 1;
    }
}
$_SESSION["Month"] = $month;
$_SESSION["Year"] = $year;
header("location: MainPage.php");
?>