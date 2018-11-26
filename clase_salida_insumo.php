<?php
	class Salida_Insumo
	{
		public function sacar_insumo ($id_insumo,$cantidad_restada)
		{
			include ("conexion.php");
			// Tomar fecha y hora ajustada 
			$fecha = date("Y-m-d");
   			$ajuste = time()-18000;
   			$hora = date("H:i:s",$ajuste);
   			$over= ($fecha.' '.$hora);
   			// Tomar fecha y hora ajustada 

			$sqlj="SELECT * FROM insumos_nefi WHERE idInsumo = '$id_insumo' ";
            if(!$resultj = $db->query($sqlj))
	            {
	                die('NO conecta [' . $db->error .']');  
	            }
            while($row = $resultj -> fetch_assoc())
            {
                $dbCantidadInsumo= stripslashes($row["Cantidad_Insumo"]);
            }

            $Cantidad_Final = $dbCantidadInsumo-$cantidad_restada;
			$sql = "UPDATE insumos_nefi SET Cantidad_Insumo = '$Cantidad_Final' WHERE idInsumo = '$id_insumo'";
			if (!$result = $db->query($sql))
				{
					die('No se Conecta [' . $db->error. ']');
				}

			$sqlroger = "INSERT INTO registros_nefi (idRegistro, Insumo_Registro, Movimiento_Registro, Cantidad_Registro, Fecha_Registro) VALUES (NULL, '$id_insumo', '2', '$cantidad_restada', '$over')";
			if (!$resultroger = $db->query($sqlroger))
				{
					die('No se Conecta [' . $db->error. ']');
				}

			header ("location:ver_inventario.php");
			
		}
	}
	$hola=new Salida_Insumo();
	$hola->sacar_insumo(@$_POST["id_insumo"],@$_POST["cantidad_restada"]);
?>