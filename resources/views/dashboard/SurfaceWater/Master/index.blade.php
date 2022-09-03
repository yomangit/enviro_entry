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
            <div class="">
                <div class="card card-primary card-outline">
                    <div class="card-header p-0 ">

                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible form-inline">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                            {{ session('success') }}
                        </div>
                        @endif
                        @if (session()->has('failures'))
                        <div class="alert alert-danger alert-dismissible form-inline">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5 class="mr-2"><i class="icon fas fa-ban"></i>Fail</h5>
                            @foreach (session()->get('failures') as $validation)
                            <tr>
                                <td>
                                    {{ $validation->values()[$validation->attribute()] }}
                                </td>
                                <td>-</td>
                                @foreach ($validation->errors() as $e)
                                <td>{{ $e }}</td>
                                @endforeach
                            </tr>
                            @endforeach

                        </div>
                        @endif
                        @can('admin')
                        <a href="/surfacewater/qualityperiode/codesample" class="btn bg-gradient-info btn-xs ml-1 my-1">Code
                            Sample</a>
                        @endcan
                    </div>
                   
                    <div class="card-body table-responsive ">
                        <section class="content ">
                            <div class="row  p-0 mb-3">
                                <div class="col-6 col-md-4 form-inline ">
                                    <a href="/surfacewater/qualityperiode/create" class="btn bg-gradient-secondary btn-xs ml-1"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                                    <a href="/exportdata" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-download mr-1"></i>Excel</a>
                                    <a href="#" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="modal" data-target="#modal-default">
                                        <i class="fas fa-upload mr-1"></i>Exel
                                    </a>
                                </div>
                                <div class="col-12 col-md-8  d-flex justify-content-end form-inline">
                                    <form action="/surfacewater/qualityperiode" class="form-inline" autocomplete="off">
                                        <label for="fromDate" class="mr-2">From</label>
                                        <div class="input-group date" id="reservationdate4" style="width: 85px;" data-target-input="nearest">
                                            <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                                        </div>
                                        <span class="input-group-text form-control-sm ">To</span>

                                        <div class="input-group date mr-2" id="reservationdate5" style="width: 85px;" data-target-input="nearest">
                                            <input type="text" name="toDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate5" data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                                        </div>

                                        <div style="width: 118px;" class="input-group mr-1">
                                            <select class="form-control form-control-sm " name="search">
                                                <option value="" selected>Code Sample</option>
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
                                    <form action="/surfacewater/qualityperiode">
                                        <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                                    </form>
                                </div>
                            </div>
                            @if ($Input->count())
                            <table role="grid" id="example2" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                <thead style=" color:#005245">
                                    <tr class="text-center" style="font-size: 12px">
                                        <th>No</th>
                                        @can('admin')
                                        <th>Action</th>
                                        @endcan
                                        <th>Code Sample</th>
                                        <th>
                                            <div style="width: 65px"> Date</div>
                                        </th>
                                        <th>Start Time</th>
                                        <th>Stop Time</th>
                                        <th>TSS Standard</th>
                                        <th>TSS (mg/L)</th>
                                        <th>PH Standard Max.</th>
                                        <th>PH Standard Min.</th>
                                        <th>PH</th>
                                        <th>DO Standard</th>
                                        <th>DO</th>
                                        <th>Redox Standard</th>
                                        <th>Redox(mEV)</th>
                                        <th>Conductivity Standard</th>
                                        <th>Conductivity (uS/cm)</th>
                                        <th>TDS Standard</th>
                                        <th>TDS (mg/L)</th>
                                        <th>Temperatur Standard</th>
                                        <th>Temperatur </th>
                                        <th>Salinity (ppt)</th>
                                        <th>Turbidity (NTU)</th>
                                        <th>Cyanide</th>
                                        <th>Level GB(m)</th>
                                        <th>Level Loger (m)</th>
                                        <th>Debit (m<sup>3</sup>/<sub>s</sub>)</th>
                                        <th>Debit (m<sup>3</sup>/<sub>day</sub>)</th>
                                        <th>Water Condition</th>
                                        <th>
                                            <div style="width: 65px">water Color</div>
                                        </th>
                                        <th>Odor</th>
                                        <th>Rain Before Sampling</th>
                                        <th>Rain During Sampling</th>
                                        <th>Oil Layer</th>
                                        <th>
                                            <div style="width:90px"></div>Sorce of Pollution

                                        </th>
                                        <th>
                                            <div style="width: 100px"> Sampler</div>
                                        </th>
                                        <th>
                                            <div style="width: 100px"> Remarks</div>
                                        </th>
                                        <!-- <th>Hard Copy</th> -->
                                    </tr>
                                </thead>
                                
                                <tbody style="text-align: center">
                                    @php
                                    $no = 1 + ($Input->currentPage() - 1) * $Input->perPage();
                                    @endphp
                                    @foreach ($Input as $data)
                                    <tr style="font-size: 12px">
                                        <td>{{ $no++ }}</td>
                                        @can('admin')
                                        <td>
                                            <div style="width: 80px">
                                                <a href="/surfacewater/qualityperiode/{{ $data->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <form action="/surfacewater/qualityperiode/{{ $data->id }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                        @endcan
                                        <td>{{ $data->CodeSample->nama }}</td>
                                        <td>{{ date('d-M-Y', strtotime( $data->date)) }}</td>
                                        @If($data->start_time=='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{$data->start_time}}</td>
                                        @endif
                                        @If($data->stop_time=='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{$data->stop_time}}</td>
                                        @endif
                                        <td>{{ $data->standard->tss }}</td>

                                        @If($data->tss==='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{$data->tss}}</td>
                                        @endif
                                        <td>{{ $data->standard->ph_max }}</td>
                                        <td>{{ $data->standard->ph_min }}</td>
                                        @If($data->ph==='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{$data->ph}}</td>
                                        @endif
                                        <td>{{ $data->standard->do }}</td>
                                        @If($data->do==='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{$data->do}}</td>
                                        @endif
                                        <td>{{ $data->standard->redox }}</td>
                                        @If($data->orp==='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{$data->orp}}</td>
                                        @endif
                                        <td>{{ $data->standard->conductivity }}</td>
                                        @If($data->conductivity==='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{$data->conductivity}}</td>
                                        @endif
                                        <td>{{ $data->standard->tds }}</td>
                                        @If($data->tds==='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{$data->tds}}</td>
                                        @endif
                                        <td>{{ $data->standard->temperatur }}</td>
                                        @If($data->temperatur==='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{ $data->temperatur }}<sup>0</sup>C
                                        </td>
                                        @endif

                                        <td>{{ $data->salinity }}</td>
                                        <td>{{ $data->turbidity }}</td>
                                        <td>{{ $data->cyanide }}</td>
                                        <td>{{ $data->level }}</td>
                                        <td>{{ $data->lvl_lgr }}</td>
                                        <td>{{ $data->debit_s }}</td>
                                        <td>{{ $data->debit_d }}</td>
                                        @if($data->water_condition==='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{ $data->water_condition }}</td>
                                        @endif
                                        @if($data->water_color==='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{ $data->water_color }}</td>
                                        @endif
                                        @if($data->odor==='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{ $data->odor }}</td>
                                        @endif
                                        @if($data->rain==='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{ $data->rain }}</td>
                                        @endif
                                        @if($data->rain_during_sampling==='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{ $data->rain_during_sampling }}</td>
                                        @endif
                                        @if($data->oil_layer==='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{ $data->oil_layer }}</td>
                                        @endif
                                        @if($data->source_pollution==='no data')
                                        <td style="color: red;">No Data</td>
                                        @else
                                        <td>{{ $data->source_pollution }}</td>
                                        @endif
                                        @if($data->sampler==='no data')
                                        <td style="color: red;">No Data</td>
                                        @else

                                        <td>{{ $data->sampler }}</td>
                                        <td>{{ $data->remarks }}</td>


                                        @endif
                                        <!-- <td> <a href="/{{ $data->hard_copy }}">
                                                                @if ($data->hard_copy)
                                                                <img class="img-fluid" src="{{ asset('storage/' . $data->hard_copy) }}" style="width: 40px; height: 24px;">
                                                                @endif

                                                            </a>
                                                        </td> -->
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </section>

                    </div>
                    <div class="card-footer p-0 ">
                        <div class="row ">
                            <div class="col-6 col-md-4 form-inline ">

                                <h6 class="ml-2 p-0">Showing {{ $Input->firstItem() }} to
                                    {{ $Input->lastItem() }} of {{ $Input->total() }}
                                </h6>

                            </div>
                            <div class="col-8  form-inline d-flex justify-content-end pagination pagination-sm">
                                <div class="mt-3 mr-2 p-0"> {{ $Input->links() }}</div>

                            </div>
                        </div>
                    </div>
                   
                    

                </div>
                <div class="card">
                        <div class="card-header">
                            <div class="card-title text center">{{$tittle}} </div>
                        </div>
                        <div class="card-body table-responsive p-0" id="container" style=" width: auto"></div>
                    </div>
                    @else
                    <p class="text-center fs-4">Not Data Found</p>
                    @endif
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Import Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/importdata" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="custom-file">
                                            <input type="file" name="file" class="custom-file-input  @error('file') is-invalid @enderror" id="exampleInputFile" required>
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            @error('file')
                                            <span class=" invalid-feedback ">{{ $message }}</span>
                                            @enderror
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
        </div><!-- /.container-fluid -->
    </section>
</div>
<script>
        Highcharts.chart('container', {
            chart: {
                type: 'spline'
            },
            title: {
                text:''
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