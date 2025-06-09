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
                        <li class="breadcrumb-item"><a href="/groundwater/standard">{{$tittle}}</a></li>
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

                    <form action="/groundwater/standard/{{ $MonthStandard->id }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @method('put')
                    @csrf
                        <div class="tab-content" id="custom-content-below-tabContent">
                            <div class="col-12 col-md-6 col-sm-10 mb-2">
                                <div class="row ">
                                    <label for="inputPassword" class="  col-sm-2  col-form-label">Name</label>
                                    <div class="col-sm-6 ">
                                        <input type="text" name="nama" value="{{old("nama",$MonthStandard->nama) }}" class=" @error('nama') is-invalid @enderror form-control form-control-sm">
                                        @error('nama')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
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
                                                <input type="text" name="conductivity" value="{{old("conductivity",$MonthStandard->conductivity) }}" class=" @error('conductivity') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="total_dissolved_solids_tds" value="{{old("total_dissolved_solids_tds",$MonthStandard->total_dissolved_solids_tds) }}" class=" @error('total_dissolved_solids_tds') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="total_suspended_solids_tss" value="{{old("total_suspended_solids_tss",$MonthStandard->total_suspended_solids_tss) }}" class=" @error('total_suspended_solids_tss') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="turbidity" value="{{old("turbidity",$MonthStandard->turbidity) }}" class=" @error('turbidity') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="hardness" value="{{old("hardness",$MonthStandard->hardness) }}" class=" @error('hardness') is-invalid @enderror form-control form-control-sm">
                                                @error('hardness')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Alkalinity </label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="alkalinity" value="{{old("alkalinity",$MonthStandard->alkalinity) }}" class=" @error('alkalinity') is-invalid @enderror form-control form-control-sm">
                                                @error('alkalinity')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Temperature </label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="temperature" value="{{old("temperature",$MonthStandard->temperature) }}" class=" @error('temperature') is-invalid @enderror form-control form-control-sm">
                                                @error('temperature')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Salinity</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="salinity" value="{{old("salinity",$MonthStandard->salinity) }}" class=" @error('salinity') is-invalid @enderror form-control form-control-sm">
                                                @error('salinity')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Dissolved Oxygen (DO)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="dissolved_oxygen_do" value="{{old("dissolved_oxygen_do",$MonthStandard->dissolved_oxygen_do) }}" class=" @error('dissolved_oxygen_do') is-invalid @enderror form-control form-control-sm">
                                                @error('dissolved_oxygen_do')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Colour</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="colour" value="{{old("colour",$MonthStandard->colour) }}" class=" @error('colour') is-invalid @enderror form-control form-control-sm">
                                                @error('colour')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Odour</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="odour" value="{{old("odour",$MonthStandard->odour) }}" class=" @error('odour') is-invalid @enderror form-control form-control-sm">
                                                @error('odour')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Taste</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="taste" value="{{old("taste",$MonthStandard->taste) }}" class=" @error('taste') is-invalid @enderror form-control form-control-sm">
                                                @error('taste')
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
                                                <input type="text" name="ph" value="{{old("ph",$MonthStandard->ph) }}" class=" @error('ph') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="chloride_cl" value="{{old("chloride_cl",$MonthStandard->chloride_cl) }}" class=" @error('chloride_cl') is-invalid @enderror form-control form-control-sm">
                                                @error('chloride_cl')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Fluoride (F)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="fluoride_f" value="{{old("fluoride_f",$MonthStandard->fluoride_f) }}" class=" @error('fluoride_f') is-invalid @enderror form-control form-control-sm">
                                                @error('fluoride_f')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Residual Chlorine</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="residual_chlorine" value="{{old("residual_chlorine",$MonthStandard->residual_chlorine) }}" class=" @error('residual_chlorine') is-invalid @enderror form-control form-control-sm">
                                                @error('residual_chlorine')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Sulphate (SO4)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="sulphate_so4" value="{{old("sulphate_so4",$MonthStandard->sulphate_so4) }}" class=" @error('sulphate_so4') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="sulphite_h2s" value="{{old("sulphite_h2s",$MonthStandard->sulphite_h2s) }}" class=" @error('sulphite_h2s') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="free_cyanide_fcn" value="{{old("free_cyanide_fcn",$MonthStandard->free_cyanide_fcn) }}" class=" @error('free_cyanide_fcn') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="total_cyanide_cn_tot" value="{{old("total_cyanide_cn_tot",$MonthStandard->total_cyanide_cn_tot) }}" class=" @error('total_cyanide_cn_tot') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="wad_cyanide_cn_wad" value="{{old("wad_cyanide_cn_wad",$MonthStandard->wad_cyanide_cn_wad) }}" class=" @error('wad_cyanide_cn_wad') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="ammonium_nh4" value="{{old("ammonium_nh4",$MonthStandard->ammonium_nh4) }}" class=" @error('ammonium_nh4') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="ammonia_n_nh3" value="{{old("ammonia_n_nh3",$MonthStandard->ammonia_n_nh3) }}" class=" @error('ammonia_n_nh3') is-invalid @enderror form-control form-control-sm">
                                                @error('ammonia_n_nh3')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Nitrate (NO3)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="nitrate_no3" value="{{old("nitrate_no3",$MonthStandard->nitrate_no3) }}" class=" @error('nitrate_no3') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="nitrite_no2" value="{{old("nitrite_no2",$MonthStandard->nitrite_no2) }}" class=" @error('nitrite_no2') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="phosphate_po4" value="{{old("phosphate_po4",$MonthStandard->phosphate_po4) }}" class=" @error('phosphate_po4') is-invalid @enderror form-control form-control-sm">
                                                @error('phosphate_po4')
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
                                                <input type="text" name="aluminium_al" value="{{old("aluminium_al",$MonthStandard->aluminium_al) }}" class=" @error('aluminium_al') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="antimony_sb" value="{{old("antimony_sb",$MonthStandard->antimony_sb) }}" class=" @error('antimony_sb') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="arsenic_as" value="{{old("arsenic_as",$MonthStandard->arsenic_as) }}" class=" @error('arsenic_as') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="barium_ba" value="{{old("barium_ba",$MonthStandard->barium_ba) }}" class=" @error('barium_ba') is-invalid @enderror form-control form-control-sm">
                                                @error('barium_ba')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Cadmium (Cd)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="cadmium_cd" value="{{old("cadmium_cd",$MonthStandard->cadmium_cd) }}" class=" @error('cadmium_cd') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="chromium_cr" value="{{old("chromium_cr",$MonthStandard->chromium_cr) }}" class=" @error('chromium_cr') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="chromium_hexavalent_cr6" value="{{old("chromium_hexavalent_cr6",$MonthStandard->chromium_hexavalent_cr6) }}" class=" @error('chromium_hexavalent_cr6') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="cobalt_co" value="{{old("cobalt_co",$MonthStandard->cobalt_co) }}" class=" @error('cobalt_co') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="copper_cu" value="{{old("copper_cu",$MonthStandard->copper_cu) }}" class=" @error('copper_cu') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="iron_fe" value="{{old("iron_fe",$MonthStandard->iron_fe) }}" class=" @error('iron_fe') is-invalid @enderror form-control form-control-sm">
                                                @error('iron_fe')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Manganese (Mn)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="manganese_mn" value="{{old("manganese_mn",$MonthStandard->manganese_mn) }}" class=" @error('manganese_mn') is-invalid @enderror form-control form-control-sm">
                                                @error('manganese_mn')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Lead (Pb)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="lead_pb" value="{{old("lead_pb",$MonthStandard->lead_pb) }}" class=" @error('lead_pb') is-invalid @enderror form-control form-control-sm">
                                                @error('lead_pb')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Mercury (Hg)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="mercury_hg" value="{{old("mercury_hg",$MonthStandard->mercury_hg) }}" class=" @error('mercury_hg') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="nickel_ni" value="{{old("nickel_ni",$MonthStandard->nickel_ni) }}" class=" @error('nickel_ni') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="selenium_se" value="{{old("selenium_se",$MonthStandard->selenium_se) }}" class=" @error('selenium_se') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="silver_ag" value="{{old("silver_ag",$MonthStandard->silver_ag) }}" class=" @error('silver_ag') is-invalid @enderror form-control form-control-sm">
                                                @error('silver_ag')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Zinc (Zn)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="zinc_zn" value="{{old("zinc_zn",$MonthStandard->zinc_zn) }}" class=" @error('zinc_zn') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="aluminium_t_al" value="{{old("aluminium_t_al",$MonthStandard->aluminium_t_al) }}" class=" @error('aluminium_t_al') is-invalid @enderror form-control form-control-sm">
                                                @error('aluminium_t_al')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Arsenic (As)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="arsenic_t_as" value="{{old("arsenic_t_as",$MonthStandard->arsenic_t_as) }}" class=" @error('arsenic_t_as') is-invalid @enderror form-control form-control-sm">
                                                @error('arsenic_t_as')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Cadmium (T-Cd)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="cadmium_t_cd" value="{{old("cadmium_t_cd",$MonthStandard->cadmium_t_cd) }}" class=" @error('cadmium_t_cd') is-invalid @enderror form-control form-control-sm">
                                                @error('cadmium_t_cd')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Chromium Hexavalent (T-Cr6+)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="chromium_hexavalent_t_cr6" value="{{old("chromium_hexavalent_t_cr6",$MonthStandard->chromium_hexavalent_t_cr6) }}" class=" @error('chromium_hexavalent_t_cr6') is-invalid @enderror form-control form-control-sm">
                                                @error('chromium_hexavalent_t_cr6')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Chromium (T-Cr)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="chromium_t_cr" value="{{old("chromium_t_cr",$MonthStandard->chromium_t_cr) }}" class=" @error('chromium_t_cr') is-invalid @enderror form-control form-control-sm">
                                                @error('chromium_t_cr')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Cobalt (T-Co)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="cobalt_t_co" value="{{old("cobalt_t_co",$MonthStandard->cobalt_t_co) }}" class=" @error('cobalt_t_co') is-invalid @enderror form-control form-control-sm">
                                                @error('cobalt_t_co')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Copper (T-Cu)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="copper_t_cu" value="{{old("copper_t_cu",$MonthStandard->copper_t_cu) }}" class=" @error('copper_t_cu') is-invalid @enderror form-control form-control-sm">
                                                @error('copper_t_cu')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Lead (T-Pb)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="lead_t_pb" value="{{old("lead_t_pb",$MonthStandard->lead_t_pb) }}" class=" @error('lead_t_pb') is-invalid @enderror form-control form-control-sm">
                                                @error('lead_t_pb')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Selenium (T-Se)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="selenium_t_se" value="{{old("selenium_t_se",$MonthStandard->selenium_t_se) }}" class=" @error('selenium_t_se') is-invalid @enderror form-control form-control-sm">
                                                @error('selenium_t_se')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Mercury (T-Hg)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="mercury_t_hg" value="{{old("mercury_t_hg",$MonthStandard->mercury_t_hg) }}" class=" @error('mercury_t_hg') is-invalid @enderror form-control form-control-sm">
                                                @error('mercury_t_hg')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Nickel (T-Ni)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="nickel_t_ni" value="{{old("nickel_t_ni",$MonthStandard->nickel_t_ni) }}" class=" @error('nickel_t_ni') is-invalid @enderror form-control form-control-sm">
                                                @error('nickel_t_ni')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Zinc (T-Zn)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="zinc_t_zn" value="{{old("zinc_t_zn",$MonthStandard->zinc_t_zn) }}" class=" @error('zinc_t_zn') is-invalid @enderror form-control form-control-sm">
                                                @error('zinc_t_zn')
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
                                                <input type="text" name="bod" value="{{old("bod",$MonthStandard->bod) }}" class=" @error('bod') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="cod" value="{{old("cod",$MonthStandard->cod) }}" class=" @error('cod') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="oil_and_grease" value="{{old("oil_and_grease",$MonthStandard->oil_and_grease) }}" class=" @error('oil_and_grease') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="phenols" value="{{old("phenols",$MonthStandard->phenols) }}" class=" @error('phenols') is-invalid @enderror form-control form-control-sm">
                                                @error('phenols')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Permanganate Number as KMnO4</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="permanganate_number_as_kmno4" value="{{old("permanganate_number_as_kmno4",$MonthStandard->permanganate_number_as_kmno4) }}" class=" @error('permanganate_number_as_kmno4') is-invalid @enderror form-control form-control-sm">
                                                @error('permanganate_number_as_kmno4')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Surfactant (MBAS)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="surfactant_mbas" value="{{old("surfactant_mbas",$MonthStandard->surfactant_mbas) }}" class=" @error('surfactant_mbas') is-invalid @enderror form-control form-control-sm">
                                                @error('surfactant_mbas')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Benzene</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="benzene" value="{{old("benzene",$MonthStandard->benzene) }}" class=" @error('benzene') is-invalid @enderror form-control form-control-sm">
                                                @error('benzene')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Chloroform</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="chloroform" value="{{old("chloroform",$MonthStandard->chloroform) }}" class=" @error('chloroform') is-invalid @enderror form-control form-control-sm">
                                                @error('chloroform')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $a='2_4_6_trichloropenol';
                                        $b='2_4_d';
                                    @endphp
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row ">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">2,4,6-trichloropenol</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="2_4_6_trichloropenol" value="{{old("2_4_6_trichloropenol",$MonthStandard->$a) }}" class=" @error('2_4_6_trichloropenol') is-invalid @enderror form-control form-control-sm">
                                                @error('2_4_6_trichloropenol')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">2,4-D</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="2_4_d" value="{{old("2_4_d",$MonthStandard->$b) }}" class=" @error('2_4_d') is-invalid @enderror form-control form-control-sm">
                                                @error('2_4_d')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Pentachlorophenol</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="pentachlorophenol" value="{{old("pentachlorophenol",$MonthStandard->pentachlorophenol) }}" class=" @error('pentachlorophenol') is-invalid @enderror form-control form-control-sm">
                                                @error('pentachlorophenol')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Total Pesticides</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="total_pesticides" value="{{old("total_pesticides",$MonthStandard->total_pesticides) }}" class=" @error('total_pesticides') is-invalid @enderror form-control form-control-sm">
                                                @error('total_pesticides')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Chlordane (Total Isomer)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="chlordane_total_isomer" value="{{old("chlordane_total_isomer",$MonthStandard->chlordane_total_isomer) }}" class=" @error('chlordane_total_isomer') is-invalid @enderror form-control form-control-sm">
                                                @error('chlordane_total_isomer')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Dieldrin)</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="dieldrin" value="{{old("dieldrin",$MonthStandard->dieldrin) }}" class=" @error('dieldrin') is-invalid @enderror form-control form-control-sm">
                                                @error('dieldrin')
                                                <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-10">
                                        <div class="row bg-brown">
                                            <label for="inputPassword" class="  col-sm-6  col-form-label">Aldrin</label>
                                            <div class="col-sm-6 ">
                                                <input type="text" name="aldrin" value="{{old("aldrin",$MonthStandard->aldrin) }}" class=" @error('aldrin') is-invalid @enderror form-control form-control-sm">
                                                @error('aldrin')
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
                                                <input type="text" name="fecal_coliform" value="{{old("fecal_coliform",$MonthStandard->fecal_coliform) }}" class=" @error('fecal_coliform') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="e_coli" value="{{old("e_coli",$MonthStandard->e_coli) }}" class=" @error('e_coli') is-invalid @enderror form-control form-control-sm">
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
                                                <input type="text" name="total_coliform_bacteria" value="{{old("total_coliform_bacteria",$MonthStandard->total_coliform_bacteria) }}" class=" @error('total_coliform_bacteria') is-invalid @enderror form-control form-control-sm">
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