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
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/surfacewater/marinesurfacewater">Home</a></li>
                        <li class="breadcrumb-item"><a href="/surfacewater/marinesurfacewater/quality">{{$tittle}}</a></li>
                        <li class="breadcrumb-item active">Create Data</li>
                    </ol>
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
                    <div class="alert alert-success alert-dismissible form-inline">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                   <div class="card-title ml-2">Form Input</div>
                </div>

                <div class="card-body">
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
                    <form action="/surfacewater/marinesurfacewater/quality" method="post" checked enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class=" ml-2 col-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group row">
                                    <label style="font-size: 10px" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input name="nama" type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" value="{{ old('nama') }}" />
                                        @error('nama')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>


                        <div class="tab-content" id="custom-content-above-tabContent">

                            <div class="tab-pane fade show active" id="custom-content-above-Physical" role="tabpanel" aria-labelledby="custom-content-above-Physical-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Clarity</label>
                                                        <div class="col-sm-5">
                                                            <input name="clarity" type="text" class="form-control form-control-sm @error('clarity') is-invalid @enderror" value="{{ old('clarity') }}" />


                                                            @error('clarity')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror



                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            {{-- end conductivity --}}
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Temperature (Water)</label>
                                                        <div class="col-sm-5">
                                                            <input name="temperature_water" type="text" class="form-control form-control-sm @error('temperature_water') is-invalid @enderror" value="{{ old('temperature_water') }}" />
                                                            @error('temperature_water')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>

                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Garbage</label>
                                                        <div class="col-sm-5">
                                                            <input name="garbage" type="text" class="form-control form-control-sm @error('garbage') is-invalid @enderror" value="{{ old('garbage') }}" />


                                                            @error('garbage')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror



                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>

                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Oil Layer</label>
                                                        <div class="col-sm-5">
                                                            <input name="oil_ayer" type="text" class="form-control form-control-sm @error('oil_ayer') is-invalid @enderror" value="{{ old('oil_ayer') }}" />
                                                            @error('oil_ayer')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>

                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Odour</label>
                                                        <div class="col-sm-5">
                                                            <input name="odour" type="text" class="form-control form-control-sm @error('odour') is-invalid @enderror" value="{{ old('odour') }}" />
                                                            @error('odour')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Colour</label>
                                                        <div class="col-sm-5">
                                                            <input name="colour" type="text" class="form-control form-control-sm @error('colour') is-invalid @enderror" value="{{ old('colour') }}" />
                                                            @error('colour')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Turbidity</label>
                                                        <div class="col-sm-5">
                                                            <input name="turbidity" type="text" class="form-control form-control-sm @error('turbidity') is-invalid @enderror" value="{{ old('turbidity') }}" />
                                                            @error('turbidity')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total Suspended Solids</label>
                                                        <div class="col-sm-5">
                                                            <input name="total_suspended_solids" type="text" class="form-control form-control-sm @error('total_suspended_solids') is-invalid @enderror" value="{{ old('total_suspended_solids') }}" />
                                                            @error('total_suspended_solids')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Salinity in situ</label>
                                                        <div class="col-sm-5">
                                                            <input name="salinity_in_situ" type="text" class="form-control form-control-sm @error('salinity_in_situ') is-invalid @enderror" value="{{ old('salinity_in_situ') }}" />
                                                            @error('salinity_in_situ')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total Dissolved Solids</label>
                                                        <div class="col-sm-5">
                                                            <input name="total_dissolved_solids" type="text" class="form-control form-control-sm @error('total_dissolved_solids') is-invalid @enderror" value="{{ old('total_dissolved_solids') }}" />
                                                            @error('total_dissolved_solids')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Conductivity (Insitu)</label>
                                                        <div class="col-sm-5">
                                                            <input name="conductivity_insitu" type="text" class="form-control form-control-sm @error('conductivity_insitu') is-invalid @enderror" value="{{ old('conductivity_insitu') }}" />
                                                            @error('conductivity_insitu')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div><!-- end row -->

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-above-Anions" role="tabpanel" aria-labelledby="custom-content-above-Anions-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">PH</label>
                                                        <div class="col-sm-6">
                                                            <input name="ph" type="text" class="form-control form-control-sm @error('ph') is-invalid @enderror" value="{{ old('ph') }}" />
                                                            @error('ph')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Sulphide</label>
                                                        <div class="col-sm-6">
                                                            <input name="sulphide" type="text" class="form-control form-control-sm @error('sulphide') is-invalid @enderror" value="{{ old('sulphide') }}" />
                                                            @error('sulphide')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>

                                        </div><!-- end row -->

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-above-Nutrient" role="tabpanel" aria-labelledby="custom-content-above-Nutrient-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Ammonia (N-NH3)</label>
                                                        <div class="col-sm-5">
                                                            <input name="ammonia_n_nh3" type="text" class="form-control form-control-sm @error('ammonia_n_nh3') is-invalid @enderror" value="{{ old('ammonia_n_nh3') }}" />
                                                            @error('ammonia_n_nh3')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Nitrate (N-NO3)</label>
                                                        <div class="col-sm-5">
                                                            <input name="nitrate_n_no3" type="text" class="form-control form-control-sm @error('nitrate_n_no3') is-invalid @enderror" value="{{ old('nitrate_n_no3') }}" />
                                                            @error('nitrate_n_no3')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>

                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total-Phosphate (P-PO4)</label>
                                                        <div class="col-sm-5">
                                                            <input name="total_phosphate_p_po4" type="text" class="form-control form-control-sm @error('total_phosphate_p_po4') is-invalid @enderror" value="{{ old('total_phosphate_p_po4') }}" />
                                                            @error('total_phosphate_p_po4')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                        </div><!-- end row -->

                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="custom-content-above-Cyanide" role="tabpanel" aria-labelledby="custom-content-above-Cyanide-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Cyanide (Total)</label>
                                                        <div class="col-sm-6">
                                                            <input name="cyanide_total" type="text" class="form-control form-control-sm @error('cyanide_total') is-invalid @enderror" value="{{ old('cyanide_total') }}" />
                                                            @error('cyanide_total')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total Coliform</label>
                                                        <div class="col-sm-6">
                                                            <input name="total_coliform" type="text" class="form-control form-control-sm @error('total_coliform') is-invalid @enderror" value="{{ old('total_coliform') }}" />
                                                            @error('total_coliform')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                        </div><!-- end row -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="custom-content-above-Metal" role="tabpanel" aria-labelledby="custom-content-above-Metal-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Chromium Hexavalent-Total(Cr-VI)</label>
                                                        <div class="col-sm-5">
                                                            <input name="chromium_hexavalent_total_cr_vi" type="text" class="form-control form-control-sm @error('chromium_hexavalent_total_cr_vi') is-invalid @enderror" value="{{ old('chromium_hexavalent_total_cr_vi') }}" />
                                                            @error('chromium_hexavalent_total_cr_vi')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            {{-- end conductivity --}}
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Arsenic-Hydrid Dissolved (As)</label>
                                                        <div class="col-sm-5">
                                                            <input name="arsenic_hydrid_dissolved_as" type="text" class="form-control form-control-sm @error('arsenic_hydrid_dissolved_as') is-invalid @enderror" value="{{ old('arsenic_hydrid_dissolved_as') }}" />
                                                            @error('arsenic_hydrid_dissolved_as')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>

                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Boron-Dissolved (B)</label>
                                                        <div class="col-sm-5">
                                                            <input name="boron_dissolved_b" type="text" class="form-control form-control-sm @error('boron_dissolved_b') is-invalid @enderror" value="{{ old('boron_dissolved_b') }}" />
                                                            @error('boron_dissolved_b')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>

                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Cadmium-Dissolved (Cd)</label>
                                                        <div class="col-sm-5">
                                                            <input name="cadmium_dissolved_cd" type="text" class="form-control form-control-sm @error('cadmium_dissolved_cd') is-invalid @enderror" value="{{ old('cadmium_dissolved_cd') }}" />
                                                            @error('cadmium_dissolved_cd')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>

                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Copper-Dissolved (Cu)</label>
                                                        <div class="col-sm-5">
                                                            <input name="copper_dissolved_cu" type="text" class="form-control form-control-sm @error('copper_dissolved_cu') is-invalid @enderror" value="{{ old('copper_dissolved_cu') }}" />
                                                            @error('copper_dissolved_cu')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Lead-Dissolved (Pb)</label>
                                                        <div class="col-sm-5">
                                                            <input name="lead_dissolved_pb" type="text" class="form-control form-control-sm @error('lead_dissolved_pb') is-invalid @enderror" value="{{ old('lead_dissolved_pb') }}" />
                                                            @error('lead_dissolved_pb')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Nickel-Dissolved (Ni)</label>
                                                        <div class="col-sm-5">
                                                            <input name="nickel_dissolved_ni" type="text" class="form-control form-control-sm @error('nickel_dissolved_ni') is-invalid @enderror" value="{{ old('nickel_dissolved_ni') }}" />
                                                            @error('nickel_dissolved_ni')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Zinc-Dissolved (Zn)</label>
                                                        <div class="col-sm-5">
                                                            <input name="zinc_dissolved_zn" type="text" class="form-control form-control-sm @error('zinc_dissolved_zn') is-invalid @enderror" value="{{ old('zinc_dissolved_zn') }}" />
                                                            @error('zinc_dissolved_zn')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Mercury-Dissolved (Hg)</label>
                                                        <div class="col-sm-5">
                                                            <input name="mercury_dissolved_hg" type="text" class="form-control form-control-sm @error('mercury_dissolved_hg') is-invalid @enderror" value="{{ old('mercury_dissolved_hg') }}" />
                                                            @error('mercury_dissolved_hg')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            {{-- end conductivity --}}
                                           



                                        </div><!-- end row -->

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-above-Organics" role="tabpanel" aria-labelledby="custom-content-above-Organics-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Biologycal Oxygen Demand</label>
                                                        <div class="col-sm-5">
                                                            <input name="biologycal_oxygen_demand" type="text" class="form-control form-control-sm @error('biologycal_oxygen_demand') is-invalid @enderror" value="{{ old('biologycal_oxygen_demand') }}" />
                                                            @error('biologycal_oxygen_demand')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Dissolved Oxygen</label>
                                                        <div class="col-sm-5">
                                                            <input name="dissolved_oxygen" type="text" class="form-control form-control-sm @error('dissolved_oxygen') is-invalid @enderror" value="{{ old('dissolved_oxygen') }}" />
                                                            @error('dissolved_oxygen')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>

                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Oil & Grease</label>
                                                        <div class="col-sm-5">
                                                            <input name="oil_grease" type="text" class="form-control form-control-sm @error('oil_grease') is-invalid @enderror" value="{{ old('oil_grease') }}" />
                                                            @error('oil_grease')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Surfactant</label>
                                                        <div class="col-sm-5">
                                                            <input name="surfactant" type="text" class="form-control form-control-sm @error('surfactant') is-invalid @enderror" value="{{ old('surfactant') }}" />
                                                            @error('surfactant')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total Phenol</label>
                                                        <div class="col-sm-5">
                                                            <input name="total_phenol" type="text" class="form-control form-control-sm @error('total_phenol') is-invalid @enderror" value="{{ old('total_phenol') }}" />
                                                            @error('total_phenol')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Hydrocarbon</label>
                                                        <div class="col-sm-5">
                                                            <input name="hydrocarbon" type="text" class="form-control form-control-sm @error('hydrocarbon') is-invalid @enderror" value="{{ old('hydrocarbon') }}" />
                                                            @error('hydrocarbon')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Tributyl Tin</label>
                                                        <div class="col-sm-5">
                                                            <input name="tributyl_tin" type="text" class="form-control form-control-sm @error('tributyl_tin') is-invalid @enderror" value="{{ old('tributyl_tin') }}" />
                                                            @error('tributyl_tin')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total Poly Chlor Biphenyl</label>
                                                        <div class="col-sm-5">
                                                            <input name="total_poly_chlor_biphenyl" type="text" class="form-control form-control-sm @error('total_poly_chlor_biphenyl') is-invalid @enderror" value="{{ old('total_poly_chlor_biphenyl') }}" />
                                                            @error('total_poly_chlor_biphenyl')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Poly Aromatic Hydrocarbon</label>
                                                        <div class="col-sm-5">
                                                            <input name="poly_aromatic_hydrocarbon" type="text" class="form-control form-control-sm @error('poly_aromatic_hydrocarbon') is-invalid @enderror" value="{{ old('poly_aromatic_hydrocarbon') }}" />
                                                            @error('poly_aromatic_hydrocarbon')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total Pesticides as Organo Chlorine Pesticides</label>
                                                        <div class="col-sm-5">
                                                            <input name="total_pesticides_as_organo_chlorine_pesticides" type="text" class="form-control form-control-sm @error('total_pesticides_as_organo_chlorine_pesticides') is-invalid @enderror" value="{{ old('total_pesticides_as_organo_chlorine_pesticides') }}" />
                                                            @error('total_pesticides_as_organo_chlorine_pesticides')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Benzene Hexa Chloride</label>
                                                        <div class="col-sm-5">
                                                            <input name="benzene_hexa_chloride" type="text" class="form-control form-control-sm @error('benzene_hexa_chloride') is-invalid @enderror" value="{{ old('benzene_hexa_chloride') }}" />
                                                            @error('benzene_hexa_chloride')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Endrin</label>
                                                        <div class="col-sm-5">
                                                            <input name="endrin" type="text" class="form-control form-control-sm @error('endrin') is-invalid @enderror" value="{{ old('endrin') }}" />
                                                            @error('endrin')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Dichloro Diphenyl Trichloroethane</label>
                                                        <div class="col-sm-5">
                                                            <input name="dichloro_diphenyl_trichloroethane" type="text" class="form-control form-control-sm @error('dichloro_diphenyl_trichloroethane') is-invalid @enderror" value="{{ old('dichloro_diphenyl_trichloroethane') }}" />
                                                            @error('dichloro_diphenyl_trichloroethane')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total Petroleum Hydrocarbons</label>
                                                        <div class="col-sm-5">
                                                            <input name="total_petroleum_hydrocarbons" type="text" class="form-control form-control-sm @error('total_petroleum_hydrocarbons') is-invalid @enderror" value="{{ old('total_petroleum_hydrocarbons') }}" />
                                                            @error('total_petroleum_hydrocarbons')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                        </div><!-- end row -->
                                    </div>
                                    <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn bg-gradient-primary btn-sm ">Create<i class="fa-solid fa-folder-plus ml-3"></i></button>

                                    </div>
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