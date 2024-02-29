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
    <title>Estudiante/Inicio</title>
  </head>
  <body>
    <?php
    include("../../conexionbd/conectar.php");

    $consulta = "SELECT nombre,apellido,f_nacimiento,sexo,correo,direccion,telefono,numlista,nombre_curso FROM estudiante e INNER JOIN curso c ON e.id_curso = c.id_curso  WHERE e.usuario_estudiante = '$usuario'" ;
    $resultado = mysqli_query($conexionbd, $consulta);
    $mostrar = mysqli_fetch_assoc($resultado)
    ?>

    <header>
      <figure class="logo-sistema">
          <img src="../../imagenes/login-fondo.jpg" alt="Fondo Header" id="imagen-fondo-header">
      </figure>

      <nav class="menu-all">

        <div class="conexion_usuario">
          <a href="#.php"><img class= "saber-admin"  href ="" src="../../imagenes/iconos/usuarioblanco.jpg"></a>
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
            <li class="lista-menu"><a href="cerrarSesion.php">Cerrar Sesion <img src="../../imagenes/iconos/cerrar-sesion.png" id="imagen-cerrar-sesion"> </a></li>
        </ul>
    </nav>

  </header>
    <main class="main-datos-personales">
      <h4 class="datos-nombre">¡Bienvenido <span class="span-datos-nombre"><?php echo $usuario;?></span>!
      <a href="estudianteInicio.php" class= "nose"><img class= "regresar-atras" src="../../imagenes/iconos/flecha-hacia-atras.png"></a></h4>
      <div class="main-all">
        <figure class="titulo-imagen-main">
            <img src="../../imagenes/logos/studentuser.png">
        </figure>
        <div class="texto-main">
          <p>Nombre completo: <span class="texto-main-datos"><?php echo $mostrar['nombre'].' '.$mostrar['apellido']; ?></span></p>

          <p>Correo: <span class="texto-main-datos"><?php echo $mostrar['correo'] ?></span></p>

          <p>Teléfono: <span class="texto-main-datos"><?php echo $mostrar['telefono'] ?></span></p>

          <p>Sexo: <span class="texto-main-datos"><?php echo $mostrar['sexo'] ?></span></p>

          <p>Dirección: <span class="texto-main-datos"><?php echo $mostrar['direccion'] ?></span></p>

          <p>Fecha de nacimiento: <span class="texto-main-datos"><?php echo $mostrar['f_nacimiento'] ?></span></p>
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
