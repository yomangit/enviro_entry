@extends('dashboard.layouts.main')
@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit {{ $breadcrumb }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/groundwater/mastergw">Home</a></li>
                        <li class="breadcrumb-item"><a href="/groundwater/mastergw/codesamplegw">{{ $tittle }}</a></li>
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
                    <div class="card-title ml-2">Form Edit</div>
                </div>
                <!-- /.card-header -->
                <form action="/groundwater/mastergw/codesamplegw/{{ $Codes->failed_at }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @method('put')
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input name="nama" type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" value="{{ old('nama', $Codes->nama) }}" />
                                            @error('nama')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- nama --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Lokasi</label>
                                        <div class="col-sm-7">
                                            <input name="lokasi" type="text" class="form-control form-control-sm @error('lokasi') is-invalid @enderror" value="{{ old('lokasi', $Codes->lokasi) }}" />
                                            @error('lokasi')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- lokasi --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Total Well Depth</label>
                                        <div class="col-sm-7">
                                            <input name="total" type="text" class="form-control form-control-sm @error('total') is-invalid @enderror" value="{{ old('total',$Codes->total) }}" />
                                            @error('total')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end total --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Casing above GL(m)</label>
                                        <div class="col-sm-7">
                                            <input name="gl" type="text" class="form-control form-control-sm @error('gl') is-invalid @enderror" value="{{ old('gl',$Codes->gl) }}" />
                                            @error('gl')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end gl --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Ground Level RL</label>
                                        <div class="col-sm-7">
                                            <input name="rl" type="text" class="form-control form-control-sm @error('rl') is-invalid @enderror" value="{{ old('rl',$Codes->rl) }}" />
                                            @error('rl')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end rl --}}

                            <!-- /.col -->
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <!-- /.row -->
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