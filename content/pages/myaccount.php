<style>
    @import 'https://fonts.googleapis.com/css2?family=Goldman&display=swap';
html,
body {
  
  background-image: url("../img/utilizador/images/account.jpg");
  background-position: center; /* Center the image */
  opacity: 85%;
  background-size: cover; /* Resize the background image to cover the entire container */
  height: 100%;
  background-color: white;
}
#editbtn {
  background-color: black;
  margin-top: 50px;
}
</style>

<div class="container w-25 " style="margin-top:110px">
<div class="card p-5" style="width:25rem;" >

<h3 style="text-align:center">Hello, <?php echo $_SESSION['username'] ?>!</h3>


<br>
<?php include('db/selectUtilizadorByUsername.php'); //var_dump($row);?>
<br>
<form action="db/updateUtilizador.php" method="post">
    <div>
        <label for="form-username">Username:</label>
        <input type="text" name="form-username" id="form-username" value="<?= $row['username']?>" required>
    </div>
    <div>
        <label for="form-password" style="padding-left: 5px; padding-top: 25px;">Password:</label>
        <input type="password" name="form-password" id="form-password" placeholder="confirm your password" required>
    </div>
    <div>
        <label for="form-email" style="padding-left: 33px; padding-top: 25px">Email:</label>
        <input type="text" name="form-email" id="form-email" value="<?= $row['email']?>" required>
    </div>
    <input id="editbtn" type="submit" class="btn btn-primary d-grid gap-2 col-12 mx-auto active" value="Edit">
</form>
<br>
<a href="db/deleteUser.php" type="button" class="btn btn-danger">Delete account</a>
</div>
</div>


   

