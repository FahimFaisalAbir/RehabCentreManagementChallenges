<?php


// Create connection
$servername = "localhost";
$username = "id8013986_rehabroot";
$password = "9338948";
$dbname = "id8013986_rehab";


$conn=new mysqli($servername,$username,$password,$dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>