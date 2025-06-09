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
                        <li class="breadcrumb-item"><a href="/airquality/emission/standard2">{{ $tittle }}</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                   
                    <div class="cart-title font-weight-bold">Edit Input</div>
                </div>
                <div class="card-body">

                    <form action="/airquality/emission2/{{ $Emission->id }}" method="post" enctype="multipart/form-data" autocomplete="off">
                        @method('put')
                        @csrf
                       
                        <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group row">
                                                <label style="font-size: 12px" class="col-sm-4 col-form-label">Code Sample</label>
                                                <div class="col-sm-4">
                                                    <select class="form-control form-control-sm " name="point_id">
                                                        @foreach ($code_units as $code)
                                                        @if (old('point_id',$Emission->point_id)==$code->id)
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
                                                        <input type="text" name="date" class="form-control datetimepicker-input form-control-sm @error('date') is-invalid @enderror " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ old('date',date('d-m-Y',strtotime($Emission->date))) }}" />
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
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Equipment</label>
                                            <div class="col-sm-7">
                                                <input name="equipment" type="text" class="form-control form-control-sm @error('equipment') is-invalid @enderror" value="{{ old('equipment',$Emission->equipment) }}" />
                                                @error('equipment')
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
                                                <input name="fuel_type" type="text" class="form-control form-control-sm @error('fuel_type') is-invalid @enderror" value="{{ old('fuel_type',$Emission->fuel_type) }}" />
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
                                                <input name="capacity" type="text" class="form-control form-control-sm @error('capacity') is-invalid @enderror" value="{{ old('capacity',$Emission->capacity) }}" />
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
                                                <input name="ambient_temperature" type="text" class="form-control form-control-sm @error('ambient_temperature') is-invalid @enderror" value="{{ old('ambient_temperature',$Emission->ambient_temperature) }}" />
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
                                                <input name="stack_temperature" type="text" class="form-control form-control-sm @error('stack_temperature') is-invalid @enderror" value="{{ old('stack_temperature',$Emission->stack_temperature) }}" />
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
                                                <input name="meter_temperature" type="text" class="form-control form-control-sm @error('meter_temperature') is-invalid @enderror" value="{{ old('meter_temperature',$Emission->meter_temperature) }}" />
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
                                                <input name="moisture_content" type="text" class="form-control form-control-sm @error('moisture_content') is-invalid @enderror" value="{{ old('moisture_content',$Emission->moisture_content) }}" />
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
                                                <input name="actual_volume_sample" type="text" class="form-control form-control-sm @error('actual_volume_sample') is-invalid @enderror" value="{{ old('actual_volume_sample',$Emission->actual_volume_sample) }}" />
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
                                                <input name="standard_volume_sample" type="text" class="form-control form-control-sm @error('standard_volume_sample') is-invalid @enderror" value="{{ old('standard_volume_sample',$Emission->standard_volume_sample) }}" />
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
                                                <input name="actual_oxygen_o2" type="text" class="form-control form-control-sm @error('actual_oxygen_o2') is-invalid @enderror" value="{{ old('actual_oxygen_o2',$Emission->actual_oxygen_o2) }}" />
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
                                                <input name="velocity_linear" type="text" class="form-control form-control-sm @error('velocity_linear') is-invalid @enderror" value="{{ old('velocity_linear',$Emission->velocity_linear) }}" />
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
                                                <input name="dry_molecular_weight" type="text" class="form-control form-control-sm @error('dry_molecular_weight') is-invalid @enderror" value="{{ old('dry_molecular_weight',$Emission->dry_molecular_weight) }}" />
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
                                                <input name="actual_stack_flowrate" type="text" class="form-control form-control-sm @error('actual_stack_flowrate') is-invalid @enderror" value="{{ old('actual_stack_flowrate',$Emission->actual_stack_flowrate) }}" />
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
                                                <input name="percent_of_isokinetic" type="text" class="form-control form-control-sm @error('percent_of_isokinetic') is-invalid @enderror" value="{{ old('percent_of_isokinetic',$Emission->percent_of_isokinetic) }}" />
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
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Ammonia (NH3)</label>
                                            <div class="col-sm-7">
                                                <input name="ammonia_nh3" type="text" class="form-control form-control-sm @error('ammonia_nh3') is-invalid @enderror" value="{{ old('ammonia_nh3',$Emission->ammonia_nh3) }}" />
                                                @error('ammonia_nh3')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Chlorine (Cl2)</label>
                                            <div class="col-sm-7">
                                                <input name="chlorine_cl2" type="text" class="form-control form-control-sm @error('chlorine_cl2') is-invalid @enderror" value="{{ old('chlorine_cl2',$Emission->chlorine_cl2) }}" />
                                                @error('chlorine_cl2')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Hydrogen Chloride (HCl)</label>
                                            <div class="col-sm-7">
                                                <input name="hydrogen_chloride_hcl" type="text" class="form-control form-control-sm @error('hydrogen_chloride_hcl') is-invalid @enderror" value="{{ old('hydrogen_chloride_hcl',$Emission->hydrogen_chloride_hcl) }}" />
                                                @error('hydrogen_chloride_hcl')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Hydrogen Fluoride (HF) </label>
                                            <div class="col-sm-7">
                                                <input name="hydrogen_fluoride_hf" type="text" class="form-control form-control-sm @error('hydrogen_fluoride_hf') is-invalid @enderror" value="{{ old('hydrogen_fluoride_hf',$Emission->hydrogen_fluoride_hf) }}" />
                                                @error('hydrogen_fluoride_hf')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 10px" class="col-sm-4 col-form-label">Nitrogen Oxide (NOX)</label>
                                            <div class="col-sm-7">
                                                <input name="nitrogen_oxide_nox" type="text" class="form-control form-control-sm @error('nitrogen_oxide_nox') is-invalid @enderror" value="{{ old('nitrogen_oxide_nox',$Emission->nitrogen_oxide_nox) }}" />
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
                                            <label style="font-size: 10px" class="col-sm-4 col-form-label">Nitrogen Dioxide (NO2)</label>
                                            <div class="col-sm-7">
                                                <input name="nitrogen_dioxide_no2" type="text" class="form-control form-control-sm @error('nitrogen_dioxide_no2') is-invalid @enderror" value="{{ old('nitrogen_dioxide_no2',$Emission->nitrogen_dioxide_no2) }}" />
                                                @error('nitrogen_dioxide_no2')
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
                                                <input name="opacity" type="text" class="form-control form-control-sm @error('opacity') is-invalid @enderror" value="{{ old('opacity',$Emission->opacity) }}" />
                                                @error('opacity')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Total Particulate (isokinetic) </label>
                                            <div class="col-sm-7">
                                                <input name="total_particulate_isokinetic" type="text" class="form-control form-control-sm @error('total_particulate_isokinetic') is-invalid @enderror" value="{{ old('total_particulate_isokinetic',$Emission->total_particulate_isokinetic) }}" />
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
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Sulfur Dioxide (SO2) </label>
                                            <div class="col-sm-7">
                                                <input name="sulfur_dioxide_so2" type="text" class="form-control form-control-sm @error('sulfur_dioxide_so2') is-invalid @enderror" value="{{ old('sulfur_dioxide_so2',$Emission->sulfur_dioxide_so2) }}" />
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
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Hydrogen Sulphide (H2S)</label>
                                            <div class="col-sm-7">
                                                <input name="hydrogen_sulphide_h2s" type="text" class="form-control form-control-sm @error('hydrogen_sulphide_h2s') is-invalid @enderror" value="{{ old('hydrogen_sulphide_h2s',$Emission->hydrogen_sulphide_h2s) }}" />
                                                @error('hydrogen_sulphide_h2s')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Mercury (Hg)</label>
                                            <div class="col-sm-7">
                                                <input name="mercury_hg" type="text" class="form-control form-control-sm @error('mercury_hg') is-invalid @enderror" value="{{ old('mercury_hg',$Emission->mercury_hg) }}" />
                                                @error('mercury_hg')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Arsenic (As)</label>
                                            <div class="col-sm-7">
                                                <input name="arsenic_as" type="text" class="form-control form-control-sm @error('arsenic_as') is-invalid @enderror" value="{{ old('arsenic_as',$Emission->arsenic_as) }}" />
                                                @error('arsenic_as')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Antimony (Sb)</label>
                                            <div class="col-sm-7">
                                                <input name="antimony_sb" type="text" class="form-control form-control-sm @error('antimony_sb') is-invalid @enderror" value="{{ old('antimony_sb',$Emission->antimony_sb) }}" />
                                                @error('antimony_sb')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Cadmium (Cd)</label>
                                            <div class="col-sm-7">
                                                <input name="cadmium_cd" type="text" class="form-control form-control-sm @error('cadmium_cd') is-invalid @enderror" value="{{ old('cadmium_cd',$Emission->cadmium_cd) }}" />
                                                @error('cadmium_cd')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Zinc (Zn)</label>
                                            <div class="col-sm-7">
                                                <input name="zinc_zn" type="text" class="form-control form-control-sm @error('zinc_zn') is-invalid @enderror" value="{{ old('zinc_zn',$Emission->zinc_zn) }}" />
                                                @error('zinc_zn')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Lead (Pb)</label>
                                            <div class="col-sm-7">
                                                <input name="lead_pb" type="text" class="form-control form-control-sm @error('lead_pb') is-invalid @enderror" value="{{ old('lead_pb',$Emission->lead_pb) }}" />
                                                @error('lead_pb')
                                                <span class=" invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- end tds --}}


                            <!-- /.row -->
                            <div class="card-footer d-flex justify-content-end">
                                <button style="width: 110px" type="submit" class="btn bg-gradient-success btn-sm">Save</button>
                            </div>
                     
                    </form>
                </div>




            </div>
        </div>
</div>
</section>

</div>
@endsection