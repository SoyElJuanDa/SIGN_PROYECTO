<?php

include("conexion.php");

$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;
$_SESSION['contraseña']=$contraseña;



$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);
if($filas){
    if($filas['tipo de rol']==1){ //administrador
        header("location: inicio_admin.php");
        exit();
    
    }else
    if($filas['tipo de rol']==2){ //usuario-a
    header("location: inicio.php");
    exit();
    }
}else{
    header("location: index.php?error=datos incorrectos, revise nuevamente");
    exit();
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>