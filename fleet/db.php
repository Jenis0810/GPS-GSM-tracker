<?php
session_start();
//to connect to the database
// localhost - it's my local computer so if you're on your local computer you use localhost, if you're on the server you use the server name
// root - your username
// your password
// database - the name of your database
$conn = mysqli_connect("localhost","root","","fleet");

$key = 'pk.ecd5c6f2f5c268bd1b1808932d378acd'; // key for open cell id
$key2 = 'pk.368534939ef98c792b81a1a9247b005d'; // key for unwired location
?>