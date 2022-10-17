<?php
include('conn.php');
$novaPass = password_hash($novaPass, PASSWORD_DEFAULT);
$sql = "UPDATE utilizador SET password='$novaPass' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
} else if(empty($param)){
    header('Location:../index.php?p=administrtion&r=updateerro');
} else if(!empty($param)){
    header('Location:../index.php?p=login&r=updateerro');
}

$conn->close();
?>