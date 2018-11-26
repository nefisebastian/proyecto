<?php
	class Edicion_Insumo
	{
		public function editar_insumo ($id_insumo,$nombre_insumo,$medida_insumo,$categoria_insumo)
		{
			include ("conexion.php");

				$sql = "UPDATE insumos_nefi SET Nombre_Insumo = '$nombre_insumo', Medida_Insumo = '$medida_insumo', Categoria_Insumo = '$categoria_insumo' WHERE idInsumo = '$id_insumo'";
				if (!$result = $db->query($sql))
					{
						die('No se Conecta [' . $db->error. ']');
					}
			header ("location:ver_insumos.php");
			
		}
	}
	$hola=new Edicion_Insumo();
	$hola->editar_insumo(@$_POST["id_insumo"],@$_POST["nombre_insumo"],@$_POST["medida_insumo"],@$_POST["categoria_insumo"]);
?>