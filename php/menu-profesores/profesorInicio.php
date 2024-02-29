<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../iniciarSesion.php");
 }
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
    <title>Profesor/Inicio</title>

  </head>
  <body id="fondo-azul">
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
    <main class="main-datos-personales">

        <table class="tabla-inicio-admin">
        <tr>

        <th><a href="" class="links-inicio-admin"><img src="../../imagenes/iconos/libro-abierto.png" title="Materias y Horarios"><p>Materias y Horarios</p></a></th>
        <div class="contenedor-td">
        <td><a href="materiasProfesor.php"><img src="../../imagenes/iconos/ver pequeño.png"><p>Visualizar</p></a></td>
       <td></td>
       <td></td>
       <td></td>
        </div>

         </tr>
         <tr>

        <th><a href="" class="links-inicio-admin"><img src="../../imagenes/iconos/libro-abierto.png" title="Materias y Horarios"><p>Estudiantes</p></a></th>
        <div class="contenedor-td">
        <td><a href="visualizarEstudiantes.php"><img src="../../imagenes/iconos/ver pequeño.png"><p>Visualizar</p></a></td>

      </div>

         </tr>
         <tr>

        <th><a href="" class="links-inicio-admin"><img src="../../imagenes/iconos/libro-abierto.png" title="Materias y Horarios"><p>Curso y Asistencia</p></a></th>
        <div class="contenedor-td">
        <td><a href="cursoProfesor.php"><img src="../../imagenes/iconos/ver pequeño.png"><p>Visualizar</p></a></td>
          <td><a href="editarCurso.php"><img src="../../imagenes/iconos/boligrafo.png"><p>Editar Asistencia</p></a></td>
          </div>

      </tr>
       <tr>

        <th><a href="" class="links-inicio-admin"><img src="../../imagenes/iconos/libro-abierto.png" title="Materias y Horarios"><p>Calificaciones</p></a></th>
        <div class="contenedor-td">
        <td><a href="profesorNota.php"><img src="../../imagenes/iconos/ver pequeño.png"><p>Ver Notas</p></a></td>
        <td><a href="accion/editarNotasProfesorElegir.php"><img src="../../imagenes/iconos/boligrafo.png"><p>Editar Notas</p></a></td>
        <td><a href="accion/agregarNotasProfesorElegir.php"><img src="../../imagenes/iconos/boton-mas.png"><p>Agregar Notas</p></a></td>

      </div>

         </tr>
      </table>


    </main>
    <footer>
        <p>&copy;Todos los Derechos Reservados - Mentes Informaticas 2022</p>
    </footer>
  </body>
</html>
