<?php
include_once("../models/Product.php");
include_once("../models/Cleaner.php");


if(isset($_POST["action"]) /*&& isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price'])*/){
	$nombre = addslashes(Cleaner::cleanInput($_POST['name']));
	$descripcion = addslashes(Cleaner::cleanInput($_POST['description']));
	$precio =(int) Cleaner::cleanInput($_POST['price']);
	$producto = new Product($nombre, $descripcion, $precio);
	/*echo "Estan llegando los valores".$nombre;
	echo "\nEstan llegando los valores".$descripcion;
	echo "Estan llegando los valores".$precio;*/
	if($producto->saveProducts()){
		echo "Se guardo correctamente";
	}else{
		echo "No se guardo :c";
	}
	
}else{
	$products = Product::get();

	$products = json_encode($products);

	echo $products;
}