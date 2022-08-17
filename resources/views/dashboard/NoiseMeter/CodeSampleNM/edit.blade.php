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
                            <li class="breadcrumb-item"><a href="/airquality/noisemeter/noise">Home</a></li>
                            <li class="breadcrumb-item"><a href="/airquality/noisemeter/noise/codesamplenm">{{ $tittle }}</a></li>
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
                <div class="card card-default">
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="/airquality/noisemeter/noise/codesamplenm/{{ $Codes->failed_at }}" method="post"
                            enctype="multipart/form-data" autocomplete="off">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Name</label>
                                            <div class="col-sm-7">
                                                <input name="nama" type="text"
                                                    class="form-control form-control-sm @error('nama') is-invalid @enderror"
                                                    value="{{ old('nama', $Codes->nama) }}" />
                                                @error('nama')
                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                {{-- nama --}}
                               
                        
                                <!-- /.col -->
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
