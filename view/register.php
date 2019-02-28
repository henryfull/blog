<?php

?>
<section class="login-block">
    <form action="?c=loginregister&a=getRegisterUser" method="POST" name="formRegister">

        <input type="text" name="username" placeholder="Username" require>
        <input type="password" name="password" placeholder="Contraseña" require>
        <input type="password" name="passwordcopy" placeholder="Repetir Contraseña" require>
        <label class="checkin Icon Icon--circleError"><span id="msg-alert-pass"> </span></label>
        <input type="text" name="firstname" placeholder="Nombre" require>
        <input type="hidden" name="gender" value="1" placeholder="Nombre">
        <input type="submit" value="register" id="btn-register" class="enviar" name="sendwrite" disabled>
    </form>

    <?php 
    if (!empty($_SESSION["user"])) {
        ?>
    <form action="loginlogout.php" method="POST" class="block-logout">
        <input type="submit" value="LOGOUT" class="enviar" name="logout" />
    </form>
    <?php	
}
?>
    <a href="?c=Common&a=Index" class="return">volver</a>
    <script src="view/js/login.js"></script>
</section> 