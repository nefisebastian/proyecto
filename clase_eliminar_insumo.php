<?php
	class Eliminacion_Insumo
	{
		public function eliminar_insumo ($idInsumo)
		{

			include ("conexion.php");
			$sql = "DELETE FROM insumos_nefi WHERE idInsumo = '$idInsumo'";
			if (!$result = $db->query($sql))
				{
					die('No se Conecta [' . $db->error. ']');
				}
			header ("location:ver_insumos.php");
		}
	}
	$hola=new Eliminacion_Insumo();
	$hola->eliminar_insumo(@$_POST["idInsumo"]);
?>