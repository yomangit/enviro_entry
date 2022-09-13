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
                        <li class="breadcrumb-item"><a href="/airquality/emission2">Home</a></li>
                        <li class="breadcrumb-item active">{{ $tittle }}</a></li>
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

                    <table class="table table-danger">
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
                    <a href="/airquality/emission/standard2/create" class="btn bg-gradient-secondary btn-xs "><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                    <a href="/export/emission/standard2" class="btn  bg-gradient-secondary btn-xs " data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                    <a href="#" class="btn  bg-gradient-secondary btn-xs " data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                        <i class="fas fa-upload mr-1"></i>Excel
                    </a>
                </div>

                <div class="card-body">

                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="/airquality/emission/standard">Table Standard 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  show active" id="custom-content-below-standard1-tab" data-toggle="pill" href="#custom-content-below-standard1" role="tab" aria-controls="custom-content-below-standard1" aria-selected="true">Table Standard 2</a>
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
                                            <th style="background-color: #067eaa" colspan="15">Emission Air (Actual)</th>

                                        </tr>
                                        <tr>
                                            <th class="align-middle"> Equipment </th>
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
                                            <th class="align-middle"> Ammonia (NH3) </th>
                                            <th class="align-middle"> Chlorine (Cl2) </th>
                                            <th class="align-middle"> Hydrogen Chloride (HCl) </th>
                                            <th class="align-middle"> Hydrogen Fluoride (HF) </th>
                                            <th class="align-middle"> Nitrogen Oxide (NOX) </th>
                                            <th class="align-middle"> Opacity </th>
                                            <th class="align-middle"> Total Particulate (isokinetic) </th>
                                            <th class="align-middle"> Sulfur Dioxide (SO2) </th>
                                            <th class="align-middle"> Hydrogen Sulphide (H2S) </th>
                                            <th class="align-middle"> Mercury (Hg) </th>
                                            <th class="align-middle"> Arsenic (As) </th>
                                            <th class="align-middle"> Antimony (Sb) </th>
                                            <th class="align-middle"> Cadmium (Cd) </th>
                                            <th class="align-middle"> Zinc (Zn) </th>
                                            <th class="align-middle"> Lead (Pb) </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no2 = 1 + ($QualityStandard->currentPage() - 1) * $QualityStandard->perPage();
                                        @endphp
                                        @foreach ($QualityStandard as $standard2)
                                        <tr style="font-size: 12px">
                                            <td>{{ $no2++ }}</td>
                                            <td>

                                                <div style="width: 50px">
                                                    <a href="/airquality/emission/standard2/{{ $standard2->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <form action="/airquality/emission/standard2/{{ $standard2->id }}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>{{$standard2->nama}}</td>
                                            <td>{{$standard2->equipment}}</td>
                                            <td>{{$standard2->fuel_type}}</td>
                                            <td>{{$standard2->capacity}}</td>
                                            <td>{{$standard2->ambient_temperature}}</td>
                                            <td>{{$standard2->stack_temperature}}</td>
                                            <td>{{$standard2->meter_temperature}}</td>
                                            <td>{{$standard2->moisture_content}}</td>
                                            <td>{{$standard2->actual_volume_sample}}</td>
                                            <td>{{$standard2->standard_volume_sample}}</td>
                                            <td>{{$standard2->actual_oxygen_o2}}</td>
                                            <td>{{$standard2->velocity_linear}}</td>
                                            <td>{{$standard2->dry_molecular_weight}}</td>
                                            <td>{{$standard2->actual_stack_flowrate}}</td>
                                            <td>{{$standard2->percent_of_isokinetic}}</td>
                                            <td>{{$standard2->ammonia_nh3}}</td>
                                            <td>{{$standard2->chlorine_cl2}}</td>
                                            <td>{{$standard2->hydrogen_chloride_hcl}}</td>
                                            <td>{{$standard2->hydrogen_fluoride_hf}}</td>
                                            <td>{{$standard2->nitrogen_oxide_nox_as_nitrogen_dioxide_no2}}</td>
                                            <td>{{$standard2->opacity}}</td>
                                            <td>{{$standard2->total_particulate_isokinetic}}</td>
                                            <td>{{$standard2->sulfur_dioxide_so2}}</td>
                                            <td>{{$standard2->hydrogen_sulphide_h2s}}</td>
                                            <td>{{$standard2->mercury_hg}}</td>
                                            <td>{{$standard2->arsenic_as}}</td>
                                            <td>{{$standard2->antimony_sb}}</td>
                                            <td>{{$standard2->cadmium_cd}}</td>
                                            <td>{{$standard2->zinc_zn}}</td>
                                            <td>{{$standard2->lead_pb}}</td>



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
                                <form action="/import/emission/standard2" method="POST" enctype="multipart/form-data">
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