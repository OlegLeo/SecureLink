<?php
//VALIDATES IF USERNAME EXISTS (IF ITS AUTHENTICATED)
if(empty($_SESSION['username'])) {
    header('Location:../index.php?p=404');
    exit();
}

//READS THE VARIABLES
$user = $_SESSION['username'];

include('conn.php');
$sql = "SELECT id,username,password,email,foto FROM utilizador WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    //LOGGED IN
    $row = $result->fetch_assoc();
} else {
    header('Location:../index.php?p=404');
}
$conn->close();
?>