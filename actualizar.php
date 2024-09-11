<?php
require('conexion.php');

$nuevo_estado= $_POST['nuevo_estado'];

$id=$_POST['id_'];

$actualizar ="UPDATE registro_novedades SET estado='$nuevo_estado' where ID='$id'";

$query=mysqli_query($conexion,$actualizar);

if($query){
    echo'<script type="text/javascript">
        alert("estado actualizado correctamente");
        window.location.href="inicio_admin.php";
        </script>';
}else{
    echo'<script type="text/javascript">
        alert("no hubo ningun cambio");
        window.location.href="inicio_admin.php";
        </script>';
}


?>