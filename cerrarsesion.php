<?php
/*con este codigo cerramos sesion*/
    session_start();
    session_destroy();
    header("location: index.php");

?>