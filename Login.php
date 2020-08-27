<?php
$correct = "";
if(isset($_POST["username"]) && isset($_POST["password"])){
    //Server connection

    include'config.php';


    // Get inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Define sql statement
    $sql = "SELECT FamilyId FROM Families WHERE FamilyName = '$username' AND Pword = '$password'";

    //Retrieves the family who's login details were entered into the form
    $result = mysqli_query($link, $sql);
    $rows = mysqli_num_rows($result);
    if($rows > 0){
        $row = mysqli_fetch_row($result);
        session_start();
        $_SESSION["FamilyId"]  = $row[0];
        mysqli_close($link);
        header("location: MainPage.php");
    }
    else{
        mysqli_close($link);
        $correct = "Incorrect Family Name or Password";
    }  
}
?>

<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container" style="margin: auto; width: 50%;">
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">

                    <label><b>Family Name:</b></label><p></p>
                    <input type="text" placeholder="Enter username" name="username" required><p></p>

                    <label><b>Password:</b></label><p></p>
                    <input type="password" placeholder="Enter password" name="password" required><p></p>

                    <label><?php echo $correct; ?></label><p></p>
                    <button type="submit">Submit</button><p></p>
            </form>
            <button onclick="window.location.href='NewAccount.php'">Create Account</button>
        </div>
    </body>
</html>
