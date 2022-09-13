@extends('dashboard.layouts.main')
@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input {{ $tittle }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/blasting">Home</a></li>
                        <li class="breadcrumb-item"><a href="/blasting/tablestandard">{{ $tittle }}</a></li>
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
            <div class="card card-olive card-outline">
                <div class="card-header p-0 ">


                    <div class="card-titel m-2 font-weight-bold">Form Edit</div>

                </div>
                <!-- /.card-header -->
                <form action="/blasting/tablestandard/{{ $TableStandard->id }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @method('put')
                    @csrf
                    <div class="card-body">

                        <div class="row">
                        <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">CI</label>
                                        <div class="col-sm-7">
                                            <input name="ci" type="text" class="form-control form-control-sm @error('ci') is-invalid @enderror" value="{{ old('ci',$TableStandard->ci) }}" />

                                            @error('ci')
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Frequency</label>
                                        <div class="col-sm-7">
                                            <input name="frequency" type="text" class="form-control form-control-sm @error('frequency') is-invalid @enderror" value="{{ old('frequency',$TableStandard->frequency) }}" />

                                            @error('frequency')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                          
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end nama --}}
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Peak Particle Velocity</label>
                                        <div class="col-sm-7">
                                            <input name="ppv" type="text" class="form-control form-control-sm @error('ppv') is-invalid @enderror" value="{{ old('ppv',$TableStandard->ppv) }}" />
                                            @error('ppv')
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Kualitas Bangunan</label>
                                        <div class="col-sm-7">
                                            <input name="kualitas_bangunan" type="text" class="form-control form-control-sm @error('kualitas_bangunan') is-invalid @enderror" value="{{ old('kualitas_bangunan',$TableStandard->kualitas_bangunan) }}" />
                                            @error('kualitas_bangunan')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end lokasi --}}
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Noise Level</label>
                                        <div class="col-sm-7">
                                            <input name="noise_level" type="text" class="form-control form-control-sm @error('noise_level') is-invalid @enderror" value="{{ old('noise_level',$TableStandard->noise_level) }}" />
                                            @error('noise_level')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end lokasi --}}

                        </div>
                        <!-- /.row -->


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-success btn-sm ">Save<i class="fa-regular fa-floppy-disk ml-3"></i></button>

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