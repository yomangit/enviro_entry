@extends('layout.main')
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
                        <li class="breadcrumb-item"><a href="/dashboard/index/dataentry/">Home</a></li>
                        <li class="breadcrumb-item active">{{ $tittle }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="">
                <div class="card card-secondrary card-tabs">
                    <div class="card-header p-0 pt-1">

                        @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible form-inline">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                            {{ session('success') }}
                        </div>
                        @endif
                        @can('admin')
                        <a href="/dashboard/blasting/pointid" class="btn bg-gradient-info btn-xs ml-5 mt-3">Code Sample</a>
                        <a href="/dashboard/blasting/tablestandard" class="btn bg-gradient-info btn-xs  mt-3">Table Standard</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <section class="content mt-2">

                            <div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            @if($Point_ID->count() && $Standard_id->count())
                                            @can('admin')
                                            <a href="/dashboard/blasting/create" class="btn bg-gradient-secondary btn-xs mt-2"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                                            <a href="/export/blasting" class="btn  bg-gradient-secondary btn-xs mt-2" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                                            <a href="#" class="btn  bg-gradient-secondary btn-xs mt-2" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                                <i class="fas fa-upload mr-1"></i>Excel
                                            </a>
                                            @endcan
                                            <div class="card-tools row">

                                                <form action="/auth/blasting" class="form-inline">
                                                    <label for="fromDate" class="mr-2">From</label>
                                                    <div class="input-group date" id="reservationdate4" style="width: 85px;" data-target-input="nearest">
                                                        <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                                                    </div>
                                                    <label for="fromDate" class="mr-2 ml-2">To</label>

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
                                                <form action="/auth/blasting">
                                                    <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                                                </form>
                                            </div>
                                           
                                            @else
                                            <div class="alert alert-info alert-dismissible form-inline">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h5 class="mr-2"><i class="icon fas fa-info"></i>Info</h5>
                                                <b>You must enter point id & standard id first!!</b>
                                            </div>
                                            @endif
                                        </div>
                                        <!-- /.card-header -->
                                        @if($Blasting->count())
                                        <div class="card-body table-responsive ">
                                            <table role="grid" id="example2" class="table table-bordered table-sm table-hover ">
                                                <thead style=" color:#005245">
                                                    <tr class="text-center" style="font-size: 12px">
                                                        <th>No</th>
                                                       @can('admin') <th>Action</th>@endcan
                                                        <th>Point ID</th>
                                                        <th>Frequency Standard</th>
                                                        <th>PPV Standard</th>
                                                        <th>Noise Level Standard</th>
                                                        <th>
                                                            <div style="width: 50px">Date</div>
                                                        </th>
                                                        <th>Time</th>
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

                                                    </tr>
                                                </thead>
                                                <tbody style="text-align: center">
                                                    @php
                                                    $no = 1 + ($Blasting->currentPage() - 1) * $Blasting->perPage();
                                                    @endphp
                                                    @foreach($Blasting as $blast)
                                                    <tr style="font-size: 12px">
                                                        <td>{{ $no++ }}</td>
                                                       @can('admin') <td>
                                                         
                                                            <a href="/dashboard/blasting/{{ $blast->created_at }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                            <form action="/dashboard/blasting/{{ $blast->created_at }}" method="POST" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        @endcan
                                                        <td>{{ $blast->PointID->nama }}</td>
                                                        <td>{{$blast->StandardID->frequency}}</td>
                                                        <td>{{$blast->StandardID->ppv}}</td>
                                                        <td>{{$blast->StandardID->noise_level}}</td>
                                                        <td>{{ date('d-m-Y',strtotime($blast->date)) }}
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
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="card-footer">
                                            <div class="card-tools row form-inline">
                                                <div class="col-4">
                                                    <div class="d-flex justify-content-start">
                                                        <small>Showing {{ $Blasting->firstItem() }} to {{
                                                                    $Blasting->lastItem() }} of
                                                            {{ $Blasting->total() }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="d-flex justify-content-end">
                                                        {{ $Blasting->links() }}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        @else
                                        <p class="text-center fs-4">Not Data Found</p>
                                        @endif

                                        <!-- /.card-body -->
                                    </div>

                                    <!-- /.card -->
                                </div>
                            </div>
                            <!-- /.container-fluid -->
                            <div class="row">
                                <div class="col-md-12">
                                    <figure class="highcharts-figure">
                                        <div class="invoice p-3 mb-3" id="container"></div>
                                    </figure>
                                </div>
                            </div>
                        </section>
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
                                                <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
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

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>

<script>
 Highcharts.chart('container', {
       chart: {
        type: 'column'
    },
    title: {
        text: 'Vibration Monitoring Results'
    },
    xAxis: {
        categories: {!! json_encode($date) !!}
    },
    yAxis: [{
        min: 0,
        title: {
            text: 'Vibration (mm/s)'
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

@endsection