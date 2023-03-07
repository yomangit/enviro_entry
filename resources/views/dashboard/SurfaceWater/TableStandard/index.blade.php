@extends('dashboard.layouts.main')
@section('container')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$tittle}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline m-2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session()->has('failures'))
                    <div class="alert alert-danger alert-dismissible form-inline">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-ban"></i>Fail</h5>
                        @foreach (session()->get('failures') as $validation)
                        <tr>
                            <td>
                                {{ $validation->values()[$validation->attribute()] }}
                            </td>
                            <td>-</td>
                            @foreach ($validation->errors() as $e)
                            <td>{{ $e }}</td>
                            @endforeach
                        </tr>
                        @endforeach

                    </div>
                    @endif

                    <h3 class="card-title">
                        <a href="/surfacewater/standardtable/create" class="btn bg-gradient-secondary btn-xs "><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                        <!-- <a href="/export/groundwater/standard" class="btn  bg-gradient-secondary btn-xs " data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a> -->
                        <a href="#" class="btn  bg-gradient-secondary btn-xs " data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                            <i class="fas fa-upload mr-1"></i>Excel
                        </a>
                    </h3>
                </div>
                <div class="card-body ">
                    <div class="tab-content" id="custom-content-below-tabContent">
                        <ul class="nav nav-tabs mb-2" id="custom-content-below-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-content-below-Physical-tab" data-toggle="pill" href="#custom-content-below-Physical" role="tab" aria-controls="custom-content-below-Physical" aria-selected="true">Physical-Chemical</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-Anions-tab" data-toggle="pill" href="#custom-content-below-Anions" role="tab" aria-controls="custom-content-below-Anions" aria-selected="false">Anions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-Cyanide-tab" data-toggle="pill" href="#custom-content-below-Cyanide" role="tab" aria-controls="custom-content-below-Cyanide" aria-selected="false">Cyanide</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-Nutrients-tab" data-toggle="pill" href="#custom-content-below-Nutrients" role="tab" aria-controls="custom-content-below-Nutrients" aria-selected="false">Nutrients</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-Dissolved-tab" data-toggle="pill" href="#custom-content-below-Dissolved" role="tab" aria-controls="custom-content-below-Dissolved" aria-selected="false">Dissolved Metals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-Total-tab" data-toggle="pill" href="#custom-content-below-Total" role="tab" aria-controls="custom-content-below-Total" aria-selected="false">Total Metals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-Organic-tab" data-toggle="pill" href="#custom-content-below-Organic" role="tab" aria-controls="custom-content-below-Organic" aria-selected="false">Organic</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-below-Microbiology-tab" data-toggle="pill" href="#custom-content-below-Microbiology" role="tab" aria-controls="custom-content-below-Microbiology" aria-selected="false">Microbiology</a>
                            </li>
                        </ul>
                        @if($MonthStandard->count())
                        <div class="tab-pane fade show active" id="custom-content-below-Physical" role="tabpanel" aria-labelledby="custom-content-below-Physical-tab">
                            <div class="table-responsive card card-primary card-outline">
                                <table role="grid" class="table table-striped table-bordered dt-responsive nowrap table-sm">
                                    <thead class="text-center">
                                        <tr>
                                            <th class="align-middle"> No </th>
                                            <th class="align-middle"> Name </th>
                                            <th class="align-middle"> Conductivity </th>
                                            <th class="align-middle"> Total Dissolved Solids (TDS) </th>
                                            <th class="align-middle"> Total Suspended Solids (TSS) </th>
                                            <th class="align-middle"> Turbidity </th>
                                            <th class="align-middle"> Hardness </th>
                                            <th class="align-middle"> Temperature </th>
                                            <th class="align-middle"> Colour </th>
                                            <th class="align-middle"> Salinity </th>
                                            <th class="align-middle"> Alkalinity (as CaCo3) </th>
                                            <th class="align-middle"> Dissolved Oxygen (DO) </th>
                                            <th class="align-middle"> Alkalinity - Total </th>
                                            <th class="align-middle"> Alkalinity-Carbonate </th>
                                            <th class="align-middle"> Alkalinity-Bicarbonate </th>

                                            <th class="align-middle">Action </th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                        $no = 1 + ($MonthStandard->currentPage() - 1) * $MonthStandard->perPage();
                                        @endphp
                                        @foreach ($MonthStandard as $Physical)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td class="align-middle ">{{$Physical-> name	}}</td>
                                            <td class="align-middle ">{{$Physical-> conductivity	}}</td>
                                            <td class="align-middle ">{{$Physical-> total_dissolved_solids_tds	}}</td>
                                            <td class="align-middle ">{{$Physical-> total_suspended_solids_tss	}}</td>
                                            <td class="align-middle ">{{$Physical-> turbidity	}}</td>
                                            <td class="align-middle ">{{$Physical-> hardness	}}</td>
                                            <td class="align-middle ">{{$Physical-> temperature	}}</td>
                                            <td class="align-middle ">{{$Physical-> colour	}}</td>
                                            <td class="align-middle ">{{$Physical-> salinity	}}</td>
                                            <td class="align-middle ">{{$Physical-> alkalinity_as_caco3	}}</td>
                                            <td class="align-middle ">{{$Physical-> dissolved_oxygen_do	}}</td>
                                            <td class="align-middle ">{{$Physical-> alkalinity_total	}}</td>
                                            <td class="align-middle ">{{$Physical-> alkalinitycarbonate	}}</td>
                                            <td class="align-middle ">{{$Physical-> alkalinitybicarbonate	}}</td>

                                            <td>
                                                <a href="/surfacewater/standardtable/{{ $Physical->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <form action="/surfacewater/standardtable/{{ $Physical->id }}" method="POST" class="d-inline">
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
                        </div>
                        <div class="tab-pane fade" id="custom-content-below-Anions" role="tabpanel" aria-labelledby="custom-content-below-Anions-tab">
                            <div class="table-responsive card card-primary card-outline">
                                <table role="grid" class="table table-striped table-bordered dt-responsive nowrap table-sm">
                                    <thead class="text-center ">
                                        <tr>
                                            <th class="align-middle">No </th>
                                            <th class="align-middle">Name </th>
                                            <th class="align-middle"> pH </th>
                                            <th class="align-middle"> Chloride (Cl) </th>
                                            <th class="align-middle"> Free Chlorine </th>
                                            <th class="align-middle"> Fluoride (F) </th>
                                            <th class="align-middle"> Sulphate (SO4) </th>
                                            <th class="align-middle"> Sulphite (H2S) </th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                        $no1 = 1 + ($MonthStandard->currentPage() - 1) * $MonthStandard->perPage();
                                        @endphp
                                        @foreach ($MonthStandard as $Anions)
                                        <tr>
                                            <td class="align-middle">{{$no1++}}</td>
                                            <td class="align-middle">{{$Anions->name }}</td>
                                            <td class="align-middle ">{{$Anions-> ph	}}</td>
                                            <td class="align-middle ">{{$Anions-> chloride_cl	}}</td>
                                            <td class="align-middle ">{{$Anions-> free_chlorine	}}</td>
                                            <td class="align-middle ">{{$Anions-> fluoride_f	}}</td>
                                            <td class="align-middle ">{{$Anions-> sulphate_so4	}}</td>
                                            <td class="align-middle ">{{$Anions-> sulphite_h2s	}}</td>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-content-below-Cyanide" role="tabpanel" aria-labelledby="custom-content-below-Cyanide-tab">
                            <div class="table-responsive card card-primary card-outline">
                                <table role="grid" class="table table-striped table-bordered dt-responsive nowrap table-sm">
                                    <thead class="text-center ">
                                        <tr>
                                            <th class="align-middle">No </th>
                                            <th class="align-middle">Name </th>
                                            <th class="align-middle"> Free Cyanide (FCN) </th>
                                            <th class="align-middle"> Total Cyanide (CN Tot) </th>
                                            <th class="align-middle"> WAD Cyanide (CN Wad) </th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                        $no1 = 1 + ($MonthStandard->currentPage() - 1) * $MonthStandard->perPage();
                                        @endphp
                                        @foreach ($MonthStandard as $Cyanide)
                                        <tr>
                                            <td class="align-middle">{{$no1++}}</td>
                                            <td class="align-middle">{{$Cyanide->name }}</td>
                                            <td class="align-middle ">{{$Cyanide-> free_cyanide_fcn	}}</td>
                                            <td class="align-middle ">{{$Cyanide-> total_cyanide_cn_tot	}}</td>
                                            <td class="align-middle ">{{$Cyanide-> wad_cyanide_cn_wad	}}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-content-below-Nutrients" role="tabpanel" aria-labelledby="custom-content-below-Nutrients-tab">
                            <div class="table-responsive card card-primary card-outline">
                                <table role="grid" class="table table-striped table-bordered dt-responsive nowrap table-sm">
                                    <thead class="text-center ">
                                        <tr>
                                            <th class="align-middle">No </th>
                                            <th class="align-middle">Name </th>
                                            <th class="align-middle"> Ammonium (NH4) </th>
                                            <th class="align-middle"> Ammonia (N-NH3) </th>
                                            <th class="align-middle"> Nitrate (NO3) </th>
                                            <th class="align-middle"> Nitrite (NO2) </th>
                                            <th class="align-middle"> Phosphate (PO4) </th>
                                            <th class="align-middle"> Total Nitrogen </th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                        $no1 = 1 + ($MonthStandard->currentPage() - 1) * $MonthStandard->perPage();
                                        @endphp
                                        @foreach ($MonthStandard as $Nutrients)
                                        <tr>
                                            <td class="align-middle">{{$no1++}}</td>
                                            <td class="align-middle">{{$Nutrients->name }}</td>
                                            <td class="align-middle ">{{$Nutrients-> ammonium_nh4	}}</td>
                                            <td class="align-middle ">{{$Nutrients-> ammonia_nnh3	}}</td>
                                            <td class="align-middle ">{{$Nutrients-> nitrate_no3	}}</td>
                                            <td class="align-middle ">{{$Nutrients-> nitrite_no2	}}</td>
                                            <td class="align-middle ">{{$Nutrients-> phosphate_po4	}}</td>
                                            <td class="align-middle ">{{$Nutrients-> total_nitrogen	}}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-content-below-Dissolved" role="tabpanel" aria-labelledby="custom-content-below-Dissolved-tab">
                            <div class="table-responsive card card-primary card-outline">
                                <table role="grid" class="table table-striped table-bordered dt-responsive nowrap table-sm">
                                    <thead class="text-center ">
                                        <tr>
                                            <th class="align-middle">No </th>
                                            <th class="align-middle">Name </th>
                                            <th class="align-middle"> Aluminium (Al) </th>
                                            <th class="align-middle"> Antimony (Sb) </th>
                                            <th class="align-middle"> Arsenic (As) </th>
                                            <th class="align-middle"> Barium (Ba) </th>
                                            <th class="align-middle"> Boron (B) </th>
                                            <th class="align-middle"> Calcium (Ca </th>
                                            <th class="align-middle"> Cadmium (Cd) </th>
                                            <th class="align-middle"> Chromium (Cr) </th>
                                            <th class="align-middle"> Chromium Hexavalent (Cr6+) </th>
                                            <th class="align-middle"> Cobalt (Co) </th>
                                            <th class="align-middle"> Copper (Cu) </th>
                                            <th class="align-middle"> Iron (Fe) </th>
                                            <th class="align-middle"> Lead (Pb) </th>
                                            <th class="align-middle"> Magnesium (Mg) </th>
                                            <th class="align-middle"> Manganese (Mn) </th>
                                            <th class="align-middle"> Mercury (Hg) </th>
                                            <th class="align-middle"> Nickel (Ni) </th>
                                            <th class="align-middle"> Selenium (Se) </th>
                                            <th class="align-middle"> Silver (Ag) </th>
                                            <th class="align-middle"> Sodium (Na) </th>
                                            <th class="align-middle"> Zinc (Zn) </th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                        $a='chromium_hexavalent_cr6';
                                        $no1 = 1 + ($MonthStandard->currentPage() - 1) * $MonthStandard->perPage();
                                        @endphp
                                        @foreach ($MonthStandard as $Dissolved)
                                        <tr>
                                            <td class="align-middle">{{$no1++}}</td>
                                            <td class="align-middle">{{$Dissolved->name }}</td>
                                            <td class="align-middle ">{{$Dissolved-> aluminium_al	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> antimony_sb	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> arsenic_as	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> barium_ba	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> boron_b	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> calcium_ca	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> cadmium_cd	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> chromium_cr	}}</td>
                                            <td class="align-middle ">{{$Dissolved->$a}}</td>
                                            <td class="align-middle ">{{$Dissolved-> cobalt_co	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> copper_cu	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> iron_fe	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> lead_pb	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> magnesium_mg	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> manganese_mn	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> mercury_hg	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> nickel_ni	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> selenium_se	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> silver_ag	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> sodium_na	}}</td>
                                            <td class="align-middle ">{{$Dissolved-> zinc_zn	}}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-content-below-Total" role="tabpanel" aria-labelledby="custom-content-below-Total-tab">
                            <div class="table-responsive card card-primary card-outline">
                                <table role="grid" class="table table-striped table-bordered dt-responsive nowrap table-sm">
                                    <thead class="text-center ">
                                        <tr>
                                            <th class="align-middle">No </th>
                                            <th class="align-middle">Name </th>
                                            <th class="align-middle"> Aluminium (T-Al) </th>
                                            <th class="align-middle"> Arsenic (T-As) </th>
                                            <th class="align-middle"> Cadmium (T-Cd) </th>
                                            <th class="align-middle"> Chromium Hexavalent (T-Cr6+) </th>
                                            <th class="align-middle"> Chromium (T-Cr) </th>
                                            <th class="align-middle"> Cobalt (T-Co) </th>
                                            <th class="align-middle"> Copper (T-Cu) </th>
                                            <th class="align-middle"> Iron (T-Fe) </th>
                                            <th class="align-middle"> Lead (T-Pb) </th>
                                            <th class="align-middle"> Selenium (T-Se) </th>
                                            <th class="align-middle"> Mercury (T-Hg) </th>
                                            <th class="align-middle"> Nickel (T-Ni) </th>
                                            <th class="align-middle"> Zinc (T-Zn) </th>


                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                        $b='chromium_hexavalent_tcr6';
                                        $no1 = 1 + ($MonthStandard->currentPage() - 1) * $MonthStandard->perPage();
                                        @endphp
                                        @foreach ($MonthStandard as $Total)
                                        <tr>
                                            <td class="align-middle">{{$no1++}}</td>
                                            <td class="align-middle">{{$Total->name }}</td>
                                            <td class="align-middle ">{{$Total-> aluminium_tal	}}</td>
                                            <td class="align-middle ">{{$Total-> arsenic_tas	}}</td>
                                            <td class="align-middle ">{{$Total-> cadmium_tcd	}}</td>
                                            <td class="align-middle ">{{$Total-> $b	}}</td>
                                            <td class="align-middle ">{{$Total-> chromium_tcr	}}</td>
                                            <td class="align-middle ">{{$Total-> cobalt_tco	}}</td>
                                            <td class="align-middle ">{{$Total-> copper_tcu	}}</td>
                                            <td class="align-middle ">{{$Total-> iron_tfe	}}</td>
                                            <td class="align-middle ">{{$Total-> lead_tpb	}}</td>
                                            <td class="align-middle ">{{$Total-> selenium_tse	}}</td>
                                            <td class="align-middle ">{{$Total-> mercury_thg	}}</td>
                                            <td class="align-middle ">{{$Total-> nickel_tni	}}</td>
                                            <td class="align-middle ">{{$Total-> zinc_tzn	}}</td>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-content-below-Organic" role="tabpanel" aria-labelledby="custom-content-below-Organic-tab">

                            <div class="table-responsive card card-primary card-outline">
                                <table role="grid" class="table table-striped table-bordered dt-responsive nowrap table-sm">
                                    <thead class="text-center ">
                                        <tr>
                                            <th class="align-middle">No </th>
                                            <th class="align-middle">Name </th>
                                            <th class="align-middle"> BOD </th>
                                            <th class="align-middle"> COD </th>
                                            <th class="align-middle"> Oil and Grease </th>
                                            <th class="align-middle"> Phenols </th>
                                            <th class="align-middle"> Surfactant (MBAS) </th>
                                            <th class="align-middle"> Benzene Hexa Chloride (BHC) </th>
                                            <th class="align-middle"> Endrin </th>
                                            <th class="align-middle"> Dichloro Diphenyl Trichloroethane (DDT) </th>



                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                        $a='2_4_6_trichloropenol';
                                        $b='2_4_d';
                                        $no1 = 1 + ($MonthStandard->currentPage() - 1) * $MonthStandard->perPage();
                                        @endphp
                                        @foreach ($MonthStandard as $Organic)
                                        <tr>
                                            <td class="align-middle">{{$no1++}}</td>
                                            <td class="align-middle">{{$Organic->name }}</td>
                                            <td class="align-middle ">{{$Organic-> bod	}}</td>
                                            <td class="align-middle ">{{$Organic-> cod	}}</td>
                                            <td class="align-middle ">{{$Organic-> oil_and_grease	}}</td>
                                            <td class="align-middle ">{{$Organic-> phenols	}}</td>
                                            <td class="align-middle ">{{$Organic-> surfactant_mbas	}}</td>
                                            <td class="align-middle ">{{$Organic-> benzene_hexa_chloride_bhc	}}</td>
                                            <td class="align-middle ">{{$Organic-> endrin	}}</td>
                                            <td class="align-middle ">{{$Organic-> dichloro_diphenyl_trichloroethane_ddt	}}</td>



                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-content-below-Microbiology" role="tabpanel" aria-labelledby="custom-content-below-Microbiology-tab">
                            <div class="table-responsive card card-primary card-outline">
                                <table role="grid" class="table table-striped table-bordered dt-responsive nowrap table-sm">
                                    <thead class="text-center ">
                                        <tr>
                                            <th class="align-middle">No </th>
                                            <th class="align-middle">Name </th>
                                            <th class="align-middle"> Fecal Coliform </th>
                                            <th class="align-middle"> E- Coli </th>
                                            <th class="align-middle"> Total Coliform Bacteria </th>



                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                        $no1 = 1 + ($MonthStandard->currentPage() - 1) * $MonthStandard->perPage();
                                        @endphp
                                        @foreach ($MonthStandard as $Microbiology)
                                        <tr>
                                            <td class="align-middle">{{$no1++}}</td>
                                            <td class="align-middle">{{$Microbiology->name }}</td>
                                             <td class="align-middle ">{{$Microbiology-> fecal_coliform	}}</td>
                                             <td class="align-middle ">{{$Microbiology-> e_coli	}}</td>
                                             <td class="align-middle ">{{$Microbiology-> total_coliform_bacteria	}}</td>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <p class="text-center fs-4">Not Data Found</p>
                    @endif
                </div>
                @if($MonthStandard->count())
                <div class="card-footer p-0">
                    <div class="card-tools mt-2 form-inline">
                        <div class="col-4">
                            <div class="d-flex justify-content-start ">
                                <h6 class="align-middle">Showing {{ $MonthStandard->firstItem() }} to {{$MonthStandard ->lastItem() }} of {{ $MonthStandard  ->total() }}</h6>
                            </div>
                        </div>
                        <div class="col-8 d-flex justify-content-end">
                            <div class=" pagination pagination-sm">
                                {{ $MonthStandard   ->links() }}
                            </div>
                        </div>
                    </div>
                </div>
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
                            <form action="/import/surfacewater/standard" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="custom-file">
                                        <input type="file" name="file" required class="custom-file-input" id="exampleInputFile">
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
            </div>
        </div>
    </section>
</div>


@endsection