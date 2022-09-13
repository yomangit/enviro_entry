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
                        <li class="breadcrumb-item"><a href="/blasting/pointid">{{ $tittle }}</a></li>
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
                <div class="card-body">
                    <form action="/blasting/pointid" method="post" checked enctype="multipart/form-data" autocomplete="off">
                        @csrf



                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input name="nama" type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" value="{{ old('nama') }}" />

                                            @error('nama')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                          
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end nama --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Lokasi</label>
                                        <div class="col-sm-7">
                                            <input name="lokasi" type="text" class="form-control form-control-sm @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}" />
                                            @error('lokasi')
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
