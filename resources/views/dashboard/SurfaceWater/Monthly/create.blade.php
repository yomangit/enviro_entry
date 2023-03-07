@extends('dashboard.layouts.main')
@section('container')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$tittle}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/surfacewater/monthly">{{$tittle}}</a></li>
                        <li class="breadcrumb-item active">Input Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline m-2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    <h3 class="card-title">
                        Form Create
                    </h3>
                </div>
                <div class="card-body">

                    <form action="/surfacewater/monthly" method="post" checked enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="tab-content" id="custom-content-below-tabContent">
                            <div class="row">
                                <div class="col-12 col-md-4 col-sm-10">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Point ID</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control-sm " value="{{ old('codesample_id') }}" name="codesample_id" @error('codesample_id') is-invalid @enderror>
                                                <option value="" selected disabled>--SELECT--</option>
                                                @foreach ($code_units as $code)
                                                @if (old('codesample_id')==$code->id)
                                                <option value="{{$code->id}}" selected>{{$code->nama}}</option>
                                                @else
                                                <option value="{{$code->id}}">{{$code->nama}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('codesample_id')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-sm-10">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Quality Standard</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control-sm " value="{{ old('standard_id') }}" name="standard_id" @error('standard_id') is-invalid @enderror>
                                                <option value="" selected disabled>--SELECT--</option>
                                                @foreach ($MonthStandard as $code)
                                                @if (old('standard_id')==$code->id)
                                                <option value="{{$code->id}}" selected>{{$code->name}}</option>
                                                @else
                                                <option value="{{$code->id}}">{{$code->name}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('standard_id')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-sm-10">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Date</label>
                                        <div class="col-sm-7">
                                            <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                                                <input type="text" name="date" class="form-control datetimepicker-input form-control-sm @error('date') is-invalid @enderror " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ old('date') }}" />
                                                @error('date')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <ul class="nav nav-tabs mb-2" id="custom-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-content-below-Physical-tab" data-toggle="pill" href="#custom-content-below-Physical" role="tab" aria-controls="custom-content-below-Physical" aria-selected="true">Physical-Chemical</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-Anions-tab" data-toggle="pill" href="#custom-content-below-Anions" role="tab" aria-controls="custom-content-below-Anions" aria-selected="false">Anions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-Cyanide-tab" data-toggle="pill" href="#custom-content-below-Cyanide" role="tab" aria-controls="custom-content-below-Cyanide" aria-selected="false">Cyanide</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-Nutrients-tab" data-toggle="pill" href="#custom-content-below-Nutrients" role="tab" aria-controls="custom-content-below-Nutrients" aria-selected="false">Nutrients</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-Dissolved-tab" data-toggle="pill" href="#custom-content-below-Dissolved" role="tab" aria-controls="custom-content-below-Dissolved" aria-selected="false">Dissolved Metals</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-Total-tab" data-toggle="pill" href="#custom-content-below-Total" role="tab" aria-controls="custom-content-below-Total" aria-selected="false">Total Metals</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-Organic-tab" data-toggle="pill" href="#custom-content-below-Organic" role="tab" aria-controls="custom-content-below-Organic" aria-selected="false">Organic</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-Microbiology-tab" data-toggle="pill" href="#custom-content-below-Microbiology" role="tab" aria-controls="custom-content-below-Microbiology" aria-selected="false">Microbiology</a>
                                </li>
                            </ul>

                            <div class="tab-pane fade show active" id="custom-content-below-Physical" role="tabpanel" aria-labelledby="custom-content-below-Physical-tab">
                                <div class="row m-2 ">
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Conductivity</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="conductivity" value="{{old("conductivity") }}" class=" @error('conductivity') is-invalid @enderror form-control form-control-sm">
                                                @error('conductivity')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Total Dissolved Solids (TDS)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="total_dissolved_solids_tds" value="{{old("total_dissolved_solids_tds") }}" class=" @error('total_dissolved_solids_tds') is-invalid @enderror form-control form-control-sm">
                                                @error('total_dissolved_solids_tds')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Total Suspended Solids (TSS)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="total_suspended_solids_tss" value="{{old("total_suspended_solids_tss") }}" class=" @error('total_suspended_solids_tss') is-invalid @enderror form-control form-control-sm">
                                                @error('total_suspended_solids_tss')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Turbidity</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="turbidity" value="{{old("turbidity") }}" class=" @error('turbidity') is-invalid @enderror form-control form-control-sm">
                                                @error('turbidity')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Hardness</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="hardness" value="{{old("hardness") }}" class=" @error('hardness') is-invalid @enderror form-control form-control-sm">
                                                @error('hardness')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Temperature </label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="temperature" value="{{old("temperature") }}" class=" @error('temperature') is-invalid @enderror form-control form-control-sm">
                                                @error('temperature')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Colour </label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="colour" value="{{old("colour") }}" class=" @error('colour') is-invalid @enderror form-control form-control-sm">
                                                @error('colour')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Salinity</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="salinity" value="{{old("salinity") }}" class=" @error('salinity') is-invalid @enderror form-control form-control-sm">
                                                @error('salinity')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Alkalinity (as CaCo3)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="alkalinity_as_caco3" value="{{old("alkalinity_as_caco3") }}" class=" @error('alkalinity_as_caco3') is-invalid @enderror form-control form-control-sm">
                                                @error('alkalinity_as_caco3')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Dissolved Oxygen (DO)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="dissolved_oxygen_do" value="{{old("dissolved_oxygen_do") }}" class=" @error('dissolved_oxygen_do') is-invalid @enderror form-control form-control-sm">
                                                @error('dissolved_oxygen_do')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Alkalinity - Total</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="alkalinity_total" value="{{old("alkalinity_total") }}" class=" @error('alkalinity_total') is-invalid @enderror form-control form-control-sm">
                                                @error('alkalinity_total')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Alkalinity-Carbonate</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="alkalinitycarbonate" value="{{old("alkalinitycarbonate") }}" class=" @error('alkalinitycarbonate') is-invalid @enderror form-control form-control-sm">
                                                @error('alkalinitycarbonate')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Alkalinity-Bicarbonate</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="alkalinitybicarbonate" value="{{old("alkalinitybicarbonate") }}" class=" @error('alkalinitybicarbonate') is-invalid @enderror form-control form-control-sm">
                                                @error('alkalinitybicarbonate')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-below-Anions" role="tabpanel" aria-labelledby="custom-content-below-Anions-tab">
                                <div class="row m-2 ">
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">pH</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="ph" value="{{old("ph") }}" class=" @error('ph') is-invalid @enderror form-control form-control-sm">
                                                @error('ph')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Chloride (Cl)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="chloride_cl" value="{{old("chloride_cl") }}" class=" @error('chloride_cl') is-invalid @enderror form-control form-control-sm">
                                                @error('chloride_cl')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Free Chlorine</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="free_chlorine" value="{{old("free_chlorine") }}" class=" @error('free_chlorine') is-invalid @enderror form-control form-control-sm">
                                                @error('free_chlorine')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Fluoride (F)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="fluoride_f" value="{{old("fluoride_f") }}" class=" @error('fluoride_f') is-invalid @enderror form-control form-control-sm">
                                                @error('fluoride_f')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Sulphate (SO4)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="sulphate_so4" value="{{old("sulphate_so4") }}" class=" @error('sulphate_so4') is-invalid @enderror form-control form-control-sm">
                                                @error('sulphate_so4')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Sulphite (H2S)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="sulphite_h2s" value="{{old("sulphite_h2s") }}" class=" @error('sulphite_h2s') is-invalid @enderror form-control form-control-sm">
                                                @error('sulphite_h2s')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-below-Cyanide" role="tabpanel" aria-labelledby="custom-content-below-Cyanide-tab">
                                <div class="row m-2 ">
                                    <div class="col-12 col-md-4 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Free Cyanide (FCN)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="free_cyanide_fcn" value="{{old("free_cyanide_fcn") }}" class=" @error('free_cyanide_fcn') is-invalid @enderror form-control form-control-sm">
                                                @error('free_cyanide_fcn')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Total Cyanide (CN Tot)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="total_cyanide_cn_tot" value="{{old("total_cyanide_cn_tot") }}" class=" @error('total_cyanide_cn_tot') is-invalid @enderror form-control form-control-sm">
                                                @error('total_cyanide_cn_tot')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">WAD Cyanide (CN Wad)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="wad_cyanide_cn_wad" value="{{old("wad_cyanide_cn_wad") }}" class=" @error('wad_cyanide_cn_wad') is-invalid @enderror form-control form-control-sm">
                                                @error('wad_cyanide_cn_wad')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-below-Nutrients" role="tabpanel" aria-labelledby="custom-content-below-Nutrients-tab">
                                <div class="row m-2 ">
                                    <div class="col-12 col-md-4 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Ammonium (NH4)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="ammonium_nh4" value="{{old("ammonium_nh4") }}" class=" @error('ammonium_nh4') is-invalid @enderror form-control form-control-sm">
                                                @error('ammonium_nh4')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Ammonia (N-NH3)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="ammonia_nnh3" value="{{old("ammonia_nnh3") }}" class=" @error('ammonia_nnh3') is-invalid @enderror form-control form-control-sm">
                                                @error('ammonia_nnh3')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Nitrate (NO3)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="nitrate_no3" value="{{old("nitrate_no3") }}" class=" @error('nitrate_no3') is-invalid @enderror form-control form-control-sm">
                                                @error('nitrate_no3')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Nitrite (NO2)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="nitrite_no2" value="{{old("nitrite_no2") }}" class=" @error('nitrite_no2') is-invalid @enderror form-control form-control-sm">
                                                @error('nitrite_no2')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Phosphate (PO4)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="phosphate_po4" value="{{old("phosphate_po4") }}" class=" @error('phosphate_po4') is-invalid @enderror form-control form-control-sm">
                                                @error('phosphate_po4')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Total Nitrogen</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="total_nitrogen" value="{{old("total_nitrogen") }}" class=" @error('total_nitrogen') is-invalid @enderror form-control form-control-sm">
                                                @error('total_nitrogen')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-below-Dissolved" role="tabpanel" aria-labelledby="custom-content-below-Dissolved-tab">
                                <div class="row m-2 ">
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Aluminium (Al)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="aluminium_al" value="{{old("aluminium_al") }}" class=" @error('aluminium_al') is-invalid @enderror form-control form-control-sm">
                                                @error('aluminium_al')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Antimony (Sb)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="antimony_sb" value="{{old("antimony_sb") }}" class=" @error('antimony_sb') is-invalid @enderror form-control form-control-sm">
                                                @error('antimony_sb')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Arsenic (As)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="arsenic_as" value="{{old("arsenic_as") }}" class=" @error('arsenic_as') is-invalid @enderror form-control form-control-sm">
                                                @error('arsenic_as')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Barium (Ba)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="barium_ba" value="{{old("barium_ba") }}" class=" @error('barium_ba') is-invalid @enderror form-control form-control-sm">
                                                @error('barium_ba')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Boron (B)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="boron_b" value="{{old("boron_b") }}" class=" @error('boron_b') is-invalid @enderror form-control form-control-sm">
                                                @error('boron_b')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Calcium (Ca</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="calcium_ca" value="{{old("calcium_ca") }}" class=" @error('calcium_ca') is-invalid @enderror form-control form-control-sm">
                                                @error('calcium_ca')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Cadmium (Cd)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="cadmium_cd" value="{{old("cadmium_cd") }}" class=" @error('cadmium_cd') is-invalid @enderror form-control form-control-sm">
                                                @error('cadmium_cd')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Chromium (Cr)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="chromium_cr" value="{{old("chromium_cr") }}" class=" @error('chromium_cr') is-invalid @enderror form-control form-control-sm">
                                                @error('chromium_cr')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Chromium Hexavalent (Cr6+)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="chromium_hexavalent_cr6" value="{{old("chromium_hexavalent_cr6") }}" class=" @error('chromium_hexavalent_cr6') is-invalid @enderror form-control form-control-sm">
                                                @error('chromium_hexavalent_cr6')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Cobalt (Co)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="cobalt_co" value="{{old("cobalt_co") }}" class=" @error('cobalt_co') is-invalid @enderror form-control form-control-sm">
                                                @error('cobalt_co')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Copper (Cu)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="copper_cu" value="{{old("copper_cu") }}" class=" @error('copper_cu') is-invalid @enderror form-control form-control-sm">
                                                @error('copper_cu')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Iron (Fe)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="iron_fe" value="{{old("iron_fe") }}" class=" @error('iron_fe') is-invalid @enderror form-control form-control-sm">
                                                @error('iron_fe')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Lead (Pb)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="lead_pb" value="{{old("lead_pb") }}" class=" @error('lead_pb') is-invalid @enderror form-control form-control-sm">
                                                @error('lead_pb')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Magnesium (Mg)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="magnesium_mg" value="{{old("magnesium_mg") }}" class=" @error('magnesium_mg') is-invalid @enderror form-control form-control-sm">
                                                @error('magnesium_mg')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Manganese (Mn)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="manganese_mn" value="{{old("manganese_mn") }}" class=" @error('manganese_mn') is-invalid @enderror form-control form-control-sm">
                                                @error('manganese_mn')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Mercury (Hg)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="mercury_hg" value="{{old("mercury_hg") }}" class=" @error('mercury_hg') is-invalid @enderror form-control form-control-sm">
                                                @error('mercury_hg')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Nickel (Ni)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="nickel_ni" value="{{old("nickel_ni") }}" class=" @error('nickel_ni') is-invalid @enderror form-control form-control-sm">
                                                @error('nickel_ni')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Selenium (Se)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="selenium_se" value="{{old("selenium_se") }}" class=" @error('selenium_se') is-invalid @enderror form-control form-control-sm">
                                                @error('selenium_se')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Silver (Ag)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="silver_ag" value="{{old("silver_ag") }}" class=" @error('silver_ag') is-invalid @enderror form-control form-control-sm">
                                                @error('silver_ag')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Sodium (Na)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="sodium_na" value="{{old("sodium_na") }}" class=" @error('sodium_na') is-invalid @enderror form-control form-control-sm">
                                                @error('sodium_na')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Zinc (Zn)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="zinc_zn" value="{{old("zinc_zn") }}" class=" @error('zinc_zn') is-invalid @enderror form-control form-control-sm">
                                                @error('zinc_zn')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-below-Total" role="tabpanel" aria-labelledby="custom-content-below-Total-tab">
                                <div class="row m-2 ">
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Aluminium (T-Al)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="aluminium_tal" value="{{old("aluminium_tal") }}" class=" @error('aluminium_tal') is-invalid @enderror form-control form-control-sm">
                                                @error('aluminium_tal')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Arsenic (As)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="arsenic_tas" value="{{old("arsenic_tas") }}" class=" @error('arsenic_tas') is-invalid @enderror form-control form-control-sm">
                                                @error('arsenic_tas')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Cadmium (T-Cd)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="cadmium_tcd" value="{{old("cadmium_tcd") }}" class=" @error('cadmium_tcd') is-invalid @enderror form-control form-control-sm">
                                                @error('cadmium_tcd')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Chromium Hexavalent (T-Cr6+)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="chromium_hexavalent_tcr6" value="{{old("chromium_hexavalent_tcr6") }}" class=" @error('chromium_hexavalent_tcr6') is-invalid @enderror form-control form-control-sm">
                                                @error('chromium_hexavalent_tcr6')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Chromium (T-Cr)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="chromium_tcr" value="{{old("chromium_tcr") }}" class=" @error('chromium_tcr') is-invalid @enderror form-control form-control-sm">
                                                @error('chromium_tcr')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Cobalt (T-Co)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="cobalt_tco" value="{{old("cobalt_tco") }}" class=" @error('cobalt_tco') is-invalid @enderror form-control form-control-sm">
                                                @error('cobalt_tco')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Copper (T-Cu)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="copper_tcu" value="{{old("copper_tcu") }}" class=" @error('copper_tcu') is-invalid @enderror form-control form-control-sm">
                                                @error('copper_tcu')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Iron (T-Fe)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="iron_tfe" value="{{old("iron_tfe") }}" class=" @error('iron_tfe') is-invalid @enderror form-control form-control-sm">
                                                @error('iron_tfe')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Lead (T-Pb)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="lead_tpb" value="{{old("lead_tpb") }}" class=" @error('lead_tpb') is-invalid @enderror form-control form-control-sm">
                                                @error('lead_tpb')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Selenium (T-Se)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="selenium_tse" value="{{old("selenium_tse") }}" class=" @error('selenium_tse') is-invalid @enderror form-control form-control-sm">
                                                @error('selenium_tse')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Mercury (T-Hg)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="mercury_thg" value="{{old("mercury_thg") }}" class=" @error('mercury_thg') is-invalid @enderror form-control form-control-sm">
                                                @error('mercury_thg')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Nickel (T-Ni)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="nickel_tni" value="{{old("nickel_tni") }}" class=" @error('nickel_tni') is-invalid @enderror form-control form-control-sm">
                                                @error('nickel_tni')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Zinc (T-Zn)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="zinc_tzn" value="{{old("zinc_tzn") }}" class=" @error('zinc_tzn') is-invalid @enderror form-control form-control-sm">
                                                @error('zinc_tzn')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-below-Organic" role="tabpanel" aria-labelledby="custom-content-below-Organic-tab">
                                <div class="row m-2 ">

                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">BOD</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="bod" value="{{old("bod") }}" class=" @error('bod') is-invalid @enderror form-control form-control-sm">
                                                @error('bod')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">COD</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="cod" value="{{old("cod") }}" class=" @error('cod') is-invalid @enderror form-control form-control-sm">
                                                @error('cod')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Oil and Grease</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="oil_and_grease" value="{{old("oil_and_grease") }}" class=" @error('oil_and_grease') is-invalid @enderror form-control form-control-sm">
                                                @error('oil_and_grease')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Phenols</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="phenols" value="{{old("phenols") }}" class=" @error('phenols') is-invalid @enderror form-control form-control-sm">
                                                @error('phenols')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Surfactant (MBAS)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="surfactant_mbas" value="{{old("surfactant_mbas") }}" class=" @error('surfactant_mbas') is-invalid @enderror form-control form-control-sm">
                                                @error('surfactant_mbas')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Benzene Hexa Chloride (BHC</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="benzene_hexa_chloride_bhc" value="{{old("benzene_hexa_chloride_bhc") }}" class=" @error('benzene_hexa_chloride_bhc') is-invalid @enderror form-control form-control-sm">
                                                @error('benzene_hexa_chloride_bhc')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Endrin</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="endrin" value="{{old("endrin") }}" class=" @error('endrin') is-invalid @enderror form-control form-control-sm">
                                                @error('endrin')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Dichloro Diphenyl Trichloroethane (DDT)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="dichloro_diphenyl_trichloroethane_ddt" value="{{old("dichloro_diphenyl_trichloroethane_ddt") }}" class=" @error('dichloro_diphenyl_trichloroethane_ddt') is-invalid @enderror form-control form-control-sm">
                                                @error('dichloro_diphenyl_trichloroethane_ddt')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-below-Microbiology" role="tabpanel" aria-labelledby="custom-content-below-Microbiology-tab">
                                <div class="row m-2 ">
                                    <div class="col-12 col-md-4 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Fecal Coliform</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="fecal_coliform" value="{{old("fecal_coliform") }}" class=" @error('fecal_coliform') is-invalid @enderror form-control form-control-sm">
                                                @error('fecal_coliform')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">E-Coli</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="e_coli" value="{{old("e_coli") }}" class=" @error('e_coli') is-invalid @enderror form-control form-control-sm">
                                                @error('e_coli')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Total Coliform Bacteria</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="total_coliform_bacteria" value="{{old("total_coliform_bacteria") }}" class=" @error('total_coliform_bacteria') is-invalid @enderror form-control form-control-sm">
                                                @error('total_coliform_bacteria')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <button type="submit" class="btn btn-gradient btn-primary btn-xs">Create<i class="fa-solid fa-folder-plus ml-3"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection