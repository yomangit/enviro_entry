@extends('dashboard.layouts.main')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $breadcrumb }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/airquality/emission">Home</a></li>
                        <li class="breadcrumb-item active">Input Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header p-0">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline m-2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="cart-title font-weight-bold m-2">Form Input</div>
                </div>
                <div class="card-body">

                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-standard1-tab" data-toggle="pill" href="#custom-content-below-standard1" role="tab" aria-controls="custom-content-below-standard1" aria-selected="true">Emission 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/airquality/emission2/create">Table Standard 2</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade show active" id="custom-content-below-standard1" role="tabpanel" aria-labelledby="custom-content-below-standard1-tab">

                            <div class="card-body">
                                <form action="/airquality/emission/" method="post" checked enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group row">
                                                <label style="font-size: 12px" class="col-sm-4 col-form-label">Code Sample</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control form-control-sm " name="point_id">
                                                        @foreach ($code_units as $code)
                                                        @if (old('point_id')==$code->id)
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
                                                <div class="col-sm-4">
                                                    <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                                                        <input type="text" name="date" class="form-control datetimepicker-input form-control-sm @error('date') is-invalid @enderror " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ old('date') }}" />
                                                        @error('date')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-info h6 border-top border-bottom  mb-2 lead mb-0 font-weight-bold font-italic">Isokinetic Sampling Stack Condition</p>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Engine</label>
                                                    <div class="col-sm-7">
                                                        <input name="engine" type="text" class="form-control form-control-sm @error('engine') is-invalid @enderror" value="{{ old('engine') }}" />
                                                        @error('engine')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- end tss --}}
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Fuel Type</label>
                                                    <div class="col-sm-7">
                                                        <input name="fuel_type" type="text" class="form-control form-control-sm @error('fuel_type') is-invalid @enderror" value="{{ old('fuel_type') }}" />
                                                        @error('fuel_type')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Capacity</label>
                                                    <div class="col-sm-7">
                                                        <input name="capacity" type="text" class="form-control form-control-sm @error('capacity') is-invalid @enderror" value="{{ old('capacity') }}" />
                                                        @error('capacity')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- end ph max --}}
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Ambient Temperature</label>
                                                    <div class="col-sm-7">
                                                        <input name="ambient_temperature" type="text" class="form-control form-control-sm @error('ambient_temperature') is-invalid @enderror" value="{{ old('ambient_temperature') }}" />
                                                        @error('ambient_temperature')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Stack Temperature</label>
                                                    <div class="col-sm-7">
                                                        <input name="stack_temperature" type="text" class="form-control form-control-sm @error('stack_temperature') is-invalid @enderror" value="{{ old('stack_temperature') }}" />
                                                        @error('stack_temperature')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- end do --}}
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Meter Temperature</label>
                                                    <div class="col-sm-7">
                                                        <input name="meter_temperature" type="text" class="form-control form-control-sm @error('meter_temperature') is-invalid @enderror" value="{{ old('meter_temperature') }}" />
                                                        @error('meter_temperature')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- end redox --}}
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Moisture Content</label>
                                                    <div class="col-sm-7">
                                                        <input name="moisture_content" type="text" class="form-control form-control-sm @error('moisture_content') is-invalid @enderror" value="{{ old('moisture_content') }}" />
                                                        @error('moisture_content')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- end conductivity --}}

                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Actual Volume Sample</label>
                                                    <div class="col-sm-7">
                                                        <input name="actual_volume_sample" type="text" class="form-control form-control-sm @error('actual_volume_sample') is-invalid @enderror" value="{{ old('actual_volume_sample') }}" />
                                                        @error('actual_volume_sample')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- end tds --}}
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Standard Volume sample</label>
                                                    <div class="col-sm-7">
                                                        <input name="standard_volume_sample" type="text" class="form-control form-control-sm @error('standard_volume_sample') is-invalid @enderror" value="{{ old('standard_volume_sample') }}" />
                                                        @error('standard_volume_sample')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Actual Oxygen, O2</label>
                                                    <div class="col-sm-7">
                                                        <input name="actual_oxygen_o2" type="text" class="form-control form-control-sm @error('actual_oxygen_o2') is-invalid @enderror" value="{{ old('actual_oxygen_o2') }}" />
                                                        @error('actual_oxygen_o2')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Velocity Linear</label>
                                                    <div class="col-sm-7">
                                                        <input name="velocity_linear" type="text" class="form-control form-control-sm @error('velocity_linear') is-invalid @enderror" value="{{ old('velocity_linear') }}" />
                                                        @error('velocity_linear')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Dry Molecular Weight</label>
                                                    <div class="col-sm-7">
                                                        <input name="dry_molecular_weight" type="text" class="form-control form-control-sm @error('dry_molecular_weight') is-invalid @enderror" value="{{ old('dry_molecular_weight') }}" />
                                                        @error('dry_molecular_weight')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Actual Stack Flowrate</label>
                                                    <div class="col-sm-7">
                                                        <input name="actual_stack_flowrate" type="text" class="form-control form-control-sm @error('actual_stack_flowrate') is-invalid @enderror" value="{{ old('actual_stack_flowrate') }}" />
                                                        @error('actual_stack_flowrate')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Percent of Isokinetic</label>
                                                    <div class="col-sm-7">
                                                        <input name="percent_of_isokinetic" type="text" class="form-control form-control-sm @error('percent_of_isokinetic') is-invalid @enderror" value="{{ old('percent_of_isokinetic') }}" />
                                                        @error('percent_of_isokinetic')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <p class="text-info h6 border-top border-bottom  mb-2 lead mb-0 font-weight-bold font-italic ">Emission Air (Actual)</p>

                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Total Particulate (isokinetic)</label>
                                                    <div class="col-sm-7">
                                                        <input name="total_particulate_isokinetic_actual" type="text" class="form-control form-control-sm @error('total_particulate_isokinetic_actual') is-invalid @enderror" value="{{ old('total_particulate_isokinetic_actual') }}" />
                                                        @error('total_particulate_isokinetic_actual')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Sulfur Dioxide (SO2)</label>
                                                    <div class="col-sm-7">
                                                        <input name="sulfur_dioxide_so2_actual" type="text" class="form-control form-control-sm @error('sulfur_dioxide_so2_actual') is-invalid @enderror" value="{{ old('sulfur_dioxide_so2_actual') }}" />
                                                        @error('sulfur_dioxide_so2_actual')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 10px" class="col-sm-4 col-form-label">Nitrogen Oxide (NOx) as Nitrogen Dioxide (NO2) </label>
                                                    <div class="col-sm-7">
                                                        <input name="nitrogen_oxide_nox_as_nitrogen_dioxide_no2_actual" type="text" class="form-control form-control-sm @error('nitrogen_oxide_nox_as_nitrogen_dioxide_no2_actual') is-invalid @enderror" value="{{ old('nitrogen_oxide_nox_as_nitrogen_dioxide_no2_actual') }}" />
                                                        @error('nitrogen_oxide_nox_as_nitrogen_dioxide_no2_actual')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Nitrogen Oxide (NOX) </label>
                                                    <div class="col-sm-7">
                                                        <input name="nitrogen_oxide_nox_actual" type="text" class="form-control form-control-sm @error('nitrogen_oxide_nox_actual') is-invalid @enderror" value="{{ old('nitrogen_oxide_nox_actual') }}" />
                                                        @error('nitrogen_oxide_nox_actual')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Carbon Monoxide (CO) </label>
                                                    <div class="col-sm-7">
                                                        <input name="carbon_monoxide_co_actual" type="text" class="form-control form-control-sm @error('carbon_monoxide_co_actual') is-invalid @enderror" value="{{ old('carbon_monoxide_co_actual') }}" />
                                                        @error('carbon_monoxide_co_actual')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Carbon Dioxide (CO2) </label>
                                                    <div class="col-sm-7">
                                                        <input name="carbon_dioxide_co" type="text" class="form-control form-control-sm @error('carbon_dioxide_co') is-invalid @enderror" value="{{ old('carbon_dioxide_co') }}" />
                                                        @error('carbon_dioxide_co')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Opacity </label>
                                                    <div class="col-sm-7">
                                                        <input name="opacity" type="text" class="form-control form-control-sm @error('opacity') is-invalid @enderror" value="{{ old('opacity') }}" />
                                                        @error('opacity')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <p class="text-info h6 border-top border-bottom  mb-2 lead mb-0 font-weight-bold font-italic ">Emission Air (Corrected to 13% Oxygen at 25°C, 1 atm)</p>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Total Particulate (isokinetic)</label>
                                                    <div class="col-sm-7">
                                                        <input name="total_particulate_isokinetic" type="text" class="form-control form-control-sm @error('total_particulate_isokinetic') is-invalid @enderror" value="{{ old('total_particulate_isokinetic') }}" />
                                                        @error('total_particulate_isokinetic')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Sulfur Dioxide (SO2)</label>
                                                    <div class="col-sm-7">
                                                        <input name="sulfur_dioxide_so2" type="text" class="form-control form-control-sm @error('sulfur_dioxide_so2') is-invalid @enderror" value="{{ old('sulfur_dioxide_so2') }}" />
                                                        @error('sulfur_dioxide_so2')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 10px" class="col-sm-4 col-form-label">Emission Air (Corrected to 13% Oxygen at 25°C, 1 atm)</label>
                                                    <div class="col-sm-7">
                                                        <input name="nitrogen_oxide_nox_as_nitrogen_dioxide_no2" type="text" class="form-control form-control-sm @error('nitrogen_oxide_nox_as_nitrogen_dioxide_no2') is-invalid @enderror" value="{{ old('nitrogen_oxide_nox_as_nitrogen_dioxide_no2') }}" />
                                                        @error('nitrogen_oxide_nox_as_nitrogen_dioxide_no2')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Nitrogen Oxide (NOX) </label>
                                                    <div class="col-sm-7">
                                                        <input name="nitrogen_oxide_nox" type="text" class="form-control form-control-sm @error('nitrogen_oxide_nox') is-invalid @enderror" value="{{ old('nitrogen_oxide_nox') }}" />
                                                        @error('nitrogen_oxide_nox')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Carbon Monoxide (CO) </label>
                                                    <div class="col-sm-7">
                                                        <input name="carbon_monoxide_co" type="text" class="form-control form-control-sm @error('carbon_monoxide_co') is-invalid @enderror" value="{{ old('carbon_monoxide_co') }}" />
                                                        @error('carbon_monoxide_co')
                                                        <span class=" invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- end tds --}}


                                    <!-- /.row -->
                                 
                            </div>

                        </div>


                    </div>


                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn bg-gradient-primary btn-sm ">Create<i class="fa-solid fa-folder-plus ml-3"></i></button>

                </div>
            </div>
        </div>
    </section>

</div>
@endsection