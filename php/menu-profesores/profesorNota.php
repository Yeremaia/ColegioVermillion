
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
    <title>Profesor/Calificaciones/Visualizar</title>
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
    <?php
      include("../../conexionbd/conectar.php");
          $consultaNombre="SELECT nombre_curso,id_curso FROM curso WHERE id_curso='$curso'";
          $resultadoNombre = mysqli_query($conexionbd, $consultaNombre);
          $asociar_curso=mysqli_fetch_assoc($resultadoNombre);

          $consultaCurso="SELECT nombre_curso,id_curso FROM curso ";
          $resultadoCurso = mysqli_query($conexionbd, $consultaCurso);
    ?>
    <main>
      <?php echo $asignatura;?>

        <h3 class="titulo-asistencia">Estudiantes de <?php echo $asociar_curso['nombre_curso']?><img src="../../imagenes/iconos/ojo-gris.png" alt="editar" class="editar_calificacion"></h3>

        <ul class="materia-botones">
          <li class="navegacion-inicio"><a href="#" class="color-navegacion">Visualizar</a></li>
          <li class=""><a href="accion/editarNotasProfesorElegir.php">Editar</a>
          <li class=""><a href="accion/agregarNotasProfesorElegir.php">Agregar</a></li>
          <li><a href="profesorInicio.php"><img src="../../imagenes/iconos/home.png" alt="inicio" title="Inicio" class="icono-home"></a></li>
        </ul>

        <form action="profesorNota.php" method="get" class="boton-select">
            <select name="seleccionar" id="seleccionar" onchange="this.form.submit()">
                <option value="0"><---seleccione un curso---></option>
                <?php while($visualizarCurso=mysqli_fetch_assoc($resultadoCurso)){?>

                <option value="<?php echo $visualizarCurso['id_curso']?>"><?php echo $visualizarCurso['nombre_curso']?></option>

                <?php } ?>
            </select>

        </form>

      <table id='tabla-estudiantes'>
          <?php
            $consulta_estudiante=  "SELECT DISTINCT id_estudiante,nombre,apellido,f_nacimiento,sexo,correo,direccion,telefono,usuario_estudiante,clave,numlista FROM estudiante e INNER JOIN curso c ON e.id_curso = c.id_curso WHERE c.id_curso='$curso' ORDER BY e.numlista";
            $resultado_estudiante = mysqli_query($conexionbd,$consulta_estudiante);
          ?>

        <tr class="titulos-nombres-estudiantes">
          <td>Lista</td>
          <td>Nombre</td>
          <td>Apellido</td>
          <td>Correo</td>
          <td></td>
        </tr>
        <?php while($mostrar=mysqli_fetch_assoc($resultado_estudiante)){?>
          <tr>
              <th class="lista-id"><?php echo $mostrar['numlista'];?></th>
              <th class="tabla-estudiantes-nombres"><?php echo $mostrar['nombre'];?></th>
              <th><?php echo $mostrar['apellido'];?></th>
              <th><?php echo $mostrar['correo'];?></th>
              <td> <a href="accion/verNotasProfesor.php?id=<?php echo $mostrar['id_estudiante'];?>"><img src="../../imagenes/iconos/ver.png" alt="editar" title="Editar <?php echo $mostrar['nombre']; ?>" class="editar_estudiante"></a> </td>
          </tr>
        <?php }?>

      </table>

    </main>
    <footer>
        <p>&copy;Todos los Derechos Reservados - Mentes Informaticas 2022</p>
    </footer>
  </body>
</html>
