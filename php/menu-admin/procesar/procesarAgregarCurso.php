<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../../iniciarSesion.php");
 }
 ?>
<?php
include("../../../conexionbd/conectar.php");

$newCurso= $_POST['newCurso'];

$ingresarCurso= "INSERT INTO curso(nombre_curso) VALUES ('$newCurso')";

$consultaCurso = "SELECT nombre_curso FROM curso WHERE nombre_curso='$newCurso'";

$sqlCurso=mysqli_query($conexionbd,$consultaCurso);
$filasCurso= mysqli_num_rows($sqlCurso);
if ($filasCurso>0) {

    echo "<script>
    alert('Este Curso ya existe');
    window.location.replace('../accion/agregarCurso.php');
    </script>";

    exit;
}


$sqlIngresarCurso=mysqli_query($conexionbd,$ingresarCurso);


if (!$sqlIngresarCurso) {
    echo "<script>
    alert('Error al agregar el curso.');
    window.location.replace('../accion/agregarCurso.php');
    </script>";

 }else {
   echo "<script>
   alert('El curso se agrego correctamente.');
   window.location.replace('../accion/agregarCurso.php');
   </script>";
}


?>
