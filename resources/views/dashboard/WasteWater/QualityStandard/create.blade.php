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
                        <li class="breadcrumb-item"><a href="/wastewater">Home</a></li>
                        <li class="breadcrumb-item"><a href="/wastewater/wastewaterstandard">{{$tittle}}</a></li>
                        <li class="breadcrumb-item active">Input Data</li>
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


                    <div class="card-title ml-2">Form Input</div>



                </div>
                <div class="card-body">
                    <div class="content">
                        <div class="col-12">

                            <ul class="nav nav-tabs " id="custom-content-above-tab" role="tablist">
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link active" id="custom-content-above-Physical-tab" data-toggle="pill" href="#custom-content-above-Physical" role="tab" aria-controls="custom-content-above-Physical" aria-selected="true">Physical Chemical</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link" id="custom-content-above-Anions-tab" data-toggle="pill" href="#custom-content-above-Anions" role="tab" aria-controls="custom-content-above-Anions" aria-selected="false">Anions</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link" id="custom-content-above-Cyanide-tab" data-toggle="pill" href="#custom-content-above-Cyanide" role="tab" aria-controls="custom-content-above-Cyanide" aria-selected="false">Cyanide</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link" id="custom-content-above-nutrients-tab" data-toggle="pill" href="#custom-content-above-nutrients" role="tab" aria-controls="custom-content-above-nutrients" aria-selected="false">Nutrients</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link" id="custom-content-above-dissolved-tab" data-toggle="pill" href="#custom-content-above-dissolved" role="tab" aria-controls="custom-content-above-dissolved" aria-selected="false">Dissolved Metals</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link" id="custom-content-above-total-tab" data-toggle="pill" href="#custom-content-above-total" role="tab" aria-controls="custom-content-above-total" aria-selected="false">Total Metals</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link" id="custom-content-above-Organic-tab" data-toggle="pill" href="#custom-content-above-Organic" role="tab" aria-controls="custom-content-above-Organic" aria-selected="false">Organic</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link" id="custom-content-above-microbiology-tab" data-toggle="pill" href="#custom-content-above-microbiology" role="tab" aria-controls="custom-content-above-microbiology" aria-selected="false">Microbiology</a>
                                </li>

                            </ul>
                            <form action="/wastewater/wastewaterstandard" method="post" checked enctype="multipart/form-data" autocomplete="off">
                                @csrf

                                <div class=" p-0 mt-3 ml-2 col-12 col-sm-6">
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
                                <p class="border-bottom"></p>
                                <div class="tab-content" id="custom-content-above-tab">
                                    <div class="tab-pane fade show active card-body table-responsive " id="custom-content-above-Physical" role="tabpanel" aria-labelledby="custom-content-above-Physical-tab">
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Conductivity</label>
                                                        <div class="col-sm-5">
                                                            <input name="conductivity" type="text" class="form-control form-control-sm @error('conductivity') is-invalid @enderror" value="{{ old('conductivity') }}" />
                                                            @error('conductivity')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">TDS</label>
                                                        <div class="col-sm-5">
                                                            <input name="totaldissolvedsolids_tds" type="text" class="form-control form-control-sm @error('totaldissolvedsolids_tds') is-invalid @enderror" value="{{ old('totaldissolvedsolids_tds') }}" />
                                                            @error('totaldissolvedsolids_tds')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">TSS</label>
                                                        <div class="col-sm-5">
                                                            <input name="totalsuspendedsolids_tss" type="text" class="form-control form-control-sm @error('totalsuspendedsolids_tss') is-invalid @enderror" value="{{ old('totalsuspendedsolids_tss') }}" />
                                                            @error('totalsuspendedsolids_tss')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Hardness</label>
                                                        <div class="col-sm-5">
                                                            <input name="hardness" type="text" class="form-control form-control-sm @error('hardness') is-invalid @enderror" value="{{ old('hardness') }}" />
                                                            @error('hardness')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Alkalinity (as CaCo3)</label>
                                                        <div class="col-sm-5">
                                                            <input name="alkalinity_ascaco3" type="text" class="form-control form-control-sm @error('alkalinity_ascaco3') is-invalid @enderror" value="{{ old('alkalinity_ascaco3') }}" />
                                                            @error('alkalinity_ascaco3')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Alkalinity-Carbonate)</label>
                                                        <div class="col-sm-5">
                                                            <input name="alkalinitycarbonate" type="text" class="form-control form-control-sm @error('alkalinitycarbonate') is-invalid @enderror" value="{{ old('alkalinitycarbonate') }}" />
                                                            @error('alkalinitycarbonate')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Alkalinity-Bicarbonate)</label>
                                                        <div class="col-sm-5">
                                                            <input name="alkalinitybicarbonate" type="text" class="form-control form-control-sm @error('alkalinitybicarbonate') is-invalid @enderror" value="{{ old('alkalinitybicarbonate') }}" />
                                                            @error('alkalinitybicarbonate')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Temperature</label>
                                                        <div class="col-sm-5">
                                                            <input name="temperature" type="text" class="form-control form-control-sm @error('temperature') is-invalid @enderror" value="{{ old('temperature') }}" />
                                                            @error('temperature')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Salinity</label>
                                                        <div class="col-sm-5">
                                                            <input name="salinity" type="text" class="form-control form-control-sm @error('salinity') is-invalid @enderror" value="{{ old('salinity') }}" />
                                                            @error('salinity')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Dissolved Oxygen (DO)</label>
                                                        <div class="col-sm-5">
                                                            <input name="dissolvedoxygen_do" type="text" class="form-control form-control-sm @error('dissolvedoxygen_do') is-invalid @enderror" value="{{ old('dissolvedoxygen_do') }}" />
                                                            @error('dissolvedoxygen_do')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade card-body table-responsive" id="custom-content-above-Anions" role="tabpanel" aria-labelledby="custom-content-above-Anions-tab">
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">pH Min</label>
                                                        <div class="col-sm-5">
                                                            <input name="ph_min" type="text" class="form-control form-control-sm @error('ph_min') is-invalid @enderror" value="{{ old('ph_min') }}" />
                                                            @error('ph_min')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">pH Max</label>
                                                        <div class="col-sm-5">
                                                            <input name="ph_max" type="text" class="form-control form-control-sm @error('ph_max') is-invalid @enderror" value="{{ old('ph_max') }}" />
                                                            @error('ph_max')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Alkalinity - Total</label>
                                                        <div class="col-sm-5">
                                                            <input name="alkalinitytotal" type="text" class="form-control form-control-sm @error('alkalinitytotal') is-invalid @enderror" value="{{ old('alkalinitytotal') }}" />
                                                            @error('alkalinitytotal')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Chloride (Cl)</label>
                                                        <div class="col-sm-5">
                                                            <input name="chloride_cl" type="text" class="form-control form-control-sm @error('chloride_cl') is-invalid @enderror" value="{{ old('chloride_cl') }}" />
                                                            @error('chloride_cl')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Fluoride (F)</label>
                                                        <div class="col-sm-5">
                                                            <input name="fluoride_f" type="text" class="form-control form-control-sm @error('fluoride_f') is-invalid @enderror" value="{{ old('fluoride_f') }}" />
                                                            @error('fluoride_f')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Sulphate (SO4)</label>
                                                        <div class="col-sm-5">
                                                            <input name="sulphate_so4" type="text" class="form-control form-control-sm @error('sulphate_so4') is-invalid @enderror" value="{{ old('sulphate_so4') }}" />
                                                            @error('sulphate_so4')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Sulphite (H2S)</label>
                                                        <div class="col-sm-5">
                                                            <input name="sulphite_h2s" type="text" class="form-control form-control-sm @error('sulphite_h2s') is-invalid @enderror" value="{{ old('sulphite_h2s') }}" />
                                                            @error('sulphite_h2s')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Free Chlorine (Cl2)</label>
                                                        <div class="col-sm-5">
                                                            <input name="freechlorine_cl2" type="text" class="form-control form-control-sm @error('freechlorine_cl2') is-invalid @enderror" value="{{ old('freechlorine_cl2') }}" />
                                                            @error('freechlorine_cl2')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade card-body table-responsive" id="custom-content-above-Cyanide" role="tabpanel" aria-labelledby="custom-content-above-Cyanide-tab">
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Free Cyanide (FCN)</label>
                                                        <div class="col-sm-5">
                                                            <input name="freecyanide_fcn" type="text" class="form-control form-control-sm @error('freecyanide_fcn') is-invalid @enderror" value="{{ old('freecyanide_fcn') }}" />
                                                            @error('freecyanide_fcn')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total Cyanide (CN Tot)</label>
                                                        <div class="col-sm-5">
                                                            <input name="totalcyanide_cntot" type="text" class="form-control form-control-sm @error('totalcyanide_cntot') is-invalid @enderror" value="{{ old('totalcyanide_cntot') }}" />
                                                            @error('totalcyanide_cntot')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">WAD Cyanide (CN Wad))</label>
                                                        <div class="col-sm-5">
                                                            <input name="wadcyanide_cnwad" type="text" class="form-control form-control-sm @error('wadcyanide_cnwad') is-invalid @enderror" value="{{ old('wadcyanide_cnwad') }}" />
                                                            @error('wadcyanide_cnwad')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade card-body table-responsive" id="custom-content-above-nutrients" role="tabpanel" aria-labelledby="custom-content-above-nutrients-tab">
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Ammonia (N-NH4) </label>
                                                        <div class="col-sm-5">
                                                            <input name="ammonia_nh4" type="text" class="form-control form-control-sm @error('ammonia_nh4') is-invalid @enderror" value="{{ old('ammonia_nh4') }}" />
                                                            @error('ammonia_nh4')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Ammonium (N_NH3) </label>
                                                        <div class="col-sm-5">
                                                            <input name="ammonium_n_nh3" type="text" class="form-control form-control-sm @error('ammonium_n_nh3') is-invalid @enderror" value="{{ old('ammonium_n_nh3') }}" />
                                                            @error('ammonium_n_nh3')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Nitrate (NO3)</label>
                                                        <div class="col-sm-5">
                                                            <input name="nitrate_no3" type="text" class="form-control form-control-sm @error('nitrate_no3') is-invalid @enderror" value="{{ old('nitrate_no3') }}" />
                                                            @error('nitrate_no3')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Nitrite (NO2)</label>
                                                        <div class="col-sm-5">
                                                            <input name="nitrite_no2" type="text" class="form-control form-control-sm @error('nitrite_no2') is-invalid @enderror" value="{{ old('nitrite_no2') }}" />
                                                            @error('nitrite_no2')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Phosphate (PO4)</label>
                                                        <div class="col-sm-5">
                                                            <input name="phosphate_po4" type="text" class="form-control form-control-sm @error('phosphate_po4') is-invalid @enderror" value="{{ old('phosphate_po4') }}" />
                                                            @error('phosphate_po4')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total-Phosphate (P-PO4)</label>
                                                        <div class="col-sm-5">
                                                            <input name="totalphosphate_ppo4" type="text" class="form-control form-control-sm @error('totalphosphate_ppo4') is-invalid @enderror" value="{{ old('totalphosphate_ppo4') }}" />
                                                            @error('totalphosphate_ppo4')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade card-body table-responsive" id="custom-content-above-dissolved" role="tabpanel" aria-labelledby="custom-content-above-dissolved-tab">
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Aluminium (Al)</label>
                                                        <div class="col-sm-5">
                                                            <input name="aluminium_al" type="text" class="form-control form-control-sm @error('aluminium_al') is-invalid @enderror" value="{{ old('aluminium_al') }}" />
                                                            @error('aluminium_al')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Antimony (Sb)</label>
                                                        <div class="col-sm-5">
                                                            <input name="antimony_sb" type="text" class="form-control form-control-sm @error('antimony_sb') is-invalid @enderror" value="{{ old('antimony_sb') }}" />
                                                            @error('antimony_sb')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Arsenic (As)</label>
                                                        <div class="col-sm-5">
                                                            <input name="arsenic_as" type="text" class="form-control form-control-sm @error('arsenic_as') is-invalid @enderror" value="{{ old('arsenic_as') }}" />
                                                            @error('arsenic_as')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Barium (Ba)</label>
                                                        <div class="col-sm-5">
                                                            <input name="barium_ba" type="text" class="form-control form-control-sm @error('barium_ba') is-invalid @enderror" value="{{ old('barium_ba') }}" />
                                                            @error('barium_ba')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Cadmium (Cd)</label>
                                                        <div class="col-sm-5">
                                                            <input name="cadmium_cd" type="text" class="form-control form-control-sm @error('cadmium_cd') is-invalid @enderror" value="{{ old('cadmium_cd') }}" />
                                                            @error('cadmium_cd')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Calcium (Ca)</label>
                                                        <div class="col-sm-5">
                                                            <input name="calcium_ca" type="text" class="form-control form-control-sm @error('calcium_ca') is-invalid @enderror" value="{{ old('calcium_ca') }}" />
                                                            @error('calcium_ca')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Chromium (Cr)</label>
                                                        <div class="col-sm-5">
                                                            <input name="chromium_cr" type="text" class="form-control form-control-sm @error('chromium_cr') is-invalid @enderror" value="{{ old('chromium_cr') }}" />
                                                            @error('chromium_cr')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Chromium Hexavalent (Cr6+)</label>
                                                        <div class="col-sm-5">
                                                            <input name="chromiumhexavalent_cr6" type="text" class="form-control form-control-sm @error('chromiumhexavalent_cr6') is-invalid @enderror" value="{{ old('chromiumhexavalent_cr6') }}" />
                                                            @error('chromiumhexavalent_cr6')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Cobalt (Co)</label>
                                                        <div class="col-sm-5">
                                                            <input name="cobalt_co" type="text" class="form-control form-control-sm @error('cobalt_co') is-invalid @enderror" value="{{ old('cobalt_co') }}" />
                                                            @error('cobalt_co')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Copper (Cu)</label>
                                                        <div class="col-sm-5">
                                                            <input name="copper_cu" type="text" class="form-control form-control-sm @error('copper_cu') is-invalid @enderror" value="{{ old('copper_cu') }}" />
                                                            @error('copper_cu')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Iron (Fe)</label>
                                                        <div class="col-sm-5">
                                                            <input name="iron_fe" type="text" class="form-control form-control-sm @error('iron_fe') is-invalid @enderror" value="{{ old('iron_fe') }}" />
                                                            @error('iron_fe')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Lead (Pb)</label>
                                                        <div class="col-sm-5">
                                                            <input name="lead_pb" type="text" class="form-control form-control-sm @error('lead_pb') is-invalid @enderror" value="{{ old('lead_pb') }}" />
                                                            @error('lead_pb')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Magnesium (Mg)</label>
                                                        <div class="col-sm-5">
                                                            <input name="magnesium_mg" type="text" class="form-control form-control-sm @error('magnesium_mg') is-invalid @enderror" value="{{ old('magnesium_mg') }}" />
                                                            @error('magnesium_mg')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Manganese (Mn)</label>
                                                        <div class="col-sm-5">
                                                            <input name="manganese_mn" type="text" class="form-control form-control-sm @error('manganese_mn') is-invalid @enderror" value="{{ old('manganese_mn') }}" />
                                                            @error('manganese_mn')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Mercury (Hg)</label>
                                                        <div class="col-sm-5">
                                                            <input name="mercury_hg" type="text" class="form-control form-control-sm @error('mercury_hg') is-invalid @enderror" value="{{ old('mercury_hg') }}" />
                                                            @error('mercury_hg')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Nickel (Ni)</label>
                                                        <div class="col-sm-5">
                                                            <input name="nickel_ni" type="text" class="form-control form-control-sm @error('nickel_ni') is-invalid @enderror" value="{{ old('nickel_ni') }}" />
                                                            @error('nickel_ni')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Selenium (Se)</label>
                                                        <div class="col-sm-5">
                                                            <input name="selenium_se" type="text" class="form-control form-control-sm @error('selenium_se') is-invalid @enderror" value="{{ old('selenium_se') }}" />
                                                            @error('selenium_se')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Silver (Ag)</label>
                                                        <div class="col-sm-5">
                                                            <input name="silver_ag" type="text" class="form-control form-control-sm @error('silver_ag') is-invalid @enderror" value="{{ old('silver_ag') }}" />
                                                            @error('silver_ag')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Sodium (Na)</label>
                                                        <div class="col-sm-5">
                                                            <input name="sodium_na" type="text" class="form-control form-control-sm @error('sodium_na') is-invalid @enderror" value="{{ old('sodium_na') }}" />
                                                            @error('sodium_na')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Tin (Sn)</label>
                                                        <div class="col-sm-5">
                                                            <input name="tin_sn" type="text" class="form-control form-control-sm @error('tin_sn') is-invalid @enderror" value="{{ old('tin_sn') }}" />
                                                            @error('tin_sn')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Zinc (Zn)</label>
                                                        <div class="col-sm-5">
                                                            <input name="zinc_zn" type="text" class="form-control form-control-sm @error('zinc_zn') is-invalid @enderror" value="{{ old('zinc_zn') }}" />
                                                            @error('zinc_zn')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade card-body table-responsive" id="custom-content-above-total" role="tabpanel" aria-labelledby="custom-content-above-total-tab">
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Aluminium (T_Al)</label>
                                                        <div class="col-sm-5">
                                                            <input name="aluminium_tal" type="text" class="form-control form-control-sm @error('aluminium_tal') is-invalid @enderror" value="{{ old('aluminium_tal') }}" />
                                                            @error('aluminium_tal')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Arsenic (T_As)</label>
                                                        <div class="col-sm-5">
                                                            <input name="arsenic_tas" type="text" class="form-control form-control-sm @error('arsenic_tas') is-invalid @enderror" value="{{ old('arsenic_tas') }}" />
                                                            @error('arsenic_tas')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Cadmium (T_Cd)</label>
                                                        <div class="col-sm-5">
                                                            <input name="cadmium_tcd" type="text" class="form-control form-control-sm @error('cadmium_tcd') is-invalid @enderror" value="{{ old('cadmium_tcd') }}" />
                                                            @error('cadmium_tcd')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Chromium (T_Cr)</label>
                                                        <div class="col-sm-5">
                                                            <input name="chromium_tcr" type="text" class="form-control form-control-sm @error('chromium_tcr') is-invalid @enderror" value="{{ old('chromium_tcr') }}" />
                                                            @error('chromium_tcr')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Chromium Hexavalent (T_Cr6+)</label>
                                                        <div class="col-sm-5">
                                                            <input name="chromiumhexavalent_tcr6" type="text" class="form-control form-control-sm @error('chromiumhexavalent_tcr6') is-invalid @enderror" value="{{ old('chromiumhexavalent_tcr6') }}" />
                                                            @error('chromiumhexavalent_tcr6')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Cobalt (T_Co)</label>
                                                        <div class="col-sm-5">
                                                            <input name="cobalt_tco" type="text" class="form-control form-control-sm @error('cobalt_tco') is-invalid @enderror" value="{{ old('cobalt_tco') }}" />
                                                            @error('cobalt_tco')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Copper (T_Cu)</label>
                                                        <div class="col-sm-5">
                                                            <input name="copper_tco" type="text" class="form-control form-control-sm @error('copper_tco') is-invalid @enderror" value="{{ old('copper_tco') }}" />
                                                            @error('copper_tco')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Lead (T_Pb)</label>
                                                        <div class="col-sm-5">
                                                            <input name="lead_tpb" type="text" class="form-control form-control-sm @error('lead_tpb') is-invalid @enderror" value="{{ old('lead_tpb') }}" />
                                                            @error('lead_tpb')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Selenium (T_Se)</label>
                                                        <div class="col-sm-5">
                                                            <input name="selenium_tse" type="text" class="form-control form-control-sm @error('selenium_tse') is-invalid @enderror" value="{{ old('selenium_tse') }}" />
                                                            @error('selenium_tse')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Mercury (T_Hg)</label>
                                                        <div class="col-sm-5">
                                                            <input name="mercury_thg" type="text" class="form-control form-control-sm @error('mercury_thg') is-invalid @enderror" value="{{ old('mercury_thg') }}" />
                                                            @error('mercury_thg')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Nickel (T_Ni)</label>
                                                        <div class="col-sm-5">
                                                            <input name="nickel_tni" type="text" class="form-control form-control-sm @error('nickel_tni') is-invalid @enderror" value="{{ old('nickel_tni') }}" />
                                                            @error('nickel_tni')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Zinc (T_Zn)</label>
                                                        <div class="col-sm-5">
                                                            <input name="zinc_tzn" type="text" class="form-control form-control-sm @error('zinc_tzn') is-invalid @enderror" value="{{ old('zinc_tzn') }}" />
                                                            @error('zinc_tzn')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade card-body table-responsive" id="custom-content-above-Organic" role="tabpanel" aria-labelledby="custom-content-above-Organic-tab">
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">BOD</label>
                                                        <div class="col-sm-5">
                                                            <input name="bod" type="text" class="form-control form-control-sm @error('bod') is-invalid @enderror" value="{{ old('bod') }}" />
                                                            @error('bod')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">COD</label>
                                                        <div class="col-sm-5">
                                                            <input name="cod" type="text" class="form-control form-control-sm @error('cod') is-invalid @enderror" value="{{ old('cod') }}" />
                                                            @error('cod')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Oil and Grease</label>
                                                        <div class="col-sm-5">
                                                            <input name="oilandgrease" type="text" class="form-control form-control-sm @error('oilandgrease') is-invalid @enderror" value="{{ old('oilandgrease') }}" />
                                                            @error('oilandgrease')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total Phenols</label>
                                                        <div class="col-sm-5">
                                                            <input name="totalphenols" type="text" class="form-control form-control-sm @error('totalphenols') is-invalid @enderror" value="{{ old('totalphenols') }}" />
                                                            @error('totalphenols')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Surfactant (MBAS)</label>
                                                        <div class="col-sm-5">
                                                            <input name="surfactant_mbas" type="text" class="form-control form-control-sm @error('surfactant_mbas') is-invalid @enderror" value="{{ old('surfactant_mbas') }}" />
                                                            @error('surfactant_mbas')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total PCB</label>
                                                        <div class="col-sm-5">
                                                            <input name="totalpcb" type="text" class="form-control form-control-sm @error('totalpcb') is-invalid @enderror" value="{{ old('totalpcb') }}" />
                                                            @error('totalpcb')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">A.O.X</label>
                                                        <div class="col-sm-5">
                                                            <input name="aox" type="text" class="form-control form-control-sm @error('aox') is-invalid @enderror" value="{{ old('aox') }}" />
                                                            @error('aox')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">PCDFs</label>
                                                        <div class="col-sm-5">
                                                            <input name="pcdfs" type="text" class="form-control form-control-sm @error('pcdfs') is-invalid @enderror" value="{{ old('pcdfs') }}" />
                                                            @error('pcdfs')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">PCDDs</label>
                                                        <div class="col-sm-5">
                                                            <input name="pcdds" type="text" class="form-control form-control-sm @error('pcdds') is-invalid @enderror" value="{{ old('pcdds') }}" />
                                                            @error('pcdds')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade card-body table-responsive" id="custom-content-above-microbiology" role="tabpanel" aria-labelledby="custom-content-above-microbiology-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 col-sm-3">
                                                        <div class="form-group">
                                                            <div class="form-group row">
                                                                <label style="font-size: 10px" class="col-sm-5 col-form-label">Fecal Coliform</label>
                                                                <div class="col-sm-5">
                                                                    <input name="fecalcoliform" type="text" class="form-control form-control-sm @error('fecalcoliform') is-invalid @enderror" value="{{ old('fecalcoliform') }}" />
                                                                    @error('fecalcoliform')
                                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-3">
                                                        <div class="form-group">
                                                            <div class="form-group row">
                                                                <label style="font-size: 10px" class="col-sm-5 col-form-label">E- Coli</label>
                                                                <div class="col-sm-5">
                                                                    <input name="ecoli" type="text" class="form-control form-control-sm @error('ecoli') is-invalid @enderror" value="{{ old('ecoli') }}" />
                                                                    @error('ecoli')
                                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-3">
                                                        <div class="form-group">
                                                            <div class="form-group row">
                                                                <label style="font-size: 10px" class="col-sm-5 col-form-label">Total Coliform Bacteria</label>
                                                                <div class="col-sm-5">
                                                                    <input name="totalcoliformbacteria" type="text" class="form-control form-control-sm @error('totalcoliformbacteria') is-invalid @enderror" value="{{ old('totalcoliformbacteria') }}" />
                                                                    @error('totalcoliformbacteria')
                                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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
            </div>
        </div>
    </section>
</div>

@endsection