<style>
    @import 'https://fonts.googleapis.com/css2?family=Goldman&display=swap';
html,
body {
  
  background-image: url("../img/utilizador/images/login.jpg");
  background-position: center; /* Center the image */
  opacity: 90%;
  background-size: cover; /* Resize the background image to cover the entire container */
  height: 100%;
  background-color: white;
}
#loginbtn {
  background-color: black;
}
</style>

<div class="container w-25 " style="margin-top:150px">
<div class="card p-5" >
<form action="db/login.php" method="post">
  <div class="mb-3 ">
    <label for="form-username" class="form-label">Username</label>
    <input type="text" class="form-control" id="form-username" name="form-username" required>
  </div>
  <div class="mb-3" >
    <label for="form-password" class="form-label">Password</label>
    <input type="password" class="form-control" id="form-password" name="form-password" required>
  </div>
  <button  type="submit" id="loginbtn" class="btn btn-primary d-grid gap-2 col-12 mx-auto active">Login</button>
  <br>
  <button type="button" class="btn btn-link fw-light text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal">Forgot your password?</button>

 

</form>
</div>  
</div>
<!-- Modal -->
<form action="db/resetPassword.php" method="get">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="form-email" class="form-label">Please, insert your email</label>
          <input type="text" class="form-control" name="form-email" id="form-email">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Reset</button>
      </div>
    </div>
    
</form>
</div></div>



<?php 
//Validates the code with an alert 
if(isset($_GET['r'])){
  $r = $_GET['r'];
  if($r == 'registook'){ ?>

    <div class="alert alert-success" role="alert">
      Thank you for signing-up, please login!
    </div>

    <?php
  }else if($r == 'camposemfalta'){ ?>

    <div class="alert alert-danger" role="alert">
      Please, fill in all fields.
    </div>

    <?php
  }else if($r == 'loginerrado'){ ?>
    
    <div class="alert alert-danger" role="alert">
      Wrong Login!
    </div>

    <?php
  }
}?>