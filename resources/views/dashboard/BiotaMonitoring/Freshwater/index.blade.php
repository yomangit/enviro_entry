@extends('dashboard.layouts.main')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
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
                   <a href="/monitoring/freshwater/master/create" class="btn bg-gradient-secondary btn-xs ml-2 my-1"><i class="fas fa-plus mr-1"></i>Add Data</a>
                    <a href="/exportfreshwater" class="btn  bg-gradient-secondary btn-xs my-1" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                    <a href="#" class="btn  bg-gradient-secondary btn-xs my-1" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                        <i class="fas fa-upload mr-1"></i>Excel
                    </a>
                   @endcan
                    <div class=" card-tools p-1 mr-2 form-inline">
                        <form action="/monitoring/freshwater/master" class="form-inline">
                            <!-- <label for="fromDate" class="mr-2">From</label> -->
                            <div class="input-group date mr-2" id="reservationdate7" style="width: 85px;" data-target-input="nearest">
                                <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate7" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                            </div>
                            <!-- <label for="fromDate" class="mr-2 ml-2">To</label>
    
                                                            <div class="input-group date mr-2" id="reservationdate" style="width: 85px;" data-target-input="nearest">
                                                                <input type="text" name="toDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                                                            </div> -->

                            <div style="width: 118px;" class="input-group mr-1">
                                <select class="form-control form-control-sm " name="search">
                                    <option value="" selected>Biota</option>
                                    @foreach ($Biotum as $biota)
                                    @if ( request('search')==$biota->nama)
                                    <option value="{{($biota->nama)}}" selected>{{$biota->nama}}</option>
                                    @else
                                    <option value="{{$biota->nama}}">{{$biota->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div style="width: 118px;" class="input-group mr-1">
                                <select class="form-control form-control-sm " name="location">
                                    <option value="" selected>Location</option>
                                    @foreach ($LocationBiota as $location)
                                    @if ( request('location')==$location->nama)
                                    <option value="{{($location->nama)}}" selected>{{$location->nama}}</option>
                                    @else
                                    <option value="{{$location->nama}}">{{$location->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mr-2">
                                <button type="submit" class="btn bg-gradient-dark btn-xs">filter</button>
                            </div>
                        </form>
                        <form action="/monitoring/freshwater/master">
                            <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                        </form>
                    </div>
                </div>


                <div class="card-body">
                    <section class="content ">
                        @if($LocationBiota->count() && $Biotum->count())
                        <table role="grid" id="example1" class="table table-bordered table-sm table-head-fixed ">
                            <thead style=" color:#005245">
                                <tr class="text-center" style="font-size: 12px">
                                    <th>No</th>
                                    <th>Location</th>
                                    <th>Biota</th>
                                    <th>Date</th>
                                    <th>Taxa Richness</th>
                                    <th>Species Density (cell/m3)</th>
                                    <th>Diversity Index</th>
                                    <th>Evenness Value</th>
                                    <th>Dominance Index</th>
                                   @can('admin')
                                   <th>Action</th>
                                   @endcan

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1 + ($Freshwaters->currentPage() - 1) * $Freshwaters->perPage();
                                @endphp
                                @foreach ($Freshwaters as $freshwater)
                                <tr class="text-center" style="font-size: 12px">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $freshwater->locationBiota->nama }}</td>
                                    <td>{{ $freshwater->Biota->nama }}</td>
                                    <td>{{ date('d-M-Y', strtotime( $freshwater->date)) }}</td>
                                    <td>{{ $freshwater->taxa_richness }}</td>
                                    <td>{{ $freshwater->species_density }}</td>
                                    <td>{{ $freshwater->diversity_index }}</td>
                                    <td>{{ $freshwater->evenness_value }}</td>
                                    <td>{{ $freshwater->dominance_index }}</td>  
                                   @can('admin')
                                   <td>
                                        <div style="width: 50px">

                                            {{-- <a href="/monitoring/freshwater/master/{{ $freshwater->created_at }}" class="btn btn btn-outline-primary btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Detail">
                                            <i class="far fa-eye"></i>
                                            </a> --}}
                                            <a href="/monitoring/freshwater/master/{{ $freshwater->created_at }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <form action="/monitoring/freshwater/master/{{ $freshwater->created_at }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

                                        </div>
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
                            <b> You must enter location of biota and biota first </b>
                        </div>
                        @endif


                    </section>
       
                </div>
                <div class="card-footer p-0">
                    <div class="card-tools mt-2 form-inline">
                        <div class="col-4">
                            <div class="d-flex justify-content-start">
                                <h6>Showing {{ $Freshwaters->firstItem() }} to {{$Freshwaters->lastItem() }} of {{ $Freshwaters->total() }}</h6>
                            </div>
                        </div>
                        <div class="col-8 d-flex justify-content-end">
                            <div class=" pagination pagination-sm">
                                {{ $Freshwaters->links() }}
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
                            <form action="/importfreshwater" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" required id="exampleInputFile">
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
            @if($Freshwaters->count())


            <div class="card">
                <div class="card-header">
                    <div class="card-title text center">{{$tittle}}</div>
                </div>
                <div class="card-body table-responsive p-0" id="container" style=" width: auto"></div>
            </div>
            @endif
        </div>
</div><!-- /.container-fluid -->
</section>
</div>
@if ($Freshwaters->count())
<script>
   Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text:  {!! json_encode( $freshwater->Biota->nama) !!}
    },
    xAxis: {
        categories: {!! json_encode($date) !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Value'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Taxa Richness',
        color:'#003049',
        data: {!! json_encode($taxa_richness) !!}

    }, {
        name: 'Species Density',
        color:'#D62828',
        data: {!! json_encode($species_density) !!}

    }, {
        name: 'Diversity Index',
        color:'#F77F00',
        data: {!! json_encode($diversity_index) !!}

    }, {
        name: 'Evenness Value',
        color:'#FCBF49',
        data: {!! json_encode($evenness_value) !!}

    },{
        name: 'Dominance Index',
        color:'#E07A5F',
        data: {!! json_encode($dominance_index) !!}

    }]
});
</script>
@endif

@endsection