<?php
    if(isset($_POST["username"]) && isset($_POST["password"])){

    //Server connection

    include_once'LocalConfig.php';


    // Get inputs
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    //Define sql statement
    $sql = 'SELECT FamilyId FROM Families ORDER BY FamilyId DESC';
    //Retrieves the family who's login details were entered into the form
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_row($result);
    
    
    $newid = $row[0] + 1;
    $sql = "INSERT INTO Families VALUES ('$newid', '$username', '$password');";
    $result = mysqli_query($link, $sql);
    mysqli_close($link);
    header('Location: Login.html');
    }
?>