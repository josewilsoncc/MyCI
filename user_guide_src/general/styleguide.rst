##################
Guía de estilo PHP
##################

La siguiente página describe los estilos de codificación se adhirieron
a la hora de contribuir al desarrollo de MyCI. No hay ningún requisito
para utilizar estos estilos en su propia aplicación MyCI, aunque se
recomiendan.

.. contents:: Tabla de contenidos

Formato de Archivo
==================

Los archivos deben ser guardados con codificación unicode (UTF-8).

Etiqueta de cierre de PHP
=========================

La etiqueta de cierre de PHP en un documento PHP **?>** es opcional
para el intérprete PHP. Sin embargo, si se usa, cualquier espacio en
blanco después de la etiqueta de cierre, ya sea presentada por el
desarrollador, usuario o una aplicación FTP, puede causar una salida
no deseada, errores de PHP, en casos extremos páginas en blanco.
Por esta razón, todos los archivos PHP deben omitir la etiqueta de
cierre PHP y terminar con una sola línea en blanco en su lugar.

Denominación de archivos
========================

Los archivos de clase deben ser nombrados de manera similar al formato ucfirst,
mientras que cualquier otro nombre de archivo (configuraciones, vistas, secuencias
de comandos genéricos, etc.) deben estar en minúsculas.

**INCORRECTO**::

	somelibrary.php
	someLibrary.php
	SOMELIBRARY.php
	Some_Library.php

	Application_config.php
	Application_Config.php
	applicationConfig.php

**CORRECTO**::

	Somelibrary.php
	Some_library.php

	applicationconfig.php
	application_config.php

Además, los nombres de archivo de clase deben coincidir con el nombre de
la clase en sí. Por ejemplo, si se tiene una clase llamada `Myclass`, el
nombre del archivo debe ser **Myclass.php**.

Nomenclatura de clase y método
==============================

Los nombres de clase siempre deben comenzar con una letra mayúscula.
Varias palabras deben estar separados por un guión, y no CamelCased.

**INCORRECTO**::

	class superclass
	class SuperClass

**CORRECTO**::

	class Super_class

::

	class Super_class {

		public function __construct()
		{

		}
	}

Los métodos de clase deben ser nombrados en minúsculas y el nombre
debe indicar claramente su función, preferiblemente incluyendo un
verbo. Trate de evitar los nombres excesivamente largos y prolijos.
Varias palabras deben estar separados por un guión bajo.

**INCORRECTO**::

	function fileproperties()		//No es descriptivo y necesita guión bajo para separar
	function fileProperties()		//No es descriptivo y utiliza CamelCase
	function getfileproperties()		//Mejor! Pero todavía falta guión bajo para separar
	function getFileProperties()		//Usa CamelCase
	function get_the_file_properties_from_the_file()	//Verboso

**CORRECTO**::

	function get_file_properties()	//Es descriptivo, usa guión bajo para separar y todas las letras son minusculas

Nombres de variables
====================

Las directrices para la asignación de nombres variables son muy similares
a los utilizados para los métodos de clase. Las variables deben contener
sólo letras minúsculas, separadores uso de subrayado, y se llamarán
razonablemente para indicar su propósito y contenido. Muy corto, las
variables de un solo carácter sólo deben utilizarse en bucles for().

**INCORRECTO**::

	$j = 'foo';		//Las variables de una sola letra solo deben usarsen en un ciclo for()
	$Str			//Contiene letras en mayuscula
	$bufferedText		//Usa CamelCasing, y podría acortarse sin perder significado semántico
	$groupid		//Multiples palabras, necesitan guión bajo para separarsen
	$name_of_last_city_used	//Muy largo

**CORRECTO**::

	for ($j = 0; $j < 10; $j++)
	$str
	$buffer
	$group_id
	$last_city

Commentando
===========

En general, el código puede ser comentado prolificamente, Esto no solo
ayuda a describir el flujo y la intención del código para programadores
con menos experiencia, sino que puede resultar muy util para retomar
rápidamente el código mucho tiempo despues. No hay un formato estricto
para los comentarios, pero se recomienda lo siguiente.

El estilo de documentación
`DocBlock <http://manual.phpdoc.org/HTMLSmartyConverter/HandS/phpDocumentor/tutorial_phpDocumentor.howto.pkg.html#basics.docblock>`_
es recomendado para las clases, métodos, y las declaraciones de propiedades
para que puedan ser reconocidos por los IDEs como Netbeans::

	/**
	 * Super Class
	 *
	 * @package	Package Name
	 * @subpackage	Subpackage
	 * @category	Category
	 * @author	Author Name
	 * @link	http://example.com
	 */
	class Super_class {

::

	/**
	 * Encodes string for use in XML
	 *
	 * @param	string	$str	Input string
	 * @return	string
	 */
	function xml_encode($str)

::

	/**
	 * Data for class manipulation
	 *
	 * @var	array
	 */
	public $data = array();

Use los comentarios de una sola linea de código, dejando una línea
entre grandes bloques de comentarios y el código.

::

	// break up the string by newlines
	$parts = explode("\n", $str);

	// A longer comment that needs to give greater detail on what is
	// occurring and why can use multiple single-line comments.  Try to
	// keep the width reasonable, around 70 characters is the easiest to
	// read.  Don't hesitate to link to permanent external resources
	// that may provide greater detail:
	//
	// http://example.com/information_about_something/in_particular/

	$parts = $this->foo($parts);

Constantes
==========

Las constantes siguen las mismas pautas que las variables, expepto
que las constantes siempre deben estar en mayuscula.

**INCORRECTO**::

	myConstant	// missing underscore separator and not fully uppercase
	N		// no single-letter constants

**CORRECTO**::

	MY_CONSTANT
	NEWLINE

TRUE, FALSE, y NULL
===================

Las palabras clave **TRUE**, **FALSE**, y **NULL** van siempre en mayuscula.

**INCORRECTO**::

	if ($foo == true)
	$bar = false;
	function foo($bar = null)

**CORRECTO**::

	if ($foo == TRUE)
	$bar = FALSE;
	function foo($bar = NULL)

Operadores lógicos
==================

El uso del ``||`` operador de comparación "o" no es recomendable,
ya que su calidad de salida en algunos dispositivos es baja
(luce como el numero 11, por ejemplo). ``&&`` es preferible a ``AND``
aunque ambos son validos, y un espacio siempre debe preceder y seguir a ``!``.

**INCORRECTO**::

	if ($foo || $bar)
	if ($foo AND $bar)  //Esta bien pero no es lo recomendado para aplicaciones destacadas.
	if (!$foo)
	if (! is_array($foo))

**CORRECTO**::

	if ($foo OR $bar)
	if ($foo && $bar) //Recomendado
	if ( ! $foo)
	if ( ! is_array($foo))
	
Comparación de los valores de retorno y la conversión de tipos
==============================================================

Some PHP functions return FALSE on failure, but may also have a valid
return value of "" or 0, which would evaluate to FALSE in loose
comparisons. Be explicit by comparing the variable type when using these
return values in conditionals to ensure the return value is indeed what
you expect, and not a value that has an equivalent loose-type
evaluation.

Algunas funciones de PHP retornan FALSE en caso de error, pero también
pueden tener un valor de retorno de "" o 0, que dan como resultado
FALSE en comparaciones sueltas. Sea explícito al comparar el tipo de
variable cuando se utilizan estos valores de retorno en los condicionales
para garantizar el valor de retorno es de hecho lo que usted espera, y no
un valor que tiene una evaluación floja tipo equivalentede.

Utilice la misma restricción en el retorno y el control de sus propias
variables. Utilice ** === ** y **! == ** Según sea necesario.

**INCORRECTO**::
  
  // Si 'foo' se encuentra al principio de la cadena, strpos retornará un 0,
  // El resultante en este condicional es evaluado como TRUE
	if (strpos($str, 'foo') == FALSE)

**CORRECTO**::

	if (strpos($str, 'foo') === FALSE)

**INCORRECT**::

	function build_string($str = "")
	{
		if ($str == "")	// Oh-oh!  Si es FALSE o el numero 0 se cumple la condición?
		{

		}
	}

**CORRECT**::

	function build_string($str = "")
	{
		if ($str === "")
		{

		}
	}


Depurando
=========

No deje el código de depuración, incluso cuando comentada.
Las cosas tales como ``var_dump()``, ``print_r()``, ``die()``/``exit()``
no debe ser incluido en el código a menos que sirva para un propósito
específico que no sea la depuración .

Espacios en blanco en Archivos
==============================

No puede haber espacios en blanco antes de la etiqueta de apertura de PHP
o despues de la etiqueta PHP cierre. La salida se almacenan temporalmente,
por lo que los espacios en blanco en los archivos puede causar que antes de
MyCI emite su contenido, se produzcan a errores y a su vez impidiendo
a MyCI enviar cabeceras adecuadas.

compatibilidad
==============

MyCI recomienda PHP 5.4 o posterior para ser utilizado, pero debe ser compatible
con PHP 5.2.4.

Además, no use las funciones de PHP que requieren bibliotecas no predeterminadas
que se instalarán a menos que su código contenga un método alternativo cuando dicha
función no está disponible.

Un Archivo por clase
====================

Utilice archivos separados para cada clase, a menos que las clases están
*estrechamente relacionados*. Un ejemplo de un archivo MyCI que contiene
varias clases es el archivo de biblioteca XMLRPC.

El espacio en blanco
====================

Utilice el tabulador para indentar el código, y no la barra espadora.
Esto puede parecer una cosa pequeña, pero utilizando tabs en lugar de
espacios en blanco permite al desarrollador los niveles de indentación
que ellos prefieren. Y como beneficio adicional, se traduce en archivos
(ligeramente) más compactos, almacenar un carácter tab en lugar de,
digamos, cuatro espacios.

saltos de línea
===============

Los archivos deben ser guardados con saltos de línea Unix. Esto es más
de un problema para los desarrolladores que trabajan en Windows, pero en
cualquier caso, se debe garantizar que su IDE está configurado para
guardar archivos con saltos de línea Unix.

Indentación del código
======================

Utilice indentación estilo Allman. Con la excepción de las declaraciones
de clase, ejemplos:

**INCORRECTO**::

	function foo($bar) {
		// ...
	}

	foreach ($arr as $key => $val) {
		// ...
	}

	if ($foo == $bar) {
		// ...
	} else {
		// ...
	}

	for ($i = 0; $i < 10; $i++)
		{
		for ($j = 0; $j < 10; $j++)
			{
			// ...
			}
		}
		
	try {
		// ...
	}
	catch() {
		// ...
	}

**CORRECTO**::

	function foo($bar)
	{
		// ...
	}

	foreach ($arr as $key => $val)
	{
		// ...
	}

	if ($foo == $bar)
	{
		// ...
	}
	else
	{
		// ...
	}

	for ($i = 0; $i < 10; $i++)
	{
		for ($j = 0; $j < 10; $j++)
		{
			// ...
		}
	}
	
	try 
	{
		// ...
	}
	catch()
	{
		// ...
	}

Espaciado de corchetes y parentesis
===================================

En general, los paréntesis y corchetes no deben utilizar espacios
adicionales. La excepción esun espacio debe seguir siempre las
estructuras de control de PHP que aceptan argumentos con paréntesis
(declare, do-while, elseif, for, foreach, if, switch, while),
para ayudar a distinguirlos de funciones y aumentar la legibilidad.

**INCORRECTO**::

	$arr[ $foo ] = 'foo';

**CORRECTO**::

	$arr[$foo] = 'foo'; //Sin espacios alrededor de los corchetes

**INCORRECTO**::

	function foo ( $bar )
	{

	}

**CORRECTO**::

	function foo($bar) //No hay espacios alrededor de paréntesis en la declaración de funciones
	{

	}

**INCORRECTO**::

	foreach( $query->result() as $row )

**CORRECTO**::

	foreach ($query->result() as $row) // single space following PHP control structures, but not in interior parenthesis

Métodos y variables privadas
============================

Métodos y variables que sólo son accedidos internamente, tales como
funciones de utilidad y ayuda, que sus métodos públicos utilizan para
el código de la abstracción, deben ir precedidos por un guión bajo.

::

	public function convert_text()
	private function _convert_text()

Etiquetas cortas de PHP
=======================

Utilice siempre las etiquetas completas de apertura de PHP, en caso
de que un servidor no tiene habilitado *short_open_tag*.

**INCORRECTO**::

	<? echo $foo; ?>

	<?=$foo?>

**CORRECTO**::

	<?php echo $foo; ?>

.. note:: PHP 5.4 will always have the **<?=** tag available.

Una declaración por línea
======================

Nunca combine declaraciones en una línea.

**INCORRECTO**::

	$foo = 'this'; $bar = 'that'; $bat = str_replace($foo, $bar, $bag);

**CORRECTO**::

	$foo = 'this';
	$bar = 'that';
	$bat = str_replace($foo, $bar, $bag);

Argumentos por defecto de función
=================================
Siempre que sea apropiado, proporcionar valores por defecto de los
argumentos de la función, que ayudan a evitar errores de PHP con
llamadas erroneas y proporciona valores de retorno comunes que pueden
ahorrar unas pocas líneas de código. ejemplo::

	function foo($bar = '', $baz = FALSE)