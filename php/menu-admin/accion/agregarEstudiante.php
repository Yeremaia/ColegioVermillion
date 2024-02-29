<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../../iniciarSesion.php");
 }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Mentes Informaticas">
    <link rel="icon" href="../../../imagenes/logos/logo.png">
    <link rel="stylesheet" href="../../../css/sistema.css">
    <title>Admin/Estudiantes/Agregar Usuario</title>
  </head>
  <body>
    <form class="agregarUsuario" action="../procesar/procesarAgregarEstudiante.php" method="post">
      <div class="agregarUsuario-titulo">
          <h3>Agregar Usuario</h3>
      </div>
      <div class="agregarUsuario-grupo">
        <div class="agregar-usuario-apellido">
          <input type="text" id="apellido" name="apellido" placeholder="Apellido*">
        </div>
        <div class="agregar-usuario-nombre">
          <input type="text" id="nombre" name="nombre" placeholder="Nombre*">
        </div>
        <div class="agregar-usuario-correo">
          <input type="text" id="correo" name="correo" placeholder="Correo*">
        </div>
        <div class="agregar-usuario-lista">
          <input type="text" id="lista" name="lista" placeholder="Número de lista*">
        </div>
        <div class="agregar-usuario-telefono">
          <input type="text" id="telefono" name="telefono" placeholder="Telefóno*">
        </div>
        <div class="agregar-usuario-direccion">
          <input type="text" id="direccion" name="direccion" placeholder="Dirección*">
        </div>

        <div class="agregar-usuario-clave">

          <input type="password" id="clave" name="clave" placeholder="Clave*">
        </div>
        <div class="agregar-usuario-profesor">

          <input type="text" id="usuario" name="usuario" placeholder="Usuario*">
        </div>

        <div class="agregar-usuario-fecha">
          <input type="date" id="fecha" name="fecha" placeholder="Fecha de Nacimiento*">
        </div>

        <?php
        include("../../../conexionbd/conectar.php");
        $consultaCurso= "SELECT * FROM curso";
        $resultadoCurso=mysqli_query($conexionbd,$consultaCurso);
        ?>
          <div class="agregar-usuario-curso">
        <select class="" name="curso">

            <?php while($Curso=mysqli_fetch_assoc($resultadoCurso)){?>
            <option value="<?php echo $Curso['id_curso'];?>"><?php echo $Curso['nombre_curso'];?></option>
        <?php }?>
        </select>

      </div>


        <div class="agregar-usuario-profesor">
          <select name="sexo">
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
        </div>
        <div class="agregar-usuario-botones">
          <p>¿Deseas <a href="../adminInicio.php">Regresar</a>?</p>
          <input type="submit" value="Guardar" id="boton-regresar">
        </div>
      </div>
    </form>
  </body>
</html>
