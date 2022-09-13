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
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            
                <div class="card card-primary card-outline">
                    <div class="card-header p-0 ">
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible form-inline m-2">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                            {{ session('success') }}
                        </div>
                        @elseif (session()->has('fail'))
                        <div class="alert alert-danger alert-dismissible form-inline m-2">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5 class="mr-2"><i class="icon fas fa-ban"></i>Fail</h5>
                            {{ session('fail') }}
                        </div>

                        @endif
                       
                        <div class="card-tools row p-2 mr-1 form-inline">
                            <form action="/groundwater/masterttn" class="form-inline" autocomplete="off">
                                <div class="input-group date" id="reservationdate4" style="width: 85px;" data-target-input="nearest">
                                    <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                                </div>
                                <span class="input-group-text form-control-sm ">To</span>

                                <div class="input-group date mr-2" id="reservationdate5" style="width: 85px;" data-target-input="nearest">
                                    <input type="text" name="toDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate5" data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                                </div>

                                <div style="width: 120px;" class="input-group mr-1">
                                    <select class="form-control form-control-sm " name="search">
                                        <option value="" disabled selected>Point ID</option>
                                        @foreach ($code_units as $code)
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
                            <form action="/groundwater/masterttn">
                                <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                            </form>
                        </div>
                        @can('admin') <a href="/groundwater/masterttn/codesamplettn" class="btn bg-gradient-info btn-xs ml-2 mt-2">Code Sample</a>@endcan
                    </div>
                    <div class="card-body table-responsive">
                        <section class="content ">

                           @can('admin')
                           <div class="d-flex justify-content-start mb-2">
                                <a href="/groundwater/masterttn/create" class="btn bg-gradient-secondary btn-xs ml-1"><i class="fas fa-plus mr-1"></i>Add Data</a>
                                <a href="/exportmasterttn" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                                <a href="#" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                    <i class="fas fa-upload mr-1"></i>Excel
                                </a>
                            </div>
                           @endcan
                            <table role="grid" id="example2" class="table table-bordered table-hover table-sm">
                                <thead style=" color:#005245">
                                    <tr class="text-center" style="font-size: 12px">
                                        <th>No</th>
                                        @can('admin') <th>Action</th>@endcan
                                        <th>Code Sample</th>
                                        <th>
                                            <div style="width: 65px">Date</div>
                                        </th>
                                        <th>Start Time Sampling</th>
                                        <th>Finish Time Sampling</th>
                                        <th>Well</th>
                                        <th>Well Water</th>

                                        <th>H</th>
                                        <th>Diameter of the pipe (m)
                                        </th>
                                        <th>TT</th>
                                        <th>r<sup>2</sup></th>
                                        <th>Water Volumes (L)</th>
                                        <th>Temperatur</th>
                                        <th>pH</th>
                                        <th>Conductivity (Us/cm)</th>
                                        <th>TDS</th>
                                        <th>Redox</th>
                                        <th>Dissolved Oxigen (DO)</th>
                                        <th>Salinity</th>
                                        <th>Turbidity</th>
                                        <th>water Color</th>
                                        <th>Odor</th>
                                        <th>Rain Before Sampling</th>
                                        <th>Rain During Sampling</th>
                                        <th>Oil Layer</th>
                                        <th>Sorce of Pollution</th>
                                        <th>Sampler</th>

                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    @php
                                    $no = 1 + ($Master->currentPage() - 1) * $Master->perPage();
                                    @endphp
                                    @foreach ($Master as $data)
                                    <tr style="font-size: 12px">
                                        <td>{{ $no++ }}</td>
                                        @can('admin') <td>
                                            <div style="width: 50px">

                                                {{-- <a href="/groundwater/mastergw/{{ $data->failed_at }}" class="btn btn btn-outline-primary btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Detail">
                                                <i class="far fa-eye"></i>
                                                </a> --}}
                                                <a href="/groundwater/masterttn/{{ $data->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <form action="/groundwater/masterttn/{{ $data->id }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>@endcan
                                        <td>{{ $data->CodeSampleTTN->nama }}</td>
                                        <td>{{ date('d-m-Y',strtotime($data->date)) }}</td>
                                        <td>{{ $data->start_time }}</td>
                                        <td>{{ $data->stop_time }}</td>
                                        <td>{{ $data->well }}</td>
                                        <td>{{ $data->well_water }}</td>
                                        <td>{{ $data->h }}</td>
                                        <td>{{ $data->tablestandard->d_pipe }}</td>
                                        <td>{{ $data->tablestandard->tt }}</td>
                                        <td>{{ $data->tablestandard->r }}</td>
                                        <td>{{ $data->water_volume }}</td>
                                        <td>{{ $data->temperatur }}</td>
                                        <td>{{ $data->ph }}</td>
                                        <td>{{ $data->conductivity }}</td>
                                        <td>{{ $data->tds }}</td>
                                        <td>{{ $data->redox }}</td>
                                        <td>{{ $data->do }}</td>
                                        <td>{{ $data->salinity }}</td>
                                        <td>{{ $data->turbidity }}</td>
                                        <td>{{ $data->water_color }}</td>
                                        <td>{{ $data->odor }}</td>
                                        <td>{{ $data->rain }}</td>
                                        <td>{{ $data->rain_during_sampling }}</td>
                                        <td>{{ $data->oil_layer }}</td>
                                        <td>{{ $data->source_pollution }}</td>
                                        <td>{{ $data->sampler }}</td>
                                        
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div>
                          
                        </section>
                    </div>
                    <div class="card-footer p-0 ">
                        <div class="row ">
                            <div class="col-6 col-md-4 form-inline ">

                                <h6 class="ml-2 p-0 mt-2">Showing {{ $Master->firstItem() }} to
                                    {{ $Master->lastItem() }} of {{ $Master->total() }}
                                </h6>

                            </div>
                            <div class="col-8  form-inline d-flex justify-content-end pagination pagination-sm">
                                <div class="mt-3 mr-2 p-0"> {{ $Master->links() }}</div>

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
                                <form action="/importmasterttn" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="custom-file">
                                            <input type="file" name="file" class="custom-file-input" id="exampleInputFile" required>
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
                @if($Master->count())
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text center">{{$tittle}}</div>
                    </div>
                    <div class="card-body table-responsive p-0" id="container" style=" width: auto"></div>
                </div>
                @else

                @endif
           
        </div><!-- /.container-fluid -->
    </section>
</div>
<script>
        Highcharts.chart('container', {
        chart: {
            type: 'spline'
        },
        title: {
            text: ''
        },
      
        xAxis: {
            categories: {!!json_encode($date)!!}
        },
        yAxis: {
            title: {
                text: 'Value'
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
                    lineColor: '#F4CC70',
                    lineWidth: 1
                }
            }
        },
        series: [{
            name: 'Temperature',
            marker: {
                symbol: 'square'
            },
            color:'#1F2833',
            data:{!!json_encode($suhu)!!}

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