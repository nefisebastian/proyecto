<?php
	class Eliminacion_Producto
	{
		public function eliminar_producto ($idProducto)
		{

			include ("conexion.php");
			$sql = "DELETE FROM productos_nefi WHERE idProducto = '$idProducto'";
			if (!$result = $db->query($sql))
				{
					die('No se Conecta [' . $db->error. ']');
				}
			header ("location:ver_productos.php");
		}
	}
	$hola=new Eliminacion_Producto();
	$hola->eliminar_producto(@$_POST["idProducto"]);
?>