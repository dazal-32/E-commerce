<?php
require('connection.php');
require('function2.php');
unset($_SESSION['USER_LOGIN']);
unset($_SESSION['VERIFY']);
unset($_SESSION['USER_ID']);
session_destroy();
header('location:index.php');
?>