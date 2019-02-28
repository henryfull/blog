
<?php 
	if(empty($_SESSION["user"])){
		header("Location:?c=loginregister&a=Login");
	}
	else{
?>

<section class="form-noticia-block">

	<form action="?c=News&a=Guardar" method="POST" name="formRegister" enctype="multipart/form-data" >


		<div id="bloque-editor"> 
			
			<?php include("editortexto.php"); ?>

		</div>
		<br>

	</form>
	
		
<?php }	?>
	
	


</section>

<script src="view/js/editor.js"></script>