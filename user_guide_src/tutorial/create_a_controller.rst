#############################
Crear un controlador con KPAM
#############################

Para crear un controlador en KPAM usamos el comando **c** seguido del
nombre del controlador y posteriormente los nombres de las funciones,
anteponiendo un guion bajo a los nombres de las funciones privadas::

  c Nombre_del_controlador nombre_de_funcion_publica _nombre_de_funcion_privada

La ejecución de este comando producira el archivo **Nombre_del_controlador.php** con el
siguiente contenido::

  <?php

  /**
   * Nombre_del_controlador Controller:
   *
   * @autor Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @date 2015/01/29
   *
   */

  class Nombre_del_controlador extends CI_Controller {

    public function __construct() {
      parent::__construct();
    }

    public function index() {
    }

    public function nombre_de_funcion_publica(){
    }

    private function _nombre_de_funcion_privada(){
    }

  }

Se puede crear todas las funciones publicas y privadas que desee
en el orden que sea conveniente.

Para cambiar el nombre y correo del de autor por defecto vea la
sección :doc:`Configuración de KPAM <kpam_config>`