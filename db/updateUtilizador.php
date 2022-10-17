<?php
session_start();
//VALIDATES IF THE USERNAME AND PASSWORDS WERE INSERTED
if(empty($_POST['form-username']) ||  empty($_POST['form-password']) ||  empty($_POST['form-email'])) {
    header('Location:../index.php?p=404');
    exit();
}

//READS THE VARIABLES
$user = $_POST['form-username'];
$pass = $_POST['form-password'];
$email = $_POST['form-email'];
$useratual = $_SESSION['username'];

//HASHING THE PASSWORD
$pass = password_hash($pass, PASSWORD_DEFAULT);

//USERNAME AND PASSWORDS FILLED AND PASSWORDS ARE THE SAME
include('conn.php');

$sql = "UPDATE utilizador SET username='$user', password='$pass', email='$email' WHERE username='$useratual'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['username'] = $user;
    header('Location:../index.php?p=myaccount&r=updateok');
} else {
    header('Location:../index.php?p=myaccount&r=updateerro');
}

$conn->close();
?>