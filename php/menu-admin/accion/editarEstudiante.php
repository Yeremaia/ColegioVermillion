
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
    <title>Admin/Estudiantes/Editar</title>
  </head>
  <body>
    <form class="editarUsuario" action="../procesar/procesarActualizarEstudiante.php" method="post">
      <div class="agregarUsuario-titulo">
          <h3>Editar Usuario</h3>
      </div>
      <?php
      $id = $_GET['id'];
      include("../../../conexionbd/conectar.php");
      $consulta="SELECT e.id_curso,id_estudiante,nombre,apellido,f_nacimiento,sexo,direccion,telefono,usuario_estudiante,clave,nombre_curso,numlista,correo FROM estudiante e INNER JOIN curso c ON  e.id_curso = c.id_curso WHERE e.id_estudiante='$id'";
      $sql = mysqli_query($conexionbd,$consulta);
      $mostrar =mysqli_fetch_assoc($sql);
      ?>

      <div class="agregarUsuario-grupo">


              <input type="hidden" name="id_estudiante" value="<?php echo $mostrar['id_estudiante'];?>">

              <div class="editar-usuario-apellido">
                <input type="text" name="apellido" value="<?php echo $mostrar['apellido'];?>">
              </div>


              <div class="editar-usuario-estudiante">
                <input type="text" name="nombre" value="<?php echo $mostrar['nombre'];?>">
              </div>


              <div class="editar-usuario-telefono">
                <input type="text" name="telefono" value="<?php echo $mostrar['telefono'];?>">
              </div>

              <div class="editar-usuario-direccion">
                <input type="text" name="direccion" value="<?php echo $mostrar['direccion'];?>">
              </div>


              <div class="editar-usuario-correo">
                <input type="email" name="correo" value="<?php echo $mostrar['correo'];?>">
              </div>


              <div class="editar-usuario-clave">
                <input type="password" name="clave" pattern="[A-Za-z0-9]+" value="<?php echo $mostrar['clave'];?>">
              </div>


              <div class="editar-usuario-usuario">
                <input type="text" name="usuario_estudiante" pattern="[A-Za-z0-9]+" value="<?php echo $mostrar['usuario_estudiante'];?>">
              </div>


              <div class="editar-usuario-sexo">
                <select name="sexo">
                  <option value="<?php echo $mostrar['sexo']?>"><?php echo $mostrar['sexo']?></option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
              </div>


              <div class="editar-usuario-fecha">
                <input type="date" name="f_nacimiento" pattern="[0-9]+" value="<?php echo $mostrar['f_nacimiento'];?>">
              </div>

              <div class="editar-usuario-curso">
                <select class="" name="id_curso">
                  <option value="<?php echo $mostrar['id_curso']?>"><?php echo $mostrar['nombre_curso']?></option>
                  <option value="1">Primero</option>
                  <option value="2">Segundo</option>
                  <option value="3">Tercero</option>
                  <option value="4">Cuarto</option>
                  <option value="5">Quinto</option>
                  <option value="6">Sexto</option>

                </select>
              </div>

              <div class="editar-usuario-lista">
                <input type="text" name="numlista" pattern="[0-9]+" value="<?php echo $mostrar['numlista'];?>">
              </div>

              <div class="agregar-usuario-botones-editar">
                <p>¿Deseas <a href="../estudiante.php">Regresar</a> ?</p>
                <input type="submit" value="Guardar" class="boton-guardar">
              </div>
        </div>
    </form>
  </body>
</html>
