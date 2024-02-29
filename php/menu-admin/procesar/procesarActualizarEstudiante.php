<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../../iniciarSesion.php");
 }
?>
<?php
include("../../../conexionbd/conectar.php");
$id_estudiante=$_POST['id_estudiante'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$fecha=$_POST['f_nacimiento'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$curso=$_POST['id_curso'];
$clave=$_POST['clave'];
$usuario=$_POST['usuario_estudiante'];
$sexo=$_POST['sexo'];
$numlista=$_POST['numlista'];






$insertar = "UPDATE estudiante SET nombre ='$nombre' ,apellido ='$apellido', f_nacimiento ='$fecha', sexo ='$sexo', direccion ='$direccion',telefono ='$telefono',usuario_estudiante ='$usuario' ,clave ='$clave' ,id_curso ='$curso' ,numlista ='$numlista' ,correo ='$correo' WHERE id_estudiante='$id_estudiante'";

$consulta = mysqli_query($conexionbd,"SELECT * FROM estudiante WHERE numlista='$numlista' AND id_curso='$curso'");

$verificar= mysqli_num_rows($consulta);

$numeroLista=mysqli_query($conexionbd,"SELECT numlista FROM estudiante WHERE id_estudiante='$id_estudiante'");
$numeroListaMostrar=mysqli_fetch_assoc($numeroLista);



if($numeroListaMostrar['numlista']!=$numlista && $verificar>0){
     echo "
     <script>
     alert('error el numero de lista ya existe');
     history.go(-3);
     </script> ";
      exit;

}
else{

 $resultado = mysqli_query($conexionbd, $insertar);
 if (!$resultado) {
      echo "
       <script>
       alert('Error al actualizar');
       history.go(-3);
       </script> ";
        exit;
  }

  else {
       echo "
       <script>
       alert('El usuario a sido actualizo correctamente');
        history.go(-3);
       </script> ";
  }
}
 mysqli_close($conexionbd);

?>
