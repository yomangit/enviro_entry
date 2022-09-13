@extends('dashboard.layouts.main')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $breadcrumb }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header p-0">

                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline m-2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif

                   @can('admin')
                   <a href="/blasting/pointid" class="btn bg-gradient-info btn-xs ml-2 my-1 ">Point ID</a>
                    <a href="/blasting/tablestandard" class="btn bg-gradient-info btn-xs my-1 ">Table Standard</a>
                   @endcan
                    <div class=" card-tools p-1 mr-2 form-inline">
                        <form action="/blasting" class="form-inline">
                            <div class="input-group date" id="reservationdate4" style="width: 85px;" data-target-input="nearest">
                                <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                            </div>
                            <span class="input-group-text form-control-sm ">To</span>

                            <div class="input-group date mr-2" id="reservationdate5" style="width: 85px;" data-target-input="nearest">
                                <input type="text" name="toDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate5" data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                            </div>

                            <div style="width: 118px;" class="input-group mr-1">
                                <select class="form-control form-control-sm " name="search">
                                    <option value="" selected>Point ID</option>
                                    @foreach ($Point_ID as $code)
                                    @if ( request('search')==$code->nama)
                                    <option value="{{($code->nama)}}" selected>{{$code->nama}}</option>
                                    @else
                                    <option value="{{$code->nama}}">{{$code->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mr-2">
                                <button type="submit" class="btn bg-gradient-dark btn-xs">filter</button>
                            </div>
                        </form>
                        <form action="/blasting">
                            <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <section class="content ">
                    @if($Point_ID->count() && $Standard_id->count())
                        @can('admin')
                        <div class="d-flex justify-content-start mb-1">
                            <a href="/blasting/create" class="btn bg-gradient-secondary btn-xs ml-1"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                            <a href="/export/blasting" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                            <a href="#" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                <i class="fas fa-upload mr-1"></i>Excel
                            </a>
                        </div>
                        @endcan
                       
                        <table role="grid" id="example2" class="table table-bordered table-sm table-hover ">
                            <thead style=" color:#005245">
                                <tr class="text-center" style="font-size: 12px">
                                    <th>No</th>
                                    <th>Point ID</th>
                                    <th>Frequency Standard</th>
                                    <th>PPV Standard</th>
                                    <th>Noise Level Standard</th>
                                    <th>
                                        <div style="width: 50px">Date</div>
                                    </th>
                                    <th>
                                        <div style="width: 50px">Time</div>
                                    </th>
                                    <th>Transversal Freq</th>
                                    <th>Vertical Freq</th>
                                    <th>Longitudinal Freq</th>
                                    <th>Transversal PPV</th>
                                    <th>Vertical PPV</th>
                                    <th>Longitudinal PPV</th>
                                    <th>Peak Vektor</th>
                                    <th>Noise Level</th>
                                    <th>Blast Location</th>
                                    <th>Weather</th>
                                    <th>Sampler</th>
                                    <th>Remarks</th>
                                   @can('admin')
                                   <th>Action</th>
                                   @endcan
                                </tr>
                            </thead>
                            <tbody style="text-align: center">
                                @php
                                $no = 1 + ($Blasting->currentPage() - 1) * $Blasting->perPage();
                                @endphp
                                @foreach($Blasting as $blast)
                                <tr style="font-size: 12px">
                                    <td>{{ $no++ }}</td>

                                    <td>{{ $blast->PointID->nama }}</td>
                                    <td>{{$blast->StandardID->frequency}}</td>
                                    <td>{{$blast->StandardID->ppv}}</td>
                                    <td>{{$blast->StandardID->noise_level}}</td>
                                    <td>{{ date('d-M-Y',strtotime($blast->date)) }}
                                    </td>
                                    <td>{{ $blast->time }}</td>
                                    <td>{{ $blast->transversal_freq }}</td>
                                    <td>{{ $blast->vertical_freq }}</td>
                                    <td>{{ $blast->longitudinal_freq }}</td>
                                    <td>{{ $blast->transversal_ppv }}</td>
                                    <td>{{ $blast->vertical_ppv }}</td>
                                    <td>{{ $blast->longitudinal_ppv }}</td>
                                    <td>{{ $blast->peak_vektor }}</td>
                                    <td>{{ $blast->noise_level }}</td>
                                    <td>{{ $blast->blast_location }}</td>
                                    <td>{{ $blast->weather }}</td>
                                    <td>{{ $blast->sampler }}</td>
                                    <td>{{ $blast->remarks }}</td>
                                    @can('admin')
                                    <td>
                                        <a href="/blasting/{{ $blast->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="/blasting/{{ $blast->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="alert alert-info alert-dismissible form-inline">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5 class="mr-2"><i class="icon fas fa-info"></i>Info</h5>
                            <b>You must enter point id & standard id first!!</b>
                        </div>
                        @endif
                    </section>

                </div>
                <div class="card-footer p-0">
                    <div class="card-tools mt-2 form-inline">
                        <div class="col-4">
                            <div class="d-flex justify-content-start">
                                <h6>Showing {{ $Blasting->firstItem() }} to {{$Blasting->lastItem() }} of {{ $Blasting->total() }}</h6>
                            </div>
                        </div>
                        <div class="col-8 d-flex justify-content-end">
                            <div class=" pagination pagination-sm">
                                {{ $Blasting->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Import Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/import/blasting" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="custom-file">
                                        <input type="file" name="file" required class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>

                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if($Blasting->count())
            <div class="card">
                <div class="card-header">
                    <div class="card-title text center">{{$tittle}}</div>
                </div>
                <div class="card-body table-responsive p-0" id="container" style=" width: auto"></div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title text center">{{$tittle}}</div>
                </div>
                <div class="card-body table-responsive p-0" id="noise" style=" width: auto"></div>
            </div>
            @endif
        </div><!-- /.container-fluid -->
    </section>
</div>
@foreach($Blasting as $blast)
<script>
 Highcharts.chart('noise', {
       chart: {
        type: 'column'
    },
    title: {
        text: 'Hasil Pemantauan Tingkat Getaran di {!! json_encode($blast->PointID->lokasi) !!} Akibat Kegiatan Peledakan di{!! json_encode($blast->PointID->nama) !!}  Selama Tahun {!! json_encode(date('Y',strtotime($blast->date))) !!}'
    }, 
    xAxis: {
        categories: {!! json_encode($date) !!}
    },
    yAxis: [{
        min: 0,
        title: {
            text: 'Vibration'
        },
        labels: {
            formatter: function () {
                return this.value + 'mm/s';
            }
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
<script>
   Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Hasil Pemantauan Tingkat Kebisingan di {!! json_encode($blast->PointID->lokasi) !!} Akibat Kegiatan Peledakan di {!! json_encode($blast->PointID->nama) !!}  Selama Tahun {!! json_encode(date('Y',strtotime($blast->date))) !!}'

    },
   
    xAxis: {
        categories: {!!json_encode($date) !!},
        accessibility: {
            description: 'Months of the year'
        }
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
@endforeach
@endsection