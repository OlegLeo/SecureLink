<?php
//READS AND VALIDATES IF THE VARIABLES WERE PASSED
if(empty($_GET['id']) ||  empty($_GET['tipo'])) {
    header('Location:../index.php?p=404');
    exit();
}

//READS THE VARIABLES
$id = $_GET['id'];
$tipo = $_GET['tipo'];

include('conn.php');

$sql = "UPDATE utilizador SET id_tipoUtilizador=$tipo WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location:../index.php?p=administration&r=updateok');
} else {
    header('Location:../index.php?p=administration&r=updateerro');
}

$conn->close();
?>