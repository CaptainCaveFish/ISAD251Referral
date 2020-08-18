<?php
include_once 'LocalConfig.php';
session_start();

$Fid = $_SESSION["FamilyId"];
$sql1 = "SELECT People.* 
            FROM People
            RIGHT JOIN FamilyPerson ON FamilyPerson.PersonId = People.PersonId
            WHERE FamilyPerson.FamilyId = '$Fid'";
$result1 = mysqli_query($link,$sql1);
$users = array();
$rows1 = mysqli_num_rows($result1);
for($i = 0; $i < $rows1; $i++){
    $row = mysqli_fetch_row($result1);
    $users[$i] = array("Name" => $row[1],"Id" => $row[0]);
}
$users[$i] = "End";
$outputU = json_encode($users);

if(isset($_POST["Users"])){
    $Uid = $_POST["Users"];
}
else{
    $Uid = $users[0]["Id"];
}

$sql2 = "SELECT Appointments.* 
            FROM Appointments
            RIGHT JOIN PersonAppointment ON PersonAppointment.AppointmentId = Appointments.AppointmentId
            WHERE PersonAppointment.PersonId = '$Uid'";
$result2 = mysqli_query($link,$sql2);
$appointments = array();
$rows2 = mysqli_num_rows($result2);
for($i = 0; $i < $rows2; $i++){
    $row = mysqli_fetch_row($result2);
    $appointments[$i] = array("Name" => $row[1],"Id" => $row[0],"Start" => $row[2],"End" => $row[3],"Date" => $row[4]);
}
$appointments[$i] = "End";
$outputA = json_encode($appointments);


$sql3 = "SELECT DeadLines.* 
            FROM DeadLines
            RIGHT JOIN PersonDeadLine ON PersonDeadLine.DeadLineId = DeadLines.DeadLineId
            WHERE PersonDeadLine.PersonId = '$Uid'";
$result3 = mysqli_query($link,$sql3);
$deadlines = array();
$rows3 = mysqli_num_rows($result3);
for($i = 0; $i < $rows3; $i++){
    $row = mysqli_fetch_row($result3);
    $deadlines[$i] = array("Name" => $row[1],"Id" => $row[0],"End" => $row[2],"Date" => $row[3]);
}
$deadlines[$i] = "End";
$outputD = json_encode($deadlines);


$year = date("Y");
$month = date("M");
?>

<html>
    <head>
        <title>Calender</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="ISAD251CSS.css">
    </head>
    <body>
        <form method="post" action="MainPage.php">
            <input type="hidden" value="<?php echo $Fid; ?>">
            <p>Select Family Member</p>
            <div id='list'></div>
            <p></p>
            <button type="submit">Select</button><p></p>
        </form>
        <button onclick="location.href = 'NewPerson.php'">Add Family Member</button> 
        <div class="row">
                <div id="1" class="box"></div>
                <div id="2" class="box"></div>
                <div id="3" class="box"></div>
                <div id="4" class="box"></div>
                <div id="5" class="box"></div>
                <div id="6" class="box"></div>
                <div id="7" class="box"></div>
                <div id="8" class="box"></div>
                <div id="9" class="box"></div>
                <div id="10" class="box"></div>
                <div id="11" class="box"></div>
                <div id="12" class="box"></div>
                <div id="13" class="box"></div>
                <div id="14" class="box"></div>
                <div id="15" class="box"></div>
                <div id="16" class="box"></div>
                <div id="17" class="box"></div>
                <div id="18" class="box"></div>
                <div id="19" class="box"></div>
                <div id="20" class="box"></div>
                <div id="21" class="box"></div>
                <div id="22" class="box"></div>
                <div id="23" class="box"></div>
                <div id="24" class="box"></div>
                <div id="25" class="box"></div>
                <div id="26" class="box"></div>
                <div id="27" class="box"></div>
                <div id="28" class="box"></div>
                <div id="29" class="box"></div>
                <div id="30" class="box"></div>
                <div id="31" class="box"></div>
                <div id="32" class="box"></div>
                <div id="33" class="box"></div>
                <div id="34" class="box"></div>
                <div id="35" class="box"></div>
            </div>
        </div>
        <div>
            <button onclick="prevMonth()">Previous Month</button>
            <div id="showmonth"></div>
            <button onclick="nextMonth()">Next Month</button>
            <p></p>
            <button onclick="window.location.href='ChooseUser.php'">Change Family Member</button>
        </div>
        <div class="sidebyside">
            <div class="side">
                <form action="NewAppointment.php" method="post">
                    <div class="container" style="margin: auto; width: 50%;">
                        <input type="hidden" name="User" value="<?php echo $Uid; ?>">
                        <p>New Appointment:</p>
                        <label><b>Name:</b></label><p></p>
                        <input type="text" placeholder="Name" name="Name" required><p></p>

                        <label><b>Start time:</b></label><p></p>
                        <input type="text" placeholder="00:00" name="StartTime" required><p></p>

                        <label><b>End time:</b></label><p></p>
                        <input type="text" placeholder="00:00" name="EndTime" required><p></p>

                        <label><b>Date:</b></label><p></p>
                        
                        <select id="aMonth" name="Month" onchange="populateA()">
                            <option value="1" selected="selected">January</option>
                            <option value="2">Feburary</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select id="aDay" name="Day">
                        </select>
                        <input type="text" placeholder="Year" name="Year" required><p></p>
                        <button type="submit">Submit</button><p></p>
                    </div>
                </form>
            </div>
            <div class="side">
                <form action="NewDeadline.php" method="post">
                    <div class="container" style="margin: auto; width: 50%;">
                        <input type="hidden" name="User" value="<?php echo $Uid; ?>">
                        <p>New Deadline:</p>
                        <label><b>Name:</b></label><p></p>
                        <input type="text" placeholder="Name" name="Name" required><p></p>

                        <label><b>Time:</b></label><p></p>
                        <input type="text" placeholder="00:00" name="Time" required><p></p>

                        <label><b>Date:</b></label><p></p>
                        
                        <select id="dMonth" name="Month" onchange="populateD()">
                            <option value="1" selected="selected">January</option>
                            <option value="2">Feburary</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select id="dDay" name="Day">
                        </select>
                        <input type="text" placeholder="Year" name="Year" required><p></p>
                        <button type="submit">Submit</button><p></p>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            var outputA = '<?php echo $outputA; ?>';
            var outputD = '<?php echo $outputD; ?>';
            var outputU = '<?php echo $outputU; ?>';
            var month = '<?php echo $month; ?>';
            var year = '<?php echo $year; ?>';
            var currentUser = '<?php echo $Uid; ?>';
            var appointments = JSON.parse(outputA);
            var deadlines = JSON.parse(outputD);
            var users = JSON.parse(outputU);
            var m = getMonth();
            display();
            populateA();
            populateD();
            populateU();
            
            function getMonth(){
                if(month === "Jan"){
                    return 1;
                }
                else if(month === "Feb"){
                    return 2;
                }
                else if(month === "Mar"){
                    return 3;
                }
                else if(month === "Apr"){
                    return 4;
                }
                else if(month === "May"){
                    return 5;
                }
                else if(month === "Jun"){
                    return 6;
                }
                else if(month === "Jul"){
                    return 7;
                }
                else if(month === "Aug"){
                    return 8;
                }
                else if(month === "Sep"){
                    return 9;
                }
                else if(month === "Oct"){
                    return 10;
                }
                else if(month === "Nov"){
                    return 11;
                }
                else if(month === "Dec"){
                    return 12;
                }
            }
            
            function setMonth(input){
                if(input === 1){
                    month = "Jan";
                }
                else if(input === 2){
                    month = "Feb";
                }
                else if(input === 3){
                    month = "Mar";
                }
                else if(input === 4){
                    month = "Apr";
                }
                else if(input === 5){
                    month = "May";
                }
                else if(input === 6){
                    month = "Jun";
                }
                else if(input === 7){
                    month = "Jul";
                }
                else if(input === 8){
                    month = "Aug";
                }
                else if(input === 9){
                    month = "Sep";
                }
                else if(input === 10){
                    month = "Oct";
                }
                else if(input === 11){
                    month = "Nov";
                }
                else if(input === 12){
                    month = "Dec";
                }
            }
            
            function populateA(){
                var days;
                var a = document.getElementById("aMonth");
                var monthId = a.options[a.selectedIndex].value;
                if(monthId === 9 || monthId === 4 || monthId === 6 || monthId === 11){
                    days = 30;
                }
                else if(monthId === 2){
                    days = 28;
                }
                else{
                    days = 31;
                }
                
                var aDaySelect = document.getElementById("aDay");
                aDaySelect.innerHTML = "";
                for(var day = 1; day <= days; day++){
                    var aDayLine = document.createElement("OPTION");
                    aDayLine.value = day;
                    aDayLine.innerHTML = day;
                    aDaySelect.appendChild(aDayLine);
                }
            }
            
            function populateD(){
                var days;
                var d = document.getElementById("dMonth");
                var monthId = d.options[d.selectedIndex].value;
                if(monthId === 9 || monthId === 4 || monthId === 6 || monthId === 11){
                    days = 30;
                }
                else if(monthId === 2){
                    days = 28;
                }
                else{
                    days = 31;
                }
                
                var dDaySelect = document.getElementById("dDay");
                dDaySelect.innerHTML = "";
                for(var day = 1; day <= days; day++){
                    var dDayLine = document.createElement("OPTION");
                    dDayLine.value = day;
                    dDayLine.innerHTML = day;
                    dDaySelect.appendChild(dDayLine);
                }
            }
            
            function populateU(){
                var list = document.getElementById("list");
                for(i in users){
                    u = users[i];
                    if(u !== "End"){
                        var radio = document.createElement("INPUT");
                        radio.type = "radio";
                        radio.name = "Users";
                        radio.id = u.Id;
                        radio.value = u.Id;
                        if(i === currentUser){
                            radio.checked = true;
                        }
                        var label = document.createElement("LABEL");
                        label.for = u.Id;
                        label.innerHTML = u.Name;
                        list.appendChild(radio);
                        list.appendChild(label);
                        list.appendChild(document.createElement("B"));
                    }
                }
            }
            
            function display(){
                var showmonth = document.getElementById("showmonth");
                showmonth.innerHTML = month;
                maxday = 0;
                if(m === 9 || m === 4 || m === 6 || m === 11){
                    maxDay = 30;
                }
                else if(m === 2){
                    maxDay = 28;
                }
                else{
                    maxDay = 31;
                }
                
                for(var day = 1; day <= maxDay; day++){
                    var box = document.getElementById(day);
                    box.innerHTML = "";
                    var line = document.createElement("P");
                    box.appendChild(line);
                    if(day < 10){
                                s = "0" + String(day);
                            }
                            else{
                                s = String(day);
                            }
                    for(i in appointments){
                        a = appointments[i];
                        if(a !== "End"){
                            if(a.Date === year + "-" + 0 + m + "-" + s){
                                var line = document.createElement("P");
                                line.innerHTML = a.Name + " " + a.Start + " " + a.End;
                                box.appendChild(line);
                            }
                        }
                    }
                    box.appendChild(line);
                    for(i in deadlines){
                        d = deadlines[i];
                        if(d !== "End"){
                            if(d.Date === year + "-" + 0 + m + "-" + s){
                                var line = document.createElement("P");
                                line.innerHTML = d.Name + " " + " " + d.End;
                                box.appendChild(line);
                            }
                        }
                    }
                }
            }
                
            function nextMonth(){
                m = getMonth();
                m += 1;
                if(m > 12){
                    m = 1;
                    year += 1;
                }
                setMonth(m);
                display();
            }
                
            function prevMonth(){
                var today = new Date();
                if(year !== today.getFullYear()){
                    m -= 1;
                    if(m < 1){
                        m = 12;
                        year -= 1;
                    }
                }
                else{
                    if(m > 1){
                        m -= 1;
                    }
                }
                setMonth(m);
                display();
            }
        </script>
    </body>
</html>
