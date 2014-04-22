<?php
/*
* 	@author: Ulises Freitas
*	@version: 1.0
*
* favicon generator por Ulises Freitas se encuentra bajo una Licencia Creative Commons Atribución-NoComercial 3.0 Unported.
* Basada en una obra en http://favicongenerator.ulisesfreitas.com.
*/

$system = 'uploads';
$files = scandir($system);
foreach($files as $file){
	if (($file != '.')&&($file != '..')&&($file != '.DS_Store')){
		unlink($system.DIRECTORY_SEPARATOR.$file);
	}	
}
header('Location: index.php');
?>