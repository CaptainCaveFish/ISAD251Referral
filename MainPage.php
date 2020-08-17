<?php
include_once 'LocalConfig.php';
session_start();
$Uid = $_POST["Users"];
$sql1 = "SELECT Appointments.* 
            FROM Appointments
            RIGHT JOIN PersonAppointment ON PersonAppointment.AppointmentId = Appointments.AppointmentId
            WHERE PersonAppointment.PersonId = '$Uid'";
$result1 = mysqli_query($link,$sql);
$appointments = array();
$rows = mysqli_num_rows($result);
for($i = 0; $i < $rows; $i++){
    $row = mysqli_fetch_row($result);
    $appointments[$i] = array("Name" => $row[4],"Id" => $row[0],"Start" => $row[1],"End" => $row[2],"Date" => $row[3]);
}
$appointments[$i] = "End";
$outputA = json_encode($appointments);


$sql2 = "SELECT DeadLines.* 
            FROM DeadLines
            RIGHT JOIN PersonDeadLine ON PersonDeadLine.DeadLineId = DeadLines.DeadLineId
            WHERE PersonDeadLine.PersonId = '$Uid'";
$result = mysqli_query($link,$sql);
$deadlines = array();
$rows = mysqli_num_rows($result);
for($i = 0; $i < $rows; $i++){
    $row = mysqli_fetch_row($result);
    $deadlines[$i] = array("Name" => $row[3],"Id" => $row[0],"End" => $row[1],"Date" => $row[2]);
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
                        <select id="aDay" name="Day">
                        </select>
                        <select id="aMonth" name="Month">
                            <option value="1">January</option>
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
                        <select id="dDay" name="Day">
                        </select>
                        <select id="dMonth" name="Month">
                            <option value="1">January</option>
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
                        <input type="text" placeholder="Year" name="Year" required><p></p>
                        <button type="submit">Submit</button><p></p>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            var outputA = '<?php echo $outputA; ?>';
            var outputD = '<?php echo $outputD; ?>';
            var month = '<?php echo $month; ?>';
            var year = '<?php echo $year; ?>';
            var appointments = JSON.parse(outputA);
            var deadlines = JSON.parse(outputD);
            display();
            
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
            
            function display(){
                showmonth = document.getElementById("showmonth");
                showmonth.innerHTML = month;
                maxday = 0;
                m = getMonth();
                if(m === 9 || m === 4 || month === 6 || month === 11){
                    maxDay = 30;
                }
                else if(m === 2){
                    maxDay = 28;
                }
                else{
                    maxDay = 31;
                }
                
                var aDaySelect = document.getElementById("aDay");
                var dDaySelect = document.getElementById("dDay");
                
                for(var day = 1; day <= maxDay; day++){
                    var aDayLine = document.createElement("OPTION");
                    aDayLine.value = day;
                    aDayLine.innerHTML = day;
                    aDaySelect.appendChild(aDayLine);
                    var dDayLine = document.createElement("OPTION");
                    dDayLine.value = day;
                    dDayLine.innerHTML = day;
                    dDaySelect.appendChild(dDayLine);
                    var box = document.getElementById(day);
                    box.innerHTML = "";
                    var line = document.createElement("P");
                    box.appendChild(line);
                    for(i in appointments){
                        a = appointments[i];
                        if(a !== "End"){
                            if(a.Date === year + "-" + 0 + m + "-" + day){
                                var line = document.createElement("P");
                                line.innerHTML = a.Name + " " + a.Start + " " + a.End;
                                box.appendChild(line);
                                box.appendChild(document.createElement("P"));
                            }
                        }
                    }
                    var box = document.getElementById(day);
                    var line = document.createElement("P");
                    box.appendChild(line);
                    for(i in deadlines){
                        d = deadlines[i];
                        if(d !== "End"){
                            if(d.Date === year + "-" + 0 + m + "-" + day){
                                var line = document.createElement("P");
                                line.innerHTML = d.Name + " " + " " + d.End;
                                box.appendChild(line);
                                box.appendChild(document.createElement("BR"));
                            }
                        }
                    }
                }
            }
                
            function nextMonth(){
                var m = getMonth();
                m += 1;
                if(m > 12){
                    m = 1
                    year += 1;
                }
                setMonth(m);
                display();
            }
                
            function prevMonth(){
                var m = getMonth();
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
