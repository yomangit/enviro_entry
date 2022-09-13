@extends('dashboard.layouts.main')
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
            <a href="/surfacewater/qualityperiode" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="/blasting" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="/groundwater/mastergw" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
      <!-- <div class="card">
        <div class="card-header">
          <div class="card-title text center text-secondary">Waste Water </div>
        </div>
        <div class="card-body table-responsive p-0" id="container" style=" width: auto">
      </div>
      </div> -->



    <section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-6">
          <div class="card ">
            <div class="card-header">
              <h3 class="card-title">Rainfall</h3>
              
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed table-sm text-nowrap">
                <thead>
                  <tr>
                    <th class="text-center">Area</th>
                    <th class="text-center">Act</th>
                    <th class="text-center">MTD</th>
                    <th class="text-center">YTD</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($Rainfall_alaskar as $item)
                  <tr>
                    <td class="text-center">{{$item->PointId->nama}}</td>
                    <td class="text-center">{{$item->rainfall}}</td>
                    <td class="text-center">{{$avg_rainfallAlaskar}}</td>
                    <td class="text-center">{{$avg_yearAlaskar}}</td>
                  </tr>
                  @endforeach
                @foreach ($Rainfall_pajajaran as $item)
                  <tr>
                    <td class="text-center">{{$item->PointId->nama}}</td>
                    <td class="text-center">{{$item->rainfall}}</td>
                    <td class="text-center">{{$avg_rainfallPajajaran}}</td>
                    <td class="text-center">{{$avg_yearPajajaran}}</td>
                  </tr>
                  @endforeach
                @foreach ($Rainfall_kopra as $item)
                  <tr>
                    <td class="text-center">{{$item->PointId->nama}}</td>
                    <td class="text-center">{{$item->rainfall}}</td>
                    <td class="text-center">{{$avg_rainfallKopra}}</td>
                    <td class="text-center">{{$avg_yearKopra}}</td>
                  </tr>
                  @endforeach
                @foreach ($Rainfall_maesa as $item)
                  <tr>
                    <td class="text-center">{{$item->PointId->nama}}</td>
                    <td class="text-center">{{$item->rainfall}}</td>
                    <td class="text-center">{{$avg_rainfallMaesa}}</td>
                    <td class="text-center">{{$avg_yearMaesa}}</td>
                  </tr>
                  @endforeach
                @foreach ($Rainfall_plan as $item)
                  <tr>
                    <td class="text-center">{{$item->PointId->nama}}</td>
                    <td class="text-center">{{$item->rainfall}}</td>
                    <td class="text-center">{{$avg_rainfallPlant}}</td>
                    <td class="text-center">{{$avg_yearPlant}}</td>
                  </tr>
                  @endforeach
                @foreach ($Rainfall_araren as $item)
                  <tr>
                    <td class="text-center">{{$item->PointId->nama}}</td>
                    <td class="text-center">{{$item->rainfall}}</td>
                    <td class="text-center">{{$avg_rainfallAraren}}</td>
                    <td class="text-center">{{$avg_yearAraren}}</td>
                  </tr>
                  @endforeach
                @foreach ($Rainfall_tsf as $item)
                  <tr>
                    <td class="text-center">{{$item->PointId->nama}}</td>
                    <td class="text-center">{{$item->rainfall}}</td>
                    <td class="text-center">{{$avg_rainfallTSF}}</td>
                    <td class="text-center">{{$avg_yearTSF}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>
        <div class="col-6">
          <div class="card ">
            <div class="card-header">
              <h3 class="card-title">TSS, pH, Temperature</h3>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed table-sm text-nowrap">
                <thead>
                  <tr>
                    <th class="text-center align-middle" rowspan="2">Location</th>
                    <th class="align-middle text-center" colspan="2">TSS</th>
                    <th class="align-middle text-center" colspan="2">PH</th>
                    <th class="align-middle text-center" colspan="2">Temperature</th>
                  </tr>

                  <tr>

                    <th class="text-center">Standard</th>
                    <th class="text-center">Actual</th>
                    <th class="text-center">Standard</th>
                    <th class="text-center">Actual</th>
                    <th class="text-center">Standard</th>
                    <th class="text-center">Actual</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th  colspan="7">Waste Water</th>
                  </tr>
                  @foreach($Waste as $item)   
                  <tr>
                    <td class="text-center">{{$item->PointId->nama}}</td>
                    <td class="text-center">{{$item->StandardId->totalsuspendedsolids_tss}}</td>
                    <td class="text-center">{{$item->totalsuspendedsolids_tss}}</td>
                    <td class="text-center">{{$item->StandardId->ph}}</td>
                    <td class="text-center">{{$item->ph}}</td>
                    <td class="text-center">{{$item->StandardId->temperature}}</td>
                    <td class="text-center">{{$item->temperature}}</td>
                    
                  </tr>
                  @endforeach
                  @foreach($Waste2 as $item)   
                  <tr>
                    <td class="text-center">{{$item->PointId->nama}}</td>
                    <td class="text-center">{{$item->StandardId->totalsuspendedsolids_tss}}</td>
                    <td class="text-center">{{$item->totalsuspendedsolids_tss}}</td>
                    <td class="text-center">{{$item->StandardId->ph}}</td>
                    <td class="text-center">{{$item->ph}}</td>
                    <td class="text-center">{{$item->StandardId->temperature}}</td>
                    <td class="text-center">{{$item->temperature}}</td>
                    
                  </tr>
                  @endforeach
                  @foreach($Waste3 as $item)   
                  <tr>
                    <td class="text-center">{{$item->PointId->nama}}</td>
                    <td class="text-center">{{$item->StandardId->totalsuspendedsolids_tss}}</td>
                    <td class="text-center">{{$item->totalsuspendedsolids_tss}}</td>
                    <td class="text-center">{{$item->StandardId->ph}}</td>
                    <td class="text-center">{{$item->ph}}</td>
                    <td class="text-center">{{$item->StandardId->temperature}}</td>
                    <td class="text-center">{{$item->temperature}}</td>
                    
                  </tr>
                  @endforeach
                  <tr>
                    <th colspan="7">Surface Water</th>
                  </tr>
                  @foreach($Surfacewater1 as $item)
                  <tr>
                  <td class="text-center">{{$item->PointId->nama}}</td>
                    <td class="text-center">{{$item->standard->totalsuspendedsolids_tss}}</td>
                    <td class="text-center">{{$item->totalsuspendedsolids_tss}}</td>
                    <td class="text-center">{{$item->standard->ph}}</td>
                    <td class="text-center">{{$item->ph}}</td>
                    <td class="text-center">{{$item->standard->temperature}}</td>
                    <td class="text-center">{{$item->temperatur}}</td>
                  </tr>
                  @endforeach
                  @foreach($Surfacewater2 as $item)
                  <tr>
                  <td class="text-center">{{$item->PointId->nama}}</td>
                    <td class="text-center">{{$item->standard->totalsuspendedsolids_tss}}</td>
                    <td class="text-center">{{$item->tss}}</td>
                    <td class="text-center">{{$item->standard->ph}}</td>
                    <td class="text-center">{{$item->ph}}</td>
                    <td class="text-center">{{$item->standard->temperature}}</td>
                    <td class="text-center">{{$item->temperatur}}</td>
                  </tr>
                  @endforeach
                  @foreach($Surfacewater3 as $item)
                  <tr>
                  <td class="text-center">{{$item->PointId->nama}}</td>
                    <td class="text-center">{{$item->standard->totalsuspendedsolids_tss}}</td>
                    <td class="text-center">{{$item->totalsuspendedsolids_tss}}</td>
                    <td class="text-center">{{$item->standard->ph}}</td>
                    <td class="text-center">{{$item->ph}}</td>
                    <td class="text-center">{{$item->standard->temperature}}</td>
                    <td class="text-center">{{$item->temperatur}}</td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
      </div>
    </section>
    
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