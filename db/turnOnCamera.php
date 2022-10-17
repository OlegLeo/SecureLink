<?php

//TURNS ON LIVE TRANSMISSION
include('../db/conn.php');

$sql = "UPDATE camera SET activity=2 WHERE id=1";


$a = shell_exec('python D:\XAMPP\htdocs\streaming\receiver.py');

if ($conn->query($sql) === TRUE){
    header('Location:../index.php?p=livestream');
} else 
    echo 'ERROR!';


$conn->close();



?>
