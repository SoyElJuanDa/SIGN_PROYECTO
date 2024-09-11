<?php

require("conexion.php");

$usu = $_POST['usuario'];
$ubicacion = $_POST['ubicacion'];
$descripcion = $_POST['descripcion'];


if (strlen($ubicacion) >= 6){
    if(strlen($descripcion) >= 4){
        $insertar = "INSERT INTO registro_novedades (reportado_por,ubicacion,descripcion) values ('$usu','$ubicacion','$descripcion')";

        $query = mysqli_query($conexion,$insertar);


            echo "<script language='javascript'>
            alert('el reporte ha sido enviado corretamente');
            location.assign('inicio.php');
            </script>";
    }

}


else{
    echo "<script language='javascript'>
    alert('el reporte no logro enviarse, por favor revise los datos introducidos');
    location.assign('inicio.php');
    </script>";
}

?>


