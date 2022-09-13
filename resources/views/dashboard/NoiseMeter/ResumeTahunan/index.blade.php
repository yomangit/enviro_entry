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

        <div class="card card-primary card-outline">
            <div class="card-header p-0 ">
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible form-inline">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                    {{ session('success') }}
                </div>
                @endif

                <div class="row my-1 ml-1 mr-1">
                    <div class="col-6">
                        <p class="card-titel p-0 font-weight-bold">Annual Resume</p>
                    </div>
                    <div class="col-6 d-flex justify-content-end form-inline">
                        <form action="/airquality/noisemeter/resumetahunan" class="form-inline" autocomplete="off">
                            {{-- <label for="fromDate" class="mr-2">From</label> --}}
                            <div class="input-group date mr-2" id="reservationdate6" style="width: 85px;" data-target-input="nearest">
                                <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate6" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                            </div>
                            <div style="width: 125px;" class="input-group mr-1">
                                <select class="form-control form-control-sm " name="location">
                                    <option value="" selected>Point ID</option>
                                    @foreach ($code_location as $location)
                                    @if ( request('location')==$location->nama)
                                    <option value="{{($location->nama)}}" selected>{{$location->nama}}
                                    </option>
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
                        <form class="" action="/airquality/noisemeter/resumetahunan">
                            <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <section class="content ">
                    @if($ResumeTahunan->count())
          
                    <table role="grid" class="table table-bordered table-sm table-head-fixed ">
                        <thead style=" color:#005245">
                            <tr class="text-center">
                                <th>No</th>
                               @can('admin')
                               <th>Action</th>
                               @endcan
                                <th scope="col">Location</th>
                                <th scope="col">Year</th>
                                <th scope="col">L-01</th>
                                <th scope="col">L-02</th>
                                <th scope="col">L-03</th>
                                <th scope="col">L-04</th>
                                <th scope="col">L-05</th>
                                <th scope="col">L-06</th>
                                <th scope="col">L-07</th>
                                <th scope="col">L-S</th>
                                <th scope="col">L-M</th>
                                <th scope="col">L-sm</th>



                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            @php
                            $total=0;$log=0;
                            $a1=0;$a2=0; $a=0;$a2=0;$a3=0;$a4=0;$a5=0;$a6=0;$a7=0;
                            $no = 1 + ($ResumeTahunan->currentPage() - 1) * $ResumeTahunan->perPage();
                            @endphp
                            @foreach ($ResumeTahunan as $resume)
                            <tr>
                                <td>{{$no++}}</td>
                                @can('admin') <td>
                                    <div>

                                        <form action="/airquality/noisemeter/resumetahunan/{{ $resume->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>@endcan
                                <td>{{$resume->CodeLocationNM->nama}}</td>
                                <td>{{date('Y',strtotime($resume->date))}}</td>
                                <td>{{$resume->l1}}</td>
                                <td>{{$resume->l2}}</td>
                                <td>{{$resume->l3}}</td>
                                <td>{{$resume->l4}}</td>
                                <td>{{$resume->l5}}</td>
                                <td>{{$resume->l6}}</td>
                                <td>{{$resume->l7}}</td>
                                <td>{{$resume->ls}}</td>
                                <td>{{$resume->lm}}</td>
                                <td>{{$resume->lsm}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <th @if(!auth()->user()->is_admin) colspan="3" @else colspan="4" @endif>Standard Industri</th>
                                <td>70</td>
                                <td>70</td>
                                <td>70</td>
                                <td>70</td>
                                <td>70</td>
                                <td>70</td>
                                <td>70</td>
                                <td>70</td>
                                <td>70</td>
                                <td>70</td>
                            </tr>
                            <tr>
                                <th @if(!auth()->user()->is_admin) colspan="3" @else colspan="4" @endif>Standard Pemukiman</th>
                                <td>55</td>
                                <td>55</td>
                                <td>55</td>
                                <td>55</td>
                                <td>55</td>
                                <td>55</td>
                                <td>55</td>
                                <td>55</td>
                                <td>55</td>
                                <td>55</td>
                            </tr>



                        </tbody>
                    </table>

                    @else
                    <p class="text-center fs-4">Not Data Found</p>
                    @endif
                </section>
            </div>
            <div class="card-footer p-0">
                <div class="card-tools mt-2 form-inline">
                    <div class="col-4">
                        <div class="d-flex justify-content-start">
                            <h6>Showing {{ $ResumeTahunan->firstItem() }} to {{$ResumeTahunan->lastItem() }} of {{ $ResumeTahunan->total() }}</h6>
                        </div>
                    </div>
                    <div class="col-8 d-flex justify-content-end">
                        <div class=" pagination pagination-sm">
                            {{ $ResumeTahunan->links() }}
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
                        <form action="/importdatanoise" method="POST" enctype="multipart/form-data">
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

        </div><!-- /.container-fluid -->
        @if($ResumeTahunan->count())
            <div class="card">
                <div class="card-header">
                    <div class="card-title text center">{{$tittle}}</div>
                </div>
                <div class="card-body table-responsive p-0" id="container" style=" width: auto"></div>
            </div>
            @endif

    </section>
</div>
@foreach($ResumeTahunan as $resume)
<script>
    Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Noise quality in {!! json_encode($resume->CodeLocationNM->nama)!!} '
    },
    
    xAxis: {
        categories: {!! json_encode($date)!!},
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
                lineColor: '#000000',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'L-01',
         color:'#DE7A22',
        marker: {
            // symbol: 'square'
        },
        data: {!! json_encode($l1) !!}
    },{
        name: 'L-02',
         color:'#a0bbc4',
        marker: {
            // symbol: 'square'
        },
        data: {!! json_encode($l2) !!}
    },{
        name: 'L-03',
         color:'#187E32',
        marker: {
            // symbol: 'square'
        },
        data: {!! json_encode($l3) !!}
    },{
        name: 'L-04',
         color:'#417de2',
        marker: {
            // symbol: 'square'
        },
        data: {!! json_encode($l4) !!}
    },{
        name: 'L-05',
       color:'#d14655',
        marker: {
            symbol: 'square'
        },
        data: {!! json_encode($l5) !!}
    },{
        name: 'L-06',
         color:'#1ce091',
        marker: {
            symbol: 'square'
        },
        data: {!! json_encode($l6) !!}
    },{
        name: 'L-07',
         color:'#ff1493',
        marker: {
            // symbol: 'square'
        },
        data: {!! json_encode($l7) !!}
    },{
        name: 'L-s',
         color:'#00AEE1',
        marker: {
            // symbol: 'square'
        },
        data: {!! json_encode($ls) !!}
    },{
        name: 'L-m',
         color:'#ff7f50',
        marker: {
            // symbol: 'square'
        },
        data: {!! json_encode($lm) !!}
    },{
        name: 'L-sm',
         color:'#FFC300',
        marker: {
            // symbol: 'square'
        },
        data: {!! json_encode($lsm) !!}
    },{
        name: 'Std Pemukiman',
         color:'#48c4a9',
        marker: {
            // symbol: 'square'
        },
        data: {!! json_encode($pemukiman) !!}
    },{
        name: 'Std Industri',
         color:'#663d61',
        marker: {
            // symbol: 'square'
        },
        data: {!! json_encode($industri) !!}
    }]
    });
</script>
@endforeach

@endsection