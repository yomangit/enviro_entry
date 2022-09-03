@extends('dashboard.layouts.main')
@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> {{ $breadcrumb }}</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
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

                    <table class="table table-danger">
                        <tr>
                            <th class="align-middle">Row</th>
                            <th class="align-middle">Attribute</th>
                            <th class="align-middle">Errors</th>
                            <th class="align-middle">Value</th>
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
                    <a href="/surfacewater/marinesurfacewater/pointid" class="btn bg-gradient-info btn-xs ml-2 my-1 ">Code Sample</a>
                    <a href="/surfacewater/marinesurfacewater/quality" class="btn bg-gradient-info btn-xs my-1 ">Table Standard</a>

                </div>
                <div class="card-body">
                    <div class="content">
                        <div class="row mb-2 p-0">
                            <div class="col-6 col-md-4 form-inline">
                                <a href="/surfacewater/marinesurfacewater/create" class="btn bg-gradient-secondary btn-xs ml-1"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                                <a href="/export/marinesurfacewater" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                                <a href="#" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default"><i class="fas fa-upload mr-1"></i>Excel</a>
                            </div>
                            <div class="col-12 col-md-8 d-flex justify-content-end form-inline">
                                <form action="/surfacewater/marinesurfacewater" class="form-inline" autocomplete="off">
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
                                <form action="/surfacewater/marinesurfacewater">
                                    <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                                </form>
                            </div>
                        </div>






                        <ul class="nav nav-tabs mb-2" id="custom-content-above-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-content-above-Physical-tab" data-toggle="pill" href="#custom-content-above-Physical" role="tab" aria-controls="custom-content-above-Physical" aria-selected="true">Physical Chemical</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-Anions-tab" data-toggle="pill" href="#custom-content-above-Anions" role="tab" aria-controls="custom-content-above-Anions" aria-selected="false">Chemical-Anion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-Nutrient-tab" data-toggle="pill" href="#custom-content-above-Nutrient" role="tab" aria-controls="custom-content-above-Nutrient" aria-selected="false">Nutrient</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-Cyanide-tab" data-toggle="pill" href="#custom-content-above-Cyanide" role="tab" aria-controls="custom-content-above-Cyanide" aria-selected="false">Cyanide & Microbiology</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-Metal-tab" data-toggle="pill" href="#custom-content-above-Metal" role="tab" aria-controls="custom-content-above-Metal" aria-selected="false">Metal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-Organics-tab" data-toggle="pill" href="#custom-content-above-Organics" role="tab" aria-controls="custom-content-above-Organics" aria-selected="false">Organics</a>
                            </li>

                        </ul>
                        @if($QualityStandard->count() && $code_units->count())
                        <div class="tab-content" id="custom-content-above-tabContent">
                            <div class="tab-pane fade show active" id="custom-content-above-Physical" role="tabpanel" aria-labelledby="custom-content-above-Physical-tab">
                                <div class="card">

                                    <div class="card-body table-responsive">
                                        <table class="table table-bordered  table-sm table-head-fixed  table-striped">
                                            <thead class="text-center" style=" color:#581845;font-size: 12px">
                                                <tr>
                                                    <th class="align-middle">No</th>
                                                    <th class="align-middle" colspan="2">Quality Standard</th>
                                                    <th class="align-middle">Clarity</th>
                                                    <th class="align-middle">Temperature (Water)</th>
                                                    <th class="align-middle">Garbage</th>
                                                    <th class="align-middle">Oil Layer</th>
                                                    <th class="align-middle">Odor</th>
                                                    <th class="align-middle">Color</th>
                                                    <th class="align-middle">Turbidity</th>
                                                    <th class="align-middle">Total Suspended Solids</th>
                                                    <th class="align-middle">Salinity in situ</th>
                                                    <th class="align-middle">Total Dissolved Solids</th>
                                                    <th class="align-middle">Conductivity (Insitu)</th>

                                                </tr>
                                                @php
                                                $no = 1 + ($QualityStandard->currentPage() - 1) * $QualityStandard->perPage();
                                                @endphp
                                                @foreach($QualityStandard as $standard)
                                                <tr style="background-color: #eee8cd">
                                                    <td>{{$no++}}</td>
                                                    <th class="align-middle" colspan="2">{{$standard->nama}}</th>
                                                    <td>{{$standard->clarity}}</td>
                                                    <td>{{$standard->temperature_water}}</td>
                                                    <td>{{$standard->garbage}}</td>
                                                    <td>{{$standard->oil_ayer}}</td>
                                                    <td>{{$standard->odour}}</td>
                                                    <td>{{$standard->colour}}</td>
                                                    <td>{{$standard->turbidity}}</td>
                                                    <td>{{$standard->total_suspended_solids}}</td>
                                                    <td>{{$standard->salinity_in_situ}}</td>
                                                    <td>{{$standard->total_dissolved_solids}}</td>
                                                    <td>{{$standard->conductivity_insitu}}</td>

                                                </tr>
                                                @endforeach

                                            </thead>
                                            <tbody style="text-align:center">
                                                @php
                                                $no = 1 + ($MarineSurfacewater->currentPage() - 1) * $MarineSurfacewater->perPage();
                                                @endphp
                                                <tr style="background-color: #b3dbf6;font-size: 10px">
                                                    <th class="align-middle">*</th>
                                                    <th class="align-middle">Name</th>
                                                    <th class="align-middle">Date</th>
                                                    <th colspan="10">Data Entry</th>
                                                    <th class="align-middle"> Action</th>

                                                </tr>
                                                @foreach($MarineSurfacewater as $item)
                                                <tr style=" color:#581845;font-size: 12px">
                                                    <td>{{$no++}}</td>
                                                    <td>{{$item->PointId->nama}}</td>
                                                    <td style="width: 80px">{{date('d-M-Y',strtotime($item->date))}}</td>
                                                    <td>{{$item->clarity}}</td>
                                                    <td>{{$item->temperature_water}}</td>
                                                    <td>{{$item->garbage}}</td>
                                                    <td>{{$item->oil_ayer}}</td>
                                                    <td>{{$item->odour}}</td>
                                                    <td>{{$item->colour}}</td>
                                                    <td>{{$item->turbidity}}</td>
                                                    <td>{{$item->total_suspended_solids}}</td>
                                                    <td>{{$item->salinity_in_situ}}</td>
                                                    <td>{{$item->total_dissolved_solids}}</td>
                                                    <td>{{$item->conductivity_insitu}}</td>
                                                    <td>
                                                        <div style="width: 50px">
                                                            <a href="/surfacewater/marinesurfacewater/{{ $item->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                            <form action="/surfacewater/marinesurfacewater/{{ $item->id }}" method="POST" class="d-inline">
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
                                                    <small>Showing {{ $MarineSurfacewater->firstItem() }} to
                                                        {{ $MarineSurfacewater->lastItem() }} of {{ $MarineSurfacewater->total() }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div style="font-size: 8" class="d-flex justify-content-end">
                                                    {{ $MarineSurfacewater->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-above-Anions" role="tabpanel" aria-labelledby="custom-content-above-Anions-tab">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table class="table table-bordered  table-sm table-head-fixed  table-striped">
                                            <thead class="text-center" style=" color:#581845;font-size: 12px">
                                                <tr>
                                                    <th class="align-middle">No</th>
                                                    <th class="align-middle" colspan="2">Quality Standard</th>
                                                    <th class="align-middle">pH</th>
                                                    <th class="align-middle">Sulphide</th>
                                                </tr>
                                                @php
                                                $no = 1 + ($QualityStandard->currentPage() - 1) * $QualityStandard->perPage();
                                                @endphp
                                                @foreach($QualityStandard as $standard)
                                                <tr style="background-color: #eee8cd">
                                                    <td>{{$no++}}</td>
                                                    <th class="align-middle" colspan="2" colspan="2">{{$standard->nama}}</th>
                                                    <th class="align-middle">{{$standard->ph}}</th>
                                                    <td>{{$standard->sulphide}}</td>

                                                </tr>
                                                @endforeach
                                            </thead>
                                            <tbody style="text-align:center">
                                                @php
                                                $no = 1 + ($MarineSurfacewater->currentPage() - 1) * $MarineSurfacewater->perPage();
                                                @endphp
                                                <tr style="background-color: #b3dbf6;font-size: 10px">
                                                    <th class="align-middle">*</th>
                                                    <th class="align-middle">Name</th>
                                                    <th class="align-middle">Date</th>
                                                    <th colspan="6">Data Entry</th>
                                                </tr>
                                                @foreach($MarineSurfacewater as $item)
                                                <tr style=" color:#581845;font-size: 12px">
                                                    <td>{{$no++}}</td>
                                                    <td>{{$item->PointId->nama}}</td>
                                                    <td style="width: 80px">{{date('d-m-Y',strtotime($item->date))}}</td>
                                                    <td>{{$item->ph}}</td>
                                                    <td>{{$item->sulphide}}</td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <div class="card-tools row form-inline">
                                            <div class="col-4">
                                                <div class="d-flex justify-content-start">
                                                    <small>Showing {{ $MarineSurfacewater->firstItem() }} to
                                                        {{ $MarineSurfacewater->lastItem() }} of {{ $MarineSurfacewater->total() }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div style="font-size: 8" class="d-flex justify-content-end">
                                                    {{ $MarineSurfacewater->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-above-Nutrient" role="tabpanel" aria-labelledby="custom-content-above-Nutrient-tab">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table class="table table-bordered  table-sm table-head-fixed  table-striped">
                                            <thead class="text-center" style=" color:#581845;font-size: 12px">
                                                <tr>
                                                    <th class="align-middle">No</th>
                                                    <th class="align-middle" colspan="2">Quality Standard</th>
                                                    <th class="align-middle">Ammonia (N-NH3)</th>
                                                    <th class="align-middle">Nitrate (N-NO3)</th>
                                                    <th class="align-middle">Total-Phosphate (P-PO4)</th>
                                                </tr>
                                                @php
                                                $no = 1 + ($QualityStandard->currentPage() - 1) * $QualityStandard->perPage();
                                                @endphp
                                                @foreach($QualityStandard as $standard)
                                                <tr style="background-color: #eee8cd">
                                                    <td>{{$no++}}</td>
                                                    <td colspan="2">{{$standard->nama}}</td>
                                                    <td>{{$standard->ammonia_n_nh3}}</td>
                                                    <td>{{$standard->nitrate_n_no3}}</td>
                                                    <td>{{$standard->total_phosphate_p_po4}}</td>
                                                </tr>
                                                @endforeach
                                            </thead>
                                            <tbody style="text-align:center">
                                                @php
                                                $no = 1 + ($MarineSurfacewater->currentPage() - 1) * $MarineSurfacewater->perPage();
                                                @endphp
                                                <tr style="background-color: #b3dbf6;font-size: 10px">
                                                    <th class="align-middle">*</th>
                                                    <th class="align-middle">Name</th>
                                                    <th class="align-middle">Date</th>
                                                    <th colspan="3">Data Entry</th>
                                                </tr>
                                                @foreach($MarineSurfacewater as $item)
                                                <tr style=" color:#581845;font-size: 12px">
                                                    <td>{{$no++}}</td>
                                                    <td>{{$item->PointId->nama}}</td>
                                                    <td style="width: 80px">{{date('d-m-Y',strtotime($item->date))}}</td>
                                                    <td>{{$item->ammonia_n_nh3}}</td>
                                                    <td>{{$item->nitrate_n_no3}}</td>
                                                    <td>{{$item->total_phosphate_p_po4}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <div class="card-tools row form-inline">
                                            <div class="col-4">
                                                <div class="d-flex justify-content-start">
                                                    <small>Showing {{ $MarineSurfacewater->firstItem() }} to
                                                        {{ $MarineSurfacewater->lastItem() }} of {{ $MarineSurfacewater->total() }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div style="font-size: 8" class="d-flex justify-content-end">
                                                    {{ $MarineSurfacewater->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="custom-content-above-Cyanide" role="tabpanel" aria-labelledby="custom-content-above-Cyanide-tab">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table class="table table-bordered  table-sm table-head-fixed  table-striped">
                                            <thead class="text-center" style=" color:#581845;font-size: 12px">
                                                <tr>
                                                    <th class="align-middle">No</th>
                                                    <th class="align-middle" colspan="2">Quality Standard</th>
                                                    <th class="align-middle">Cyanide (Total)</th>
                                                    <th class="align-middle">Total Coliform</th>
                                                </tr>
                                                @php
                                                $no = 1 + ($QualityStandard->currentPage() - 1) * $QualityStandard->perPage();
                                                @endphp
                                                @foreach($QualityStandard as $standard)
                                                <tr style="background-color: #eee8cd">
                                                    <td>{{$no++}}</td>
                                                    <th class="align-middle" colspan="2">{{$standard->nama}}</th>
                                                    <td>{{$standard->cyanide_total}}</td>
                                                    <td>{{$standard->total_coliform}}</td>
                                                </tr>
                                                @endforeach
                                            </thead>
                                            <tbody style="text-align:center">
                                                @php
                                                $no = 1 + ($MarineSurfacewater->currentPage() - 1) * $MarineSurfacewater->perPage();
                                                @endphp
                                                <tr style="background-color: #b3dbf6;font-size: 10px">
                                                    <th class="align-middle">*</th>
                                                    <th class="align-middle">Name</th>
                                                    <th class="align-middle">Date</th>
                                                    <th colspan="5">Data Entry</th>
                                                </tr>
                                                @foreach($MarineSurfacewater as $item)
                                                <tr style=" color:#581845;font-size: 12px">
                                                    <td>{{$no++}}</td>
                                                    <td>{{$item->PointId->nama}}</td>
                                                    <td style="width: 80px">{{date('d-m-Y',strtotime($item->date))}}</td>
                                                    <td>{{$item->cyanide_total}}</td>
                                                    <td>{{$item->total_coliform}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <div class="card-tools row form-inline">
                                            <div class="col-4">
                                                <div class="d-flex justify-content-start">
                                                    <small>Showing {{ $MarineSurfacewater->firstItem() }} to
                                                        {{ $MarineSurfacewater->lastItem() }} of {{ $MarineSurfacewater->total() }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div style="font-size: 8" class="d-flex justify-content-end">
                                                    {{ $MarineSurfacewater->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="custom-content-above-Metal" role="tabpanel" aria-labelledby="custom-content-above-Metal-tab">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table class="table table-bordered  table-sm table-head-fixed  table-striped">
                                            <thead class="text-center" style=" color:#581845;font-size: 12px">
                                                <tr>
                                                    <th class="align-middle">No</th>
                                                    <th class="align-middle" colspan="2">Quality Standard</th>
                                                    <th class="align-middle">Chromium Hexavalent-Total(Cr-VI)</th>
                                                    <th class="align-middle">Arsenic-Hydrid Dissolved (As)</th>
                                                    <th class="align-middle">Boron-Dissolved (B)</th>
                                                    <th class="align-middle">Cadmium-Dissolved (Cd)</th>
                                                    <th class="align-middle">Copper-Dissolved (Cu)</th>
                                                    <th class="align-middle">Lead-Dissolved (Pb)</th>
                                                    <th class="align-middle">Nickel-Dissolved (Ni)</th>
                                                    <th class="align-middle">Zinc-Dissolved (Zn)</th>
                                                    <th class="align-middle">Mercury-Dissolved (Hg)</th>
                                                </tr>
                                                @php
                                                $no = 1 + ($QualityStandard->currentPage() - 1) * $QualityStandard->perPage();
                                                @endphp
                                                @foreach($QualityStandard as $standard)
                                                <tr style="background-color: #eee8cd">
                                                    <td>{{$no++}}</td>
                                                    <th class="align-middle" colspan="2">{{$standard->nama}}</th>
                                                    <td>{{$standard->chromium_hexavalent_total_cr_vi}}</td>
                                                    <td>{{$standard->arsenic_hydrid_dissolved_as}}</td>
                                                    <td>{{$standard->boron_dissolved_b}}</td>
                                                    <td>{{$standard->cadmium_dissolved_cd}}</td>
                                                    <td>{{$standard->copper_dissolved_cu}}</td>
                                                    <td>{{$standard->lead_dissolved_pb}}</td>
                                                    <td>{{$standard->nickel_dissolved_ni}}</td>
                                                    <td>{{$standard->zinc_dissolved_zn}}</td>
                                                    <td>{{$standard->mercury_dissolved_hg}}</td>
                                                </tr>
                                                @endforeach
                                            </thead>
                                            <tbody style="text-align:center">
                                                @php
                                                $no = 1 + ($MarineSurfacewater->currentPage() - 1) * $MarineSurfacewater->perPage();
                                                @endphp
                                                <tr style="background-color: #b3dbf6;font-size: 10px">
                                                    <th class="align-middle">*</th>
                                                    <th class="align-middle">Name</th>
                                                    <th class="align-middle">Date</th>
                                                    <th colspan="16">Data Entry</th>
                                                </tr>
                                                @foreach($MarineSurfacewater as $item)
                                                <tr style=" color:#581845;font-size: 12px">
                                                    <td>{{$no++}}</td>
                                                    <td>{{$item->PointId->nama}}</td>
                                                    <td style="width: 80px">{{date('d-m-Y',strtotime($item->date))}}</td>
                                                    <td>{{$item->chromium_hexavalent_total_cr_vi}}</td>
                                                    <td>{{$item->arsenic_hydrid_dissolved_as}}</td>
                                                    <td>{{$item->boron_dissolved_b}}</td>
                                                    <td>{{$item->cadmium_dissolved_cd}}</td>
                                                    <td>{{$item->copper_dissolved_cu}}</td>
                                                    <td>{{$item->lead_dissolved_pb}}</td>
                                                    <td>{{$item->nickel_dissolved_ni}}</td>
                                                    <td>{{$item->zinc_dissolved_zn}}</td>
                                                    <td>{{$item->mercury_dissolved_hg}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <div class="card-tools row form-inline">
                                            <div class="col-4">
                                                <div class="d-flex justify-content-start">
                                                    <small>Showing {{ $MarineSurfacewater->firstItem() }} to
                                                        {{ $MarineSurfacewater->lastItem() }} of {{ $MarineSurfacewater->total() }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div style="font-size: 8" class="d-flex justify-content-end">
                                                    {{ $MarineSurfacewater->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-above-Organics" role="tabpanel" aria-labelledby="custom-content-above-Organics-tab">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table class="table table-bordered  table-sm table-head-fixed  table-striped">
                                            <thead class="text-center" style=" color:#581845;font-size: 12px">
                                                <tr>
                                                    <th class="align-middle">No</th>
                                                    <th class="align-middle" colspan="2">Quality Standard</th>
                                                    <th class="align-middle">Biologycal Oxygen Demand</th>
                                                    <th class="align-middle">Dissolved Oxygen</th>
                                                    <th class="align-middle">Oil & Grease</th>
                                                    <th class="align-middle">Surfactant</th>
                                                    <th class="align-middle">Total Phenol</th>
                                                    <th class="align-middle">Hydrocarbon</th>
                                                    <th class="align-middle">Tributyl Tin</th>
                                                    <th class="align-middle">Total Poly Chlor Biphenyl</th>
                                                    <th class="align-middle">Poly Aromatic Hydrocarbon</th>
                                                    <th class="align-middle">Total Pesticides as Organo Chlorine Pesticides</th>
                                                    <th class="align-middle">Benzene Hexa Chloride</th>
                                                    <th class="align-middle">Endrin</th>
                                                    <th class="align-middle">Dichloro Diphenyl Trichloroethane</th>
                                                    <th class="align-middle">Total Petroleum Hydrocarbons</th>
                                                </tr>
                                                @php
                                                $no = 1 + ($QualityStandard->currentPage() - 1) * $QualityStandard->perPage();
                                                @endphp
                                                @foreach($QualityStandard as $standard)
                                                <tr style="background-color: #eee8cd">
                                                    <td>{{$no++}}</td>
                                                    <th class="align-middle" colspan="2">{{$standard->nama}}</th>
                                                    <td>{{$standard->biologycal_oxygen_demand}}</td>
                                                    <td>{{$standard->dissolved_oxygen}}</td>
                                                    <td>{{$standard->oil_grease}}</td>
                                                    <td>{{$standard->surfactant}}</td>
                                                    <td>{{$standard->total_phenol}}</td>
                                                    <td>{{$standard->hydrocarbon}}</td>
                                                    <td>{{$standard->tributyl_tin}}</td>
                                                    <td>{{$standard->total_poly_chlor_biphenyl}}</td>
                                                    <td>{{$standard->poly_aromatic_hydrocarbon}}</td>
                                                    <td>{{$standard->total_pesticides_as_organo_chlorine_pesticides}}</td>
                                                    <td>{{$standard->benzene_hexa_chloride}}</td>
                                                    <td>{{$standard->endrin}}</td>
                                                    <td>{{$standard->dichloro_diphenyl_trichloroethane}}</td>
                                                    <td>{{$standard->total_petroleum_hydrocarbons}}</td>
                                                </tr>
                                                @endforeach
                                            </thead>
                                            <tbody style="text-align:center">
                                                @php
                                                $no = 1 + ($MarineSurfacewater->currentPage() - 1) * $MarineSurfacewater->perPage();
                                                @endphp
                                                <tr style="background-color: #b3dbf6;font-size: 10px">
                                                    <th class="align-middle">*</th>
                                                    <th class="align-middle">Name</th>
                                                    <th class="align-middle">Date</th>
                                                    <th colspan="14">Data Entry</th>
                                                </tr>
                                                @foreach($MarineSurfacewater as $item)
                                                <tr style=" color:#581845;font-size: 12px">
                                                    <td>{{$no++}}</td>
                                                    <td>{{$item->PointId->nama}}</td>
                                                    <td style="width: 80px">{{date('d-m-Y',strtotime($item->date))}}</td>
                                                    <td>{{$item->biologycal_oxygen_demand}}</td>
                                                    <td>{{$item->dissolved_oxygen}}</td>
                                                    <td>{{$item->oil_grease}}</td>
                                                    <td>{{$item->surfactant}}</td>
                                                    <td>{{$item->total_phenol}}</td>
                                                    <td>{{$item->hydrocarbon}}</td>
                                                    <td>{{$item->tributyl_tin}}</td>
                                                    <td>{{$item->total_poly_chlor_biphenyl}}</td>
                                                    <td>{{$item->poly_aromatic_hydrocarbon}}</td>
                                                    <td>{{$item->total_pesticides_as_organo_chlorine_pesticides}}</td>
                                                    <td>{{$item->benzene_hexa_chloride}}</td>
                                                    <td>{{$item->endrin}}</td>
                                                    <td>{{$item->dichloro_diphenyl_trichloroethane}}</td>
                                                    <td>{{$item->total_petroleum_hydrocarbons}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <div class="card-tools row form-inline">
                                            <div class="col-4">
                                                <div class="d-flex justify-content-start">
                                                    <small>Showing {{ $MarineSurfacewater->firstItem() }} to
                                                        {{ $MarineSurfacewater->lastItem() }} of {{ $MarineSurfacewater->total() }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div style="font-size: 8" class="d-flex justify-content-end">
                                                    {{ $MarineSurfacewater->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @else
                        <p class="text-center pt-4 fs-4">Not Data Found</p>
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
                                    <form action="/import/marinesurfacewater" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="custom-file">
                                                <input type="file" name="file" class="custom-file-input  @error('file') is-invalid @enderror" id="exampleInputFile" required>
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                @error('file')
                                                <span class=" invalid-feedback ">{{ $message }}</span>
                                                @enderror
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
        </div>
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@section('footer')
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })
        $('#timepicker2').datetimepicker({
            format: 'LT'
        })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() {
            myDropzone.enqueueFile(file)
        }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }
</script>
@endsection
<script>
    function previewImage() {
        const image = document.querySelector('#hard_copy');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection