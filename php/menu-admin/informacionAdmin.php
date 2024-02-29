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
  <body>
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
            <li class="lista-menu"><a href="cerrarSesion.php">Cerrar Sesion <img src="../../imagenes/iconos/cerrar-sesion.png" id="imagen-cerrar-sesion"> </a></li>
        </ul>
    </nav>

  </header>
    <main class="main-datos-personales">
      <h4 class="datos-nombre">¡Bienvenido <span class="span-datos-nombre"><?php echo $usuario;?></span>!
      <a href="adminInicio.php" class= "nose"><img class= "regresar-atras" src="../../imagenes/iconos/flecha-hacia-atras.png"></a></h4>
      <div class="main-all">
        <figure class="titulo-imagen-main">
            <img src="../../imagenes/logos/useradmin.png">
        </figure>
        <div class="texto-main">
          <p>Nombre completo: <span class="texto-main-datos"><?php echo $mostrar['nombre'].' '.$mostrar['apellido']; ?></span></p>

          <p>Correo: <span class="texto-main-datos"><?php echo $mostrar['correo'] ?></span></p>

          <p>Teléfono: <span class="texto-main-datos"><?php echo $mostrar['telefono'] ?></span></p>

          <p>Sexo: <span class="texto-main-datos"><?php echo $mostrar['sexo'] ?></span></p>

          <p>Dirección: <span class="texto-main-datos"><?php echo $mostrar['direccion'] ?></span></p>

          <p>Fecha de nacimiento: <span class="texto-main-datos"><?php echo $mostrar['fecha_nacimiento'] ?></span></p>
        </div>
            </tr>
          </table>
        </div>
      </div>
    </main>
    <footer>
        <p>&copy;Todos los Derechos Reservados - Mentes Informaticas 2022</p>
    </footer>
  </body>
</html>
