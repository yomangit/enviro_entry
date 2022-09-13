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
                        <li class="breadcrumb-item"><a href="/airquality/noisemeter/noise">Home</a></li>
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
                <div class="card-header p-0 ">

                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card-titel m-2 font-weight-bold">Form Edit</div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/airquality/noisemeter/noise/{{$Master->updated_at}}" method="post" checked enctype="multipart/form-data" autocomplete="off">
                        @method('put')
                        @csrf
                        <div class="row">


                            <div class="col-12 col-md-3">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Code Sample</label>
                                    <div class="col-sm-7">
                                        <select class="form-control form-control-sm " name="codesample_id">
                                            @foreach ($code_sample as $code)
                                            @if (old('codesample_id',$Master->codesample_id)==$code->id)
                                            <option value="{{$code->id}}" selected>{{$code->nama}}</option>
                                            @else
                                            <option value="{{$code->id}}">{{$code->nama}}</option>
                                            @endif
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Code Location</label>
                                    <div class="col-sm-7">
                                        <select class="form-control form-control-sm " name="location_id">
                                            @foreach ($code_location as $location)
                                            @if (old('location_id',$Master->location_id)==$location->id)
                                            <option value="{{$location->id}}" selected>{{$location->nama}}</option>
                                            @else
                                            <option value="{{$location->id}}">{{$location->nama}}</option>
                                            @endif
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group row">
                                    <label style="font-size: 12px" class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                                            <input type="text" name="date" class="form-control datetimepicker-input form-control-sm @error('date') is-invalid @enderror " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ old('date',date('d-m-Y',strtotime($Master->date)) ) }}" />
                                            @error('date')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive ">
                            <table class="table table-bordered  table-hover table-sm ">
                                <thead class="table-info" >
                                    <tr>
                                        <th class="align-middle" rowspan="2" >Time</th>
                                        <th style="text-align: center" colspan="12">Noise Data every 5 Seconds</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">5</th>
                                        <th scope="col">10</th>
                                        <th scope="col">15</th>
                                        <th scope="col">20</th>
                                        <th scope="col">25</th>
                                        <th scope="col">30</th>
                                        <th scope="col">35</th>
                                        <th scope="col">40</th>
                                        <th scope="col">45</th>
                                        <th scope="col">50</th>
                                        <th scope="col">55</th>
                                        <th scope="col">60</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><input style="width: 110px" name="A1" type="number" step="0.0001" class="form-control form-control-sm @error('A1') is-invalid @enderror" value="{{ old('A1',$Master->A1) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="A2" type="number" step="0.0001" class="form-control form-control-sm @error('A2') is-invalid @enderror" value="{{ old('A2',$Master->A2) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="A3" type="number" step="0.0001" class="form-control form-control-sm @error('A3') is-invalid @enderror" value="{{ old('A3',$Master->A3) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="A4" type="number" step="0.0001" class="form-control form-control-sm @error('A4') is-invalid @enderror" value="{{ old('A4',$Master->A4) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="A5" type="number" step="0.0001" class="form-control form-control-sm @error('A5') is-invalid @enderror" value="{{ old('A5',$Master->A5) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="A6" type="number" step="0.0001" class="form-control form-control-sm @error('A6') is-invalid @enderror" value="{{ old('A6',$Master->A6) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="A7" type="number" step="0.0001" class="form-control form-control-sm @error('A7') is-invalid @enderror" value="{{ old('A7',$Master->A7) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="A8" type="number" step="0.0001" class="form-control form-control-sm @error('A8') is-invalid @enderror" value="{{ old('A8',$Master->A8) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="A9" type="number" step="0.0001" class="form-control form-control-sm @error('A9') is-invalid @enderror" value="{{ old('A9',$Master->A9) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="A10" type="number" step="0.0001" class="form-control form-control-sm @error('A10') is-invalid @enderror" value="{{ old('A10',$Master->A10) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="A11" type="number" step="0.0001" class="form-control form-control-sm @error('A11') is-invalid @enderror" value="{{ old('A10',$Master->A11) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="A12" type="number" step="0.0001" class="form-control form-control-sm @error('A12') is-invalid @enderror" value="{{ old('A12',$Master->A1) }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td><input style="width: 110px" name="B1" type="number" step="0.0001" class="form-control form-control-sm @error('B1') is-invalid @enderror" value="{{ old('B1',$Master->A1) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="B2" type="number" step="0.0001" class="form-control form-control-sm @error('B2') is-invalid @enderror" value="{{ old('B2',$Master->B2) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="B3" type="number" step="0.0001" class="form-control form-control-sm @error('B3') is-invalid @enderror" value="{{ old('B3',$Master->B3) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="B4" type="number" step="0.0001" class="form-control form-control-sm @error('B4') is-invalid @enderror" value="{{ old('B4',$Master->B4) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="B5" type="number" step="0.0001" class="form-control form-control-sm @error('B5') is-invalid @enderror" value="{{ old('B5',$Master->B5) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="B6" type="number" step="0.0001" class="form-control form-control-sm @error('B6') is-invalid @enderror" value="{{ old('B6',$Master->B6) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="B7" type="number" step="0.0001" class="form-control form-control-sm @error('B7') is-invalid @enderror" value="{{ old('B7',$Master->B7) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="B8" type="number" step="0.0001" class="form-control form-control-sm @error('B8') is-invalid @enderror" value="{{ old('B8',$Master->B8) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="B9" type="number" step="0.0001" class="form-control form-control-sm @error('B9') is-invalid @enderror" value="{{ old('B9',$Master->B9) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="B10" type="number" step="0.0001" class="form-control form-control-sm @error('B10') is-invalid @enderror" value="{{ old('B10',$Master->B10) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="B11" type="number" step="0.0001" class="form-control form-control-sm @error('B11') is-invalid @enderror" value="{{ old('B11',$Master->B11) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="B12" type="number" step="0.0001" class="form-control form-control-sm @error('B12') is-invalid @enderror" value="{{ old('B12',$Master->B12) }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td><input style="width: 110px" name="C1" type="number" step="0.0001" class="form-control form-control-sm @error('C1') is-invalid @enderror" value="{{ old('C1',$Master->C1) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="C2" type="number" step="0.0001" class="form-control form-control-sm @error('C2') is-invalid @enderror" value="{{ old('C2',$Master->C2) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="C3" type="number" step="0.0001" class="form-control form-control-sm @error('C3') is-invalid @enderror" value="{{ old('C3',$Master->C3) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="C4" type="number" step="0.0001" class="form-control form-control-sm @error('C4') is-invalid @enderror" value="{{ old('C4',$Master->C4) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="C5" type="number" step="0.0001" class="form-control form-control-sm @error('C5') is-invalid @enderror" value="{{ old('C5',$Master->C5) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="C6" type="number" step="0.0001" class="form-control form-control-sm @error('C6') is-invalid @enderror" value="{{ old('C6',$Master->C6) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="C7" type="number" step="0.0001" class="form-control form-control-sm @error('C7') is-invalid @enderror" value="{{ old('C7',$Master->C7) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="C8" type="number" step="0.0001" class="form-control form-control-sm @error('C8') is-invalid @enderror" value="{{ old('C8',$Master->C8) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="C9" type="number" step="0.0001" class="form-control form-control-sm @error('C9') is-invalid @enderror" value="{{ old('C9',$Master->C9) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="C10" type="number" step="0.0001" class="form-control form-control-sm @error('C10') is-invalid @enderror" value="{{ old('C10',$Master->C10) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="C11" type="number" step="0.0001" class="form-control form-control-sm @error('C11') is-invalid @enderror" value="{{ old('C11',$Master->C11) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="C12" type="number" step="0.0001" class="form-control form-control-sm @error('C12') is-invalid @enderror" value="{{ old('C12',$Master->C12) }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td><input style="width: 110px" name="D1" type="number" step="0.0001" class="form-control form-control-sm @error('D1') is-invalid @enderror" value="{{ old('D1',$Master->D1) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="D2" type="number" step="0.0001" class="form-control form-control-sm @error('D2') is-invalid @enderror" value="{{ old('D2',$Master->D2) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="D3" type="number" step="0.0001" class="form-control form-control-sm @error('D3') is-invalid @enderror" value="{{ old('D3',$Master->D3) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="D4" type="number" step="0.0001" class="form-control form-control-sm @error('D4') is-invalid @enderror" value="{{ old('D4',$Master->D4) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="D5" type="number" step="0.0001" class="form-control form-control-sm @error('D5') is-invalid @enderror" value="{{ old('D5',$Master->D5) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="D6" type="number" step="0.0001" class="form-control form-control-sm @error('D6') is-invalid @enderror" value="{{ old('D6',$Master->D6) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="D7" type="number" step="0.0001" class="form-control form-control-sm @error('D7') is-invalid @enderror" value="{{ old('D7',$Master->D7) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="D8" type="number" step="0.0001" class="form-control form-control-sm @error('D8') is-invalid @enderror" value="{{ old('D8',$Master->D8) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="D9" type="number" step="0.0001" class="form-control form-control-sm @error('D9') is-invalid @enderror" value="{{ old('D9',$Master->D9) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="D10" type="number" step="0.0001" class="form-control form-control-sm @error('D10') is-invalid @enderror" value="{{ old('D10',$Master->D10) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="D11" type="number" step="0.0001" class="form-control form-control-sm @error('D11') is-invalid @enderror" value="{{ old('D11',$Master->D11) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="D12" type="number" step="0.0001" class="form-control form-control-sm @error('D12') is-invalid @enderror" value="{{ old('D12',$Master->D12) }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td><input style="width: 110px" name="E1" type="number" step="0.0001" class="form-control form-control-sm @error('E1') is-invalid @enderror" value="{{ old('E1',$Master->E1) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="E2" type="number" step="0.0001" class="form-control form-control-sm @error('E2') is-invalid @enderror" value="{{ old('E2',$Master->E2) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="E3" type="number" step="0.0001" class="form-control form-control-sm @error('E3') is-invalid @enderror" value="{{ old('E3',$Master->E3) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="E4" type="number" step="0.0001" class="form-control form-control-sm @error('E4') is-invalid @enderror" value="{{ old('E4',$Master->E4) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="E5" type="number" step="0.0001" class="form-control form-control-sm @error('E5') is-invalid @enderror" value="{{ old('E5',$Master->E5) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="E6" type="number" step="0.0001" class="form-control form-control-sm @error('E6') is-invalid @enderror" value="{{ old('E6',$Master->E6) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="E7" type="number" step="0.0001" class="form-control form-control-sm @error('E7') is-invalid @enderror" value="{{ old('E7',$Master->E7) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="E8" type="number" step="0.0001" class="form-control form-control-sm @error('E8') is-invalid @enderror" value="{{ old('E8',$Master->E8) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="E9" type="number" step="0.0001" class="form-control form-control-sm @error('E9') is-invalid @enderror" value="{{ old('E9',$Master->E9) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="E10" type="number" step="0.0001" class="form-control form-control-sm @error('E10') is-invalid @enderror" value="{{ old('E10',$Master->E10) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="E11" type="number" step="0.0001" class="form-control form-control-sm @error('E11') is-invalid @enderror" value="{{ old('E11',$Master->E11) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="E12" type="number" step="0.0001" class="form-control form-control-sm @error('E12') is-invalid @enderror" value="{{ old('E12',$Master->E12) }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td><input style="width: 110px" name="F1" type="number" step="0.0001" class="form-control form-control-sm @error('F1') is-invalid @enderror" value="{{ old('F1',$Master->F1) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="F2" type="number" step="0.0001" class="form-control form-control-sm @error('F2') is-invalid @enderror" value="{{ old('F2',$Master->F2) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="F3" type="number" step="0.0001" class="form-control form-control-sm @error('F3') is-invalid @enderror" value="{{ old('F3',$Master->F3) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="F4" type="number" step="0.0001" class="form-control form-control-sm @error('F4') is-invalid @enderror" value="{{ old('F4',$Master->F4) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="F5" type="number" step="0.0001" class="form-control form-control-sm @error('F5') is-invalid @enderror" value="{{ old('F5',$Master->F5) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="F6" type="number" step="0.0001" class="form-control form-control-sm @error('F6') is-invalid @enderror" value="{{ old('F6',$Master->F6) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="F7" type="number" step="0.0001" class="form-control form-control-sm @error('F7') is-invalid @enderror" value="{{ old('F7',$Master->F7) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="F8" type="number" step="0.0001" class="form-control form-control-sm @error('F8') is-invalid @enderror" value="{{ old('F8',$Master->F8) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="F9" type="number" step="0.0001" class="form-control form-control-sm @error('F9') is-invalid @enderror" value="{{ old('F9',$Master->F9) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="F10" type="number" step="0.0001" class="form-control form-control-sm @error('F10') is-invalid @enderror" value="{{ old('F10',$Master->F10) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="F11" type="number" step="0.0001" class="form-control form-control-sm @error('F11') is-invalid @enderror" value="{{ old('F11',$Master->F11) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="F12" type="number" step="0.0001" class="form-control form-control-sm @error('F12') is-invalid @enderror" value="{{ old('F12',$Master->F12) }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td><input style="width: 110px" name="G1" type="number" step="0.0001" class="form-control form-control-sm @error('G1') is-invalid @enderror" value="{{ old('G1',$Master->G1) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="G2" type="number" step="0.0001" class="form-control form-control-sm @error('G2') is-invalid @enderror" value="{{ old('G2',$Master->G2) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="G3" type="number" step="0.0001" class="form-control form-control-sm @error('G3') is-invalid @enderror" value="{{ old('G3',$Master->G3) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="G4" type="number" step="0.0001" class="form-control form-control-sm @error('G4') is-invalid @enderror" value="{{ old('G4',$Master->G4) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="G5" type="number" step="0.0001" class="form-control form-control-sm @error('G5') is-invalid @enderror" value="{{ old('G5',$Master->G5) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="G6" type="number" step="0.0001" class="form-control form-control-sm @error('G6') is-invalid @enderror" value="{{ old('G6',$Master->G6) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="G7" type="number" step="0.0001" class="form-control form-control-sm @error('G7') is-invalid @enderror" value="{{ old('G7',$Master->G7) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="G8" type="number" step="0.0001" class="form-control form-control-sm @error('G8') is-invalid @enderror" value="{{ old('G8',$Master->G8) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="G9" type="number" step="0.0001" class="form-control form-control-sm @error('G9') is-invalid @enderror" value="{{ old('G9',$Master->G9) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="G10" type="number" step="0.0001" class="form-control form-control-sm @error('G10') is-invalid @enderror" value="{{ old('G10',$Master->G10) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="G11" type="number" step="0.0001" class="form-control form-control-sm @error('G11') is-invalid @enderror" value="{{ old('G11',$Master->G11) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="G12" type="number" step="0.0001" class="form-control form-control-sm @error('G12') is-invalid @enderror" value="{{ old('G12',$Master->G12) }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td><input style="width: 110px" name="H1" type="number" step="0.0001" class="form-control form-control-sm @error('H1') is-invalid @enderror" value="{{ old('H1',$Master->H1) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="H2" type="number" step="0.0001" class="form-control form-control-sm @error('H2') is-invalid @enderror" value="{{ old('H2',$Master->H2) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="H3" type="number" step="0.0001" class="form-control form-control-sm @error('H3') is-invalid @enderror" value="{{ old('H3',$Master->H3) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="H4" type="number" step="0.0001" class="form-control form-control-sm @error('H4') is-invalid @enderror" value="{{ old('H4',$Master->H4) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="H5" type="number" step="0.0001" class="form-control form-control-sm @error('H5') is-invalid @enderror" value="{{ old('H5',$Master->H5) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="H6" type="number" step="0.0001" class="form-control form-control-sm @error('H6') is-invalid @enderror" value="{{ old('H6',$Master->H6) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="H7" type="number" step="0.0001" class="form-control form-control-sm @error('H7') is-invalid @enderror" value="{{ old('H7',$Master->H7) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="H8" type="number" step="0.0001" class="form-control form-control-sm @error('H8') is-invalid @enderror" value="{{ old('H8',$Master->H8) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="H9" type="number" step="0.0001" class="form-control form-control-sm @error('H9') is-invalid @enderror" value="{{ old('H9',$Master->H9) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="H10" type="number" step="0.0001" class="form-control form-control-sm @error('H10') is-invalid @enderror" value="{{ old('H10',$Master->H10) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="H11" type="number" step="0.0001" class="form-control form-control-sm @error('H11') is-invalid @enderror" value="{{ old('H11',$Master->H11) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="H12" type="number" step="0.0001" class="form-control form-control-sm @error('H12') is-invalid @enderror" value="{{ old('H12',$Master->H12) }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td><input style="width: 110px" name="I1" type="number" step="0.0001" class="form-control form-control-sm @error('I1') is-invalid @enderror" value="{{ old('I1',$Master->I1) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="I2" type="number" step="0.0001" class="form-control form-control-sm @error('I2') is-invalid @enderror" value="{{ old('I2',$Master->I2) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="I3" type="number" step="0.0001" class="form-control form-control-sm @error('I3') is-invalid @enderror" value="{{ old('I3',$Master->I3) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="I4" type="number" step="0.0001" class="form-control form-control-sm @error('I4') is-invalid @enderror" value="{{ old('I4',$Master->I4) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="I5" type="number" step="0.0001" class="form-control form-control-sm @error('I5') is-invalid @enderror" value="{{ old('I5',$Master->I5) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="I6" type="number" step="0.0001" class="form-control form-control-sm @error('I6') is-invalid @enderror" value="{{ old('I6',$Master->I6) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="I7" type="number" step="0.0001" class="form-control form-control-sm @error('I7') is-invalid @enderror" value="{{ old('I7',$Master->I7) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="I8" type="number" step="0.0001" class="form-control form-control-sm @error('I8') is-invalid @enderror" value="{{ old('I8',$Master->I8) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="I9" type="number" step="0.0001" class="form-control form-control-sm @error('I9') is-invalid @enderror" value="{{ old('I9',$Master->I9) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="I10" type="number" step="0.0001" class="form-control form-control-sm @error('I10') is-invalid @enderror" value="{{ old('I10',$Master->I10) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="I11" type="number" step="0.0001" class="form-control form-control-sm @error('I11') is-invalid @enderror" value="{{ old('I11',$Master->I11) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="I12" type="number" step="0.0001" class="form-control form-control-sm @error('I12') is-invalid @enderror" value="{{ old('I12',$Master->I12) }}" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td><input style="width: 110px" name="J1" type="number" step="0.0001" class="form-control form-control-sm @error('J1') is-invalid @enderror" value="{{ old('J1',$Master->J1) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="J2" type="number" step="0.0001" class="form-control form-control-sm @error('J2') is-invalid @enderror" value="{{ old('J2',$Master->J2) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="J3" type="number" step="0.0001" class="form-control form-control-sm @error('J3') is-invalid @enderror" value="{{ old('J3',$Master->J3) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="J4" type="number" step="0.0001" class="form-control form-control-sm @error('J4') is-invalid @enderror" value="{{ old('J4',$Master->J4) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="J5" type="number" step="0.0001" class="form-control form-control-sm @error('J5') is-invalid @enderror" value="{{ old('J5',$Master->J5) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="J6" type="number" step="0.0001" class="form-control form-control-sm @error('J6') is-invalid @enderror" value="{{ old('J6',$Master->J6) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="J7" type="number" step="0.0001" class="form-control form-control-sm @error('J7') is-invalid @enderror" value="{{ old('J7',$Master->J7) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="J8" type="number" step="0.0001" class="form-control form-control-sm @error('J8') is-invalid @enderror" value="{{ old('J8',$Master->J8) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="J9" type="number" step="0.0001" class="form-control form-control-sm @error('J9') is-invalid @enderror" value="{{ old('J9',$Master->J9) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="J10" type="number" step="0.0001" class="form-control form-control-sm @error('J10') is-invalid @enderror" value="{{ old('J10',$Master->J10) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="J11" type="number" step="0.0001" class="form-control form-control-sm @error('J11') is-invalid @enderror" value="{{ old('J11',$Master->J11) }}" />
                                        </td>
                                        <td><input style="width: 110px" name="J12" type="number" step="0.0001" class="form-control form-control-sm @error('J12') is-invalid @enderror" value="{{ old('J12',$Master->J12) }}" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

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
