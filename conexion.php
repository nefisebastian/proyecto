<?php
$db = new mysqli('localhost','root','','Nefi-Project');
$acentos = $db->query("SET NAMES 'utf8'");
if ($db->connect_error > 0 )
{
	die('No se pudo conectar a DB [' . $db->connect_error . ']');
}
?>