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

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card">
                <div class="card-header">
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
                    <a href="/tailing/codeid" class="btn bg-gradient-info btn-xs ">Code Sample</a>
                    <a href="/tailing/qualitystandard" class="btn bg-gradient-info btn-xs  ">Table Standard</a>
                </div>
                <div class="card-body">
                    <div class="content">
                        <div class="col-12">

                            <div class="card-header">
                                <a href="/tailing/create" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                                <a href="/export/tailing" class="btn  bg-gradient-secondary btn-xs" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                                <a href="#" class="btn  bg-gradient-secondary btn-xs" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default"><i class="fas fa-upload mr-1"></i>Excel</a>
                                <div class="card-tools row d-flex">
                                    <form action="/tailing" class="form-inline" autocomplete="off">
                                        <div class="input-group date" id="reservationdate4" style="width: 85px;" data-target-input="nearest">
                                            <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                                        </div>
                                        <span class="input-group-text form-control-sm ">To</span>

                                        <div class="input-group date mr-2" id="reservationdate5" style="width: 85px;" data-target-input="nearest">
                                            <input type="text" name="toDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate5" data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                                        </div>
                                        <div style="width: 118px;" class="input-group mr-1">
                                            <select class="form-control form-control-sm " name="search">
                                                <option value="" selected>Code Sample</option>
                                                @foreach ($code_units as $code)
                                                @if ( request('search')==$code->nama)
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
                                    <form action="/tailing">
                                        <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                                    </form>

                                </div>
                            </div>

                            @if($Tailing->count() && $code_units->count())
                            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-content-above-Metals-tab" data-toggle="pill" href="#custom-content-above-Metals" role="tab" aria-controls="custom-content-above-Metals" aria-selected="true">TCLP Metals</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-above-Inorganic-tab" data-toggle="pill" href="#custom-content-above-Inorganic" role="tab" aria-controls="custom-content-above-Inorganic" aria-selected="false">TCLP Inorganic</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-above-Organic-tab" data-toggle="pill" href="#custom-content-above-Organic" role="tab" aria-controls="custom-content-above-Organic" aria-selected="false">TCLP Organic**</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="custom-content-above-tabContent">
                                <div class="tab-pane fade show active" id="custom-content-above-Metals" role="tabpanel" aria-labelledby="custom-content-above-Metals-tab">
                                    <div class="card">

                                        <div class="card-body table-responsive">
                                            <table class="table table-bordered  table-sm table-head-fixed  table-striped">
                                                <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                    <tr>
                                                        <th>No</th>
                                                        <th colspan="2">Quality Standard</th>
                                                        <th style="width: 100px"> Antimony, Sb </th>
                                                        <th> Arsenic (As) </th>
                                                        <th> Barium (Ba) </th>
                                                        <th> Beryllium, Be </th>
                                                        <th> Boron (B) </th>
                                                        <th> Cadmium (Cd) </th>
                                                        <th> Chromium Hexavalent (Cr-VI) </th>
                                                        <th> Chromium (Cr) </th>
                                                        <th> Copper (Cu) </th>
                                                        <th> Iodide, I- </th>
                                                        <th> Lead (Pb) </th>
                                                        <th> Mercury (Hg) </th>
                                                        <th> Molybdenum, Mo </th>
                                                        <th> Nickel, Ni </th>
                                                        <th> Selenium (Se) </th>
                                                        <th> Silver (Ag) </th>
                                                        <th> Tributyl Tin Oxide (as Organotins) ** </th>
                                                        <th> Zinc (Zn) </th>

                                                    </tr>
                                                    @php
                                                    $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                                    @endphp
                                                    @foreach($QualityStd as $standard)
                                                    <tr style="background-color: #eee8cd">
                                                        <td>{{$no++}}</td>
                                                        <th colspan="2">{{$standard->nama}}</th>
                                                        <td style="width: 80px">{{$standard->antimony}}</td>
                                                        <td style="width: 80px">{{$standard->arsenic}}</td>
                                                        <td style="width: 80px">{{$standard->barium}}</td>
                                                        <td style="width: 80px">{{$standard->beryllium}}</td>
                                                        <td style="width: 80px">{{$standard->boron}}</td>
                                                        <td style="width: 80px">{{$standard->cadmium}}</td>
                                                        <td style="width: 80px">{{$standard->hexavalent}}</td>
                                                        <td style="width: 80px">{{$standard->chromium_cr}}</td>
                                                        <td style="width: 80px">{{$standard->copper}}</td>
                                                        <td style="width: 80px">{{$standard->iodide}}</td>
                                                        <td style="width: 80px">{{$standard->lead}}</td>
                                                        <td style="width: 80px">{{$standard->mercury}}</td>
                                                        <td style="width: 80px">{{$standard->molybdenum}}</td>
                                                        <td style="width: 80px">{{$standard->nickel}}</td>
                                                        <td style="width: 80px">{{$standard->selenium}}</td>
                                                        <td style="width: 80px">{{$standard->silver}}</td>
                                                        <td style="width: 80px">{{$standard->tributyl}}</td>
                                                        <td style="width: 80px">{{$standard->zinc_zn}}</td>

                                                    </tr>
                                                    @endforeach

                                                </thead>
                                                <tbody style="text-align:center">
                                                    @php
                                                    $no = 1 + ($Tailing->currentPage() - 1) * $Tailing->perPage();
                                                    @endphp
                                                    <tr style="background-color: #b3dbf6;font-size: 10px">
                                                        <th>*</th>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th colspan="18">Data Entry</th>
                                                        <th> Action</th>

                                                    </tr>
                                                    @foreach($Tailing as $item)
                                                    <tr style=" color:#581845;font-size: 10px">
                                                        <td>{{$no++}}</td>
                                                        <td>{{$item->PointId->nama}}</td>
                                                        <td style="width: 80px">{{date('d-M-Y',strtotime($item->date))}}</td>
                                                        <td>{{$item->antimony}}</td>
                                                        <td>{{$item->arsenic}}</td>
                                                        <td>{{$item->barium}}</td>
                                                        <td>{{$item->beryllium}}</td>
                                                        <td>{{$item->boron}}</td>
                                                        <td>{{$item->cadmium}}</td>
                                                        <td>{{$item->hexavalent}}</td>
                                                        <td>{{$item->chromium_cr}}</td>
                                                        <td>{{$item->copper}}</td>
                                                        <td>{{$item->iodide}}</td>
                                                        <td>{{$item->lead}}</td>
                                                        <td>{{$item->mercury}}</td>
                                                        <td>{{$item->molybdenum}}</td>
                                                        <td>{{$item->nickel}}</td>
                                                        <td>{{$item->selenium}}</td>
                                                        <td>{{$item->silver}}</td>
                                                        <td>{{$item->tributyl}}</td>
                                                        <td>{{$item->zinc_zn}}</td>
                                                        <td>
                                                            <div style="width: 50px">
                                                                <a href="/tailing/{{ $item->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <i class="fas fa-pen"></i>
                                                                </a>
                                                                <form action="/tailing/{{ $item->id }}" method="POST" class="d-inline">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="card-tools row form-inline">
                                                <div class="col-4">
                                                    <div class="d-flex justify-content-start">
                                                        <small>Showing {{ $Tailing->firstItem() }} to
                                                            {{ $Tailing->lastItem() }} of {{ $Tailing->total() }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div style="font-size: 8" class="d-flex justify-content-end">
                                                        {{ $Tailing->links() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-content-above-Inorganic" role="tabpanel" aria-labelledby="custom-content-above-Inorganic-tab">
                                    <div class="card">
                                        <div class="card-body table-responsive">
                                            <table class="table table-bordered  table-sm table-head-fixed  table-striped">
                                                <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                    <tr>
                                                        <th>No</th>
                                                        <th colspan="2">Quality Standard</th>
                                                        <th> Chloride, Cl- </th>
                                                        <th> Free Cyanide </th>
                                                        <th> Total Cyanide </th>
                                                        <th> Fluoride </th>
                                                        <th> Nitrite (NO2) </th>
                                                        <th> Nitrate/Nitrite </th>

                                                    </tr>
                                                    @php
                                                    $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                                    @endphp
                                                    @foreach($QualityStd as $standard)
                                                    <tr style="background-color: #eee8cd">
                                                        <td>{{$no++}}</td>
                                                        <th colspan="2" colspan="2">{{$standard->nama}}</th>
                                                        <td style="width: 80px">{{$standard->chloride_cl}}</td>
                                                        <td style="width: 80px">{{$standard->free_cyanide}}</td>
                                                        <td style="width: 80px">{{$standard->total_cyanide}}</td>
                                                        <td style="width: 80px">{{$standard->fluoride}}</td>
                                                        <td style="width: 80px">{{$standard->nitrite_no2}}</td>
                                                        <td style="width: 80px">{{$standard->nitrate}}</td>

                                                    </tr>
                                                    @endforeach
                                                </thead>
                                                <tbody style="text-align:center">
                                                    @php
                                                    $no = 1 + ($Tailing->currentPage() - 1) * $Tailing->perPage();
                                                    @endphp
                                                    <tr style="background-color: #b3dbf6;font-size: 10px">
                                                        <th>*</th>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th colspan="6">Data Entry</th>
                                                    </tr>
                                                    @foreach($Tailing as $item)
                                                    <tr style=" color:#581845;font-size: 10px">
                                                        <td>{{$no++}}</td>
                                                        <td>{{$item->PointId->nama}}</td>
                                                        <td style="width: 80px">{{date('d-m-Y',strtotime($item->date))}}</td>
                                                        <td style="width: 80px">{{$item->chloride_cl}}</td>
                                                        <td style="width: 80px">{{$item->free_cyanide}}</td>
                                                        <td style="width: 80px">{{$item->total_cyanide}}</td>
                                                        <td style="width: 80px">{{$item->fluoride}}</td>
                                                        <td style="width: 80px">{{$item->nitrite_no2}}</td>
                                                        <td style="width: 80px">{{$item->nitrate}}</td>

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="card-tools row form-inline">
                                                <div class="col-4">
                                                    <div class="d-flex justify-content-start">
                                                        <small>Showing {{ $Tailing->firstItem() }} to
                                                            {{ $Tailing->lastItem() }} of {{ $Tailing->total() }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div style="font-size: 8" class="d-flex justify-content-end">
                                                        {{ $Tailing->links() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-content-above-Organic" role="tabpanel" aria-labelledby="custom-content-above-Organic-tab">
                                    <div class="card">
                                        <div class="card-body table-responsive">
                                            <table class="table table-bordered  table-sm table-head-fixed  table-striped">
                                                <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                    <tr>
                                                        <th>No</th>
                                                        <th colspan="2">Quality Standard</th>
                                                        <th> Aldrin + Dieldrin </th>
                                                        <th> Dieldrin </th>
                                                        <th> Benzene </th>
                                                        <th> Benzo (a) pyrene </th>
                                                        <th> Carbon tetrachloride </th>
                                                        <th> Chlordane </th>
                                                        <th> Chlorobenzene </th>
                                                        <th> 2-Chlorophenol </th>
                                                        <th> Chloroform </th>
                                                        <th> o-Cresol </th>
                                                        <th> m-Cresol </th>
                                                        <th> p-Cresol </th>
                                                        <th> Total-cresol </th>
                                                        <th> Di(2-Ethylhexyl)Phthalate** </th>
                                                        <th> 2,4-D </th>
                                                        <th> 1,2-Dichlorobenzene </th>
                                                        <th> 1,4-Dichlorobenzene </th>
                                                        <th> 1,2-Dichloroethane </th>
                                                        <th> 1,1-Dichloroethylene </th>
                                                        <th> 1,1-Dichloroethene </th>
                                                        <th> 1,2-Dichloroethene </th>
                                                        <th> Dichloromethane </th>
                                                        <th> 2,4-Dichlorophenol </th>
                                                        <th> 2,4-Dinitrotoluene </th>
                                                        <th> Ethyl Benzene </th>
                                                        <th> "thylenediaminetetraacetic acid (EDTA)**" </th>
                                                        <th> Formaldehyde </th>
                                                        <th> Hexachloro-1,3 butadiene </th>
                                                        <th> Endrin </th>
                                                        <th> Heptachlor + Heptachlor epoxide </th>
                                                        <th> Hexachlorobenzene </th>
                                                        <th> Hexachlorobutadiene </th>
                                                        <th> Hexachloroethane </th>
                                                        <th> Total Phenols </th>
                                                        <th> Lindane </th>
                                                        <th> Methoxychlor </th>
                                                        <th> Methyl ethyl ketone </th>
                                                        <th> Methyl Parathion </th>
                                                        <th> Nitrobenzene </th>
                                                        <th> Styrene </th>
                                                        <th> 1,1,1,2-Tetrachloroethane </th>
                                                        <th> 1,1,2,2-Tetrachloroethane </th>
                                                        <th> Nitriloacetic acid </th>
                                                        <th> Pentachlorophenol </th>
                                                        <th> Pyridine </th>
                                                        <th> Toxaphene </th>
                                                        <th> Parathion </th>
                                                        <th> Total Poly Chlor Biphenyl (PCB) </th>
                                                        <th> Tetrachloroethene (PCE) </th>
                                                        <th> Toluene </th>
                                                        <th> Trichlorobenzene </th>
                                                        <th> 1,1,1-Trichloroethane (Methoxychlor) </th>
                                                        <th> 1,1,2-Trichloroethane </th>
                                                        <th> Trichloroethene* </th>
                                                        <th> Toxaphene </th>
                                                        <th> Trichloroethylene (TCE) </th>
                                                        <th> Trihalomethanes </th>
                                                        <th> 2,4,5-Trichlorophenol </th>
                                                        <th> 2,4,6-Trichlorophenol </th>
                                                        <th> 2,4,5-TP (Silvex) </th>
                                                        <th> Vinyl Chloride </th>
                                                        <th> Xylenes Total </th>
                                                        <th> DDT + DDD + DDE* </th>
                                                        <th> 2.4-D (2.4-dichlorophenoxyacetic acid)* </th>
                                                    </tr>
                                                    @php
                                                    $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                                    @endphp
                                                    @foreach($QualityStd as $standard)
                                                    <tr style="background-color: #eee8cd">
                                                        <td>{{$no++}}</td>
                                                        <td colspan="2">{{$standard->nama}}</td>
                                                        <td style="width: 150px">{{$standard->aldrin}}</td>
                                                        <td style="width: 150px">{{$standard->dieldrin}}</td>
                                                        <td style="width: 150px">{{$standard->benzene}}</td>
                                                        <td style="width: 150px">{{$standard->benzo_a_pyrene}}</td>
                                                        <td style="width: 150px">{{$standard->tetrachloride}}</td>
                                                        <td style="width: 150px">{{$standard->chlordane}}</td>
                                                        <td style="width: 150px">{{$standard->chlorobenzene}}</td>
                                                        <td style="width: 150px">{{$standard->chlorophenol2}}</td>
                                                        <td style="width: 150px">{{$standard->chloroform}}</td>
                                                        <td style="width: 150px">{{$standard->o_cresol}}</td>
                                                        <td style="width: 150px">{{$standard->m_cresol}}</td>
                                                        <td style="width: 150px">{{$standard->p_cresol}}</td>
                                                        <td style="width: 150px">{{$standard->total_cresol}}</td>
                                                        <td style="width: 150px">{{$standard->ethylhexylphthalate}}</td>
                                                        <td style="width: 150px">{{$standard->d}}</td>
                                                        <td style="width: 150px">{{$standard->dichlorobenzene2}}</td>
                                                        <td style="width: 150px">{{$standard->dichlorobenzene4}}</td>
                                                        <td style="width: 150px">{{$standard->dichloroethane1}}</td>
                                                        <td style="width: 150px">{{$standard->dichloroethylene}}</td>
                                                        <td style="width: 150px">{{$standard->dichloroethene2}}</td>
                                                        <td style="width: 150px">{{$standard->dichloroethene3}}</td>
                                                        <td style="width: 150px">{{$standard->dichloromethane}}</td>
                                                        <td style="width: 150px">{{$standard->dichlorophenol}}</td>
                                                        <td style="width: 150px">{{$standard->dinitrotoluene}}</td>
                                                        <td style="width: 150px">{{$standard->ethyl_benzene}}</td>
                                                        <td style="width: 150px">{{$standard->thylenediaminetetraacetic}}</td>
                                                        <td style="width: 150px">{{$standard->formaldehyde}}</td>
                                                        <td style="width: 150px">{{$standard->hexachloro}}</td>
                                                        <td style="width: 150px">{{$standard->endrin}}</td>
                                                        <td style="width: 150px">{{$standard->heptachlor}}</td>
                                                        <td style="width: 150px">{{$standard->hexachlorobenzene}}</td>
                                                        <td style="width: 150px">{{$standard->hexachlorobutadiene}}</td>
                                                        <td style="width: 150px">{{$standard->hexachloroethane}}</td>
                                                        <td style="width: 150px">{{$standard->total_phenols}}</td>
                                                        <td style="width: 150px">{{$standard->lindane}}</td>
                                                        <td style="width: 150px">{{$standard->methoxychlor1}}</td>
                                                        <td style="width: 150px">{{$standard->ketone}}</td>
                                                        <td style="width: 150px">{{$standard->parathion1}}</td>
                                                        <td style="width: 150px">{{$standard->nitrobenzene}}</td>
                                                        <td style="width: 150px">{{$standard->styrene}}</td>
                                                        <td style="width: 150px">{{$standard->tetrachloroethane1}}</td>
                                                        <td style="width: 150px">{{$standard->tetrachloroethane2}}</td>
                                                        <td style="width: 150px">{{$standard->nitriloacetic}}</td>
                                                        <td style="width: 150px">{{$standard->pentachlorophenol}}</td>
                                                        <td style="width: 150px">{{$standard->pyridine}}</td>
                                                        <td style="width: 150px">{{$standard->toxaphene1}}</td>
                                                        <td style="width: 150px">{{$standard->parathion}}</td>
                                                        <td style="width: 150px">{{$standard->total_chlor}}</td>
                                                        <td style="width: 150px">{{$standard->tetrachloroethene}}</td>
                                                        <td style="width: 150px">{{$standard->toluene}}</td>
                                                        <td style="width: 150px">{{$standard->trichlorobenzene}}</td>
                                                        <td style="width: 150px">{{$standard->methoxychlor2}}</td>
                                                        <td style="width: 150px">{{$standard->trichloroethane}}</td>
                                                        <td style="width: 150px">{{$standard->trichloroethene}}</td>
                                                        <td style="width: 150px">{{$standard->toxaphene2}}</td>
                                                        <td style="width: 150px">{{$standard->trichloroethylene}}</td>
                                                        <td style="width: 150px">{{$standard->trihalomethanes}}</td>
                                                        <td style="width: 150px">{{$standard->trichlorophenol5}}</td>
                                                        <td style="width: 150px">{{$standard->trichlorophenol6}}</td>
                                                        <td style="width: 150px">{{$standard->tp_silvex}}</td>
                                                        <td style="width: 150px">{{$standard->vinyl_chloride}}</td>
                                                        <td style="width: 150px">{{$standard->xylenes_total}}</td>
                                                        <td style="width: 150px">{{$standard->ddt_ddd_dde}}</td>
                                                        <td style="width: 150px">{{$standard->dichlorophenoxyacetic}}</td>
                                                    </tr>
                                                    @endforeach
                                                </thead>
                                                <tbody style="text-align:center">
                                                    @php
                                                    $no = 1 + ($Tailing->currentPage() - 1) * $Tailing->perPage();
                                                    @endphp
                                                    <tr style="background-color: #b3dbf6;font-size: 10px">
                                                        <th>*</th>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th colspan="64">Data Entry</th>
                                                    </tr>
                                                    @foreach($Tailing as $item)
                                                    <tr style=" color:#581845;font-size: 10px">
                                                        <td>{{$no++}}</td>
                                                        <td>{{$item->PointId->nama}}</td>
                                                        <td style="width: 80px">{{date('d-m-Y',strtotime($item->date))}}</td>
                                                        <td style="width: 150px">{{$item->aldrin}}</td>
                                                        <td style="width: 150px">{{$item->dieldrin}}</td>
                                                        <td style="width: 150px">{{$item->benzene}}</td>
                                                        <td style="width: 150px">{{$item->benzo_a_pyrene}}</td>
                                                        <td style="width: 150px">{{$item->tetrachloride}}</td>
                                                        <td style="width: 150px">{{$item->chlordane}}</td>
                                                        <td style="width: 150px">{{$item->chlorobenzene}}</td>
                                                        <td style="width: 150px">{{$item->chlorophenol2}}</td>
                                                        <td style="width: 150px">{{$item->chloroform}}</td>
                                                        <td style="width: 150px">{{$item->o_cresol}}</td>
                                                        <td style="width: 150px">{{$item->m_cresol}}</td>
                                                        <td style="width: 150px">{{$item->p_cresol}}</td>
                                                        <td style="width: 150px">{{$item->total_cresol}}</td>
                                                        <td style="width: 150px">{{$item->ethylhexylphthalate}}</td>
                                                        <td style="width: 150px">{{$item->d}}</td>
                                                        <td style="width: 150px">{{$item->dichlorobenzene2}}</td>
                                                        <td style="width: 150px">{{$item->dichlorobenzene4}}</td>
                                                        <td style="width: 150px">{{$item->dichloroethane1}}</td>
                                                        <td style="width: 150px">{{$item->dichloroethylene}}</td>
                                                        <td style="width: 150px">{{$item->dichloroethene2}}</td>
                                                        <td style="width: 150px">{{$item->dichloroethene3}}</td>
                                                        <td style="width: 150px">{{$item->dichloromethane}}</td>
                                                        <td style="width: 150px">{{$item->dichlorophenol}}</td>
                                                        <td style="width: 150px">{{$item->dinitrotoluene}}</td>
                                                        <td style="width: 150px">{{$item->ethyl_benzene}}</td>
                                                        <td style="width: 150px">{{$item->thylenediaminetetraacetic}}</td>
                                                        <td style="width: 150px">{{$item->formaldehyde}}</td>
                                                        <td style="width: 150px">{{$item->hexachloro}}</td>
                                                        <td style="width: 150px">{{$item->endrin}}</td>
                                                        <td style="width: 150px">{{$item->heptachlor}}</td>
                                                        <td style="width: 150px">{{$item->hexachlorobenzene}}</td>
                                                        <td style="width: 150px">{{$item->hexachlorobutadiene}}</td>
                                                        <td style="width: 150px">{{$item->hexachloroethane}}</td>
                                                        <td style="width: 150px">{{$item->total_phenols}}</td>
                                                        <td style="width: 150px">{{$item->lindane}}</td>
                                                        <td style="width: 150px">{{$item->methoxychlor1}}</td>
                                                        <td style="width: 150px">{{$item->ketone}}</td>
                                                        <td style="width: 150px">{{$item->parathion1}}</td>
                                                        <td style="width: 150px">{{$item->nitrobenzene}}</td>
                                                        <td style="width: 150px">{{$item->styrene}}</td>
                                                        <td style="width: 150px">{{$item->tetrachloroethane1}}</td>
                                                        <td style="width: 150px">{{$item->tetrachloroethane2}}</td>
                                                        <td style="width: 150px">{{$item->nitriloacetic}}</td>
                                                        <td style="width: 150px">{{$item->pentachlorophenol}}</td>
                                                        <td style="width: 150px">{{$item->pyridine}}</td>
                                                        <td style="width: 150px">{{$item->toxaphene1}}</td>
                                                        <td style="width: 150px">{{$item->parathion}}</td>
                                                        <td style="width: 150px">{{$item->total_chlor}}</td>
                                                        <td style="width: 150px">{{$item->tetrachloroethene}}</td>
                                                        <td style="width: 150px">{{$item->toluene}}</td>
                                                        <td style="width: 150px">{{$item->trichlorobenzene}}</td>
                                                        <td style="width: 150px">{{$item->methoxychlor2}}</td>
                                                        <td style="width: 150px">{{$item->trichloroethane}}</td>
                                                        <td style="width: 150px">{{$item->trichloroethene}}</td>
                                                        <td style="width: 150px">{{$item->toxaphene2}}</td>
                                                        <td style="width: 150px">{{$item->trichloroethylene}}</td>
                                                        <td style="width: 150px">{{$item->trihalomethanes}}</td>
                                                        <td style="width: 150px">{{$item->trichlorophenol5}}</td>
                                                        <td style="width: 150px">{{$item->trichlorophenol6}}</td>
                                                        <td style="width: 150px">{{$item->tp_silvex}}</td>
                                                        <td style="width: 150px">{{$item->vinyl_chloride}}</td>
                                                        <td style="width: 150px">{{$item->xylenes_total}}</td>
                                                        <td style="width: 150px">{{$item->ddt_ddd_dde}}</td>
                                                        <td style="width: 150px">{{$item->dichlorophenoxyacetic}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="card-tools row form-inline">
                                                <div class="col-4">
                                                    <div class="d-flex justify-content-start">
                                                        <small>Showing {{ $Tailing->firstItem() }} to
                                                            {{ $Tailing->lastItem() }} of {{ $Tailing->total() }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div style="font-size: 8" class="d-flex justify-content-end">
                                                        {{ $Tailing->links() }}
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
                                        <form action="/import/tailing" method="POST" enctype="multipart/form-data">
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

<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

@endsection