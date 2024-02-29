
<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../iniciarSesion.php");
 }
?>

<?php
include("../../conexionbd/conectar.php");

$consultaAdmin = "SELECT nombre,apellido FROM estudiante WHERE usuario_estudiante='$usuario'" ;
 $resultadoAdmin = mysqli_query($conexionbd, $consultaAdmin);
 $mostrar = mysqli_fetch_assoc($resultadoAdmin);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Mentes Informaticas">
    <link rel="icon" href="../../imagenes/logos/logo.png">
    <link rel="stylesheet" href="../../css/sistema.css">
    <title>Estudiante/Materia</title>
  </head>
  <body>
    <header>
      <figure class="logo-sistema">
          <img src="../../imagenes/login-fondo.jpg" alt="Fondo Header" id="imagen-fondo-header">
      </figure>
      <nav class="menu-all">

        <div class="conexion_usuario">
          <a href="informacionEstudiante.php"><img class= "saber-admin"  href ="" src="../../imagenes/iconos/usuarioblanco.jpg"></a>
          <div class="nombre_abajo">
            <p>Nombre: <class="texto-main-datos"><?php echo $mostrar['nombre'].' '.$mostrar['apellido']; ?>
            </p>
            <p>Usuario: Estudiante</p>
          </div>
        </div>

        <div class="contenedor-logo">
            <a href="estudianteInicio.php" class=" contenedor-logo-sistema">
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
        $consulta = "SELECT horario,Lunes,Martes,Miercoles,Jueves,Viernes FROM horario h INNER JOIN estudiante e ON h.id_curso=e.id_curso
      WHERE  e.usuario_estudiante =  '$usuario'";

      $resultado=mysqli_query($conexionbd, $consulta);

      ?>
      <div class="main-all">
        <h3 class="materia">Materias</h3>

        <ul>
          <li><a href="estudianteInicio.php"><img src="../../imagenes/iconos/home.png" alt="inicio" title="Inicio" class="icono-home"></a></li>
        </ul>

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
