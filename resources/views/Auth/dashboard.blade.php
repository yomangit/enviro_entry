@extends('layout.main')
@section('container')

<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
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
            <div class="icon">
              <i class="fa-solid fa-water"></i>
            </div>
            <a href="/dashboard/index/dataentry" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="/dashboard/blasting" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="/dashboard/groundwater/mastergw" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-6 ">
          <div class="card">
            <div class="card-header">
              <div class="card-title text center text-secondary">Blasting Vibration Monitoring Results</div>
            </div>
            <div class="card-body table-responsive p-0" id="blasting" style=" width: auto"></div>
          </div>
        </div>
        <div class="col-6 ">
          <div class="card">
            <div class="card-header">
              <div class="card-title text center text-secondary">Blasting Noise Level</div>
            </div>
            <div class="card-body table-responsive p-0" id="noise" style=" width: auto"></div>
          </div>
        </div>
      </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title text center text-secondary">Waste Water </div>
            </div>
            <div class="card-body table-responsive p-0" id="container" style=" width: auto"></div>
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
              text: ''
          },
          xAxis: {
              categories: {!! json_encode($tgl_blas) !!}
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
        color: '#b2d8d8',
        data: {!! json_encode($peak_std) !!},
        pointPadding: 0.2,
       
       
    }, {
        name: 'peak vibration',
        color: '#004c4c',
        data: {!! json_encode($peak) !!},
        pointPadding: 0.3,
       
    }]
    });
</script>
@foreach($Wastewater as $item)
  <script>
   Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ''

    },
   
    xAxis: {
        categories: {!!json_encode($date1) !!},
        accessibility: {
            description: 'Months of the year'
        }
    },
    yAxis: {
        title: {
            text: 'value'
        },
      
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
        name:  {!!json_encode($item->StandardId->nama) !!},
            color: '#1F2833',
            dashStyle: 'longdash',
            data: {!!json_encode($tss_std) !!},
            marker: {
                symbol: 'square'
            },

    },{
            name: 'Tss',
            color: '#DE7A22',
            marker: {
                symbol: 'diamond'
            },
            data: {!!json_encode($tss) !!}
        }]
});
</script>
@endforeach

<script>
   Highcharts.chart('noise', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ''

    },
   
    xAxis: {
        categories: {!!json_encode($tgl_blas) !!},
        accessibility: {
            description: 'Months of the year'
        }
    },
    yAxis: {
        title: {
            text: 'value'
        },
      
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#ee4035',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Noise Quality Standard',
            color: '#7bc043',
            dashStyle: 'longdash',
            data: {!!json_encode($noise_std) !!},
            marker: {
                symbol: 'square'
            },

    },{
            name: 'Noise',
            color: '#0392cf',
            marker: {
                symbol: 'diamond'
            },
            data: {!!json_encode($noise) !!}
        }]
});
</script>

@endsection