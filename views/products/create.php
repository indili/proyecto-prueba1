<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Crear productos</title>
</head>
<body>
	<form class="">
		<input type="text" id="name" value=""></input><br>
		<input type="text" id="price" value=""></input><br>
		<textarea id="description" rows="8" cols="80"></textarea><br>
		<!--select id="categorias">
			<option id="Predeterminada">Selecciona una categoria</option>
		</select-->
		<button type="button" onclick='saveProducts()'>Registrar</button>
	</form>
	<script type="text/javascript">
		function saveProducts() {
			var xhr = new XMLHttpRequest();


			var url = 'http://localhost/mvc/controllers/ProductsController.php';
			xhr.open('POST', url, true);
			var data = new FormData();
			data.append('name',document.querySelector("#name").value);
			data.append('price',document.querySelector("#price").value);
			data.append('description',document.querySelector("#description").value);
//			var categorias = documento.getElementById('categorias');
/*			if(categorias.selectedIndex<=0)
			    alert('No hay opción seleccionada');
			else
				data.append('categorias',categorias.options[categorias.selectedIndex].value);
*/
			data.append('action','create');
			xhr.addEventListener('loadend',function () {
				console.log('peticion realizada');
			});
			xhr.send(data);
		}
	</script>
</body>
</html>
