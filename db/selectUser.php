<?php

include('conn.php');

$sql = "SELECT * FROM utilizador";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?> 
    <tbody style="text-align: center">
    
        <td><?= $row['id']?></td>
        <td><?= $row['username']?></td>
        <td><?= $row['email']?></td>
        <td><?= $row['id_camera']?></td>
        <td>
            <?php 
            if($row['id_tipoUtilizador']==1){ ?>
                <i class="bi bi-person-check-fill" 
                    onclick="location.replace('db/updateTipoUtilizador.php?id='+<?= $row['id']?>+'&tipo=2')"></i>
            <?php }else{ ?>
                <i class="bi bi-person-fill"
                    onclick="location.replace('db/updateTipoUtilizador.php?id='+<?= $row['id']?>+'&tipo=1')"></i>
            <?php }
            ?>
        </td>
       
        <td><a class="btn btn-primary" href="db/resetPassword.php?id=<?= $row['id']?>&email=<?= $row['email']?>&username=<?= $row['username']?>">Reset</a></td>
        <td><a class="btn btn-warning" href="index.php?p=adminEdit&email=<?= $row['email']?>&username=<?= $row['username']?>&id_camera=<?= $row['id_camera']?>">Edit</a>&nbsp;&nbsp;<a class="btn btn-danger" href="db/deleteUserByUsername.php?username=<?= $row['username']?>">Delete</a></td>
        
  </tbody>

        
        
        
    <?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>