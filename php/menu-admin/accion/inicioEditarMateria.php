<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location:../../iniciarSesion.php");
 }

 if (isset($_POST["Guardar"])) {


  header("location: visualizarEditarMateriaInicio.php");
}
?>
<?php

$id_horario=$_GET['id'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Mentes Informaticas">
    <link rel="icon" href="../imagenes/logos/logo.png">
    <link rel="stylesheet" href="../../../css/sistema.css">
    <title>Admin/Profesores/Agregar Usuario</title>
  </head>

  <?php
  include("../../../conexionbd/conectar.php");
  $consulta = "SELECT DISTINCT  id_horario,horario,Lunes,Martes,Miercoles,Jueves,Viernes FROM horario h 
  WHERE  h.id_horario =  '$id_horario'";

  $resultado=mysqli_query($conexionbd, $consulta);
  $mostrar=mysqli_fetch_assoc($resultado);

  $consultaMateria="SELECT * FROM asignatura";
  $sqlConsultaMateria=mysqli_query($conexionbd, $consultaMateria);
  $sqlConsultaMateriaMartes=mysqli_query($conexionbd, $consultaMateria);
  $sqlConsultaMateriaMiercoles=mysqli_query($conexionbd, $consultaMateria);
  $sqlConsultaMateriaJueves=mysqli_query($conexionbd, $consultaMateria);
  $sqlConsultaMateriaViernes=mysqli_query($conexionbd, $consultaMateria);

  ?>
  <body>

    <form class="agregarUsuario" action="../procesar/procesarActualizarHorario.php" method="POST">
      <div class="agregarUsuario-titulo">
          <h3>Editar Materia</h3>
      </div>
      <div class="agregarUsuario-grupo">

      <input type="hidden" name="id_horario" value="<?php echo $mostrar['id_horario']?>">
  <h6></h6>

      <p class="titulo-editar-materia-izquierdo">Hora</p>
      <input type="time" name="horario" class="editar-materia-hora" value="<?php echo $mostrar['horario']?>">

        <p class="titulo-editar-materia-izquierdo">Lunes</p>
        <select class="editar-materia-lunes" name="Lunes">
          <option value="<?php echo $mostrar['Lunes']?>"><?php echo $mostrar['Lunes']?></option>
          <?php
          while ($mostrarMateria= mysqli_fetch_assoc($sqlConsultaMateria)) {

          ?>
          <option value="<?php echo $mostrarMateria['materia'];?>"><?php echo $mostrarMateria['materia'];?></option>
          <?php } ?>

        </select>

        <p class="titulo-editar-materia-izquierdo">Martes</p>
        <select class="editar-materia-martes" name="Martes">
          <option value="<?php echo $mostrar['Martes']?>"><?php echo $mostrar['Martes']?></option>
          <?php
          while ($mostrarMateriaMartes= mysqli_fetch_assoc($sqlConsultaMateriaMartes)) {

          ?>
          <option value="<?php echo $mostrarMateriaMartes['materia'];?>"><?php echo $mostrarMateriaMartes['materia'];?></option>
          <?php } ?>

        </select>

        <div class="editar-materia-grupo-derecho">

                  <p class="titulo-editar-materia">Miercoles</p>
                  <select class="editar-materia-miercoles" name="Miercoles">
                    <option value="<?php echo $mostrar['Miercoles']?>"><?php echo $mostrar['Miercoles']?></option>
            <?php
          while ($mostrarMateriaMiercoles= mysqli_fetch_assoc($sqlConsultaMateriaMiercoles)) {

          ?>
          <option value="<?php echo $mostrarMateriaMiercoles['materia'];?>"><?php echo $mostrarMateriaMiercoles['materia'];?></option>
          <?php } ?>


                  </select>


                  <p class="titulo-editar-materia">Jueves</p>
                  <select class="editar-materia-jueves" name="Jueves">
                    <option value="<?php echo $mostrar['Jueves']?>"><?php echo $mostrar['Jueves']?></option>
            <?php
          while ($mostrarMateriaJueves= mysqli_fetch_assoc($sqlConsultaMateriaJueves)) {

          ?>
          <option value="<?php echo $mostrarMateriaJueves['materia'];?>"><?php echo $mostrarMateriaJueves['materia'];?></option>
          <?php } ?>

          </select>


     <p class="titulo-editar-materia">Viernes</p>
     <select class="editar-materia-viernes" name="Viernes">
      <option value="<?php echo $mostrar['Viernes']?>"><?php echo $mostrar['Viernes']?></option>
            <?php
          while ($mostrarMateriaViernes= mysqli_fetch_assoc($sqlConsultaMateriaViernes)) {

          ?>
          <option value="<?php echo $mostrarMateriaViernes['materia'];?>"><?php echo $mostrarMateriaViernes['materia'];?></option>
          <?php } ?>



                  </select>

        </div>

        <div class="agregar-usuario-botones">
          <p>¿Deseas <a href="editarMateriaAdmin.php">Regresar</a> ?</p>
        <input type="submit" value="Guardar" class="boton-guardar-2">
        </div>

      </div>
    </form>
  </body>
</html>
