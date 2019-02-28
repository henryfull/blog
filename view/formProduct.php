<section class="login-block">
	<form action="?c=Tienda&a=Guardar" method="POST" name="formRegister" enctype="multipart/form-data" >
    	<input type="hidden" name="id" value="<?php empty($prod->name)? "": print $prod->id; ?>" />
		<input type="text" name="name" value="<?php empty($prod->name)? "": print $prod->name; ?>" placeholder="Nombre Producto"  >
		<input type="text" name="description" value="<?php empty($prod->description)? "":  print $prod->description; ?>" placeholder="Descripcion" >
<!--	<input type="text" name="image" placeholder="image" > -->					
		<input type="numeric" name="stock" value="<?php empty($prod->stock)? "":  print $prod->stock; ?>" placeholder="Stock" >
		<input type="numeric" name="price" value="<?php empty($prod->price)? "":  print $prod->price; ?>" placeholder="Precio" >
		<select name="category"> 
			<?php selectCategory($prod->category) ?>	
		</select>	
		<br>

		<?php



		?>

		<label class="uploadphotocomment">Foto del Producto</label><input value="<?php empty($prod->image)? "": print $prod->image; ?>" type="file" name="fichero_usuario" id="fileToUpload">


		<?php 
			if(empty($_SESSION["user"])){
		?>
				<input type="submit" value="Guardar" id="btn-register" class="enviar" name="sendproduct" > 	
		<?php	
			}
		?>
	</form>
	
	
	<?php 
			if(!empty($_SESSION["user"])){
	?>
	<a href="?c=Common&a=CerrarSesion" class="logout">Cerrar Sesion</a>

		<?php	
			}

			function selectCategory($category){
				$optiongender = array("Pasta", "Carne", "Verduras", "Pescado", "Legumbres", "Cereales", "fruta", "Lacteos");
				for($i = 0; $i < count($optiongender);$i++){
					if($optiongender[$i] == "$category"){
						echo '<option value="'. $optiongender[$i] .'"  selected > '. ucfirst($optiongender[$i]).' </option>';
					}
					else{
						echo '<option value="'. $optiongender[$i] .'" > '. ucfirst($optiongender[$i]).' </option>';
					}
				}
			}

				   
		?>
	
	

	<a href="?c=Tienda&a=Index" class="return">volver</a>

</section>

