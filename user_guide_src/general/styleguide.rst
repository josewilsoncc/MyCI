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

El uso del ``||`` operador de comparacion "o" no es recomendable,
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
	

Comparing Return Values and Typecasting
=======================================

Some PHP functions return FALSE on failure, but may also have a valid
return value of "" or 0, which would evaluate to FALSE in loose
comparisons. Be explicit by comparing the variable type when using these
return values in conditionals to ensure the return value is indeed what
you expect, and not a value that has an equivalent loose-type
evaluation.

Use the same stringency in returning and checking your own variables.
Use **===** and **!==** as necessary.

**INCORRECT**::

	// If 'foo' is at the beginning of the string, strpos will return a 0,
	// resulting in this conditional evaluating as TRUE
	if (strpos($str, 'foo') == FALSE)

**CORRECT**::

	if (strpos($str, 'foo') === FALSE)

**INCORRECT**::

	function build_string($str = "")
	{
		if ($str == "")	// uh-oh!  What if FALSE or the integer 0 is passed as an argument?
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


See also information regarding `typecasting
<http://php.net/manual/en/language.types.type-juggling.php#language.types.typecasting>`_,
which can be quite useful. Typecasting has a slightly different effect
which may be desirable. When casting a variable as a string, for
instance, NULL and boolean FALSE variables become empty strings, 0 (and
other numbers) become strings of digits, and boolean TRUE becomes "1"::

	$str = (string) $str; // cast $str as a string

Debugging Code
==============

Do not leave debugging code in your submissions, even when commented out.
Things such as ``var_dump()``, ``print_r()``, ``die()``/``exit()`` should not be included
in your code unless it serves a specific purpose other than debugging.

Whitespace in Files
===================

No whitespace can precede the opening PHP tag or follow the closing PHP
tag. Output is buffered, so whitespace in your files can cause output to
begin before CodeIgniter outputs its content, leading to errors and an
inability for CodeIgniter to send proper headers.

Compatibility
=============

CodeIgniter recommends PHP 5.4 or newer to be used, but it should be
compatible with PHP 5.2.4. Your code must either be compatible with this
requirement, provide a suitable fallback, or be an optional feature that
dies quietly without affecting a user's application.

Additionally, do not use PHP functions that require non-default libraries
to be installed unless your code contains an alternative method when the
function is not available.

One File per Class
==================

Use separate files for each class, unless the classes are *closely related*.
An example of a CodeIgniter file that contains multiple classes is the 
Xmlrpc library file.

Whitespace
==========

Use tabs for whitespace in your code, not spaces. This may seem like a
small thing, but using tabs instead of whitespace allows the developer
looking at your code to have indentation at levels that they prefer and
customize in whatever application they use. And as a side benefit, it
results in (slightly) more compact files, storing one tab character
versus, say, four space characters.

Line Breaks
===========

Files must be saved with Unix line breaks. This is more of an issue for
developers who work in Windows, but in any case ensure that your text
editor is setup to save files with Unix line breaks.

Code Indenting
==============

Use Allman style indenting. With the exception of Class declarations,
braces are always placed on a line by themselves, and indented at the
same level as the control statement that "owns" them.

**INCORRECT**::

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

**CORRECT**::

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

Bracket and Parenthetic Spacing
===============================

In general, parenthesis and brackets should not use any additional
spaces. The exception is that a space should always follow PHP control
structures that accept arguments with parenthesis (declare, do-while,
elseif, for, foreach, if, switch, while), to help distinguish them from
functions and increase readability.

**INCORRECT**::

	$arr[ $foo ] = 'foo';

**CORRECT**::

	$arr[$foo] = 'foo'; // no spaces around array keys

**INCORRECT**::

	function foo ( $bar )
	{

	}

**CORRECT**::

	function foo($bar) // no spaces around parenthesis in function declarations
	{

	}

**INCORRECT**::

	foreach( $query->result() as $row )

**CORRECT**::

	foreach ($query->result() as $row) // single space following PHP control structures, but not in interior parenthesis

Localized Text
==============

CodeIgniter libraries should take advantage of corresponding language files
whenever possible.

**INCORRECT**::

	return "Invalid Selection";

**CORRECT**::

	return $this->lang->line('invalid_selection');

Private Methods and Variables
=============================

Methods and variables that are only accessed internally,
such as utility and helper functions that your public methods use for
code abstraction, should be prefixed with an underscore.

::

	public function convert_text()
	private function _convert_text()

PHP Errors
==========

Code must run error free and not rely on warnings and notices to be
hidden to meet this requirement. For instance, never access a variable
that you did not set yourself (such as ``$_POST`` array keys) without first
checking to see that it ``isset()``.

Make sure that your dev environment has error reporting enabled
for ALL users, and that display_errors is enabled in the PHP
environment. You can check this setting with::

	if (ini_get('display_errors') == 1)
	{
		exit "Enabled";
	}

On some servers where *display_errors* is disabled, and you do not have
the ability to change this in the php.ini, you can often enable it with::

	ini_set('display_errors', 1);

.. note:: Setting the `display_errors
	<http://php.net/manual/en/errorfunc.configuration.php#ini.display-errors>`_
	setting with ``ini_set()`` at runtime is not identical to having
	it enabled in the PHP environment. Namely, it will not have any
	effect if the script has fatal errors.

Short Open Tags
===============

Always use full PHP opening tags, in case a server does not have
*short_open_tag* enabled.

**INCORRECT**::

	<? echo $foo; ?>

	<?=$foo?>

**CORRECT**::

	<?php echo $foo; ?>

.. note:: PHP 5.4 will always have the **<?=** tag available.

One Statement Per Line
======================

Never combine statements on one line.

**INCORRECT**::

	$foo = 'this'; $bar = 'that'; $bat = str_replace($foo, $bar, $bag);

**CORRECT**::

	$foo = 'this';
	$bar = 'that';
	$bat = str_replace($foo, $bar, $bag);

Strings
=======

Always use single quoted strings unless you need variables parsed, and
in cases where you do need variables parsed, use braces to prevent
greedy token parsing. You may also use double-quoted strings if the
string contains single quotes, so you do not have to use escape
characters.

**INCORRECT**::

	"My String"					// no variable parsing, so no use for double quotes
	"My string $foo"				// needs braces
	'SELECT foo FROM bar WHERE baz = \'bag\''	// ugly

**CORRECT**::

	'My String'
	"My string {$foo}"
	"SELECT foo FROM bar WHERE baz = 'bag'"

SQL Queries
===========

SQL keywords are always capitalized: SELECT, INSERT, UPDATE, WHERE,
AS, JOIN, ON, IN, etc.

Break up long queries into multiple lines for legibility, preferably
breaking for each clause.

**INCORRECT**::

	// keywords are lowercase and query is too long for
	// a single line (... indicates continuation of line)
	$query = $this->db->query("select foo, bar, baz, foofoo, foobar as raboof, foobaz from exp_pre_email_addresses
	...where foo != 'oof' and baz != 'zab' order by foobaz limit 5, 100");

**CORRECT**::

	$query = $this->db->query("SELECT foo, bar, baz, foofoo, foobar AS raboof, foobaz
					FROM exp_pre_email_addresses
					WHERE foo != 'oof'
					AND baz != 'zab'
					ORDER BY foobaz
					LIMIT 5, 100");

Default Function Arguments
==========================

Whenever appropriate, provide function argument defaults, which helps
prevent PHP errors with mistaken calls and provides common fallback
values which can save a few lines of code. Example::

	function foo($bar = '', $baz = FALSE)