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
<html>
    <head>
        <title>New Account</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="<?php echo $_SERVER["PHP_SELF"] ;?>" method="post">
            <div class="container" style="margin: auto; width: 50%;">
                <label><b>Username:</b></label><p></p>
                <input type="text" placeholder="Enter username" name="username" required><p></p>
                
                <label><b>Password:</b></label><p></p>
                <input type="password" placeholder="Enter password" name="password" required><p></p>
                
                <button type="submit">Submit</button><p></p>
            </div>
        </form>
        <div style="margin: auto; width: 50%;">
            <button onclick="window.location.href='Login.html'">Back</button>
        </div>
    </body>
</html>
