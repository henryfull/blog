<?php 
		if(empty($_SESSION["user"])){
?>
			
<section class="login-block">
	<form action="?/loginregister/checkUser" method="POST" class="form-login" >

		<input type="text" name="user" placeholder="Username" required />
		<input type="password" name="pass" placeholder="Contraseña" required />
		<input type="submit" value="ENVIAR" class="enviar" name="sendlogin" > 
		<a href="?/Loginregister/Index" class="enviar registerbtn">Registrarse</a>

	</form>

	<a href="?/Common/Index" class="return">volver</a>

</section>


<?php }
else {

	header("Location:?/Common/Index");
}

?>



	