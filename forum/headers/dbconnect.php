<?php
$server="localhost";
$user="root";
$pass="";
$db="codeme";
$conn=mysqli_connect($server,$user,$pass,$db);
if (!$conn) {
    die("Sorry we can't connect");
}
?>