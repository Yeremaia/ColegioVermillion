<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../iniciarSesion.php");
 }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Mentes Informaticas">
    <link rel="icon" href="../../imagenes/logos/logo.png">
    <link rel="stylesheet" href="../../css/sistema.css">
    <title>Admin/Inicio</title>
  </head>
  <body id="fondo-azul">
    <?php
    include("../../conexionbd/conectar.php");

    $consulta = "SELECT nombre,apellido,correo,telefono,direccion,fecha_nacimiento,sexo FROM administrador WHERE usuario='$usuario'" ;
     $resultado = mysqli_query($conexionbd, $consulta);
     $mostrar = mysqli_fetch_assoc($resultado)

    ?>
    <header>
      <figure class="logo-sistema">
          <img src="../../imagenes/login-fondo.jpg" alt="Fondo Header" id="imagen-fondo-header">
      </figure>

      <nav class="menu-all">

        <div class="conexion_usuario">
          <a href="informacionAdmin.php"><img class= "saber-admin"  href ="" src="../../imagenes/iconos/image.jpg"></a>
          <div class="nombre_abajo">
            <p>Nombre: <class="texto-main-datos"><?php echo $mostrar['nombre'].' '.$mostrar['apellido']; ?>
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
            <li class="lista-menu"><a href="../cerrarSesion.php">Cerrar Sesion <img src="../../imagenes/iconos/cerrar-sesion.png" id="imagen-cerrar-sesion"> </a></li>
        </ul>
    </nav>

  </header>
    <main>
      <div class="continer-table">
        <table class="tabla-inicio-admin">
         <tr>

         <th><a href="materiasAdmin.php" class="links-inicio-admin"><img src="../../imagenes/iconos/libro-abierto.png" title="Materias y Horarios"><p>Materias y Horarios</p></a></th>
         <div class="contenedor-td">
         <td><a href="materiasAdmin.php"><img src="../../imagenes/iconos/ver pequeño.png"><p>Visualizar</p></a></td>
         <td><a href="accion/agregarMateriaInicio.php"><img src="../../imagenes/iconos/boton-mas.png"><p>Agregar</p></a></td>
         <td><a href="accion/editarMateriaAdmin.php"><img src="../../imagenes/iconos/boligrafo.png"><p>Editar</p></a></td>
         <td><a href="accion/eliminarMateria.php"><img src="../../imagenes/iconos/borrar pequeño.png"><p>Eliminar</p></a></td>
         </div>

          </tr>

          <tr>

         <th><a href="profesor.php" class="links-inicio-admin"><img src="../../imagenes/logos/masteruser.png" title="Profesor"><p>Profesor</p></a></th>
         <div class="contenedor-td">
         <td><a href="profesor.php"><img src="../../imagenes/iconos/ver pequeño.png"><p>Visualizar</p></a></td>
         <td><a href="accion/agregarProfesor.php"><img src="../../imagenes/iconos/boton-mas.png"><p>Agregar</p></a></td>
         <td><a href="accion/elegirEditarProfesor.php"><img src="../../imagenes/iconos/boligrafo.png"><p>Editar</p></a></td>
         <td><a href="accion/elegirEliminarProfesor.php"><img src="../../imagenes/iconos/borrar pequeño.png"><p>Eliminar</p></a></td>
         </div>

          </tr>
          <tr>

         <th><a href="estudiante.php" class="links-inicio-admin"><img src="../../imagenes/logos/studentuser.png" title="Estudiante"><p>Estudiante</p></a></th>
         <div class="contenedor-td">
         <td><a href="estudiante.php"><img src="../../imagenes/iconos/ver pequeño.png"><p>Visualizar</p></a></td>
         <td><a href="accion/agregarEstudiante.php"><img src="../../imagenes/iconos/boton-mas.png"><p>Agregar</p></a></td>
         <td><a href="accion/elegirEditarEstudiante.php"><img src="../../imagenes/iconos/boligrafo.png"><p>Editar</p></a></td>
         <td><a href="accion/elegirEliminarEstudiante.php"><img src="../../imagenes/iconos/borrar pequeño.png"><p>Eliminar</p></a></td>
         </div>

          </tr>
          <tr>

         <th><a href="cursoAdmin.php" class="links-inicio-admin"><img src="../../imagenes/iconos/aula.png" title="Cursos y Asistencias"><p>Cursos y Asistencias</p></a></th>
         <div class="contenedor-td">
         <td><a href="cursoAdmin.php"><img src="../../imagenes/iconos/ver pequeño.png"><p>Visualizar</p></a></td>
         <td><a href="accion/agregarAsistencia.php"><img src="../../imagenes/iconos/boton-mas.png"><p>Agregar</p></a></td>
         <td><a href="accion/elegirEditarCursoAdmin.php"><img src="../../imagenes/iconos/boligrafo.png"><p>Editar</p></a></td>
         <td><a href="accion/elegirEliminarCurso.php"><img src="../../imagenes/iconos/borrar pequeño.png"><p>Eliminar</p></a></td>
         </div>

          </tr>
        </table>
      </div>
    </main>
    <footer>
        <p>&copy;Todos los Derechos Reservados - Mentes Informaticas 2022</p>
    </footer>
  </body>
</html>
