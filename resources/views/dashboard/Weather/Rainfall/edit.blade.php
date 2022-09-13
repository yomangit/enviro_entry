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
                        <li class="breadcrumb-item"><a href="/weather/rainfall">Home</a></li>
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
            <div class="card card-olive card-outline">
                <div class="card-header p-0">

                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card-title p-2 font-weight-bold">Form Edit</div>
                </div>
                <!-- /.card-header -->
                <form action="/weather/rainfall/{{ $Rainfall->id }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @method('put')
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Code Sample</label>
                                    <div class="col-sm-7">
                                        <select class="form-control form-control-sm " name="point_id">
                                            @foreach ($code_units as $code)
                                            @if (old('point_id',$Rainfall->point_id)==$code->id)
                                            <option value="{{$code->id}}" selected>{{$code->nama}}</option>
                                            @else
                                            <option value="{{$code->id}}">{{$code->nama}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                                            <input type="text" name="date" class="form-control datetimepicker-input form-control-sm @error('date') is-invalid @enderror " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ old('date',date('d-m-Y',strtotime($Rainfall->date))) }}" />
                                            @error('date')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                            </div>
                            {{-- end nama --}}
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Rainfall</label>
                                        <div class="col-sm-7">
                                            <input name="rainfall" type="text" class="form-control form-control-sm @error('rainfall') is-invalid @enderror" value="{{ old('rainfall',$Rainfall->rainfall) }}" />
                                            @error('rainfall')
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