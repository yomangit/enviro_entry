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
                        <li class="breadcrumb-item"><a href="/soilquality">Home</a></li>
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
            <div class="card card-olive card-outline">
                <div class="card-header p-0 px-1">
                <div class="card-titel m-2 font-weight-bold">Form Edit</div>

                </div>
                <!-- /.card-header -->
                <form action="/soilquality/{{ $Soil->id }}" method="post" enctype="multipart/form-data" autocomplete="off">
                        @method('put')
                        @csrf

                <div class="card-body">
                  
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Code Sample</label>
                                    <div class="col-sm-7">
                                        <select class="form-control form-control-sm " name="point_id">
                                            @foreach ($code_units as $code)
                                            @if (old('point_id',$Soil->point_id)==$code->id)
                                            <option value="{{$code->id}}" selected>{{$code->nama}}</option>
                                            @else
                                            <option value="{{$code->id}}">{{$code->nama}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                                            <input type="text" name="date" class="form-control datetimepicker-input form-control-sm @error('date') is-invalid @enderror " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ old('date',date('d-m-Y',strtotime($Soil->date))) }}" />
                                            @error('date')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                          
                            {{-- end tss --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">pH</label>
                                        <div class="col-sm-7">
                                            <input name="ph" type="text" class="form-control form-control-sm @error('ph') is-invalid @enderror" value="{{ old('ph',$Soil->ph) }}" />
                                            @error('ph')
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">pH (H2O)</label>
                                        <div class="col-sm-7">
                                            <input name="ph_h2o" type="text" class="form-control form-control-sm @error('ph_h2o') is-invalid @enderror" value="{{ old('ph_h2o',$Soil->ph_h2o) }}" />
                                            @error('ph_h2o')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Total Organic Carbon</label>
                                        <div class="col-sm-7">
                                            <input name="total_organic_carbon" type="text" class="form-control form-control-sm @error('total_organic_carbon') is-invalid @enderror" value="{{ old('total_organic_carbon',$Soil->total_organic_carbon) }}" />
                                            @error('total_organic_carbon')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Total Nitrogen</label>
                                        <div class="col-sm-7">
                                            <input name="total_nitrogen" type="text" class="form-control form-control-sm @error('total_nitrogen') is-invalid @enderror" value="{{ old('total_nitrogen',$Soil->total_nitrogen) }}" />
                                            @error('total_nitrogen')
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">C/N</label>
                                        <div class="col-sm-7">
                                            <input name="cn" type="text" class="form-control form-control-sm @error('cn') is-invalid @enderror" value="{{ old('cn',$Soil->cn) }}" />
                                            @error('cn')
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Calsium</label>
                                        <div class="col-sm-7">
                                            <input name="calsium" type="text" class="form-control form-control-sm @error('calsium') is-invalid @enderror" value="{{ old('calsium',$Soil->calsium) }}" />
                                            @error('calsium')
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Magnesium</label>
                                        <div class="col-sm-7">
                                            <input name="magnesium" type="text" class="form-control form-control-sm @error('magnesium') is-invalid @enderror" value="{{ old('magnesium',$Soil->magnesium) }}" />
                                            @error('magnesium')
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Pottasium</label>
                                        <div class="col-sm-7">
                                            <input name="pottasium" type="text" class="form-control form-control-sm @error('pottasium') is-invalid @enderror" value="{{ old('pottasium',$Soil->pottasium) }}" />
                                            @error('pottasium')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Sodium</label>
                                        <div class="col-sm-7">
                                            <input name="sodium" type="text" class="form-control form-control-sm @error('sodium') is-invalid @enderror" value="{{ old('sodium',$Soil->sodium) }}" />
                                            @error('sodium')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Jumlah</label>
                                        <div class="col-sm-7">
                                            <input name="jumlah" type="text" class="form-control form-control-sm @error('jumlah') is-invalid @enderror" value="{{ old('jumlah',$Soil->jumlah) }}" />
                                            @error('jumlah')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">P<sub>2</sub>O<sub>5</sub>(HCl 25%)</label>
                                        <div class="col-sm-7">
                                            <input name="p2o5_hcl_25" type="text" class="form-control form-control-sm @error('p2o5_hcl_25') is-invalid @enderror" value="{{ old('p2o5_hcl_25',$Soil->p2o5_hcl_25) }}" />
                                            @error('p2o5_hcl_25')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">K<sub>2</sub>(HCl 25%)</label>
                                        <div class="col-sm-7">
                                            <input name="k2o_hcl_25" type="text" class="form-control form-control-sm @error('k2o_hcl_25') is-invalid @enderror" value="{{ old('k2o_hcl_25',$Soil->k2o_hcl_25) }}" />
                                            @error('k2o_hcl_25')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">P<sub>2</sub>O<sub>5</sub> (Olsen)</label>
                                        <div class="col-sm-7">
                                            <input name="p2o5_olsen" type="text" class="form-control form-control-sm @error('p2o5_olsen') is-invalid @enderror" value="{{ old('p2o5_olsen',$Soil->p2o5_olsen) }}" />
                                            @error('p2o5_olsen')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Kapasitas Tukar Kation</label>
                                        <div class="col-sm-7">
                                            <input name="kapasitas_tukar_kation" type="text" class="form-control form-control-sm @error('kapasitas_tukar_kation') is-invalid @enderror" value="{{ old('kapasitas_tukar_kation',$Soil->kapasitas_tukar_kation) }}" />
                                            @error('kapasitas_tukar_kation')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">KB (Kejenuhan Basa)</label>
                                        <div class="col-sm-7">
                                            <input name="kb_kejenuhan_basa" type="text" class="form-control form-control-sm @error('kb_kejenuhan_basa') is-invalid @enderror" value="{{ old('kb_kejenuhan_basa',$Soil->kb_kejenuhan_basa) }}" />
                                            @error('kb_kejenuhan_basa')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Al - Tukar</label>
                                        <div class="col-sm-7">
                                            <input name="al_tukar" type="text" class="form-control form-control-sm @error('al_tukar') is-invalid @enderror" value="{{ old('al_tukar',$Soil->al_tukar) }}" />
                                            @error('al_tukar')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">H - Tukar</label>
                                        <div class="col-sm-7">
                                            <input name="h_tukar" type="text" class="form-control form-control-sm @error('h_tukar') is-invalid @enderror" value="{{ old('h_tukar',$Soil->h_tukar) }}" />
                                            @error('h_tukar')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Pasir</label>
                                        <div class="col-sm-7">
                                            <input name="pasir" type="text" class="form-control form-control-sm @error('pasir') is-invalid @enderror" value="{{ old('pasir',$Soil->pasir) }}" />
                                            @error('pasir')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Debu</label>
                                        <div class="col-sm-7">
                                            <input name="debu" type="text" class="form-control form-control-sm @error('debu') is-invalid @enderror" value="{{ old('debu',$Soil->debu) }}" />
                                            @error('debu')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Lempung</label>
                                        <div class="col-sm-7">
                                            <input name="lempung" type="text" class="form-control form-control-sm @error('lempung') is-invalid @enderror" value="{{ old('lempung',$Soil->lempung) }}" />
                                            @error('lempung')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Moisture Content</label>
                                        <div class="col-sm-7">
                                            <input name="moisture_content" type="text" class="form-control form-control-sm @error('moisture_content') is-invalid @enderror" value="{{ old('moisture_content',$Soil->moisture_content) }}" />
                                            @error('moisture_content')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Bulk Density</label>
                                        <div class="col-sm-7">
                                            <input name="bulk_density" type="text" class="form-control form-control-sm @error('bulk_density') is-invalid @enderror" value="{{ old('bulk_density',$Soil->bulk_density) }}" />
                                            @error('bulk_density')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Ruang Pori Total</label>
                                        <div class="col-sm-7">
                                            <input name="ruang_pori_total" type="text" class="form-control form-control-sm @error('ruang_pori_total') is-invalid @enderror" value="{{ old('ruang_pori_total',$Soil->ruang_pori_total) }}" />
                                            @error('ruang_pori_total')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">PD</label>
                                        <div class="col-sm-7">
                                            <input name="pd" type="text" class="form-control form-control-sm @error('pd') is-invalid @enderror" value="{{ old('pd',$Soil->pd) }}" />
                                            @error('pd')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Sangat Cepat</label>
                                        <div class="col-sm-7">
                                            <input name="sangat_cepat" type="text" class="form-control form-control-sm @error('sangat_cepat') is-invalid @enderror" value="{{ old('sangat_cepat',$Soil->sangat_cepat) }}" />
                                            @error('sangat_cepat')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Cepat</label>
                                        <div class="col-sm-7">
                                            <input name="cepat" type="text" class="form-control form-control-sm @error('cepat') is-invalid @enderror" value="{{ old('cepat',$Soil->cepat) }}" />
                                            @error('cepat')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Lambat</label>
                                        <div class="col-sm-7">
                                            <input name="lambat" type="text" class="form-control form-control-sm @error('lambat') is-invalid @enderror" value="{{ old('lambat',$Soil->lambat) }}" />
                                            @error('lambat')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Air Tersedia	</label>
                                        <div class="col-sm-7">
                                            <input name="air_tersedia" type="text" class="form-control form-control-sm @error('air_tersedia') is-invalid @enderror" value="{{ old('air_tersedia',$Soil->air_tersedia) }}" />
                                            @error('air_tersedia')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Permeabilitas</label>
                                        <div class="col-sm-7">
                                            <input name="permeabilitas" type="text" class="form-control form-control-sm @error('permeabilitas') is-invalid @enderror" value="{{ old('permeabilitas',$Soil->permeabilitas) }}" />
                                            @error('permeabilitas')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">pF 1</label>
                                        <div class="col-sm-7">
                                            <input name="pf_1" type="text" class="form-control form-control-sm @error('pf_1') is-invalid @enderror" value="{{ old('pf_1',$Soil->pf_1) }}" />
                                            @error('pf_1')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">pF 2</label>
                                        <div class="col-sm-7">
                                            <input name="pf_2" type="text" class="form-control form-control-sm @error('pf_2') is-invalid @enderror" value="{{ old('pf_2',$Soil->pf_2) }}" />
                                            @error('pf_2')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">pF 2.54</label>
                                        <div class="col-sm-7">
                                            <input name="pf_2_54" type="text" class="form-control form-control-sm @error('pf_2_54') is-invalid @enderror" value="{{ old('pf_2_54',$Soil->pf_2_54) }}" />
                                            @error('pf_2_54')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">pF 4.2</label>
                                        <div class="col-sm-7">
                                            <input name="pf_4_2" type="text" class="form-control form-control-sm @error('pf_4_2') is-invalid @enderror" value="{{ old('pf_4_2',$Soil->pf_4_2) }}" />
                                            @error('pf_4_2')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Laboratory</label>
                                        <div class="col-sm-7">
                                            <input name="laboratorium" type="text" class="form-control form-control-sm @error('laboratorium') is-invalid @enderror" value="{{ old('laboratorium',$Soil->laboratorium) }}" />
                                            @error('laboratorium')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end tds --}}

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