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
                    @can('admin')
                    <a href="/weather/rainfall/rainfallpointid" class="btn bg-gradient-info btn-xs ml-2 my-1 ">Point ID</a>
                    @endcan
                    <div class=" card-tools p-1 mr-2 form-inline">
                        <form action="/weather/rainfall" class="form-inline" autocomplete="off">
                            <div class="input-group date" id="reservationdate4" style="width: 85px;" data-target-input="nearest">
                                <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                            </div>
                            <span class="input-group-text form-control-sm ">To</span>

                            <div class="input-group date mr-2" id="reservationdate5" style="width: 85px;" data-target-input="nearest">
                                <input type="text" name="toDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate5" data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                            </div>

                            <div class="input-group mr-1" style="width: 90px;">
                                <select class="form-control form-control-sm " name="search">
                                    <option value="" selected disabled>Point ID</option>
                                    @foreach ($code_units as $code)
                                    @if ( request('search')==$code->nama)
                                    <option value="{{($code->nama)}}" selected>
                                        {{$code->nama}}
                                    </option>
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
                        <form class="form-inline" action="/weather/rainfall">
                            <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <section class="content ">
                        @can('admin')
                        <div class="row mb-3 p-0 ">
                            <div class="col-6 col-md-4 form-inline">
                                <a href="/weather/rainfall/create" class="btn bg-gradient-secondary btn-xs  form-inline   ml-2"><i class="fas fa-plus mr-1 "></i>Add Data</a>
                                <a href="/export/rainfall" class="btn  bg-gradient-secondary btn-xs  form-inline   ml-2" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                                <a href="#" class="btn  bg-gradient-secondary btn-xs  form-inline   ml-2" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                    <i class="fas fa-upload mr-1"></i>Excel
                                </a>
                            </div>
                            <div class="col-12 col-md-8 ">

                            </div>
                        </div>
                        @endcan
                        @if ($Rainfall->count())
                        <div class="table-responsive card card-primary card-outline">
                        <table role="grid" class="table table-striped table-bordered dt-responsive nowrap table-sm ">
                                <thead class="table-info">
                                    <tr class="text-center" style="font-size: 12px">
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Point Id</th>
                                        <th>Rainfall</th>
                                        @can('admin')
                                        <th>Action</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody >
                                    @php
                                    $no = 1 + ($Rainfall->currentPage() - 1) * $Rainfall->perPage();
                                    @endphp
                                    @foreach ($Rainfall as $code)

                                    <tr class="text-center" style="font-size: 12px">
                                        <td>{{ $no++ }}</td>
                                        <td>{{ date('d-M-Y', strtotime( $code->date)) }}</td>
                                        <td>{{ $code->PointId->nama }}</td>
                                        <td>{{ $code->rainfall }}</td>
                                        @can('admin')
                                        <td>
                                        
                                        <a href="/weather/rainfall/{{ $code->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="/weather/rainfall/{{ $code->id }}" method="POST" class="d-inline">
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
                                    <tr class="text-center">
                                        <th @if(!auth()->user()->is_admin)colspan="3" @else colspan="4" @endif>Total Rain Fall /Month</th>
                                        <th>{{$avg_rainfall}}</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th @if(!auth()->user()->is_admin)colspan="3" @else colspan="4" @endif>Year to Date</th>
                                        <th>{{$avg_year}}</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th @if(!auth()->user()->is_admin)colspan="3" @else colspan="4" @endif>Max. Daily Rainfall</th>
                                        <th>{{$max_rainfall}}</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th @if(!auth()->user()->is_admin)colspan="3" @else colspan="4" @endif>Total Rain days</th>
                                        <th>{{$rainday}}</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th @if(!auth()->user()->is_admin)colspan="3" @else colspan="4" @endif>Total Wet days</th>
                                        <th>{{$wetday}}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
                <div class="card-footer">
                    <div class="card-tools  form-inline">
                        <div class="col-4">
                            <div class="d-flex justify-content-start">
                                <p>Showing {{ $Rainfall->firstItem() }} to {{$Rainfall->lastItem() }} of {{ $Rainfall->total() }}</p>
                            </div>
                        </div>
                        <div class="col-8 d-flex justify-content-end">
                            <div class=" pagination pagination-sm">
                                {{ $Rainfall->links() }}
                            </div>
                        </div>
                    </div>
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
                            <form action="/import/rainfall" method="POST" enctype="multipart/form-data">
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
            @if($Rainfall->count())
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
    	var data = {!! json_encode($milimeter) !!};
    	var nama = {!! json_encode($lokasi) !!};
	var processedData = data.map(function(dataEl, index){
		return {x: index, y : dataEl}
	});
	var processedNama = nama.map(function(namaEl, index){
		return { color: namaEl === 'Kopra' ? 'red' : 'yellow'}
	});
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: [{
                categories: {!! json_encode($tgl) !!}
    },{
        categories: {!! json_encode($lokasi) !!},
        opposite: true
    }],
        yAxis: {
            title: {
                useHTML: true,
                text: 'Milimeter (mm)'
            }
        },
        tooltip: {
            headerFormat: ' <b>{point.x}</b><br/>',
            crosshairs: true,
                shared: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Milimeter',
            
            color:'#6AB187',
            xAxis: 0,
            xAxis: 1,
           
            data: processedData

        },
       
    ]
    });
</script>

@endsection