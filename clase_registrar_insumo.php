<?php
	class Registro_Insumo
	{
		public function registrar_insumo ($nombre_insumo,$medida_insumo,$categoria_insumo)
		{

			include ("conexion.php");
			$sql = "INSERT INTO insumos_nefi (idInsumo, Nombre_Insumo, Medida_Insumo, Categoria_Insumo) VALUES (NULL, '$nombre_insumo', '$medida_insumo', '$categoria_insumo')";
			if (!$result = $db->query($sql))
				{
					die('No se Conecta [' . $db->error. ']');
				}
			header ("location:ver_insumos.php");
		}
	}
	$hola=new Registro_Insumo();
	$hola->registrar_insumo(@$_POST["nombre_insumo"],@$_POST["medida_insumo"],@$_POST["categoria_insumo"]);
?>