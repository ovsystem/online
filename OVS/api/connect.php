<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "usertb";
$connect = mysqli_connect($host, $user,$password,$database) or die("connection failed");

if ($connect){
    echo "Connected!";
}
else{
    echo "Not connected";
}
?>