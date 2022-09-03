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
                <div class="card-header p-0 p-2">
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
                    <a href="/weather/evaporation/evaporationpointid" class="btn bg-gradient-info btn-xs ">Point ID</a>
                </div>

                <div class="card-body">
                    <section class="content ">
                        <div class="row mb-2 p-0">
                            <div class="col-6 col-md-4 form-inline">
                                <a href="/weather/evaporation/create" class="btn bg-gradient-secondary btn-xs  form-inline   ml-2"><i class="fas fa-plus mr-1 "></i>Add Data</a>
                                <a href="/export/evaporation" class="btn  bg-gradient-secondary btn-xs  form-inline   ml-2" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                                <a href="#" class="btn  bg-gradient-secondary btn-xs  form-inline   ml-2" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                    <i class="fas fa-upload mr-1"></i>Excel
                                </a>
                            </div>
                            <div class="col-12 col-md-8 ">
                                <div class=" card-tools p-1 mr-2 d-flex justify-content-end form-inline">
                                    <form action="/weather/evaporation" class="form-inline" autocomplete="off">
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
                                    <form class="form-inline" action="/weather/evaporation">
                                        <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table role="grid" id="example2" class="table table-bordered table-hover ">
                            <thead style=" color:#005245">
                                <tr class="text-center" style="font-size: 12px">
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Point Id</th>
                                    <th>Time Observation</th>
                                    <th>Day Rainfall (X) mm</th>
                                    <th>Initial Water Elevation(Po)</th>
                                    <th>Final Water Elevation (P1)</th>
                                    <th>Evaporasi (Eo)=(Po-P1)+X mm</th>
                                    <th>Evaporation</th>
                                    <th>Volume water added</th>
                                    <th>Initial Volume (V1)</th>
                                    <th>Final Volume (V2)</th>
                                    <th>V1-V2</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center">
                                @php
                                $no = 1 + ($Evaporation->currentPage() - 1) * $Evaporation->perPage();

                                $evaporation=0;$volume=0;$initial_v1=0;$final_v2=0;
                                @endphp
                                @foreach ($Evaporation as $code)

                                <tr style="font-size: 12px">
                                    <td>{{ $no++ }}</td>
                                    <td style="width: 60px">{{ date('d-m-Y', strtotime( $code->date)) }}</td>
                                    <td>{{ $code->PointId->nama }}</td>
                                    <td>{{ $code->time_observation }}</td>
                                    <td>{{ $code->day_rainfall }}</td>
                                    <td>{{ $code->initial_water_elevation }}</td>
                                    <td>{{ $code->final_water_elevation }}</td>
                                    <td>{{$evaporation= $code->initial_water_elevation - $code->final_water_elevation + $code->day_rainfall}}</td>
                                    @php
                                    if ($evaporation>0) {
                                    $evaporation;
                                    }
                                    elseif ($evaporation<0) { $evaporation=0; } @endphp <td>{{$evaporation}}</td>
                                        <td>{{ $code->initial_water_elevation - $code->final_water_elevation }}</td>
                                        <td>{{ number_format($initial_v1= 3.14*60*60* doubleval($code->initial_water_elevation)) }}</td>
                                        <td>{{number_format($final_v2= 3.14*60*60* doubleval($code->final_water_elevation)) }}</td>
                                        <td>{{ number_format(abs($final_v2 -$initial_v1))}}</td>
                                        <td>
                                            <div style="">
                                                <a href="/weather/evaporation/{{ $code->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <form action="/weather/evaporation/{{ $code->id }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </section>
                </div>
                <div class="card-footer">
                    <div class=" form-inline">
                        <div class="col-4">
                            <div class="d-flex justify-content-start">
                                <p>Showing {{ $Evaporation->firstItem() }} to {{$Evaporation->lastItem() }} of {{ $Evaporation->total() }}</p>
                            </div>
                        </div>
                        <div class="col-8 d-flex justify-content-end">
                            <div class=" pagination pagination-sm">
                                {{ $Evaporation->links() }}
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
                            <form action="/import/evaporation" method="POST" enctype="multipart/form-data">
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

        </div><!-- /.container-fluid -->
    </section>
</div>

@endsection