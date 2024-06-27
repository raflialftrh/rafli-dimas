<?php
$server="localhost";
$user="root";
$pwd="";
$db="tokoonline-tia";

$conn=new mysqli($server,$user,$pwd, $db);

if($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
} else {
echo"Connected successfully";
}
?>