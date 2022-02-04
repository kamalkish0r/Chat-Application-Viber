<?php
session_start();
require 'connectdb.php';
// $qry = "UPDATE users SET login='0' WHERE email_id='$email'";
// $result = mysqli_query($link, $qry);
$email=$_SESSION['email'];
$qry = "UPDATE users SET login='0' WHERE email_id='$email'";
$result = mysqli_query($link, $qry);
session_unset();
session_destroy();
header('location: login.php');
exit;