<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../../iniciarSesion.php");
 }
 include("../../../conexionbd/conectar.php");


 $idAsignatura=$_SESSION['usuario'];

 $consultaIdAsignatura= "SELECT id_asignatura FROM profesor WHERE usuario_profesor='$idAsignatura'";
 $sqlIdAsignatura=mysqli_query($conexionbd,$consultaIdAsignatura);
 $VerIdAsignatura= mysqli_fetch_assoc($sqlIdAsignatura);

 $resultadoIdAsignatura = $VerIdAsignatura['id_asignatura'];


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Mentes Informaticas">
    <link rel="icon" href="../../../imagenes/logos/logo.png">
    <link rel="stylesheet" href="../../../css/sistema.css">
    <title>Admin/Calificaciones</title>
  </head>
  <body>

    <?php
       $estudiante = $_GET["id"];
       $consultaAdmin = "SELECT nombre,apellido FROM profesor WHERE usuario_profesor='$usuario'" ;
       $resultadoAdmin = mysqli_query($conexionbd, $consultaAdmin);
       $mostrarAdmin = mysqli_fetch_assoc($resultadoAdmin);
    ?>
     <header>
      <figure class="logo-sistema">
          <img src="../../../imagenes/login-fondo.jpg" alt="Fondo Header" id="imagen-fondo-header">
      </figure>
      <nav class="menu-all">

        <div class="conexion_usuario">
          <a href="informacionProfesor.php"><img class= "saber-admin" src="../../../imagenes/iconos/profeimg.jpg"></a>
          <div class="nombre_abajo">
            <p>Nombre: <class="texto-main-datos"><?php echo $mostrarAdmin['nombre'].' '.$mostrarAdmin['apellido']; ?>
            </p>
            <p>Usuario: Profesor</p>
          </div>
        </div>

        <div class="contenedor-logo">
            <a href="../profesorInicio.php" class=" contenedor-logo-sistema">
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
      <div class="encabezados-notas">
        <p>Calificaciones</p>
      </div>

        <table class="tablas-notas">
          <?php


         $consulta_calificaciones="SELECT DISTINCT id_calificaciones,materia,notas_uno,notas_dos,notas_tres,notas_cuatro FROM calificaciones c INNER JOIN estudiante e INNER JOIN asignatura a ON  c.id_estudiante = e.id_estudiante AND c.id_asignatura = a.id_asignatura  WHERE e.id_estudiante = '$estudiante' AND c.id_asignatura='$resultadoIdAsignatura' ";
         $conectar = mysqli_query($conexionbd, $consulta_calificaciones);

         $consulta_nombre= "SELECT nombre FROM estudiante e WHERE e.id_estudiante = '$estudiante'";
         $conectarNombre=mysqli_query($conexionbd,$consulta_nombre);

         $nombre=mysqli_fetch_assoc($conectarNombre);
          ?>

          <table class="tabla-asistencia">

            <tr class="tabla-asistencia-titulo">
              <th class="constante-asistencia"><?php echo $nombre["nombre"];?></th>
              <th class="constante-asistencia">P1</th>
              <th class="constante-asistencia">P2</th>
              <th class="constante-asistencia">P3</th>
              <th class="constante-asistencia">P4</th>
              <th class="constante-asistencia">Nota Final</th>
              <th class="constante-asistencia">Estado</th>
            </tr>

            <?php while( $mostrar=mysqli_fetch_assoc($conectar)){ ?>
              
            <tr class="campos-tabla-asistencia">
                <th class="materia-notas"><?php echo $mostrar["materia"];?></th>
                <th><?php echo $mostrar["notas_uno"];?></</th>
                <th><?php echo $mostrar["notas_dos"];?></</th>
                <th><?php echo $mostrar["notas_tres"];?></</th>
                <th><?php echo $mostrar["notas_cuatro"];?></</th>

                <?php $notaUno=$mostrar["notas_uno"];
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
                <th><?php echo  ceil($promedio);?></th>
                <th><?php echo $aprobado;?></th>

              </tr>

          <?php }?>

        </table>




        <div class="formulario-notas">
          <a href="../profesorNota.php?curso=<?php echo $estudiante?>">Regresar</a>
        </div>

    </main>
    <footer>
        <p>&copy;Todos los Derechos Reservados - Mentes Informaticas 2022</p>
    </footer>
  </body>
</html>
