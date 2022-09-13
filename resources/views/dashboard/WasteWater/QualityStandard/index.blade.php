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
                        <li class="breadcrumb-item"><a href="/wastewater">Home</a></li>
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

                    <div class="card-tools row  mr-1 p-1">
                        <form action="/wastewater/wastewaterstandard">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <a href="/wastewater/wastewaterstandard/create" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus ml-1 mt"></i>Add Data</a>
                    <a href="/export/wastewaterstandard" class="btn  bg-gradient-secondary btn-xs" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download ml-1"></i>Excel</a>
                    <a href="#" class="btn  bg-gradient-secondary btn-xs" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default"><i class="fas fa-upload ml-1"></i>Excel</a>

                </div>
                <div class="card-body">
                    <div class="content">
                        <div class="col-12">

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
                            @if($QualityStd->count())
                            <div class="tab-content" id="custom-content-above-tabContent">
                                <div class="tab-pane fade show active card-body table-responsive " id="custom-content-above-Physical" role="tabpanel" aria-labelledby="custom-content-above-Physical-tab">
                                    <table role="grid" id="example1" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center" style=" color:#581845;font-size: 12px">
                                            <tr>
                                                <th>No</th>
                                                <th>Quality Standard</th>
                                                <th>Conductivity</th>
                                                <th>TDS</th>
                                                <th>TSS</th>
                                                <th>Turbidity</th>
                                                <th>Hardness</th>
                                                <th>Alkalinity (as CaCo3)</th>
                                                <th>Alkalinity-Carbonate</th>
                                                <th>Alkalinity-Bicarbonate</th>
                                                <th>Temperature </th>
                                                <th>Salinity </th>
                                                <th>Dissolved Oxygen (DO) </th>
                                                <th>Action</th>

                                            </tr>

                                            </tr>
                                        </thead>
                                        <tbody style="text-align:center" class=" border-1">
                                            @php
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp
                                            @foreach($QualityStd as $item)
                                            <tr>
                                               
                                                <td>{{$no++}}</td>
                                                <td>{{$item->nama}}</td>
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
                                                <td style="width: 80px">
                                                    <a href="/wastewater/wastewaterstandard/{{ $item->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <form action="/wastewater/wastewaterstandard/{{ $item->id }}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-Anions" role="tabpanel" aria-labelledby="custom-content-above-Anions-tab">

                                    <table role="grid" id="example2" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center" style=" color:#581845;font-size: 12px">
                                            <tr>
                                                <th>No</th>
                                                <th>Quality Standard</th>
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
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp

                                            @foreach($QualityStd as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td >{{$item->nama}}</td>
                                                <td>{{$item-> ph_min}}-{{$item->ph_max}}</td>
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
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-Cyanide" role="tabpanel" aria-labelledby="custom-content-above-Cyanide-tab">

                                    <table role="grid" id="example3" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center" style=" color:#581845;font-size: 12px">
                                            <tr>
                                                <th>No</th>
                                                <th>Quality Standard</th>
                                                <th>Free Cyanide (FCN)</th>
                                                <th>Total Cyanide (CN Tot)</th>
                                                <th>WAD Cyanide (CN Wad)</th>
                                            </tr>

                                        </thead>
                                        <tbody style="text-align:center" class=" border-1">
                                            @php
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp

                                            @foreach($QualityStd as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->nama}}</td>
                                                <td>{{$item-> freecyanide_fcn	}}</td>
                                                <td>{{$item-> totalcyanide_cntot	}}</td>
                                                <td>{{$item-> wadcyanide_cnwad	}}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-nutrients" role="tabpanel" aria-labelledby="custom-content-above-nutrients-tab">

                                    <table role="grid" id="example4" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center" style=" color:#581845;font-size: 12px">
                                            <tr>
                                                <th>No</th>
                                                <th>Quality Standard</th>
                                                <th>Ammonia (NH4)</th>
                                                <th>Ammonium (N-NH3)</th>
                                                <th>Nitrate (NO3)</th>
                                                <th>Nitrite (NO2)</th>
                                                <th>Phosphate (PO4)</th>
                                                <th>Total-Phosphate (P-PO4)</th>
                                            </tr>

                                        </thead>
                                        <tbody style="text-align:center" class=" border-1">
                                            @php
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp
                                            @foreach($QualityStd as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->nama}}</td>
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
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-dissolved" role="tabpanel" aria-labelledby="custom-content-above-dissolved-tab">

                                    <table role="grid" id="example5" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center" style=" color:#581845;font-size: 12px">
                                            <tr>
                                                <th>No</th>
                                                <th>Quality Standard</th>
                                                <th>Aluminium (Al)</th>
                                                <th>Antimony (Sb)</th>
                                                <th>Arsenic (As)</th>
                                                <th>Barium (Ba)</th>
                                                <th>Cadmium (Cd)</th>
                                                <th>Calcium (Ca)</th>
                                                <th>Chromium (Cr)</th>
                                                <th>Chromium Hexavalent (Cr6+)</th>
                                                <th>Cobalt (Co)</th>
                                                <th>Copper (Cu)</th>
                                                <th>Iron (Fe)</th>
                                                <th>Lead (Pb)</th>
                                                <th>Magnesium (Mg)</th>
                                                <th>Manganese (Mn)</th>
                                                <th>Mercury (Hg)</th>
                                                <th>Nickel (Ni)</th>
                                                <th>Selenium (Se)</th>
                                                <th>Silver (Ag)</th>
                                                <th>Sodium (Na)</th>
                                                <th>Tin (Sn)</th>
                                                <th>Zinc (Zn)</th>
                                            </tr>

                                        </thead>
                                        <tbody style="text-align:center" class=" border-1">
                                            @php
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp

                                            @foreach($QualityStd as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->nama}}</td>
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
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-total" role="tabpanel" aria-labelledby="custom-content-above-total-tab">

                                    <table role="grid" id="example6" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center" style=" color:#581845;font-size: 12px">
                                            <tr>
                                                <th>No</th>
                                                <th>Quality Standard</th>
                                                <th>Aluminium (T_Al)</th>
                                                <th>Arsenic (T_As)</th>
                                                <th>Cadmium (T_Cd)</th>
                                                <th>Chromium (T_Cr)</th>
                                                <th>Chromium Hexavalent (T_Cr6+)</th>
                                                <th>Cobalt (T_Co)</th>
                                                <th>Copper (T_Cu)</th>
                                                <th>Lead (T_Pb)</th>
                                                <th>Selenium (T_Se)</th>
                                                <th>Mercury (T_hg)</th>
                                                <th>Nickel (T_Ni)</th>
                                                <th>Zinc (T_Zn)</th>
                                            </tr>

                                        </thead>
                                        <tbody style="text-align:center" class=" border-1">
                                            @php
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp

                                            @foreach($QualityStd as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->nama}}</td>
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
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-Organic" role="tabpanel" aria-labelledby="custom-content-above-Organic-tab">

                                    <table role="grid" id="example7" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center" style=" color:#581845;font-size: 12px">
                                            <tr>
                                                <th>No</th>
                                                <th>Quality Standard</th>
                                                <th>BOD</th>
                                                <th>COD</th>
                                                <th>Oil and Grease</th>
                                                <th>Phenols</th>
                                                <th>Surfactant (MBAS)</th>
                                                <th>Total PCB</th>
                                                <th>A.O.X</th>
                                                <th>PCDFs</th>
                                                <th>PCDDs</th>
                                            </tr>

                                        </thead>
                                        <tbody style="text-align:center" class=" border-1">
                                            @php
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp

                                            @foreach($QualityStd as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->nama}}</td>
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
                                <div class="tab-pane fade card-body table-responsive" id="custom-content-above-microbiology" role="tabpanel" aria-labelledby="custom-content-above-microbiology-tab">

                                    <table role="grid" id="example8" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                        <thead class="text-center" style=" color:#581845;font-size: 12px">
                                            <tr>
                                                <th>No</th>
                                                <th>Quality Standard</th>
                                                <th>Fecal Coliformi</th>
                                                <th>E- Coli</th>
                                                <th>Total Coliform Bacteria </th>
                                            </tr>

                                        </thead>
                                        <tbody style="text-align:center" class=" border-1">
                                            @php
                                            $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                            @endphp

                                            @foreach($QualityStd as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->nama}}</td>
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
                    </div>
                </div>
                @else
                <p class="text-center fs-4">Not Data Found</p>
                @endif
                <div class="card-footer">
                    <div class="card-tools row form-inline">
                        <div class="col-4">
                            <div class="d-flex justify-content-start">
                                <small>Showing {{ $QualityStd->firstItem() }} to
                                    {{ $QualityStd->lastItem() }} of {{ $QualityStd->total() }}
                                </small>
                            </div>
                        </div>
                        <div class="col-8">
                            <div style="font-size: 8" class="d-flex justify-content-end pagination pagination-sm">
                                {{ $QualityStd->links() }}
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
                            <form action="/import/wastewaterstandard" method="POST" enctype="multipart/form-data">
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

    </section>
    <!-- /.content -->
</div>

@endsection