###################
Que es My CI?
###################

My CI es CodeIgniter en su ultima versión (3.0) con una serie de helpers,
librerias, assets, configuraciones y otros elementos, todo esto sin alterar
el núcleo del framework.

*******************
Información
*******************

Este repositorio será constantemente actualizado con la ultima versión de sus
componentes, adicionando nuevas funcionalidades conforme a las necesidades.

*******************
Configuración
*******************

1 Cambie el nombre de la carpeta my_ci por un nombre logíco para su proyecto.

2 En el archivo .htaccess modifique la linea
RewriteRule ^(.*)$ /my_ci/index.php/$1 [L]
donde dice my_ci ponga el nombre del paso 1.

3 Si es su primera vez con CodeIgniter o My CI, y esta en un entorno Windows,
recuerde que en ocasiones en necesario hacer la siguiente modificación para el
correcto funcionamiento local:

En la carpeta de su servidor local (Wamp, Xampp, AppServ, entro otros) hubique
la carpeta *apache/conf*, en el caso de xampp esta en *C:\xampp\apache\conf*,
y edite el archivo httpd.conf de esta forma:

3.1 En la línea donde ponga LoadModule rewrite_module modules/mod_rewrite.so
debe de asegurarse de que no está comentada, es decir, no debe tenga delante el
símbolo #.

3.2 En la línea donde ponga AllowOverride debe de asegurarse que quede así::

    <Directory />
      AllowOverride All
      Require all denied
    </Directory>

En este caso se ha cambiado “All” detrás de AllowOverride (antes era un None) y
con esto ya ha funcionado.

¡Y puff! eso es todo.

*******************
Retrocompatibilidad
*******************

Por derechos de la licencia MIT y para conservar la compatibilidad de los
proyectos desarrollados con My CI y las nuevas actualizaciones, no deben
de moficarsen los siguientes archivos o directorios(con sus archivos
internos):

Directorios::

    my_ci/assets/ccs/default/
    my_ci/assets/icons/logotipo.ico
    my_ci/assets/js/default/
    my_ci/assets/less/default/
    my_ci/system/

Archivos::

    my_ci/.gitignore
    my_ci/application/helpers/elements_helper.php
    my_ci/application/helpers/essential_helper.php
    my_ci/application/views/templates/head.php
    my_ci/application/views/layout.php
    my_ci/DCO.txt
    my_ci/contributing.md
    my_ci/index.php
    my_ci/license.txt
    my_ci/phpdoc.dist.xml
    my_ci/readme.rst



**************************
Log de eventos del proyecto
**************************

Este proyecto inicio en github el 19/12/2014

**************************
Características actuales
**************************

My CI esta integrado por y usa tecnologías como:

*CodeIniter

*Bootstrap

*Less

*Jquery

*Jquery UI

*Icomoon

Todas estas tecnologías estan o serán actualizadas
a sus últimas versiones.