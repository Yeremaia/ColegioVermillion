<?php
session_start();
 $usuario = $_SESSION['usuario'];
 if(!isset($usuario)){
   header("location: ../iniciarSesion.php");
 }
?>
<?php

include("../../../conexionbd/conectar.php");


$estudiante= $_GET['id'];


$consulta= "SELECT a.id_asignatura,a.materia FROM calificaciones c INNER JOIN estudiante e ON c.id_estudiante= e.id_estudiante INNER JOIN asignatura a ON c.id_asignatura=a.id_asignatura WHERE e.id_estudiante='$estudiante' ORDER BY a.id_asignatura";
$sql=mysqli_query($conexionbd,$consulta);
$VerificarRegistro = mysqli_num_rows($sql);

$numeroMayorAsignatura="SELECT  MAX(id_asignatura) FROM asignatura";
$sqlNumeroMayor=mysqli_query($conexionbd,$numeroMayorAsignatura);
$mostrarNumeroMayor=mysqli_fetch_assoc($sqlNumeroMayor);

$numeroMayorID="SELECT MAX(id_asignatura) FROM calificaciones WHERE id_estudiante='$estudiante'";
$sqlNumeroID=mysqli_query($conexionbd,$numeroMayorID);
$mostrarNumeroID=mysqli_fetch_assoc($sqlNumeroID);

if($VerificarRegistro==0){
  for ($i=0; $i <= $mostrarNumeroMayor['MAX(id_asignatura)']; $i++) {
    $consultaAgregarNotas = "INSERT INTO calificaciones(notas_uno,notas_dos,notas_tres,notas_cuatro,id_asignatura,id_estudiante) VALUES(0,0,0,0,'$i','$estudiante') ";
    $sqlAgregarNotas = mysqli_query($conexionbd,$consultaAgregarNotas);
  }
     if(!$sqlAgregarNotas){
       echo "
       <script>
          alert('error al registrarse');
        window.location.replace('agregarNotasProfesorElegir.php');
       </script> ";
       exit;
       }
       else {
         echo "
          <script>
           alert('ya se agregaron las notas del estudiante');
        window.location.replace('agregarNotasProfesorElegir.php');
         
          </script> ";
           }
}
elseif ($VerificarRegistro>0 && $VerificarRegistro<$mostrarNumeroMayor['MAX(id_asignatura)']) {


  for ($i=$mostrarNumeroID['MAX(id_asignatura)']; $i <= $mostrarNumeroMayor['MAX(id_asignatura)']; $i++) {
  
   
     $consultaAgregarNotas = "INSERT INTO calificaciones(notas_uno,notas_dos,notas_tres,notas_cuatro,id_asignatura,id_estudiante) VALUES(0,0,0,0,'$i','$estudiante') ";
     $sqlAgregarNotas = mysqli_query($conexionbd,$consultaAgregarNotas);
    
  }
 

  if(!$sqlAgregarNotas){
    echo "
    <script>
       alert('error al registrarse');
        window.location.replace('agregarNotasProfesorElegir.php');
    
    </script> ";
    exit;
    }
    else {
      echo "
       <script>
        alert('ya se agregaron las notas del estudiante');
        window.location.replace('agregarNotasProfesorElegir.php');

       </script> ";
        }
}


else{
  echo "<script> alert('ya esta registrado ')
         window.location.replace('agregarNotasProfesorElegir.php');
   
    </script>";

}



?>
