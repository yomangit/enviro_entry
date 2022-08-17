const chart=  Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text:' Surface Water Chart'
    },  
    xAxis: {
        categories: {!! json_encode($date) !!}
   },
    yAxis: {
        title: {
            text: 'Value'
        }
    },
  
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
                name: 'Temperatur',
                
                color:'#1F2833',
                data: {!! json_encode($suhu) !!},
                marker: {
                    symbol: 'square'
                },
                

            }, {
                name: 'Conductivity (µS/cm)',
                color:'#DE7A22',
                
                marker: {
                    symbol: 'diamond'
                },
                data: {!! json_encode($conductivity) !!}
            },]
});

document.getElementById('tssBtn').addEventListener('click', () => {
const series1 = chart.series[0];
console.log(series1);
series1.setVisible(!series1.visible)
})
