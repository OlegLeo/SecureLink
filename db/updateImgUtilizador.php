<?php
//READS AND VALIDATES IF THE VARIABLES WERE PASSED
if(empty($_POST['form-id'])) {
    header('Location:../index.php?p=404');
    exit();
}

//READS THE VARIABLES
$id = $_POST['form-id'];

include('conn.php');

$sql = "UPDATE utilizador SET foto='u$id.png' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location:../index.php?p=administration&r=updateok');
} else {
    header('Location:../index.php?p=administration&r=updateerro');
}

$conn->close();
?>