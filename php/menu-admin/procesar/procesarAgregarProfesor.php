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
$asignatura=$_POST['asignatura'];
$clave=$_POST['clave'];
$usuario=$_POST['usuario'];
$sexo=$_POST['sexo'];



$insertar = "INSERT  INTO profesor(nombre, apellido, direccion, telefono, correo,id_asignatura, usuario_profesor, clave,id_curso, f_nacimiento,sexo) VALUES ('$nombre', '$apellido','$direccion','$telefono','$correo','$asignatura','$usuario','$clave','$curso','$fecha','$sexo')";


$verificar_usuario = mysqli_query($conexionbd, "SELECT * FROM profesor WHERE usuario_profesor='$usuario'");

if (mysqli_num_rows($verificar_usuario)>0) {
    echo "
     <script>
     alert('El usuario ya existe');
     history.go(-2);
     </script> ";
     exit;
}

$verificar_correo = mysqli_query($conexionbd,"SELECT * FROM profesor WHERE correo='$correo'");

if (mysqli_num_rows($verificar_correo)>0) {
  echo "
   <script>
   alert('El correo ya existe');
    history.go(-2);
   </script> ";
    exit;
}

 $resultado = mysqli_query($conexionbd, $insertar);

  if (!$resultado) {
      echo "<script>alert('Error al registrarse');
      window.location.replace('../accion/agregarProfesor.php');</script>";


  }else {
      echo "<script>alert('el usuario a sido registrado correctamente');
    window.location.replace('../profesor.php');</script>";
  }

 mysqli_close($conexionbd);

?>
