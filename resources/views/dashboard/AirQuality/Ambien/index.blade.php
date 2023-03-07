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
                                <td class="align-middle text-center">
                                    {{ $validation->values()[$validation->attribute()] }}
                                </td>
                                <td class="align-middle text-center">-</td>
                                @foreach ($validation->errors() as $e)
                                <td class="align-middle text-center">{{ $e }}</td>
                                @endforeach
                            </tr>
                            @endforeach

                        </div>
                        @endif

                        @can('admin')
                        <a href="/airquality/ambien/pointid" class="btn bg-gradient-info btn-xs ml-2 my-1 ">Code Sample</a>
                        <a href="/airquality/ambien/standard" class="btn bg-gradient-info btn-xs  my-1 ">Table Standard</a>
                        @endcan
                        <div class=" card-tools p-1 mr-2 form-inline">
                            <form action="/airquality/ambien" class="form-inline" autocomplete="off">
                                <div class="input-group date" id="reservationdate4" style="width: 85px;" data-target-input="nearest">
                                    <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                                </div>
                                <span class="input-group-text form-control-sm ">To</span>

                                <div class="input-group date mr-2" id="reservationdate5" style="width: 85px;" data-target-input="nearest">
                                    <input type="text" name="toDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate5" data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                                </div>
                                <div style="width: 118px;" class="input-group mr-1">
                                    <select class="form-control form-control-sm " name="search">
                                        <option value="" selected>Point Id</option>
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
                            <form action="/airquality/ambien">
                                <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                            </form>

                        </div>

                    </div>
                    <div class="card-body table-responsive">
                        <section class="content">
                            @can('admin')
                            <div class="d-flex justify-content-start mb-2">
                                <a href="/airquality/ambien/create" class="btn bg-gradient-secondary btn-xs ml-1"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                                <a href="/export/ambien" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                                <a href="#" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                    <i class="fas fa-upload mr-1"></i>Excel
                                </a>
                            </div>
                            @endcan
                            @if($Ambien->count())
                            <div class="table-responsive card card-primary card-outline">
                            <table role="grid" class="table table-striped table-bordered dt-responsive nowrap table-sm ">
                                    <thead class="table-info">
                                        <tr>
                                            <th class="align-middle text-center" scope="col">No</th>
                                            <th class="align-middle text-center" @if(!auth()->user()->is_admin) colspan="2" @else colspan="3" @endif scope="col">Quality Standard</th>
                                            <th class="align-middle text-center" scope="col"> Sulphur Dioxide (SO2) </th>
                                            <th class="align-middle text-center" scope="col"> Nitrogen Dioxide (NO2) </th>
                                            <th class="align-middle text-center" scope="col"> Carbon Monoxide </th>
                                            <th class="align-middle text-center" scope="col"> Ozone </th>
                                            <th class="align-middle text-center" scope="col"> Total Suspended Particulate (24 hours) </th>
                                            <th class="align-middle text-center" scope="col"> Particulate Matter 10 </th>
                                            <th class="align-middle text-center" scope="col"> Particulate Matter 2.5 </th>
                                            <th class="align-middle text-center" scope="col"> Temperature (Ambient) </th>
                                            <th class="align-middle text-center" scope="col"> Humidity </th>
                                            <th class="align-middle text-center" scope="col"> Wind Speed </th>
                                            <th class="align-middle text-center" scope="col"> Wind Direction </th>
                                            <th class="align-middle text-center" scope="col"> Weather </th>
                                            <th class="align-middle text-center" scope="col"> Barometric Pressure </th>
                                            <th class="align-middle text-center" scope="col"> Lead (Pb) </th>
                                            <th class="align-middle text-center" scope="col"> Hydrocarbon </th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($QualityStandard as $standard)
                                        <tr style="font-size: 12px;">
                                            <td class="align-middle text-center">{{ $no++ }}</td>
                                            <td class="align-middle text-center" @if(!auth()->user()->is_admin) colspan="2" @else colspan="3" @endif>{{ $standard->  nama    }}</td>
                                            <td class="align-middle text-center">{{ $standard->  sulphur_dioxide_so2 }}</td>
                                            <td class="align-middle text-center">{{ $standard->  nitrogen_dioxide_no2    }}</td>
                                            <td class="align-middle text-center">{{ $standard->  carbon_monoxide }}</td>
                                            <td class="align-middle text-center">{{ $standard->  ozone   }}</td>
                                            <td class="align-middle text-center">{{ $standard->  total_suspended_particulate_24_hours    }}</td>
                                            <td class="align-middle text-center">{{ $standard->  particulate_matter_10   }}</td>
                                            <td class="align-middle text-center">{{ $standard->  particulate_matter_2_5  }}</td>
                                            <td class="align-middle text-center">{{ $standard->  temperature_ambient }}</td>
                                            <td class="align-middle text-center">{{ $standard->  humidity    }}</td>
                                            <td class="align-middle text-center">{{ $standard->  wind_speed  }}</td>
                                            <td class="align-middle text-center">{{ $standard->  wind_direction  }}</td>
                                            <td class="align-middle text-center">{{ $standard->  weather }}</td>
                                            <td class="align-middle text-center">{{ $standard->  barometric_pressure }}</td>
                                            <td class="align-middle text-center">{{ $standard->  lead_pb }}</td>
                                            <td class="align-middle text-center">{{ $standard->  hydrocarbon }}</td>


                                        </tr>
                                        @endforeach
                                        <tr class="table-primary" style="font-size: 11px">
                                            <th class="align-middle text-center">*</th>
                                            @can('admin')
                                            <th class="align-middle text-center"> Action </th>
                                            @endcan
                                            <th class="align-middle text-center">Point ID</th>
                                            <th class="align-middle text-center">Date</th>
                                            <th class="align-middle text-center" colspan="15">Data Entry</th>

                                        </tr>
                                        @php
                                        $no = 1 + ($Ambien->currentPage() - 1) * $Ambien->perPage();
                                        @endphp

                                        @foreach ($Ambien as $item)
                                        <tr>
                                            <td class="align-middle text-center">{{ $no++ }}</td>
                                            @can('admin')
                                            <td class="align-middle text-center">
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
                                            @endcan
                                            <td class="align-middle text-center">
                                                <div style="width: 50px">{{ $item->PointId->nama }}</div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div style="width: 60px">{{ date('d-M-Y',strtotime($item->date )) }}</div>
                                            </td>
                                            <td class="align-middle text-center">{{ $item->  sulphur_dioxide_so2 }}</td>
                                            <td class="align-middle text-center">{{ $item->  nitrogen_dioxide_no2    }}</td>
                                            <td class="align-middle text-center">{{ $item->  carbon_monoxide }}</td>
                                            <td class="align-middle text-center">{{ $item->  ozone   }}</td>
                                            <td class="align-middle text-center">{{ $item->  total_suspended_particulate_24_hours    }}</td>
                                            <td class="align-middle text-center">{{ $item->  particulate_matter_10   }}</td>
                                            <td class="align-middle text-center">{{ $item->  particulate_matter_2_5  }}</td>
                                            <td class="align-middle text-center">{{ $item->  temperature_ambient }}</td>
                                            <td class="align-middle text-center">{{ $item->  humidity    }}</td>
                                            <td class="align-middle text-center">{{ $item->  wind_speed  }}</td>
                                            <td class="align-middle text-center">{{ $item->  wind_direction  }}</td>
                                            <td class="align-middle text-center">{{ $item->  weather }}</td>
                                            <td class="align-middle text-center">{{ $item->  barometric_pressure }}</td>
                                            <td class="align-middle text-center">{{ $item->  lead_pb }}</td>
                                            <td class="align-middle text-center">{{ $item->  hydrocarbon }}</td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            @else
                            <p class="text-center fs-4">Not Data Found</p>
                            @endif


                        </section>
                    </div>
                    <div class="card-footer p-0">
                        <div class="card-tools mt-2 form-inline">
                            <div class="col-4">
                                <div class="d-flex justify-content-start">
                                    <h6>Showing {{ $Ambien->firstItem() }} to {{$Ambien->lastItem() }} of {{ $Ambien->total() }}</h6>
                                </div>
                            </div>
                            <div class="col-8 d-flex justify-content-end">
                                <div class=" pagination pagination-sm">
                                    {{ $Ambien->links() }}
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
                                <form action="/import/ambien" method="POST" enctype="multipart/form-data">
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
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>


@endsection