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
                        <li class="breadcrumb-item"><a href="wastewater">Home</a></li>
                        <li class="breadcrumb-item active">{{$tittle}}</li>
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
                <div class="card-header p-0 p-2">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session()->has('failures'))

                    <table class="table table-danger">
                        <tr>
                            <th class="bg-gradient-info text-white">Row</th>
                            <th class="bg-gradient-info text-white">Attribute</th>
                            <th class="bg-gradient-info text-white">Errors</th>
                            <th class="bg-gradient-info text-white">Value</th>
                        </tr>
                        @foreach (session()->get('failures') as $validation)
                        <tr>
                            <td>{{$validation->row()}}</td>
                            <td>{{$validation->attribute()}}</td>
                            <td>
                                <ul>
                                    @foreach ($validation->errors() as $e)
                                    <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{$validation->values()[$validation->attribute()]}}</td>
                        </tr>
                        @endforeach
                    </table>
                    @endif
                    <div class="card-tools  row  mr-1 d-flex">
                        <form action="/wastewater" class="form-inline" autocomplete="off">
                            <div class="input-group date" id="reservationdate4" style="width: 85px;" data-target-input="nearest">
                                <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                            </div>
                            <span class="input-group-text form-control-sm ">To</span>

                            <div class="input-group date mr-2" id="reservationdate5" style="width: 85px;" data-target-input="nearest">
                                <input type="text" name="toDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate5" data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                            </div>

                            <div  class="input-group mr-1">
                                <select class="form-control form-control-sm " name="search" >
                                    <option value="" selected disabled>Code Sample</option>
                                    @foreach ($code_units as $code)
                                    @if ( request('search')==$code->nama)
                                    <option value="{{($code->nama)}}" selected>
                                        {{$code->nama}}
                                    </option>
                                    @else
                                    <option value="{{$code->nama}}">{{$code->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mr-2">
                                <button type="submit" class="btn bg-gradient-dark btn-xs">filter</button>
                            </div>
                        </form>
                        <form action="/wastewater">
                            <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                        </form>
                    </div>

                    <a href="/wastewater/wastewaterpointid" class="btn bg-gradient-info btn-xs ml-2  mb-1">Code Sample</a>
                    <a href="/wastewater/wastewaterstandard" class="btn bg-gradient-info btn-xs  ml-1 mb-1 ">Table Standard</a>
                </div>
                <div class="card-body">
                    <div class="content">
                        <div class="col-12">
                            <div class=" py-1 d-flex justify-content-start">
                                <a href="/wastewater/create" class="btn bg-gradient-secondary btn-xs ml-1"><i class="fas fa-plus ml-1 mt"></i>Add Data</a>
                                <a href="/export" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download ml-1"></i>Excel</a>
                                <a href="#" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default"><i class="fas fa-upload ml-1"></i>Excel</a>
                            </div>

                            <ul class="nav nav-tabs mt-2" id="custom-content-above-tab" role="tablist">
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link active" id="custom-content-above-Physical-tab" data-toggle="pill" href="#custom-content-above-Physical" role="tab" aria-controls="custom-content-above-Physical" aria-selected="true">Physical Chemical</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link" id="custom-content-above-Anions-tab" data-toggle="pill" href="#custom-content-above-Anions" role="tab" aria-controls="custom-content-above-Anions" aria-selected="false">Anions</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link" id="custom-content-above-Cyanide-tab" data-toggle="pill" href="#custom-content-above-Cyanide" role="tab" aria-controls="custom-content-above-Cyanide" aria-selected="false">Cyanide</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link" id="custom-content-above-nutrients-tab" data-toggle="pill" href="#custom-content-above-nutrients" role="tab" aria-controls="custom-content-above-nutrients" aria-selected="false">Nutrients</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link" id="custom-content-above-dissolved-tab" data-toggle="pill" href="#custom-content-above-dissolved" role="tab" aria-controls="custom-content-above-dissolved" aria-selected="false">Dissolved Metals</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link" id="custom-content-above-total-tab" data-toggle="pill" href="#custom-content-above-total" role="tab" aria-controls="custom-content-above-total" aria-selected="false">Total Metals</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link" id="custom-content-above-Organic-tab" data-toggle="pill" href="#custom-content-above-Organic" role="tab" aria-controls="custom-content-above-Organic" aria-selected="false">Organic</a>
                                </li>
                                <li class="nav-item">
                                    <a style="color:#581845" class="nav-link" id="custom-content-above-microbiology-tab" data-toggle="pill" href="#custom-content-above-microbiology" role="tab" aria-controls="custom-content-above-microbiology" aria-selected="false">Microbiology</a>
                                </li>

                            </ul>
                            @if($Wastewater->count() )
                            <div class="tab-content" id="custom-content-above-tabContent">
                                <div class="tab-pane fade show active card-body table-responsive " id="custom-content-above-Physical" role="tabpanel" aria-labelledby="custom-content-above-Physical-tab">
                                    <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center ">
                                            <tr>
                                                <th class="bg-gradient-info text-white">No</th>
                                                <th colspan="3" class="bg-gradient-info text-white">Quality Standard</th>
                                                <th class="bg-gradient-info text-white">Conductivity</th>
                                                <th class="bg-gradient-info text-white">TDS</th>
                                                <th class="bg-gradient-info text-white">TSS</th>
                                                <th class="bg-gradient-info text-white">Turbidity</th>
                                                <th class="bg-gradient-info text-white">Hardness</th>
                                                <th class="bg-gradient-info text-white">Alkalinity (as CaCo3)</th>
                                                <th class="bg-gradient-info text-white">Alkalinity-Carbonate</th>
                                                <th class="bg-gradient-info text-white">Alkalinity-Bicarbonate</th>
                                                <th class="bg-gradient-info text-white">Temperature </th>
                                                <th class="bg-gradient-info text-white">Salinity </th>
                                                <th class="bg-gradient-info text-white">Dissolved Oxygen (DO) </th>

                                            </tr>

                                            </tr>
                                        </thead>
                                        <tbody style="text-align:center" class=" border-1">
                                            @php
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp
                                            @foreach($QualityStd as $standard)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td colspan="3">{{$standard->nama}}</td>
                                                <td>{{$standard->conductivity}}</td>
                                                <td>{{$standard->tds}}</td>
                                                <td>{{$standard->tss}}</td>
                                                <td>{{$standard->turbidity}}</td>
                                                <td>{{$standard->hardness}}</td>
                                                <td>{{$standard->alkalinity_as_caco3}}</td>
                                                <td>{{$standard->alkalinity_carbonate}}</td>
                                                <td>{{$standard->alkalinity_bicarbonate}}</td>
                                                <td>{{$standard->temperature}}</td>
                                                <td>{{$standard->salinity}}</td>
                                                <td>{{$standard->do}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <th>*</th>
                                                <th>Action</th>
                                                <th>Poin ID</th>
                                                <th>Date</th>
                                                <th colspan="11">Data Entry</th>
                                            </tr>
                                            @php
                                            $no2 = 1 + ($Wastewater->currentPage() - 1) * $Wastewater->perPage();
                                            @endphp
                                            @foreach($Wastewater as $item)
                                            <tr>
                                                <td>{{$no2++}}</td>
                                                <td>
                                                    <div style="width: 50px">
                                                        <a href="/wastewater/{{ $item->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <form action="/wastewater/{{ $item->id }}" method="POST" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>{{$item->PointId->nama}}</td>
                                                <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                                <td>{{$item->conductivity}}</td>
                                                <td>{{$item->tds}}</td>
                                                <td>{{$item->tss}}</td>
                                                <td>{{$item->turbidity}}</td>
                                                <td>{{$item->hardness}}</td>
                                                <td>{{$item->alkalinity_as_caco3}}</td>
                                                <td>{{$item->alkalinity_carbonate}}</td>
                                                <td>{{$item->alkalinity_bicarbonate}}</td>
                                                <td>{{$item->temperature}}</td>
                                                <td>{{$item->salinity}}</td>
                                                <td>{{$item->do}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-Anions" role="tabpanel" aria-labelledby="custom-content-above-Anions-tab">

                                    <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center" style=" color:#581845;font-size: 10px">
                                            <tr>
                                                <th class="bg-gradient-info text-white">No</th>
                                                <th colspan="2" class="bg-gradient-info text-white">Quality Standard</th>
                                                <th class="bg-gradient-info text-white">pH</th>
                                                <th class="bg-gradient-info text-white">Alkalinity - Total</th>
                                                <th class="bg-gradient-info text-white">Chloride (Cl)</th>
                                                <th class="bg-gradient-info text-white">Fluoride (F)</th>
                                                <th class="bg-gradient-info text-white">Sulphate (SO4)</th>
                                                <th class="bg-gradient-info text-white">Sulphite (H2S)</th>
                                                <th class="bg-gradient-info text-white">Free Chlorine (Cl2)</th>
                                            </tr>

                                        </thead>
                                        <tbody style="text-align:center" class=" border-1">
                                            @php
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp

                                            @foreach($QualityStd as $standard)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td colspan="2">{{$standard->nama}}</td>
                                                <td>{{$standard->ph}}</td>
                                                <td>{{$standard->alkalinity_total}}</td>
                                                <td>{{$standard->cl}}</td>
                                                <td>{{$standard->fluoride}}</td>
                                                <td>{{$standard->sulphate}}</td>
                                                <td>{{$standard->sulphite}}</td>
                                                <td>{{$standard->free_chlorine}}</td>
                                            </tr>
                                            @endforeach
                                            @php
                                            $no2 = 1 + ($Wastewater->currentPage() - 1) * $Wastewater->perPage();
                                            @endphp
                                            @foreach($Wastewater as $item)
                                            <tr>
                                                <th>*</th>
                                                <th>Poin ID</th>
                                                <th>Date</th>
                                                <th colspan="7">Data Entry</th>
                                            </tr>
                                            <tr>
                                                <td>{{$no2++}}</td>
                                                <td>{{$item->PointId->nama}}</td>
                                                <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                                <td>{{$item->ph}}</td>
                                                <td>{{$item->alkalinity_total}}</td>
                                                <td>{{$item->cl}}</td>
                                                <td>{{$item->fluoride}}</td>
                                                <td>{{$item->sulphate}}</td>
                                                <td>{{$item->sulphite}}</td>
                                                <td>{{$item->free_chlorine}}</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-Cyanide" role="tabpanel" aria-labelledby="custom-content-above-Cyanide-tab">

                                    <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center" style=" color:#581845;font-size: 10px">
                                            <tr>
                                                <th class="bg-gradient-info text-white">No</th>
                                                <th colspan="2" class="bg-gradient-info text-white">Quality Standard</th>
                                                <th class="bg-gradient-info text-white">Free Cyanide (FCN)</th>
                                                <th class="bg-gradient-info text-white">Total Cyanide (CN Tot)</th>
                                                <th class="bg-gradient-info text-white">WAD Cyanide (CN Wad)</th>
                                            </tr>

                                        </thead>
                                        <tbody style="text-align:center" class=" border-1">
                                            @php
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp

                                            @foreach($QualityStd as $standard)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td colspan="2">{{$standard->nama}}</td>
                                                <td>{{$standard->fcn}}</td>
                                                <td>{{$standard->total_cyanide}}</td>
                                                <td>{{$standard->wad_cyanide}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <th>*</th>
                                                <th>Poin ID</th>
                                                <th>Date</th>
                                                <th colspan="3">Data Entry</th>
                                            </tr>
                                            @foreach($Wastewater as $item)
                                            @php
                                            $no2 = 1 + ($Wastewater->currentPage() - 1) * $Wastewater->perPage();
                                            @endphp
                                            <tr>
                                                <td>{{$no2++}}</td>
                                                <td>{{$item->PointId->nama}}</td>
                                                <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                                <td>{{$item->fcn}}</td>
                                                <td>{{$item->total_cyanide}}</td>
                                                <td>{{$item->wad_cyanide}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-nutrients" role="tabpanel" aria-labelledby="custom-content-above-nutrients-tab">

                                    <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center" style=" color:#581845;font-size: 10px">
                                            <tr>
                                                <th class="bg-gradient-info text-white">No</th>
                                                <th colspan="2" class="bg-gradient-info text-white">Quality Standard</th>
                                                <th class="bg-gradient-info text-white">Ammonia (N-NH3)</th>
                                                <th class="bg-gradient-info text-white">Nitrate (NO3)</th>
                                                <th class="bg-gradient-info text-white">Nitrite (NO2)</th>
                                                <th class="bg-gradient-info text-white">Phosphate (PO4)</th>
                                                <th class="bg-gradient-info text-white">Total-Phosphate (P-PO4)</th>
                                            </tr>

                                        </thead>
                                        <tbody style="text-align:center" class=" border-1">
                                            @php
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp
                                            @foreach($QualityStd as $standard)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td colspan="2">{{$standard->nama}}</td>
                                                <td>{{$standard->ammonia}}</td>
                                                <td>{{$standard->nitrate}}</td>
                                                <td>{{$standard->nitrite}}</td>
                                                <td>{{$standard->phosphate }}</td>
                                                <td>{{$standard->total_phosphate }}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <th>*</th>
                                                <th>Poin ID</th>
                                                <th>Date</th>
                                                <th colspan="5">Data Entry</th>
                                            </tr>
                                            @foreach($Wastewater as $item)
                                            @php
                                            $no2 = 1 + ($Wastewater->currentPage() - 1) * $Wastewater->perPage();
                                            @endphp
                                            <tr>
                                                <td>{{$no2++}}</td>
                                                <td>{{$item->PointId->nama}}</td>
                                                <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                                <td>{{$item->ammonia}}</td>
                                                <td>{{$item->nitrate}}</td>
                                                <td>{{$item->nitrite}}</td>
                                                <td>{{$item->phosphate }}</td>
                                                <td>{{$item->total_phosphate }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-dissolved" role="tabpanel" aria-labelledby="custom-content-above-dissolved-tab">

                                    <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center" style=" color:#581845;font-size: 10px">
                                            <tr>
                                                <th class="bg-gradient-info text-white">No</th>
                                                <th colspan="2" class="bg-gradient-info text-white">Quality Standard</th>
                                                <th class="bg-gradient-info text-white">Aluminium (Al)</th>
                                                <th class="bg-gradient-info text-white">Antimony (Sb)</th>
                                                <th class="bg-gradient-info text-white">Arsenic (As)</th>
                                                <th class="bg-gradient-info text-white">Barium (Ba)</th>
                                                <th class="bg-gradient-info text-white">Cadmium (Cd)</th>
                                                <th class="bg-gradient-info text-white">Calcium (Ca)</th>
                                                <th class="bg-gradient-info text-white">Chromium (Cr)</th>
                                                <th class="bg-gradient-info text-white">Chromium Hexavalent (Cr6+)</th>
                                                <th class="bg-gradient-info text-white">Cobalt (Co)</th>
                                                <th class="bg-gradient-info text-white">Copper (Cu)</th>
                                                <th class="bg-gradient-info text-white">Iron (Fe)</th>
                                                <th class="bg-gradient-info text-white">Lead (Pb)</th>
                                                <th class="bg-gradient-info text-white">Magnesium (Mg)</th>
                                                <th class="bg-gradient-info text-white">Manganese (Mn)</th>
                                                <th class="bg-gradient-info text-white">Mercury (Hg)</th>
                                                <th class="bg-gradient-info text-white">Nickel (Ni)</th>
                                                <th class="bg-gradient-info text-white">Selenium (Se)</th>
                                                <th class="bg-gradient-info text-white">Silver (Ag)</th>
                                                <th class="bg-gradient-info text-white">Sodium (Na)</th>
                                                <th class="bg-gradient-info text-white">Tin (Sn)</th>
                                                <th class="bg-gradient-info text-white">Zinc (Zn)</th>
                                            </tr>

                                        </thead>
                                        <tbody style="text-align:center" class=" border-1">
                                            @php
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp

                                            @foreach($QualityStd as $standard)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td colspan="2">{{$standard->nama}}</td>
                                                <td>{{$standard->aluminium}}</td>
                                                <td>{{$standard->antimony}}</td>
                                                <td>{{$standard->arsenic}}</td>
                                                <td>{{$standard->barium}}</td>
                                                <td>{{$standard->cadmium}}</td>
                                                <td>{{$standard->calcium}}</td>
                                                <td>{{$standard->chromium}}</td>
                                                <td>{{$standard->chromium_hexavalent}}</td>
                                                <td>{{$standard->cobalt}}</td>
                                                <td>{{$standard->copper}}</td>
                                                <td>{{$standard->iron}}</td>
                                                <td>{{$standard->lead}}</td>
                                                <td>{{$standard->magnesium}}</td>
                                                <td>{{$standard->manganese}}</td>
                                                <td>{{$standard->mercury}}</td>
                                                <td>{{$standard->nickel}}</td>
                                                <td>{{$standard->selenium}}</td>
                                                <td>{{$standard->silver}}</td>
                                                <td>{{$standard->sodium}}</td>
                                                <td>{{$standard->tin}}</td>
                                                <td>{{$standard->zinc}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <th>*</th>
                                                <th>Poin ID</th>
                                                <th>Date</th>
                                                <th colspan="21">Data Entry</th>
                                            </tr>
                                            @foreach($Wastewater as $item)
                                            @php
                                            $no2 = 1 + ($Wastewater->currentPage() - 1) * $Wastewater->perPage();
                                            @endphp
                                            <tr>
                                                <td>{{$no2++}}</td>
                                                <td>{{$item->PointId->nama}}</td>
                                                <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                                <td>{{$item->aluminium}}</td>
                                                <td>{{$item->antimony}}</td>
                                                <td>{{$item->arsenic}}</td>
                                                <td>{{$item->barium}}</td>
                                                <td>{{$item->cadmium}}</td>
                                                <td>{{$item->calcium}}</td>
                                                <td>{{$item->chromium}}</td>
                                                <td>{{$item->chromium_hexavalent}}</td>
                                                <td>{{$item->cobalt}}</td>
                                                <td>{{$item->copper}}</td>
                                                <td>{{$item->iron}}</td>
                                                <td>{{$item->lead}}</td>
                                                <td>{{$item->magnesium}}</td>
                                                <td>{{$item->manganese}}</td>
                                                <td>{{$item->mercury}}</td>
                                                <td>{{$item->nickel}}</td>
                                                <td>{{$item->selenium}}</td>
                                                <td>{{$item->silver}}</td>
                                                <td>{{$item->sodium}}</td>
                                                <td>{{$item->tin}}</td>
                                                <td>{{$item->zinc}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-total" role="tabpanel" aria-labelledby="custom-content-above-total-tab">

                                    <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center" style=" color:#581845;font-size: 10px">
                                            <tr>
                                                <th class="bg-gradient-info text-white">No</th>
                                                <th colspan="2" class="bg-gradient-info text-white">Quality Standard</th>
                                                <th class="bg-gradient-info text-white">Aluminium (T_Al)</th>
                                                <th class="bg-gradient-info text-white">Arsenic (T_As)</th>
                                                <th class="bg-gradient-info text-white">Cadmium (T_Cd)</th>
                                                <th class="bg-gradient-info text-white">Chromium (T_Cr)</th>
                                                <th class="bg-gradient-info text-white">Chromium Hexavalent (T_Cr6+)</th>
                                                <th class="bg-gradient-info text-white">Cobalt (T_Co)</th>
                                                <th class="bg-gradient-info text-white">Copper (T_Cu)</th>
                                                <th class="bg-gradient-info text-white">Lead (T_Pb)</th>
                                                <th class="bg-gradient-info text-white">Selenium (T_Se)</th>
                                                <th class="bg-gradient-info text-white">Mercury (T_hg)</th>
                                                <th class="bg-gradient-info text-white">Nickel (T_Ni)</th>
                                                <th class="bg-gradient-info text-white">Zinc (T_Zn)</th>
                                            </tr>

                                        </thead>
                                        <tbody style="text-align:center" class=" border-1">
                                            @php
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp

                                            @foreach($QualityStd as $standard)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td colspan="2">{{$standard->nama}}</td>
                                                <td>{{$standard->aluminium_t_ai}}</td>
                                                <td>{{$standard->arsenic_t_as}}</td>
                                                <td>{{$standard->cadmium_t_cd}}</td>
                                                <td>{{$standard->chromium_t}}</td>
                                                <td>{{$standard->chromium_hexavalent_t}}</td>
                                                <td>{{$standard->cobalt_t}}</td>
                                                <td>{{$standard->cooper}}</td>
                                                <td>{{$standard->lead_t}}</td>
                                                <td>{{$standard->selenium_t}}</td>
                                                <td>{{$standard->mercury_t}}</td>
                                                <td>{{$standard->nickel_t}}</td>
                                                <td>{{$standard->zinc_t}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <th>*</th>
                                                <th>Poin ID</th>
                                                <th>Date</th>
                                                <th colspan="12">Data Entry</th>
                                            </tr>
                                            @foreach($Wastewater as $item)
                                            @php
                                            $no2 = 1 + ($Wastewater->currentPage() - 1) * $Wastewater->perPage();
                                            @endphp
                                            <tr>
                                                <td>{{$no2++}}</td>
                                                <td>{{$item->PointId->nama}}</td>
                                                <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                                <td>{{$item->aluminium_t_ai}}</td>
                                                <td>{{$item->arsenic_t_as}}</td>
                                                <td>{{$item->cadmium_t_cd}}</td>
                                                <td>{{$item->chromium_t}}</td>
                                                <td>{{$item->chromium_hexavalent_t}}</td>
                                                <td>{{$item->cobalt_t}}</td>
                                                <td>{{$item->cooper}}</td>
                                                <td>{{$item->lead_t}}</td>
                                                <td>{{$item->selenium_t}}</td>
                                                <td>{{$item->mercury_t}}</td>
                                                <td>{{$item->nickel_t}}</td>
                                                <td>{{$item->zinc_t}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-Organic" role="tabpanel" aria-labelledby="custom-content-above-Organic-tab">

                                    <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center" style=" color:#581845;font-size: 10px">
                                            <tr>
                                                <th class="bg-gradient-info text-white">No</th>
                                                <th colspan="2" class="bg-gradient-info text-white">Quality Standard</th>
                                                <th class="bg-gradient-info text-white">BOD</th>
                                                <th class="bg-gradient-info text-white">COD</th>
                                                <th class="bg-gradient-info text-white">Oil and Grease</th>
                                                <th class="bg-gradient-info text-white">Phenols</th>
                                                <th class="bg-gradient-info text-white">Surfactant (MBAS)</th>
                                                <th class="bg-gradient-info text-white">Total PCB</th>
                                                <th class="bg-gradient-info text-white">A.O.X</th>
                                                <th class="bg-gradient-info text-white">PCDFs</th>
                                                <th class="bg-gradient-info text-white">PCDDs</th>
                                            </tr>

                                        </thead>
                                        <tbody style="text-align:center" class=" border-1">
                                            @php
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp

                                            @foreach($QualityStd as $standard)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td colspan="2">{{$standard->nama}}</td>
                                                <td>{{$standard->bod}}</td>
                                                <td>{{$standard->cod}}</td>
                                                <td>{{$standard->oil_and_grease}}</td>
                                                <td>{{$standard->phenols}}</td>
                                                <td>{{$standard->surfactant}}</td>
                                                <td>{{$standard->total_pcb}}</td>
                                                <td>{{$standard->a_o_x}}</td>
                                                <td>{{$standard->pcdfs}}</td>
                                                <td>{{$standard->pcdds}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <th>*</th>
                                                <th>Poin ID</th>
                                                <th>Date</th>
                                                <th colspan="9">Data Entry</th>
                                            </tr>
                                            @foreach($Wastewater as $item)
                                            @php
                                            $no2 = 1 + ($Wastewater->currentPage() - 1) * $Wastewater->perPage();
                                            @endphp
                                            <tr>
                                                <td>{{$no2++}}</td>
                                                <td>{{$item->PointId->nama}}</td>
                                                <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                                <td>{{$item->bod}}</td>
                                                <td>{{$item->cod}}</td>
                                                <td>{{$item->oil_and_grease}}</td>
                                                <td>{{$item->phenols}}</td>
                                                <td>{{$item->surfactant}}</td>
                                                <td>{{$item->total_pcb}}</td>
                                                <td>{{$item->a_o_x}}</td>
                                                <td>{{$item->pcdfs}}</td>
                                                <td>{{$item->pcdds}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-microbiology" role="tabpanel" aria-labelledby="custom-content-above-microbiology-tab">

                                    <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center" style=" color:#581845;font-size: 10px">
                                            <tr>
                                                <th class="bg-gradient-info text-white">No</th>
                                                <th colspan="2" class="bg-gradient-info text-white">Quality Standard</th>
                                                <th class="bg-gradient-info text-white">Fecal Coliformi</th>
                                                <th class="bg-gradient-info text-white">E- Coli</th>
                                                <th class="bg-gradient-info text-white">Total Coliform Bacteria </th>
                                            </tr>

                                        </thead>
                                        <tbody style="text-align:center" class=" border-1">
                                            @php
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp

                                            @foreach($QualityStd as $standard)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td colspan="2">{{$standard->nama}}</td>
                                                <td>{{$standard->fecal_coliform}}</td>
                                                <td>{{$standard->c_coli}}</td>
                                                <td>{{$standard->total_coliform_bacteria}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <th>*</th>
                                                <th>Poin ID</th>
                                                <th>Date</th>
                                                <th colspan="9">Data Entry</th>
                                            </tr>
                                            @foreach($Wastewater as $item)
                                            @php
                                            $no2 = 1 + ($Wastewater->currentPage() - 1) * $Wastewater->perPage();
                                            @endphp
                                            <tr>
                                                <td>{{$no2++}}</td>
                                                <td>{{$item->PointId->nama}}</td>
                                                <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                                <td>{{$item->fecal_coliform}}</td>
                                                <td>{{$item->c_coli}}</td>
                                                <td>{{$item->total_coliform_bacteria}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="card-tools row form-inline">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-start">
                                            <small>Showing {{ $Wastewater->firstItem() }} to
                                                {{ $Wastewater->lastItem() }} of {{ $Wastewater->total() }}
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div style="font-size: 8" class="d-flex justify-content-end pagination pagination-sm">
                                            {{ $Wastewater->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <p class="text-center fs-4 p-2 font-weight-bold">Not Data Found</p>
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
                                        <form action="/import" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="custom-file">
                                                    <input type="file" name="file" class="custom-file-input  @error('file') is-invalid @enderror" id="exampleInputFile" required>
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    @error('file')
                                                    <span class=" invalid-feedback ">{{ $message }}</span>
                                                    @enderror
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

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>

@endsection