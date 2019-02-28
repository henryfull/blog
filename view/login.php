<?php 
		if(empty($_SESSION["user"])){
?>
			
<section class="login-block">
	<form action="?c=loginregister&a=checkUser" method="POST" class="form-login" >

		<input type="text" name="user" placeholder="Username" required />
		<input type="password" name="pass" placeholder="Contraseña" required />
		<input type="submit" value="ENVIAR" class="enviar" name="sendlogin" > 
		<a href="?c=Loginregister&a=Index" class="enviar registerbtn">Registrarse</a>

	</form>

	<a href="../index.php" class="return">volver</a>

</section>


<?php }
else {

	header("Location:../index.php?c=Common&a=Index");
}

?>



	