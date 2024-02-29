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
    <title>Admin/Curso/Editar</title>
  </head>
  <body>
    <?php
    $id = $_GET['id'];
    include("../../../conexionbd/conectar.php");
    $consulta="SELECT a.id_asistencia,e.nombre,e.apellido,lunes,martes,miercoles,jueves,viernes,c.nombre_curso FROM asistencia a INNER JOIN estudiante e ON a.id_estudiante = e.id_estudiante INNER JOIN curso c ON  e.id_curso = c.id_curso  WHERE a.id_asistencia='$id'";
    $sql = mysqli_query($conexionbd,$consulta);
    $mostrar =mysqli_fetch_assoc($sql);
    ?>
    <form class="agregarUsuario" action="../procesar/procesarActualizarCursoAdmin.php" method="post">
      <div class="agregarUsuario-titulo">
          <h3>Editar Asistencia</h3>
      </div>

              <div class="agregarUsuario-grupo">
                   <input type="hidden" name="id_asistencia" value="<?php echo $mostrar['id_asistencia'];?>">

                  <p class="nombre-materia-editar"><?php echo $mostrar['nombre']." ".  $mostrar['apellido']." ". $mostrar['nombre_curso'];?></p>

                <div class="editar-notas-perido-1">
                  <p class="nombre-editar-curso-admin">Lunes</p>
                  <input type="text" name="lunes" id="asistencia1" pattern="[A-Za-z]+" value="<?php echo $mostrar['lunes'];?>">
                </div>


                <div class="editar-notas-perido-2">
                  <p class="nombre-editar-curso-admin">Martes</p>
                  <input type="text" name="martes" id="asistencia2" pattern="[A-Za-z]+" value="<?php echo $mostrar['martes'];?>">
                </div>

                <div class="editar-notas-perido-3">
                  <p class="nombre-editar-curso-admin">Miercoles</p>
                  <input type="text" name="miercoles" id="asistencia3" pattern="[A-Za-z]+" value="<?php echo $mostrar['miercoles'];?>">
                </div>

                <div class="grupo-notas-izquierdo-2">

                  <div class="editar-notas-perido-4">
                    <p class="nombre-editar-curso-admin-2">Jueves</p>
                    <input type="text" name="jueves" id="asistencia4" pattern="[A-Za-z]+" value="<?php echo $mostrar['jueves'];?>">
                  </div>

                  <div class="editar-notas-perido-5">
                    <p class="nombre-editar-curso-admin-2">Viernes</p>
                    <input type="text" name="viernes" id="asistencia5" pattern="[A-Za-z]+" value="<?php echo $mostrar['viernes'];?>">
                  </div>

                </div>

              </div>
              <div class="agregar-usuario-botones-4">
                <p>¿Deseas <a href="elegirEditarCursoAdmin.php">Regresar</a> ?</p>
                <input type="submit" value="Guardar" id="boton-guardar-3">
              </div>
    </form>
  </body>
</html>
