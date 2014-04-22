<?php
/*
* 	@author: Ulises Freitas
*	@version: 1.0
*
* favicon generator por Ulises Freitas se encuentra bajo una Licencia Creative Commons Atribución-NoComercial 3.0 Unported.
* Basada en una obra en http://favicongenerator.ulisesfreitas.com.
*/

$sessionHandler = new SessionSystem();
$type = $sessionHandler->GetSessionVar('show_messages_type');

switch($type){
	
	case "alert": 
		echo '<div class="container" id="flash"><div class="row-fluid"><div class="span12 alert"><button class="close" data-dismiss="alert">x</button>'.$messages.'</div></div></div>';
	break;
	case "success": 
		echo '<div class="container" id="flash"><div class="row-fluid"><div class="span12 alert alert-success"><button class="close" data-dismiss="alert">x</button>'.$messages.'</div></div></div>';
	break;
	case "error": 
		echo '<div class="container" id="flash"><div class="row-fluid"><div class="span12 alert alert-error"><button class="close" data-dismiss="alert">x</button>'.$messages.'</div></div></div>';
	break;
	case "info":
		echo '<div class="container" id="flash"><div class="row-fluid"><div class="span12 alert alert-info"><button class="close" data-dismiss="alert">x</button>'.$messages.'</div></div></div>';
	break;
	
	default:
		echo '<div class="container" id="flash"><div class="row-fluid"><div class="span12 alert alert-info"><button class="close" data-dismiss="alert">x</button>'.$messages.'</div></div></div>';

}


?>
