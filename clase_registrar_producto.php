<?php
	class Registro_Producto
	{
		public function registrar_producto ($nombre_producto,$categoria_producto,$descripcion_producto)
		{

			include ("conexion.php");
			$sql = "INSERT INTO productos_nefi (idProducto, Nombre_Producto, Categoria_Producto, Descripcion_Producto) VALUES (NULL, '$nombre_producto', '$categoria_producto', '$descripcion_producto')";
			if (!$result = $db->query($sql))
				{
					die('No se Conecta [' . $db->error. ']');
				}
			header ("location:ver_productos.php");
		}
	}
	$hola=new Registro_Producto();
	$hola->registrar_producto(@$_POST["nombre_producto"],@$_POST["categoria_producto"],@$_POST["descripcion_producto"]);
?>