<?php
	class Registro_Categoria
	{
		public function registrar_categoria ($nombre_categoria)
		{

			include ("conexion.php");
			$sql = "INSERT INTO categorias_nefi (idCategoria, Nombre_Categoria) VALUES (NULL, '$nombre_categoria')";
			if (!$result = $db->query($sql))
				{
					die('No se Conecta [' . $db->error. ']');
				}
			header ("location:ver_categorias.php");
		}
	}
	$hola=new Registro_Categoria();
	$hola->registrar_categoria(@$_POST["nombre_categoria"]);
?>