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
                        <li class="breadcrumb-item"><a href="/surfacewater/drinkwater">Home</a></li>
                        <li class="breadcrumb-item"><a href="/surfacewater/drinkwater/quantity">{{$tittle}}</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-success card-outline">
                <div class="card-header p-0 ">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card-titel ml-2">Form Edit</div>
                </div>
                <form action="/surfacewater/drinkwater/quantity/{{ $QualityStd->id }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-2" id="custom-content-above-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-content-above-Physical-tab" data-toggle="pill" href="#custom-content-above-Physical" role="tab" aria-controls="custom-content-above-Physical" aria-selected="true">Physical Chemical</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-Anions-tab" data-toggle="pill" href="#custom-content-above-Anions" role="tab" aria-controls="custom-content-above-Anions" aria-selected="false">Anions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-Cyanide-tab" data-toggle="pill" href="#custom-content-above-Cyanide" role="tab" aria-controls="custom-content-above-Cyanide" aria-selected="false">Cyanide</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-nutrients-tab" data-toggle="pill" href="#custom-content-above-nutrients" role="tab" aria-controls="custom-content-above-nutrients" aria-selected="false">Nutrients</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-dissolved-tab" data-toggle="pill" href="#custom-content-above-dissolved" role="tab" aria-controls="custom-content-above-dissolved" aria-selected="false">Dissolved Metals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-microbiology-tab" data-toggle="pill" href="#custom-content-above-microbiology" role="tab" aria-controls="custom-content-above-microbiology" aria-selected="false">Microbiology</a>
                            </li>
							<li class="nav-item">
                                <a  class="nav-link" id="custom-content-above-organic-tab" data-toggle="pill" href="#custom-content-above-organic" role="tab" aria-controls="custom-content-above-organic" aria-selected="false">Organic</a>
                            </li>

                        </ul>

                        <div class=" ml-2 col-12 col-sm-6">
                            <div class="form-group">
                                <div class="form-group row">
                                    <label style="font-size: 10px" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input name="nama" type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" value="{{ old('nama',$QualityStd->nama) }}" />
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Conductivity</label>
                                                        <div class="col-sm-5">
                                                            <input name="conductivity" type="text" class="form-control form-control-sm @error('conductivity') is-invalid @enderror" value="{{ old('conductivity',$QualityStd->conductivity) }}" />


                                                            @error('conductivity')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">TDS</label>
                                                        <div class="col-sm-5">
                                                            <input name="tds" type="text" class="form-control form-control-sm @error('tds') is-invalid @enderror" value="{{ old('tds',$QualityStd->tds ) }}" />
                                                            @error('tds')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">TSS</label>
                                                        <div class="col-sm-5">
                                                            <input name="tss" type="text" class="form-control form-control-sm @error('tss') is-invalid @enderror" value="{{ old('tss',$QualityStd->tss) }}" />


                                                            @error('tss')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Turbidity</label>
                                                        <div class="col-sm-5">
                                                            <input name="turbidity" type="text" class="form-control form-control-sm @error('turbidity') is-invalid @enderror" value="{{ old('turbidity',$QualityStd->turbidity) }}" />
                                                            @error('turbidity')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Hardness</label>
                                                        <div class="col-sm-5">
                                                            <input name="hardness" type="text" class="form-control form-control-sm @error('hardness') is-invalid @enderror" value="{{ old('hardness',$QualityStd->hardness) }}" />
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Color</label>
                                                        <div class="col-sm-5">
                                                            <input name="color" type="text" class="form-control form-control-sm @error('color') is-invalid @enderror" value="{{ old('color',$QualityStd->color) }}" />
                                                            @error('color')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Odor</label>
                                                        <div class="col-sm-5">
                                                            <input name="odor" type="text" class="form-control form-control-sm @error('odor') is-invalid @enderror" value="{{ old('odor',$QualityStd->odor) }}" />
                                                            @error('odor')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Taste</label>
                                                        <div class="col-sm-5">
                                                            <input name="taste" type="text" class="form-control form-control-sm @error('taste') is-invalid @enderror" value="{{ old('taste',$QualityStd->taste) }}" />
                                                            @error('taste')
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
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">PH</label>
                                                        <div class="col-sm-5">
                                                            <input name="ph" type="text" class="form-control form-control-sm @error('ph') is-invalid @enderror" value="{{ old('ph',$QualityStd->ph) }}" />
                                                            @error('ph')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Chloride(Cl)</label>
                                                        <div class="col-sm-5">
                                                            <input name="chloride" type="text" class="form-control form-control-sm @error('chloride') is-invalid @enderror" value="{{ old('chloride',$QualityStd->chloride) }}" />
                                                            @error('chloride')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Fluoride(F)</label>
                                                        <div class="col-sm-5">
                                                            <input name="fluoride" type="text" class="form-control form-control-sm @error('fluoride') is-invalid @enderror" value="{{ old('fluoride',$QualityStd->fluoride) }}" />
                                                            @error('fluoride')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Residual Chlorine</label>
                                                        <div class="col-sm-5">
                                                            <input name="residual_chlorine" type="text" class="form-control form-control-sm @error('residual_chlorine') is-invalid @enderror" value="{{ old('residual_chlorine',$QualityStd->residual_chlorine) }}" />
                                                            @error('residual_chlorine')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Sulphate (SO4)</label>
                                                        <div class="col-sm-5">
                                                            <input name="sulphate" type="text" class="form-control form-control-sm @error('sulphate') is-invalid @enderror" value="{{ old('sulphate',$QualityStd->sulphate) }}" />
                                                            @error('sulphate')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Sulphite (H2S)</label>
                                                        <div class="col-sm-5">
                                                            <input name="sulphite" type="text" class="form-control form-control-sm @error('sulphite') is-invalid @enderror" value="{{ old('sulphite',$QualityStd->sulphite) }}" />
                                                            @error('sulphite')
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
                            <div class="tab-pane fade" id="custom-content-above-Cyanide" role="tabpanel" aria-labelledby="custom-content-above-Cyanide-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Free Cyanide (FCN)</label>
                                                        <div class="col-sm-5">
                                                            <input name="free_cyanide" type="text" class="form-control form-control-sm @error('free_cyanide') is-invalid @enderror" value="{{ old('free_cyanide',$QualityStd->free_cyanide) }}" />
                                                            @error('free_cyanide')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total Cyanide (CN Tot)</label>
                                                        <div class="col-sm-5">
                                                            <input name="total_cyanide" type="text" class="form-control form-control-sm @error('total_cyanide') is-invalid @enderror" value="{{ old('total_cyanide',$QualityStd->total_cyanide) }}" />
                                                            @error('total_cyanide')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">WAD Cyanide (CN Wad)</label>
                                                        <div class="col-sm-5">
                                                            <input name="wad_cyanide" type="text" class="form-control form-control-sm @error('wad_cyanide') is-invalid @enderror" value="{{ old('wad_cyanide',$QualityStd->wad_cyanide) }}" />
                                                            @error('wad_cyanide')
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
                            <div class="tab-pane fade" id="custom-content-above-nutrients" role="tabpanel" aria-labelledby="custom-content-above-nutrients-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Ammonia (NH4)</label>
                                                        <div class="col-sm-5">
                                                            <input name="ammonia_nh4" type="text" class="form-control form-control-sm @error('ammonia_nh4') is-invalid @enderror" value="{{ old('ammonia_nh4',$QualityStd->ammonia_nh4) }}" />
                                                            @error('ammonia_nh4')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Ammonia (N-NH3)</label>
                                                        <div class="col-sm-5">
                                                            <input name="ammonia_nnh3" type="text" class="form-control form-control-sm @error('ammonia_nnh3') is-invalid @enderror" value="{{ old('ammonia_nnh3',$QualityStd->ammonia_nnh3) }}" />
                                                            @error('ammonia_nnh3')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Nitrate (NO3)</label>
                                                        <div class="col-sm-5">
                                                            <input name="nitrate_no3" type="text" class="form-control form-control-sm @error('nitrate_no3') is-invalid @enderror" value="{{ old('nitrate_no3',$QualityStd->nitrate_no3) }}" />
                                                            @error('nitrate_no3')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Nitrite (NO2)</label>
                                                        <div class="col-sm-5">
                                                            <input name="nitrate_no2" type="text" class="form-control form-control-sm @error('nitrate_no2') is-invalid @enderror" value="{{ old('nitrate_no2',$QualityStd->nitrate_no2) }}" />
                                                            @error('nitrate_no2')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Phosphate (PO4)</label>
                                                        <div class="col-sm-5">
                                                            <input name="phosphate_po4" type="text" class="form-control form-control-sm @error('phosphate_po4') is-invalid @enderror" value="{{ old('phosphate_po4',$QualityStd->phosphate_po4) }}" />
                                                            @error('phosphate_po4')
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
                            <div class="tab-pane fade " id="custom-content-above-dissolved" role="tabpanel" aria-labelledby="custom-content-above-dissolved-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Aluminium (Al)</label>
                                                        <div class="col-sm-5">
                                                            <input name="aluminium_al" type="text" class="form-control form-control-sm @error('aluminium_al') is-invalid @enderror" value="{{ old('aluminium_al',$QualityStd->aluminium_al) }}" />
                                                            @error('aluminium_al')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Arsenic (As)</label>
                                                        <div class="col-sm-5">
                                                            <input name="arsenic_as" type="text" class="form-control form-control-sm @error('arsenic_as') is-invalid @enderror" value="{{ old('arsenic_as',$QualityStd->arsenic_as) }}" />
                                                            @error('arsenic_as')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Barium (Ba)</label>
                                                        <div class="col-sm-5">
                                                            <input name="barium_ba" type="text" class="form-control form-control-sm @error('barium_ba') is-invalid @enderror" value="{{ old('barium_ba',$QualityStd->barium_ba) }}" />
                                                            @error('barium_ba')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Cadmium (Cd)</label>
                                                        <div class="col-sm-5">
                                                            <input name="cadmium_cd" type="text" class="form-control form-control-sm @error('cadmium_cd') is-invalid @enderror" value="{{ old('cadmium_cd',$QualityStd->cadmium_cd) }}" />
                                                            @error('cadmium_cd')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Chromium (Cr)</label>
                                                        <div class="col-sm-5">
                                                            <input name="chromium_cr" type="text" class="form-control form-control-sm @error('chromium_cr') is-invalid @enderror" value="{{ old('chromium_cr',$QualityStd->chromium_cr) }}" />
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Chromium(Cr6+)</label>
                                                        <div class="col-sm-5">
                                                            <input name="chromium_hexavalent" type="text" class="form-control form-control-sm @error('chromium_hexavalent') is-invalid @enderror" value="{{ old('chromium_hexavalent',$QualityStd->chromium_hexavalent) }}" />
                                                            @error('chromium_hexavalent')
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
                                                            <input name="cobalt_co" type="text" class="form-control form-control-sm @error('cobalt_co') is-invalid @enderror" value="{{ old('cobalt_co',$QualityStd->cobalt_co) }}" />
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">copper_cu</label>
                                                        <div class="col-sm-5">
                                                            <input name="copper_cu" type="text" class="form-control form-control-sm @error('copper_cu') is-invalid @enderror" value="{{ old('copper_cu',$QualityStd->copper_cu) }}" />
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
                                                            <input name="iron_fe" type="text" class="form-control form-control-sm @error('iron_fe') is-invalid @enderror" value="{{ old('iron_fe',$QualityStd->iron_fe) }}" />
                                                            @error('iron_fe')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Lead (Pb)</label>
                                                        <div class="col-sm-5">
                                                            <input name="lead_pb" type="text" class="form-control form-control-sm @error('lead_pb') is-invalid @enderror" value="{{ old('lead_pb',$QualityStd->lead_pb) }}" />
                                                            @error('lead_pb')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Manganese (Mn)</label>
                                                        <div class="col-sm-5">
                                                            <input name="manganese_mn" type="text" class="form-control form-control-sm @error('manganese_mn') is-invalid @enderror" value="{{ old('manganese_mn',$QualityStd->manganese_mn) }}" />
                                                            @error('manganese_mn')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Mercury (Hg)</label>
                                                        <div class="col-sm-5">
                                                            <input name="mercury_hg" type="text" class="form-control form-control-sm @error('mercury_hg') is-invalid @enderror" value="{{ old('mercury_hg',$QualityStd->mercury_hg) }}" />
                                                            @error('mercury_hg')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Nickel (Ni)</label>
                                                        <div class="col-sm-5">
                                                            <input name="nickel_ni" type="text" class="form-control form-control-sm @error('nickel_ni') is-invalid @enderror" value="{{ old('nickel_ni',$QualityStd->nickel_ni) }}" />
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
                                                            <input name="selenium_se" type="text" class="form-control form-control-sm @error('selenium_se') is-invalid @enderror" value="{{ old('selenium_se',$QualityStd->selenium_se) }}" />
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
                                                            <input name="silver_ag" type="text" class="form-control form-control-sm @error('silver_ag') is-invalid @enderror" value="{{ old('silver_ag',$QualityStd->silver_ag) }}" />
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Zinc (Zn)</label>
                                                        <div class="col-sm-5">
                                                            <input name="zinc_zn" type="text" class="form-control form-control-sm @error('zinc_zn') is-invalid @enderror" value="{{ old('zinc_zn',$QualityStd->zinc_zn) }}" />
                                                            @error('zinc_zn')
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
                            <div class="tab-pane fade" id="custom-content-above-microbiology" role="tabpanel" aria-labelledby="custom-content-above-microbiology-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Fecal Coliform</label>
                                                        <div class="col-sm-5">
                                                            <input name="fecal_coliform" type="text" class="form-control form-control-sm @error('fecal_coliform') is-invalid @enderror" value="{{ old('fecal_coliform',$QualityStd->fecal_coliform) }}" />
                                                            @error('fecal_coliform')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">E- Coli</label>
                                                        <div class="col-sm-5">
                                                            <input name="c_coli" type="text" class="form-control form-control-sm @error('c_coli') is-invalid @enderror" value="{{ old('c_coli',$QualityStd->c_coli) }}" />
                                                            @error('c_coli')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total Coliform Bacteria</label>
                                                        <div class="col-sm-5">
                                                            <input name="total_coliform_bacteria" type="text" class="form-control form-control-sm @error('total_coliform_bacteria') is-invalid @enderror" value="{{ old('total_coliform_bacteria',$QualityStd->total_coliform_bacteria) }}" />
                                                            @error('total_coliform_bacteria')
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
							<div class="tab-pane fade" id="custom-content-above-organic" role="tabpanel" aria-labelledby="custom-content-above-organic-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Permanganate Number as KMnO4</label>
                                                        <div class="col-sm-5">
                                                            <input name="permanganate_number_as_kmno4" type="text" class="form-control form-control-sm @error('permanganate_number_as_kmno4') is-invalid @enderror" value="{{ old('permanganate_number_as_kmno4',$QualityStd->permanganate_number_as_kmno4) }}" />
                                                            @error('permanganate_number_as_kmno4')
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
                                                            <input name="surfactant" type="text" class="form-control form-control-sm @error('surfactant') is-invalid @enderror" value="{{ old('surfactant',$QualityStd->surfactant) }}" />
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Benzene</label>
                                                        <div class="col-sm-5">
                                                            <input name="benzene" type="text" class="form-control form-control-sm @error('benzene') is-invalid @enderror" value="{{ old('benzene',$QualityStd->benzene) }}" />
                                                            @error('benzene')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total pesticides as organo Chlorine Pesticides</label>
                                                        <div class="col-sm-5">
                                                            <input name="total_pesticides_as_organo_chlorine_pesticides" type="text" class="form-control form-control-sm @error('total_pesticides_as_organo_chlorine_pesticides') is-invalid @enderror" value="{{ old('total_pesticides_as_organo_chlorine_pesticides',$QualityStd->total_pesticides_as_organo_chlorine_pesticides) }}" />
                                                            @error('total_pesticides_as_organo_chlorine_pesticides')
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
                                        <button type="submit" class="btn bg-gradient-success btn-sm ">Save<i class="fa-regular fa-floppy-disk ml-3"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                </form>
            </div>
        </div>

    </section>
</div>

@endsection