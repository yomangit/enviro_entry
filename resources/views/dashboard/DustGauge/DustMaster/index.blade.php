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
                    @endif
                    @can('admin')
                    <a href="/airquality/dustgauge/dust/codesampledg" class="btn bg-gradient-info btn-xs ml-2 mt-1 ">Code Sample</a>@endcan
                    <div class=" card-tools p-1 mr-2 form-inline">
                        <form action="/airquality/dustgauge/dust" class="form-inline" autocomplete="off">
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
                                        @foreach ($code_units as $code)
                                        @if ( request('search')==$code->nama)
                                        <option value="{{($code->nama)}}" selected>{{$code->nama}}</option>
                                        @else
                                        <option value="{{$code->nama}}">{{$code->nama}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                    <div style="width: 118px;" class="input-group mr-1">
                                        <select class="form-control form-control-sm " name="search1">
                                            <option value="" selected>Point ID 2</option>
                                            @foreach ($code_units as $code)
                                            @if ( request('search1')==$code->nama)
                                            <option value="{{($code->nama)}}" selected>{{$code->nama}}</option>
                                            @else
                                            <option value="{{$code->nama}}">{{$code->nama}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="width: 118px;" class="input-group mr-1">
                                        <select class="form-control form-control-sm " name="search2">
                                            <option value="" selected>Point ID 3</option>
                                            @foreach ($code_units as $code)
                                            @if ( request('search2')==$code->nama)
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
                        <form action="/airquality/dustgauge/dust">
                            <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                        </form>

                    </div>
                </div>
                <div class="card-body table-responsive">
                    <section class="content ">
                       @can('admin')
                       <div class="d-flex justify-content-start mb-2">
                            <a href="/airquality/dustgauge/dust/create" class="btn bg-gradient-secondary btn-xs ml-1 "><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                            <a href="/export/dust" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                            <a href="#" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                <i class="fas fa-upload mr-1"></i>Excel
                            </a>
                        </div>
                       @endcan

                        <table role="grid" id="example2" class="table table-bordered table-hover table-sm ">
                            <thead style=" color:#005245">
                                <tr class="text-center" style="font-size: 12px">
                                    <th>No</th>
                                    <th>Code Sample</th>
                                    <th>Month </th>
                                    <th style="width: 50px">Date In</th>
                                    <th style="width: 50px">Date Out</th>
                                    <th>Total Days</th>
                                    <th>M4</th>
                                    <th>M3</th>
                                    <th>M6</th>
                                    <th>M5</th>
                                    <th>Diameter of the Funnel (mm)</th>
                                    <th>F=30</th>
                                    <th>TT</th>
                                    <th>Total Solid Insoluble</th>
                                    <th>Total Solid soluble
                                    </th>
                                    <th>Total Solid </th>
                                    <th>Number of Insect</th>
                                    <th>Visible of Dirt</th>
                                    <th>Visible of Algae</th>
                                    <th>Area Observation</th>
                                    <th>Observer by</th>
                                    <th>Volume Filtrat (ml)</th>
                                    <th>Total Volume water (ml)</th>
                                    <th>Remarks</th>
                                    @can('admin')
                                    <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody style="text-align: center">
                                @php
                                $insoluble=0;$soluble=0;$total=0;
                                $no = 1 + ($Dust->currentPage() - 1) * $Dust->perPage();
                                @endphp
                                @foreach ($Dust as $code)
                                <tr style="font-size: 12px">
                                    <td>{{ $no++ }}</td>

                                    <td>{{ $code->codedust->nama }}</td>
                                    <td>{{ date('M-Y', strtotime( $code->date_out)) }}</td>

                                    <td>{{ date('d-M-Y', strtotime( $code->date_in)) }}</td>
                                    <td>{{ date('d-M-Y', strtotime( $code->date_out)) }}</td>
                                    <td>{{ $selisi=(strtotime($code->date_out) - strtotime($code->date_in))/86400 }}</td>
                                    <td>{{ $code->m4 }}</td>
                                    <td>{{ $code->m3 }}</td>
                                    <td>{{ $code->m6 }}</td>
                                    <td>{{ $code->m5 }}</td>
                                    <td>150</td>
                                    <td>30</td>
                                    <td>3.14</td>
                                    @if ($code->m4 ==='-' && $code->m3==='-')
                                    <td>-</td>
                                    @elseif($code->m6 ==='-' && $code->m5==='-')
                                    <td>{{ $insoluble= (round((doubleval($code->m4) - doubleval($code->m3))*1000000*4*30/(3.14*150*150*$selisi),2)) }}</td>
                                    @elseif($code->m4 !='-' && $code->m3!='-' && $code->m6 !='-' && $code->m5!='-')
                                    <td>{{ $insoluble= (round((doubleval($code->m4) - doubleval($code->m3))/(3.14*0.005625*$selisi),2)) }}</td>

                                    @endif
                                    @if($code->m6 ==='-' && $code->m5==='-')
                                    <td>-</td>
                                    @else
                                    <td>{{ $soluble= (round(((doubleval($code->m6) - doubleval($code->m5))* doubleval($code->total_vlm_water) )/(3.14*0.005625*$selisi*$code->volume_filtrat),2)) }}</td>
                                    @endif
									@if($code->m6 ==='-' && $code->m5==='-' && $code->m4 ==='-' && $code->m3==='-')
                                    <td>{{$code->total_solid}}</td>
									@else
										<td>{{$total=round(($insoluble+$soluble),3)}}</td>
									@endif
                                    <td>{{ $code->no_insect }}</td>
                                    <td>{{ $code->vb_dirt }}</td>
                                    <td>{{ $code->vb_algae }}</td>
                                    <td>{{ $code->area_observation }}</td>
                                    <td>{{ $code->observer }}</td>
                                    <td>{{ $code->volume_filtrat }}</td>
                                    <td>{{ $code->total_vlm_water }}</td>
                                    <td>{{ $code->remarks }}</td>
                                    @can('admin')
                                    <td>

<a href="/airquality/dustgauge/dust/{{ $code->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
    <i class="fas fa-pen"></i>
</a>
<form action="/airquality/dustgauge/dust/{{ $code->id }}" method="POST" class="d-inline">
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


                    </section>
                </div>
                <div class="card-footer p-0">
                    <div class="card-tools mt-2 form-inline">
                        <div class="col-4">
                            <div class="d-flex justify-content-start">
                                <h6>Showing {{ $Dust->firstItem() }} to {{$Dust->lastItem() }} of {{ $Dust->total() }}</h6>
                            </div>
                        </div>
                        <div class="col-8 d-flex justify-content-end">
                            <div class=" pagination pagination-sm">
                                {{ $Dust->links() }}
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
                            <form action="/import/dust" method="POST" enctype="multipart/form-data">
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
            @if($Dust->count())


            <div class="card">
                <div class="card-header">
                    <div class="card-title text center">{{$tittle}}</div>
                </div>
                <div class="card-body table-responsive p-0" id="container" style=" width: auto"></div>
            </div>
            @endif

        </div><!-- /.container-fluid -->
    </section>
</div>
@foreach ($Dust as $codes)
<script>
    Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: ''
    },
    xAxis: [{
                categories: {!! json_encode($tanggal) !!}
    },{
        categories: {!! json_encode($point) !!},
        opposite: true
    }],
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
                lineColor: '#faf2c3',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Total Solid',
        color:'#0cd7da',
        xAxis: 1,
        marker: {
            symbol: 'square'
        },
        data: {!! json_encode($value) !!}

    }]
  });
</script>
@endforeach



@endsection