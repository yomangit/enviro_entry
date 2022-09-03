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
                        <li class="breadcrumb-item"><a href="/soilquality/soilqualitystandard">{{ $tittle }}</a></li>
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
                <div class="card-header p-0 px-1">

                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    <p class="card-title">Form Input</p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/soilquality/soilqualitystandard" method="post" checked enctype="multipart/form-data" autocomplete="off">
                        @csrf



                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Name</label>
                                        <div class="col-sm-7">
                                            <input name="nama" type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" value="{{ old('nama') }}" />
                                            @error('nama')
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">pH</label>
                                        <div class="col-sm-7">
                                            <input name="ph" type="text" class="form-control form-control-sm @error('ph') is-invalid @enderror" value="{{ old('ph') }}" />
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
                                            <input name="ph_h2o" type="text" class="form-control form-control-sm @error('ph_h2o') is-invalid @enderror" value="{{ old('ph_h2o') }}" />
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
                                            <input name="total_organic_carbon" type="text" class="form-control form-control-sm @error('total_organic_carbon') is-invalid @enderror" value="{{ old('total_organic_carbon') }}" />
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
                                            <input name="total_nitrogen" type="text" class="form-control form-control-sm @error('total_nitrogen') is-invalid @enderror" value="{{ old('total_nitrogen') }}" />
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
                                            <input name="cn" type="text" class="form-control form-control-sm @error('cn') is-invalid @enderror" value="{{ old('cn') }}" />
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
                                            <input name="calsium" type="text" class="form-control form-control-sm @error('calsium') is-invalid @enderror" value="{{ old('calsium') }}" />
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
                                            <input name="magnesium" type="text" class="form-control form-control-sm @error('magnesium') is-invalid @enderror" value="{{ old('magnesium') }}" />
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
                                            <input name="pottasium" type="text" class="form-control form-control-sm @error('pottasium') is-invalid @enderror" value="{{ old('pottasium') }}" />
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
                                            <input name="sodium" type="text" class="form-control form-control-sm @error('sodium') is-invalid @enderror" value="{{ old('sodium') }}" />
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
                                            <input name="jumlah" type="text" class="form-control form-control-sm @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}" />
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
                                            <input name="p2o5_hcl_25" type="text" class="form-control form-control-sm @error('p2o5_hcl_25') is-invalid @enderror" value="{{ old('p2o5_hcl_25') }}" />
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
                                            <input name="k2o_hcl_25" type="text" class="form-control form-control-sm @error('k2o_hcl_25') is-invalid @enderror" value="{{ old('k2o_hcl_25') }}" />
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
                                            <input name="p2o5_olsen" type="text" class="form-control form-control-sm @error('p2o5_olsen') is-invalid @enderror" value="{{ old('p2o5_olsen') }}" />
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
                                            <input name="kapasitas_tukar_kation" type="text" class="form-control form-control-sm @error('kapasitas_tukar_kation') is-invalid @enderror" value="{{ old('kapasitas_tukar_kation') }}" />
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
                                            <input name="kb_kejenuhan_basa" type="text" class="form-control form-control-sm @error('kb_kejenuhan_basa') is-invalid @enderror" value="{{ old('kb_kejenuhan_basa') }}" />
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
                                            <input name="al_tukar" type="text" class="form-control form-control-sm @error('al_tukar') is-invalid @enderror" value="{{ old('al_tukar') }}" />
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
                                            <input name="h_tukar" type="text" class="form-control form-control-sm @error('h_tukar') is-invalid @enderror" value="{{ old('h_tukar') }}" />
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
                                            <input name="pasir" type="text" class="form-control form-control-sm @error('pasir') is-invalid @enderror" value="{{ old('pasir') }}" />
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
                                            <input name="debu" type="text" class="form-control form-control-sm @error('debu') is-invalid @enderror" value="{{ old('debu') }}" />
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
                                            <input name="lempung" type="text" class="form-control form-control-sm @error('lempung') is-invalid @enderror" value="{{ old('lempung') }}" />
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
                                            <input name="moisture_content" type="text" class="form-control form-control-sm @error('moisture_content') is-invalid @enderror" value="{{ old('moisture_content') }}" />
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
                                            <input name="bulk_density" type="text" class="form-control form-control-sm @error('bulk_density') is-invalid @enderror" value="{{ old('bulk_density') }}" />
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
                                            <input name="ruang_pori_total" type="text" class="form-control form-control-sm @error('ruang_pori_total') is-invalid @enderror" value="{{ old('ruang_pori_total') }}" />
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
                                            <input name="pd" type="text" class="form-control form-control-sm @error('pd') is-invalid @enderror" value="{{ old('pd') }}" />
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
                                            <input name="sangat_cepat" type="text" class="form-control form-control-sm @error('sangat_cepat') is-invalid @enderror" value="{{ old('sangat_cepat') }}" />
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
                                            <input name="cepat" type="text" class="form-control form-control-sm @error('cepat') is-invalid @enderror" value="{{ old('cepat') }}" />
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
                                            <input name="lambat" type="text" class="form-control form-control-sm @error('lambat') is-invalid @enderror" value="{{ old('lambat') }}" />
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
                                            <input name="air_tersedia" type="text" class="form-control form-control-sm @error('air_tersedia') is-invalid @enderror" value="{{ old('air_tersedia') }}" />
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
                                            <input name="permeabilitas" type="text" class="form-control form-control-sm @error('permeabilitas') is-invalid @enderror" value="{{ old('permeabilitas') }}" />
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
                                            <input name="pf_1" type="text" class="form-control form-control-sm @error('pf_1') is-invalid @enderror" value="{{ old('pf_1') }}" />
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
                                            <input name="pf_2" type="text" class="form-control form-control-sm @error('pf_2') is-invalid @enderror" value="{{ old('pf_2') }}" />
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
                                            <input name="pf_2_54" type="text" class="form-control form-control-sm @error('pf_2_54') is-invalid @enderror" value="{{ old('pf_2_54') }}" />
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
                                            <input name="pf_4_2" type="text" class="form-control form-control-sm @error('pf_4_2') is-invalid @enderror" value="{{ old('pf_4_2') }}" />
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
                                            <input name="laboratorium" type="text" class="form-control form-control-sm @error('laboratorium') is-invalid @enderror" value="{{ old('laboratorium') }}" />
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
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-primary btn-sm ">Create</button>
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