<?php
    include("../../../conexionbd/conectar.php");

    $id=$_GET['id'];
    $consulta="DELETE FROM curso WHERE id_curso='$id'";
    $resultado= mysqli_query($conexionbd,$consulta);


    if (!$resultado) {
        echo "<script>alert('Error al eliminar el curso.');
        history.go(-3);</script>";


    }else {
        echo "<script>alert('El curso se elimino correctamente.');
      window.location.replace('../adminInicio.php');</script>";
    }


?>
