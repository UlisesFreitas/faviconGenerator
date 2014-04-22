<?php
/*
* 	@author: Ulises Freitas
*	@version: 1.0
*
* favicon generator por Ulises Freitas se encuentra bajo una Licencia Creative Commons Atribución-NoComercial 3.0 Unported.
* Basada en una obra en http://favicongenerator.ulisesfreitas.com.
*/


error_reporting(0);


require_once("class.chip_download.php");

$download_path =  "uploads".DIRECTORY_SEPARATOR;
$file = $_REQUEST['f'];


$args = array(
		'download_path'		=>	$download_path,
		'file'				=>	$file,		
		'extension_check'	=>	TRUE,
		'referrer_check'	=>	FALSE,
		'referrer'			=>	NULL,
		);
$download = new chip_download( $args );

/*
|-----------------
| Pre Download Hook
|------------------
*/


$download_hook = $download->get_download_hook();
//$download->chip_print($download_hook);
//exit;

/*
|-----------------
| Download
|------------------
*/

if( $download_hook['download'] == TRUE ) {

	/* You can write your logic before proceeding to download */
	/*
	|----------------
	|My Session vars
	|----------------
	
	require_once('sessionsystem.php');
	$sessionhandler = new SessionSystem();
	$sessionhandler->SessionStart();
	$favicon = $sessionhandler->getSessionVar('favicon');   
	$sessionhandler->DeleteSessionVar('favicon');
	$sessionhandler->SetSessionVar('destroyfavicon',$favicon);
	$sessionhandler->SetSessionVar('downloaded',1);
	*/
	
	/* Let's download file */
	$download->get_download();
	
	
	
	
	

}

?>