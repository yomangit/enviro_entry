@extends('layout.main')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $breadcrumb }}</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
            
                <div class="card card-secondrary card-tabs">
                    <div class="card-header p-0 pt-1">
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible form-inline">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                            {{ session('success') }}
                        </div>
                        @endif
                       

                    </div>
                    <div class="card-body">
                        <section class="content mt-2">

                            <div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            @can('admin')
                                            <a href="/dashboard/dustgauge/noisemeter/noise/codesamplenm" class="btn bg-gradient-info btn-xs ">Code Sample</a>
                                            <a href="/dashborad/dustgauge/noisemeter/noise/location" class="btn bg-gradient-info btn-xs ">Code Location</a>@endcan
                                        </div>
                                        <!-- /.card-header -->
                                       

                                        <div class="card-body table-responsive  ">
                                        @if($code_sample->count() && $code_location->count())
                                            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Field Data</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false"> 24 Hour Noise Value Calculation</a>
                                                </li>

                                            </ul>
                                            <div class="tab-custom-content row ">
                                               
                                                <div class="col-12 col-sm-6">
                                                    <a href="/dashboard/dustgauge/noisemeter/noise/create" class="btn bg-gradient-secondary btn-xs mt-2"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                                                    <a href="/exportdatanoise" class="btn  bg-gradient-secondary btn-xs mt-2" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                                                    <a href="#" class="btn  bg-gradient-secondary btn-xs mt-2" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                                        <i class="fas fa-upload mr-1"></i>Excel
                                                    </a>
                                                </div>

                                                <div class=" col-12 col-sm-6 d-flex justify-content-end form-inline ">
                                                    <form action="/dashboard/dustgauge/noisemeter/noise" class="form-inline" autocomplete="off">
                                                        {{-- <label for="fromDate" class="mr-2">From</label> --}}
                                                        <div class="input-group date mr-2" id="reservationdate9" style="width: 85px;" data-target-input="nearest">
                                                            <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate9" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                                                        </div>

                                                        <div style="width: 118px;" class="input-group mr-1">
                                                            <select class="form-control form-control-sm " name="search">
                                                                <option value="" selected>Code Sample</option>
                                                                @foreach ($code_sample as $code)
                                                                @if ( request('search')==$code->id)
                                                                <option value="{{($code->id)}}" selected>{{$code->nama}}
                                                                </option>
                                                                @else
                                                                <option value="{{$code->id}}">{{$code->nama}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div style="width: 125px;" class="input-group mr-1">
                                                            <select class="form-control form-control-sm " name="location">
                                                                <option value="" selected>Code Location</option>
                                                                @foreach ($code_location as $location)
                                                                @if ( request('location')==$location->nama)
                                                                <option value="{{($location->nama)}}" selected>{{$location->nama}}
                                                                </option>
                                                                @else
                                                                <option value="{{$location->nama}}">{{$location->nama}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mr-2">
                                                            <button type="submit" class="btn bg-gradient-dark btn-xs">filter</button>
                                                        </div>
                                                    </form>
                                                    <form action="/dashboard/dustgauge/noisemeter/noise">
                                                        <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                                                    </form>
                                                </div>
                                                @else
                                                <div class="alert alert-info alert-dismissible form-inline">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×</button>
                                                    <h5 class="mr-2"><i class="icon fas fa-info"></i>Info</h5>
                                                    <b>You must enter code sample & code location first!!</b>
                                                </div>
                                                @endif
                                            </div>



                                            <div class="tab-content" id="custom-content-above-tabContent">
                                                <div class="tab-pane fade show active" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                                                    @if ($Codes->count())
                                                    <table role="grid" class="table table-bordered table-sm table-head-fixed ">
                                                        <thead style=" color:#005245">
                                                            <tr>
                                                                <th style="text-align: center" rowspan="2">Action</th>
                                                                <th style="text-align: center" rowspan="2">Code</th>
                                                                <th style="text-align: center" rowspan="2">Location</th>
                                                                <th style="text-align: center" rowspan="2">Date</th>
                                                                <th style="text-align: center" rowspan="2">Time</th>
                                                                <th style="text-align: center" colspan="13">Noise Data every 5 Seconds</th>
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
                                                                {{-- <th scope="col">Action</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center">
                                                            @php
                                                            $total=0;$log=0;
                                                            $a1=0;$a2=0; $a=0;$a2=0;$a3=0;$a4=0;$a5=0;$a6=0;$a7=0;
                                                            $no = 1 + ($Codes->currentPage() - 1) * $Codes->perPage();
                                                            @endphp
                                                            @foreach ($Codes as $code)
                                                            <tr>
                                                                <td><a hidden href="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="fas fa-pen"></i>
                                                                    </a>
                                                                    <form action="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}" method="POST" class="d-inline">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button hidden class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>1</th>
                                                                <td>{{$code->A1}}</td>
                                                                <td>{{$code->A2}}</td>
                                                                <td>{{$code->A3}}</td>
                                                                <td>{{$code->A4}}</td>
                                                                <td>{{$code->A5}}</td>
                                                                <td>{{$code->A6}}</td>
                                                                <td>{{$code->A7}}</td>
                                                                <td>{{$code->A8}}</td>
                                                                <td>{{$code->A9}}</td>
                                                                <td>{{$code->A10}}</td>
                                                                <td>{{$code->A11}}</td>
                                                                <td>{{$code->A12}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a hidden href="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="fas fa-pen"></i>
                                                                    </a>
                                                                    <form action="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}" method="POST" class="d-inline">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button hidden class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>2</th>
                                                                <td>{{$code->B1}}</td>
                                                                <td>{{$code->B2}}</td>
                                                                <td>{{$code->B3}}</td>
                                                                <td>{{$code->B4}}</td>
                                                                <td>{{$code->B5}}</td>
                                                                <td>{{$code->B6}}</td>
                                                                <td>{{$code->B7}}</td>
                                                                <td>{{$code->B8}}</td>
                                                                <td>{{$code->B9}}</td>
                                                                <td>{{$code->B10}}</td>
                                                                <td>{{$code->B11}}</td>
                                                                <td>{{$code->B12}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a hidden href="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="fas fa-pen"></i>
                                                                    </a>
                                                                    <form action="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}" method="POST" class="d-inline">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button hidden class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>3</th>
                                                                <td>{{$code->C1}}</td>
                                                                <td>{{$code->C2}}</td>
                                                                <td>{{$code->C3}}</td>
                                                                <td>{{$code->C4}}</td>
                                                                <td>{{$code->C5}}</td>
                                                                <td>{{$code->C6}}</td>
                                                                <td>{{$code->C7}}</td>
                                                                <td>{{$code->C8}}</td>
                                                                <td>{{$code->C9}}</td>
                                                                <td>{{$code->C10}}</td>
                                                                <td>{{$code->C11}}</td>
                                                                <td>{{$code->C12}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a hidden href="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="fas fa-pen"></i>
                                                                    </a>
                                                                    <form action="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}" method="POST" class="d-inline">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button hidden class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>4</th>
                                                                <td>{{$code->D1}}</td>
                                                                <td>{{$code->D2}}</td>
                                                                <td>{{$code->D3}}</td>
                                                                <td>{{$code->D4}}</td>
                                                                <td>{{$code->D5}}</td>
                                                                <td>{{$code->D6}}</td>
                                                                <td>{{$code->D7}}</td>
                                                                <td>{{$code->D8}}</td>
                                                                <td>{{$code->D9}}</td>
                                                                <td>{{$code->D10}}</td>
                                                                <td>{{$code->D11}}</td>
                                                                <td>{{$code->D12}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{-- <a href="/dashboard/dustgauge/noisemeter/noise/{{ $code->updated_at }}"
                                                                    class="btn btn btn-outline-primary btn-xs btn-group"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top" title="Detail">
                                                                    <i class="far fa-eye"></i>
                                                                    </a> --}}
                                                                    <a href="/dashboard/dustgauge/noisemeter/noise/{{ $code->updated_at }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="fas fa-pen"></i>
                                                                    </a>
                                                                    <form action="/dashboard/dustgauge/noisemeter/noise/{{ $code->updated_at }}" method="POST" class="d-inline">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <th>{{$code->CodesampleNM->nama}}</th>
                                                                <th>{{$code->CodelocationNM->nama}}</th>
                                                                <th>{{ date('d-m-Y', strtotime( $code->date)) }}</th>
                                                                {{-- <th>{{$code->date}}</th> --}}
                                                                <th>5</th>
                                                                <td>{{$code->E1}}</td>
                                                                <td>{{$code->E2}}</td>
                                                                <td>{{$code->E3}}</td>
                                                                <td>{{$code->E4}}</td>
                                                                <td>{{$code->E5}}</td>
                                                                <td>{{$code->E6}}</td>
                                                                <td>{{$code->E7}}</td>
                                                                <td>{{$code->E8}}</td>
                                                                <td>{{$code->E9}}</td>
                                                                <td>{{$code->E10}}</td>
                                                                <td>{{$code->E11}}</td>
                                                                <td>{{$code->E12}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a hidden href="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="fas fa-pen"></i>
                                                                    </a>
                                                                    <form action="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}" method="POST" class="d-inline">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button hidden class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>6</th>
                                                                <td>{{$code->F1}}</td>
                                                                <td>{{$code->F2}}</td>
                                                                <td>{{$code->F3}}</td>
                                                                <td>{{$code->F4}}</td>
                                                                <td>{{$code->F5}}</td>
                                                                <td>{{$code->F6}}</td>
                                                                <td>{{$code->F7}}</td>
                                                                <td>{{$code->F8}}</td>
                                                                <td>{{$code->F9}}</td>
                                                                <td>{{$code->F10}}</td>
                                                                <td>{{$code->F11}}</td>
                                                                <td>{{$code->F12}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a hidden href="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="fas fa-pen"></i>
                                                                    </a>
                                                                    <form action="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}" method="POST" class="d-inline">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button hidden class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>7</th>
                                                                <td>{{$code->G1}}</td>
                                                                <td>{{$code->G2}}</td>
                                                                <td>{{$code->G3}}</td>
                                                                <td>{{$code->G4}}</td>
                                                                <td>{{$code->G5}}</td>
                                                                <td>{{$code->G6}}</td>
                                                                <td>{{$code->G7}}</td>
                                                                <td>{{$code->G8}}</td>
                                                                <td>{{$code->G9}}</td>
                                                                <td>{{$code->G10}}</td>
                                                                <td>{{$code->G11}}</td>
                                                                <td>{{$code->G12}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a hidden href="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="fas fa-pen"></i>
                                                                    </a>
                                                                    <form action="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}" method="POST" class="d-inline">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button hidden class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>8</th>
                                                                <td>{{$code->H1}}</td>
                                                                <td>{{$code->H2}}</td>
                                                                <td>{{$code->H3}}</td>
                                                                <td>{{$code->H4}}</td>
                                                                <td>{{$code->H5}}</td>
                                                                <td>{{$code->H6}}</td>
                                                                <td>{{$code->H7}}</td>
                                                                <td>{{$code->H8}}</td>
                                                                <td>{{$code->H9}}</td>
                                                                <td>{{$code->H10}}</td>
                                                                <td>{{$code->H11}}</td>
                                                                <td>{{$code->H12}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a hidden href="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="fas fa-pen"></i>
                                                                    </a>
                                                                    <form action="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}" method="POST" class="d-inline">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button hidden class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>9</th>
                                                                <td>{{$code->I1}}</td>
                                                                <td>{{$code->I2}}</td>
                                                                <td>{{$code->I3}}</td>
                                                                <td>{{$code->I4}}</td>
                                                                <td>{{$code->I5}}</td>
                                                                <td>{{$code->I6}}</td>
                                                                <td>{{$code->I7}}</td>
                                                                <td>{{$code->I8}}</td>
                                                                <td>{{$code->I9}}</td>
                                                                <td>{{$code->I10}}</td>
                                                                <td>{{$code->I11}}</td>
                                                                <td>{{$code->I12}}</td>
                                                            </tr>


                                                            <tr>
                                                                <td>
                                                                    <a hidden href="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="fas fa-pen"></i>
                                                                    </a>
                                                                    <form action="/dashboard/dustgauge/noisemeter/noise/{{ $code->failed_at }}" method="POST" class="d-inline">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button hidden class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>10</th>
                                                                <td>{{$code->J1}}</td>
                                                                <td>{{$code->J2}}</td>
                                                                <td>{{$code->J3}}</td>
                                                                <td>{{$code->J4}}</td>
                                                                <td>{{$code->J5}}</td>
                                                                <td>{{$code->J6}}</td>
                                                                <td>{{$code->J7}}</td>
                                                                <td>{{$code->J8}}</td>
                                                                <td>{{$code->J9}}</td>
                                                                <td>{{$code->J10}}</td>
                                                                <td>{{$code->J11}}</td>
                                                                <td>{{$code->J12}}</td>

                                                            </tr>
                                                            <tr class="table table-info">

                                                                <td colspan="5"><span class="badge bg-info">
                                                                        <h6>Total =
                                                                            {{ $total=abs((round( 
                                                                (1/600)*5*pow(10,(0.1*$code->A1)),6)))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->A2)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->A3)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->A4)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->A5)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->A6)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->A7)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->A8)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->A9)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->A10)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->A11)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->A12)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->B1)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->B2)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->B3)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->B4)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->B5)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->B6)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->B7)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->B8)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->B9)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->B10)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->B11)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->B12)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->C1)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->C2)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->C3)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->C4)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->C5)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->C6)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->C7)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->C8)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->C9)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->C10)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->C11)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->C12)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->D1)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->D2)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->D3)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->D4)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->D5)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->D6)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->D7)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->D8)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->D9)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->D10)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->D11)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->D12)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->E1)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->E2)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->E3)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->E4)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->E5)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->E6)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->E7)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->E8)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->E9)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->E10)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->E11)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->E12)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->F1)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->F2)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->F3)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->F4)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->F5)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->F6)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->F7)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->F8)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->F9)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->F10)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->F11)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->F12)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->G1)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->G2)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->G3)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->G4)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->G5)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->G6)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->G7)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->G8)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->G9)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->G10)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->G11)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->G12)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->H1)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->H2)),6))+abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->H3)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->H4)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->H5)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->H6)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->H7)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->H8)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->H9)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->H10)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->H11)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->H12)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->I1)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->I2)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->I3)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->I4)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->I5)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->I6)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->I7)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->I8)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->I9)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->I10)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->I11)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->I12)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->J1)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->J2)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->J3)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->J4)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->J5)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->J6)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->J7)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->J8)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->J9)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->J10)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->J11)),6))+ abs(round(
                                                                (1/600)*5*pow(10,(0.1*$code->J12)),6)) }}
                                                                    </span></h6>
                                                                </td>
                                                                <td colspan="6"><span class="badge bg-info">
                                                                        <h6>log(Total) = {{$log=round((log10($total)),9)}}
                                                                    </span></h6>
                                                                </td>

                                                                @if ($code->CodesampleNM->nama=='L-01')
                                                                <td colspan="6"> <span class="badge bg-info">
                                                                        <h6> 10*log(Total) = {{$a1= 10*$log}}
                                                                    </span></h6>
                                                                </td>

                                                                @endif
                                                                @if ($code->CodesampleNM->nama=='L-02')
                                                                <td colspan="6"> <span class="badge bg-info">
                                                                        <h6> 10*log(Total) = {{$a2= 10*$log}}
                                                                    </span></h6>
                                                                </td>

                                                                @endif
                                                                @if ($code->CodesampleNM->nama=='L-03')
                                                                <td colspan="6"> <span class="badge bg-info">
                                                                        <h6> 10*log(Total) = {{$a3= 10*$log}}
                                                                    </span></h6>
                                                                </td>

                                                                @endif
                                                                @if ($code->CodesampleNM->nama=='L-04')
                                                                <td colspan="6"> <span class="badge bg-info">
                                                                        <h6> 10*log(Total) = {{$a4= 10*$log}}
                                                                    </span></h6>
                                                                </td>

                                                                @endif
                                                                @if ($code->CodesampleNM->nama=='L-05')
                                                                <td colspan="6"> <span class="badge bg-info">
                                                                        <h6> 10*log(Total) = {{$a5= 10*$log}}
                                                                    </span></h6>
                                                                </td>

                                                                @endif
                                                                @if ($code->CodesampleNM->nama=='L-06')
                                                                <td colspan="6"> <span class="badge bg-info">
                                                                        <h6> 10*log(Total) = {{$a6= 10*$log}}
                                                                    </span></h6>
                                                                </td>

                                                                @endif
                                                                @if ($code->CodesampleNM->nama=='L-07')
                                                                <td colspan="6"> <span class="badge bg-info">
                                                                        <h6> 10*log(Total) = {{$a7= 10*$log}}
                                                                    </span></h6>
                                                                </td>

                                                                @endif


                                                            </tr>

                                                            @endforeach

                                                        </tbody>
                                                    </table>


                                                    <div class="card-footer">
                                                        <div class="card-tools row form-inline">
                                                            <div class="col-4">
                                                                <div class="d-flex justify-content-start">
                                                                    <small>Showing {{ $Codes->firstItem() }} to {{
                                                                    $Codes->lastItem() }} of {{ $Codes->total() }}
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="d-flex justify-content-end">
                                                                    {{ $Codes->links() }}
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                                                    
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="callout callout-info">
                                                                        <h5><strong><i class="fas fa-info"></i></strong> Info</h5>

                                                                        <h6>Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $code->CodelocationNM->nama }}</h6>
                                                                        <h6>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ date('d-m-Y', strtotime( $code->date)) }}</h6>




                                                                        <div class="col-12 col-md-6">

                                                                        </div>


                                                                    </div>

                                                                    <div class="invoice p-3 mb-3">

                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <h4><i class="fa-solid fa-sun"></i> Daytime Noise (Ls)</h4>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class=" table-responsive p-0">
                                                                                <table class="table table-bordered  text-nowrap table-sm ">
                                                                                    <thead>
                                                                                        <tr class="text-center" style="font-size: 12px">
                                                                                            <th>No</th>
                                                                                            <th>Leq (dBA)</th>
                                                                                            <th>1/16</th>
                                                                                            <th>3.10<sup>0.1L1</sup>(1)</th>
                                                                                            <th>2.10<sup>0.1L2</sup>(2)</th>
                                                                                            <th>3.10<sup>0.1L2</sup>(3)</th>
                                                                                            <th>5.10<sup>0.1L4</sup>(4)</th>
                                                                                            <th>Sum (1)+(2)+(3)+(4)</th>
                                                                                            <th>(1/16)* Sum(1)+(2)+(3)+(4)</th>
                                                                                            <th>Log</th>
                                                                                            <th>Ls (dBA)</th>
                                                                                        </tr>
                                                                                    </thead>

                                                                                    <tbody>
                                                                                        @php
                                                                                        // $a1=0; $a2=0; $a3=0; $a4=0; $a5=0; $a6=0; $a7=0; $a8=0; $a9=0;
                                                                                        $t1=0;$t2=0;$t3=0;$t4=0;$t5=0;$t6=0;$t7=0;$Ls=0;
                                                                                        @endphp
                                                                                        <tr class="text-center" style="font-size: 12px">
                                                                                            <td>L-01</td>
                                                                                            <td>{{ $a1 }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="4">{{ 1/16 }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="4">{{$t1=round(3*pow(10,(0.1*$a1)),4) }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="4">{{$t2=round(2*pow(10,(0.1*$a2)),4) }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="4">{{$t3=round(3*pow(10,(0.1*$a3)),4) }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="4">{{$t4=round(5*pow(10,(0.1*$a4)),4) }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="4">{{$t5= round(($t1+$t2+$t3+$t4),5) }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="4">{{$t6= round((0.0625*$t5),5) }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="4">{{$t7= round((log10($t6)),4) }}</td>
                                                                                            <th style="vertical-align : middle;text-align:center;" rowspan="4">{{$Ls= round((10*$t7),3) }}</th>


                                                                                        </tr>
                                                                                        <tr class="text-center" style="font-size: 12px">
                                                                                            <td>L-02</td>
                                                                                            <td>{{ $a2 }}</td>

                                                                                        </tr>
                                                                                        <tr class="text-center" style="font-size: 12px">
                                                                                            <td>L-03</td>
                                                                                            <td>{{ $a3 }}</td>


                                                                                        </tr>
                                                                                        <tr class="text-center" style="font-size: 12px">
                                                                                            <td>L-04</td>
                                                                                            <td>{{ $a4 }}</td>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>



                                                                        </div>
                                                                    </div>
                                                                    <div class="invoice p-3 mb-3">

                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <h4><i class="fa-solid fa-moon"></i> Noise at night (Lm)</h4>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class=" table-responsive p-0">
                                                                                <table class="table table-bordered  text-nowrap table-sm ">
                                                                                    <thead>
                                                                                        <tr class="text-center" style="font-size: 12px">
                                                                                            <th>No</th>
                                                                                            <th>Leq (dBA)</th>
                                                                                            <th>1/8</th>
                                                                                            <th>2.10<sup>0.1L5</sup>(1)</th>
                                                                                            <th>3.10<sup>0.1L6</sup>(2)</th>
                                                                                            <th>3.10<sup>0.1L7</sup>(3)</th>
                                                                                            <th>Sum (1)+(2)+(3)</th>
                                                                                            <th>(1/8)*Sum (1)+(2)+(3)</th>
                                                                                            <th>Log</th>
                                                                                            <th>Lm (dBA)</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    @php
                                                                                    $m1=0;$m2=0;$m3=0;$m4=0;$m5=0;$m6=0;$Lm=0;
                                                                                    @endphp

                                                                                    <tbody>
                                                                                        <tr class="text-center" style="font-size: 12px">
                                                                                            <td>L-05</td>
                                                                                            <td>{{ $a5 }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="3">{{ 1/8 }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="3">{{ $m1=round((2*pow(10,(0.1*$a5))),4) }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="3">{{ $m2=round((3*pow(10,(0.1*$a6))),4) }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="3">{{ $m3=round((3*pow(10,(0.1*$a7))),4) }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="3">{{ $m4=round(($m1+$m2+$m3),4) }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="3">{{ $m5=round((0.125*$m4),5) }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="3">{{ $m6=round(log10($m5),4) }}</td>
                                                                                            <th style="vertical-align : middle;text-align:center;" rowspan="3">{{ $Lm= round((10*$m6),2) }}</th>

                                                                                        </tr>
                                                                                        <tr class="text-center" style="font-size: 12px">
                                                                                            <td>L-06</td>
                                                                                            <td>{{ $a6 }}</td>

                                                                                        </tr>
                                                                                        <tr class="text-center" style="font-size: 12px">
                                                                                            <td>L-07</td>
                                                                                            <td>{{ $a7 }}</td>

                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>



                                                                        </div>
                                                                    </div>
                                                                    <div class="invoice p-3 mb-3">

                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <h4><i class="fa-solid fa-clock"></i></i> Noise Day and Night (Lm)</h4>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class=" table-responsive p-0">
                                                                                <table class="table table-bordered  text-nowrap table-sm ">
                                                                                    <thead>
                                                                                        <tr class="text-center" style="font-size: 12px">
                                                                                            <th>No</th>
                                                                                            <th>L (dBA)</th>
                                                                                            <th>1/24</th>
                                                                                            <th>16.10<sup>0.1Ls</sup>(1)</th>
                                                                                            <th>8.10<sup>0.1Lm</sup>(2)</th>
                                                                                            <th>Sum (1)+(2)</th>
                                                                                            <th>(>1/24)*Sum (1)+(2)</th>
                                                                                            <th>Log</th>
                                                                                            <th>Lsm (dBA)</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    @php
                                                                                    $sm1=0;$sm2=0;$sm3=0;$sm4=0;$sm5=0;
                                                                                    @endphp

                                                                                    <tbody>
                                                                                        <tr class="text-center" style="font-size: 12px">
                                                                                            <td>Ls</td>
                                                                                            <td>{{ $Ls }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="2">{{ 1/24 }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="2">{{ $sm1=round((16*pow(10,(0.1*$Ls))),4) }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="2">{{ $sm2=round((8*pow(10,(0.1*$Lm))),4) }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="2">{{ $sm3=round(($sm1+$sm2),4) }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="2">{{ $sm4=round((0.041666666666667*$sm3),4) }}</td>
                                                                                            <td style="vertical-align : middle;text-align:center;" rowspan="2">{{ $sm5=round((log10($sm4)),4) }}</td>
                                                                                            <th style="vertical-align : middle;text-align:center;" rowspan="2">{{ round((10*$sm5),0) }}</th>

                                                                                        </tr>
                                                                                        <tr class="text-center" style="font-size: 12px">

                                                                                            <td>Lm</td>
                                                                                            <td>{{ $Lm }}</td>
                                                                                        </tr>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>



                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <p class="text-center fs-4">Not Data Found</p>
                                        @endif
                                        <div class="modal fade" id="modal-default">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Import Data</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/importdatanoise" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="custom-file">
                                                                <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Import</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                    </div>

                                    <!-- /.card -->
                                </div>
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                    </div>


                </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
@section('footer')
<script>
    $(function() {
        $('#reservationdate9').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#reservationdate2').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80
        , thumbnailHeight: 80
        , parallelUploads: 20
        , previewTemplate: previewTemplate
        , autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() {
            myDropzone.enqueueFile(file)
        }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End

</script>
@endsection

@endsection
