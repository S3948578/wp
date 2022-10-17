<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <ul >
        <li><a href="index.php">Home</a></li>
        <li><a href="#AboutUs">About Us</a></li>
        <li><a href="#whoweare">Who We Are</a></li>
        <li><a href="">Contact</a></li>
    </ul></header>
    <main id="form">
        <form method="POST" id="info">
            <label for="">Patient ID</label>
            <div>
            <input name="patientid" onkeyup="changeuppercase()" onchange="retrievedata()" id="id"type="text" required>
            <div id="patientid"></div>    
        </div>
            <label for="">Date</label>
            <div>
            <div id="date"></div>
            <div id="dateerror"></div>
            </div>
            <label for="">Time</label>
            <div>
                <div id="timeslot" onchange="checkbox()">
                    <input class="cb" name="9am-12pm" value="value1" id="morning" type="checkbox">
                    <label for="morning"  id="morninglabel">9am-12pm</label>
                    <input class="cb" name="12pm-3pm" value="value2" id="noon" type="checkbox">
                    <label for="noon"  id="noonlabel">12pm-3pm</label>
                    <input class="cb" name="3pm-6pm" value="value3" id="afternoon" type="checkbox">
                    <label for="afternoon"  id="afternoonlabel">3pm-6pm</label>
                </div>
                <div id="timeerror"></div>
            </div>
            <label for="">Reasons</label>
            <div>
                <select onchange="changereason()" name="reasons" id="reason" required>
                    <option value="0">Please/Select</option>
                    <option value="ChildHood Vaccination Slot">ChildHood Vaccination Slot</option>
                    <option value="Influenza Shot">Influenza Shot</option>
                    <option value="Covid Booster Shot">Covid Booster Shot</option>
                    <option value="Blood Test">Blood Test</option>
                </select>
                <div id="advice"></div>
                <div id="reasonerror"></div>
            </div>
            <div></div>
            <input formnovalidate type="submit" name="Submit" id="">
        </form>
        <div id="msg"></div>
    </main>
    <script>
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        var now = yyyy + '-' + mm + '-' + dd;
        document.getElementById("date").innerHTML = "<input name='date' id='dateinfo' type='date' min='" + now + "'required>"
        function retrievedata() {
            var errormsg = "";
            var passno = 0;
            var number = document.getElementById("id").value;
            var numberlist= number.split('')
            var firstname = numberlist[0] + numberlist[1];
            if((/[a-zA-Z]/).test(firstname) == true){
                passno +=1;
            }
            else {
                errormsg += " The first two number must be a letter"
            }
            var userno = parseInt(numberlist[2]);
            for(let i = 3   ; i< numberlist.length -1; i++){
                userno = userno + parseInt(numberlist[i])
            }
            if(isNaN(userno) == true){
                errormsg += " please be a number"
            }
            else{
                passno+=1
            }
            var letterno = userno % 26
            var alphabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
            var letter = alphabet[letterno-1]
            if(numberlist[numberlist.length-1] == letter){
                passno+=1
            }
            else {
                errormsg += " the id calculation didn't add up"
            }
            if(passno == 3){
                document.getElementById("patientid").innerHTML = "<p>You have been pass</p>";
            }
            else {
                document.getElementById("patientid").innerHTML = "<p>" + errormsg +"</p>";
            }


        }
        function error(error_reason , id){
            var info = document.getElementById(id);
            document.getElementById(id).innerHTML = info + "<p>" + error_reason + "<p>";
        }
        function changereason() {
            var reasonno = document.getElementById("reason").value
            console.log(reasonno)
            var reason = ""
            if(reasonno == "ChildHood Vaccination Slot") {
                reason = " A disclaimer that multiple vaccines are normally administered in combination and may cause the child to be sluggish or feverous for 24 – 48 hours afterwards."      
            }
            if(reasonno == "Influenza Shot" ) {
                reason = "The best time to get vaccinated is in April and May each year for optimal protection over the winter months.  "
            }
            if(reasonno == "Covid Booster Shot" ){
                reason = "Advice that everyone should arrange to have their third shot as soon as possible and adults over the age of 30 should have their fourth shot to protect against new variant strains.  "
            }
            if(reasonno == "Blood Test") {
                reason = "That some tests require some fasting ahead of time and that a staff member will advise them on this prior to the appointment"
            }
            document.getElementById("advice").innerHTML = "<p>" + reason + "</p>"
        }
        function checkbox() {
        const cb1 = document.querySelector("#morning")
        const cb2 = document.querySelector("#noon");
        const cb3 = document.querySelector("#afternoon");
        console.log(cb1)
        if(cb1.checked == false){
            document.getElementById("morninglabel").style.color = "#00aaffcb";
        }
        if(cb1.checked == true) {
            document.getElementById("morninglabel").style.color = "black";
        }
        if(cb2.checked == false){
            document.getElementById("noonlabel").style.color = "#00aaffcb";
        }
        if(cb2.checked == true) {
            document.getElementById("noonlabel").style.color = "black";
        }
        if(cb3.checked == false){
            document.getElementById("afternoonlabel").style.color = "#00aaffcb";
        }
        if(cb3.checked == true) {
            document.getElementById("afternoonlabel").style.color = "black";
        }
        }
        function changeuppercase() {
            var letter = document.getElementById("id").value
            console.log(letter)
            var uppercase = letter.toUpperCase();
            console.log(uppercase)
            document.getElementById("id").value = uppercase
        }
    </script>   
    <?php  
    if(isset($_POST['Submit'])){
        $errorscount = 0;
        $patientid = "";
        $date ="";
        $alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $reasons = "";
        if(empty($_POST['patientid'])){
            $errorscount = $errorscount + 1;
            echo "<script>document.getElementById('patientid').innerHTML = '<p>Patient ID wasnt filled in<p>'</script>";
        }
        else {
            $temppatientid = $_POST['patientid'];
            echo "<script>document.getElementById('id').value = '${temppatientid}'</script>";
            $patientid_split = str_split($_POST['patientid']);
            $firstname = $patientid_split[0].$patientid_split[1];
            if(ctype_alpha($firstname)){
                $userno = $patientid_split[2];
                $usercount = count($patientid_split);
                for($i = 3; $i < $usercount - 1 ; $i++){
                    if(is_numeric($patientid_split[$i])){
                    $userno = $userno  + $patientid_split[$i];
                    }
                }
                if(is_numeric($userno)){
                    $letterno = $userno % 26;
                    $letter = $alphabet[$letterno - 1];
                    if($patientid_split[$usercount - 1] === $letter) {
                        $patientid = $_POST['patientid'];
                    }
                    else {
                        $errorscount = $errorscount + 1;
                        echo "<script>document.getElementById('patientid').innerHTML = '<p>Patient ID isn't correct<p>'</script>";
                    }
                }
                else {
                    $errorscount = $errorscount + 1;
                    echo "<script>document.getElementById('patientid').innerHTML = '<p>It doesn't add up<p>'</script>";
                }
            }
            else {
                $errorscount = $errorscount + 1;
                echo "<script>document.getElementById('patientid').innerHTML = '<p>The first two Character must be a letter<p>'</script>";
            }
        }
        if(empty($_POST['date'])){
            $errorscount = $errorscount + 1;
            echo "<script>document.getElementById('dateerror').innerHTML = '<p>Please Select Your Date<p>'</script>";
        }
        else{
            $date = $_POST['date'];
            echo "<script>document.getElementById('dateinfo').value = '${date}'</script>";
        }
        if(empty($_POST['reasons'])){
            $errorscount = $errorscount + 1;
            echo "<script>document.getElementById('reasonerror').innerHTML = '<p>Please Select Your Reason<p>'</script>";
        }
        else{
            $reasons = $_POST['reasons'];
        }
        $finaltime = "";
        if(isset($_POST["9am-12pm"])){
            $finaltime .= "9am-12pm ";
            echo "<script>document.getElementById('morning').checked = true;</script>";
            echo "<script>document.getElementById('morninglabel').style.color = 'black'</script>";
        }
        if(isset($_POST["12pm-3pm"])){
            $finaltime .= "12pm-9am ";
            echo "<script>document.getElementById('noon').checked = true;</script>";
            echo "<script>document.getElementById('noonlabel').style.color = 'black'</script>";
        }
        if(isset($_POST["3pm-6pm"])){
            $finaltime .= "3-6pm ";
            echo "<script>document.getElementById('afternoon').checked = true;</script>";
            echo "<script>document.getElementById('afternoonlabel').style.color = 'black'</script>";
        }
        if($finaltime == ""){
            $errorscount = $errorscount + 1;
            echo "<script>document.getElementById('timeerror').innerHTML = '<p>Please Select Your Time<p>'</script>";
        }
        if($errorscount == 0){
            $appoinmentInfo = array();
            $appoinmentInfo = array($patientid, $date, $finaltime,$reasons);    
            $appointmentlog = fopen("appointment.txt","a");
            fputcsv($appointmentlog, $appoinmentInfo);   
            fclose($appointmentlog);
            $appoinmentInfo = array(); 
            echo "<h1>Thank you for booking with us, the office will be in touch soon</h1>";
            echo "<a href='index.php'>Click Here to Go Home</a>";

        }
        else {
        }
    }
        
    ?>
</body>
</html>