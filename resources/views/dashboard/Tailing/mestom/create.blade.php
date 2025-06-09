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
                            <li class="breadcrumb-item"><a href="/mestoms">{{ $tittle }}</a></li>
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

                <div class="card card-primary card-outline mt-3">
                    <div class="card-header p-0">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible form-inline">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-titel m-2 font-weight-bold">Form Input</div>

                    </div>
                    <div class="card-body">
                        <form action="/mestom" method="post" checked enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label style="font-size: 12px" class="m-0">Code Sample</label>
                                        <div class="col-sm-7">
                                            <select name="point_id"
                                                class="@error('point_id') is-invalid @enderror form-control form-control-sm ">
                                                <option value="">select item</option>
                                                @foreach ($code_units as $code)
                                                    @if (old('point_id') == $code->id)
                                                        <option value="{{ $code->id }}" selected>{{ $code->nama }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $code->id }}">{{ $code->nama }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('point_id')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                        <label style="font-size: 12px" class="m-0">Date In</label>
                                        <div class="col-sm-7">
                                            <div class="input-group date" id="reservationdate8" data-target-input="nearest">
                                                <input type="text" name="date"
                                                    class="form-control datetimepicker-input form-control-sm @error('date') is-invalid @enderror "
                                                    data-target="#reservationdate8" data-toggle="datetimepicker"
                                                    value="{{ old('date') }}" />
                                                @error('date')
                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom">
                                <label class="m-0" for="">Inorganic</label>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal" for="">Antimony
                                        (Sb)
                                    </label>
                                    <input value="{{ old('Antimony_Sb') }}" type="text" name="Antimony_Sb"
                                        class=" @error('Antimony_Sb') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Antimony_Sb')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Arsenic
                                        (As)
                                    </label>
                                    <input value="{{ old('Arsenic_As') }}" type="text" name="Arsenic_As"
                                        class="@error('Arsenic_As') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Arsenic_As')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Barium
                                        (Ba)
                                    </label>
                                    <input value="{{ old('Barium_Ba') }}" type="text" name="Barium_Ba"
                                        class="@error('Barium_Ba') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Barium_Ba')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal" for="">Beryllium
                                        (Be)
                                    </label>
                                    <input value="{{ old('Beryllium_Be') }}" type="text" name="Beryllium_Be"
                                        class="@error('Beryllium_Be') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Beryllium_Be')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Boron
                                        (B)
                                    </label>
                                    <input value="{{ old('Boron_B') }}" type="text" name="Boron_B"
                                        class="@error('Boron_B') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Boron_B')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Cadmium
                                        (Cd)
                                    </label>
                                    <input value="{{ old('Cadmium_Cd') }}" type="text" name="Cadmium_Cd"
                                        class="@error('Cadmium_Cd') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Cadmium_Cd')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal" for="">Chromium
                                        Hexavalent
                                        (Cr-VI)

                                    </label>
                                    <input value="{{ old('Chromium_Hexavalent_CrVI') }}" type="text"
                                        name="Chromium_Hexavalent_CrVI"
                                        class="@error('Chromium_Hexavalent_CrVI') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Chromium_Hexavalent_CrVI')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Copper
                                        (Cu)

                                    </label>
                                    <input value="{{ old('Copper_Cu') }}" type="text" name="Copper_Cu"
                                        class="@error('Copper_Cu') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Copper_Cu')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Lead
                                        (Pb)

                                    </label>
                                    <input value="{{ old('Lead_Pb') }}" type="text" name="Lead_Pb"
                                        class="@error('Lead_Pb') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Lead_Pb')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal" for="">Mercury
                                        (Hg)

                                    </label>
                                    <input value="{{ old('Mercury_Hg') }}" type="text" name="Mercury_Hg"
                                        class="@error('Mercury_Hg') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Mercury_Hg')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">Molybdenum (Mo)

                                    </label>
                                    <input value="{{ old('Molybdenum_Mo') }}" type="text" name="Molybdenum_Mo"
                                        class="@error('Molybdenum_Mo') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Molybdenum_Mo')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Nickel
                                        (Ni)

                                    </label>
                                    <input value="{{ old('Nickel_Ni') }}" type="text" name="Nickel_Ni"
                                        class="@error('Nickel_Ni') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Nickel_Ni')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal" for="">Selenium
                                        (Se)

                                    </label>
                                    <input value="{{ old('Selenium_Se') }}" type="text" name="Selenium_Se"
                                        class="@error('Selenium_Se') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Selenium_Se')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Silver
                                        (Ag)

                                    </label>
                                    <input value="{{ old('Silver_Ag') }}" type="text" name="Silver_Ag"
                                        class="@error('Silver_Ag') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Silver_Ag')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">Tributyltin oxide*

                                    </label>
                                    <input value="{{ old('Tributyltin_oxide') }}" type="text"
                                        name="Tributyltin_oxide"
                                        class="@error('Tributyltin_oxide') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Tributyltin_oxide')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal" for="">Zinc
                                        (Zn)

                                    </label>
                                    <input value="{{ old('Zinc_Zn') }}" type="text" name="Zinc_Zn"
                                        class="@error('Zinc_Zn') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Zinc_Zn')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="border-bottom border-top ">
                                <label class="m-0" for="">Anion</label>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Chloride

                                    </label>
                                    <input value="{{ old('Chloride') }}" type="text" name="Chloride"
                                        class="@error('Chloride') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Chloride')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Cyanide
                                        (Total)

                                    </label>
                                    <input value="{{ old('Cyanide_Total') }}" type="text" name="Cyanide_Total"
                                        class="@error('Cyanide_Total') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Cyanide_Total')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Fluoride

                                    </label>
                                    <input value="{{ old('Fluoride') }}" type="text" name="Fluoride"
                                        class="@error('Fluoride') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Fluoride')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal" for="">Iodium

                                    </label>
                                    <input value="{{ old('Iodium') }}" type="text" name="Iodium"
                                        class="@error('Iodium') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Iodium')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Nitrate
                                        (N-NO3)

                                    </label>
                                    <input value="{{ old('Nitrate_NNO3') }}" type="text" name="Nitrate_NNO3"
                                        class="@error('Nitrate_NNO3') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Nitrate_NNO3')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Nitrite
                                        (N-NO2)

                                    </label>
                                    <input value="{{ old('Nitrite_NNO2') }}" type="text" name="Nitrite_NNO2"
                                        class="@error('Nitrite_NNO2') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Nitrite_NNO2')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="border-bottom border-top ">
                                <label class="m-0" for="">Organic</label>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal" for="">Benzene*

                                    </label>
                                    <input value="{{ old('Benzene') }}" type="text" name="Benzene"
                                        class="@error('Benzene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Benzene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">Benzo(a)pyrene*

                                    </label>
                                    <input value="{{ old('Benzoapyrene') }}" type="text" name="Benzoapyrene"
                                        class="@error('Benzoapyrene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Benzoapyrene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">C6-C9
                                        Petroleum
                                        Hydrocarbon*

                                    </label>
                                    <input value="{{ old('C6_C9_Petroleum_Hydrocarbon') }}" type="text"
                                        name="C6_C9_Petroleum_Hydrocarbon"
                                        class="@error('C6_C9_Petroleum_Hydrocarbon') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('C6_C9_Petroleum_Hydrocarbon')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal" for="">C10-C36
                                        Petroleum
                                        Hydrocarbon*

                                    </label>
                                    <input value="{{ old('C10_C36_Petroleum_Hydrocarbon') }}" type="text"
                                        name="C10_C36_Petroleum_Hydrocarbon"
                                        class="@error('C10_C36_Petroleum_Hydrocarbon') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('C10_C36_Petroleum_Hydrocarbon')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">Carbontetrachloride*

                                    </label>
                                    <input value="{{ old('Carbontetrachloride') }}" type="text"
                                        name="Carbontetrachloride"
                                        class="@error('Carbontetrachloride') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Carbontetrachloride')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">Chlorobenzene*

                                    </label>
                                    <input value="{{ old('Chlorobenzene') }}" type="text" name="Chlorobenzene"
                                        class="@error('Chlorobenzene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Chlorobenzene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal"
                                        for="">Chloroform*

                                    </label>
                                    <input value="{{ old('Chloroform') }}" type="text" name="Chloroform"
                                        class="@error('Chloroform') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Chloroform')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">2-Cholorophenol*

                                    </label>
                                    <input value="{{ old('2_Cholorophenol') }}" type="text" name="2_Cholorophenol"
                                        class="@error('2_Cholorophenol') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('2_Cholorophenol')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Total
                                        Cresol*

                                    </label>
                                    <input value="{{ old('Total_Cresol') }}" type="text" name="Total_Cresol"
                                        class="@error('Total_Cresol') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Total_Cresol')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal" for="">Di(2
                                        etilhelsil)
                                        ftalat*

                                    </label>
                                    <input value="{{ old('Di2_etilhelsil_ftalat') }}" type="text"
                                        name="Di2_etilhelsil_ftalat"
                                        class="@error('Di2_etilhelsil_ftalat') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Di2_etilhelsil_ftalat')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">1.2-Dichlorobenzene*

                                    </label>
                                    <input value="{{ old('1_2_Dichlorobenzene') }}" type="text"
                                        name="1_2_Dichlorobenzene"
                                        class="@error('1_2_Dichlorobenzene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('1_2_Dichlorobenzene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">1.4-Dichlorobenzene*

                                    </label>
                                    <input value="{{ old('1_4_Dichlorobenzene') }}" type="text"
                                        name="1_4_Dichlorobenzene"
                                        class="@error('1_4_Dichlorobenzene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('1_4_Dichlorobenzene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal"
                                        for="">1.2-Dichloroethane*

                                    </label>
                                    <input value="{{ old('1_2_Dichloroethane') }}" type="text"
                                        name="1_2_Dichloroethane"
                                        class="@error('1_2_Dichloroethane') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('1_2_Dichloroethane')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">1.1-Dichloroethene*

                                    </label>
                                    <input value="{{ old('1_1_Dichloroethene') }}" type="text"
                                        name="1_1_Dichloroethene"
                                        class="@error('1_1_Dichloroethene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('1_1_Dichloroethene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">1.2-Dichloroethene*

                                    </label>
                                    <input value="{{ old('1_2_Dichloroethene') }}" type="text"
                                        name="1_2_Dichloroethene"
                                        class="@error('1_2_Dichloroethene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('1_2_Dichloroethene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal"
                                        for="">"Dichloro Methane
                                        (Methylen Chloride)*"

                                    </label>
                                    <input value="{{ old('Dichloro_Methane_Methylen_Chloride') }}" type="text"
                                        name="Dichloro_Methane_Methylen_Chloride"
                                        class="@error('Dichloro_Methane_Methylen_Chloride') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Dichloro_Methane_Methylen_Chloride')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">2.4-Dichlorophenol*

                                    </label>
                                    <input value="{{ old('2_4_Dichlorophenol') }}" type="text"
                                        name="2_4_Dichlorophenol"
                                        class="@error('2_4_Dichlorophenol') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('2_4_Dichlorophenol')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">2.4-Dinitrotoulene*

                                    </label>
                                    <input value="{{ old('2_4_Dinitrotoulene') }}" type="text"
                                        name="2_4_Dinitrotoulene"
                                        class="@error('2_4_Dinitrotoulene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('2_4_Dinitrotoulene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal"
                                        for="">Ethylbenzene*

                                    </label>
                                    <input value="{{ old('Ethylbenzene') }}" type="text" name="Ethylbenzene"
                                        class="@error('Ethylbenzene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Ethylbenzene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">Ethylenediaminetetraacetic (EDTA)*

                                    </label>
                                    <input value="{{ old('Ethylenediaminetetraacetic_EDTA') }}" type="text"
                                        name="Ethylenediaminetetraacetic_EDTA"
                                        class="@error('Ethylenediaminetetraacetic_EDTA') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Ethylenediaminetetraacetic_EDTA')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">Formaldehyde*

                                    </label>
                                    <input value="{{ old('Formaldehyde') }}" type="text" name="Formaldehyde"
                                        class="@error('Formaldehyde') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Formaldehyde')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal"
                                        for="">Hexachlorobutadiene*

                                    </label>
                                    <input value="{{ old('Hexachlorobutadiene') }}" type="text"
                                        name="Hexachlorobutadiene"
                                        class="@error('Hexachlorobutadiene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Hexachlorobutadiene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Methyl
                                        Ethyl Ketone*

                                    </label>
                                    <input value="{{ old('Methyl_Ethyl_Ketone') }}" type="text"
                                        name="Methyl_Ethyl_Ketone"
                                        class="@error('Methyl_Ethyl_Ketone') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Methyl_Ethyl_Ketone')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">Nitrobenzene*

                                    </label>
                                    <input value="{{ old('Nitrobenzene') }}" type="text" name="Nitrobenzene"
                                        class="@error('Nitrobenzene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Nitrobenzene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal" for="">Poly
                                        Aromatic
                                        Hydrocarbons (PAHs)*

                                    </label>
                                    <input value="{{ old('Poly_Aromatic_Hydrocarbons_PAHs') }}" type="text"
                                        name="Poly_Aromatic_Hydrocarbons_PAHs"
                                        class="@error('Poly_Aromatic_Hydrocarbons_PAHs') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Poly_Aromatic_Hydrocarbons_PAHs')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">"Phenol
                                        (Total, non-halogenated)*"

                                    </label>
                                    <input value="{{ old('Phenol_Total,_non_halogenated') }}" type="text"
                                        name="Phenol_Total,_non_halogenated"
                                        class="@error('Phenol_Total,_non_halogenated') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Phenol_Total,_non_halogenated')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">Polychlorinated
                                        Biphenyls (PCBs)*

                                    </label>
                                    <input value="{{ old('Polychlorinated_Biphenyls_PCBs') }}" type="text"
                                        name="Polychlorinated_Biphenyls_PCBs"
                                        class="@error('Polychlorinated_Biphenyls_PCBs') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Polychlorinated_Biphenyls_PCBs')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal" for="">Styrene*

                                    </label>
                                    <input value="{{ old('Styrene') }}" type="text" name="Styrene"
                                        class="@error('Styrene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Styrene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">1.1.1.2-Tetrachloroethane*

                                    </label>
                                    <input value="{{ old('1_1_1_2_Tetrachloroethane') }}" type="text"
                                        name="1_1_1_2_Tetrachloroethane"
                                        class="@error('1_1_1_2_Tetrachloroethane') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('1_1_1_2_Tetrachloroethane')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">1.1.2.2-Tetrachloroethane*

                                    </label>
                                    <input value="{{ old('1_1_2_2_Tetrachloroethane') }}" type="text"
                                        name="1_1_2_2_Tetrachloroethane"
                                        class="@error('1_1_2_2_Tetrachloroethane') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('1_1_2_2_Tetrachloroethane')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal"
                                        for="">Tetrachloroethene*

                                    </label>
                                    <input value="{{ old('Tetrachloroethene') }}" type="text"
                                        name="Tetrachloroethene"
                                        class="@error('Tetrachloroethene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Tetrachloroethene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Toluene*

                                    </label>
                                    <input value="{{ old('Toluene') }}" type="text" name="Toluene"
                                        class="@error('Toluene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Toluene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">Trichloroenzene*

                                    </label>
                                    <input value="{{ old('Trichloroenzene') }}" type="text" name="Trichloroenzene"
                                        class="@error('Trichloroenzene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Trichloroenzene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal"
                                        for="">1.1.1-Trichloroethane*

                                    </label>
                                    <input value="{{ old('1_1_1_Trichloroethane') }}" type="text"
                                        name="1_1_1_Trichloroethane"
                                        class="@error('1_1_1_Trichloroethane') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('1_1_1_Trichloroethane')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">1.1.2-Trichloroethane*

                                    </label>
                                    <input value="{{ old('1_1_2_Trichloroethane') }}" type="text"
                                        name="1_1_2_Trichloroethane"
                                        class="@error('1_1_2_Trichloroethane') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('1_1_2_Trichloroethane')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">Trichloroethene*

                                    </label>
                                    <input value="{{ old('Trichloroethene') }}" type="text" name="Trichloroethene"
                                        class="@error('Trichloroethene') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Trichloroethene')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal"
                                        for="">2.4.5-Trichlorophenol*

                                    </label>
                                    <input value="{{ old('2_4_5_Trichlorophenol') }}" type="text"
                                        name="2_4_5_Trichlorophenol"
                                        class="@error('2_4_5_Trichlorophenol') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('2_4_5_Trichlorophenol')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">2.4.6-Trichlorophenol*

                                    </label>
                                    <input value="{{ old('2_4_6_Trichlorophenol') }}" type="text"
                                        name="2_4_6_Trichlorophenol"
                                        class="@error('2_4_6_Trichlorophenol') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('2_4_6_Trichlorophenol')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Vinyl
                                        Chloride*

                                    </label>
                                    <input value="{{ old('Vinyl_Chloride') }}" type="text" name="Vinyl_Chloride"
                                        class="@error('Vinyl_Chloride') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Vinyl_Chloride')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal" for="">Xylene
                                        (Total)*

                                    </label>
                                    <input value="{{ old('Xylene_Total') }}" type="text" name="Xylene_Total"
                                        class="@error('Xylene_Total') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Xylene_Total')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="border-bottom border-top mt-2 ">
                                <label class="m-0" for="">Pesticides</label>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Aldrin +
                                        Dieldrin*

                                    </label>
                                    <input value="{{ old('Aldrin_Dieldrin') }}" type="text"
                                        name="Aldrin_Dieldrin"
                                        class="@error('Aldrin_Dieldrin') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Aldrin_Dieldrin')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">DDT
                                        + DDD + DDE*

                                    </label>
                                    <input value="{{ old('DDT_DDD_DDE') }}" type="text" name="DDT_DDD_DDE"
                                        class="@error('DDT_DDD_DDE') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('DDT_DDD_DDE')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">2.4-D
                                        (2.4-dichlorophenoxyacetic acid)*

                                    </label>
                                    <input value="{{ old('2_4_D_2_4_dichlorophenoxyacetic_acid') }}" type="text"
                                        name="2_4_D_2_4_dichlorophenoxyacetic_acid"
                                        class="@error('2_4_D_2_4_dichlorophenoxyacetic_acid') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('2_4_D_2_4_dichlorophenoxyacetic_acid')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal"
                                        for="">Chlordane*

                                    </label>
                                    <input value="{{ old('Chlordane') }}" type="text" name="Chlordane"
                                        class="@error('Chlordane') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Chlordane')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">Heptachlor*

                                    </label>
                                    <input value="{{ old('Heptachlor') }}" type="text" name="Heptachlor"
                                        class="@error('Heptachlor') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Heptachlor')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px" class="m-0 font-weight-normal">Lindane*

                                    </label>
                                    <input value="{{ old('Lindane') }}" type="text" name="Lindane"
                                        class="@error('Lindane') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-5">
                                    @error('Lindane')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <label style="font-size: 12px" class="m-0 font-weight-normal"
                                        for="">Methoxychlor*

                                    </label>
                                    <input value="{{ old('Methoxychlor') }}" type="text" name="Methoxychlor"
                                        class="@error('Methoxychlor') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-3">
                                    @error('Methoxychlor')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="" style="font-size: 12px"
                                        class="m-0 font-weight-normal">Pentachlorophenol*

                                    </label>
                                    <input value="{{ old('Pentachlorophenol') }}" type="text" name="Pentachlorophenol"
                                        class="@error('Pentachlorophenol') is-invalid @enderror form-control form-control-sm"
                                        placeholder=".col-4">
                                    @error('Pentachlorophenol')
                                        <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-primary btn-sm ">Create<i
                                        class="fa-solid fa-folder-plus ml-3"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
