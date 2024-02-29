<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location:../../iniciarSesion.php");
 }

 if (isset($_POST["Guardar"])) {
  header("location: visualizarEditarMateriaInicio.php");
}
?>
<?php
  include("../../../conexionbd/conectar.php");
  $resultado=mysqli_query($conexionbd, "SELECT * FROM asignatura");
?>

<?php
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
    <link rel="icon" href="../imagenes/logos/logo.png">
    <link rel="stylesheet" href="../../../css/sistema.css">
    <title>Admin/Estudiantes/Agregar Usuario</title>
  </head>
  <body>

    <header>
        <figure class="logo-sistema">
            <img src="../../../imagenes/login-fondo.jpg" alt="Fondo Header" id="imagen-fondo-header">
        </figure>

        <nav class="menu-all">

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
   <h3 class="titulo-asistencia">Materias <img src="../../../imagenes/iconos/borrar-gris.png" title="Eliminar Materia"></h3>

   <ul class="materia-botones">
       <li><a href="../materiasAdmin.php">Visualizar</a></li>
       <li><a href="agregarMateriaInicio.php">Agregar</a></li>
       <li><a href="editarMateriaAdmin.php">Editar</a></li>
       <li class="navegacion-inicio"><a href="#">Eliminar</a></li>
       <li><a href="../AdminInicio.php"><img src="../../../imagenes/iconos/home.png" alt="inicio" title="Inicio" class="icono-home"></a></li>
   </ul>
      <div class="continer-table">

    <table class="tabla-eliminar-curso">
      <tr class="tabla-asistencia-titulo">
          <th class="constante-titulo">Materias</th>
          <th></th>
      </tr>

        <?php while($mostrar=mysqli_fetch_assoc($resultado)){?>
            <tr class="campos-tabla-asistencia">

              <th><?php echo $mostrar['materia']?></th>
              <th> <a href="../procesar/eliminarMateria.php?id=<?php echo $mostrar['id_asignatura']?>"><img src="../../../imagenes/iconos/borrar.png" alt="editar" title="Eliminar <?php echo $mostrar['materia']?>" class="editar_calificacion"></a> </th>
            </tr>
<?php }?>
        </table>
        </div>
   </main>
  </body>
</html>
