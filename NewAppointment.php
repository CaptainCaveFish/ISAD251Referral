<?php
if(isset($_POST["Name"],$_POST["StartTime"],$_POST["EndTime"],$_POST["Day"],$_POST["Month"],$_POST["Year"])){
  
    include_once 'LocalConfig.php';
    
    $Name = trim($_POST['Name']);
    $User = $_POST["User"];
    $sql = 'SELECT AppointmentId FROM Appointments ORDER BY AppointmentId DESC';
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_row($result);
    $id = $row[0];

    $newid = $id + 1;
    $StartTime = $_POST["StartTime"] . ":00";
    $EndTime = $_POST["EndTime"] . ":00";
    
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
    $sql = "INSERT INTO Appointments VALUES ('$newid','$StartTime','$EndTime','$Date','$Name');";
    mysqli_query($link, $sql);
    $sql = "INSERT INTO PersonAppointment
    VALUES ('$User','$newid');";
    mysqli_query($link, $sql);
    header('Location: MainPage.php');
}
?>
