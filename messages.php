<?php

/*
* 	@author: Ulises Freitas
*	@version: 1.0
*
* favicon generator por Ulises Freitas se encuentra bajo una Licencia Creative Commons Atribución-NoComercial 3.0 Unported.
* Basada en una obra en http://favicongenerator.ulisesfreitas.com.
*/


class Messages {

	
	/**
	 * FrontEnd
     * Stores the $message as the flash to be shown on the next request.
     *
     * @param String $message The flash to be shown on the next request.
     * 
	*/
	public static function setMessages($message,$message_type) {
		
		$sessionHandler = new SessionSystem();
		$sessionHandler->SetSessionVar('show_messages_new',$message);
		$sessionHandler->SetSessionVar('show_messages_type',$message_type);	
	        
    }
		
	/**
	 * FrontEnd
     * Returns the flash to be shown on this request.
     *
     * @return String The flash to be shown on this request, or null if there's
     *                no message to be shown.
	*/

	public static function getMessages() {
			$sessionHandler = new SessionSystem();
			$showmessages = $sessionHandler->GetSessionVar('show_messages');
			
			if (isset($showmessages) && $showmessages != false) {
				return $showmessages;
			} else {
				return null;
			}
		}

    /**
     * FrontEnd
     * Cleans the flash to be shown on this request.
     *
     * If there's a message to be shown on the next request, prepare it to be
     * available on next request.
	*/
	  public static function prepareMessages() {
		
		$sessionHandler = new SessionSystem();
		$showmessages = $sessionHandler->GetSessionVar('show_messages');
		$sessionHandler->DeleteSessionVar('show_messages');
		       
        // If there's flash in this request, save for the next one.
        $showmessagesnew = $sessionHandler->GetSessionVar('show_messages_new');
		
		if (isset($showmessagesnew) && $showmessagesnew != false) {
            $sessionHandler->SetSessionVar('show_messages', $showmessagesnew);
            $sessionHandler->DeleteSessionVar('show_messages_new');
	

			
        }
				
    }
    
    /**
    * FrontEnd
    * Display Messages of the framework
    */
     public static function printMessages() {
	  	
	  	$messages = Messages::getMessages();
	  	if (!is_null($messages)) {
			
			include 'alert.php';
	}
}

}
?>