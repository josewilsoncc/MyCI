$(document).on('ready', function() {

  $("#btn_bar3D").on("click", function() {
   ejecuta_grafica(bar3d,  base_url() + 'report_graphic/bar3d', {titulo: 'grafica 2015', capa_grafica: 'mi_capa'});
  });

  $("#btn_barClustered").on("click", function() {
   ejecuta_grafica(barClustered,  base_url() + 'report_graphic/barClustered', {titulo_columna_1: 'ingresos', titulo_columna_2: 'Gastos', capa_grafica: 'mi_capa'});
  });
});

/**
 * ejecuta una peticion ajax que devuelve un arreglo en formato json el cual se encarga de pintar 
 * una grafica segun sus parametros
 * @param {function} funcion: el nombre sin comillas de la grafica a utilizar, se escribe sin comillas porque
 * hace referencia a un metodo.
 * @param {string} url:  la url del controlador y su respectivo metodo
 * @param {array} parametros:  un array personalizado que permite cambiar algunos valores de la grafica
 * los indices del arreglo se especifican en la documetacion de cada metodo a llamar
 * @autor Alvaro javier vanegas ochoa, alvarovanegas18@gmail.com
 * @date 2015/01/05
 */
function ejecuta_grafica(funcion, url, parametros) {
  $.ajax({
    url: url,
    type: 'post',
    dataType: "json",
    success: function(data) {
      funcion(data, parametros);
    },
    error: function(data) {
      $("#contenedor_grafico").html('<p class="lead text-danger text-center">Ocurrio un error al generar la grafica, intentelo nuevamente.</p>');
    }
  });
}
/**
 * genera una grafica de barras en 3D de forma horizontal, con el eje Y de 'concepto' y eje X de 'valor'
 * @param {JSON} chartData: el arreglo en formato JSON que se encarga de pintar la grafica
 * @param {array} parametros: un array personalizado que permite cambiar algunos valores de la grafica
 * los indices del arreglo son:
 * parametros['titulo'] =  el titulo que se encuentra en el eje X
 * parametros['capa_grafica'] =  el id del div donde se pintara la grafica
 * @autor Alvaro javier vanegas ochoa, alvarovanegas18@gmail.com
 * @date 2014/12/23
 */
function bar3d(chartData, parametros) {

  var titulo = parametros['titulo'];
  chart = new AmCharts.AmSerialChart();
  chart.dataProvider = chartData;
  chart.categoryField = "year";
  // this single line makes the chart a bar chart,
  // try to set it to false - your bars will turn to columns
  chart.rotate = true;
  // the following two lines makes chart 3D
  chart.depth3D = 20;
  chart.angle = 30;
  // AXES
  // Category
  var categoryAxis = chart.categoryAxis;
  categoryAxis.gridPosition = "start";
  categoryAxis.axisColor = "#DADADA";
  categoryAxis.fillAlpha = 1;
  categoryAxis.gridAlpha = 0;
  categoryAxis.fillColor = "#FAFAFA";
  // value
  var valueAxis = new AmCharts.ValueAxis();
  valueAxis.axisColor = "#DADADA";
  valueAxis.title = titulo;
  valueAxis.gridAlpha = 0.1;
  chart.addValueAxis(valueAxis);
  // GRAPH
  var graph = new AmCharts.AmGraph();
  graph.title = "Income";
  graph.valueField = "income";
  graph.type = "column";
  graph.balloonText = "Valor = [[category]]:[[value]]";
  graph.lineAlpha = 0;
  graph.fillColors = "#bf1c25";
  graph.fillAlphas = 1;
  chart.addGraph(graph);
  chart.creditsPosition = "top-right";
  // WRITE
  chart.write(parametros['capa_grafica']);
}

/**
 * genera una grafica de barras en 3D de forma horizontal, comparando valor x y valor y entre un grupo de 2 columnas
 * @param {JSON} chartData: el arreglo en formato JSON que se encarga de pintar la grafica
 * @param {array} parametros: un array personalizado que permite cambiar algunos valores de la grafica
 * los indices del arreglo son:
 * parametros['titulo_columna_1'] =  el titulo de la primera barra estadistica del grupo
 * parametros['titulo_columna_2'] =  el titulo de la segunda barra estadistica del grupo
 * parametros['capa_grafica'] =  el id del div donde se pintara la grafica
 * @autor Alvaro javier vanegas ochoa, alvarovanegas18@gmail.com
 * @date 2014/12/23
 */
function barClustered(chartData, parametros) {
  chart = new AmCharts.AmSerialChart();
  chart.dataProvider = chartData;
  chart.categoryField = "year";
  chart.startDuration = 1;
  chart.plotAreaBorderColor = "#DADADA";
  chart.plotAreaBorderAlpha = 1;
  // this single line makes the chart a bar chart
  chart.rotate = true;

  // AXES
  // Category
  var categoryAxis = chart.categoryAxis;
  categoryAxis.gridPosition = "start";
  categoryAxis.gridAlpha = 0.1;
  categoryAxis.axisAlpha = 0;

  // Value
  var valueAxis = new AmCharts.ValueAxis();
  valueAxis.axisAlpha = 0;
  valueAxis.gridAlpha = 0.1;
  valueAxis.position = "top";
  chart.addValueAxis(valueAxis);

  // GRAPHS
  // first graph
  var graph1 = new AmCharts.AmGraph();
  graph1.type = "column";
  graph1.title = parametros['titulo_columna_1'];
  graph1.valueField = "income";
  graph1.balloonText = parametros['titulo_columna_1'] + ":[[value]]";
  graph1.lineAlpha = 0;
  graph1.fillColors = "#ADD981";
  graph1.fillAlphas = 1;
  chart.addGraph(graph1);

  // second graph
  var graph2 = new AmCharts.AmGraph();
  graph2.type = "column";
  graph2.title = parametros['titulo_columna_2'];
  graph2.valueField = "expenses";
  graph2.balloonText = parametros['titulo_columna_2'] + ":[[value]]";
  graph2.lineAlpha = 0;
  graph2.fillColors = "#81acd9";
  graph2.fillAlphas = 1;
  chart.addGraph(graph2);

  // LEGEND
  var legend = new AmCharts.AmLegend();
  chart.addLegend(legend);

  chart.creditsPosition = "top-right";

  // WRITE
  chart.write(parametros['capa_grafica']);

}