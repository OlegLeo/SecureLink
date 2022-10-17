<?php

//TURNS OFF LIVE TRANSMISSION
include('../db/conn.php');
$sql = "UPDATE camera SET activity=1 WHERE id=1";

//COMMAND RESPONSIBLE FOR KILLING THE PYTHON.EXE THAT IS RUNNING WIHTOU INTERFACE
$a = shell_exec('taskkill/IM Python.exe >nul /F');



if ($conn->query($sql) === TRUE){
    header('Location:../index.php?p=livestream');
} else 
    echo 'ERROR!';


$conn->close();