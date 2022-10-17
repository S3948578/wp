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
print_r($userlist);
print_r($passwordlist);
?>
