<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../iniciarSesion.php");
 }
?>
<?php
 error_reporting(E_ALL^E_NOTICE^E_WARNING);
$curso=$_POST["seleccionar"];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Mentes Informaticas">
    <link rel="icon" href="../imagenes/logos/logo.png">
    <link rel="stylesheet" href="../css/sistema.css">
    <title>Admin/Estudiantes</title>
  </head>
  <body>

    <?php
      include("../conexionbd/conectar.php");
          $consulta="SELECT nombre_curso,id_curso FROM curso WHERE id_curso='$curso'";
          $resultado = mysqli_query($conexionbd, $consulta);
          $asociar_curso=mysqli_fetch_assoc($resultado)
    ?>
    <main>
      <div class="main-all">
        <h3 id="titulo-estudiantes">Estudiantes de <?php echo $asociar_curso['nombre_curso']?></h3>

        <form action="agregrarAsistencia.php" method="POST" class="boton-select">
            <select name="seleccionar" id="seleccionar">
                <option><---seleccione un curso---></option>
                <option value="1">primero</option>
                <option value="2">segundo</option>
                <option value="3">Tercero</option>
                <option value="4">cuarto</option>
                <option value="5">quinto</option>
                <option value="6">sexto</option>
            </select>
               <input type="submit" value="Enviar">
        </form>

        <table id='tabla-estudiantes'>
            <?php
              $consulta_estudiante=  "SELECT DISTINCT id_estudiante,nombre,apellido,numlista FROM estudiante e INNER JOIN curso c ON e.id_curso = c.id_curso WHERE c.id_curso='$curso' ORDER BY numlista";
              $resultado_estudiante = mysqli_query($conexionbd,$consulta_estudiante);
            ?>

          <tr class="titulos-nombres-estudiantes">
            <td>Lista</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td></td>
            <td></td>
          </tr>
          <?php while($mostrar=mysqli_fetch_assoc($resultado_estudiante)){?>
            <tr>
                <th class="lista-id"><?php echo $mostrar['numlista'];?></th>
                <th class="tabla-estudiantes-nombres"><?php echo $mostrar['nombre'];?></th>
                <th><?php echo $mostrar['apellido'];?></th>

                <th><a href="procesarAgregarAsistenciaProfesor.php?id=<?php echo $mostrar['id_estudiante'];?>&curso=<?php echo $curso;?>">AGREGAR ASISTENCIA</a>

            </tr>
          <?php }?>

        </table>

        <div class="formulario-notas">
          <a href="cursoProfesor.php">Regresar</a>
        </div>

      </div>
    </main>
    <footer>
        <p>&copy;Todos los Derechos Reservados - Mentes Informaticas 2022</p>
    </footer>
  </body>
</html>
