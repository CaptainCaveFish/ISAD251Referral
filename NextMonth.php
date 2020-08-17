<?php
session_start();
$month = $_SESSION["Month"];
$year = $_SESSION["Year"];
if($month == 12){
    $month = 1;
    $year += 1;
}
else{
    $month += 1;
}
$_SESSION["Month"] = $month;
$_SESSION["Year"] = $year;
header("location: MainPage.php");
?>
