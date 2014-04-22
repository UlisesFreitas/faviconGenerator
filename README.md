faviconGenerator
================

PHP &amp; bootstrap favicon generator
Esta obra está licenciada bajo la Licencia Creative Commons Atribución-NoComercial 3.0 Unported. Para ver una copia de esta licencia, visita http://creativecommons.org/licenses/by-nc/3.0/.

favicon generator por Ulises Freitas se encuentra bajo una Licencia Creative Commons Atribución-NoComercial 3.0 Unported.


Instalación:

la carpeta uploads debe de tener permisos de escritura 777 o 755 al menos es la carpeta en donde se guardan los favicon generados.

Luego  si se controla el panel de su hosting o de su VPS o Dedicado hay que crear un cron para vaciar la carpeta cada xx:xx:xx horas.
Opcionalmente existe un archivo llamado deleite.php que si lo llamamos desde la url borrará todos los favicon generados.

EJ: http://misitio.com/delete.php

El archivo params.php contiene información del sitio el título y el correo del administrador en caso de que se desee usar.

Por último el archivo url.php es el que se tiene que configurar con la url de su sitio para que se carguen todos los archivos necesarios CSS, JS, ETC.
