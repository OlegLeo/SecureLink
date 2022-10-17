<?php

if(isset($_GET['username'])) {
    include('conn.php');
    $username = $_GET['username'];
    
    
    $sql = "DELETE FROM utilizador WHERE username='$username'";
    
    if ($conn->query($sql) === TRUE) {
        header('Location:../index.php?p=administration&r=adminDeleteOk');
    } else {
        header('Location:../index.php?p=404');
    }

    $conn->close();
}
?>
