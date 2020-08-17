<?php
if(isset($_POST["username"])){
    include_once 'LocalConfig.php';
    session_start();
    $username = trim($_POST['username']);
    $sql = 'SELECT PersonId FROM People ORDER BY PersonId DESC';
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_row($result);
    $id = $row[0];

    $newid = $id + 1;
    $sql = "INSERT INTO People VALUES ('$newid', '$username');";
    mysqli_query($link, $sql);
    $family = $_POST["FamilyId"];
    $sql = "INSERT INTO FamilyPerson VALUES ('$family', '$username');";
    mysqli_query($link, $sql);
    mysqli_close($link);
    header('Location: ChooseUser.php'); 
}
?>

