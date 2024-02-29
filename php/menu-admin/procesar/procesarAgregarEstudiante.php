<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../../iniciarSesion.php");
 }
?>
<?php
include("../../../conexionbd/conectar.php");
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$fecha=$_POST['fecha'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$curso=$_POST['curso'];
$clave=$_POST['clave'];
$usuario=$_POST['usuario'];
$sexo=$_POST['sexo'];
$lista=$_POST['lista'];



$insertar = "INSERT  INTO estudiante(nombre, apellido, f_nacimiento, sexo, direccion, telefono, usuario_estudiante, clave, id_curso, numlista, correo) VALUES ('$nombre', '$apellido', '$fecha', '$sexo', '$direccion', '$telefono', '$usuario', '$clave', '$curso', '$lista', '$correo')";

if (mysqli_num_rows($verificar_usuario)>0) {
    echo "
     <script>
     alert('El usuario ya existe');
     history.go(-1);
     </script> ";
     exit;
}

$verificar_lista = mysqli_query($conexionbd,"SELECT * FROM estudiante WHERE numlista='$lista' AND id_curso='$curso'");

if (mysqli_num_rows($verificar_lista)>0) {
  echo "
   <script>
   alert('La lista en este curso ya existe');
    history.go(-1);
   </script> ";
    exit;
}

$verificar_correo = mysqli_query($conexionbd,"SELECT * FROM estudiante WHERE correo='$correo'");

if (mysqli_num_rows($verificar_correo)>0) {
  echo "
   <script>
   alert('El correo ya existe');
    history.go(-1);
   </script> ";
    exit;
}

 $resultado = mysqli_query($conexionbd, $insertar);
 if (!$resultado) {
     echo "<script>alert('Error al registrarse');
     window.location.replace('../accion/agregarEstudiante.php');</script>";


 }else {
     echo "<script>alert('el usuario a sido registrado correctamente');
   window.location.replace('../estudiante.php');</script>";
 }

 mysqli_close($conexionbd);

?>
