<?php
session_start();
$con=mysqli_connect("localhost","root","","event");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/php/event/');
define('SITE_PATH','http://127.0.0.1/php/event/');

?>