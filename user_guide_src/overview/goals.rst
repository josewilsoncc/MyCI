##################################
Diseño y Objetivos de arquitectura
##################################

Nuestra meta para MyCI es el máximo rendimiento, capacidad y flexibilidad
en un paquete lo mas ligero posible, pero incluyendo todo lo necesario.

Para cumplir con este objetivo estamos comprometidos con la evaluación
comparativa, re-factoring, y la simplificación en cada paso del proceso
de desarrollo y el rechazo de cualquier cosa que no vaya de la mano con
el objetivo establecido.

Desde un punto de vista técnico y arquitectónico, MyCI se creó con los
siguientes objetivos:

-  **Dinámica de instancias.** En MyCI, los componentes del nucleo se
   cargan y las rutinas solo se ejecutan cuando se les solicite, en lugar
   de a nivel global. No se hacen suposiciones por el sistema en cuanto
   a lo que puede ser necesario más allá de los recursos minimos básicos,
   por lo que el sistema es muy ligero por defecto.
-  **Acoplamiento.** El acoplamiento es el grado en que los componentes
   de un sistema dependen unos de otros. Menos componentes dependen unos
   de otros, es más reutilizable y flexible. Nuestro objetivo es un
   sistema débilmente acoplado.
-  **Singularidad de componentes.** Singularidad es el grado en que los
   componentes tienen un propósito estrictamente enfocado. En MyCI,
   cada clase y sus funciones son muy autónomos con el fin de
   permitir la máxima utilidad.

MyCI es un sistema instanciado dinámicamente, débilmente acoplado con
singularidad de componentes. Se esfuerza en mantener la simplicidad,
flexibilidad y el alto rendimiento en un paquete pequeño.
