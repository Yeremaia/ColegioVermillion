<?php
    include("../../../conexionbd/conectar.php");

    $id= $_GET["id"];


    $consulta="DELETE FROM asignatura WHERE id_asignatura='$id' ";
    $resultado= mysqli_query($conexionbd,$consulta);


    if (!$resultado) {
        echo "<script>alert('error al eliminar la Materia');
        history.go(-3);</script>";


    }else {
        echo "<script>alert('la materia se elimino Correctamente');
      window.location.replace('../adminInicio.php');</script>";
    }


?>
