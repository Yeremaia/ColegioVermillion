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
    <title>Admin/Inicio</title>
  </head>
  <body>
    <?php
 include("../../conexionbd/conectar.php");

 $consulta = "SELECT a.id_asignatura,nombre,apellido,f_nacimiento,sexo,correo,direccion,telefono,materia FROM profesor p INNER JOIN asignatura a ON p.id_asignatura = a.id_asignatura WHERE p.usuario_profesor='$usuario'" ;
 $resultado = mysqli_query($conexionbd, $consulta);
 $mostrar = mysqli_fetch_assoc($resultado);

 ?>
    <header>
      <figure class="logo-sistema">
          <img src="../../imagenes/login-fondo.jpg" alt="Fondo Header" id="imagen-fondo-header">
      </figure>

      <nav class="menu-all">

        <div class="conexion_usuario">
          <a href="#"><img class= "saber-admin" src="../../imagenes/iconos/profeimg.jpg"></a>
          <div class="nombre_abajo">
            <p>Nombre: <class="texto-main-datos"><?php echo $mostrar['nombre'].' '.$mostrar['apellido']; ?>
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
            <li class="lista-menu"><a href="cerrarSesion.php">Cerrar Sesion <img src="../../imagenes/iconos/cerrar-sesion.png" id="imagen-cerrar-sesion"> </a></li>
        </ul>
    </nav>

  </header>
    <main class="main-datos-personales">

      <h4 class="datos-nombre">¡Bienvenido <span class="span-datos-nombre"><?php echo $usuario;?></span>!
      <a href="profesorInicio.php" class= "nose"><img class= "regresar-atras" src="../../imagenes/iconos/flecha-hacia-atras.png"></a></h4>

        <div class="main-all">

          <figure class="titulo-imagen-main">
              <img src="../../imagenes/logos/masteruser.png">
          </figure>

          <div class="texto-main">
            <p>Nombre completo: <span class="texto-main-datos"><?php echo $mostrar['nombre'].' '.$mostrar['apellido']; ?></span></p>

            <p>Correo: <span class="texto-main-datos"><?php echo $mostrar['correo']; ?></span></p>

            <p>Teléfono: <span class="texto-main-datos"><?php echo $mostrar['telefono']; ?></span></p>

            <p>Sexo: <span class="texto-main-datos"><?php echo $mostrar['sexo']; ?></span></p>

            <p>Dirección: <span class="texto-main-datos"><?php echo $mostrar['direccion']; ?></span></p>

            <p>Fecha de nacimiento: <span class="texto-main-datos"><?php echo $mostrar['f_nacimiento']; ?></span></p>

            <p>Materia: <span class="texto-main-datos"><?php echo $mostrar['materia']; ?></span></p>

          </div>
        </div>
      </div>
    </main>
    <footer>
        <p>&copy;Todos los Derechos Reservados - Mentes Informaticas 2022</p>
    </footer>
  </body>
</html>
