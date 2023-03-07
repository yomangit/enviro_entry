@extends('dashboard.layouts.main')


@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $breadcrumb }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/monitoring/marine">Home</a></li>
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
                <div class="card-header p-0 ">
                    <div class="card-titel m-2 font-weight-bold">Form Edit</div>
                </div>
                <!-- /.card-header -->
                <form action="/monitoring/marine/{{ $Marine->id }}" method="post" enctype="multipart/form-data" autocomplete="off">
                        @method('put')
                        @csrf
                <div class="card-body">
                   
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Biota</label>
                                    <div class="col-sm-7">
                                        <select class="form-control form-control-sm " name="biota_id">
                                            @foreach ($Biotum as $biota)
                                            @if (old('biota_id',$Marine->biota_id)==$biota->id)
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
                                            @if (old('location_id',$Marine->location_id)==$location->id)
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
                                            <input type="text" name="date" class="form-control datetimepicker-input form-control-sm @error('date') is-invalid @enderror " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ old('date',date('d-m-Y',strtotime($Marine->date))) }}" />
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
                                            <input name="taxa_richness" type="number" step="0.01" class="form-control form-control-sm @error('taxa_richness') is-invalid @enderror" value="{{ old('taxa_richness',$Marine->taxa_richness) }}" />
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
                                            <input name="species_density" type="number" step="0.01" class="form-control form-control-sm @error('species_density') is-invalid @enderror" value="{{ old('species_density',$Marine->species_density) }}">
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
                                            <input name="diversity_index" type="number" step="0.01" value="{{ old('diversity_index',$Marine->diversity_index) }}" class="form-control form-control-sm @error('diversity_index') is-invalid @enderror">
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
                                            <input name="evenness_value" type="number" step="0.01" class="form-control form-control-sm @error('evenness_value') is-invalid @enderror" value="{{ old('evenness_value',$Marine->evenness_value) }}" />
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
                                            <input name="dominance_index" type="number" step="0.01" class="form-control form-control-sm @error('dominance_index') is-invalid @enderror" value="{{ old('dominance_index',$Marine->dominance_index) }}" />
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