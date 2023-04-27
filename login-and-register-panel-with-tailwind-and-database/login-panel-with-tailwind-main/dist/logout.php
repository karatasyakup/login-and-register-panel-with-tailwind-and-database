<?php
require 'connect.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: login.php");
?>
