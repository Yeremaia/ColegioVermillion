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

    $eliminar = "DELETE FROM profesor WHERE id_profesor='$id'";
    $resultadoEliminar = mysqli_query($conexionbd,$eliminar);


    if ($resultadoEliminar) {
      echo "<script>
      alert('Se ha eliminado correctamente el usuario');
    history.go(-1);
      </script>";

    }else {
      echo "<script>
      alert('No se pudo eliminar el registro');
      history.go(-1);
      </script>";
    }
?>
