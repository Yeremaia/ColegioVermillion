<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../../../iniciarSesion.php");
 }
?>
<?php
include("../../../conexionbd/conectar.php");
 $id=$_POST['id'];
 $nota_uno=$_POST['nota_uno'];
 $nota_dos=$_POST['nota_dos'];
 $nota_tres=$_POST['nota_tres'];
 $nota_cuatro=$_POST['nota_cuatro'];
 echo $id;

 $consulta = "UPDATE calificaciones SET notas_uno='$nota_uno', notas_dos='$nota_dos', notas_tres='$nota_tres', notas_cuatro='$nota_cuatro' WHERE id_calificaciones='$id'";
 $sql = mysqli_query($conexionbd,$consulta);

 if (!$sql) {
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
