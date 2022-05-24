<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style_sign_up.css">
    <title>Registro</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="../index.php"><img class="img-logo" src="../images/10.png" alt="LOGO"></a>
        </div>
    </div>
    <div class="forms">
        <h1>Registrate</h1>
        <form action="../controllers/usersController.php" method="POST" class="form-container">
            <label for="nombre_usuario">Nombre de usuario:</label>
            <input type="text" name="nombre_usuario" required>
            <br>
            <!-- <label for="correo_usuario">Email:</label>
            <input type="text" name="correo_usuario" required>
            <br> -->
            <label for="password_usuario">Contraseña:</label>
            <input type="password" name="password_usuario" required>
            <br>
            <!-- <label for="contraseña_usuario_repetida">Confirmar contraseña:</label>
            <input type="password" name="contraseña_usuario_repetida" required>
            <br> -->
            <!-- <div class="terminos_condiciones">
                <input type="checkbox" name="check">
                <label for="check">Aceptar términos y condiciones</label>
            </div>
            <br> -->
            <input class="registrarse" type="submit" value="Crear cuenta nueva"></input>
        </form>
    </div>
    <div class="footer">
        <p class="contact-information">2022 DaebakGaming <br> <a class="email-webmaster" href="mailto:alanhernandezsand@gmail.com">Webmaster:alanhernandezsand@gmail.com</a></p>
    </div>
</body>
</html>