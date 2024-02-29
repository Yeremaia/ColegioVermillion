
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

$consultaAdmin = "SELECT nombre,apellido FROM administrador WHERE usuario='$usuario'" ;
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
    <title>Profesor/Materia</title>
  </head>
  <body>
  <header>
      <figure class="logo-sistema">
          <img src="../../imagenes/login-fondo.jpg" alt="Fondo Header" id="imagen-fondo-header">
      </figure>
      <nav class="menu-all">

        <div class="conexion_usuario">
          <a href="informacionAdmin.php"><img class= "saber-admin"  href ="" src="../../imagenes/iconos/image.jpg"></a>
          <div class="nombre_abajo">
            <p>Nombre: <class="texto-main-datos"><?php echo $mostrarAdmin['nombre'].' '.$mostrarAdmin['apellido']; ?>
            </p>
            <p>Usuario: Admin</p>
          </div>
        </div>
        <div class="contenedor-logo">
    <a href="adminInicio.php" class=" contenedor-logo-sistema">
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
        $consulta = "SELECT DISTINCT  id_horario,horario,Lunes,Martes,Miercoles,Jueves,Viernes FROM horario h
      WHERE  h.id_curso =  '$curso'";

      $resultado=mysqli_query($conexionbd, $consulta);
      ?>

      <div class="main-all">
        <?php
          include("../../conexionbd/conectar.php");
              $consultaNombre="SELECT nombre_curso,id_curso FROM curso WHERE id_curso='$curso'";
              $resultadoNombre = mysqli_query($conexionbd, $consultaNombre);
              $asociar_curso=mysqli_fetch_assoc($resultadoNombre);

              $consultaCurso="SELECT nombre_curso,id_curso FROM curso ";
              $resultadoCurso = mysqli_query($conexionbd, $consultaCurso);

        ?>

        <h3 class="titulo-asistencia">Materias de <?php echo $asociar_curso['nombre_curso']?><img src="../../imagenes/iconos/libro-abierto-gris.png" title="Ver estudiante de <?php echo $asociar_curso['nombre_curso']?>"></h3>

        <div class="imagen-icono-abajo">
          <a href="accion/visualizarLasMaterias.php">
              <img src="../../imagenes/iconos/visualizarMateria.png" alt="visualizarMateria" title="Visualizar Materias">
              <p>Visualizar Materias</p>
          </a>
        </div>
        <div class="imagen-icono-abajo-2">
          <a href="procesar/procesarAgregarHorarioCurso.php?curso=<?php echo $curso; ?>">
            <img src="../../imagenes/iconos/boton-mas.png" alt="" title="agregar horario">
            <p>Agregar Horario</p>
          </a>
        </div>

          <ul class="materia-botones">
              <li class="navegacion-inicio"><a href="#">Visualizar</a></li>
              <li><a href="accion/agregarMateriaInicio.php">Agregar</a></li>
              <li><a href="accion/editarMateriaAdmin.php">Editar</a></li>
              <li><a href="accion/eliminarMateria.php">Eliminar</a></li>
              <li><a href="AdminInicio.php"><img src="../../imagenes/iconos/home.png" alt="inicio" title="Inicio" class="icono-home"></a></li>
          </ul>

        <form action="materiasAdmin.php" method="get" class="boton-select">
            <select name="seleccionar" id="seleccionar" onchange="this.form.submit()">
                <option value="0"><---seleccione un curso---></option>
                <?php while($visualizarCurso=mysqli_fetch_assoc($resultadoCurso)){?>

                <option value="<?php echo $visualizarCurso['id_curso']?>"><?php echo $visualizarCurso['nombre_curso']?></option>

                <?php } ?>
            </select>

        </form>

      <div class="continer-table">
        <table id="table">
          <tr class="dias-semana">
            <td>Hora</td>
            <td>Lunes</td>
            <td>Martes</td>
            <td>Miercoles</td>
            <td>Jueves</td>
            <td>Viernes</td>
          </tr>
        <?php while($mostrar=mysqli_fetch_assoc($resultado)){?>
            <tr class="tr">

              <th><?php echo $mostrar['horario']?></th>
              <th><?php echo $mostrar['Lunes']?></th>
              <th><?php echo $mostrar['Martes']?></th>
              <th><?php echo $mostrar['Miercoles']?></th>
              <th><?php echo $mostrar['Jueves']?></th>
              <th><?php echo $mostrar['Viernes']?></th>
            </tr>
<?php }?>
        </table>

      </div>
    </main>
    <footer>
        <p>&copy;Todos los Derechos Reservados - Mentes Informaticas 2022</p>
    </footer>
  </body>
</html>
