<?php
require 'Connection.php';
echo $_GET["doctor"].$_GET["pid"].$_GET["medication"];
    $sql = "insert into rehab.serves VALUES
    ('" . $_GET["doctor"] . "','" . $_GET["pid"] . "','". $_GET["medication"] . "','" . '0' . "','". '0' ."')";

if ($conn->query($sql) === TRUE ) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>