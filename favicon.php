<?php
/*
* 	@author: Ulises Freitas
*	@version: 1.0
*
* favicon generator por Ulises Freitas se encuentra bajo una Licencia Creative Commons Atribución-NoComercial 3.0 Unported.
* Basada en una obra en http://favicongenerator.ulisesfreitas.com.
*/


require_once('Thumbnail.php');
require_once('sessionsystem.php');
require_once('params.php');
require_once('url.php');
require_once('messages.php');

$sessionhandler = new SessionSystem();
$sessionhandler->SessionStart();

		$post_size = ini_get('post_max_size');
	    substr($post_size, -1);
	    
	    $post_size = $post_size * 1024;

	    if (($_SERVER['CONTENT_LENGTH'] / 1024) > $post_size) $error = true;
	    if(isset($error)){
		    Messages::SetMessages('La imagen tiene un tamaño mayor al aceptado MAX(2Mb)','error');
			header('Location: index.php');
	    }
	    
	    
if(isset($_POST['submit']) && $_POST['submit'] == 1){

		
		if($_FILES['favicon']['error'] > 0){
			Messages::SetMessages('No se ha escogido ninguna imagen','error');
			header('Location: index.php');
		}else{
	    
		$image_name = $_FILES['favicon']['name'];
		$image_size = $_FILES['favicon']['size'];
		$temp = $_FILES['favicon']['tmp_name'];
	
		if(($image_size /1024) > 2048){
			
			Messages::SetMessages('La imagen tiene un tamaño mayor al aceptado MAX(2Mb)','error');
			header('Location: index.php');
			
		}
		$image = new Thumbnail();
		$image->Image($temp);
		$i_name = $image->getImagename();
		$parts = explode(".",$i_name);
		
		
		//Added Favicon sizes from $_POST
		$favicon_size = $_POST['size-fav'];
		
		
		
		$dir = 'uploads';
		
		$final_image_name = $image->SetImageName(time().'.ico');
		
		$image->SetImageDir($dir.DIRECTORY_SEPARATOR.$final_image_name);
				
		$saved = $image->SaveImage($favicon_size, $favicon_size ,$image->GetImageDir());
		
		$sessionhandler->SetSessionVar('favicon',$image->getImageName());
		
		Messages::SetMessages('Se ha generado el favicon correctamente','success');
		header('Location: index.php');
		}

	
}

?>