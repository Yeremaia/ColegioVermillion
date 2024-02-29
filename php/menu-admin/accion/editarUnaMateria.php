<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../../iniciarSesion.php");
 }
?>
<?php
 error_reporting(E_ALL^E_NOTICE^E_WARNING);
$curso=$_GET["seleccionar"];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Mentes Informaticas">
    <link rel="icon" href="../../../imagenes/logos/logo.png">
    <link rel="stylesheet" href="../../../css/sistema.css">
    <title>Admin/Profesores/Agregar Usuario</title>
  </head>
   <style>
    #body{
      background: radial-gradient(circle, rgba(79,183,237,1) 0%, rgba(24,71,126,1) 100%);
    }

    #main-editarLasMaterias{
      min-height: auto;
      padding: 10px;
      display: flex;
      align-items: flex-start;
    }

    .table-materia-pocas-filas{
           width: 50%;
           margin: 0 auto;
           background-color: #fff;
           border-radius: 10px;
           box-shadow: 5px 5px 8px black;
    }

   .table-materia-pocas-filas tr{
       width: 90%;
       display: flex;
       margin: 0 auto;
       padding: 10px 0;
    }

    .table-materia-pocas-filas tr td{
      justify-content: center;
      display: flex;
      gap: 10px;
      width: 100%;

    }

     .table-materia-pocas-filas tr td p{
      font-size: 28px;
      font-family: sans-serif;
      font-weight: bold;
      color: darkblue;
     }

     .table-materia-pocas-filas tr td img {
       max-width: 28px;
     }

    .table-materia-pocas-filas tr th{
       font-size: 18px;
      font-family: sans-serif;
      justify-content: flex-start;
      display: flex;
      width: 90%;
      margin-left: 100px;
      gap:10px;
     }

/*Desde aqui edite abajo*/
     .iconoInicioMateria{
       position: absolute;
       top: 23%;
       right: 25%;
     }

     .iconoRegresarMateria{
       position: absolute;
       top: 23%;
       left: 27%;
     }

     .iconoInicioMateria a img, .iconoRegresarMateria a img{
        height: 25px;
      }

      .iconos-editar-materia a{
        position: absolute;
        right: 35%;
      }

      .iconos-editar-materia {
        top: 30%;
      }

      .iconos-editar-materia img {
        height: 20px;
      }

  </style>
  <body id="body">
       <header>
      <?php
    include("../../../conexionbd/conectar.php");

     $consultaSesion = "SELECT nombre,apellido FROM administrador WHERE usuario='$usuario'" ;
     $resultadoConsulta = mysqli_query($conexionbd, $consultaSesion);
     $mostrarSesion = mysqli_fetch_assoc($resultadoConsulta);

    ?>
      <figure class="logo-sistema">
          <img src="../../../imagenes/login-fondo.jpg" alt="Fondo Header" id="imagen-fondo-header">
      </figure>

      <nav class="menu-all">

        <div class="conexion_usuario">
          <img class= "saber-admin" src="../../../imagenes/iconos/image.jpg">
          <div class="nombre_abajo">
            <p>Nombre: <class="texto-main-datos"><?php echo $mostrarSesion['nombre'].' '.$mostrarSesion['apellido']; ?>
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
            <li class="lista-menu"><a href="../cerrarSesion.php">Cerrar Sesion <img src="../../../imagenes/iconos/cerrar-sesion.png" id="imagen-cerrar-sesion"> </a></li>

        </ul>
    </nav>

  </header>
  <?php
      include("../../../conexionbd/conectar.php");


   $consultaCurso= "SELECT * FROM asignatura ";
   $sqlCurso=mysqli_query($conexionbd, $consultaCurso)

  ?>
  <main id="main-editarLasMaterias">
    <div class="iconoRegresarMateria">
        <a href="../materiasAdmin.php"><img src="../../../imagenes/iconos/flecha-hacia-atras.png" alt="regresar" title="Regresar"></a>
    </div>

    <div class="iconoInicioMateria">
        <a href="../adminInicio.php"><img src="../../../imagenes/iconos/home.png" alt="home" title="Inicio"></a>
    </div>

         <table class="table-materia-pocas-filas">
          <tr class="tr-titulo-table-solo">

            <td class="editarMateriastd"><p> Editar Materia</p><img src="../../../imagenes/iconos/libro-abierto.png"></td>

          </tr>

          <?php while($mostrar=mysqli_fetch_assoc($sqlCurso)){?>

          <tr>
            <th class="iconos-editar-materia"><a href="inicioEditarUnaMateria.php?id=<?php echo $mostrar['id_asignatura']?>"><img src="../../../imagenes/iconos/editar.png" alt="editar" title="Editar <?php echo $mostrar['materia']?>" class="editar_materia"></a></th>
          </tr>

          <tr class="tr-titulo-table-columnas">
            <th><?php echo $mostrar['materia']?> </th>
          </tr>

   <?php }?>
        </table>
  </main>

    <footer>
        <p>&copy;Todos los Derechos Reservados - Mentes Informaticas 2022</p>
    </footer>

  </body>
</html>
