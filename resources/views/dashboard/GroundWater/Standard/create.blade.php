@extends('dashboard.layouts.main')
@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> {{ $tittle }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/groundwater/standard">{{ $tittle }}</a></li>
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
                    <div class="alert alert-success alert-dismissible form-inline">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card-titel ml-2">Form Input</div>
                </div>
                <!-- /.card-header -->
                <form action="/groundwater/standard" method="post" checked enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Diameter Pipe
                                            (m)</label>
                                        <div class="col-sm-7">
                                            <input name="d_pipe" type="number" step="0.00001" class="form-control form-control-sm @error('d_pipe') is-invalid @enderror" value="{{ old('d_pipe') }}" />
                                            @error('d_pipe')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">TT</label>
                                        <div class="col-sm-7">
                                            <input name="tt" type="number" step="0.00001" class="form-control form-control-sm @error('tt') is-invalid @enderror" value="{{ old('tt') }}" />
                                            @error('tt')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">r <sup>2</sup> </label>
                                        <div class="col-sm-7">
                                            <input name="r" type="number" step="0.00001" class="form-control form-control-sm @error('r') is-invalid @enderror" value="{{ old('r') }}" />
                                            @error('r')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-primary btn-sm ">Create<i class="fa-solid fa-folder-plus ml-3"></i></button>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>

@endsection