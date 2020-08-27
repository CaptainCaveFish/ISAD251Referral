<?php
if(isset($_POST["name"])){
    include_once 'config.php';
    session_start();
    $username = $_POST['name'];
    $sql1 = 'SELECT PersonId FROM People ORDER BY PersonId DESC';
    $result = mysqli_query($link, $sql1);
    $row = mysqli_fetch_row($result);
    $id = $row[0];

    $newid = $id + 1;
    $sql2 = "INSERT INTO People VALUES ('$newid', '$username');";
    mysqli_query($link, $sql2);
    $family = $_POST["FamilyId"];
    $family += 0;
    $sql3 = "INSERT INTO FamilyPerson VALUES ($family, $newid);";
    $result2 = mysqli_query($link, $sql3);
    mysqli_close($link);
    header("location: MainPage.php");
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
            <button onclick="window.location.href='MainPage.php'">Back</button>
        </div>
    </body>
</html>

