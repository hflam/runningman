var chart;
var options;
$(document).ready(function() {
	$('.click-tooltip').tooltip();
	$('.click-popover').popover();
	$('.campaign-tooltip').tooltip();
	$('.location-tooltip').tooltip();
	$.include(
		// URL
		'/theme/bootstrap/js/highcharts/highcharts.js',
		// will be loaded after this script
		$.include('/theme/bootstrap/js/highslide/highslide-full.js', function() {

				// ****** CHART 1 ****
				// define the options
				options = {

					chart: {
						renderTo: 'latestClicks'
					},

					title: {
						text: 'Unique Clicks vs Total Clicks'
					},

					subtitle: {
						text: 'Shows click for the last 30 days'
					},

					xAxis: {
						type: 'datetime',
						tickInterval: 24 * 3600 * 1000, // one day
						tickWidth: 0,
						gridLineWidth: 1,
						labels: {
							align: 'left',
							x: 3,
							y: -3
						}
					},

					yAxis: [{ // left y axis
						title: {
							text: null
						},
						labels: {
							align: 'left',
							x: 3,
							y: 16,
							formatter: function() {
								return Highcharts.numberFormat(this.value, 0);
							}
						},
						showFirstLabel: false
					}, { // right y axis
						linkedTo: 0,
						gridLineWidth: 0,
						opposite: true,
						title: {
							text: null
						},
						labels: {
							align: 'right',
							x: -3,
							y: 16,
							formatter: function() {
								return Highcharts.numberFormat(this.value, 0);
							}
						},
						showFirstLabel: false
					}],

					legend: {
						align: 'left',
						verticalAlign: 'top',
						y: 20,
						floating: true,
						borderWidth: 0
					},

					tooltip: {
						shared: true,
						crosshairs: true
					},

					plotOptions: {
						series: {
							cursor: 'pointer',
							point: {
								events: {
									click: function() {
										var pageX = this.pageX;
										var pageY = this.pageY;
										var seriesName = this.series.name;
										var este = this;
										var date = new Date(este.x);
										var sqlDate = Highcharts.dateFormat('%Y-%m-%d', date);
										console.log('clicked');
										/*
										if (seriesName == 'Unique Clicks') {
											$.ajax({
												url: '/admin/ajax/get_ordenes_con_fecha',
												dataType: 'json',
												type: 'POST',
												data: {fecha: sqlDate},
												success: function (response) {
													var maincontentText = 'Fecha: ' + Highcharts.dateFormat('%d/%m/%Y', date) + '<br /><br />';
													$.each(response.data, function(index, value) {
														maincontentText = maincontentText +
															'<a href="/admin/ordenes/view/' + value.Orden.id + '">Orden #' + value.Orden.folio + '</a><br />' +
															'Proveedor: ' + value.Proveedor.nombre + '<br />' +
															'Total: $' + Highcharts.numberFormat(value.Orden.total,2,'.') + '<br />' +
															'<br />';
													});
													maincontentText = maincontentText + '<br />Suma Total: $' + Highcharts.numberFormat(este.y) + '<br /><br />';

													hs.htmlExpand(null, {
														pageOrigin: {
															x: pageX,
															y: pageY
														},
														headingText: seriesName,
														maincontentText: maincontentText,
														width: 400
													});
											  }
											});
										} else if (seriesName == 'Total Clicks') {
											$.ajax({
												url: '/admin/ajax/get_facturas_con_fecha',
												dataType: 'json',
												type: 'POST',
												data: {fecha: sqlDate},
												success: function (response) {
													var maincontentText = 'Fecha: ' + Highcharts.dateFormat('%d/%m/%Y', date) + '<br /><br />';
													$.each(response.data, function(index, value) {
														maincontentText = maincontentText +
															'<a href="/admin/facturas/view/' + value.Factura.id + '">Factura #' + value.Factura.folio + '</a><br />' +
															'Cliente: ' + value.Cliente.nombre + '<br />' +
															'Total: $' + Highcharts.numberFormat(value.Factura.total,2,'.') + '<br />' +
															'<br />';
													});
													maincontentText = maincontentText + '<br />Suma Total: $' + Highcharts.numberFormat(este.y) + '<br /><br />';

													hs.htmlExpand(null, {
														pageOrigin: {
															x: pageX,
															y: pageY
														},
														headingText: seriesName,
														maincontentText: maincontentText,
														width: 400
													});
											  }
											});
										}
										*/
									}
								}
							},
							marker: {
								lineWidth: 1
							}
						}
					},

					series: [{
						name: 'Total Clicks',
						lineWidth: 4,
						marker: {
							radius: 4
						}
					}, {
						name: 'Unique Clicks'
					}]
				};

				// Load data asynchronously using jQuery. On success, add the data
				// to the options and initiate the chart.
				$.ajax({
					url: '/admin/ajax/get_latest_clicks',
					dataType: 'json',
					type: 'POST',
					success: function (response) {
						//console.log('success latest clicks');
						//console.log(response.data);

						// set up the two data series
						var date,
							total,
							subtotal,
							unique_clicks = [],
							total_clicks = [];

						$.each(response.data.uniqueClicks, function(index, value) {
							date = Date.parse(value.Click.created_date);
							total = parseFloat(value.Click.total);

							unique_clicks.push([
								date,
								total
							]);
						});
						$.each(response.data.totalClicks, function(index, value) {
							date = Date.parse(value.Click.created_date);
							total = parseFloat(value.Click.total);

							total_clicks.push([
								date,
								total
							]);
						});

						options.series[0].data = total_clicks;
						options.series[1].data = unique_clicks;

						chart = new Highcharts.Chart(options);

				  }
				});

			}
		)
	);
});
