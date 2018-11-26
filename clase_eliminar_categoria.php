<?php
	class Eliminacion_Categoria
	{
		public function eliminar_categoria ($idCategoria)
		{

			include ("conexion.php");
			$sql = "DELETE FROM categorias_nefi WHERE idCategoria = '$idCategoria'";
			if (!$result = $db->query($sql))
				{
					die('No se Conecta [' . $db->error. ']');
				}
			header ("location:ver_categorias.php");
		}
	}
	$hola=new Eliminacion_Categoria();
	$hola->eliminar_categoria(@$_POST["idCategoria"]);
?>