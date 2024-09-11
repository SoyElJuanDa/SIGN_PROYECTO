<?php
$id=$_GET['id'];

include("conexion.php");

$sql="DELETE FROM registro_novedades WHERE ID='$id'";
$resultado=mysqli_query($conexion,$sql);

if($resultado){
    echo "<script language='javascript'>
    alert('el reporte fue eliminado corretamente');
    location.assign('inicio_admin.php');
    </script>";
}else{
    echo "<script language='javascript'>
    alert('el reporte no fue eliminado');
    location.assign('inicio_admin.php');
    </script>";
}

?>