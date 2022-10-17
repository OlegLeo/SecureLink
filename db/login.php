<?php
//VALIDAR SE USERNAME E PASSWORDS FORAM PREENCHIDAS
if(empty($_POST['form-username']) ||  empty($_POST['form-password'])) {
    header('Location:../index.php?p=login&r=camposemfalta');
    exit();
}

//LER USERNAME E PASSWORDS PARA VARIÁVEIS
$user = $_POST['form-username'];
$pass = $_POST['form-password'];


include('conn.php');

$sql = "SELECT * FROM utilizador WHERE username='$user'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

    if ($result->num_rows > 0 && password_verify($pass, $row["password"])) {
        //LOGIN VALID
        
        session_start();
        //$_SESSION['id']=$row['id'];   //SAVES THE ID OF USER IN SESSION
        $_SESSION['username']=$user;
        $_SESSION['tipoUtilizador'] = $row['id_tipoUtilizador'];
        header('Location:../index.php?p=myaccount');
        
    }else {
        header('Location:../index.php?p=login&r=loginerrado');
    }
    $conn->close();

?>