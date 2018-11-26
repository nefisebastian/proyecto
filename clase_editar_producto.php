<?php
	class Edicion_Producto
	{
		public function editar_producto ($id_producto,$nombre_producto,$categoria_producto,$descripcion_producto)
		{
			include ("conexion.php");

				$sql = "UPDATE productos_nefi SET Nombre_Producto = '$nombre_producto', Categoria_Producto = '$categoria_producto', Descripcion_Producto = '$descripcion_producto' WHERE idProducto = '$id_producto'";
				if (!$result = $db->query($sql))
					{
						die('No se Conecta [' . $db->error. ']');
					}
			header ("location:ver_productos.php");
			
		}
	}
	$hola=new Edicion_Producto();
	$hola->editar_producto(@$_POST["id_producto"],@$_POST["nombre_producto"],@$_POST["categoria_producto"],@$_POST["descripcion_producto"]);
?>