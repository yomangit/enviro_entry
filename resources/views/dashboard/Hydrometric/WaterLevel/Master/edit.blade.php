@extends('dashboard.layouts.main')
@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$tittle}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/hydrometric/wlvp">Home</a></li>
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
                <div class="card-header">
                    <h3 class="card-title">Form Edit</h3>


                </div>
                <!-- /.card-header -->
                <form action="/hydrometric/wlvp/{{ $Hydrometric->id }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @method('put')
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Code Sample</label>
                                    <div class="col-sm-7">
                                        <select class="form-control form-control-sm " name="point_id">
                                            @foreach ($code_units as $code)
                                            @if (old('point_id',$Hydrometric->point_id)===$code->id)
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
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                                            <input type="text" name="date" class="form-control datetimepicker-input form-control-sm @error('date') is-invalid @enderror " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ old( date('d-m-Y',strtotime('date')), date('d-m-Y',strtotime($Hydrometric->date))) }}" />
                                            @error('date')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                            </div>
                            {{-- end tanggal --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Start Time Sampling</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                            <input name="start_time" type="text" value="{{ old('start_time', $Hydrometric->start_time) }}" class="form-control datetimepicker-input form-control-sm @error('start_time') is-invalid @enderror" data-target="#timepicker" data-toggle="datetimepicker" />
                                            @error('start_time')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- end start time sampling --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Finish Time Sampling</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date" id="timepicker1" data-target-input="nearest">
                                            <input name="stop_time" type="text" value="{{ old('stop_time', $Hydrometric->stop_time) }}" class="form-control datetimepicker-input form-control-sm @error('stop_time') is-invalid @enderror" data-target="#timepicker1" data-toggle="datetimepicker" />
                                            @error('stop_time')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- end finish time sampling --}}

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Temperatur
                                            (<sup>0</sup>C)</label>
                                        <div class="col-sm-7">
                                            <input name="temperatur" type="number" step="0.01" class="form-control form-control-sm @error('temperatur') is-invalid @enderror" value="{{ old('temperatur', $Hydrometric->temperatur) }}" />
                                            @error('temperatur')
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">pH</label>
                                        <div class="col-sm-7">
                                            <input name="ph" type="number" step="0.01" class="form-control form-control-sm @error('ph') is-invalid @enderror" value="{{ old('ph', $Hydrometric->ph) }}">
                                            @error('ph')
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">ORP(mV)</label>
                                        <div class="col-sm-7">
                                            <input name="orp" type="number" step="0.01" value="{{ old('orp', $Hydrometric->orp) }}" class="form-control form-control-sm @error('orp') is-invalid @enderror">
                                            @error('orp')
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Conductivity
                                            (uS/cm)</label>
                                        <div class="col-sm-7">
                                            <input name="conductivity" type="number" step="0.01" class="form-control form-control-sm @error('conductivity') is-invalid @enderror" value="{{ old('conductivity', $Hydrometric->conductivity) }}" />
                                            @error('conductivity')
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Turbidity
                                            (NTU)</label>
                                        <div class="col-sm-7">
                                            <input name="turbidity" type="number" step="0.01" class="form-control form-control-sm @error('turbidity') is-invalid @enderror" value="{{ old('turbidity', $Hydrometric->turbidity) }}" />
                                            @error('turbidity')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end turbidity --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">DO</label>
                                        <div class="col-sm-7">
                                            <input name="do" type="number" step="0.01" class="form-control form-control-sm @error('do') is-invalid @enderror" value="{{ old('do', $Hydrometric->do) }}" />
                                            @error('do')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end do --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">TDS
                                            (mg/L)</label>
                                        <div class="col-sm-7">
                                            <input name="tds" type="number" step="0.01" class="form-control form-control-sm  @error('tds') is-invalid @enderror" value="{{ old('tds', $Hydrometric->tds) }}" />
                                            @error('tds')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end tds --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Salinity
                                            (ppt)</label>
                                        <div class="col-sm-7">
                                            <input name="salinity" type="number" step="0.01" class="form-control form-control-sm @error('salinity') is-invalid @enderror" value="{{ old('salinity', $Hydrometric->salinity) }}" />
                                            @error('salinity')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end salinity --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">TSS(mg/L)</label>
                                        <div class="col-sm-7">
                                            <input name="tss" type="number" step="0.01" value="{{ old('tss', $Hydrometric->tss) }}" class="form-control form-control-sm @error('tss') is-invalid @enderror">
                                            @error('tss')
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Cyanide (mg/L)</label>
                                        <div class="col-sm-7">
                                            <input name="cyanide" type="number" step="0.01" class="form-control form-control-sm @error('cyanide') is-invalid @enderror" value="{{ old('cyanide', $Hydrometric->cyanide) }}" />
                                            @error('cyanide')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end Cyanide --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Level GB (m)</label>
                                        <div class="col-sm-7">
                                            <input name="level" type="number" step="0.01" class="form-control form-control-sm @error('level') is-invalid @enderror" value="{{ old('level', $Hydrometric->level) }}">
                                            @error('level')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end level --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Level Loger (m)</label>
                                        <div class="col-sm-7">
                                            <input name="lvl_lgr" type="number" step="0.01" class="form-control form-control-sm @error('lvl_lgr') is-invalid @enderror" value="{{ old('lvl_lgr', $Hydrometric->lvl_lgr) }}">
                                            @error('lvl_lgr')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end level --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Debit (m<sup>3</sup>/<sub>s</sub> )</label>
                                        <div class="col-sm-7">
                                            <input name="debit_s" type="number" step="0.01" class="form-control form-control-sm @error('debit_s') is-invalid @enderror" value="{{ old('debit_s', $Hydrometric->debit_s) }}">
                                            @error('debit_s')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end debit s --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Debit (m<sup>3</sup>/<sub>day</sub> )</label>
                                        <div class="col-sm-7">
                                            <input name="debit_d" type="number" step="0.01" class="form-control form-control-sm @error('debit_d') is-invalid @enderror" value="{{ old('debit_d', $Hydrometric->debit_d) }}">
                                            @error('debit_d')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end debitDay --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Tailing TSF</label>
                                        <div class="col-sm-7">
                                            <input name="tl_tsf" type="number" step="0.01" class="form-control form-control-sm @error('tl_tsf') is-invalid @enderror" value="{{ old('tl_tsf', $Hydrometric->tl_tsf) }}" />
                                            @error('tl_tsf')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end tl TSF --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Tailing TSF Wall</label>
                                        <div class="col-sm-7">
                                            <input name="tl_wall" type="number" step="0.01" class="form-control form-control-sm @error('tl_wall') is-invalid @enderror" value="{{ old('tl_wall', $Hydrometric->tl_wall) }}" />
                                            @error('tl_wall')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end tl Wall --}}

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label"> Kondisi
                                            Perairan</label>
                                        <div class="col-sm-7">
                                            <div class="icheck-success d-inline col-sm-7">
                                                <input type="radio" name="water_condition" value="Pasang" {{ $Hydrometric->water_condition === 'Pasang' ? 'checked' : '' }} id="waterCondition">
                                                <label style="font-size: 12px" for="waterCondition"> Pasang
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="water_condition" value="Surut" {{ $Hydrometric->water_condition === 'Surut' ? 'checked' : '' }} id="waterCondition2">
                                                <label style="font-size: 12px" for="waterCondition2"> Surut
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- kondisi Air --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label"> Warna
                                            Air</label>
                                        <div class="col-sm-7">
                                            <div class="icheck-success d-inline col-sm-7">
                                                <input type="radio" name="water_color" value="Normal" {{ $Hydrometric->water_color === 'Normal' ? 'checked' : '' }} id="watercolor1">
                                                <label style="font-size: 12px" for="watercolor1">N
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="water_color" value="Agak Keruh" {{ $Hydrometric->water_color === 'Agak Keruh'||'Agak keruh' ? 'checked' : '' }} id="watercolor2">
                                                <label style="font-size: 12px" class="mr-1" for="watercolor2">AK
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="water_color" value="Keruh" {{ $Hydrometric->water_color === 'Keruh' ? 'checked' : '' }} id="watercolor3">
                                                <label style="font-size: 12px" for="watercolor3">K
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Bau Air</label>
                                        <div class="col-sm-7">
                                            <div class="icheck-success d-inline col-sm-7">

                                                <input type="radio" name="odor" value="Ya" {{ $Hydrometric->odor === 'Ya'||'Ada' ? 'checked' : '' }} id="waterScan1">
                                                <label style="font-size: 12px" for="waterScan1">Normal
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline">

                                                <input type="radio" name="odor" value="Tidak" {{ $Hydrometric->odor === 'Tidak' ? 'checked' : '' }} id="waterScant2">
                                                <label style="font-size: 12px" for="waterScant2">Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end Bau Air --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 11px" class="col-sm-4 col-form-label"> Hujan sebelum
                                            Sampling</label>
                                        <div class="col-sm-7">
                                            <div class="icheck-success d-inline col-sm-7">

                                                <input type="radio" name="rain" value="Ya" {{ $Hydrometric->rain === 'Ya'||'Ada' ? 'checked' : '' }} id="rain1">
                                                <label style="font-size: 12px" for="rain1">Ya
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="rain" value="Tidak" {{ $Hydrometric->rain === 'Tidak' ? 'checked' : '' }} id="rain2">
                                                <label style="font-size: 12px" for="rain2">Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- end sebelum sampling --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Hujan Saat
                                            Sampling
                                        </label>
                                        <div class="col-sm-7">
                                            <div class="icheck-success d-inline col-sm-7">

                                                <input type="radio" name="rain_during_sampling" value="Ya" {{ $Hydrometric->rain_during_sampling === 'Ya' ? 'checked' : '' }} id="rainSampling1">

                                                <label style="font-size: 12px" for="rainSampling1">Ya
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline">

                                                <input type="radio" name="rain_during_sampling" value="Tidak" {{ $Hydrometric->rain_during_sampling === 'Tidak' ? 'checked' : '' }} id="rainSampling2">
                                                <label style="font-size: 12px" for="rainSampling2">Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end saat sampling --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Lapisan
                                            Minyak</label>
                                        <div class="col-sm-7">
                                            <div class="icheck-success d-inline col-sm-7">
                                                <input type="radio" name="oil_layer" value="Ya" {{ $Hydrometric->oil_layer === 'Ya'||'Ada' ? 'checked' : '' }} id="oilLayer1">
                                                <label style="font-size: 12px" for="oilLayer1">Ya
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="oil_layer" value="Tidak" {{ $Hydrometric->oil_layer === 'Tidak' ? 'checked' : '' }} id="oilLayer2">
                                                <label style="font-size: 12px" for="oilLayer2">Tidak
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Sumber
                                            Pencemaran</label>
                                        <div class="col-sm-7">
                                            <input name="source_pollution" type="text" class="form-control form-control-sm @error('source_pollution') is-invalid @enderror" value="{{ old('source_pollution', $Hydrometric->source_pollution) }}" />
                                            @error('source_pollution')
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
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Sampler</label>
                                        <div class="col-sm-7">
                                            <input name="sampler" type="text" class="form-control form-control-sm @error('sampler') is-invalid @enderror" value="{{ old('sampler', $Hydrometric->sampler) }}" />
                                            @error('sampler')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- sampler --}}
                            {{-- sumber pencemaran --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Remarks</label>
                                        <div class="col-sm-7">
                                            <input name="remarks" type="text" class="form-control form-control-sm @error('remarks') is-invalid @enderror" value="{{ old('remarks', $Hydrometric->remarks) }}" />
                                            @error('remarks')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- sampler --}}
                            <!-- <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        @if ($Hydrometric->hard_copy)
                                            <img src="{{ asset('storage/' . $Hydrometric->hard_copy) }}"
                                                class="img-preview img-fluid mb-2 col-sm-5 d-block">
                                        @else
                                            <img class="img-preview img-fluid">
                                        @endif
                                        <div class="form-group row">

                                            <label for="hard_copy" class="col-sm-4 col-form-label ">Hard Copy</label>
                                            <input type="hidden" name="oldHard_copy" value="{{ $Hydrometric->hard_copy }}">
                                            <div class="input-group col-sm-7">
                                                <div class="custom-file row">

                                                    <input type="file" name="hard_copy"
                                                        value="{{ asset('storage/' . $Hydrometric->hard_copy) }}"
                                                        class="form-control  @error('hard_copy') is-invalid @enderror"
                                                        id="hard_copy" onchange="previewImage()" />

                                                    <label class="custom-file-label"
                                                        for="hard_copy">{{ asset('storage/' . $Hydrometric->hard_copy) }}</label>
                                                    @error('hard_copy')
                                                        <span class=" invalid-feedback ">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            <!-- /.col -->
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

<script>
    function previewImage() {
        const image = document.querySelector('#hard_copy');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection