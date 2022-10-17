<?php 
session_start();
require_once 'head.php'
?>
<body>
<div id="login">
<?php require_once "navbar.php"?>
</div>
<div id='auth'>
<?php  if(isset($_SESSION['username'])){
  echo "Welcome {$_SESSION['username']}"; 
  echo "<script>
  document.getElementById('navbar').innerHTML = `<ul><li><a href='index.php'>Home</a></li><li><a href='#AboutUs'>About Us</a></li><li><a href='#whoweare'>Who We Are</a></li><li><a href=>Contact</a></li>
        <li><a href='admin.php'>login</a></li>
        <li><form method='post'>
        <input type='submit' id ='Logout'name='Logout' id='submit' value='Logout' action='admin.php'/>
        </form></li>
    </ul>`
  
  </script>";
  require "table.php";
  echo "<form  class= 'login' method='post'>
  <label for=''>Username</label>
    <input type='text' id='Postusername' name='Postusername'>
    <div id='usererror'></div>
    <label for=''>Password</label>
    <input type='password' id='Postpassword' name='Postassword'>
    <div id='passworderror'></div>
  <input id='submit' type='submit' name='SubmitPost' value='submit'>";
    }
    else{
      echo "
      <form  class= 'login' method='post'>
        <label for=''>Username</label>
          <input type='text' id='username' name='username'>
          <label for=''>Password</label>
          <input type='password' id='password' name='password'>
        <input id='submit' type='submit' name='Submit' value='submit'>
        </form>                                 
      ";
    }
?>
</div>
<?php
$file = fopen("users.txt","r");
$usernpasswordlist = array();
$userlist = array();
$passwordlist = array();
while (($row = fgetcsv($file, 0)) !== FALSE) {
  array_push($usernpasswordlist, $row);
};
$usernpasswordlist_length = count($usernpasswordlist);
for($i = 0; $i < $usernpasswordlist_length; $i++ ){
    $usernpassword = $usernpasswordlist[$i];
    array_push($userlist, $usernpassword[0]);
    array_push($passwordlist, $usernpassword[1]);
}
$shitattempt = FALSE;
$userlistlength = count($userlist);
$passwordlistlength = count($passwordlist);
$fail = "";
if(empty($_POST['username'])){
  $fail = "Please Enter Something for Username";
}
if(empty($_POST['password'])){
  $fail .= " Please Enter Something for Password";
}
else{
    $name= $_POST['username'];
    $pass = $_POST['password'];
    for ($x = 0; $x < $userlistlength; $x++){
        if($name == $userlist[$x] && $pass == $passwordlist[$x]){
          $_SESSION['username'] = $name;
          header("Refresh:0");
          break;
        }
        else {
          $shitattempt = TRUE;
        }
      }
      
    }
    fclose($file);  
while($shitattempt == TRUE){
    $attemptlog = fopen("accessattempt.txt","a");
  $failedattempt_date = date("l jS \of F Y h:i:s A");
  $failedattempt = array($name, $failedattempt_date);
  print_r($failedattempt);
  fputcsv($attemptlog, $failedattempt);
  $shitattempt = FALSE;
      fclose($attemptlog);
}
if(array_key_exists('Submit', $_POST)) {
  echo $fail;
}
   
if(array_key_exists('Logout', $_POST)) {
  unset($_SESSION['username']);
  header("Refresh:0"); 
}
if(array_key_exists('SubmitPost', $_POST)) {
  $valid = FALSE;
  if(empty($_POST['Postusername'])){
    echo "<script>document.getElementById('usererror').innerHTML = '<p>Please Enter UserName<p>'</script>";
  }
  if(empty($_POST['Postpassword'])){
    echo "<script>document.getElementById('passworderror').innerHTML = '<p>Please Enter Password<p>'</script>";
  }
  
  else {
    for($i = 0; $i < $userlistlength; $i++){
      if($userlist[$i] == $_POST['Postusername']){
        $tempusername = $_POST['Postusername'];
        echo "<script>document.getElementById('usererror').innerHTML = '<p>UserName Has Already Been Entered<p>'</script>";
        echo "<script>document.getElementById('Postusername').value = '${tempusername}'</script>";
        header("Refresh:0"); 
        $valid = FALSE;
      }
      else {
        $valid = TRUE;
      }
    }
    if($valid == TRUE){
      $addusername = $_POST['Postusername'];
      $addpassword = $_POST['Postpassword'];
      $userInfo = array();
      $userInfo = array($addusername, $addpassword);    
      $adduserlog = fopen("users.txt","a");
      fputcsv($adduserlog, $userInfo);   
      fclose($adduserlog);
      $userInfo = array(); 
    }
  }
  
}
    ?>


</body>
