<style>
    @import 'https://fonts.googleapis.com/css2?family=Goldman&display=swap';
html,
body {
  
  background-image: url("../img/utilizador/images/register.jpg");
  background-position: top; /* Center the image */
  opacity: 93%;
  background-size: cover; /* Resize the background image to cover the entire container */
  height: 100%;
  background-color: white;
}
#signupbtn {
  background-color: black;
}
</style>

<div class="container w-25 " style="margin-top:120px">
<div class="card p-5" >
<h1 style="text-align: center; padding-bottom: 10px;">Sign Up</h1>
<form action="db/insertUtilizador.php" method="post">
  <div class="mb-3">
    <label for="form-username" class="form-label">Username</label>
    <input type="text" class="form-control" id="form-username" name="form-username" required>
  </div>
  <div class="mb-3">
    <label for="form-password" class="form-label">Password</label>
    <input type="password" class="form-control" id="form-password" name="form-password" required>
  </div>
  <div class="mb-3">
    <label for="form-password1" class="form-label">Confirm your Password</label>
    <input type="password" class="form-control" id="form-password1" name="form-password1" required>
  </div>
  <button id="signupbtn" type="submit" class="btn btn-primary d-grid gap-2 col-12 mx-auto active opacity-100">Sign-up</button>
</form>
</div> </div>

<?php 
//VALIDATES PASSING THE VARIABLE BY URL, THEN THE ALERT IS TRIGGERED
if(isset($_GET['r'])){
  $r = $_GET['r'];
  if($r == 'camposemfalta'){ ?>

    <div class="alert alert-danger" role="alert">
      Please, fill in all the fields!
    </div>

    <?php
  }else if($r == 'pwderrada'){ ?>
    
    <div class="alert alert-danger" role="alert">
      Passwords are not the same!
    </div>

    <?php
  }else if($r == 'usernameexistente'){
    ?>
    
    <div class="alert alert-danger" role="alert">
      Username already exists!
    </div>
    
    <?php
  } 
}
?>