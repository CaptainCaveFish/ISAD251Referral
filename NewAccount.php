<?php
    if(isset($_POST["username"]) && isset($_POST["password"])){

    //Server connection

    include_once'config.php';


    // Get inputs
    $username = trim($_POST['username']);
    $personname = trim($_POST['personname']);
    $password = trim($_POST['password']);

    //Define sql statement
    $sql1 = 'SELECT FamilyId FROM Families ORDER BY FamilyId DESC';
    //Retrieves the family who's login details were entered into the form
    $result1 = mysqli_query($link, $sql1);
    $row1 = mysqli_fetch_row($result1);
    $newfamid = $row1[0] + 1;
    
    $sql2 = 'SELECT PersonId FROM People ORDER BY PersonId DESC';
    //Retrieves the family who's login details were entered into the form
    $result2 = mysqli_query($link, $sql2);
    $row2 = mysqli_fetch_row($result2);
    $newmemberid = $row2[0] + 1;
    
    $sql3 = "INSERT INTO Families VALUES ('$newfamid', '$username', '$password');";
    mysqli_query($link, $sql3);
    $sql4 = "INSERT INTO People VALUES ('$newmemberid', '$personname');";
    mysqli_query($link, $sql4);
    $sql5 = "INSERT INTO FamilyPerson VALUES ('$newfamid', '$newmemberid');";
    mysqli_query($link, $sql5);
    mysqli_close($link);
    header('Location: Login.php');
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
                <label><b>Family Name:</b></label><p></p>
                <input type="text" placeholder="Enter Family Name" name="username" required><p></p>
                
                <label><b>Family Member Name:</b></label><p></p>
                <input type="text" placeholder="Enter Family Member Name" name="personname" required><p></p>
                
                <label><b>Password:</b></label><p></p>
                <input type="password" placeholder="Enter password" name="password" required><p></p>
                
                <button type="submit">Submit</button><p></p>
            </div>
        </form>
        <div style="margin: auto; width: 50%;">
            <button onclick="window.location.href='Login.php'">Back</button>
        </div>
    </body>
</html>
