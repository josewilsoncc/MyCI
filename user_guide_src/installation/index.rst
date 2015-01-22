############################
Instrucciones de instalación
############################

MyCI es instalado en cinco pasos:

#. Descomprima el paquete preferiblemente en la ruta que cumple la función
   de *localhost*.
#. Cambie el nombre de la carpeta *MyCI* por un nombre apropiado para su
   proyecto.
#. En el archivo .htaccess tambien modifique la tercer linea donde dice
   *MyCI* por el nombre que elegío para su carpeta.
#. Abra el archivo application/config/config.php con su IDE preferido
   y cambie la base URL si es necesario. Si tiene intención de utilizar
   el cifrado o sesiones, establezca la clave de cifrado (Requiere la
   extesión *Mcrypt*).
#. Si va a usar base de datos, abra el archivo application/config/database.php
   con un IDE y configura su base de datos.

Si usted desea aumentar la seguridad al ocultar la ubicación de sus archivos
de CodeIgniter puede cambiar el nombre del sistema y carpetas de aplicaciones
a algo más privado. Si lo hace cambiar su nombre, debe abrir el archivo principal
index.php y establezca el system_path $ y $ application_folder variables al
principio del archivo con el nuevo nombre elegido.

If you wish to increase security by hiding the location of your
CodeIgniter files you can rename the system and application folders to
something more private. If you do rename them, you must open your main
index.php file and set the $system_path and $application_folder
variables at the top of the file with the new name you've chosen.

For the best security, both the system and any application folders
should be placed above web root so that they are not directly accessible
via a browser. By default, .htaccess files are included in each folder
to help prevent direct access, but it is best to remove them from public
access entirely in case the web server configuration changes or doesn't
abide by the .htaccess.

If you would like to keep your views public it is also possible to move
the views folder out of your application folder.

After moving them, open your main index.php file and set the
$system_path, $application_folder and $view_folder variables,
preferably with a full path, e.g. '/www/MyUser/system'.

One additional measure to take in production environments is to disable
PHP error reporting and any other development-only functionality. In
CodeIgniter, this can be done by setting the ENVIRONMENT constant, which
is more fully described on the :doc:`security
page <../general/security>`.

That's it!

If you're new to CodeIgniter, please read the :doc:`Getting
Started <../overview/getting_started>` section of the User Guide
to begin learning how to build dynamic PHP applications. Enjoy!

.. toctree::
	:hidden:
	:titlesonly:

	downloads
	self
	upgrading
	troubleshooting

