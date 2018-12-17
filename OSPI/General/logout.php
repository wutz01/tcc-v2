<?php
session_start();
if(isset($_COOKIE["accountID"],$_COOKIE["accountType"])){
unset($_COOKIE['accountID']);
unset($_COOKIE['accountType']);
setcookie('accountID', "",time()-3600,"/");
setcookie('accountType', "", time()-3600,"/");
}
session_unset();
session_destroy(); // Destroying All Sessions
header("Location: ../index.php"); // Redirecting To Home Page
?>