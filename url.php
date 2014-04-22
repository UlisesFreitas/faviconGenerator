<?php
/*
* 	@author: Ulises Freitas
*	@version: 1.0
*
* favicon generator por Ulises Freitas se encuentra bajo una Licencia Creative Commons Atribución-NoComercial 3.0 Unported.
* Basada en una obra en http://favicongenerator.ulisesfreitas.com.
*/


class Url {
	
	private  static $destiny;
	private  static $url;
	
	/**
	 * 
	 * Makes a URL with the hostname
	 * @param unknown_type $name
	 */				
	public static function CreateURL($name){
	
	// Is the user using HTTPS?
	$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
	
	// Complete the URL
	$url .= HOST.DIRECTORY_SEPARATOR.$name;
	
	return $url;
	}
	/**
	 * 
	 * Makes a URL with the hostname
	 * @param unknown_type $name
	 */	
	public static function CreateSimpleURL($name){
	
	// Is the user using HTTPS?
	$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
	
	// Complete the URL
	$url .= $name;
	
	return $url;
	}

	
}
?>