<?php

/*
* 	@author: Ulises Freitas
*	@version: 1.0
*
* favicon generator por Ulises Freitas se encuentra bajo una Licencia Creative Commons Atribución-NoComercial 3.0 Unported.
* Basada en una obra en http://favicongenerator.ulisesfreitas.com.
*/


require_once('sessionsystem.php');
require_once('params.php');
require_once('url.php');
require_once('messages.php');
$sessionhandler = new SessionSystem();

$sid = session_id();
if(empty($sid)){

	$sessionhandler->SessionStart();
	$sid = session_id();
	
}
?>
<!DOCTYPE html>
<html lang="en"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Portfolio de Ulises Freitas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="YOUR DESCRIPTION HERE">
    <meta name="author" content="Ulises Freitas">
    <meta name="keywords" content="Programador, diseñador, SEO, PHP y MySQL, AJAX, JAVASCRIPT, HTML5 y CSS3, XHTML y CSS2, HTML y CSS, XML, JSON">


    <!-- Le styles -->
    <?php 
    
	    //System
	    $css = 'css';
	    $files = scandir($css);
	    foreach($files as $file){
		    if (($file != '.')&&($file != '..')&&($file != '.DS_Store')){
			    echo '<link href="'.Url::CreateURL($css.DIRECTORY_SEPARATOR.$file).'" rel="stylesheet">';
			}	
		}
		
	    
    ?>
    <script type="text/javascript" src="js/prettify.js"></script>
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>

    </head>

  <body screen_capture_injected="true" onload="prettyPrint()">
  <div class="container">
  <?php
	Messages::prepareMessages();
	Messages::printMessages();
  ?>
  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo $_SERVER['PHP_SELF']; ?>">Favicon Generator</a>
        </div>
      </div>
    </div>
    
    
    <div class="well">
    <div class="row-fluid">
	    <form action="<?php echo htmlspecialchars(Url::CreateURL('favicon.php')); ?>" method="post" enctype="multipart/form-data">
	    <div class="span6">
	    	
			<span class="span3">
			<span class="btn btn-success fileinput-button">
				<i class="icon-plus icon-white"></i>
				<span>Añadir</span>
				<input type="file" name="favicon" id="img-favicon">
			</span>
			
			<select name="size-fav">
				<option value="32">32px</option>
				<option value="64">64px</option>
			</select>
			</span>
			
			<button type="submit" class="btn btn-primary" name="submit" value="1" id="send">
				<i class="icon-upload icon-white"></i>
				<span>Crear Favicon</span>
			</button>
		
			<span class="label label-info">PNG, JPEG, JPG, GIF</span>
			<span class="help-block">Las imágenes deben tener un tamaño máximo de 2Mb.</span>
					
					
	    </div>
	    </form>
    </div><!--/row-fluid-->
    </div><!--/well-->
    
    <?php 
	    $favicon = $sessionhandler->getSessionVar('favicon');
	    
	   if($favicon != NULL){
	   		
	   		
		   
		   echo '<div class="well" id="favicon-generator">';
		   echo '<div class="row-fluid">';
		   echo '<div class="span1">';
		   echo '<img class="thumbnail" style="display:inline;" src="'.Url::CreateURL('uploads'.DIRECTORY_SEPARATOR.$favicon).'" alt="favicon">';
		   echo '</div>';
		   echo '<div class="span9">';
		   echo '<code>
	    <span class="pln"></span><span class="tag">&lt;link</span><span class="pln"> </span><span class="atn">rel</span><span class="pun">=</span><span class="atv">"shortcut icon"</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"image/x-icon"</span><span class="pln"> </span><span class="atn">href</span><span class="pun">=</span><span class="atv">"/favicon.ico"</span><span class="tag">&gt;</span>
	    </code>';
	       echo '</div>';
	       echo '<div class="span2">';
		   echo '<a href="download.php?f='.$favicon.'" class="btn btn-info" id="downloaded"><i class="icon-download icon-white"></i>Descargar</a>';
		   echo '</div>';
		   echo '</div>';
		   
		   
	   } 
	   	   
    ?>
  
        
</div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.min.js"></script>
    <script src="js/load-image.min.js"></script>
    <script src="js/custom.js"></script>
    
</body><link rel="stylesheet" type="text/css" href="data:text/css,"></html>