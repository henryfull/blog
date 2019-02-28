
<section id="products">
	<h3>Productos</h3>
	<div><a href="?c=Tienda&a=FormProduct" class="btn btnadd" >Añadir Producto</a></div>

	<ul class="list-products cabecera">
		<li>id</li>
		<li>Nombre</li>
		<li>precio</li>
		<li>Stock</li>
		<li>Cantidad</li>
		<li>Añadir</li>
	</ul>
	
	<ul class="productos">	
		<?php foreach($this->model->Mostrar() as $r): ?>
			<li class="list">
				<article>
					<div>
						<a href="?c=Tienda&a=Eliminar&id=<?php echo $r->id;?>">
							<img src="view/image/icon-drop.png" alt="borrar"/>
						<a href="?c=Tienda&a=Crud&id=<?php echo $r->id; ?>"><img src="view/image/icon-edit.png" alt="modificar" />
						<a id="linkVistaProducto" href="?c=Tienda&a=paginaproducto&id=<?php echo $r->id; ?>"><img src="view/image/icon-info.png" alt="más informacion"></a> 
				
		<!--			<a class="linkVistaProducto"><img src="view/image/icon-info.png" alt="más informacion"></a> 
-->	
					</div>
					<ul class="list-products ">
						<form action="?c=tienda&a=Carrito" method="post">	
							<li><input type="hidden" name="id" value="<?php echo $r->id; ?>"/><?php echo $r->id; ?> </li>
							<li><input type="hidden" name="name"value="<?php echo $r->name; ?>"/><?php echo $r->name; ?> </li>
							<li><input type="hidden" name="price" value="<?php echo $r->price; ?>"/><?php echo $r->price; ?> €</li>
							<li><input type="hidden" name="stock" value="<?php echo $r->stock; ?>"/><?php echo $r->stock; ?> </li>
							<li><input type="text" name="qty" value="<?php echo $r->quantity; ?>"/> </li>
							<li><button type="submit" name="add-cart" class="addcart"><img src="view/image/icon-add.png" alt="añadir al carrito"></button></li>
						</form>
					</ul>
				</article>
			</li>
    	<?php endforeach; ?>	
	</ul>
	
	
</section>
	<?php
		if(!empty($_SESSION['carrito'])){
			echo '<button class="icon_cart"><img src="view/image/icon-cart.png" alt="actualizar"> '; 

			echo "<span>" . count($_SESSION['carrito']) . "</span>";
		}

	?>

</button>

<section id="carrito">
	<div>
	<?php 
		if(!empty($_SESSION['carrito'])){
			$total = 0;
		//	print_r($_SESSION['carrito']);

			foreach ($_SESSION['carrito'] as $key => $value) {
		//		print_r($value);
				echo "<ul><form action='?c=Tienda&a=actualizarProductoCarrito' method='post'>";
				echo '<input type="hidden" name="id" value="'.$value[0].'"/>';
				echo '<input type="hidden" name="name" value="'.$value[1].'"/>';
				echo '<li>'.$value[1].'</li>'; // nombre
				echo '<li><span>x</span>'.'<input type="text" name="qty" value="'. $value[2] .' "/>'.'</li>' . // cantidad
				'<input type="hidden" name="stock" value="'.$value[4].'"/>' ; // stock
				echo '<li>'.$value[3].' €</li>'; // precio
				echo '<li>'. ($value[3] * $value[2]) .' € </li>'; // precio
				echo '<li><button class="update-cart" type="submit" name="update" value="delete" ><img src="view/image/icon-drop.png" alt="borrar"></button></li>';
				echo '<li><button class="update-cart" type="submit" name="update" value="update" ><img src="view/image/icon-update.png" alt="actualizar"></button></li>';
				echo "</form></ul>";
				$total += $value[3]* $value[2];
				
			}

			echo "<p class='precio_total'>Precio Total: <span>" . $total . " € </span></p>";
			echo "<button class='btn-final-cart'>Finalizar Compra</button>";
		}
		?>
	
	</div>
</section>
<section id="vista-producto">
	<h1><?php empty($prod->name)? "": print $prod->name; ?></h1>
	<img  src="" alt="imagen producto" width="auto" height="auto"/>
	<p class="descripcion"><?php empty($prod->description)? "": print $prod->description; ?></p>
	<p class="precio"> <?php empty($prod->price)? "": print $prod->price; ?><span>€</span></p>

</section>
	<a href="?c=Common&a=CerrarSesion" class="logout">Cerrar Sesion</a>

<script>
	document.getElementsByClassName("icon_cart")[0].addEventListener("click", ocultarCarrito);
	var btnlist = document.getElementsByClassName("linkVistaProducto");
	btnlist.foreach(addEventListener("click", verProductoModal));




	function verProductoModal(){

		document.getElementById("vista-producto");

	}

	function ocultarCarrito(){
		var carro = document.getElementById("carrito");
		if(carro.style.display == "block"){
			carro.style.display = "none";
		}
		else{
			carro.style.display = "block";
		}
	}



</script>






	