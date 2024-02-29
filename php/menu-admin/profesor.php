<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../iniciarSesion.php");
 }
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
    <title>Admin/Profesores</title>
  </head>
  <?php
    include("../../conexionbd/conectar.php");
        $consulta="SELECT nombre_curso,id_curso FROM curso";
        $resultado = mysqli_query($conexionbd, $consulta);
        $asociar_curso=mysqli_fetch_assoc($resultado)
  ?>
  <body>
      <?php
    include("../../conexionbd/conectar.php");

    $consulta = "SELECT p.id_profesor,nombre,apellido,f_nacimiento,sexo,correo,usuario_profesor,clave,direccion,telefono,materia,nombre_curso FROM profesor p INNER JOIN asignatura a ON p.id_asignatura = a.id_asignatura INNER JOIN curso c ON p.id_curso=c.id_curso";
    $conectar = mysqli_query($conexionbd, $consulta);
    ?>

    <header id="header-profesor">
      <figure class="logo-sistema">
          <img src="../../imagenes/login-fondo.jpg" alt="Fondo Header" id="imagen-fondo-header">
      </figure>
      <nav class="menu-all" id="menu-profesor">

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

      <div class="main-all">
        <h3 class="titulo-asistencia">Profesores <img src="../../imagenes/iconos/ojo-gris.png" title="Ver profesor"></h3>

        <ul class="materia-botones">
          <li class="navegacion-inicio"><a href="#">Visualizar</a></li>
          <li><a href="accion/agregarProfesor.php">Agregar</a></li>
          <li><a href="accion/elegirEditarProfesor.php">Editar</a></li>
          <li><a href="accion/elegirEliminarProfesor.php">Eliminar</a></li>
          <li><a href="AdminInicio.php"><img src="../../imagenes/iconos/home.png" alt="inicio" title="Inicio" class="icono-home"></a></li>
        </ul>
      <div class="continer-table">

        <table id='tabla-profesor'>
          <tr class="titulos-nombres-profesor">
            <td>Nombre</td>
            <td>Apellido</td>
            <td>F_nacimiento</td>
            <td>Sexo</td>
            <td>Correo</td>
            <td>Usuario</td>
            <td>Contraseña</td>
            <td>Telefóno</td>
            <td>Dirección</td>
            <td>Asignatura</td>
            <td>Curso</td>
          </tr>
          <?php while ($mostrar = mysqli_fetch_assoc($conectar)) {
          ?>
            <tr>
                <th class="tabla-profesor-nombres"><?php echo $mostrar["nombre"]?></th>
                <th><?php echo $mostrar["apellido"]?></th>
                <th><?php echo $mostrar["f_nacimiento"]?></th>
                <th><?php echo $mostrar["sexo"]?></th>
                <th class="correo"><?php echo $mostrar["correo"]?></th>
                <th><?php echo $mostrar["usuario_profesor"]?></th>
                <th><?php echo $mostrar["clave"]?></th>
                <th><?php echo $mostrar["telefono"]?></th>
                <th><?php echo $mostrar["direccion"]?></th>
                <th><?php echo $mostrar["materia"]?></th>
                <th><?php echo $mostrar["nombre_curso"]?></th>

            </tr>
            <?php  }?>

        </table>
          </div>
      </div>
    </main>
    <footer>
        <p>&copy;Todos los Derechos Reservados - Mentes Informaticas 2022</p>
    </footer>
  </body>
</html>
