<?php
if(isset($_POST["Name"],$_POST["Time"],$_POST["Day"],$_POST["Month"],$_POST["Year"])){
  
    include_once 'LocalConfig.php';
    
    $Name = $_POST['Name'];
    $User = $_POST["User"];
    
    $sql1 = 'SELECT AppointmentId FROM Appointments ORDER BY AppointmentId DESC';
    $result = mysqli_query($link, $sql1);
    $row = mysqli_fetch_row($result);
    $newid = $row[0] + 1;
    
    $Time = $_POST["Time"] . ":00";
    
    $day = $_POST["Day"];
    if($day < 10){
        $day =  "0" . strval($day);
    }
    else {
        $month = strval($month);
    }
    
    $month = $_POST["Month"];
    if($month < 10){
        $month =  "0" . strval($month);
    }
    else{
        $month = strval($month);
    }
    
    $year = strval($_POST["Year"]);
    
    $Date = $year . "-" . $month . "-" . $day;
    $sql2 = "INSERT INTO DeadLines VALUES ('$newid','$Time','$Date','$Name');";
    mysqli_query($link, $sql2);
    $sql3= "INSERT INTO PersonDeadLine
    VALUES ('$User','$newid');";
    mysqli_query($link, $sql3);
    header('Location: MainPage.php');
}
?>
