<style>
    @import 'https://fonts.googleapis.com/css2?family=Goldman&display=swap';
html,
body {
  
  background-image: url("../img/utilizador/images/live.jpg");
  background-position: top; /* Center the image */
  opacity: 95%;
  background-size: cover; /* Resize the background image to cover the entire container */
  height: 100%;
  background-color: white;
}

</style>
<!-- LINKS FOR INFO ICON TEXT jquery -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- ------------------------------- -->


<div class="container w-25 " style="margin-top:150px">
<div class="card p-5" >
<h5 style="text-align:center" class="mb-5">Livestream your Camera <a href="#" id="show-option" title="Once button is pressed ON, the window will pop up on your task bar down below! Enjoy the live transmission of your camera :D"><i class="icon-edit icon-white"><i class="bi bi-info-circle"></i></i></a>
</h5>
<?php  

// THIS WILL ONLY DISPLAY BUTTON TO TURN ON IF ACCOUNT HAS ANY CAMERA REGISTERED

$user = $_SESSION['username'];

include('db/conn.php');
$sql = "SELECT id_camera FROM utilizador WHERE username='$user'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $id = $row['id_camera'];
    if($id > 0){?>
        <a href="db/turnOnCamera.php" type="button" class="btn btn-primary mb-3">Turn On</a>
        <a href="db/turnOffCamera.php" type="button" class="btn btn-danger">Turn Off</a>
    <?php } else {?>
          <h5 style="text-align:center ;">You dont have any registered cameras on your account yet!</h5>  
    <?php }
    
$conn->close();
}
?>
</div>
</div>

<script>
    //info icon text
    $(function() {
    $( "#show-option" ).tooltip({
        show: {
        effect: "slideDown",
        delay: 300
        }
    });
});
</script>