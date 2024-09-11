<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN</title>
    <!--este seria el cdn de bootstrap-->
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- estos serian los iconos de bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link type="text/css" rel="stylesheet" href="index_styles.css">
    
</head>
<body>
    <div class="container centro" >
        <img src="SIGN.png" alt="logo" class="img-fluid">
        
        <?php
        if(isset($_GET['error'])){
        ?>  
        <h1 class="error">
        
            <?php
                echo $_GET['error'];
            ?>
        
        </h1> 
        <?php 
        }
        ?>
        
        <div class="row centro">
            <form action="iniciosesion.php" method="post">
                
                <div class="mb-4">
                    <label class="form-label"><h2><i class="bi bi-person-circle"></i> usuario</h2>
                    </label>
                    <input type="text" placeholder="ingrese su nombre de usuario" 
                    class="form-control" name="usuario">
                </div>
            
                <div class="mb-4">
                    <label class="form-label"><h2><i class="bi bi-unlock-fill"></i> contraseña</h2></label>
                    <input type="password" placeholder="ingrese su contraseña"
                    class="form-control" name="contraseña" id="contras">
                    <input type="checkbox" onclick="vercontra()" id="mostrar">
                    <label for="mostrar">mostrar contraseña</label>
                </div>

                <div class="mt-4 mb-2">
                <input type="submit" value="iniciar sesion" class="btn btn-success ">
                </div>
                
            </form>
        
        </div>
        <div class="mb-2">
            <button type="button" class="btn btn-secondary btn-sm mt-3">¿olvidaste tu contraseña?</button>
        </div>
        
        <br>
        <br>
    </div>

    <!--cdn del js de boostrap-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
       
    </script>
    <!-- aqui el codigo para el la funcion de mostrar contraseña-->
    <script>
         function vercontra(){
      var tipo = document.getElementById("contras");
      if(tipo.type == "password")
      {
          tipo.type = "text";
      }
      else
      {
          tipo.type = "password";
      }
  }
    </script>
</body>
</html>