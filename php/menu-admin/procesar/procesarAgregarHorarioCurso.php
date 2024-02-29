<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../../iniciarSesion.php");
 }
?>

<?php 

$horario=$_GET['curso'];


include("../../../conexionbd/conectar.php");

$sqlConsultaCurso=mysqli_query($conexionbd,"SELECT * FROM horario WHERE id_curso='$horario'");
$filas=mysqli_num_rows($sqlConsultaCurso);

if ($filas>0) {
    echo "<script>
    alert('El horario ya existe');
    window.location.replace('../materiasAdmin.php');
    </script>";
}
else {
    for ($i=0; $i <= 7 ; $i++) { 
        $insertarHorario=mysqli_query($conexionbd, "INSERT INTO horario(Lunes, Martes, Miercoles, Jueves, Viernes, id_curso, horario,id_horario) VALUE('Matematicas','Matematicas','Matematicas','Matematicas','Matematicas','$horario','07:00 am','')");
    }
    if (! $insertarHorario) {
        echo "<script>
        alert('Error al  Agregar ');
        window.location.replace('../materiasAdmin.php');
        </script>";
    }
    else {
        echo "<script>
    alert('SE Agrego Correctamente');
    window.location.replace('../materiasAdmin.php');
    </script>";
    }
}


?>