<?php 
include_once 'LocalConfig.php';
    $familyId = $_SESSION["familyid"];
    $sql = "SELECT * 
            FROM FamilyPerson
            LEFT JOIN People ON FamilyPerson.PersonId = People.PersonId
            WHERE FamilyPerson.FamilyId = '$familyId'";
    $statement = mysqli_prepare($link, $sql);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement,$Fid,$Pida,$Pidb,$Pname);
    $rows = mysqli_stmt_num_rows($statement);
    $output = array();
    for($i = 0; $i < $rows; $i++){
        $row = mysqli_stmt_data_seek($statement, $i);
        mysqli_stmt_fetch($statement);
        $output[] = array($Pname,$Pida);
    }
    var_dump($output);
?>