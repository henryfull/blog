
<section id="products">
	<h3>Productos</h3>
<!--	<div><a href="?c=Tienda&a=FormProduct" class="btn btnadd" >Añadir Producto</a></div> -->

	<ul class="list-products cabecera">

	</ul>
	
	<ul class="productos-clientes">	
		<?php foreach($this->model->Mostrar() as $r): ?>
			<li class="list">
				<article>
					<span class="linkVistaProductoCliente"> <a class="icon-btn" href="?c=Tienda&a=paginaproducto&id=<?php echo $r->id; ?>"><img src="view/image/icon-info.png" alt="más informacion"></a> </span>
					<ul class="block-products ">
						<form action="?c=tienda&a=Carrito" method="post">
							<li><input type="hidden" name="id" value="<?php echo $r->id; ?>"/> </li>
							<li class="image-product"><img src="<?php echo $r->image ?>"></li>
							<li class="name-product"><input type="hidden" name="name"value="<?php echo $r->name; ?>"/><p><?php echo $r->name; ?></p> </li>
							<li class="price-product" ><input type="hidden" name="price" value="<?php echo $r->price; ?>"/><?php echo $r->price; ?> €</li>
							<li><input type="hidden" name="stock" value="<?php echo $r->stock; ?>"/></li>
							<li class="qty-product"><input type="text" name="qty" value="<?php echo $r->quantity; ?>"/><span> uds</span> </li>
							<li class="btn-add-product">
								<button type="submit" name="add-cart" class="addcart ">
									<img src="view/image/icon-add.png" alt="añadir al carrito" class="icon-cart-add">
									<img src="view/image/icon-cart.png" alt="actualizar" class="icon-cart">
								</button>
							</li>
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
		else{

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
//			echo '<a class="btn-final-cart" onclick="borrarCarrito()" >Vaciar Carrito</a>';
//			echo "<button class='btn-final-cart'>Finalizar Compra</button>";
		}
		?>
		<br>
		<a class="btn-final-cart" href="?c=Tienda&a=borrarCarrito" >Vaciar Carritos</a>
		<a class='btn-final-cart'>Finalizar Compra</a>
	</div>
</section>

	<a href="?c=Common&a=CerrarSesion" class="logout">Cerrar Sesion</a>

<script>
	document.getElementsByClassName("icon_cart")[0].addEventListener("click", ocultarCarrito);
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






	