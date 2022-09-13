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
                        <li class="breadcrumb-item"><a href="/airquality/dustgauge/dust">Home</a></li>
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
                <form action="/airquality/dustgauge/dust" method="post" checked enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Code Sample</label>
                                    <div class="col-sm-7">
                                        <select class="form-control form-control-sm " name="codedust_id">
                                            @foreach ($code_units as $code)
                                            @if (old('codedust_id')==$code->id)
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
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Date In</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date" id="reservationdate5" data-target-input="nearest">
                                            <input type="text" name="date_in" class="form-control datetimepicker-input form-control-sm @error('date_in') is-invalid @enderror " data-target="#reservationdate5" data-toggle="datetimepicker" value="{{ old('date_in') }}" />
                                            @error('date_in')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                            </div>
                            {{-- end tanggal Masuk--}}
                            <div class="col-12 col-md-6">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Date Out</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                                            <input type="text" name="date_out" class="form-control datetimepicker-input form-control-sm @error('date_out') is-invalid @enderror " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ old('date_out') }}" />
                                            @error('date_out')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                            </div>
                            {{-- end tanggal Keluar--}}

                            {{-- end finish time sampling --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">M4</label>
                                        <div class="col-sm-7">
                                            <input name="m4" type="text" step="0.0001" class="form-control form-control-sm @error('m4') is-invalid @enderror" value="{{ old('m4') }}" />
                                            @error('m4')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end temperatur --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">M3</label>
                                        <div class="col-sm-7">
                                            <input name="m3" type="text" step="0.0001" class="form-control form-control-sm @error('m3') is-invalid @enderror" value="{{ old('m3') }}">
                                            @error('m3')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end PH --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">M6</label>
                                        <div class="col-sm-7">
                                            <input name="m6" type="text" step="0.0001" value="{{ old('m6') }}" class="form-control form-control-sm @error('m6') is-invalid @enderror">
                                            @error('m6')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end ORP --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">M5</label>
                                        <div class="col-sm-7">
                                            <input name="m5" type="text" step="0.0001" class="form-control form-control-sm @error('m5') is-invalid @enderror" value="{{ old('m5') }}" />
                                            @error('m5')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end Conductivity --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">text of Insect</label>
                                        <div class="col-sm-7">
                                            <input name="no_insect" type="text" step="0.0001" class="form-control form-control-sm @error('no_insect') is-invalid @enderror" value="{{ old('no_insect') }}" />
                                            @error('tt')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end turbidity --}}


                            {{-- end tl Wall --}}

                            {{-- kondisi Air --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label"> Visible of Dirt</label>
                                        <div class="col-sm-7">
                                            <div class="icheck-success d-inline col-sm-7">
                                                <input type="radio" name="vb_dirt" value="Yes" checked id="watercolor1">
                                                <label style="font-size: 12px" for="watercolor1">Yes
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="vb_dirt" value="No" id="watercolor2">
                                                <label style="font-size: 12px" class="mr-1" for="watercolor2">No
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end Warna Air --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Visible of Algae</label>
                                        <div class="col-sm-7">
                                            <div class="icheck-success d-inline col-sm-7">

                                                <input type="radio" name="vb_algae" value="Yes" checked id="waterScan1">
                                                <label style="font-size: 12px" for="waterScan1">Yes
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline">

                                                <input type="radio" name="vb_algae" value="No" id="waterScant2">
                                                <label style="font-size: 12px" for="waterScant2">No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>

                            {{-- end lapisan minyak --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Area Observation
                                        </label>
                                        <div class="col-sm-7">
                                            <input name="area_observation" type="text" class="form-control form-control-sm @error('area_observation') is-invalid @enderror" value="{{ old('area_observation') }}" />
                                            @error('area_observation')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- sumber pencemaran --}}

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Observer</label>
                                        <div class="col-sm-7">
                                            <input name="observer" type="text" class="form-control form-control-sm @error('observer') is-invalid @enderror" value="{{ old('observer') }}" />
                                            @error('observer')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end sampler --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Volume Filtrat(ml)</label>
                                        <div class="col-sm-7">
                                            <input name="volume_filtrat" type="text" step="0.0001" class="form-control form-control-sm @error('volume_filtrat') is-invalid @enderror" value="{{ old('volume_filtrat') }}" />
                                            @error('volume_filtrat')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Total Volume Water(ml)</label>
                                        <div class="col-sm-7">
                                            <input name="total_vlm_water" type="text" step="0.0001" class="form-control form-control-sm @error('total_vlm_water') is-invalid @enderror" value="{{ old('total_vlm_water') }}" />
                                            @error('total_vlm_water')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Remarks</label>
                                        <div class="col-sm-7">
                                            <input name="remarks" type="text" class="form-control form-control-sm @error('remarks') is-invalid @enderror" value="{{ old('remarks') }}" />
                                            @error('remarks')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
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