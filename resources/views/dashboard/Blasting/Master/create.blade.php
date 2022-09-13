@extends('dashboard.layouts.main')
@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> {{ $tittle }} </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/blasting">Home</a></li>
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
                    <div class="alert alert-success alert-dismissible form-inline m-2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card-titel m-2 font-weight-bold">Form Input</div>

                </div>
                <!-- /.card-header -->
                <form action="/blasting" method="post" checked enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Point ID</label>
                                    <div class="col-sm-7">
                                        <select class="form-control form-control-sm " name="point_id">
                                            @foreach ($Point_ID as $code)
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
                            <div class="col-12 col-md-6">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Frequensi Standard</label>
                                    <div class="col-sm-7">
                                        <select class="form-control form-control-sm " name="standard_id">
                                            @foreach ($TableStandard as $standard)
                                            @if (old('standard_id')==$standard->id)
                                            <option value="{{$standard->id}}" selected>{{$standard->ci}}</option>
                                            @else
                                            <option value="{{$standard->id}}">{{$standard->ci}}</option>
                                            @endif
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Date </label>
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
                            {{-- end tanggal--}}

                        
                            <div class="col-12 col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Time</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                            <input name="time" type="text" value="{{ old('time') }}" class="form-control datetimepicker-input form-control-sm @error('time') is-invalid @enderror" data-target="#timepicker" data-toggle="datetimepicker" />
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Transversal Freq</label>
                                        <div class="col-sm-7">
                                            <input name="transversal_freq" type="number" step="0.0001" class="form-control form-control-sm @error('transversal_freq') is-invalid @enderror" value="{{ old('transversal_freq') }}" />
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Vertical Freq</label>
                                        <div class="col-sm-7">
                                            <input name="vertical_freq" type="number" step="0.0001" class="form-control form-control-sm @error('vertical_freq') is-invalid @enderror" value="{{ old('vertical_freq') }}">
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Longitudinal Freq</label>
                                        <div class="col-sm-7">
                                            <input name="longitudinal_freq" type="number" step="0.0001" value="{{ old('longitudinal_freq') }}" class="form-control form-control-sm @error('longitudinal_freq') is-invalid @enderror">
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Transversal PPV</label>
                                        <div class="col-sm-7">
                                            <input name="transversal_ppv" type="number" step="0.0001" class="form-control form-control-sm @error('transversal_ppv') is-invalid @enderror" value="{{ old('transversal_ppv') }}" />
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Vertical PPV</label>
                                        <div class="col-sm-7">
                                            <input name="vertical_ppv" type="number" step="0.0001" class="form-control form-control-sm @error('vertical_ppv') is-invalid @enderror" value="{{ old('vertical_ppv') }}">
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Longitudinal PPV</label>
                                        <div class="col-sm-7">
                                            <input name="longitudinal_ppv" type="number" step="0.0001" value="{{ old('longitudinal_ppv') }}" class="form-control form-control-sm @error('longitudinal_ppv') is-invalid @enderror">
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Peak Vektor</label>
                                        <div class="col-sm-7">
                                            <input name="peak_vektor" type="number" step="0.0001" value="{{ old('peak_vektor') }}" class="form-control form-control-sm @error('peak_vektor') is-invalid @enderror">
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Noise Level</label>
                                        <div class="col-sm-7">
                                            <input name="noise_level" type="number" step="0.0001" value="{{ old('noise_level') }}" class="form-control form-control-sm @error('noise_level') is-invalid @enderror">
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Blast Location</label>
                                        <div class="col-sm-7">
                                            <input name="blast_location" type="text" value="{{ old('blast_location') }}" class="form-control form-control-sm @error('blast_location') is-invalid @enderror">
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
                                            <input name="weather" type="text" value="{{ old('weather') }}" class="form-control form-control-sm @error('weather') is-invalid @enderror">
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
                                            <input name="sampler" type="text" value="{{ old('sampler') }}" class="form-control form-control-sm @error('sampler') is-invalid @enderror">
                                            @error('sampler')
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Remarks</label>
                                        <div class="col-sm-7">
                                            <input name="remarks" type="text" value="{{ old('remarks') }}" class="form-control form-control-sm @error('remarks') is-invalid @enderror">
                                            @error('remarks')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-primary btn-sm ">Create<i class="fa-solid fa-folder-plus ml-3"></i></button>
                    </div>
                </form>
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