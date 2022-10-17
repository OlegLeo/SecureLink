<style>
    @import 'https://fonts.googleapis.com/css2?family=Goldman&display=swap';
html,
body {
  
  background-image: url("../img/utilizador/images/adminpage.jpg");
  background-position: center; /* Center the image */
  opacity: 90%;
  background-size: cover; /* Resize the background image to cover the entire container */
  height: 100%;
  background-color: white;
}

</style>

<div class="container" style="padding-top:65px;">
<div class="card p-5" >
<h1 style="text-align:center; padding-bottom: 15px;">Administration</h1>
<?php 
if($_SESSION['tipoUtilizador']!=1){
    header('Location: index.php?p=404');
    exit();
}?>

<table class="table table-dark" style="padding-top:35px;">
<thead style="text-align: center">
    <tr>
    
        <th scope="col"><h4>ID</h4></th>
        <th scope="col"><h4>Username</h4></th>
        <th scope="col"><h4>Email</h4></th>
        <th scope="col"><h4>Cam ID</h4></th>
        <th scope="col"><h4>User type</h4></th>
        <th scope="col"><h4>Password</h4></th>
        <th scope="col"><h4>Account</h4></th>
      </tr>
  </thead>   
    
    <?php include('db/selectUser.php');?>
</div>
</div>


<?php //SIMPLES NOTIFICATION WHEN AN ACCOUNT WAS DELETED
if(isset($_GET['r'])){
  $r = $_GET['r'];
  if($r == 'adminDeleteOk'){ ?>
    <div class="alert alert-success" role="alert">
      Account deleted successefully!
    </div>
    <?php } if($r == 'adminEditOk'){ ?>
    <div class="alert alert-success" role="alert">
      Account edited successefully!
    </div><?php }} ?>

