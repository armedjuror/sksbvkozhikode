<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
    echo "You're currently logged out. <a href=http://www.sksbvkozhikode.org>Go to site</a> and login again to continue.";
    exit();
}
$session_id=$_SESSION['user_id'];

?>
