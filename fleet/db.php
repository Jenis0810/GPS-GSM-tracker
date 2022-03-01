<?php
session_start();
//to connect to the database
// localhost - it's my local computer so if you're on your local computer you use localhost, if you're on the server you use the server name
// root - your username
// your password
// database - the name of your database
$conn = mysqli_connect("localhost","root","","fleet");

$key = ''; // key for open cell id
$key2 = ''; // key for unwired location
?>
