
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
    <title>Admin/Profesor/Eliminar</title>
  </head>
  <body>
    <header id="header-profesor">
      <figure class="logo-sistema">
          <img src="../../../imagenes/login-fondo.jpg" alt="Fondo Header" id="imagen-fondo-header">
      </figure>
      <nav class="menu-all" id="menu-profesor">

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
    <main>

      <div class="main-all">
        <h3 class="titulo-asistencia">Eliminar profesor<img src="../../../imagenes/iconos/borrar-gris.png" title="Eliminar profesor"></h3>

        <ul class="materia-botones">
          <li><a href="../profesor.php">Visualizar</a></li>
          <li><a href="agregarProfesor.php">Agregar</a></li>
          <li><a href="elegirEditarProfesor.php">Editar</a></li>
          <li class="navegacion-inicio"><a href="#">Eliminar</a></li>
          <li><a href="../AdminInicio.php"><img src="../../../imagenes/iconos/home.png" alt="inicio" title="Inicio" class="icono-home"></a></li>
        </ul>
      <div class="continer-table">

        <table id='tabla-estudiantes'>
          <?php
        include("../../conexionbd/conectar.php");

            $consulta = "SELECT p.id_profesor,nombre,apellido,materia FROM profesor p INNER JOIN asignatura a ON p.id_asignatura = a.id_asignatura INNER JOIN curso c ON p.id_curso=c.id_curso";
            $conectar = mysqli_query($conexionbd, $consulta);
        ?>

          <tr class="titulos-nombres-estudiantes">
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Materia</td>
            <td></td>
          </tr>
          <?php while ($mostrar = mysqli_fetch_assoc($conectar)) {?>
            <tr>
                <th class="lista-id"><?php echo $mostrar['nombre'];?></th>
                <th class="tabla-estudiantes-nombres"><?php echo $mostrar['apellido'];?></th>
                <th><?php echo $mostrar['materia'];?></th>
                <td><a href="eliminarProfesor.php?id=<?php echo $mostrar["id_profesor"];?>"><img src="../../../imagenes/iconos/borrar.png" alt="eliminar" title="Eliminar <?php echo $mostrar['nombre'].' '.$mostrar['apellido']; ?>" class="eliminar_estudiante"></a></td>

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
