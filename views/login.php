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
            <a href="../index.html"><img class="img-logo" src="../10.png" alt="LOGO"></a>
        </div>
    </div>
    <div class="forms">
        <h1>Inicio de sesión</h1>
        <div class="form-container">
            <label for="nombre_usuario">Email:</label>
            <input type="text" name="nombre_usuario" required>
            <br>
            <label for="contraseña_usuario">Contraseña:</label>
            <input type="password" name="contraseña_usuario" required>
            <br>
            <!-- Con PHP se haran las condicionales -->
            <a href="../index.html"><button class="iniciar-sesion" type="submit">Iniciar Sesión</button></a>
            <a href="../index.html"><button class="iniciar-sesion" type="submit">Iniciar sesión como administrador</button></a>
            <br>
            <a href="../views/sign_up.php"><button class="registrarse">Crear cuenta nueva</button></a>
        </div>
    </div>
    <div class="footer">
        <p class="contact-information">2022 DaebakGaming <br> <a class="email-webmaster" href="mailto:alanhernandezsand@gmail.com">Webmaster:alanhernandezsand@gmail.com</a></p>
    </div>
</body>
</html>