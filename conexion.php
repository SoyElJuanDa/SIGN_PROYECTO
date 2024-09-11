<?php

$host="localhost";
$user="root";
$pass="";
$dbname="loginsign";

$conexion = mysqli_connect($host,$user,$pass,$dbname);
    
    /*if($conexion->connect_errno)
    {
        echo "No hay conexión: (" . $conn->connect_errno . ") " . $conn->connect_error;
    }*/
?>