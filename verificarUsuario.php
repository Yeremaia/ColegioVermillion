<?php
session_start();
include("conexionbd/conectar.php");

$usuario = $_POST["usuario"];
$contrasena = $_POST["password"];

$consultaAdmin =  "SELECT * FROM administrador WHERE usuario='$usuario' AND clave='$contrasena' ";
$consultaProfesor =  "SELECT * FROM profesor WHERE usuario_profesor='$usuario' AND clave='$contrasena' ";
$consultaEstudiante =  "SELECT * FROM estudiante WHERE usuario_estudiante='$usuario' AND clave='$contrasena' ";

$resultadoAdmin=mysqli_query($conexionbd,$consultaAdmin);
$resultadoProfesor=mysqli_query($conexionbd,$consultaProfesor);
$resultadoEstudiante=mysqli_query($conexionbd,$consultaEstudiante);


$filasAdmin= mysqli_num_rows($resultadoAdmin);
$filasProfesor= mysqli_num_rows($resultadoProfesor);
$filasEstudiante=mysqli_num_rows($resultadoEstudiante);

if ($filasAdmin>0) {
  $_SESSION["usuario"]=$usuario;
    header("location: php/menu-admin/adminInicio.php?nombre=$usuario");
}
else {
   if ($filasProfesor>0) {
    $_SESSION["usuario"]=$usuario;
    header("location: php/menu-profesores/profesorInicio.php?nombre=$usuario");
    }else {
       if ($filasEstudiante>0) {
        $_SESSION["usuario"]=$usuario;
        header("location: php/menu-estudiante/estudianteInicio.php?nombre=$usuario");
       }else {
        echo "<script>alert('Error usuario o contraseña incorrectos')
         history.go(-1)
        </script>";
      }
    }
}
?>
