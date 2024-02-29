
<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../iniciarSesion.php");
 }
?>
<?php
 error_reporting(E_ALL^E_NOTICE^E_WARNING);
$curso=$_GET["seleccionar"];
?>

<?php
include("../../conexionbd/conectar.php");

$consultaAdmin = "SELECT nombre,apellido FROM profesor WHERE usuario_profesor='$usuario'" ;
 $resultadoAdmin = mysqli_query($conexionbd, $consultaAdmin);
 $mostrarAdmin = mysqli_fetch_assoc($resultadoAdmin);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Mentes Informaticas">
    <link rel="icon" href="../../imagenes/logos/logo.png">
    <link rel="stylesheet" href="../../css/sistema.css">
    <title>Profesor/Curso</title>
  </head>
  <body>
    <header>
      <figure class="logo-sistema">
          <img src="../../imagenes/login-fondo.jpg" alt="Fondo Header" id="imagen-fondo-header">
      </figure>
      <nav class="menu-all">

        <div class="conexion_usuario">
          <a href="informacionProfesor.php"><img class= "saber-admin" src="../../imagenes/iconos/profeimg.jpg"></a>
          <div class="nombre_abajo">
            <p>Nombre: <class="texto-main-datos"><?php echo $mostrarAdmin['nombre'].' '.$mostrarAdmin['apellido']; ?>
            </p>
            <p>Usuario: Profesor</p>
          </div>
        </div>

        <div class="contenedor-logo">
            <a href="profesorInicio.php" class=" contenedor-logo-sistema">
              <h1>Colegio Vermillion</h1>
              <img src="../../imagenes/logos/logo.png" alt="">
            </a>
        </div>

          <ul class="lista-padre-menu">
            <li class="lista-menu"><a href="../cerrarSesion.php">Cerrar Sesion <img src="../../imagenes/iconos/cerrar-sesion.png" id="imagen-cerrar-sesion"></a></li>
          </ul>
      </nav>
    </header>
    <main>
      <?php
        include("../../conexionbd/conectar.php");


          $consulta = "SELECT DISTINCT e.nombre,e.numlista,c.nombre_curso,a.id_asistencia,lunes,martes,miercoles,jueves,viernes FROM asistencia a INNER JOIN estudiante e ON a.id_estudiante = e.id_estudiante INNER JOIN curso c ON e.id_curso = c.id_curso WHERE e.id_curso='$curso' ORDER BY e.numlista" ;
          $resultado_curso = mysqli_query($conexionbd, $consulta);

      ?>

      <?php
        include("../../conexionbd/conectar.php");
            $consultaNombre="SELECT nombre_curso,id_curso FROM curso WHERE id_curso='$curso'";
            $resultadoNombre = mysqli_query($conexionbd, $consultaNombre);
            $asociar_curso=mysqli_fetch_assoc($resultadoNombre);

            $consultaCurso="SELECT nombre_curso,id_curso FROM curso ";
            $resultadoCurso = mysqli_query($conexionbd, $consultaCurso);

      ?>

      <h3 class="titulo-asistencia">Curso de <?php echo $asociar_curso['nombre_curso']?></h3>

      <ul class="materia-botones">
        <li><a href="cursoProfesor.php">Visualizar</a></li>
        <li class="navegacion-inicio"><a href="editarCurso.php" class="color-navegacion">Editar</a></li>
        <li><a href="profesorInicio.php"><img src="../../imagenes/iconos/home.png" alt="inicio" title="Inicio" class="icono-home"></a></li>
      </ul>

      <form action="editarCurso.php" method="get" class="boton-select">
          <select name="seleccionar" id="seleccionar" onchange="this.form.submit()">
              <option value="0"><---seleccione un curso---></option>
              <?php while($visualizarCurso=mysqli_fetch_assoc($resultadoCurso)){?>

              <option value="<?php echo $visualizarCurso['id_curso']?>"><?php echo $visualizarCurso['nombre_curso']?></option>

              <?php } ?>
          </select>

      </form>

        <table class="tabla-asistencia">
            <tr class="tabla-asistencia-titulo">
              <th class="constante-asistencia">Lista</th>
              <th class="constante-asistencia">Estudiante</th>
              <th class="constante-asistencia">Lunes</th>
              <th class="constante-asistencia">Martes</th>
              <th class="constante-asistencia">Miercoles</th>
              <th class="constante-asistencia">Jueves</th>
              <th class="constante-asistencia">Viernes</th>
              <th class="constante-asistencia">Curso</th>
              <th></th>
          </tr>

        <?php while($mostrar=mysqli_fetch_assoc($resultado_curso)){?>

              <tr class="campos-tabla-asistencia">
                  <th><?php echo $mostrar['numlista'];?></th>
                  <th><?php echo $mostrar['nombre'];?></th>
                  <th class="campos-asistencias"><?php echo $mostrar['lunes'];?></th>
                  <th class="campos-asistencias"><?php echo $mostrar['martes'];?></th>
                  <th class="campos-asistencias"><?php echo $mostrar['miercoles'];?></th>
                  <th class="campos-asistencias"><?php echo $mostrar['jueves'];?></th>
                  <th class="campos-asistencias"><?php echo $mostrar['viernes'];?></th>
                  <th class="campos-asistencias"><?php echo $mostrar['nombre_curso'];?></th>

                  <th><a href="accion/editarCursoProfesor.php?id=<?php echo $mostrar['id_asistencia'];?>">Editar</a></th>
              </tr>
        <?php }?>

          </table>
          <div class="mini-explicacion">
              <p>P = <span>Presente</span></p>
              <p>A = <span>Ausente</span></p>
              <p>T = <span>Tardanza</span></p>
          </div>
        </main>
        <footer>
            <p>&copy;Todos los Derechos Reservados - Mentes Informaticas 2022</p>
        </footer>
</body>
</html>
