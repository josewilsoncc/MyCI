#####################
Model-View-Controller
#####################

MyCI se basa en el patrón de desarrollo Model-View-Controller. MVC es
un enfoque de software que separa la lógica de aplicación, de la
presentación. En la práctica, permite que las **páginas web** contengan
una minima secuencia de comandos, ya que la presentación está separada del
código PHP.

-  El **Modelo** representa las estructuras de datos. Normalmente las
   clases del modelo contendrán las funciones que le ayudan a recuperar,
   insertar y actualizar la información en su base de datos.
-  La **Vista** es la información que se presenta a un usuario. Una
   vista será normalmente una página web, pero en MyCI, una vista también
   puede ser un fragmento de la página como un encabezado o pie de página.
   También puede ser un RSS
-  El **Controlador** sirve como *intermediario* entre el Modelo, la Vista,
   y todos los demás recursos necesarios para procesar la petición HTTP y
   generar una página web.

MyCI tiene un enfoque bastante fexible para MVC, Los modelos no son
obligatorios. Si usted no necesita la separación de MCV, o encuentra que
el mantenimiento de los modelos requiere una mayor complejidad de lo que
quiere, puede ignorarla y construir su aplicación mínimamente utilizando
Controladores y Vistas. MyCI también le permite desarrollar bibliotecas
del núcleo del sistema, lo que le permite trabajar de la manera que tenga
más sentido para usted.