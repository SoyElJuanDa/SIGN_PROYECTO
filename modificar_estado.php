<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificar estado</title>
     <!--este seria el cdn de bootstrap icons-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- este seria el cdn de bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- estos serian los demas estilos-->
    <link rel="stylesheet" href="admin_styles.css">
</head>
<body>
    
    <?php
    $id_modificar=$_GET['id'];
    ?>  
    <!-- mensaje de biendenida comienza-->
    <div class="centro">
        <?php
        include_once("conexion.php");
        session_start();
        $usu = $_SESSION['usuario'];
        /*si alguien intenta acceder a la url sin iniciar sesion sera devuelto, caso correcto procedera como debe a la pagina*/
        if (empty($usu)){
            header("location: index.php?error=inicie sesion correctamente para acceder");
            exit();
        }
        $consult= "SELECT * FROM registro_novedades WHERE ID='$id_modificar'" ;
        $result= mysqli_query($conexion,$consult);
        $mostrar=$result->fetch_assoc();
        ?>  
    </div>
    
        
    <div class="centro opacity-50">
            <img src="SIGN.png" alt="logo" class="img-fluid">
    </div>
    
        <div class="editar position-absolute start-50 top-50 translate-middle bg-light  p-1 container">
            <form action="actualizar.php" method="POST" class="form-control">
             <h2 class="text-light bg-warning border-bottom"><i class="bi bi-pencil-square"></i> actualizar estado de reporte</h2>
            <div class="row">
                <div class="d-inline col-6">
                    <label for="id_">id del reporte</label>
                    <input class="form-control" id="id_" name="id_" type="text" value="<?php echo $id_modificar?>" aria-label="Disabled input example" readonly>
                </div>
                <div class="d-inline col-6">
                    <label for="ubicacion_">ubicacion</label>
                    <input class="form-control" id="ubicacion" type="text" value="<?php echo $mostrar['ubicacion']?>" aria-label="Disabled input example" disabled readonly>
                </div>
                <div class="d-inline col-6">
                    <label for="descripcion_">descripcion</label>
                    <input class="form-control" id="descripcion_" type="text" value="<?php echo $mostrar['descripcion'] ?>" aria-label="Disabled input example" disabled readonly>
                </div>
                <div class="d-inline col-6">
                    <label for="estado_a">estado actual</label>
                    <input class="form-control" id="estado_a" type="text" value="<?php echo $mostrar['estado'] ?>" aria-label="Disabled input example" disabled readonly>
                </div>
                <div class="d-inline col-sm-8 col-xs-12 col-lg-10 col-md-9">
                    <label for="estados">seleccione el estado que desea asignar al reporte </label>
                    <select class="form-select form-select-sm" aria-label="Small select example" id="estados" name="nuevo_estado">
                            <option value="1">1. reportada</option>
                            <option value="2">2. en proceso</option>
                            <option value="3">3. finalizada</option>
                    </select> 
                </div>
                <div class="col-sm-4 col-xs-12 col-lg-2 col-md-2 btn_act">
                    <input type="submit" value="actualizar" class="btn btn-warning text-white mt-3 btn-lg">
                </div>
                
            
            </div>   
            </form>
                

        </div>
    
    
<div class="container centro mt-4 contenedor opacity-50 secondario">
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
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button  class="btn btn-danger  btn-lg mb-2">
                                <i class="bi bi-trash3-fill"></i>                      
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
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button  class="btn btn-danger  btn-lg mb-2">
                            <i class="bi bi-trash3-fill"></i>
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
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button  class="btn btn-danger  btn-lg mb-2">
                            <i class="bi bi-trash3-fill"></i>
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