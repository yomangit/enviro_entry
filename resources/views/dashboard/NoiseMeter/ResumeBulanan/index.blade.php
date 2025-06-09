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
                <div class="row mx-2">
                    <div class="col-4 ">
                        <p class="card-titel m-2 font-weight-bold">Noise Monthly Resume</p>
                    </div>
                    <div class="col-8  d-flex justify-content-end form-inline">
                        <form action="/airquality/noisemeter/resumebulanan" class="form-inline" autocomplete="off">
                            {{-- <label for="fromDate" class="mr-2">From</label> --}}
                            <div class="input-group date" id="reservationdate4" style="width: 85px;" data-target-input="nearest">
                                        <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                                    </div>
                                    <span class="input-group-text form-control-sm ">To</span>

                                    <div class="input-group date mr-2" id="reservationdate5" style="width: 85px;" data-target-input="nearest">
                                        <input type="text" name="toDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate5" data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                                    </div>
<<<<<<< HEAD
=======
                                    <div class="input-group date mr-2" id="reservationdate6" style="width: 85px;" data-target-input="nearest">
                                        <input type="text" name="bulan" placeholder="Month" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate6" data-toggle="datetimepicker" value="{{ request('bulan') }}" />
                                    </div>
>>>>>>> d0a6326defbeba8c21bdbfff3da64407ba3b31e3
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
                            <div style="width: 125px;" class="input-group mr-1">
                                <select class="form-control form-control-sm " name="location1">
                                    <option value="" selected>Point ID</option>
                                    @foreach ($code_location as $location)
                                    @if ( request('location1')==$location->nama)
                                    <option value="{{($location->nama)}}" selected>{{$location->nama}}
                                    </option>
                                    @else
                                    <option value="{{$location->nama}}">{{$location->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div style="width: 125px;" class="input-group mr-1">
                                <select class="form-control form-control-sm " name="location2">
                                    <option value="" selected>Point ID</option>
                                    @foreach ($code_location as $location)
                                    @if ( request('location2')==$location->nama)
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
                        <form class="" action="/airquality/noisemeter/resumebulanan">
                            <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                        </form>
                    </div>
                </div>

                <div class=" card-tools p-1 mr-2 form-inline">


                </div>
            </div>
            <div class="card-body">
                <a href="#" class="btn  bg-gradient-secondary btn-xs mb-2" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                    <i class="fas fa-upload mr-1"></i>Excel
                </a>
                @if ($ResumeBulanan->count())

                <div class="table-responsive card card-primary card-outline">
                    <table role="grid" class="table table-striped table-bordered dt-responsive nowrap table-sm ">
                        <thead style=" color:#005245">
                            <tr class="text-center">
                                <th>No</th>
                                @can('admin')
                                <th>Action</th>
                                @endcan
                                <th scope="col">Location</th>
                                <th scope="col">Date</th>
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
                            $no = 1 + ($ResumeBulanan->currentPage() - 1) * $ResumeBulanan->perPage();
                            @endphp
                            @foreach ($ResumeBulanan as $resume)
                            <tr>
                                <td>{{$no++}}</td>
                                @can('admin') <td>
                                    <div>

                                        <form action="/airquality/noisemeter/resumebulanan/{{ $resume->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>@endcan
                                <td>{{$resume->CodeLocationNM->nama}}</td>
                                <td>
                                    <div style="width: 80px">{{date('d-m-Y',strtotime($resume->date))}}</div>
                                </td>
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
                            <tr style="text-align: center">

                                <form action="/airquality/noisemeter/resumetahunan" method="post" checked enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    <th colspan="3">Average</th>
                                    @can('admin')
                                    <th><button type="submit" class="btn btn btn-outline-primary btn-sm " data-toggle="tooltip" data-placement="top" title="Add to Annual Resume"><i class="fa-solid fa-circle-plus"></i></button></th>
                                    @endcan
                                    <td hidden><input name="locationResume" type="text" step="0.0001" class="form-control form-control-sm @error('locationResume') is-invalid @enderror" value="{{ $resume->CodelocationNM->id }}" /></td>
                                    <td hidden><input name="date" type="text" class="form-control form-control-sm @error('date') is-invalid @enderror" value="{{ date('M-Y', strtotime( $resume->date)) }}" /></td>
                                    <td><input readonly style="width: 125px;text-align: center" name="l1" type="number" step="0.0001" class="form-control form-control-sm @error('l1') is-invalid @enderror" value="{{round($avg_l1,4)}}" /></td>
                                    <td><input readonly style="width: 125px;text-align: center" name="l2" type="number" step="0.0001" class="form-control form-control-sm @error('l2') is-invalid @enderror" value="{{round($avg_l2,4)}}" /></td>
                                    <td><input readonly style="width: 125px;text-align: center" name="l3" type="number" step="0.0001" class="form-control form-control-sm @error('l3') is-invalid @enderror" value="{{round($avg_l3,4)}}" /></td>
                                    <td><input readonly style="width: 125px;text-align: center" name="l4" type="number" step="0.0001" class="form-control form-control-sm @error('l4') is-invalid @enderror" value="{{round($avg_l4,4)}}" /></td>
                                    <td><input readonly style="width: 125px;text-align: center" name="l5" type="number" step="0.0001" class="form-control form-control-sm @error('l5') is-invalid @enderror" value="{{round($avg_l5,4)}}" /></td>
                                    <td><input readonly style="width: 125px;text-align: center" name="l6" type="number" step="0.0001" class="form-control form-control-sm @error('l6') is-invalid @enderror" value="{{round($avg_l6,4)}}" /></td>
                                    <td><input readonly style="width: 125px;text-align: center" name="l7" type="number" step="0.0001" class="form-control form-control-sm @error('l7') is-invalid @enderror" value="{{round($avg_l7,4)}}" /></td>
                                    <td><input readonly style="width: 125px;text-align: center" name="ls" type="number" step="0.0001" class="form-control form-control-sm @error('ls') is-invalid @enderror" value="{{round($avg_ls,4)}}" /></td>
                                    <td><input readonly style="width: 125px;text-align: center" name="lm" type="number" step="0.0001" class="form-control form-control-sm @error('lm') is-invalid @enderror" value="{{round($avg_lm,4)}}" /></td>
                                    <td><input readonly style="width: 125px;text-align: center" name="lsm" type="number" step="0.0001" class="form-control form-control-sm @error('lsm') is-invalid @enderror" value="{{round($avg_lsm,4)}}" /></td>

                                </form>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer p-0">
                <div class="card-tools mt-2 form-inline">
                    <div class="col-4">
                        <div class="d-flex justify-content-start">
                            <h6>Showing {{ $ResumeBulanan->firstItem() }} to {{$ResumeBulanan->lastItem() }} of {{ $ResumeBulanan->total() }}</h6>
                        </div>
                    </div>
                    <div class="col-8 d-flex justify-content-end">
                        <div class=" pagination pagination-sm">
                            {{ $ResumeBulanan->links() }}
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
                        <form action="/import/noisebulanan" method="POST" enctype="multipart/form-data">
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
            <!-- /.card-body -->


            <!-- /.card -->
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title text center">{{$tittle}}</div>
            </div>
            <div class="card-body table-responsive p-0" id="container" style=" width: auto"></div>
        </div>
    </section>
</div>

<script>
    Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        
        text: 'Noise quality '
    },
    
    xAxis: [{
                categories: {!! json_encode($date) !!}
    },{
        categories: {!! json_encode($nama) !!},
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
                lineColor: '#000000',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'L-01',
         color:'#DE7A22',
         xAxis: 1,
        marker: {
           
        },
        data: {!! json_encode($l1) !!}
    },{
        name: 'L-02',
         color:'#a0bbc4', 
         xAxis: 1,
        marker: {
           
        },
        data: {!! json_encode($l2) !!}
    },{
        name: 'L-03',
         color:'#187E32',
        marker: {
           
        },
        data: {!! json_encode($l3) !!}
    },{
        name: 'L-04',
         color:'#417de2',
        marker: {
           
        },
        data: {!! json_encode($l4) !!}
    },{
        name: 'L-05',
        xAxis: 1,
       color:'#d14655',
        marker: {
            symbol: 'square'
        },
        data: {!! json_encode($l5) !!}
    },{
        xAxis: 1,
        name: 'L-06',
         color:'#1ce091',
        marker: {
            symbol: 'square'
        },
        data: {!! json_encode($l6) !!}
    },{
        xAxis: 1,
        name: 'L-07',
         color:'#ff1493',
        marker: {
           
        },
        data: {!! json_encode($l7) !!}
    },{
        xAxis: 1,
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
           
        },
        data: {!! json_encode($lm) !!}
    },{
        name: 'L-sm',
         color:'#FFC300',
        marker: {
            // symbol: 'square'
        },
        data: {!! json_encode($lsm) !!}
    }]
    });
</script>

@endsection