@extends('layout.main')
@section('container')

    <div class="content-wrapper">

      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </div>


      <section class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-lg-4 col-6">

              <div class="small-box bg-info">
                <div class="inner">
                  <h3> {{ $Input->total() }} Data </h3>  
                  <p>Surface Water</p>
                </div>
                <div  class="icon">
                <i class="fa-solid fa-water"></i>
                </div>
                <a href="/auth/surfacewater" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-6">

              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$Blasting->count()}} Data</h3>
                  <p>Blasting</p>
                </div>
                <div class="icon">
                <i class="fa-solid fa-explosion"></i>
                </div>
                <a href="/auth/blasting" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-6">

              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $Groundwater->count() }}</h3>
                  <p>Groundwater</p>
                </div>
                <div class="icon">
                <i class="fa-solid fa-arrow-up-from-ground-water"></i>
                </div>
                <a href="auth/groundwater/msm" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

        

          </div>


          <div class="row">

            <section class="col-lg-7 connectedSortable">

              <div class="card">
               
                <div class="card-body">
                      <div class="chart tab-pane active" id="surface_waterChart" height="300" style="position: relative; height: 300px;"></div>
                </div>
              </div>


            </section>


            <section class="col-lg-5 connectedSortable">

              <div class="card ">
               
                <div class="card-body">
                  <div id="blasting" height="300" style="position: relative; height: 300px;"></div>
                </div>

              </div>


            </section>

          </div>

        </div>
      </section>

    </div>
    <script>
 Highcharts.chart('blasting', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Vibration Monitoring Results'
    },
    xAxis: {
        categories: {!! json_encode($tanggal) !!}
    },
    yAxis: [{
        min: 0,
        title: {
            text: 'vibration (mm/s)'
        }
    }],
    legend: {
        shadow: false
    },
    tooltip: {
        shared: true
    },
    plotOptions: {
        column: {
            grouping: false,
            shadow: false,
            borderWidth: 0
        }
    },
    series: [{
        name: 'maximum vibration class 3',
        color: 'rgba(248,161,63,1)',
        data: {!! json_encode($peak_std) !!},
        pointPadding: 0.1,
       
       
    }, {
        name: 'peak vibration',
        color: 'rgba(186,60,61,.9)',
        data: {!! json_encode($peak) !!},
        pointPadding: 0.2,
       
    }]
});
</script>
<script>
        Highcharts.chart('surface_waterChart', {
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
                    }, {
                        name: 'TDS',
                        color:'#F4CC70',
                        marker: {
                            symbol: 'triangle'
                        },
                        data: {!! json_encode($tds) !!}
                    }, {
                        name: 'TSS',
                        color:'#20948B',
                        marker: {
                            symbol: 'circle'
                        },
                        data: {!! json_encode($tss) !!}
                    }, {
                        name: 'PH',
                        color:'#6AB187',
                        marker: {
                            symbol: 'triangle-down'
                        },
                        data: {!! json_encode($ph) !!}
                    }]
        });
</script>

  @endsection

