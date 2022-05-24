<?php
    //Inicia una sesión
    session_start();

    //Si no existe una sesion
    if(!array_key_exists("username",$_SESSION)){
        header('Location: http://localhost/Proyecto/views/login.php');
        exit();
    } 

?>

<div class="header">
        <div class="logo">
            <a href="../index.php"><img class="img-logo" src="../images/10.png" alt="LOGO"></a>
        </div>
        <div class="cart-icon">
            <a href="../views/cart.php"><img class="img-cart" src="../images/8.png" alt="Imagen carrito"></a>
        </div>
        <form action="../controllers/accessController.php" method="POST" class="logout-icon">
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" class="img-logout" value="Cerrar sesión">
        </form>
        <!-- <div class="profile-icon">
            <a href="../views/login.php"><img class="img-profile" src="../images/9.png" alt="Imagen perfil"></a>
        </div> -->
    </div>