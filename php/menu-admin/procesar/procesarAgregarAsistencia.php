<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../../iniciarSesion.php");
 }
?>
<?php
include("../../../conexionbd/conectar.php");
$id=$_GET['id'];
$curso=$_GET['curso'];

$insertar = "INSERT  INTO asistencia(id_estudiante,lunes,martes,miercoles,jueves,viernes) VALUES ('$id','', '', '', '', '')";

$consulta=mysqli_query($conexionbd, "SELECT * FROM asistencia WHERE id_estudiante='$id'");
$lista= mysqli_num_rows($consulta);


if($lista>0){
echo $curso;
  echo "
   <script>
   alert('El usuario ya tiene su asistencia');
     history.go(-3);

   </script> ";
    exit;
}
else{
$resultado = mysqli_query($conexionbd, $insertar);
if (!$resultado) {
    echo "<script>alert('Error al agregar la asistencia');
    history.go(-3);</script>";


}else {
    echo "<script>alert('La asistencia ha sido agregada correctamente');
  window.location.replace('../cursoAdmin.php');</script>";
}
}



?>
