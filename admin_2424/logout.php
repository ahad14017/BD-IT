<?php
session_start();
//destroy session
session_destroy();
//unset cookies
setcookie('admin_login', '', 0, "/");

include_once('index.php');
?>