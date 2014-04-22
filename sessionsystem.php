<?php
/*
* 	@author: Ulises Freitas
*	@version: 1.0
*
* favicon generator por Ulises Freitas se encuentra bajo una Licencia Creative Commons Atribución-NoComercial 3.0 Unported.
* Basada en una obra en http://favicongenerator.ulisesfreitas.com.
*/

class SessionSystem {
	

	public static function SessionStart(){
	
		session_start();
	
	}	
	
	public static function SetSessionVar($name, $value){
		
		if(!$name || !$value){
			return false;
		}else{
			$_SESSION[$name] = $value;
		}
	
	}
	
	public static function GetSessionVar($name){
	
			if (isset($_SESSION[$name])) {
				 return $_SESSION[$name];
			} else {
				return false;
			}
				
	}
	
	public static function DeleteSessionVar($name){
	
		unset($_SESSION[$name]);
	
	}

	public static function DestroySession(){
	
	   $_SESSION = array();
	   	
	   	session_unset();
	    session_destroy(); 
	}

}
?>