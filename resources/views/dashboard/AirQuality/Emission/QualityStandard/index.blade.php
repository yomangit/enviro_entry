@extends('dashboard.layouts.main')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $breadcrumb }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/airquality/emission">Home</a></li>
                        <li class="breadcrumb-item active">{{ $tittle }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session()->has('failures'))

                  
                    <table style="font-size: 11px" class="table table-head-fixed table-sm table-danger">
                        <tr>
                            <th>Row</th>
                            <th>Attribute</th>
                            <th>Errors</th>
                            <th>Value</th>
                        </tr>
                        @foreach (session()->get('failures') as $validation)
                        <tr>
                            <td>{{$validation->row()}}</td>
                            <td>{{$validation->attribute()}}</td>
                            <td>
                                <ul>
                                    @foreach ($validation->errors() as $e)
                                    <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{$validation->values()[$validation->attribute()]}}</td>
                        </tr>
                        @endforeach
                    </table>

                    @endif
                    <div class="card-tools mt-1 ">
                        <form action="/airquality/emission/standard">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <a href="/airquality/emission/standard/create" class="btn bg-gradient-secondary btn-xs "><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                    <a href="/export/emission/standard" class="btn  bg-gradient-secondary btn-xs " data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                    <a href="#" class="btn  bg-gradient-secondary btn-xs " data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                        <i class="fas fa-upload mr-1"></i>Excel
                    </a>
                </div>
                <div class="card-body">

                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-standard1-tab" data-toggle="pill" href="#custom-content-below-standard1" role="tab" aria-controls="custom-content-below-standard1" aria-selected="true">Table Standard 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/airquality/emission/standard2">Table Standard 2</a>
                        </li>

                    </ul>
                    @if($QualityStandard->count())


                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade show active" id="custom-content-below-standard1" role="tabpanel" aria-labelledby="custom-content-below-standard1-tab">
                            <div class="card-body table-responsive">
                                <table style="font-size: 11px" class="table table-head-fixed table-sm table-striped table-bordered">
                                    <thead style="background-color: #067eaa ;color:#ded8d8" class="text-center ">
                                        <tr style="background-color: #067eaa">
                                            <th class="align-middle" style="background-color: #067eaa" rowspan="2">No</th>
                                            <th class="align-middle" style="background-color: #067eaa" rowspan="2">Action</th>
                                            <th class="align-middle" style="background-color: #067eaa" rowspan="2">Quality Standard</th>
                                            <th style="background-color: #067eaa" colspan="14">Isokinetic Sampling Stack Condition</th>
                                            <th style="background-color: #067eaa" colspan="7">Emission Air (Actual)</th>
                                            <th style="background-color: #067eaa" colspan="5">Emission Air (Corrected to 13% Oxygen at 25°C, 1 atm)</th>

                                        </tr>
                                        <tr>


                                            <th class="align-middle"> Engine </th>
                                            <th class="align-middle"> Fuel Type </th>
                                            <th class="align-middle"> Capacity </th>
                                            <th class="align-middle"> Ambient Temperature </th>
                                            <th class="align-middle"> Stack Temperature </th>
                                            <th class="align-middle"> Meter Temperature </th>
                                            <th class="align-middle"> Moisture Content </th>
                                            <th class="align-middle"> Actual Volume Sample </th>
                                            <th class="align-middle"> Standard Volume sample </th>
                                            <th class="align-middle"> Actual Oxygen, O2 </th>
                                            <th class="align-middle"> Velocity Linear </th>
                                            <th class="align-middle"> Dry Molecular Weight </th>
                                            <th class="align-middle"> Actual Stack Flowrate </th>
                                            <th class="align-middle"> Percent of Isokinetic </th>
                                            <th class="align-middle"> Total Particulate (isokinetic) </th>
                                            <th class="align-middle"> Sulfur Dioxide (SO2) </th>
                                            <th class="align-middle"> Nitrogen Dioxide (NO2)</th>
                                            <th class="align-middle"> Nitrogen Oxide (NOX) </th>
                                            <th class="align-middle"> Carbon Monoxide (CO) </th>
                                            <th class="align-middle"> Carbon Dioxide (CO2) </th>
                                            <th class="align-middle"> Opacity </th>
                                            <th class="align-middle"> Total Particulate (isokinetic) </th>
                                            <th class="align-middle"> Sulfur Dioxide (SO2) </th>
                                            <th class="align-middle"> Nitrogen Dioxide (NO2) </th>
                                            <th class="align-middle"> Nitrogen Oxide (NOX) </th>
                                            <th class="align-middle"> Carbon Monoxide (CO) </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1 + ($QualityStandard->currentPage() - 1) * $QualityStandard->perPage();
                                        @endphp
                                        @foreach ($QualityStandard as $standard)
                                        <tr style="font-size: 12px">
                                            <td>{{ $no++ }}</td>
                                            <td>

                                                <div style="width: 50px">
                                                    <a href="/airquality/emission/standard/{{ $standard->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <form action="/airquality/emission/standard/{{ $standard->id }}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>{{$standard->nama}}</td>
                                            <td>{{$standard->engine}}</td>
                                            <td>{{$standard->fuel_type}}</td>
                                            <td>{{$standard->capacity}}</td>
                                            <td>{{$standard->ambient_temperature}}</td>
                                            <td>{{$standard->stack_temperature}}</td>
                                            <td>{{$standard->meter_temperature}}</td>
                                            <td>{{$standard->moisture_content}}</td>
                                            <td>{{$standard->actual_volume_sample}}</td>
                                            <td>{{$standard->standard_volume_sample}}</td>
                                            <td>{{$standard->actual_oxygen_o2}}</td>
                                            <td>{{$standard->velocity_linear}}</td>
                                            <td>{{$standard->dry_molecular_weight}}</td>
                                            <td>{{$standard->actual_stack_flowrate}}</td>
                                            <td>{{$standard->percent_of_isokinetic}}</td>
                                            <td>{{$standard->total_particulate_isokinetic_actual}}</td>
                                            <td>{{$standard->sulfur_dioxide_so2_actual}}</td>
                                            <td>{{$standard->nitrogen_oxide_nox_as_nitrogen_dioxide_no2_actual}}</td>
                                            <td>{{$standard->nitrogen_oxide_nox_actual}}</td>
                                            <td>{{$standard->carbon_monoxide_co_actual}}</td>
                                            <td>{{$standard->carbon_dioxide_co}}</td>
                                            <td>{{$standard->opacity}}</td>
                                            <td>{{$standard->total_particulate_isokinetic}}</td>
                                            <td>{{$standard->sulfur_dioxide_so2}}</td>
                                            <td>{{$standard->nitrogen_oxide_nox_as_nitrogen_dioxide_no2}}</td>
                                            <td>{{$standard->nitrogen_oxide_nox}}</td>
                                            <td>{{$standard->carbon_monoxide_co}}</td>



                                        </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="card-tools row form-inline">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-start">
                                            <small>Showing {{ $QualityStandard->firstItem() }} to {{
                                                                    $QualityStandard->lastItem() }} of {{ $QualityStandard->total() }}
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex justify-content-end">
                                            {{ $QualityStandard->links() }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                    @else
                    <p class="text-center fs-4 p-1">Not Data Found</p>
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
                                <form action="/import/emission/standard" method="POST" enctype="multipart/form-data">
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
        </div>
    </section>

</div>
@endsection