<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../../iniciarSesion.php");
 }
?>
<?php
    include("../../../conexionbd/conectar.php");

$idMateria=$_POST['idAsignatura'];
$materia=$_POST['editarMateria'];

echo  $idMateria;
echo $materia;

$sqlAgregar=mysqli_query($conexionbd,"UPDATE asignatura SET materia='$materia' WHERE id_asignatura='$idMateria'");

if (!$sqlAgregar) {
    echo "
       <script>
       alert('Error al actualizar');
       window.location.replace('../accion/inicioEditarUnaMateria.php');
       </script> ";
        exit;
}else{
     echo "
       <script>
       alert('Se actualizo Correctamente');
       window.location.replace('../accion/editarUnaMateria.php');
       </script> ";
}


?>