<?php
include_once 'LocalConfig.php';
session_start();
$Uid = $_POST["Users"];
$sql = "SELECT Appointments.* 
            FROM Appointments
            RIGHT JOIN PersonAppointment ON PersonAppointment.AppointmentId = Appointments.AppointmentId
            WHERE PersonAppointment.PersonId = '$Uid'";
$result = mysqli_query($link,$sql);
$appointments = array();
$rows = mysqli_num_rows($result);
for($i = 0; $i < $rows; $i++){
    $row = mysqli_fetch_row($result);
    $appointments[$i] = array("Name" => $row[4],"Id" => $row[0],"Start" => $row[1],"End" => $row[2],"Date" => $row[3]);
}
$appointments[$i] = "End";
$outputA = json_encode($appointments);
$_SESSION["Appointnments"] = $outputA;

$sql = "SELECT DeadLines.* 
            FROM DeadLines
            RIGHT JOIN PersonDeadLine ON PersonDeadLine.DeadLineId = DeadLines.DeadLineId
            WHERE PersonDeadLine.PersonId = '$Uid'";
$result = mysqli_query($link,$sql);
$deadlines = array();
$rows = mysqli_num_rows($result);
for($i = 0; $i < $rows; $i++){
    $row = mysqli_fetch_row($result);
    $deadlines[$i] = array("Name" => $row[3],"Id" => $row[0],"End" => $row[1],"Date" => $row[2]);
}
$deadlines[$i] = "End";
$outputD = json_encode($deadlines);
$_SESSION["Deadlines"] = $outputD;

$_SESSION["Year"] = date("Y");
$_SESSION["Month"] = date("M");
header("location: MainPage.php");

?>

