<?php
session_start();
session_destroy();

  header("Location: ../iniciarSesion.php?sesion=true");
 ?>
