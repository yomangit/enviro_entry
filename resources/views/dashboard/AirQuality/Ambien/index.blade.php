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
                    <div class="card-header p-0 pt-1">

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

                        <a href="/airquality/ambien/pointid" class="btn bg-gradient-info btn-xs ml-2  mb-1">Code Sample</a>
                        <a href="/airquality/ambien/standard" class="btn bg-gradient-info btn-xs  ml-1 mb-1 ">Table Standard</a>


                    </div>
                    <div class="card-body">
                        <section class="content mt-2">

                            <div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-tools row d-flex">
                                                <form action="/airquality/ambien " class="form-inline" autocomplete="off">
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
                                                <form action="/airquality/ambien">
                                                    <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                                                </form>
                                            </div>

                                            <a href="/airquality/ambien/create" class="btn bg-gradient-secondary btn-xs mt-1"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                                            <a href="/export/ambien/standart" class="btn  bg-gradient-secondary btn-xs mt-1" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                                            <a href="#" class="btn  bg-gradient-secondary btn-xs mt-1" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                                <i class="fas fa-upload mr-1"></i>Excel
                                            </a>
                                        </div>
                                        <!-- /.card-header -->
                                        @if ($QualityStandard->count())
                                        <div class="card-body table-responsive">
                                            <table style="font-size: 11px" class="table table-head-fixed table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th colspan="4" scope="col">Quality Standard</th>
                                                        <th scope="col"> Sulphur Dioxide (SO2) </th>
                                                        <th scope="col"> Nitrogen Dioxide (NO2) </th>
                                                        <th scope="col"> Carbon Monoxide </th>
                                                        <th scope="col"> Ozone </th>
                                                        <th scope="col"> Total Suspended Particulate (24 hours) </th>
                                                        <th scope="col"> Particulate Matter 10 </th>
                                                        <th scope="col"> Particulate Matter 2.5 </th>
                                                        <th scope="col"> Temperature (Ambient) </th>
                                                        <th scope="col"> Humidity </th>
                                                        <th scope="col"> Wind Speed </th>
                                                        <th scope="col"> Wind Direction </th>
                                                        <th scope="col"> Weather </th>
                                                        <th scope="col"> Barometric Pressure </th>
                                                        <th scope="col"> Lead (Pb) </th>
                                                        <th scope="col"> Hydrocarbon </th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @php
                                                    $no = 1 + ($QualityStandard->currentPage() - 1) * $QualityStandard->perPage();
                                                    @endphp
                                                    @foreach ($QualityStandard as $standard)
                                                    <tr style="font-size: 12px;">
                                                        <td>{{ $no++ }}</td>
                                                        <td colspan="4">{{ $standard->  nama    }}</td>
                                                        <td>{{ $standard->  sulphur_dioxide_so2 }}</td>
                                                        <td>{{ $standard->  nitrogen_dioxide_no2    }}</td>
                                                        <td>{{ $standard->  carbon_monoxide }}</td>
                                                        <td>{{ $standard->  ozone   }}</td>
                                                        <td>{{ $standard->  total_suspended_particulate_24_hours    }}</td>
                                                        <td>{{ $standard->  particulate_matter_10   }}</td>
                                                        <td>{{ $standard->  particulate_matter_2_5  }}</td>
                                                        <td>{{ $standard->  temperature_ambient }}</td>
                                                        <td>{{ $standard->  humidity    }}</td>
                                                        <td>{{ $standard->  wind_speed  }}</td>
                                                        <td>{{ $standard->  wind_direction  }}</td>
                                                        <td>{{ $standard->  weather }}</td>
                                                        <td>{{ $standard->  barometric_pressure }}</td>
                                                        <td>{{ $standard->  lead_pb }}</td>
                                                        <td>{{ $standard->  hydrocarbon }}</td>

                                                    </tr>
                                                    @endforeach
                                                    <tr align="middle" style="font-size: 11px">
                                                        <th>*</th>
                                                        <th colspan="2">Point ID</th>
                                                        <th colspan="2">Date</th>
                                                        <th colspan="15">Data Entry</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    @php
                                                    $no = 1 + ($Ambien->currentPage() - 1) * $Ambien->perPage();
                                                    @endphp
                                                    @foreach ($Ambien as $item)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td colspan="2">
                                                            <div style="width: 50px">{{ $item->PointId->nama }}</div>
                                                        </td>
                                                        <td colspan="2">
                                                            <div style="width: 50px">{{ $item->date  }}
                                                        </td>
                                                        <td>{{ $item->  sulphur_dioxide_so2 }}</td>
                                                        <td>{{ $item->  nitrogen_dioxide_no2    }}</td>
                                                        <td>{{ $item->  carbon_monoxide }}</td>
                                                        <td>{{ $item->  ozone   }}</td>
                                                        <td>{{ $item->  total_suspended_particulate_24_hours    }}</td>
                                                        <td>{{ $item->  particulate_matter_10   }}</td>
                                                        <td>{{ $item->  particulate_matter_2_5  }}</td>
                                                        <td>{{ $item->  temperature_ambient }}</td>
                                                        <td>{{ $item->  humidity    }}</td>
                                                        <td>{{ $item->  wind_speed  }}</td>
                                                        <td>{{ $item->  wind_direction  }}</td>
                                                        <td>{{ $item->  weather }}</td>
                                                        <td>{{ $item->  barometric_pressure }}</td>
                                                        <td>{{ $item->  lead_pb }}</td>
                                                        <td>{{ $item->  hydrocarbon }}</td>
                                                        <td>
                                                            <div style="width: 50px">

                                                                <a href="/airquality/ambien/{{ $item->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <i class="fas fa-pen"></i>
                                                                </a>
                                                                <form action="/airquality/ambien/{{ $item->id }}" method="POST" class="d-inline">
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
                                        </div>

                                        <div class="card-footer">
                                            <div class="card-tools row form-inline">
                                                <div class="col-4">
                                                    <div class="d-flex justify-content-start">
                                                        <small>Showing {{ $Ambien->firstItem() }} to {{
                                                                    $Ambien->lastItem() }} of {{ $Ambien->total() }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="d-flex justify-content-end">
                                                        {{ $Ambien->links() }}
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
                                                    <form action="/import/ambien/standart" method="POST" enctype="multipart/form-data">
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
                                        <!-- /.card-body -->
                                    </div>

                                    <!-- /.card -->
                                </div>

                        </section>
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>


@endsection