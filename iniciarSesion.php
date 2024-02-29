<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagenes/logos/logo.png">
    <title>Colegio Vermillion/Inicio de sesion</title>
    <link rel="stylesheet" href="css/paginal_principal.css">
</head>
<body>
    <div class="padre">
         <header class="header-index">
            <div class="menu-imagen">
             <a href="index.html" class="logo-imagen">
                <h1>Colegio Vermillion</h1>
                <img src="imagenes/logos/logo.png" alt="">
            </a>

            <nav class="nav">
                <ul class="Lista-padre-de-navegacion">
                    <li class="listas-de-navegacion"><a href="index.html">INICIO</a></li>
                    <li class="listas-de-navegacion"><a href="admisiones.html">ADMISIONES</a></li>
                    <li class="listas-de-navegacion"><a href="contacto.html">CONTACTO</a></li>
                    <li class="listas-de-navegacion"><a href="academico.html">ACADEMICO</a></li>
                    <li class="listas-de-navegacion menu-inicioSesion"><a href="iniciarSesion.php">INICIAR <span>SESION</span></a></li>
                </ul>
            </nav>
            </div>

        </header>
        <div class="form-div">
        <form action="verificarUsuario.php" class="form" method="POST">
            <h2>Iniciar sesion</h2>
            <div class="inputs">
            <input type="text"name="usuario"placeholder="usuario" class="inputs-ingresar" pattern="[A-Za-z0-9]+" title="Solo se permiten letras y números." focus required checked>
            <!-- el pattern significa patron y dice que solo permite letras de la A hasta la Z minuscula o mayuscula, tambien permite los numeros del 0 hasta al 9. el signo de + significa que puede repetir 1 o mas veces los numeros -->
            <input type="password" name="password" placeholder="password"  class="inputs-ingresar" pattern="[A-Za-z0-9]+" required checked>
            <input type="submit" value="enviar" class="inputs-enviar" title="Solo se permiten letras y números.">
            </div>
        </form>
        </div>
    </div>
</body>
</html>
