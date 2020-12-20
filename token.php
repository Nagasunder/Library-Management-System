<?php
//session_start();
include_once('connection.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
if(!isset($_POST['_token']) || ($_POST['_token']  !== $_SESSION['_token']))
{
	//echo "ok";
}
else{
die('Invalid CSRF token');
}
}
$_SESSION['_token']=bin2hex(openssl_random_pseudo_bytes(16));	
//die($_SESSION['_token']);
?>


