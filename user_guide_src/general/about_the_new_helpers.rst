###############################
Propósito de los nuevos Helpers
###############################

En MyCI existen nuevos Helper y Librerias, en esta sección
se explica el propósito de cada uno de ellos.

*************
Assets Helper
*************

Brinda diversas funciones que trabajan con los assets(JS, CSS, Less),
tanto para ser usadas para el desarrollo común, como para el desarrollo
interno del Framework. Posee un función destacada llamada
**autoloading_assets** llamada de manera automatica por el framework,
se caracteriza por que si se siguen ciertas convenciones que requiere
todos los assest necesarios serán llamados de manera automatica.

****************
Bootstrap Helper
****************

Este Helper es especial no brinda funciones para el desarrollado
común, solo para el desarrollo del Framework como tal. Es el Helper
encargado de gestionar las primeras acciones (arranque), se encarga
de definir las constantes y llamar a los demas Helpers, Librerias,
Drivers y Modelos, necesarios para el optimo funcionamiento de MyCI.

***************
Elements Helper
***************

El proposito de este Helper es facilitar a los desarrolladores funciones
que generan elementos HTML para la interfaz del usuario final. Las
funciones deben ser faciles de utilizar, sin perder flexibilidad, y producir
un código que va de la mano con los estándares.

****************
Essential Helper
****************

Brinda funciones lógicas esenciales, dichas funciones retornan algun valor
para ser usado tanto en el desarrollo común, como en el desarrollo del
Framework.