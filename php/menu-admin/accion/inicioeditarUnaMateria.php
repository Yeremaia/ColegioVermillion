<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../iniciarSesion.php");
 }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Mentes Informaticas">
    <link rel="icon" href="../imagenes/logos/logo.png">
    <link rel="stylesheet" href="../../../css/sistema.css">
    <title>Admin/Estudiantes/Agregar Usuario</title>
  </head>
  <body>
      <?php
    include("../../../conexionbd/conectar.php");

     $consultaSesion = "SELECT nombre,apellido FROM administrador WHERE usuario='$usuario'" ;
     $resultadoConsulta = mysqli_query($conexionbd, $consultaSesion);
     $mostrarSesion = mysqli_fetch_assoc($resultadoConsulta);

    ?>

  <?php

  $id= $_GET['id'];
  $consultaEditarMateria="SELECT * FROM asignatura WHERE id_asignatura='$id'";
  $sqlEditarMateria=mysqli_query($conexionbd, $consultaEditarMateria);
  $relacionarEdiarMAteria= mysqli_fetch_assoc($sqlEditarMateria);

  ?>
  <form class="agregarMateria" action="../procesar/procesarEditarUnaMateriaInicio.php" method="post">

    <div class="agregarMateria-titulo">
        <p>Editar Materia</p>
    </div>

    <div class="agregarMateria-grupo">

      <div class="agregar-materia">
        <input type="hidden" id="idAsignatura" name="idAsignatura" value="<?php echo $relacionarEdiarMAteria['id_asignatura']?>">

        <input type="text" id="agregarMateria" name="editarMateria" value="<?php echo $relacionarEdiarMAteria['materia'] ?>" required>

      </div>

    </div>

    <div class="agregar-materia-botones-3">
      <p>¿Deseas <a href="../adminInicio.php">Regresar</a>?</p>
      <input type="submit" value="Guardar" id="boton-regresar-3">
    </div>
  </body>
</html>
