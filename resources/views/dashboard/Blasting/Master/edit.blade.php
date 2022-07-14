@extends('dashboard.layouts.main')
@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Input {{ $tittle }} Data</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard/blasting">Home</a></li>
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
                        <form action="/dashboard/blasting/{{ $Blasting->created_at }}" method="post"
                            enctype="multipart/form-data" autocomplete="off">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Code Sample</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control-sm " name="point_id">
                                                @foreach ($Point_ID as $code)
                                                    @if (old('point_id', $Blasting->point_id) == $code->id)
                                                        <option value="{{ $code->id }}" selected>{{ $code->nama }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $code->id }}">{{ $code->nama }}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Code Sample</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control-sm " name="standard_id">
                                                @foreach ($TableStandard as $standard)
                                                    @if (old('standard_id', $Blasting->standard_id) == $standard->id)
                                                        <option value="{{ $standard->id }}" selected>
                                                            {{ $standard->frequency }}</option>
                                                    @else
                                                        <option value="{{ $standard->id }}">{{ $standard->frequency }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Date</label>
                                        <div class="col-sm-7">
                                            <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                                                <input type="text" name="date"
                                                    class="form-control datetimepicker-input form-control-sm @error('date') is-invalid @enderror "
                                                    data-target="#reservationdate4" data-toggle="datetimepicker"
                                                    value="{{ old('date', date('d-m-Y', strtotime($Blasting->date))) }}" />
                                                @error('date')
                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                {{-- end tanggal --}}
                                <div class="col-12 col-md-6">
                                    <!-- /.form-group -->
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Time</label>
                                        <div class="col-sm-7">
                                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                <input name="time" type="text"
                                                    value="{{ old('time', $Blasting->time) }}"
                                                    class="form-control datetimepicker-input form-control-sm @error('time') is-invalid @enderror"
                                                    data-target="#timepicker" data-toggle="datetimepicker" />
                                                @error('time')
                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /.form-group -->
                                </div>

                                {{-- end finish time sampling --}}
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Transversal
                                                Freq</label>
                                            <div class="col-sm-7">
                                                <input name="transversal_freq" type="number" step="0.0001"
                                                    class="form-control form-control-sm @error('transversal_freq') is-invalid @enderror"
                                                    value="{{ old('transversal_freq', $Blasting->transversal_freq) }}" />
                                                @error('transversal_freq')
                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                {{-- end transversal freq --}}
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Vertical
                                                Freq</label>
                                            <div class="col-sm-7">
                                                <input name="vertical_freq" type="number" step="0.0001"
                                                    class="form-control form-control-sm @error('vertical_freq') is-invalid @enderror"
                                                    value="{{ old('vertical_freq', $Blasting->vertical_freq) }}">
                                                @error('vertical_freq')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end vertical vreq --}}
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Longitudinal
                                                Freq</label>
                                            <div class="col-sm-7">
                                                <input name="longitudinal_freq" type="number" step="0.0001"
                                                    value="{{ old('longitudinal_freq', $Blasting->longitudinal_freq) }}"
                                                    class="form-control form-control-sm @error('longitudinal_freq') is-invalid @enderror">
                                                @error('longitudinal_freq')
                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end longitudinal freq --}}
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Transversal
                                                PPV</label>
                                            <div class="col-sm-7">
                                                <input name="transversal_ppv" type="number" step="0.0001"
                                                    class="form-control form-control-sm @error('transversal_ppv') is-invalid @enderror"
                                                    value="{{ old('transversal_ppv', $Blasting->transversal_ppv) }}" />
                                                @error('transversal_ppv')
                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                {{-- end transversal ppv --}}
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Vertical
                                                PPV</label>
                                            <div class="col-sm-7">
                                                <input name="vertical_ppv" type="number" step="0.0001"
                                                    class="form-control form-control-sm @error('vertical_ppv') is-invalid @enderror"
                                                    value="{{ old('vertical_ppv', $Blasting->vertical_ppv) }}">
                                                @error('vertical_ppv')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end vertical ppv --}}
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Longitudinal
                                                PPV</label>
                                            <div class="col-sm-7">
                                                <input name="longitudinal_ppv" type="number" step="0.0001"
                                                    value="{{ old('longitudinal_ppv', $Blasting->longitudinal_ppv) }}"
                                                    class="form-control form-control-sm @error('longitudinal_ppv') is-invalid @enderror">
                                                @error('longitudinal_ppv')
                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end longitudinal ppv -->
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Peak
                                                Vektor</label>
                                            <div class="col-sm-7">
                                                <input name="peak_vektor" type="number" step="0.0001"
                                                    value="{{ old('peak_vektor', $Blasting->peak_vektor) }}"
                                                    class="form-control form-control-sm @error('peak_vektor') is-invalid @enderror">
                                                @error('peak_vektor')
                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end peak vektor -->
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Noise
                                                Level</label>
                                            <div class="col-sm-7">
                                                <input name="noise_level" type="number" step="0.0001"
                                                    value="{{ old('noise_level', $Blasting->noise_level) }}"
                                                    class="form-control form-control-sm @error('noise_level') is-invalid @enderror">
                                                @error('noise_level')
                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end noise level -->
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Blast
                                                Location</label>
                                            <div class="col-sm-7">
                                                <input name="blast_location" type="text"
                                                    value="{{ old('blast_location', $Blasting->blast_location) }}"
                                                    class="form-control form-control-sm @error('blast_location') is-invalid @enderror">
                                                @error('blast_location')
                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end blast location-->
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Weather</label>
                                            <div class="col-sm-7">
                                                <input name="weather" type="text"
                                                    value="{{ old('weather', $Blasting->weather) }}"
                                                    class="form-control form-control-sm @error('weather') is-invalid @enderror">
                                                @error('weather')
                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- end weather-->
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Sampler</label>
                                            <div class="col-sm-7">
                                                <input name="sampler" type="text"
                                                    value="{{ old('sampler', $Blasting->sampler) }}"
                                                    class="form-control form-control-sm @error('sampler') is-invalid @enderror">
                                                @error('sampler')
                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end weather-->
                            </div>
                            <!-- /.row -->
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-success btn-sm ">Save</button>
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
