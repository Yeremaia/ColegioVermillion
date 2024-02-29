
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
 $mostrarAdmin = mysqli_fetch_assoc($resultadoAdmin);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Mentes Informaticas">
    <link rel="icon" href="../../imagenes/logos/logo.png">
    <link rel="stylesheet" href="../../css/sistema.css">
    <title>Estudiante/Inicio</title>
  </head>
  <body id="fondo-azul">
    <header>
        <?php
    include("../../conexionbd/conectar.php");

    $consulta = "SELECT nombre,apellido,f_nacimiento,sexo,correo,direccion,telefono,numlista,nombre_curso FROM estudiante e INNER JOIN curso c ON e.id_curso = c.id_curso  WHERE e.usuario_estudiante = '$usuario'" ;
    $resultado = mysqli_query($conexionbd, $consulta);
    $mostrar = mysqli_fetch_assoc($resultado);

    ?>
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
            <a href="#" class=" contenedor-logo-sistema">
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

        <table class="tabla-inicio-admin">
        <tr>
        <th><a href="" class="links-inicio-admin"><img src="../../imagenes/iconos/libro-abierto.png" title="Materias y Horarios"><p>Materias y Horarios</p></a></th>

        <div class="contenedor-td">
          <td><a href="materiasEstudiante.php"><img src="../../imagenes/iconos/ver pequeño.png"><p>Visualizar</p></a></td>
        </div>
         </tr>

          <tr>

        <th><a href="" class="links-inicio-admin"><img src="../../imagenes/iconos/libro-abierto.png" title="Materias y Horarios"><p>Calificaciones</p></a></th>
        <div class="contenedor-td">
        <td><a href="estudianteNota.php"><img src="../../imagenes/iconos/ver pequeño.png"><p>Visualizar</p></a></td>

        </div>

         </tr>
           <tr>

        <th><a href="" class="links-inicio-admin"><img src="../../imagenes/iconos/DatosEs.png" title="Materias y Horarios"><p>Datos</p></a></th>
        <div class="contenedor-td">
        <td><a href="informacionEstudiante.php"><img src="../../imagenes/iconos/ver pequeño.png"><p>Visualizar</p></a></td>

        </div>

         </tr>

      </table>
    </main>
    <footer>
      <p>&copy;Todos los Derechos Reservados - Mentes Informaticas 2022</p>
    </footer>
  </body>
</html>
