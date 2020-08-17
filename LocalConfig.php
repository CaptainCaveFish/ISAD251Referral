<?php
$user = 'root';
$password = 'root';
$db = 'sys';
$host = 'localhost';
$port = 3306;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $db,
   $port
);
if ($success == FALSE) {
    die('Could not reach server: '.mysqli_connect_error());
}
?>