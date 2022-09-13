@extends('dashboard.layouts.main')
@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> {{ $breadcrumb }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/monitoring/freshwater/master">Home</a></li>
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
                <form action="/monitoring/freshwater/master" method="post" checked enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <section class="content">

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Biota</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control-sm " name="biota_id">
                                                @foreach ($Biotum as $biota)
                                                @if (old('biota_id')==$biota->id)
                                                <option value="{{$biota->id}}" selected>{{$biota->nama}}</option>
                                                @else
                                                <option value="{{$biota->id}}">{{$biota->nama}}</option>
                                                @endif
                                                @endforeach
                                            </select>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Location</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control-sm " name="location_id">
                                                @foreach ($LocationBiota as $location)
                                                @if (old('location_id')==$location->id)
                                                <option value="{{$location->id}}" selected>{{$location->nama}}</option>
                                                @else
                                                <option value="{{$location->id}}">{{$location->nama}}</option>
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
                                                <input type="text" name="date" class="form-control datetimepicker-input form-control-sm @error('date') is-invalid @enderror " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ old('date') }}" />
                                                @error('date')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                {{-- end tanggal --}}

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Taxa Richness</label>
                                            <div class="col-sm-7">
                                                <input name="taxa_richness" type="text"  class="form-control form-control-sm @error('taxa_richness') is-invalid @enderror" value="{{ old('taxa_richness') }}" />
                                                @error('taxa_richness')
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
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Species Density (cell/m3)</label>
                                            <div class="col-sm-7">
                                                <input name="species_density" type="text"  class="form-control form-control-sm @error('species_density') is-invalid @enderror" value="{{ old('species_density') }}">
                                                @error('species_density')
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
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Diversity Index</label>
                                            <div class="col-sm-7">
                                                <input name="diversity_index" type="text"  value="{{ old('diversity_index') }}" class="form-control form-control-sm @error('diversity_index') is-invalid @enderror">
                                                @error('diversity_index')
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
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Evenness Value</label>
                                            <div class="col-sm-7">
                                                <input name="evenness_value" type="text"  class="form-control form-control-sm @error('evenness_value') is-invalid @enderror" value="{{ old('evenness_value') }}" />
                                                @error('evenness_value')
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
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Dominance Index</label>
                                            <div class="col-sm-7">
                                                <input name="dominance_index" type="text"  class="form-control form-control-sm @error('dominance_index') is-invalid @enderror" value="{{ old('dominance_index') }}" />
                                                @error('dominance_index')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                {{-- end turbidity --}}

                            </div>
                            <!-- /.row -->

                        </section>
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