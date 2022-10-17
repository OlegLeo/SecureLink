<?php
//VALIDATING PROCESS IF THE USERNAME AND PASSWORD ARE FILLED IN
if(empty($_POST['form-username']) ||  empty($_POST['form-password']) || empty($_POST['form-password1'])) {
    header('Location:../index.php?p=signup&r=camposemfalta');
    exit();
}

//GETTING THE VARIABLES
$user = $_POST['form-username'];
$pass1 = $_POST['form-password'];
$pass2 = $_POST['form-password1'];

//COMPARE PASSWORDS IF BOTH ARE THE SAME
if($pass1!=$pass2){
    header('Location:../index.php?p=signup&r=pwderrada');
    exit();
}

//HASHING THE PASSWORD 
$hashed_password = password_hash($pass1, PASSWORD_DEFAULT);

//USERNAME AND PASSWORD FILLED, PASSWORDS ARE THE SAME
include('conn.php');

$sql = "INSERT INTO utilizador (username, password, id_tipoUtilizador) VALUES ('$user', '$hashed_password', 2)";


if ($conn->query($sql) === TRUE) {
    header('Location:../index.php?p=login&r=registook');
} else {
    header('Location:../index.php?p=signup&r=usernameexistente');
}

$conn->close();
?>