<?php 

if(isset($_GET['p'])){
    $pag=$_GET['p'];

    if($pag == 'home')
        include('content/pages/home.php'); 
    else if($pag == 'login')
        include('content/pages/login.php');
    else if($pag == 'signup')
        include('content/pages/signup.php');
    else if($pag == 'myaccount')
        include('content/pages/myaccount.php');
    else if($pag == 'administration')
        include('content/pages/administration.php');
    else if($pag == 'logout')
        include('content/pages/logout.php');
    else if($pag == 'livestream')
        include('content/pages/livestream.php'); 
    else if($pag == 'contact')
        include('content/pages/contact.html');  
    else if($pag == 'adminEdit')
        include('content/pages/adminEdit.php');  
    else
        include('content/pages/404.php');
}else{
    include('content/pages/home.php');
}
?>