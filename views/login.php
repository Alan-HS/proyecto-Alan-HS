<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style_login.css">
    <title>Iniciar sesión</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="../index.php"><img class="img-logo" src="../images/10.png" alt="LOGO"></a>
        </div>
    </div>
    <div class="forms">
        <h1>Inicio de sesión</h1>
        <form action="../controllers/accessController.php" method="POST" class="form-container">
            <input type="hidden" name="_method" value="POST">
            <label for="nombre_usuario">Usuario:</label>
            <input type="text" name="nombre_usuario" required>
            <br>
            <label for="password_usuario">Contraseña:</label>
            <input type="password" name="password_usuario" required>
            <br>
            <!-- Con PHP se haran las condicionales -->
            <input class="iniciar-sesion" type="submit" value="Iniciar Sesión"></button>
            <!-- <a href="../index.html"><button class="iniciar-sesion" type="submit">Iniciar sesión como administrador</button></a> -->
        </form>
        <a href="../views/sign_up.php"><button class="registrarse">Crear cuenta nueva</button></a>
    </div>
    <div class="footer">
        <p class="contact-information">2022 DaebakGaming <br> <a class="email-webmaster" href="mailto:alanhernandezsand@gmail.com">Webmaster:alanhernandezsand@gmail.com</a></p>
    </div>
</body>
</html>