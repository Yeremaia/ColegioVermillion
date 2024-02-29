<?php
    include("../../../conexionbd/conectar.php");

    $id_horario = $_POST['id_horario'];
    $horario=$_POST['horario'];
    $Lunes = $_POST['Lunes'];
    $Martes = $_POST['Martes'];
    $Miercoles = $_POST['Miercoles'];
    $Jueves = $_POST['Jueves'];
    $Viernes = $_POST['Viernes'];


    $consulta="UPDATE horario SET horario='$horario',Lunes='$Lunes',Martes='$Martes',Miercoles='$Miercoles',Jueves='$Jueves',Viernes='$Viernes' WHERE id_horario = '$id_horario'";
    $resultado= mysqli_query($conexionbd,$consulta);


    if (!$resultado) {
        echo "<script>alert('error al actualizar los datos');
        history.go(-3);</script>";


    }else {
        echo "<script>alert('se actualizaron los datos Correctamente');
      window.location.replace('../adminInicio.php');</script>";
    }


?>
