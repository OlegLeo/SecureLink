
<?php

$edituser = $_POST['adminform-username'];
$editemail = $_POST['adminform-email'];
$idcamera = $_POST['adminform-IDcamera'];

include('conn.php');

$sql = "UPDATE utilizador SET email='$editemail', id_camera=$idcamera WHERE username='$edituser'";

if ($conn->query($sql) === TRUE) {
    header('Location:../index.php?p=administration&r=adminEditOk');
} else {
    header('Location:../index.php?p=404');
}

$conn->close();

?>
