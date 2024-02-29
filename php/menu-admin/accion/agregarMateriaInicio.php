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
    <title>Admin/Materias/Agregar Materia</title>
  </head>
  <body>
    <form class="agregarMateria" action="../procesar/procesarAgregarMateriaInicio.php" method="post">

      <div class="agregarMateria-titulo">
          <h3>Agregar Materia</h3>
      </div>

      <div class="agregarMateria-grupo">
          <p>Nombre de la nueva materia</p>

        <div class="agregar-materia">
          <input type="text" id="agregarMateria" name="newMateria" placeholder="Nueva Materia" pattern="[A-Za-z]+" title="Solo se permiten letras." required>
        </div>

      </div>

      <div class="agregar-materia-botones">
        <p>¿Deseas <a href="../adminInicio.php">Regresar</a>?</p>
        <input type="submit" value="Guardar" id="boton-regresar">
      </div>

    </form>
  </body>
</html>
