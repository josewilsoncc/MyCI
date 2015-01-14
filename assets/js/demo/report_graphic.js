/**
 * este metodo se creo para simplificar la forma de ver los graficos en el demo a nivel de codigo, no es necesario hacerlo de este modo.
 * simplemente llamar un metodo X de controlador X y crear su respectivo arreglo JSON.
 * @param {type} nombre_metodo : el nombre del metodo a pintar
 */

function graphic_type(function_graphic, uri){
  run_graphics(function_graphic, base_url() + 'demo/report/'+uri, 'mi_capa');
}