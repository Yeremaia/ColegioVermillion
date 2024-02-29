
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
    <title>Estudiante/Calificaciones</title>
  </head>
  <style>
   #tabla-profesor {
        width: 100%;
  }


  </style>
  <body>
    <?php
    include("../../conexionbd/conectar.php");
    $consulta ="SELECT materia, notas_uno, notas_dos, notas_tres, notas_cuatro FROM calificaciones c INNER JOIN asignatura a ON c.id_asignatura = a.id_asignatura INNER JOIN estudiante e ON c.id_estudiante = e.id_estudiante WHERE e.usuario_estudiante='$usuario' ORDER BY c.id_asignatura";
    $consultaNombre="SELECT nombre,apellido FROM estudiante WHERE usuario_estudiante='$usuario'";
    $resultadoNombre= mysqli_query($conexionbd,$consultaNombre);
    $resultado = mysqli_query($conexionbd,$consulta);
    $mostrarNombre=mysqli_fetch_assoc($resultadoNombre);

    ?>
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
      <div class="encabezados-notas">
        <p>Calificaciones</p>
      </div>

      <ul>
        <li><a href="estudianteInicio.php"><img src="../../imagenes/iconos/home.png" alt="inicio" title="Inicio" class="icono-home"></a></li>
      </ul>

      <table id="tabla-profesor">
          <tr class="titulos-nombres-profesor">
              <td id="nombreEstudiante-notas"><?php echo $mostrarNombre['nombre'].' '.$mostrarNombre['apellido']?></td>
              <td>P1</td>
              <td>P2</td>
              <td>P3</td>
              <td>P4</td>
              <td>Promedio</td>
              <td></td>
          </tr>
   <?php while($mostrar=mysqli_fetch_assoc($resultado)){?>
          <tr>
              <th class="materia-notas"><?php echo $mostrar['materia']; ?></th>
              <th><?php echo $mostrar['notas_uno']; ?></th>
              <th><?php echo $mostrar['notas_dos']; ?></th>
              <th><?php echo $mostrar['notas_tres']; ?></th>
              <th><?php echo $mostrar['notas_cuatro']; ?></th>

              <?php
                    $notaUno=$mostrar["notas_uno"];
                    $notaDos=$mostrar["notas_dos"];
                    $notaTres=$mostrar["notas_tres"];
                    $notaCuatro=$mostrar["notas_cuatro"];

                  $promedio=(($notaUno+$notaDos+$notaTres+$notaCuatro)/4);



                  if($promedio>69){
                     $aprobado="Aprobado";
                   }
                     else{
                          $aprobado="Reprobado";
                     }

              ?>
              <th><?php echo ceil($promedio);?></th>
              <th><?php echo $aprobado?></th>


          </tr>
<?php }?>
      </table>
    </main>
    <footer>
        <p>&copy;Todos los Derechos Reservados - Mentes Informaticas 2022</p>
    </footer>
  </body>
</html>
