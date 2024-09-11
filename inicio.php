<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio</title>
    <!--este seria el cdn de bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- estos serian los iconos de bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- este seria el archivo css para los demas estilos-->
    <link rel="stylesheet" href="inicio_styles.css">
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
    
    <div class="container centro bg-light">
    
    <br>
    <!--navbar en cascada que llevara el usuario-a a la otra interfaz-->
    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn" id="dropbtn">reporte de novedades</button>
        <div id="myDropdown" class="dropdown-content">
            <a href="inicio_reportes_enviados.php">reportes enviados</a>
        </div>
    </div>

    <!-- tabla donde el usuario ingresara los datos del reporte-->
    <form action="insertar.php" method="POST">
        <div class="row">
            <div class="d-inline col-xl-10 col-lg-10 col-md-10 col-sm-9">
                <table class="table  table-responsive">
                    <tr>
                        <th scope="col">ubicacion</th>
                        <th scope="col">descripcion</th>
                    </tr>
                    <tr>
                        <th scope="col">
                            <input type="text" name="ubicacion" placeholder="inserte la ubicacion" class="form-control">
                        </th>
                        <th scope="col">
                            <input type="text" name="descripcion" placeholder="inserte la descripcion" class="form-control">
                        </th>
                        <!-- un input especial, donde se registra el usuario que envia el reporte-->
                        <th scope="col" hidden >
                            <input type="text" name="usuario" value="<?=htmlspecialchars($usu); ?>" class="form-control" readonly>
                        </th>
                    </tr>
                </table>
          
            </div>
            <div class="d-inline enviar col-xl-2 col-lg-2 col-md-2 col-sm-3 justify-content-md-center">
                
                    <input type="submit" value="enviar" class="btn btn-lg btn-success">
                
            
            </div>
        </div>
        
    </form>

    
        
   
    <!-- boton para cerrar sesion-->    
    <a href="cerrarsesion.php" class="btn btn-secondary mt-4">cerrar sesion</a>
    <br>
    <br>

    </div>
    <!--cdn del js de boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        var btnToggle = true;
        var dropBtn = document.getElementById("dropbtn");

        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
            if (btnToggle){
                dropBtn.style.backgroundColor = "white";
                dropBtn.style.color = "black";
                btnToggle = false;
                dropBtn.style.boxShadow = "2px 0px inset green"; 
            } else{
                dropBtn.style.backgroundColor = "green";
                dropBtn.style.color = "white";
                btnToggle = true;
            }
        }

    
    
    </script>
</body>
</html>