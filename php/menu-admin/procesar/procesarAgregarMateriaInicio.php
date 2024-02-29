<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../iniciarSesion.php");
 }
 ?>
<?php
include("../../../conexionbd/conectar.php");

$newMateria= $_POST['newMateria'];

$ingresarMateria= "INSERT INTO asignatura(materia) VALUES ('$newMateria')";

$consultaMateria = "SELECT materia FROM asignatura WHERE materia='$newMateria'";

$sqlMateteria=mysqli_query($conexionbd,$consultaMateria);
$filasMateria= mysqli_num_rows($sqlMateteria);
if ($filasMateria>0) {

    echo "<script>
    alert('Esta Materia ya existe.');
    window.location.replace('../accion/agregarMateriaInicio.php');
    </script>";

    exit;
}


    $sqlIngresarMateria=mysqli_query($conexionbd,$ingresarMateria);


if (!$sqlIngresarMateria) {
    echo "<script>
    alert('Error al agregar la materia.');
    window.location.replace('../accion/agregarMateriaInicio.php');
    </script>";

 }else {
    echo "<script>
    alert('La materia ha sido agregada correctamente.');
    window.location.replace('../accion/agregarMateriaInicio.php');
    </script>";
}


?>
