@extends('dashboard.layouts.main')
@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input {{ $breadcrumb }}</h1>
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
            <div class="card">
                <div class="card-header">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success',$QualityStd->nama) }}
                    </div>
                    @endif
                    <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                        <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-content-above-Metals-tab" data-toggle="pill" href="#custom-content-above-Metals" role="tab" aria-controls="custom-content-above-Metals" aria-selected="true">TCLP Metals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-Inorganic-tab" data-toggle="pill" href="#custom-content-above-Inorganic" role="tab" aria-controls="custom-content-above-Inorganic" aria-selected="false">TCLP Inorganic</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-Organic-tab" data-toggle="pill" href="#custom-content-above-Organic" role="tab" aria-controls="custom-content-above-Organic" aria-selected="false">TCLP Organic**</a>
                            </li>

                        </ul>

                    </ul>
                </div>

                <div class="card-body">

                    <form action="/tailing/qualitystandard" method="post" checked enctype="multipart/form-data" autocomplete="off">
                        @csrf
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

                            <div class="tab-pane fade show active" id="custom-content-above-Metals" role="tabpanel" aria-labelledby="custom-content-above-Metals-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Antimony, Sb</label>
                                                        <div class="col-sm-5">
                                                            <input name="antimony" type="text" class="form-control form-control-sm @error('antimony') is-invalid @enderror" value="{{ old('antimony',$QualityStd->antimony) }}" />
                                                            @error('antimony')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            {{-- end conductivity --}}
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Arsenic (As)</label>
                                                        <div class="col-sm-5">
                                                            <input name="arsenic" type="text" class="form-control form-control-sm @error('arsenic') is-invalid @enderror" value="{{ old('arsenic',$QualityStd->arsenic) }}" />
                                                            @error('arsenic')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>

                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Barium (Ba)</label>
                                                        <div class="col-sm-5">
                                                            <input name="barium" type="text" class="form-control form-control-sm @error('barium') is-invalid @enderror" value="{{ old('barium',$QualityStd->barium) }}" />
                                                            @error('barium')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>

                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Beryllium, Be</label>
                                                        <div class="col-sm-5">
                                                            <input name="beryllium" type="text" class="form-control form-control-sm @error('beryllium') is-invalid @enderror" value="{{ old('beryllium',$QualityStd->beryllium) }}" />
                                                            @error('beryllium')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>

                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Boron (B)</label>
                                                        <div class="col-sm-5">
                                                            <input name="boron" type="text" class="form-control form-control-sm @error('boron') is-invalid @enderror" value="{{ old('boron',$QualityStd->boron) }}" />
                                                            @error('boron')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Cadmium (Cd)</label>
                                                        <div class="col-sm-5">
                                                            <input name="cadmium" type="text" class="form-control form-control-sm @error('cadmium') is-invalid @enderror" value="{{ old('cadmium',$QualityStd->cadmium) }}" />
                                                            @error('cadmium')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Chromium Hexavalent (Cr-VI)</label>
                                                        <div class="col-sm-5">
                                                            <input name="hexavalent" type="text" class="form-control form-control-sm @error('hexavalent') is-invalid @enderror" value="{{ old('hexavalent',$QualityStd->hexavalent) }}" />
                                                            @error('hexavalent')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Chromium (Cr)</label>
                                                        <div class="col-sm-5">
                                                            <input name="chromium_cr" type="text" class="form-control form-control-sm @error('chromium_cr') is-invalid @enderror" value="{{ old('chromium_cr',$QualityStd->chromium_cr) }}" />
                                                            @error('chromium_cr')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Copper (Cu)</label>
                                                        <div class="col-sm-5">
                                                            <input name="copper" type="text" class="form-control form-control-sm @error('copper') is-invalid @enderror" value="{{ old('copper',$QualityStd->copper) }}" />
                                                            @error('copper')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Iodide, I-</label>
                                                        <div class="col-sm-5">
                                                            <input name="iodide" type="text" class="form-control form-control-sm @error('iodide') is-invalid @enderror" value="{{ old('iodide',$QualityStd->iodide) }}" />
                                                            @error('iodide')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Lead (Pb)</label>
                                                        <div class="col-sm-5">
                                                            <input name="lead" type="text" class="form-control form-control-sm @error('lead') is-invalid @enderror" value="{{ old('lead',$QualityStd->lead) }}" />
                                                            @error('lead')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Mercury (Hg)</label>
                                                        <div class="col-sm-5">
                                                            <input name="mercury" type="text" class="form-control form-control-sm @error('mercury') is-invalid @enderror" value="{{ old('mercury',$QualityStd->mercury) }}" />
                                                            @error('mercury')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Molybdenum, Mo</label>
                                                        <div class="col-sm-5">
                                                            <input name="molybdenum" type="text" class="form-control form-control-sm @error('molybdenum') is-invalid @enderror" value="{{ old('molybdenum',$QualityStd->molybdenum) }}" />
                                                            @error('molybdenum')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Nickel, Ni</label>
                                                        <div class="col-sm-5">
                                                            <input name="nickel" type="text" class="form-control form-control-sm @error('nickel') is-invalid @enderror" value="{{ old('nickel',$QualityStd->nickel) }}" />
                                                            @error('nickel')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Selenium (Se)</label>
                                                        <div class="col-sm-5">
                                                            <input name="selenium" type="text" class="form-control form-control-sm @error('selenium') is-invalid @enderror" value="{{ old('selenium',$QualityStd->selenium) }}" />
                                                            @error('selenium')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Silver (Ag)</label>
                                                        <div class="col-sm-5">
                                                            <input name="silver" type="text" class="form-control form-control-sm @error('silver') is-invalid @enderror" value="{{ old('silver',$QualityStd->silver) }}" />
                                                            @error('silver')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Tributyl Tin Oxide (as Organotins) **</label>
                                                        <div class="col-sm-5">
                                                            <input name="tributyl" type="text" class="form-control form-control-sm @error('tributyl') is-invalid @enderror" value="{{ old('tributyl',$QualityStd->tributyl) }}" />
                                                            @error('tributyl')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-6 col-form-label">Zinc (Zn)</label>
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
                            <div class="tab-pane fade" id="custom-content-above-Inorganic" role="tabpanel" aria-labelledby="custom-content-above-Inorganic-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-2 col-form-label">Chloride, Cl- </label>
                                                        <div class="col-sm-6">
                                                            <input name="chloride_cl" type="text" class="form-control form-control-sm @error('chloride_cl') is-invalid @enderror" value="{{ old('chloride_cl',$QualityStd->chloride_cl) }}" />
                                                            @error('chloride_cl')
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
                                                        <label style="font-size: 10px" class="col-sm-2 col-form-label">Free Cyanide</label>
                                                        <div class="col-sm-6">
                                                            <input name="free_cyanide" type="text" class="form-control form-control-sm @error('free_cyanide') is-invalid @enderror" value="{{ old('free_cyanide',$QualityStd->free_cyanide) }}" />
                                                            @error('free_cyanide')
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
                                                        <label style="font-size: 10px" class="col-sm-2 col-form-label">Total Cyanide</label>
                                                        <div class="col-sm-6">
                                                            <input name="total_cyanide" type="text" class="form-control form-control-sm @error('total_cyanide') is-invalid @enderror" value="{{ old('total_cyanide',$QualityStd->total_cyanide) }}" />
                                                            @error('total_cyanide')
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
                                                        <label style="font-size: 10px" class="col-sm-2 col-form-label">Fluoride</label>
                                                        <div class="col-sm-6">
                                                            <input name="fluoride" type="text" class="form-control form-control-sm @error('fluoride') is-invalid @enderror" value="{{ old('fluoride',$QualityStd->fluoride) }}" />
                                                            @error('fluoride')
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
                                                        <label style="font-size: 10px" class="col-sm-2 col-form-label">Nitrite (NO2)</label>
                                                        <div class="col-sm-6">
                                                            <input name="nitrite_no2" type="text" class="form-control form-control-sm @error('nitrite_no2') is-invalid @enderror" value="{{ old('nitrite_no2',$QualityStd->nitrite_no2) }}" />
                                                            @error('nitrite_no2')
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
                                                        <label style="font-size: 10px" class="col-sm-2 col-form-label">Nitrate/Nitrite</label>
                                                        <div class="col-sm-6">
                                                            <input name="nitrate" type="text" class="form-control form-control-sm @error('nitrate') is-invalid @enderror" value="{{ old('nitrate',$QualityStd->nitrate) }}" />
                                                            @error('nitrate')
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
                            <div class="tab-pane fade" id="custom-content-above-Organic" role="tabpanel" aria-labelledby="custom-content-above-Organic-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Aldrin + Dieldrin</label>
                                                        <div class="col-sm-5">
                                                            <input name="aldrin" type="text" class="form-control form-control-sm @error('aldrin') is-invalid @enderror" value="{{ old('aldrin',$QualityStd->aldrin) }}" />
                                                            @error('aldrin')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Dieldrin</label>
                                                        <div class="col-sm-5">
                                                            <input name="dieldrin" type="text" class="form-control form-control-sm @error('dieldrin') is-invalid @enderror" value="{{ old('dieldrin',$QualityStd->dieldrin) }}" />
                                                            @error('dieldrin')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Benzo (a) pyrene</label>
                                                        <div class="col-sm-5">
                                                            <input name="benzo_a_pyrene" type="text" class="form-control form-control-sm @error('benzo_a_pyrene') is-invalid @enderror" value="{{ old('benzo_a_pyrene',$QualityStd->benzo_a_pyrene) }}" />
                                                            @error('benzo_a_pyrene')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Carbon tetrachloride</label>
                                                        <div class="col-sm-5">
                                                            <input name="tetrachloride" type="text" class="form-control form-control-sm @error('tetrachloride') is-invalid @enderror" value="{{ old('tetrachloride',$QualityStd->tetrachloride) }}" />
                                                            @error('tetrachloride')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Chlordane</label>
                                                        <div class="col-sm-5">
                                                            <input name="chlordane" type="text" class="form-control form-control-sm @error('chlordane') is-invalid @enderror" value="{{ old('chlordane',$QualityStd->chlordane) }}" />
                                                            @error('chlordane')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Chlorobenzene</label>
                                                        <div class="col-sm-5">
                                                            <input name="chlorobenzene" type="text" class="form-control form-control-sm @error('chlorobenzene') is-invalid @enderror" value="{{ old('chlorobenzene',$QualityStd->chlorobenzene) }}" />
                                                            @error('chlorobenzene')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">2-Chlorophenol</label>
                                                        <div class="col-sm-5">
                                                            <input name="chlorophenol2" type="text" class="form-control form-control-sm @error('chlorophenol2') is-invalid @enderror" value="{{ old('chlorophenol2',$QualityStd->chlorophenol2) }}" />
                                                            @error('chlorophenol2')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Chloroform</label>
                                                        <div class="col-sm-5">
                                                            <input name="chloroform" type="text" class="form-control form-control-sm @error('chloroform') is-invalid @enderror" value="{{ old('chloroform',$QualityStd->chloroform) }}" />
                                                            @error('chloroform')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">o-Cresol</label>
                                                        <div class="col-sm-5">
                                                            <input name="o_cresol" type="text" class="form-control form-control-sm @error('o_cresol') is-invalid @enderror" value="{{ old('o_cresol',$QualityStd->o_cresol) }}" />
                                                            @error('o_cresol')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">m-Cresol</label>
                                                        <div class="col-sm-5">
                                                            <input name="m_cresol" type="text" class="form-control form-control-sm @error('m_cresol') is-invalid @enderror" value="{{ old('m_cresol',$QualityStd->m_cresol) }}" />
                                                            @error('m_cresol')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">p-Cresol</label>
                                                        <div class="col-sm-5">
                                                            <input name="p_cresol" type="text" class="form-control form-control-sm @error('p_cresol') is-invalid @enderror" value="{{ old('p_cresol',$QualityStd->p_cresol) }}" />
                                                            @error('p_cresol')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total-cresol</label>
                                                        <div class="col-sm-5">
                                                            <input name="total_cresol" type="text" class="form-control form-control-sm @error('total_cresol') is-invalid @enderror" value="{{ old('total_cresol',$QualityStd->total_cresol) }}" />
                                                            @error('total_cresol')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Di(2-Ethylhexyl)Phthalate**</label>
                                                        <div class="col-sm-5">
                                                            <input name="ethylhexylphthalate" type="text" class="form-control form-control-sm @error('ethylhexylphthalate') is-invalid @enderror" value="{{ old('ethylhexylphthalate',$QualityStd->ethylhexylphthalate) }}" />
                                                            @error('ethylhexylphthalate')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">2,4-D</label>
                                                        <div class="col-sm-5">
                                                            <input name="d" type="text" class="form-control form-control-sm @error('d') is-invalid @enderror" value="{{ old('d',$QualityStd->d) }}" />
                                                            @error('d')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">1,2-Dichlorobenzene</label>
                                                        <div class="col-sm-5">
                                                            <input name="dichlorobenzene2" type="text" class="form-control form-control-sm @error('dichlorobenzene2') is-invalid @enderror" value="{{ old('dichlorobenzene2',$QualityStd->dichlorobenzene2) }}" />
                                                            @error('dichlorobenzene2')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">1,4-Dichlorobenzene</label>
                                                        <div class="col-sm-5">
                                                            <input name="dichlorobenzene4" type="text" class="form-control form-control-sm @error('dichlorobenzene4') is-invalid @enderror" value="{{ old('dichlorobenzene4',$QualityStd->dichlorobenzene4) }}" />
                                                            @error('dichlorobenzene4')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">1,2-Dichloroethane</label>
                                                        <div class="col-sm-5">
                                                            <input name="dichloroethane1" type="text" class="form-control form-control-sm @error('dichloroethane1') is-invalid @enderror" value="{{ old('dichloroethane1',$QualityStd->dichloroethane1) }}" />
                                                            @error('dichloroethane1')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">1,1-Dichloroethylene</label>
                                                        <div class="col-sm-5">
                                                            <input name="dichloroethylene" type="text" class="form-control form-control-sm @error('dichloroethylene') is-invalid @enderror" value="{{ old('dichloroethylene',$QualityStd->dichloroethylene) }}" />
                                                            @error('dichloroethylene')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">1,1-Dichloroethene</label>
                                                        <div class="col-sm-5">
                                                            <input name="dichloroethene2" type="text" class="form-control form-control-sm @error('dichloroethene2') is-invalid @enderror" value="{{ old('dichloroethene2',$QualityStd->dichloroethene2) }}" />
                                                            @error('dichloroethene2')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">1,2-Dichloroethene</label>
                                                        <div class="col-sm-5">
                                                            <input name="dichloroethene3" type="text" class="form-control form-control-sm @error('dichloroethene3') is-invalid @enderror" value="{{ old('dichloroethene3',$QualityStd->dichloroethene3) }}" />
                                                            @error('dichloroethene3')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Dichloromethane</label>
                                                        <div class="col-sm-5">
                                                            <input name="dichloromethane" type="text" class="form-control form-control-sm @error('dichloromethane') is-invalid @enderror" value="{{ old('dichloromethane',$QualityStd->dichloromethane) }}" />
                                                            @error('dichloromethane')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">2,4-Dichlorophenol</label>
                                                        <div class="col-sm-5">
                                                            <input name="dichlorophenol" type="text" class="form-control form-control-sm @error('dichlorophenol') is-invalid @enderror" value="{{ old('dichlorophenol',$QualityStd->dichlorophenol) }}" />
                                                            @error('dichlorophenol')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">2,4-Dinitrotoluene</label>
                                                        <div class="col-sm-5">
                                                            <input name="dinitrotoluene" type="text" class="form-control form-control-sm @error('dinitrotoluene') is-invalid @enderror" value="{{ old('dinitrotoluene',$QualityStd->dinitrotoluene) }}" />
                                                            @error('dinitrotoluene')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Ethyl Benzene</label>
                                                        <div class="col-sm-5">
                                                            <input name="ethyl_benzene" type="text" class="form-control form-control-sm @error('ethyl_benzene') is-invalid @enderror" value="{{ old('ethyl_benzene',$QualityStd->ethyl_benzene) }}" />
                                                            @error('ethyl_benzene')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">thylenediaminetetraacetic acid (EDTA)**</label>
                                                        <div class="col-sm-5">
                                                            <input name="thylenediaminetetraacetic" type="text" class="form-control form-control-sm @error('thylenediaminetetraacetic') is-invalid @enderror" value="{{ old('thylenediaminetetraacetic',$QualityStd->thylenediaminetetraacetic) }}" />
                                                            @error('thylenediaminetetraacetic')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Formaldehyde</label>
                                                        <div class="col-sm-5">
                                                            <input name="formaldehyde" type="text" class="form-control form-control-sm @error('formaldehyde') is-invalid @enderror" value="{{ old('formaldehyde',$QualityStd->formaldehyde) }}" />
                                                            @error('formaldehyde')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Hexachloro-1,3 butadiene</label>
                                                        <div class="col-sm-5">
                                                            <input name="hexachloro" type="text" class="form-control form-control-sm @error('hexachloro') is-invalid @enderror" value="{{ old('hexachloro',$QualityStd->hexachloro) }}" />
                                                            @error('hexachloro')
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
                                                            <input name="endrin" type="text" class="form-control form-control-sm @error('endrin') is-invalid @enderror" value="{{ old('endrin',$QualityStd->endrin) }}" />
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Heptachlor + Heptachlor epoxide</label>
                                                        <div class="col-sm-5">
                                                            <input name="heptachlor" type="text" class="form-control form-control-sm @error('heptachlor') is-invalid @enderror" value="{{ old('heptachlor',$QualityStd->heptachlor) }}" />
                                                            @error('heptachlor')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Hexachlorobenzene</label>
                                                        <div class="col-sm-5">
                                                            <input name="hexachlorobenzene" type="text" class="form-control form-control-sm @error('hexachlorobenzene') is-invalid @enderror" value="{{ old('hexachlorobenzene',$QualityStd->hexachlorobenzene) }}" />
                                                            @error('hexachlorobenzene')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Hexachlorobutadiene</label>
                                                        <div class="col-sm-5">
                                                            <input name="hexachlorobutadiene" type="text" class="form-control form-control-sm @error('hexachlorobutadiene') is-invalid @enderror" value="{{ old('hexachlorobutadiene',$QualityStd->hexachlorobutadiene) }}" />
                                                            @error('hexachlorobutadiene')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Hexachloroethane</label>
                                                        <div class="col-sm-5">
                                                            <input name="hexachloroethane" type="text" class="form-control form-control-sm @error('hexachloroethane') is-invalid @enderror" value="{{ old('hexachloroethane',$QualityStd->hexachloroethane) }}" />
                                                            @error('hexachloroethane')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total Phenols</label>
                                                        <div class="col-sm-5">
                                                            <input name="total_phenols" type="text" class="form-control form-control-sm @error('total_phenols') is-invalid @enderror" value="{{ old('total_phenols',$QualityStd->total_phenols) }}" />
                                                            @error('total_phenols')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Lindane</label>
                                                        <div class="col-sm-5">
                                                            <input name="lindane" type="text" class="form-control form-control-sm @error('lindane') is-invalid @enderror" value="{{ old('lindane',$QualityStd->lindane) }}" />
                                                            @error('lindane')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Methoxychlor</label>
                                                        <div class="col-sm-5">
                                                            <input name="methoxychlor1" type="text" class="form-control form-control-sm @error('methoxychlor1') is-invalid @enderror" value="{{ old('methoxychlor1',$QualityStd->methoxychlor1) }}" />
                                                            @error('methoxychlor1')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Methyl ethyl ketone</label>
                                                        <div class="col-sm-5">
                                                            <input name="ketone" type="text" class="form-control form-control-sm @error('ketone') is-invalid @enderror" value="{{ old('ketone',$QualityStd->ketone) }}" />
                                                            @error('ketone')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Methyl Parathion</label>
                                                        <div class="col-sm-5">
                                                            <input name="parathion1" type="text" class="form-control form-control-sm @error('parathion1') is-invalid @enderror" value="{{ old('parathion1',$QualityStd->parathion1) }}" />
                                                            @error('parathion1')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Nitrobenzene</label>
                                                        <div class="col-sm-5">
                                                            <input name="nitrobenzene" type="text" class="form-control form-control-sm @error('nitrobenzene') is-invalid @enderror" value="{{ old('nitrobenzene',$QualityStd->nitrobenzene) }}" />
                                                            @error('nitrobenzene')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Styrene</label>
                                                        <div class="col-sm-5">
                                                            <input name="styrene" type="text" class="form-control form-control-sm @error('styrene') is-invalid @enderror" value="{{ old('styrene',$QualityStd->styrene) }}" />
                                                            @error('styrene')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">1,1,1,2-Tetrachloroethane</label>
                                                        <div class="col-sm-5">
                                                            <input name="tetrachloroethane1" type="text" class="form-control form-control-sm @error('tetrachloroethane1') is-invalid @enderror" value="{{ old('tetrachloroethane1',$QualityStd->tetrachloroethane1) }}" />
                                                            @error('tetrachloroethane1')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">1,1,2,2-Tetrachloroethane</label>
                                                        <div class="col-sm-5">
                                                            <input name="tetrachloroethane2" type="text" class="form-control form-control-sm @error('tetrachloroethane2') is-invalid @enderror" value="{{ old('tetrachloroethane2',$QualityStd->tetrachloroethane2) }}" />
                                                            @error('tetrachloroethane2')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Nitriloacetic acid</label>
                                                        <div class="col-sm-5">
                                                            <input name="nitriloacetic" type="text" class="form-control form-control-sm @error('nitriloacetic') is-invalid @enderror" value="{{ old('nitriloacetic',$QualityStd->nitriloacetic) }}" />
                                                            @error('nitriloacetic')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Pentachlorophenol</label>
                                                        <div class="col-sm-5">
                                                            <input name="pentachlorophenol" type="text" class="form-control form-control-sm @error('pentachlorophenol') is-invalid @enderror" value="{{ old('pentachlorophenol',$QualityStd->pentachlorophenol) }}" />
                                                            @error('pentachlorophenol')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Pyridine</label>
                                                        <div class="col-sm-5">
                                                            <input name="pyridine" type="text" class="form-control form-control-sm @error('pyridine') is-invalid @enderror" value="{{ old('pyridine',$QualityStd->pyridine) }}" />
                                                            @error('pyridine')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Toxaphene</label>
                                                        <div class="col-sm-5">
                                                            <input name="toxaphene1" type="text" class="form-control form-control-sm @error('toxaphene1') is-invalid @enderror" value="{{ old('toxaphene1',$QualityStd->toxaphene1) }}" />
                                                            @error('toxaphene1')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Parathion</label>
                                                        <div class="col-sm-5">
                                                            <input name="parathion" type="text" class="form-control form-control-sm @error('parathion') is-invalid @enderror" value="{{ old('parathion',$QualityStd->parathion) }}" />
                                                            @error('parathion')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Total Poly Chlor Biphenyl (PCB)</label>
                                                        <div class="col-sm-5">
                                                            <input name="total_chlor" type="text" class="form-control form-control-sm @error('total_chlor') is-invalid @enderror" value="{{ old('total_chlor',$QualityStd->total_chlor) }}" />
                                                            @error('total_chlor')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Tetrachloroethene (PCE)</label>
                                                        <div class="col-sm-5">
                                                            <input name="tetrachloroethene" type="text" class="form-control form-control-sm @error('tetrachloroethene') is-invalid @enderror" value="{{ old('tetrachloroethene',$QualityStd->tetrachloroethene) }}" />
                                                            @error('tetrachloroethene')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Toluene</label>
                                                        <div class="col-sm-5">
                                                            <input name="toluene" type="text" class="form-control form-control-sm @error('toluene') is-invalid @enderror" value="{{ old('toluene',$QualityStd->toluene) }}" />
                                                            @error('toluene')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Trichlorobenzene</label>
                                                        <div class="col-sm-5">
                                                            <input name="trichlorobenzene" type="text" class="form-control form-control-sm @error('trichlorobenzene') is-invalid @enderror" value="{{ old('trichlorobenzene',$QualityStd->trichlorobenzene) }}" />
                                                            @error('trichlorobenzene')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">1,1,1-Trichloroethane (Methoxychlor)</label>
                                                        <div class="col-sm-5">
                                                            <input name="methoxychlor2" type="text" class="form-control form-control-sm @error('methoxychlor2') is-invalid @enderror" value="{{ old('methoxychlor2',$QualityStd->methoxychlor2) }}" />
                                                            @error('methoxychlor2')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">1,1,2-Trichloroethane</label>
                                                        <div class="col-sm-5">
                                                            <input name="trichloroethane1" type="text" class="form-control form-control-sm @error('trichloroethane1') is-invalid @enderror" value="{{ old('trichloroethane1',$QualityStd->trichloroethane1) }}" />
                                                            @error('trichloroethane1')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Trichloroethene*</label>
                                                        <div class="col-sm-5">
                                                            <input name="trichloroethene2" type="text" class="form-control form-control-sm @error('trichloroethene2') is-invalid @enderror" value="{{ old('trichloroethene2',$QualityStd->trichloroethene2) }}" />
                                                            @error('trichloroethene2')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Toxaphene</label>
                                                        <div class="col-sm-5">
                                                            <input name="toxaphene2" type="text" class="form-control form-control-sm @error('toxaphene2') is-invalid @enderror" value="{{ old('toxaphene2',$QualityStd->toxaphene2) }}" />
                                                            @error('toxaphene2')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Trichloroethylene (TCE)</label>
                                                        <div class="col-sm-5">
                                                            <input name="trichloroethylene" type="text" class="form-control form-control-sm @error('trichloroethylene') is-invalid @enderror" value="{{ old('trichloroethylene',$QualityStd->trichloroethylene) }}" />
                                                            @error('trichloroethylene')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Trihalomethanes</label>
                                                        <div class="col-sm-5">
                                                            <input name="trihalomethanes" type="text" class="form-control form-control-sm @error('trihalomethanes') is-invalid @enderror" value="{{ old('trihalomethanes',$QualityStd->trihalomethanes) }}" />
                                                            @error('trihalomethanes')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">2,4,5-Trichlorophenol</label>
                                                        <div class="col-sm-5">
                                                            <input name="trichlorophenol5" type="text" class="form-control form-control-sm @error('trichlorophenol5') is-invalid @enderror" value="{{ old('trichlorophenol5',$QualityStd->trichlorophenol5) }}" />
                                                            @error('trichlorophenol5')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">2,4,6-Trichlorophenol</label>
                                                        <div class="col-sm-5">
                                                            <input name="trichlorophenol6" type="text" class="form-control form-control-sm @error('trichlorophenol6') is-invalid @enderror" value="{{ old('trichlorophenol6',$QualityStd->trichlorophenol6) }}" />
                                                            @error('trichlorophenol6')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">2,4,5-TP (Silvex)</label>
                                                        <div class="col-sm-5">
                                                            <input name="tp_silvex" type="text" class="form-control form-control-sm @error('tp_silvex') is-invalid @enderror" value="{{ old('tp_silvex',$QualityStd->tp_silvex) }}" />
                                                            @error('tp_silvex')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Vinyl Chloride</label>
                                                        <div class="col-sm-5">
                                                            <input name="vinyl_chloride" type="text" class="form-control form-control-sm @error('vinyl_chloride') is-invalid @enderror" value="{{ old('vinyl_chloride',$QualityStd->vinyl_chloride) }}" />
                                                            @error('vinyl_chloride')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Xylenes Total</label>
                                                        <div class="col-sm-5">
                                                            <input name="xylenes_total" type="text" class="form-control form-control-sm @error('xylenes_total') is-invalid @enderror" value="{{ old('xylenes_total',$QualityStd->xylenes_total) }}" />
                                                            @error('xylenes_total')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">DDT + DDD + DDE*</label>
                                                        <div class="col-sm-5">
                                                            <input name="ddt_ddd_dde" type="text" class="form-control form-control-sm @error('ddt_ddd_dde') is-invalid @enderror" value="{{ old('ddt_ddd_dde',$QualityStd->ddt_ddd_dde) }}" />
                                                            @error('ddt_ddd_dde')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">2.4-D (2.4-dichlorophenoxyacetic acid)*</label>
                                                        <div class="col-sm-5">
                                                            <input name="dichlorophenoxyacetic" type="text" class="form-control form-control-sm @error('dichlorophenoxyacetic') is-invalid @enderror" value="{{ old('dichlorophenoxyacetic',$QualityStd->dichlorophenoxyacetic) }}" />
                                                            @error('dichlorophenoxyacetic')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                        </div><!-- end row -->
                                        <div class="card-footer d-flex justify-content-end">
                                            <button type="submit" class="btn bg-gradient-success btn-sm ">Save</button>
                                        </div>
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