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
                <div class="card-header p-0 ">
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
                            <th>Row</th>
                            <th>Attribute</th>
                            <th>Errors</th>
                            <th>Value</th>
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
                    <div class=" card-tools p-1 mr-2 form-inline">
                        <form action="/wastewater" class="form-inline" autocomplete="off">
                            <div class="input-group date" id="reservationdate4" style="width: 85px;" data-target-input="nearest">
                                <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                            </div>
                            <span class="input-group-text form-control-sm ">To</span>

                            <div class="input-group date mr-2" id="reservationdate5" style="width: 85px;" data-target-input="nearest">
                                <input type="text" name="toDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate5" data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                            </div>

                            <div style="width: 118px;" class="input-group mr-1">
                                    <select class="form-control form-control-sm " name="search">
                                        <option value="" selected>Point ID</option>
                                        @foreach ($code_units as $code)
                                        @if ( request('search')==$code->nama)
                                        <option value="{{($code->nama)}}" selected>{{$code->nama}}</option>
                                        @else
                                        <option value="{{$code->nama}}">{{$code->nama}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                    <div style="width: 118px;" class="input-group mr-1">
                                        <select class="form-control form-control-sm " name="search1">
                                            <option value="" selected>Point ID 2</option>
                                            @foreach ($code_units as $code)
                                            @if ( request('search1')==$code->nama)
                                            <option value="{{($code->nama)}}" selected>{{$code->nama}}</option>
                                            @else
                                            <option value="{{$code->nama}}">{{$code->nama}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="width: 118px;" class="input-group mr-1">
                                        <select class="form-control form-control-sm " name="search2">
                                            <option value="" selected>Point ID 3</option>
                                            @foreach ($code_units as $code)
                                            @if ( request('search2')==$code->nama)
                                            <option value="{{($code->nama)}}" selected>{{$code->nama}}</option>
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

                    @can('admin')
                    <a href="/wastewater/wastewaterpointid" class="btn bg-gradient-info btn-xs ml-2 my-1 ">Code Sample</a>
                    <a href="/wastewater/wastewaterstandard" class="btn bg-gradient-info btn-xs  ml-1 my-1">Table Standard</a>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="content">
                        <div class="col-12">
                            @can('admin')
                            <div class=" py-1 d-flex justify-content-start">
                                <a href="/wastewater/create" class="btn bg-gradient-secondary btn-xs ml-1"><i class="fas fa-plus ml-1 mt"></i>Add Data</a>
                                <a href="/export/wastewater" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download ml-1"></i>Excel</a>
                                <a href="#" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default"><i class="fas fa-upload ml-1"></i>Excel</a>
                            </div>
                            @endcan

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
                                    <div class="table-responsive card card-primary card-outline">
                                        <table role="grid" class="table table-bordered  table-sm   table-striped">
                                            <thead class="text-center table-info ">
                                                <tr>
                                                    <th class="align-middle">No</th>
                                                    <th class="align-middle" @if(!auth()->user()->is_admin)colspan="2" @else colspan="3" @endif>Quality Standard</th>
                                                    <th class="align-middle">Conductivity</th>
                                                    <th class="align-middle">TDS</th>
                                                    <th class="align-middle">TSS</th>
                                                    <th class="align-middle">Turbidity</th>
                                                    <th class="align-middle">Hardness</th>
                                                    <th class="align-middle">Alkalinity (as CaCo3)</th>
                                                    <th class="align-middle">Alkalinity-Carbonate</th>
                                                    <th class="align-middle">Alkalinity-Bicarbonate</th>
                                                    <th class="align-middle">Temperature </th>
                                                    <th class="align-middle">Salinity </th>
                                                    <th class="align-middle">Dissolved Oxygen (DO) </th>

                                                </tr>

                                                </tr>
                                            </thead>
                                            <tbody style="text-align:center" class=" border-1">
                                                @php
                                                $no = 1 ;
                                                @endphp
                                                @foreach($QualityStd as $standard)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td @if(!auth()->user()->is_admin)colspan="2" @else colspan="3" @endif>{{$standard->nama}}</td>
                                                    <td>{{$standard-> conductivity}}</td>
                                                    <td>{{$standard-> totaldissolvedsolids_tds}}</td>
                                                    <td>{{$standard-> totalsuspendedsolids_tss}}</td>
                                                    <td>{{$standard-> turbidity}}</td>
                                                    <td>{{$standard-> hardness}}</td>
                                                    <td>{{$standard-> alkalinity_ascaco3}}</td>
                                                    <td>{{$standard-> alkalinitycarbonate}}</td>
                                                    <td>{{$standard-> alkalinitybicarbonate}}</td>
                                                    <td>{{$standard-> temperature}}</td>
                                                    <td>{{$standard-> salinity}}</td>
                                                    <td>{{$standard-> dissolvedoxygen_do}}</td>
                                                </tr>
                                                @endforeach
                                                <tr class="table-primary">
                                                    <th>*</th>
                                                    @can('admin')
                                                    <th>Action</th>
                                                    @endcan
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
                                                    @can('admin')
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
                                                    @endcan
                                                    <td>{{$item->PointId->nama}}</td>
                                                    <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                                    <td>{{$item-> conductivity}}</td>
                                                    <td>{{$item-> totaldissolvedsolids_tds}}</td>
                                                    <td>{{$item-> totalsuspendedsolids_tss}}</td>
                                                    <td>{{$item-> turbidity}}</td>
                                                    <td>{{$item-> hardness}}</td>
                                                    <td>{{$item-> alkalinity_ascaco3}}</td>
                                                    <td>{{$item-> alkalinitycarbonate}}</td>
                                                    <td>{{$item-> alkalinitybicarbonate}}</td>
                                                    <td>{{$item-> temperature}}</td>
                                                    <td>{{$item-> salinity}}</td>
                                                    <td>{{$item-> dissolvedoxygen_do}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-Anions" role="tabpanel" aria-labelledby="custom-content-above-Anions-tab">
                                    <div class="table-responsive card card-primary card-outline">
                                        <table role="grid" class="table table-bordered  table-sm   table-striped">
                                            <thead class="table-info">
                                                <tr>
                                                    <th>No</th>
                                                    <th colspan="2">Quality Standard</th>
                                                    <th>pH</th>
                                                    <th>Alkalinity - Total</th>
                                                    <th>Chloride (Cl)</th>
                                                    <th>Fluoride (F)</th>
                                                    <th>Sulphate (SO4)</th>
                                                    <th>Sulphite (H2S)</th>
                                                    <th>Free Chlorine (Cl2)</th>
                                                </tr>

                                            </thead>
                                            <tbody style="text-align:center" class=" border-1">
                                                @php
                                                $no = 1 ;
                                                @endphp

                                                @foreach($QualityStd as $standard)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td colspan="2">{{$standard->nama}}</td>
                                                    <td>{{$standard-> ph	}}</td>
                                                    <td>{{$standard-> alkalinitytotal	}}</td>
                                                    <td>{{$standard-> chloride_cl	}}</td>
                                                    <td>{{$standard-> fluoride_f	}}</td>
                                                    <td>{{$standard-> sulphate_so4	}}</td>
                                                    <td>{{$standard-> sulphite_h2s	}}</td>
                                                    <td>{{$standard-> freechlorine_cl2	}}</td>
                                                </tr>
                                                @endforeach
                                                @php
                                                $no2 = 1 + ($Wastewater->currentPage() - 1) * $Wastewater->perPage();
                                                @endphp

                                                <tr class="table-primary">
                                                    <th>*</th>
                                                    <th>Poin ID</th>
                                                    <th>Date</th>
                                                    <th colspan="7">Data Entry</th>
                                                </tr>
                                                @foreach($Wastewater as $item)
                                                <tr>
                                                    <td>{{$no2++}}</td>
                                                    <td>{{$item->PointId->nama}}</td>
                                                    <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                                    <td>{{$item-> ph	}}</td>
                                                    <td>{{$item-> alkalinitytotal	}}</td>
                                                    <td>{{$item-> chloride_cl	}}</td>
                                                    <td>{{$item-> fluoride_f	}}</td>
                                                    <td>{{$item-> sulphate_so4	}}</td>
                                                    <td>{{$item-> sulphite_h2s	}}</td>
                                                    <td>{{$item-> freechlorine_cl2	}}</td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-Cyanide" role="tabpanel" aria-labelledby="custom-content-above-Cyanide-tab">
                                    <div class="table-responsive card card-primary card-outline">
                                        <table role="grid" class="table table-bordered  table-sm   table-striped">
                                            <thead class="table-info">
                                                <tr>
                                                    <th class="align-middle">No</th>
                                                    <th class="align-middle" colspan="2">Quality Standard</th>
                                                    <th class="align-middle">Free Cyanide (FCN)</th>
                                                    <th class="align-middle">Total Cyanide (CN Tot)</th>
                                                    <th class="align-middle">WAD Cyanide (CN Wad)</th>
                                                </tr>

                                            </thead>
                                            <tbody style="text-align:center" class=" border-1">
                                                @php
                                                $no = 1 ;
                                                @endphp

                                                @foreach($QualityStd as $standard)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td colspan="2">{{$standard->nama}}</td>
                                                    <td>{{$standard-> freecyanide_fcn	}}</td>
                                                    <td>{{$standard-> totalcyanide_cntot	}}</td>
                                                    <td>{{$standard-> wadcyanide_cnwad	}}</td>
                                                </tr>
                                                @endforeach
                                                <tr class="table-primary">
                                                    <th>*</th>
                                                    <th>Poin ID</th>
                                                    <th>Date</th>
                                                    <th colspan="3">Data Entry</th>
                                                </tr>
                                                @php
                                                $no2 = 1 + ($Wastewater->currentPage() - 1) * $Wastewater->perPage();
                                                @endphp
                                                @foreach($Wastewater as $item)

                                                <tr>
                                                    <td>{{$no2++}}</td>
                                                    <td>{{$item->PointId->nama}}</td>
                                                    <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                                    <td>{{$item-> freecyanide_fcn	}}</td>
                                                    <td>{{$item-> totalcyanide_cntot	}}</td>
                                                    <td>{{$item-> wadcyanide_cnwad	}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-nutrients" role="tabpanel" aria-labelledby="custom-content-above-nutrients-tab">
                                    <div class="table-responsive card card-primary card-outline">
                                        <table role="grid" class="table table-bordered  table-sm   table-striped">
                                            <thead class="table-info">
                                                <tr>
                                                    <th class="align-middle">No</th>
                                                    <th class="align-middle" colspan="2">Quality Standard</th>
                                                    <th class="align-middle">Ammonia (NH4)</th>
                                                    <th class="align-middle">Ammonium (N-NH3)</th>
                                                    <th class="align-middle">Nitrate (NO3)</th>
                                                    <th class="align-middle">Nitrite (NO2)</th>
                                                    <th class="align-middle">Phosphate (PO4)</th>
                                                    <th class="align-middle">Total-Phosphate (P-PO4)</th>
                                                </tr>

                                            </thead>
                                            <tbody style="text-align:center" class=" border-1">
                                                @php
                                                $no = 1 ;
                                                @endphp
                                                @foreach($QualityStd as $standard)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td colspan="2">{{$standard->nama}}</td>
                                                    <td>{{$standard-> ammonia_nh4	}}</td>
                                                    <td>{{$standard-> ammonium_n_nh3	}}</td>
                                                    <td>{{$standard-> nitrate_no3	}}</td>
                                                    <td>{{$standard-> nitrite_no2	}}</td>
                                                    <td>{{$standard-> phosphate_po4	}}</td>
                                                    <td>{{$standard-> totalphosphate_ppo4	}}</td>
                                                </tr>
                                                @endforeach
                                                <tr class="table-primary">
                                                    <th>*</th>
                                                    <th>Poin ID</th>
                                                    <th>Date</th>
                                                    <th colspan="6">Data Entry</th>
                                                </tr>
                                                @php
                                                $no2 = 1 + ($Wastewater->currentPage() - 1) * $Wastewater->perPage();
                                                @endphp
                                                @foreach($Wastewater as $item)

                                                <tr>
                                                    <td>{{$no2++}}</td>
                                                    <td>{{$item->PointId->nama}}</td>
                                                    <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                                    <td>{{$item-> ammonia_nh4	}}</td>
                                                    <td>{{$item-> ammonium_n_nh3	}}</td>
                                                    <td>{{$item-> nitrate_no3	}}</td>
                                                    <td>{{$item-> nitrite_no2	}}</td>
                                                    <td>{{$item-> phosphate_po4	}}</td>
                                                    <td>{{$item-> totalphosphate_ppo4	}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-dissolved" role="tabpanel" aria-labelledby="custom-content-above-dissolved-tab">
                                    <div class="table-responsive card card-primary card-outline">
                                        <table role="grid" class="table table-bordered  table-sm   table-striped">
                                            <thead class="table-info">
                                                <tr>
                                                    <th class="align-middle">No</th>
                                                    <th class="align-middle" colspan="2">Quality Standard</th>
                                                    <th class="align-middle">Aluminium (Al)</th>
                                                    <th class="align-middle">Antimony (Sb)</th>
                                                    <th class="align-middle">Arsenic (As)</th>
                                                    <th class="align-middle">Barium (Ba)</th>
                                                    <th class="align-middle">Cadmium (Cd)</th>
                                                    <th class="align-middle">Calcium (Ca)</th>
                                                    <th class="align-middle">Chromium (Cr)</th>
                                                    <th class="align-middle">Chromium Hexavalent (Cr6+)</th>
                                                    <th class="align-middle">Cobalt (Co)</th>
                                                    <th class="align-middle">Copper (Cu)</th>
                                                    <th class="align-middle">Iron (Fe)</th>
                                                    <th class="align-middle">Lead (Pb)</th>
                                                    <th class="align-middle">Magnesium (Mg)</th>
                                                    <th class="align-middle">Manganese (Mn)</th>
                                                    <th class="align-middle">Mercury (Hg)</th>
                                                    <th class="align-middle">Nickel (Ni)</th>
                                                    <th class="align-middle">Selenium (Se)</th>
                                                    <th class="align-middle">Silver (Ag)</th>
                                                    <th class="align-middle">Sodium (Na)</th>
                                                    <th class="align-middle">Tin (Sn)</th>
                                                    <th class="align-middle">Zinc (Zn)</th>
                                                </tr>

                                            </thead>
                                            <tbody style="text-align:center" class=" border-1">
                                                @php
                                                $no = 1 ;
                                                @endphp

                                                @foreach($QualityStd as $standard)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td colspan="2">{{$standard->nama}}</td>
                                                    <td>{{$standard-> aluminium_al	}}</td>
                                                    <td>{{$standard-> antimony_sb	}}</td>
                                                    <td>{{$standard-> arsenic_as	}}</td>
                                                    <td>{{$standard-> barium_ba	}}</td>
                                                    <td>{{$standard-> cadmium_cd	}}</td>
                                                    <td>{{$standard-> calcium_ca	}}</td>
                                                    <td>{{$standard-> chromium_cr	}}</td>
                                                    <td>{{$standard-> chromiumhexavalent_cr6	}}</td>
                                                    <td>{{$standard-> cobalt_co	}}</td>
                                                    <td>{{$standard-> copper_cu	}}</td>
                                                    <td>{{$standard-> iron_fe	}}</td>
                                                    <td>{{$standard-> lead_pb	}}</td>
                                                    <td>{{$standard-> magnesium_mg	}}</td>
                                                    <td>{{$standard-> manganese_mn	}}</td>
                                                    <td>{{$standard-> mercury_hg	}}</td>
                                                    <td>{{$standard-> nickel_ni	}}</td>
                                                    <td>{{$standard-> selenium_se	}}</td>
                                                    <td>{{$standard-> silver_ag	}}</td>
                                                    <td>{{$standard-> sodium_na	}}</td>
                                                    <td>{{$standard-> tin_sn	}}</td>
                                                    <td>{{$standard-> zinc_zn	}}</td>
                                                </tr>
                                                @endforeach
                                                <tr class="table-primary">
                                                    <th>*</th>
                                                    <th>Poin ID</th>
                                                    <th>Date</th>
                                                    <th colspan="21">Data Entry</th>
                                                </tr>
                                                @php
                                                $no2 = 1 + ($Wastewater->currentPage() - 1) * $Wastewater->perPage();
                                                @endphp
                                                @foreach($Wastewater as $item)

                                                <tr>
                                                    <td>{{$no2++}}</td>
                                                    <td>{{$item->PointId->nama}}</td>
                                                    <td>{{date('d-m-Y',strtotime($item->date))}}</td>
                                                    <td>{{$item-> aluminium_al	}}</td>
                                                    <td>{{$item-> antimony_sb	}}</td>
                                                    <td>{{$item-> arsenic_as	}}</td>
                                                    <td>{{$item-> barium_ba	}}</td>
                                                    <td>{{$item-> cadmium_cd	}}</td>
                                                    <td>{{$item-> calcium_ca	}}</td>
                                                    <td>{{$item-> chromium_cr	}}</td>
                                                    <td>{{$item-> chromiumhexavalent_cr6	}}</td>
                                                    <td>{{$item-> cobalt_co	}}</td>
                                                    <td>{{$item-> copper_cu	}}</td>
                                                    <td>{{$item-> iron_fe	}}</td>
                                                    <td>{{$item-> lead_pb	}}</td>
                                                    <td>{{$item-> magnesium_mg	}}</td>
                                                    <td>{{$item-> manganese_mn	}}</td>
                                                    <td>{{$item-> mercury_hg	}}</td>
                                                    <td>{{$item-> nickel_ni	}}</td>
                                                    <td>{{$item-> selenium_se	}}</td>
                                                    <td>{{$item-> silver_ag	}}</td>
                                                    <td>{{$item-> sodium_na	}}</td>
                                                    <td>{{$item-> tin_sn	}}</td>
                                                    <td>{{$item-> zinc_zn	}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-total" role="tabpanel" aria-labelledby="custom-content-above-total-tab">
                                    <div class="table-responsive card card-primary card-outline">
                                        <table role="grid" class="table table-bordered  table-sm   table-striped">
                                            <thead class="table-info">
                                                <tr>
                                                    <th class="align-middle">No</th>
                                                    <th class="align-middle" colspan="2">Quality Standard</th>
                                                    <th class="align-middle">Aluminium (T_Al)</th>
                                                    <th class="align-middle">Arsenic (T_As)</th>
                                                    <th class="align-middle">Cadmium (T_Cd)</th>
                                                    <th class="align-middle">Chromium (T_Cr)</th>
                                                    <th class="align-middle">Chromium Hexavalent (T_Cr6+)</th>
                                                    <th class="align-middle">Cobalt (T_Co)</th>
                                                    <th class="align-middle">Copper (T_Cu)</th>
                                                    <th class="align-middle">Lead (T_Pb)</th>
                                                    <th class="align-middle">Selenium (T_Se)</th>
                                                    <th class="align-middle">Mercury (T_hg)</th>
                                                    <th class="align-middle">Nickel (T_Ni)</th>
                                                    <th class="align-middle">Zinc (T_Zn)</th>
                                                </tr>

                                            </thead>
                                            <tbody style="text-align:center" class=" border-1">
                                                @php
                                                $no = 1 ;
                                                @endphp

                                                @foreach($QualityStd as $standard)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td colspan="2">{{$standard->nama}}</td>
                                                    <td>{{$standard-> aluminium_tal	}}</td>
                                                    <td>{{$standard-> arsenic_tas	}}</td>
                                                    <td>{{$standard-> cadmium_tcd	}}</td>
                                                    <td>{{$standard-> chromiumhexavalent_tcr6	}}</td>
                                                    <td>{{$standard-> chromium_tcr	}}</td>
                                                    <td>{{$standard-> cobalt_tco	}}</td>
                                                    <td>{{$standard-> copper_tco	}}</td>
                                                    <td>{{$standard-> lead_tpb	}}</td>
                                                    <td>{{$standard-> selenium_tse	}}</td>
                                                    <td>{{$standard-> mercury_thg	}}</td>
                                                    <td>{{$standard-> nickel_tni	}}</td>
                                                    <td>{{$standard-> zinc_tzn	}}</td>
                                                </tr>
                                                @endforeach
                                                <tr class="table-primary">
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
                                                    <td>{{$item-> aluminium_tal	}}</td>
                                                    <td>{{$item-> arsenic_tas	}}</td>
                                                    <td>{{$item-> cadmium_tcd	}}</td>
                                                    <td>{{$item-> chromiumhexavalent_tcr6	}}</td>
                                                    <td>{{$item-> chromium_tcr	}}</td>
                                                    <td>{{$item-> cobalt_tco	}}</td>
                                                    <td>{{$item-> copper_tco	}}</td>
                                                    <td>{{$item-> lead_tpb	}}</td>
                                                    <td>{{$item-> selenium_tse	}}</td>
                                                    <td>{{$item-> mercury_thg	}}</td>
                                                    <td>{{$item-> nickel_tni	}}</td>
                                                    <td>{{$item-> zinc_tzn	}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-Organic" role="tabpanel" aria-labelledby="custom-content-above-Organic-tab">
                                    <div class="table-responsive card card-primary card-outline">
                                        <table role="grid" class="table table-bordered  table-sm   table-striped">
                                            <thead class="table-info">
                                                <tr>
                                                    <th class="align-middle">No</th>
                                                    <th class="align-middle" colspan="2">Quality Standard</th>
                                                    <th class="align-middle">BOD</th>
                                                    <th class="align-middle">COD</th>
                                                    <th class="align-middle">Oil and Grease</th>
                                                    <th class="align-middle">Phenols</th>
                                                    <th class="align-middle">Surfactant (MBAS)</th>
                                                    <th class="align-middle">Total PCB</th>
                                                    <th class="align-middle">A.O.X</th>
                                                    <th class="align-middle">PCDFs</th>
                                                    <th class="align-middle">PCDDs</th>
                                                </tr>

                                            </thead>
                                            <tbody style="text-align:center" class=" border-1">
                                                @php
                                                $no = 1 ;
                                                @endphp

                                                @foreach($QualityStd as $standard)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td colspan="2">{{$standard->nama}}</td>
                                                    <td>{{$standard-> bod	}}</td>
                                                    <td>{{$standard-> cod	}}</td>
                                                    <td>{{$standard-> oilandgrease	}}</td>
                                                    <td>{{$standard-> totalphenols	}}</td>
                                                    <td>{{$standard-> surfactant_mbas	}}</td>
                                                    <td>{{$standard-> totalpcb	}}</td>
                                                    <td>{{$standard-> aox	}}</td>
                                                    <td>{{$standard-> pcdfs	}}</td>
                                                    <td>{{$standard-> pcdds	}}</td>
                                                </tr>
                                                @endforeach
                                                <tr class="table-primary">
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
                                                    <td>{{$item-> bod	}}</td>
                                                    <td>{{$item-> cod	}}</td>
                                                    <td>{{$item-> oilandgrease	}}</td>
                                                    <td>{{$item-> totalphenols	}}</td>
                                                    <td>{{$item-> surfactant_mbas	}}</td>
                                                    <td>{{$item-> totalpcb	}}</td>
                                                    <td>{{$item-> aox	}}</td>
                                                    <td>{{$item-> pcdfs	}}</td>
                                                    <td>{{$item-> pcdds	}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-microbiology" role="tabpanel" aria-labelledby="custom-content-above-microbiology-tab">
                                    <div class="table-responsive card card-primary card-outline">
                                        <table role="grid" class="table table-bordered  table-sm   table-striped">
                                            <thead class="table-info">
                                                <tr>
                                                    <th class="align-middle">No</th>
                                                    <th class="align-middle" colspan="2">Quality Standard</th>
                                                    <th class="align-middle">Fecal Coliformi</th>
                                                    <th class="align-middle">E- Coli</th>
                                                    <th class="align-middle">Total Coliform Bacteria </th>
                                                </tr>

                                            </thead>
                                            <tbody style="text-align:center" class=" border-1">
                                                @php
                                                $no = 1 ;
                                                @endphp

                                                @foreach($QualityStd as $standard)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td colspan="2">{{$standard->nama}}</td>
                                                    <td>{{$standard-> fecalcoliform	}}</td>
                                                    <td>{{$standard-> ecoli	}}</td>
                                                    <td>{{$standard-> totalcoliformbacteria	}}</td>
                                                </tr>
                                                @endforeach
                                                <tr class="table-primary">
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
                                                    <td>{{$item-> fecalcoliform	}}</td>
                                                    <td>{{$item-> ecoli	}}</td>
                                                    <td>{{$item-> totalcoliformbacteria	}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            @else
                            <p class="text-center fs-4 p-2 font-weight-bold">Not Data Found</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class=" form-inline">
                        <div class="col-4">
                            <div class="d-flex   justify-content-start">
                                <h6>Showing {{ $Wastewater->firstItem() }} to {{$Wastewater->lastItem() }} of {{ $Wastewater->total() }}</h6>
                            </div>
                        </div>
                        <div class="col-8 d-flex justify-content-end">
                            <div class=" pagination pagination-sm">
                                {{ $Wastewater->links() }}
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Import Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/import/wastewater" method="POST" enctype="multipart/form-data">
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
            @if($Wastewater->count())
            <div class="card">
                <div class="card-header">
                    <div class="card-title text center">{{$tittle}}</div>
                    <div class="card-tools">

                    </div>
                </div>
                <div class="card-body table-responsive p-0" id="container" style=" width: auto"></div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title text center">{{$tittle}}</div>
                    <div class="card-tools">

                    </div>
                </div>
                <div class="card-body table-responsive p-0" id="ph" style=" width: auto"></div>
            </div>
            @endif
        </div>

    </section>
    <!-- /.content -->
</div>
<script>
    Highcharts.chart('container', {
        chart: {
            type: 'spline'
        },
        title: {
            text: ''

        },

<<<<<<< HEAD
        xAxis: {
            categories: {!!json_encode($tanggal) !!},
            accessibility: {
                description: 'Months of the year'
            }
        },
        yAxis: {
            title: {
                text: 'value'
            },

        },
        tooltip: {
            crosshairs: true,
            shared: true
        },
        plotOptions: {
            spline: {
                marker: {
                    radius: 4,
                    lineColor: '#ff6f69',
                    lineWidth: 1
                }
            }
        },
=======
        xAxis: [{
                categories: {!! json_encode($tanggal) !!}
    },{
        categories: {!! json_encode($point) !!},
        opposite: true
    }],
        yAxis: {
            title: {
                text: 'value'
            },

        },
        tooltip: {
            crosshairs: true,
            shared: true
        },
        plotOptions: {
            spline: {
                marker: {
                    radius: 4,
                    lineColor: '#ff6f69',
                    lineWidth: 1
                }
            }
        },
>>>>>>> d0a6326defbeba8c21bdbfff3da64407ba3b31e3
        series: [{
            name: 'TSS Quality Standard',
            color: '#96ceb4',
            dashStyle: 'longdash',
            xAxis: 1,
            data: {!!json_encode($tss_std) !!},
            marker: {
                symbol: 'square'
            },

        }, {
            name: 'TSS',
            color: '#ffcc5c',
            marker: {
                symbol: 'diamond'
            },
            data: {!!json_encode($tss) !!}
        }]
    });
</script>


<script>
    Highcharts.chart('ph', {
        chart: {
            type: 'spline'
        },
        title: {
            text: ''

        },

<<<<<<< HEAD
        xAxis: {
            categories: {!!json_encode($tanggal) !!},
            accessibility: {
                description: 'Months of the year'
            }
        },
        yAxis: {
            title: {
                text: 'value'
            },

        },
        tooltip: {
            crosshairs: true,
            shared: true
        },
        plotOptions: {
            spline: {
                marker: {
                    radius: 4,
                    lineColor: '#666666',
                    lineWidth: 1
                }
            }
        },
=======
        xAxis: [{
                categories: {!! json_encode($tanggal) !!}
    },{
        categories: {!! json_encode($point) !!},
        opposite: true
    }],
        yAxis: {
            title: {
                text: 'value'
            },

        },
        tooltip: {
            crosshairs: true,
            shared: true
        },
        plotOptions: {
            spline: {
                marker: {
                    radius: 4,
                    lineColor: '#666666',
                    lineWidth: 1
                }
            }
        },
>>>>>>> d0a6326defbeba8c21bdbfff3da64407ba3b31e3
        series: [{
            name: 'pH Quality Standard',
            color: '#1F2833',
            dashStyle: 'longdash',
            xAxis: 1,
            data: {!!json_encode($ph_std) !!},
            marker: {
                symbol: 'square'
            },

        }, {
            name: 'pH',
            color: '#6497b1',
            marker: {
                symbol: 'diamond'
            },
            data: {!!json_encode($ph) !!}
        }]
    });
</script>
@endsection