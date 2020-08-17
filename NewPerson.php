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
<html>
    <head>
        <title>New Account</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container" style="margin: auto; width: 50%;">
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                    <label><b>Name:</b></label><p></p>
                    <input type="text" placeholder="Enter Name" name="name" required><p></p>
                    <button type="submit">Submit</button><p></p>
            </form>
            <button onclick="window.location.href='ChooseUser.php'">Back</button>
        </div>
    </body>
</html>

