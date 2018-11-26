<?php
	class Edicion_Categoria
	{
		public function editar_categoria ($id_categoria,$nombre_categoria)
		{
			include ("conexion.php");

				$sql = "UPDATE categorias_nefi SET Nombre_Categoria = '$nombre_categoria' WHERE idCategoria = '$id_categoria'";
				if (!$result = $db->query($sql))
					{
						die('No se Conecta [' . $db->error. ']');
					}
			header ("location:ver_categorias.php");
			
		}
	}
	$hola=new Edicion_Categoria();
	$hola->editar_categoria(@$_POST["id_categoria"],@$_POST["nombre_categoria"]);
?>