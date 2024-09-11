<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio</title>
     <!--este seria el cdn de bootstrap icons-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- este seria el cdn de bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- estos serian los demas estilos-->
    <link rel="stylesheet" href="admin_styles.css">
    <script type="text/javascript">
        function confirmar(){
            return confirm('esta seguro de eliminar el reporte?');
        }
    </script>
</head>
<body>
    <!-- mensaje de biendenida comienza-->
    <div class="bienvenida centro">
        <?php
        include_once("conexion.php");
        session_start();
        $usu = $_SESSION['usuario'];
        /*si alguien intenta acceder a la url sin iniciar sesion sera devuelto, caso correcto procedera como debe a la pagina*/
        if (empty($usu)){
            header("location: index.php?error=inicie sesion correctamente para acceder");
            exit();
        }else{
        $consult= "SELECT nombre_completo FROM usuarios WHERE usuario='$usu'" ;
        $result= mysqli_query($conexion,$consult);

            while($mostrar=mysqli_fetch_array($result)){
        ?>

        <h1>bienvenido <?php echo $mostrar['nombre_completo']?> </h1>
        <?php
            }
        }
        ?>   
    </div>

    <div class="centro">
            <img src="SIGN.png" alt="logo" class="img-fluid">
    </div>
    
<div class="container centro mt-4 contenedor">
        <br>
        <div class="container">
      
      
      
    <div class="titulo p-4">
        <h2 class="text-white d-inline">novedades</h2>
        <!-- comienzan los botones para abrir modales-->
        <button  id="abrir_informacion" class="btn btn-success rounded-5 btn-lg d-inline float-end" data-bs-toggle="modal" data-bs-target="#informacion"><i class="bi bi-info-lg"></i></i></button>
    </div>

    <!-- Modales -->
    <div class="modal fade" id="informacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel"><i class="bi bi-info-circle"></i> informacion sobre la interfaz</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
<!--
    <div class="modal fade" id="editado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel"><i class="bi bi-pencil-square"></i> modificar estado de reportes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                

                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-primary">enviar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="eliminacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel"><i class="bi bi-trash3-fill"></i> eliminar reportes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
    -->
    <!-- en esta tabla el administrador visualizara las novedades reportadas-->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">estado</th>
                    <th scope="col">reportado por</th>
                    <th scope="col">ubicacion</th>
                    <th scope="col">descripcion</th>
                    <th scope="col">ID</th>
                    <th scope="col">acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- comienza el codigo para mostrar los registros en la tabla donde las novedades esten marcadas como reportadas-->
                <?php
$eseqele1="SELECT * FROM registro_novedades WHERE estado = '1'";
$resultado1=mysqli_query($conexion,$eseqele1);
$num_registros1=mysqli_num_rows($resultado1);
if ($num_registros1==0){

 ?>
                <tr>
                    <th scope="row">reportadas</th>
                    <td colspan="5"><h3 class="text-center">en este momento no hay novedades reportadas</h3></td>
                </tr>
 
 <?php
 
}
else{
    while($revelar=mysqli_fetch_array($resultado1)){
  ?>
    
                <tr>
                    
                    <th>reportadas</th>
                    <td><?php echo $revelar['reportado_por']?></td>
                    <td><?php echo $revelar['ubicacion']?></td>
                    <td><?php echo $revelar['descripcion']?></td>
                    <td><?php echo $revelar['ID']?></td>
                    <td>
                        <button  class="btn btn-warning  btn-lg mb-2"> 
                            <a href="modificar_estado.php?id=<?php echo $revelar['ID']?>" class="link-light"><i class="bi bi-pencil-square"></i></a>
                        </button>
                        <button  class="btn btn-danger  btn-lg mb-2" onclick="return confirmar()">
                            <a href="eliminar.php?id=<?php echo $revelar['ID']?>" class="link-light"><i class="bi bi-trash3-fill"></i></a>                       
                        </button>
                    </td>
                </tr>
 <?php
   
}
}
 ?>
                
<!-- comienza los reportes en proceso-->
<?php
$eseqele2="SELECT * FROM registro_novedades WHERE estado = '2'";
$resultado2=mysqli_query($conexion,$eseqele2);
$num_registros2=mysqli_num_rows($resultado2);
if ($num_registros2==0){

 ?>
                <tr>
                    <th scope="row">en proceso</th>
                    <td colspan="5"><h3 class="text-center">en este momento no hay reportes en proceso</h3></td>
                </tr>
 
 <?php
 
}
else{
    while($revelar=mysqli_fetch_array($resultado2)){
  ?>
    
                <tr>
                    <th scope="row">en proceso</th>
                    <td><?php echo $revelar['reportado_por']?></td>
                    <td><?php echo $revelar['ubicacion']?></td>
                    <td><?php echo $revelar['descripcion']?></td>
                    <td><?php echo $revelar['ID']?></td>
                    <td>
                        <button  class="btn btn-warning  btn-lg mb-2"> 
                            <a href="modificar_estado.php?id=<?php echo $revelar['ID']?>" class="link-light"><i class="bi bi-pencil-square"></i></a>
                        </button>
                        <button  class="btn btn-danger  btn-lg mb-2"  onclick="return confirmar()">
                            <a href="eliminar.php?id=<?php echo $revelar['ID']?>" class="link-light"><i class="bi bi-trash3-fill"></i></a>                       
                        </button>
                    </td>
                </tr>
 <?php
   
}
}
 ?>

<!-- comienza los reportes finalizados-->
<?php
$eseqele3="SELECT * FROM registro_novedades WHERE estado = '3'";
$resultado3=mysqli_query($conexion,$eseqele3);
$num_registros3=mysqli_num_rows($resultado3);
if ($num_registros3==0){

 ?>
                <tr>
                    <th scope="row">finalizadas</th>
                    <td colspan="5"><h3 class="text-center">en este momento no hay reportes finalizados</h3></td>
                </tr>
 
 <?php

}
else{
    while($revelar=mysqli_fetch_array($resultado3)){
  ?>
    
                <tr>
                    <th scope="row">finalizadas</th>
                    <td><?php echo $revelar['reportado_por']?></td>
                    <td><?php echo $revelar['ubicacion']?></td>
                    <td><?php echo $revelar['descripcion']?></td>
                    <td><?php echo $revelar['ID']?></td>
                    <td>
                        <button  class="btn btn-warning  btn-lg mb-2"> 
                            <a href="modificar_estado.php?id=<?php echo $revelar['ID']?>" class="link-light"><i class="bi bi-pencil-square"></i></a>
                        </button>
                        <button  class="btn btn-danger  btn-lg mb-2"  onclick="return confirmar()">
                            <a href="eliminar.php?id=<?php echo $revelar['ID']?>" class="link-light"><i class="bi bi-trash3-fill"></i></a>                       
                        </button>
                    </td>
                </tr>
 <?php

}
}
 ?>

            </tbody>
        </table>
        
    </div>
         <!--- boton de cerrar sesion -->
        <a href="cerrarsesion.php" class="btn btn-secondary mt-3">cerrar sesion</a>
        <br>
        <br>

</div>
    <!--cdn del js de boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>