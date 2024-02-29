<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../../iniciarSesion.php");
 }
?>
<?php
    include("../../../conexionbd/conectar.php");

    $id = $_GET['id'];

    $eliminar = "DELETE FROM estudiante WHERE id_estudiante='$id'";
    $resultadoEliminar = mysqli_query($conexionbd,$eliminar);


    if ($resultadoEliminar) {
      echo "<script>
      alert('Se ha eliminado correctamente el usuario');
      window.location.replace('elegirEliminarEstudiante.php');
      </script>";

    }else {
      echo "<script>
      alert('No se pudo eliminar el registro');
      window.location.replace('elegirEliminarEstudiante.php');
      </script>";
    }
?>
