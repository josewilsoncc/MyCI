var capa_grafica = '';
$(document).on('ready', function() {
  /* la capa contenedora que posee la grafica no es responsiva por eso se usa este metodo, para calcular el tamaÃ±o de la ventana cada vez que tenga un cambio.*/
  $(window).resize(function() {
    var ancho = percentage_dimension(80, true);
    var alto = percentage_dimension(80, false);
    $(capa_grafica).css({'width': ancho, 'height': alto});
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
  capa_grafica = '#' + parametros['capa_grafica']; // se guarda el nombre de la capa en una variable global para usarla cuando la ventana cambie de resolucion.
  $.ajax({
    url: url,
    type: 'post',
    dataType: "json",
    success: function(data) {
      var ancho = percentage_dimension(80, true);
      var alto = percentage_dimension(80, false);
      $('#' + parametros['capa_grafica']).css({'width': ancho, 'height': alto});
      funcion(data, parametros);
    },
    error: function(data) {
      $('#' + parametros['capa_grafica']).html('<p class="lead text-danger text-center">Ocurrio un error al generar la grafica, intentelo nuevamente.</p>');
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
  chart.categoryField = "nombre_eje_y";
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
  graph.valueField = "valor";
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
  chart.categoryField = "nombre_eje_y";
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
  graph1.valueField = "valor_1";
  graph1.balloonText = parametros['titulo_columna_1'] + ":[[value]]";
  graph1.lineAlpha = 0;
  graph1.fillColors = "#ADD981";
  graph1.fillAlphas = 1;
  chart.addGraph(graph1);
  // second graph
  var graph2 = new AmCharts.AmGraph();
  graph2.type = "column";
  graph2.title = parametros['titulo_columna_2'];
  graph2.valueField = "valor_2";
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

/**
 * genera una grafica de barras en forma vertical con una linea comparativa, comparando valor x y valor y 
 * @param {JSON} chartData: el arreglo en formato JSON que se encarga de pintar la grafica
 * @param {array} parametros: un array personalizado que permite cambiar algunos valores de la grafica
 * los indices del arreglo son:
 * parametros['titulo_eje_y'] =  el titulo del eje Y
 * parametros['capa_grafica'] =  el id del div donde se pintara la grafica
 * @autor Alvaro javier vanegas ochoa, alvarovanegas18@gmail.com
 * @date 2015/01/06
 */
function columns3d(chartData, parametros) {
  // SERIAL CHART
  chart = new AmCharts.AmSerialChart();
  chart.dataProvider = chartData;
  chart.categoryField = "nombre_eje_x";
  // the following two lines makes chart 3D
  chart.depth3D = 20;
  chart.angle = 30;
  // AXES
  // category
  var categoryAxis = chart.categoryAxis;
  categoryAxis.labelRotation = 90;
  categoryAxis.dashLength = 5;
  categoryAxis.gridPosition = "start";
  // value
  var valueAxis = new AmCharts.ValueAxis();
  valueAxis.title = parametros['titulo_eje_y'];
  valueAxis.dashLength = 5;
  chart.addValueAxis(valueAxis);
  // GRAPH
  var graph = new AmCharts.AmGraph();
  graph.valueField = "valor";
  graph.colorField = "color";
  graph.balloonText = "<span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
  graph.type = "column";
  graph.lineAlpha = 0;
  graph.fillAlphas = 1;
  chart.addGraph(graph);
  // CURSOR
  var chartCursor = new AmCharts.ChartCursor();
  chartCursor.cursorAlpha = 0;
  chartCursor.zoomable = false;
  chartCursor.categoryBalloonEnabled = false;
  chart.addChartCursor(chartCursor);
  chart.creditsPosition = "top-right";
  // WRITE
  chart.write(parametros['capa_grafica']);
}

/**
 * genera una grafica de barras en forma vertical con una linea comparativa, comparando valor x y valor y 
 * @param {JSON} chartData: el arreglo en formato JSON que se encarga de pintar la grafica
 * @param {array} parametros: un array personalizado que permite cambiar algunos valores de la grafica
 * los indices del arreglo son:
 * parametros['titulo_valor_1'] =  el titulo de la barra vertical
 * parametros['titulo_valor_2'] =  el titulo de la linea comparativa
 * parametros['capa_grafica'] =  el id del div donde se pintara la grafica
 * @autor Alvaro javier vanegas ochoa, alvarovanegas18@gmail.com
 * @date 2015/01/06
 */
function columnAndLineMix(chartData, parametros) {
  // SERIAL CHART  
  chart = new AmCharts.AmSerialChart();
  //chart.pathToImages = "../amcharts/images/";
  chart.dataProvider = chartData;
  chart.categoryField = "nombre_eje_x";
  chart.startDuration = 1;
  chart.handDrawn = true;
  chart.handDrawnScatter = 3;
  // AXES
  // category
  var categoryAxis = chart.categoryAxis;
  categoryAxis.gridPosition = "start";
  // value
  var valueAxis = new AmCharts.ValueAxis();
  valueAxis.axisAlpha = 0;
  chart.addValueAxis(valueAxis);
  // GRAPHS
  // column graph
  var graph1 = new AmCharts.AmGraph();
  graph1.type = "column";
  graph1.title = parametros['titulo_valor_1'];
  graph1.lineColor = "#a668d5";
  graph1.valueField = "valor_1";
  graph1.lineAlpha = 1;
  graph1.fillAlphas = 1;
  graph1.dashLengthField = "dashLengthColumn";
  graph1.alphaField = "alpha";
  graph1.balloonText = "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>";
  chart.addGraph(graph1);
  // line
  var graph2 = new AmCharts.AmGraph();
  graph2.type = "line";
  graph2.title = parametros['titulo_valor_2'];
  graph2.lineColor = "#fcd202";
  graph2.valueField = "valor_2";
  graph2.lineThickness = 3;
  graph2.bullet = "round";
  graph2.bulletBorderThickness = 3;
  graph2.bulletBorderColor = "#fcd202";
  graph2.bulletBorderAlpha = 1;
  graph2.bulletColor = "#ffffff";
  graph2.dashLengthField = "dashLengthLine";
  graph2.balloonText = "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>";
  chart.addGraph(graph2);
  // LEGEND                
  var legend = new AmCharts.AmLegend();
  legend.useGraphSettings = true;
  chart.addLegend(legend);
  // WRITE
  chart.write(parametros['capa_grafica']);
}

/**
 * genera una grafica de barras ne forma cilindrica , comparando valor x y valor y 
 * @param {JSON} chartData: el arreglo en formato JSON que se encarga de pintar la grafica
 * @param {array} parametros: un array personalizado que permite cambiar algunos valores de la grafica
 * los indices del arreglo son:
 * parametros['capa_grafica'] =  el id del div donde se pintara la grafica
 * @autor Alvaro javier vanegas ochoa, alvarovanegas18@gmail.com
 * @date 2015/01/06
 */
function columnCylinders(chartData, parametros) {
  // SERIAL CHART
  chart = new AmCharts.AmSerialChart();
  chart.dataProvider = chartData;
  chart.categoryField = "nombre_eje_x";
  chart.startDuration = 1;
  chart.depth3D = 50;
  chart.angle = 30;
  chart.marginRight = -45;
  // AXES
  // category
  var categoryAxis = chart.categoryAxis;
  categoryAxis.gridAlpha = 0;
  categoryAxis.axisAlpha = 0;
  categoryAxis.gridPosition = "start";
  // value
  var valueAxis = new AmCharts.ValueAxis();
  valueAxis.axisAlpha = 0;
  valueAxis.gridAlpha = 0;
  chart.addValueAxis(valueAxis);
  // GRAPH
  var graph = new AmCharts.AmGraph();
  graph.valueField = "valor";
  graph.colorField = "color";
  graph.balloonText = "<b>[[category]]: [[value]]</b>";
  graph.type = "column";
  graph.lineAlpha = 0.5;
  graph.lineColor = "#FFFFFF";
  graph.topRadius = 1;
  graph.fillAlphas = 0.9;
  chart.addGraph(graph);
  // CURSOR
  var chartCursor = new AmCharts.ChartCursor();
  chartCursor.cursorAlpha = 0;
  chartCursor.zoomable = false;
  chartCursor.categoryBalloonEnabled = false;
  chartCursor.valueLineEnabled = true;
  chartCursor.valueLineBalloonEnabled = true;
  chartCursor.valueLineAlpha = 1;
  chart.addChartCursor(chartCursor);
  chart.creditsPosition = "top-right";
  // WRITE
  chart.write(parametros['capa_grafica']);
}

/**
 * genera una grafica de barras simple , comparando valor x y valor y 
 * @param {JSON} chartData: el arreglo en formato JSON que se encarga de pintar la grafica
 * @param {array} parametros: un array personalizado que permite cambiar algunos valores de la grafica
 * los indices del arreglo son:
 * parametros['capa_grafica'] =  el id del div donde se pintara la grafica
 * @autor Alvaro javier vanegas ochoa, alvarovanegas18@gmail.com
 * @date 2015/01/07
 */
function columnSimple(chartData, parametros) {
  // SERIAL CHART
  chart = new AmCharts.AmSerialChart();
  chart.dataProvider = chartData;
  chart.categoryField = "nombre_eje_x";
  chart.startDuration = 1;
  // AXES
  // category
  var categoryAxis = chart.categoryAxis;
  categoryAxis.labelRotation = 90;
  categoryAxis.gridPosition = "start";
  // value
  // in case you don't want to change default settings of value axis,
  // you don't need to create it, as one value axis is created automatically.
  // GRAPH
  var graph = new AmCharts.AmGraph();
  graph.valueField = "valor";
  graph.balloonText = "[[category]]: <b>[[value]]</b>";
  graph.type = "column";
  graph.lineAlpha = 0;
  graph.fillAlphas = 0.8;
  chart.addGraph(graph);
  // CURSOR
  var chartCursor = new AmCharts.ChartCursor();
  chartCursor.cursorAlpha = 0;
  chartCursor.zoomable = false;
  chartCursor.categoryBalloonEnabled = false;
  chart.addChartCursor(chartCursor);
  chart.creditsPosition = "top-right";
  chart.write(parametros['capa_grafica']);
}

/**
 * genera una grafica de pastel en 3D
 * @param {JSON} chartData: el arreglo en formato JSON que se encarga de pintar la grafica
 * @param {array} parametros: un array personalizado que permite cambiar algunos valores de la grafica
 * los indices del arreglo son:
 * parametros['capa_grafica'] =  el id del div donde se pintara la grafica
 * @autor Alvaro javier vanegas ochoa, alvarovanegas18@gmail.com
 * @date 2015/01/07
 */
function pie3D(chartData, parametros) {
  // PIE CHART
  chart = new AmCharts.AmPieChart();
  chart.dataProvider = chartData;
  chart.titleField = "nombre";
  chart.valueField = "valor";
  chart.outlineColor = "#FFFFFF";
  chart.outlineAlpha = 0.8;
  chart.outlineThickness = 2;
  chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
  // this makes the chart 3D
  chart.depth3D = 15;
  chart.angle = 30;
  // WRITE
  chart.write(parametros['capa_grafica']);
}

/**
 * genera una grafica de pastel tipo dona, 
 * @param {JSON} chartData: el arreglo en formato JSON que se encarga de pintar la grafica
 * @param {array} parametros: un array personalizado que permite cambiar algunos valores de la grafica
 * los indices del arreglo son:
 * parametros['titulo'] =  el titulo o cabezera de la grafica
 * parametros['tamano_titulo'] =  el tamaÃ±o en px de la letra de titulo
 * parametros['capa_grafica'] =  el id del div donde se pintara la grafica
 * @autor Alvaro javier vanegas ochoa, alvarovanegas18@gmail.com
 * @date 2015/01/08
 */
function pieDonut3D(chartData, parametros) {
// PIE CHART
  chart = new AmCharts.AmPieChart();
  // title of the chart
  chart.addTitle(parametros['titulo'], parametros['tamano_titulo']);
  chart.dataProvider = chartData;
  chart.titleField = "nombre";
  chart.valueField = "valor";
  chart.sequencedAnimation = true;
  chart.startEffect = "elastic";
  chart.innerRadius = "30%";
  chart.startDuration = 2;
  chart.labelRadius = 15;
  chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
  // the following two lines makes the chart 3D
  chart.depth3D = 10;
  chart.angle = 15;
  // WRITE                                 
  chart.write(parametros['capa_grafica']);
}


/**
 * genera una grafica de piramide en 3D, 
 * @param {JSON} chartData: el arreglo en formato JSON que se encarga de pintar la grafica
 * @param {array} parametros: un array personalizado que permite cambiar algunos valores de la grafica
 * los indices del arreglo son:
 * parametros['capa_grafica'] =  el id del div donde se pintara la grafica
 * @autor Alvaro javier vanegas ochoa, alvarovanegas18@gmail.com
 * @date 2015/01/08
 */
function  pyramidChart3D(chartData, parametros) {
  chart = new AmCharts.AmFunnelChart();
  chart.rotate = true;
  chart.titleField = "titulo";
  chart.balloon.fixedPosition = true;
  chart.marginRight = 210;
  chart.marginLeft = 15;
  chart.labelPosition = "right";
  chart.funnelAlpha = 0.9;
  chart.valueField = "valor";
  chart.startX = -500;
  chart.dataProvider = chartData;
  chart.startAlpha = 0;
  chart.depth3D = 100;
  chart.angle = 30;
  chart.outlineAlpha = 1;
  chart.outlineThickness = 2;
  chart.outlineColor = "#FFFFFF";
  chart.write(parametros['capa_grafica']);
}

/**
 * este metodo se creo para simplificar la forma de ver los graficos en el demo a nivel de codigo, no es necesario hacerlo de este modo.
 * simplemente llamar un metodo X de controlador X y crear su respectivo arreglo JSON.
 * @param {type} nombre_metodo : el nombre del metodo a pintar
 */
function selector_metodo(nombre_metodo) {
  switch (nombre_metodo) {
    case 'bar_3d':
      ejecuta_grafica(bar3d, base_url() + 'demo/report/bar_3d', {titulo: 'grafica 2015', capa_grafica: 'mi_capa'});
      break;

    case 'bar_clustered':
      ejecuta_grafica(barClustered, base_url() + 'demo/report/bar_clustered', {titulo_columna_1: 'ingresos', titulo_columna_2: 'Gastos', capa_grafica: 'mi_capa'});
      break;

    case 'columns_3d':
      ejecuta_grafica(columns3d, base_url() + 'demo/report/columns_3d', {titulo_eje_y: 'incidencias 2015', capa_grafica: 'mi_capa'});
      break;

    case 'column_and_line_mix':
      ejecuta_grafica(columnAndLineMix, base_url() + 'demo/report/column_and_line_mix', {titulo_valor_1: 'ingresos', titulo_valor_2: 'Gastos', capa_grafica: 'mi_capa'});
      break;
    case 'column_cylinders':
      ejecuta_grafica(columnCylinders, base_url() + 'demo/report/column_cylinders', {capa_grafica: 'mi_capa'});
      break;

    case 'column_simple':
      ejecuta_grafica(columnSimple, base_url() + 'demo/report/column_simple', {capa_grafica: 'mi_capa'});
      break;

    case 'pie_3D':
      ejecuta_grafica(pie3D, base_url() + 'demo/report/pie_3D', {capa_grafica: 'mi_capa'});
      break;

    case 'pie_donut_3D':
      ejecuta_grafica(pieDonut3D, base_url() + 'demo/report/pie_donut_3D', {titulo: 'problemas en las sucursales', tamano_titulo: 20, capa_grafica: 'mi_capa'});
      break;

    case 'pyramid_chart_3D':
      ejecuta_grafica(pyramidChart3D, base_url() + 'demo/report/pyramid_chart_3D', {capa_grafica: 'mi_capa'});
      break;
  }
}