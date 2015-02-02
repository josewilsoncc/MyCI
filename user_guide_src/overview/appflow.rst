##################################
Diagrama de flujo de la aplicación
##################################

El siguiente gráfico ilustra cómo fluyen de datos en todo el sistema:

|CodeIgniter application flow|

#. El index.php sirve como el controlador frontal, inicializar los
   recursos básicos necesarios para ejecutar MyCI.
#. El router examina la petición HTTP para determinar lo que debe
   hacerse con ella.
#. Si existe un archivo de caché, se envía directamente al navegador,
   sin pasar por la ejecución normal del sistema.
#. Seguridad. Antes de que se cargue el controlador de la aplicación,
   la petición HTTP y los datos enviados por los usuarios se filtra
   por seguridad.
#. El controlador carga el modelo, las Librerias del nucleo, los
   Helpers, y todos los demás recursos necesarios para procesar la
   solicitud específica.
#. Finalizado la vista es renderizada para enviarse al navegador web
   para ser presentada. Si la caché está habilitada, la vista se
   almacena en ella primero para que en las solicitudes posteriores
   se pueda servir.

.. |CodeIgniter application flow| image:: ../images/appflowchart.gif
