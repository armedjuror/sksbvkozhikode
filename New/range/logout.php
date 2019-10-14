<?php
include 'setup\config.php';

$username=$_COOKIE["user"];
 $result=setcookie("user",$username, time() - (86400*7), '/');
if ($result==true) {
  header("Location: login-1.php");
}else {
  echo "Logging out failed";
}
?>
