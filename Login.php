<?php
if(isset($_POST["username"]) && isset($_POST["password"])){
    //Server connection

    include'LocalConfig.php';


    // Get inputs
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    //Define sql statement
    $sql = "SELECT * FROM Families WHERE FamilyName = '$username' AND Password = '$password'";

    //Retrieves the family who's login details were entered into the form
    $result = mysqli_query($link, $sql);
    $rows = mysqli_num_rows($result);

    if($rows > 0){
        $row = mysqli_fetch_row($result);
        session_start();
        $_SESSION["FamilyId"]  = $row[0];
        mysqli_close($link);
        header("location: ChooseUser.php");
        $correct = TRUE;
    }
    else{
        mysqli_close($link);
        header("location: FailedLogin.html");
    }  
}
?>
