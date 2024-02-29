<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../../iniciarSesion.php");
 }
?>
<?php
 error_reporting(E_ALL^E_NOTICE^E_WARNING);
$curso=$_POST["seleccionar"];

?>

<?php
include("../../../conexionbd/conectar.php");

$consultaAdmin = "SELECT nombre,apellido FROM administrador WHERE usuario='$usuario'" ;
 $resultadoAdmin = mysqli_query($conexionbd, $consultaAdmin);
 $mostrarAdmin = mysqli_fetch_assoc($resultadoAdmin);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Mentes Informaticas">
    <link rel="icon" href="../../../imagenes/logos/logo.png">
    <link rel="stylesheet" href="../../../css/sistema.css">
    <title>Admin/Curso/Agregar Asistencia</title>
  </head>
  <body>

    <header>
        <figure class="logo-sistema">
            <img src="../../../imagenes/login-fondo.jpg" alt="Fondo Header" id="imagen-fondo-header">
        </figure>

        <nav class="menu-all">

          <div class="conexion_usuario">
            <a href="../informacionAdmin.php"><img class= "saber-admin"  href ="" src="../../../imagenes/iconos/image.jpg"></a>
            <div class="nombre_abajo">
              <p>Nombre: <class="texto-main-datos"><?php echo $mostrarAdmin['nombre'].' '.$mostrarAdmin['apellido']; ?>
              </p>
              <p>Usuario: Admin</p>
            </div>
          </div>

          <div class="contenedor-logo">
              <a href="../adminInicio.php" class=" contenedor-logo-sistema">
                <h1>Colegio Vermillion</h1>
                <img src="../../../imagenes/logos/logo.png" alt="">
              </a>
          </div>

            <ul class="lista-padre-menu">
              <li class="lista-menu"><a href="../../cerrarSesion.php">Cerrar Sesion <img src="../../../imagenes/iconos/cerrar-sesion.png" id="imagen-cerrar-sesion"></a></li>
            </ul>
        </nav>
      </header>

    <?php
      include("../../../conexionbd/conectar.php");
          $consultaNombre="SELECT nombre_curso,id_curso FROM curso WHERE id_curso='$curso'";
          $resultadoNombre = mysqli_query($conexionbd, $consultaNombre);
          $asociar_curso=mysqli_fetch_assoc($resultadoNombre);

          $consultaCurso="SELECT nombre_curso,id_curso FROM curso ";
          $resultadoCurso = mysqli_query($conexionbd, $consultaCurso);

    ?>
    <main>
      <div class="main-all">
        <h3 class="titulo-asistencia">Agregar asistencia de <?php echo $asociar_curso['nombre_curso']?> <img src="../../../imagenes/iconos/agregar-gris.png" title="Agregar Asistencia de <?php echo $asociar_curso['nombre_curso']?>"></h3>

        <ul class="materia-botones">
          <li><a href="../cursoAdmin.php">Visualizar</a></li>
          <li class="navegacion-inicio"><a href="#" class="color-navegacion">Agregar</a></li>
          <li><a href="elegirEditarCursoAdmin.php">Editar</a></li>
          <li><a href="elegirEliminarCurso.php">Eliminar</a></li>
          <li><a href="../AdminInicio.php"><img src="../../../imagenes/iconos/home.png" alt="inicio" title="Inicio" class="icono-home"></a></li>
        </ul>

        <div class="imagen-icono-abajo">
          <a href="AgregarCurso.php">
              <img src="../../../imagenes/iconos/agregarCurso.png" alt="agregar-curso" title="Agregar Curso">
              <p>Agregar Curso</p>
          </a>
        </div>

        <form action="agregarAsistencia.php" method="POST" class="boton-select">
            <select name="seleccionar" id="seleccionar" onchange="this.form.submit()">
                <option value="0"><---Seleccione un curso---></option>
                <?php while($visualizarCurso=mysqli_fetch_assoc($resultadoCurso)){?>

                <option value="<?php echo $visualizarCurso['id_curso']?>"><?php echo $visualizarCurso['nombre_curso']?></option>

                <?php } ?>
            </select>

        </form>
      <div class="continer-table">

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

          </tr>
          <?php while($mostrar=mysqli_fetch_assoc($resultado_estudiante)){?>
            <tr>
                <th class="lista-id"><?php echo $mostrar['numlista'];?></th>
                <th class="tabla-estudiantes-nombres"><?php echo $mostrar['nombre'];?></th>
                <th><?php echo $mostrar['apellido'];?></th>

                <th><a href="../procesar/procesarAgregarAsistencia.php?id=<?php echo $mostrar['id_estudiante'];?>&curso=<?php echo $curso;?>">Agregar Asistencia</a></th>

            </tr>
          <?php }?>

        </table>
          </div>
      </div>
    </main>
    <footer>
        <p>&copy;Todos los Derechos Reservados - Mentes Informaticas 2022</p>
    </footer>
  </body>
</html>
