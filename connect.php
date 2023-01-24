<?php

//เปิด error 
// error_reporting(E_ALL);

 //ปิด error
 //error_reporting(0);

//เชื่อมต่อ database
// $conn = new mysqli('localhost','root','','pos');
// $conn->set_charset('utf8');

//ประกาศเชื่อมต่อ error
// if ($conn->connect_errno) {
//     echo "Connect Error :".$conn->connect_errno;
//     exit();
// }

$host = "localhost";
$username = "root";
$password = ""; 
$name = "pos";

$con = mysqli_connect($host, $username, $password, $name)
or die("Error " . mysqli_error($con));


?>