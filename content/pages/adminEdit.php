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

<h3 style="text-align:center">USER: <?php echo $_GET['username'] ?></h3>


<br>
<form action="db/editUserByUsername.php" method="post">
    <div>
        <label for="adminform-username">Username:</label>
        <input type="text" name="adminform-username" id="adminform-username" value="<?= $_GET['username']?>" readonly>
    </div>
    <div>
        <label for="adminform-email" style="padding-left: 33px; padding-top: 25px">Email:</label>
        <input type="text" name="adminform-email" id="adminform-email" value="<?= $_GET['email']?>">
    </div>
    <div>
        <label for="adminform-IDcamera" style="padding-left: 20px; padding-top: 25px">Cam ID:</label>
        <input type="text" name="adminform-IDcamera" id="adminform-IDcamera" value="<?= $_GET['id_camera']?>">
    </div>
    <input id="editbtn" type="submit" class="btn btn-primary d-grid gap-2 col-12 mx-auto active" value="Edit">
    <br>
    <a class="btn btn-danger d-grid gap-2 col-12 mx-auto active" href="index.php?p=administration">Cancel</a>
</form>
</div>
</div>
