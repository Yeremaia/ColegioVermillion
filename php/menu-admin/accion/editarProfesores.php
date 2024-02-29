
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
    <title>Admin/Profesores/Editar</title>
  </head>
  <body>

    <form class="editarUsuario" action="../procesar/procesarActualizarProfesor.php" method="post">
      <div class="agregarUsuario-titulo">
          <h3>Editar Usuario</h3>
      </div>
      <?php
      $id = $_GET['id'];
      include("../../../conexionbd/conectar.php");
      $consulta = "SELECT p.id_profesor,p.id_asignatura,p.id_curso, nombre, apellido, direccion, telefono, correo, materia, usuario_profesor, clave, nombre_curso, f_nacimiento, sexo FROM profesor p INNER JOIN asignatura a ON p.id_asignatura = a.id_asignatura INNER JOIN curso c ON p.id_curso = c.id_curso WHERE p.id_profesor = '$id'";
      $edit = mysqli_query($conexionbd,$consulta);
      $mostrar =mysqli_fetch_assoc($edit);
      ?>
      <div class="agregarUsuario-grupo">
          <input type="hidden" name="id_profesor" class="editar-usuario" value="<?php echo $mostrar['id_profesor']?>">

          <div class="editar-usuario-apellido">
            <input type="text" placeholder="Apellido*"
            name="apellido" value="<?php echo $mostrar['apellido']?>">
          </div>

          <div class="editar-usuario-nombre">
            <input type="text"  placeholder="Nombre*"
            name="nombre" value="<?php echo $mostrar['nombre']?>">
          </div>

          <div class="editar-usuario-telefono">
            <input type="text"  placeholder="Telefono*"
            name="telefono"  value="<?php echo $mostrar['telefono']?>">
          </div>

          <div class="editar-usuario-direccion">
            <input type="text"  placeholder="Direccion*"
            name="direccion" value="<?php echo $mostrar['direccion']?>">
          </div>

          <div class="editar-usuario-correo">
            <input type="email"  placeholder="Correo*"
            name="correo" value="<?php echo $mostrar['correo']?>">
          </div>

          <div class="editar-usuario-clave">
            <input type="password" placeholder="Clave*"
            name="clave" pattern="[A-Za-z0-9]+" value="<?php echo $mostrar['clave']?>">
          </div>

          <div class="editar-usuario-usuario">
            <input type="text"  placeholder="Usuario*"
            name="usuario" pattern="[A-Za-z0-9]+" value="<?php echo $mostrar['usuario_profesor']?>">
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

          <div class="editar-usuario-asignatura">

            <select name="id_asignatura">
              <option value="<?php echo $mostrar['id_asignatura']?>"><?php echo $mostrar['materia']?></option>
              <option value="1">Lengua Española</option>
              <option value="2">Matematicas</option>
              <option value="4">Naturales</option>
              <option value="3">Sociales</option>
              <option value="5">Lenguas Extrangeras Ingles</option>
              <option value="6">Lenguas Extranjeras Frances</option>
              <option value="7">Educacion Artistica</option>
              <option value="8">Educacion Fisica</option>
              <option value="9">Formacion Humana</option>
              <option value="10">Musica</option>
              <option value="11">Informatica</option>
              <option value="12">Etiqueta y Protocolo</option>
              <option value="13">Salida</option>
              <option value="14">Recreo</option>
            </select>
          </div>

          <div class="editar-usuario-sexo">
            <select name="sexo">
              <option value="<?php echo $mostrar['sexo']?>"><?php echo $mostrar['sexo']?></option>
              <option value="masculino">Masculino</option>
              <option value="femenino">Femenino</option>
            </select>
          </div>

          <div class="editar-usuario-fecha">
            <input type="date"  placeholder="Fecha/Naci*"
            name="f_nacimiento" value="<?php echo $mostrar['f_nacimiento']?>">
          </div>

        <div class="agregar-usuario-botones-editar">
          <p>¿Deseas <a href="../adminInicio.php">Regresar</a>?</p>
          <input type="submit" value="Guardar" class="boton-guardar">
        </div>
      </div>
    </form>
  </body>
</html>
