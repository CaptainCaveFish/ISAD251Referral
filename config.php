<?php
    $serverName = 'socem1.uopnet.plymouth.ac.uk';
    $dataBase = 'ISAD251_DLaskey';
    $userId = 'DLaskey';
    $passWord = 'ISAD251_22217069';
    $conn = mysqli_init();
    mysqli_real_connect($conn,$serverName,$userId,$passWord,$dataBase);
    if (mysqli_connect_errno($conn)) {
        die('Could not reach server: '.mysqli_connect_error());
    }
?>