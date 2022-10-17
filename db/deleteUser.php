<?php

session_start();
//IF USER IF IS AUTHENTICATED OR NOT
if(empty($_SESSION['username'])) {
    header('Location:../index.php?p=home');
    exit();
}

//READ USERNAME
$user = $_SESSION['username'];

include('conn.php');

$sql = "DELETE FROM utilizador WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
    header('Location:../index.php?p=logout&r=deleteok');
} else {
    header('Location:../index.php?p=404');
}

$conn->close();
?>