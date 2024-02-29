<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../../iniciarSesion.php");
 }
?>
<?php
include("../../../conexionbd/conectar.php");
$id_profesor =$_POST['id_profesor'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$fecha=$_POST['f_nacimiento'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$curso=$_POST['id_curso'];
$asignatura=$_POST['id_asignatura'];
$clave=$_POST['clave'];
$usuario=$_POST['usuario'];
$sexo=$_POST['sexo'];


$insertar = "UPDATE profesor SET  nombre ='$nombre' ,apellido ='$apellido',direccion ='$direccion',telefono ='$telefono' ,correo ='$correo' ,id_asignatura ='$asignatura' ,usuario_profesor ='$usuario' ,clave ='$clave' ,id_curso ='$curso' ,f_nacimiento ='$fecha' ,sexo ='$sexo' WHERE id_profesor = '$id_profesor'";

 $resultado = mysqli_query($conexionbd, $insertar);
 if (!$resultado) {
      echo "
       <script>
       alert('error al actualizar');
       history.go(-2);
       </script> ";
        exit;
  }

  else {
       echo "
       <script>
       alert('el usuario a sido actualizo correctamente');
        history.go(-2);
       </script> ";
  }

 mysqli_close($conexionbd);

?>
