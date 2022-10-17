<?php
include('../db/conn.php');

//THE VARIABLE FROM DATABASE WORKS AS TRIGGER FOR THE REMOTE PC (CAMERA) TO EXECUTE TASKS - START STREAMING/END STREAM 
$sql = "SELECT activity FROM camera WHERE id='1'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

$variable = $row['activity'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="variable" id="variable"><?php echo $variable ?></div>

</body>
</html>

