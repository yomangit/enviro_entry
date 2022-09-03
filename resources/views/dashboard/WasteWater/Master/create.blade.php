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
                <div class="card-header p-0 p-2">
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


                    <div class="card-title">Form Input</div>



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
                            <form action="/wastewater" method="post" checked enctype="multipart/form-data" autocomplete="off">
                                @csrf

                                <div class="row mt-2">
                                    <div class="col-12 col-sm-3">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Code Sample</label>
                                            <div class="col-sm-7">
                                                <select class="form-control form-control-sm " name="point_id">
                                                    @foreach ($code_units as $code)
                                                    @if (old('point_id')==$code->id)
                                                    <option value="{{$code->id}}" selected>{{$code->nama}}</option>
                                                    @else
                                                    <option value="{{$code->id}}">{{$code->nama}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
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
                                                            <input name="tds" type="text" class="form-control form-control-sm @error('tds') is-invalid @enderror" value="{{ old('tds') }}" />
                                                            @error('tds')
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
                                                            <input name="tss" type="text" class="form-control form-control-sm @error('tss') is-invalid @enderror" value="{{ old('tss') }}" />
                                                            @error('tss')
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
                                                            <input name="alkalinity_as_caco3" type="text" class="form-control form-control-sm @error('alkalinity_as_caco3') is-invalid @enderror" value="{{ old('alkalinity_as_caco3') }}" />
                                                            @error('alkalinity_as_caco3')
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
                                                            <input name="alkalinity_carbonate" type="text" class="form-control form-control-sm @error('alkalinity_carbonate') is-invalid @enderror" value="{{ old('alkalinity_carbonate') }}" />
                                                            @error('alkalinity_carbonate')
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
                                                            <input name="alkalinity_bicarbonate" type="text" class="form-control form-control-sm @error('alkalinity_bicarbonate') is-invalid @enderror" value="{{ old('alkalinity_bicarbonate') }}" />
                                                            @error('alkalinity_bicarbonate')
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
                                                            <input name="do" type="text" class="form-control form-control-sm @error('do') is-invalid @enderror" value="{{ old('do') }}" />
                                                            @error('do')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">pH</label>
                                                        <div class="col-sm-5">
                                                            <input name="ph" type="text" class="form-control form-control-sm @error('ph') is-invalid @enderror" value="{{ old('ph') }}" />
                                                            @error('ph')
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
                                                            <input name="alkalinity_total" type="text" class="form-control form-control-sm @error('alkalinity_total') is-invalid @enderror" value="{{ old('alkalinity_total') }}" />
                                                            @error('alkalinity_total')
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
                                                            <input name="cl" type="text" class="form-control form-control-sm @error('cl') is-invalid @enderror" value="{{ old('cl') }}" />
                                                            @error('cl')
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
                                                            <input name="fluoride" type="text" class="form-control form-control-sm @error('fluoride') is-invalid @enderror" value="{{ old('fluoride') }}" />
                                                            @error('fluoride')
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
                                                            <input name="sulphate" type="text" class="form-control form-control-sm @error('sulphate') is-invalid @enderror" value="{{ old('sulphate') }}" />
                                                            @error('sulphate')
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
                                                            <input name="sulphite" type="text" class="form-control form-control-sm @error('sulphite') is-invalid @enderror" value="{{ old('sulphite') }}" />
                                                            @error('sulphite')
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
                                                            <input name="free_chlorine" type="text" class="form-control form-control-sm @error('free_chlorine') is-invalid @enderror" value="{{ old('free_chlorine') }}" />
                                                            @error('free_chlorine')
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
                                                            <input name="fcn" type="text" class="form-control form-control-sm @error('fcn') is-invalid @enderror" value="{{ old('fcn') }}" />
                                                            @error('fcn')
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
                                                            <input name="total_cyanide" type="text" class="form-control form-control-sm @error('total_cyanide') is-invalid @enderror" value="{{ old('total_cyanide') }}" />
                                                            @error('total_cyanide')
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
                                                            <input name="wad_cyanide" type="text" class="form-control form-control-sm @error('wad_cyanide') is-invalid @enderror" value="{{ old('wad_cyanide') }}" />
                                                            @error('wad_cyanide')
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
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Ammonia (N-NH3) </label>
                                                        <div class="col-sm-5">
                                                            <input name="ammonia" type="text" class="form-control form-control-sm @error('ammonia') is-invalid @enderror" value="{{ old('ammonia') }}" />
                                                            @error('ammonia')
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
                                                            <input name="nitrate" type="text" class="form-control form-control-sm @error('nitrate') is-invalid @enderror" value="{{ old('nitrate') }}" />
                                                            @error('nitrate')
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
                                                            <input name="nitrite" type="text" class="form-control form-control-sm @error('nitrite') is-invalid @enderror" value="{{ old('nitrite') }}" />
                                                            @error('nitrite')
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
                                                            <input name="phosphate" type="text" class="form-control form-control-sm @error('phosphate') is-invalid @enderror" value="{{ old('phosphate') }}" />
                                                            @error('phosphate')
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
                                                            <input name="total_phosphate" type="text" class="form-control form-control-sm @error('total_phosphate') is-invalid @enderror" value="{{ old('total_phosphate') }}" />
                                                            @error('total_phosphate')
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
                                                            <input name="aluminium" type="text" class="form-control form-control-sm @error('aluminium') is-invalid @enderror" value="{{ old('aluminium') }}" />
                                                            @error('aluminium')
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
                                                            <input name="antimony" type="text" class="form-control form-control-sm @error('antimony') is-invalid @enderror" value="{{ old('antimony') }}" />
                                                            @error('antimony')
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
                                                            <input name="arsenic" type="text" class="form-control form-control-sm @error('arsenic') is-invalid @enderror" value="{{ old('arsenic') }}" />
                                                            @error('arsenic')
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
                                                            <input name="barium" type="text" class="form-control form-control-sm @error('barium') is-invalid @enderror" value="{{ old('barium') }}" />
                                                            @error('barium')
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
                                                            <input name="cadmium" type="text" class="form-control form-control-sm @error('cadmium') is-invalid @enderror" value="{{ old('cadmium') }}" />
                                                            @error('cadmium')
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
                                                            <input name="calcium" type="text" class="form-control form-control-sm @error('calcium') is-invalid @enderror" value="{{ old('calcium') }}" />
                                                            @error('calcium')
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
                                                            <input name="chromium" type="text" class="form-control form-control-sm @error('chromium') is-invalid @enderror" value="{{ old('chromium') }}" />
                                                            @error('chromium')
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
                                                            <input name="chromium_hexavalent" type="text" class="form-control form-control-sm @error('chromium_hexavalent') is-invalid @enderror" value="{{ old('chromium_hexavalent') }}" />
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
                                                            <input name="cobalt" type="text" class="form-control form-control-sm @error('cobalt') is-invalid @enderror" value="{{ old('cobalt') }}" />
                                                            @error('cobalt')
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
                                                            <input name="copper" type="text" class="form-control form-control-sm @error('copper') is-invalid @enderror" value="{{ old('copper') }}" />
                                                            @error('copper')
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
                                                            <input name="iron" type="text" class="form-control form-control-sm @error('iron') is-invalid @enderror" value="{{ old('iron') }}" />
                                                            @error('iron')
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
                                                            <input name="lead" type="text" class="form-control form-control-sm @error('lead') is-invalid @enderror" value="{{ old('lead') }}" />
                                                            @error('lead')
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
                                                            <input name="magnesium" type="text" class="form-control form-control-sm @error('magnesium') is-invalid @enderror" value="{{ old('magnesium') }}" />
                                                            @error('magnesium')
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
                                                            <input name="manganese" type="text" class="form-control form-control-sm @error('manganese') is-invalid @enderror" value="{{ old('manganese') }}" />
                                                            @error('manganese')
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
                                                            <input name="mercury" type="text" class="form-control form-control-sm @error('mercury') is-invalid @enderror" value="{{ old('mercury') }}" />
                                                            @error('mercury')
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
                                                            <input name="nickel" type="text" class="form-control form-control-sm @error('nickel') is-invalid @enderror" value="{{ old('nickel') }}" />
                                                            @error('nickel')
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
                                                            <input name="selenium" type="text" class="form-control form-control-sm @error('selenium') is-invalid @enderror" value="{{ old('selenium') }}" />
                                                            @error('selenium')
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
                                                            <input name="silver" type="text" class="form-control form-control-sm @error('silver') is-invalid @enderror" value="{{ old('silver') }}" />
                                                            @error('silver')
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
                                                            <input name="sodium" type="text" class="form-control form-control-sm @error('sodium') is-invalid @enderror" value="{{ old('sodium') }}" />
                                                            @error('sodium')
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
                                                            <input name="tin" type="text" class="form-control form-control-sm @error('tin') is-invalid @enderror" value="{{ old('tin') }}" />
                                                            @error('tin')
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
                                                            <input name="zinc" type="text" class="form-control form-control-sm @error('zinc') is-invalid @enderror" value="{{ old('zinc') }}" />
                                                            @error('zinc')
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
                                                            <input name="aluminium_t_ai" type="text" class="form-control form-control-sm @error('aluminium_t_ai') is-invalid @enderror" value="{{ old('aluminium_t_ai') }}" />
                                                            @error('aluminium_t_ai')
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
                                                            <input name="arsenic_t_as" type="text" class="form-control form-control-sm @error('arsenic_t_as') is-invalid @enderror" value="{{ old('arsenic_t_as') }}" />
                                                            @error('arsenic_t_as')
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
                                                            <input name="cadmium_t_cd" type="text" class="form-control form-control-sm @error('cadmium_t_cd') is-invalid @enderror" value="{{ old('cadmium_t_cd') }}" />
                                                            @error('cadmium_t_cd')
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
                                                            <input name="chromium_t" type="text" class="form-control form-control-sm @error('chromium_t') is-invalid @enderror" value="{{ old('chromium_t') }}" />
                                                            @error('chromium_t')
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
                                                            <input name="chromium_hexavalent_t" type="text" class="form-control form-control-sm @error('chromium_hexavalent_t') is-invalid @enderror" value="{{ old('chromium_hexavalent_t') }}" />
                                                            @error('chromium_hexavalent_t')
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
                                                            <input name="cobalt_t" type="text" class="form-control form-control-sm @error('cobalt_t') is-invalid @enderror" value="{{ old('cobalt_t') }}" />
                                                            @error('cobalt_t')
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
                                                            <input name="cooper" type="text" class="form-control form-control-sm @error('cooper') is-invalid @enderror" value="{{ old('cooper') }}" />
                                                            @error('cooper')
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
                                                            <input name="lead_t" type="text" class="form-control form-control-sm @error('lead_t') is-invalid @enderror" value="{{ old('lead_t') }}" />
                                                            @error('lead_t')
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
                                                            <input name="selenium_t" type="text" class="form-control form-control-sm @error('selenium_t') is-invalid @enderror" value="{{ old('selenium_t') }}" />
                                                            @error('selenium_t')
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
                                                            <input name="mercury_t" type="text" class="form-control form-control-sm @error('mercury_t') is-invalid @enderror" value="{{ old('mercury_t') }}" />
                                                            @error('mercury_t')
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
                                                            <input name="nickel_t" type="text" class="form-control form-control-sm @error('nickel_t') is-invalid @enderror" value="{{ old('nickel_t') }}" />
                                                            @error('nickel_t')
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
                                                            <input name="zinc_t" type="text" class="form-control form-control-sm @error('zinc_t') is-invalid @enderror" value="{{ old('zinc_t') }}" />
                                                            @error('zinc_t')
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
                                                            <input name="oil_and_grease" type="text" class="form-control form-control-sm @error('oil_and_grease') is-invalid @enderror" value="{{ old('oil_and_grease') }}" />
                                                            @error('oil_and_grease')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Phenols</label>
                                                        <div class="col-sm-5">
                                                            <input name="phenols" type="text" class="form-control form-control-sm @error('phenols') is-invalid @enderror" value="{{ old('phenols') }}" />
                                                            @error('phenols')
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
                                                            <input name="surfactant" type="text" class="form-control form-control-sm @error('surfactant') is-invalid @enderror" value="{{ old('surfactant') }}" />
                                                            @error('surfactant')
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
                                                            <input name="total_pcb" type="text" class="form-control form-control-sm @error('total_pcb') is-invalid @enderror" value="{{ old('total_pcb') }}" />
                                                            @error('total_pcb')
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
                                                            <input name="a_o_x" type="text" class="form-control form-control-sm @error('a_o_x') is-invalid @enderror" value="{{ old('a_o_x') }}" />
                                                            @error('a_o_x')
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
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-group row">
                                                        <label style="font-size: 10px" class="col-sm-5 col-form-label">Fecal Coliformi</label>
                                                        <div class="col-sm-5">
                                                            <input name="fecal_coliform" type="text" class="form-control form-control-sm @error('fecal_coliform') is-invalid @enderror" value="{{ old('fecal_coliform') }}" />
                                                            @error('fecal_coliform')
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
                                                            <input name="e_coli" type="text" class="form-control form-control-sm @error('e_coli') is-invalid @enderror" value="{{ old('e_coli') }}" />
                                                            @error('e_coli')
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
                                                            <input name="total_coliform_bacteria" type="text" class="form-control form-control-sm @error('total_coliform_bacteria') is-invalid @enderror" value="{{ old('total_coliform_bacteria') }}" />
                                                            @error('total_coliform_bacteria')
                                                            <span class=" invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-end">
                                            <button type="submit" class="btn bg-gradient-primary btn-sm ">Create</button>
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