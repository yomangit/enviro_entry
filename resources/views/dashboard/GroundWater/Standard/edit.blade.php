@extends('dashboard.layouts.main')
@section('container')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit {{ $tittle }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/groundwater/standard">{{ $tittle }}</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>

                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-success card-outline">
                <div class="card-header p-0 ">
                    <div class="card-title ml-2">Form Edit</div>
                </div>
                <form action="/groundwater/standard/{{ $Codes->id }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @method('put')
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Diameter Pipe
                                            (m)</label>
                                        <div class="col-sm-7">
                                            <input name="d_pipe" type="number" step="0.01" class="form-control form-control-sm @error('d_pipe') is-invalid @enderror" value="{{ old('d_pipe',$Codes->d_pipe) }}" />
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
                                            <input name="tt" type="number" step="0.01" class="form-control form-control-sm @error('tt') is-invalid @enderror" value="{{ old('tt',$Codes->tt) }}" />
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
                                        <label style="font-size: 14px" class="col-sm-4 col-form-label">r <sup>2</sup> </label>
                                        <div class="col-sm-7">
                                            <input name="r" type="number" step="0.01" class="form-control form-control-sm @error('r') is-invalid @enderror" value="{{ old('r',$Codes->r) }}" />
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
                        <button type="submit" class="btn bg-gradient-success btn-sm ">Save<i class="fa-regular fa-floppy-disk ml-3"></i></button>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div>

@endsection