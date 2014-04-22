<?php
/*
* 	@author: Ulises Freitas
*	@version: 1.0
*
* favicon generator por Ulises Freitas se encuentra bajo una Licencia Creative Commons Atribución-NoComercial 3.0 Unported.
* 
*/


ini_set('post_max_size', '2M');
ini_set('upload_max_filesize', '2M');

define ('ROOT', $_SERVER['DOCUMENT_ROOT']);
define ('BASE_URL', dirname($_SERVER['SCRIPT_NAME']) );
define ('SELF', $_SERVER['PHP_SELF']);
define ('HOST', $_SERVER['HTTP_HOST']);


define ('ACTION', '/action/');

#Locations Folders
define ('IMG', 'img/');
define ('ICONS', 'icons/');



#Site Info
define ('SITE_NAME', 'YOURSITENAME');

define ('ADMINEMAIL','youremail@domain');
define ('NOREPLY','youremail@domain');	



?>
