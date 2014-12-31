###################
¿Que es My CI?
###################

My CI es CodeIgniter en su ultima versión (3.0) con una serie de helpers, librerias, assets, configuraciones y otros
elementos extras, que le dan un nuevo sabor, todo esto sin alterar el núcleo del framework.

*******************
Información
*******************

Este repositorio será constantemente actualizado con la ultima versión de sus componentes, adicionando nuevas
funcionalidades conforme a las necesidades.

*******************
Configuración
*******************

Para que tu proyecto funcione correctamente, por favor realiza o verifica los siguientes pasos:

1)  Cambia el nombre de la carpeta my_ci por un nombre logíco para tu proyecto.

2)  En el archivo .htaccess modifique la linea
    RewriteRule ^(.*)$ /my_ci/index.php/$1 [L]
    donde dice my_ci ponga el nombre del paso 1.

3)  Si es tu primera vez con CodeIgniter o My CI, y esta en un entorno Windows, recuerde que en ocasiones en necesario
    hacer la siguiente modificación para el correcto funcionamiento local:

    En la carpeta de tu servidor local (Wamp, Xampp, AppServ, entre otros) hubica la carpeta *apache/conf*, en el caso
    de <b>Xampp</b> esta en *C:\\xampp\\apache\\conf*, y edita el archivo httpd.conf de esta forma:

    1)  En la línea donde ponga LoadModule rewrite_module modules/mod_rewrite.so debes de asegurarte de que no está
        comentada, es decir, que no tenga delante el símbolo #.

    2)  En la línea donde ponga AllowOverride debes de asegurarte que quede así::

            <Directory />
              AllowOverride All
              Require all denied
            </Directory>

En este caso se ha cambiado “All” detrás de AllowOverride (antes era un None) y con esto ya ha funcionado.

¡Y puff! eso es todo.

*******************
Retrocompatibilidad
*******************

Por derechos de la licencia MIT y para conservar la compatibilidad de los proyectos desarrollados con My CI y las nuevas
actualizaciones, no deben de moficarsen los siguientes archivos o directorios(con sus archivos internos):

Directorios::

    my_ci/assets/ccs/default/
    my_ci/assets/icons/logotipo.ico
    my_ci/assets/js/default/
    my_ci/assets/less/default/
    my_ci/system/

Archivos::

    my_ci/.gitignore
    my_ci/application/helpers/assets_helper.php
    my_ci/application/helpers/bootstrap_helper.php
    my_ci/application/helpers/elements_helper.php
    my_ci/application/helpers/essential_helper.php
    my_ci/application/views/templates/head.php
    my_ci/application/views/layout.php
    my_ci/contributing.md
    my_ci/DCO.txt
    my_ci/index.php
    my_ci/license.txt
    my_ci/phpdoc.dist.xml
    my_ci/readme.rst


*******************
Ideales en My CI
*******************

Las nuevas ideas son bienvenidas en My CI, si deseas realizar un aporte ten en cuenta lo siguiente:

1)  Todo es uno, uno es todo.

2)  Procura no reinventar la rueda. Si ya existe un recurso y es bueno, usalo, no gastes tiempo haciendo algo que ya
    existe. (Consulta antes de actuar.)

3)  Si decides reinventar la rueda, asegurate de que sea la mejor rueda existente y no tiempo perdido. (Solo se
    reinventa la rueda si las ruedas actuales no satisfacen la necesidad deseada.)

4)  Cuando integres un recurso, asegurate de que este en su versión mas actual y obra en pro de ello. (No incluyas
    recursos obsoletos.)

5)  Si tienes una idea y no sabes como programarla, puedes manifestarla y se te asesorará, en caso extremo y de ser
    necesario alguien más lo hara por ti. (No por que no sepas como hacer algo, deja de ser una buena idea.)

6)  Sigue los estandares, no seas un revelde sin causa, los estandares son pensados en pro del facil desarrollo, facil
    actualización y buen funcionamiento para tu comodidad. (el beneficio es mayor que las normas a seguir.)

7)  Las dictaduras no deben de existir, si consideras que algo no esta bien, expresalo, se amable, se tendrá presente y
    se tomara la mejor desición. (Conocimiento colecctivo)


**************************
Log de eventos del proyecto
**************************

2014/12/30 Incorporado CoverFlow, Carousel, Toastr, Alertify

2014/12/19 Inicio el proyecto inicio en github

**************************
Características actuales
**************************

My CI esta integrado por y usa tecnologías como:

    CodeIniter

    Bootstrap

    Less

    Jquery

    Jquery UI

    Carousel
    
    Toastr
    
    Alertify

    Icomoon

Todas estas tecnologías están o serán actualizadas a sus últimas versiones.