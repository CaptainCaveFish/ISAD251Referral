<?php 
    include_once 'LocalConfig.php';
    session_start();
    $familyId = $_SESSION["FamilyId"];
    $sql = "SELECT People.* 
            FROM People
            RIGHT JOIN FamilyPerson ON FamilyPerson.PersonId = People.PersonId
            WHERE FamilyPerson.FamilyId = '$familyId'";
    $result = mysqli_query($link,$sql);
    $users = array();
    $rows = mysqli_num_rows($result);
    for($i = 0; $i < $rows; $i++){
        $row = mysqli_fetch_row($result);
        $users[$i] = json_encode(array("Name" => $row[1],"Id" => $row[0]));
    }
    $users[$i] = "End";
    $output = json_encode($users);
?>

<html>
    <head>
        <title>Choose User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form method="post" action="MainPage.php">
            <div class="container" style="margin: auto; width: 50%;">
                <p>Select Family Member</p>
                <div id='list'></div>
                <p></p>
                <button type="submit">Submit</button><p></p>
            </div>
        </form>
        <button onclick="location.href = 'NewPerson.html'">Add Family Member</button>
            <script type="text/javascript">
            var users = <?php echo $output; ?>;
            for(i in users){
                u = users[i];
                if(u != "End"){
                    user = JSON.parse(u);
                    var radio = document.createElement("INPUT");
                    radio.type = "radio";
                    radio.name = "Users";
                    radio.value = user.Id;
                    radio.id = user.Id;
                    var label = document.createElement("LABEL");
                    label.for = user.Id;
                    label.innerHTML = user.Name;
                    list.appendChild(radio);
                    list.appendChild(label);
                    list.appendChild(document.createElement("B"));
                }
            }
        </script>
    </body>
</html>