<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../../iniciarSesion.php");
 }
?>
<?php
include("../../../conexionbd/conectar.php");
$lunes=$_POST['lunes'];
$martes=$_POST['martes'];
$miercoles=$_POST['miercoles'];
$jueves=$_POST['jueves'];
$viernes=$_POST['viernes'];
$id_asistencia=$_POST['id_asistencia'];



$insertar = "UPDATE asistencia SET lunes ='$lunes', martes ='$martes', miercoles ='$miercoles', jueves ='$jueves', viernes ='$viernes' WHERE id_asistencia = '$id_asistencia'";

 $resultado = mysqli_query($conexionbd, $insertar);
 if (!$resultado) {
      echo "
       <script>
       alert('Error al actualizar');
       window.location.replace('../accion/editarCursoAdmin.php');
       </script> ";
        exit;
  }

  else {
       echo "
       <script>
       alert('La asistencia a sido actualizo correctamente');
      window.location.replace('../accion/elegirEditarCursoAdmin.php');
       </script> ";
  }

 mysqli_close($conexionbd);

?>
