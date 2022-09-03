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
                        <li class="breadcrumb-item"><a href="/airquality/ambien">{{ $tittle }}</a></li>
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
            <div class="card card-default">
                <div class="card-header p-0 pt-1">

                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/airquality/ambien" method="post" checked enctype="multipart/form-data" autocomplete="off">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-sm-6">
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

                            <div class="col-12 col-sm-6">
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

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Sulphur Dioxide (SO2)</label>
                                        <div class="col-sm-7">
                                            <input name="sulphur_dioxide_so2" type="text" class="form-control form-control-sm @error('sulphur_dioxide_so2') is-invalid @enderror" value="{{ old('sulphur_dioxide_so2') }}" />
                                            @error('sulphur_dioxide_so2')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- end tss --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Nitrogen Dioxide (NO2)</label>
                                        <div class="col-sm-7">
                                            <input name="nitrogen_dioxide_no2" type="text" class="form-control form-control-sm @error('nitrogen_dioxide_no2') is-invalid @enderror" value="{{ old('nitrogen_dioxide_no2') }}" />
                                            @error('nitrogen_dioxide_no2')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- end ph max --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Carbon Monoxide</label>
                                        <div class="col-sm-7">
                                            <input name="carbon_monoxide" type="text" class="form-control form-control-sm @error('carbon_monoxide') is-invalid @enderror" value="{{ old('carbon_monoxide') }}" />
                                            @error('carbon_monoxide')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Ozone</label>
                                        <div class="col-sm-7">
                                            <input name="ozone" type="text" class="form-control form-control-sm @error('ozone') is-invalid @enderror" value="{{ old('ozone') }}" />
                                            @error('ozone')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- end do --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Total Suspended Particulate (24 hours)</label>
                                        <div class="col-sm-7">
                                            <input name="total_suspended_particulate_24_hours" type="text" class="form-control form-control-sm @error('total_suspended_particulate_24_hours') is-invalid @enderror" value="{{ old('total_suspended_particulate_24_hours') }}" />
                                            @error('total_suspended_particulate_24_hours')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- end redox --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Particulate Matter 10</label>
                                        <div class="col-sm-7">
                                            <input name="particulate_matter_10" type="text" class="form-control form-control-sm @error('particulate_matter_10') is-invalid @enderror" value="{{ old('particulate_matter_10') }}" />
                                            @error('particulate_matter_10')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- end conductivity --}}

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Particulate Matter 2.5</label>
                                        <div class="col-sm-7">
                                            <input name="particulate_matter_2_5" type="text" class="form-control form-control-sm @error('particulate_matter_2_5') is-invalid @enderror" value="{{ old('particulate_matter_2_5') }}" />
                                            @error('particulate_matter_2_5')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- end tds --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Temperature (Ambient)</label>
                                        <div class="col-sm-7">
                                            <input name="temperature_ambient" type="text" class="form-control form-control-sm @error('temperature_ambient') is-invalid @enderror" value="{{ old('temperature_ambient') }}" />
                                            @error('temperature_ambient')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Humidity</label>
                                        <div class="col-sm-7">
                                            <input name="humidity" type="text" class="form-control form-control-sm @error('humidity') is-invalid @enderror" value="{{ old('humidity') }}" />
                                            @error('humidity')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Wind Speed</label>
                                        <div class="col-sm-7">
                                            <input name="wind_speed" type="text" class="form-control form-control-sm @error('wind_speed') is-invalid @enderror" value="{{ old('wind_speed') }}" />
                                            @error('wind_speed')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Wind Direction</label>
                                        <div class="col-sm-7">
                                            <input name="wind_direction" type="text" class="form-control form-control-sm @error('wind_direction') is-invalid @enderror" value="{{ old('wind_direction') }}" />
                                            @error('wind_direction')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Weather</label>
                                        <div class="col-sm-7">
                                            <input name="weather" type="text" class="form-control form-control-sm @error('weather') is-invalid @enderror" value="{{ old('weather') }}" />
                                            @error('weather')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Barometric Pressure</label>
                                        <div class="col-sm-7">
                                            <input name="barometric_pressure" type="text" class="form-control form-control-sm @error('barometric_pressure') is-invalid @enderror" value="{{ old('barometric_pressure') }}" />
                                            @error('barometric_pressure')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Lead (Pb)</label>
                                        <div class="col-sm-7">
                                            <input name="lead_pb" type="text" class="form-control form-control-sm @error('lead_pb') is-invalid @enderror" value="{{ old('lead_pb') }}" />
                                            @error('lead_pb')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Hydrocarbon</label>
                                        <div class="col-sm-7">
                                            <input name="hydrocarbon" type="text" class="form-control form-control-sm @error('hydrocarbon') is-invalid @enderror" value="{{ old('hydrocarbon') }}" />
                                            @error('hydrocarbon')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- end tds --}}

                        </div>
                        <!-- /.row -->
                        <div class="card-footer d-flex justify-content-end">
                            <button style="width: 100px" type="submit" class="btn bg-gradient-primary btn-sm ">Create</button>
                        </div>
                    </form>

                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->

            <!-- SELECT2 EXAMPLE -->

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection