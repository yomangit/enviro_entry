<div class="container-fluid mt-3">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-primary card-outline">
        <div class="card-header p-0 ">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible form-inline m-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('failures'))
                <table class="table table-danger">
                    <tr>
                        <th class="align-middle">Row</th>
                        <th class="align-middle">Attribute</th>
                        <th class="align-middle">Errors</th>
                        <th class="align-middle">Value</th>
                    </tr>
                    @foreach (session()->get('failures') as $validation)
                        <tr>
                            <td class="align-middle">{{ $validation->row() }}</td>
                            <td class="align-middle">{{ $validation->attribute() }}</td>
                            <td class="align-middle">
                                <ul>
                                    @foreach ($validation->errors() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="align-middle">
                                {{ $validation->values()[$validation->attribute()] }}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
            @can('admin')
                <a href="/tailing/codeid" class="btn bg-gradient-info btn-xs my-1 ml-2 ">Code Sample</a>
                <a href="/tailing/qualitystandard" class="btn bg-gradient-info btn-xs my-1  ">Table
                    Standard</a>
            @endcan
            <div class=" card-tools p-1 mr-2 form-inline">
                <form action="/tailing" class="form-inline" autocomplete="off">
                    <div class="input-group date" id="reservationdate4" style="width: 85px;"
                        data-target-input="nearest">
                        <input type="text" name="fromDate" placeholder="Date"
                            class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate4"
                            data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                    </div>
                    <span class="input-group-text form-control-sm ">To</span>

                    <div class="input-group date mr-2" id="reservationdate5" style="width: 85px;"
                        data-target-input="nearest">
                        <input type="text" name="toDate" placeholder="Date"
                            class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate5"
                            data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                    </div>
                    <div style="width: 118px;" class="input-group mr-1">
                        <select class="form-control form-control-sm " name="search">
                            <option value="" selected>Point ID</option>
                            @foreach ($code_units as $code)
                                @if (request('search') == $code->nama)
                                    <option value="{{ $code->nama }}" selected>{{ $code->nama }}
                                    </option>
                                @else
                                    <option value="{{ $code->nama }}">{{ $code->nama }}</option>
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
        <div class="card-body">
            <div class="content">
                <div class="col-12">

                    @can('admin')
                        <div class="d-flex justify-content-start my-2">
                            <a href="/tailing/create" class="btn bg-gradient-secondary btn-xs ml-1"><i
                                    class="fas fa-plus mr-1 mt"></i>Add Data</a>
                            <a href="/export/tailing" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="tooltip"
                                data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                            <a href="#" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="modal"
                                data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default"><i
                                    class="fas fa-upload mr-1"></i>Excel</a>

                        </div>
                    @endcan

                    @if ($Tailing->count() && $code_units->count())
                        <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-content-above-Metals-tab" data-toggle="pill"
                                    href="#custom-content-above-Metals" role="tab"
                                    aria-controls="custom-content-above-Metals" aria-selected="true">TCLP
                                    Metals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-Inorganic-tab" data-toggle="pill"
                                    href="#custom-content-above-Inorganic" role="tab"
                                    aria-controls="custom-content-above-Inorganic" aria-selected="false">TCLP
                                    Inorganic</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-Organic-tab" data-toggle="pill"
                                    href="#custom-content-above-Organic" role="tab"
                                    aria-controls="custom-content-above-Organic" aria-selected="false">TCLP
                                    Organic**</a>
                            </li>

                        </ul>

                        <div class="tab-content m-2" id="custom-content-above-tabContent">
                            <div class="tab-pane fade show active" id="custom-content-above-Metals" role="tabpanel"
                                aria-labelledby="custom-content-above-Metals-tab">
                                <div class="table-responsive card card-primary card-outline">


                                    <table role="grid"
                                        class="table table-striped table-bordered dt-responsive nowrap table-sm ">
                                        <thead style=" font-size: 11px">
                                            <tr class="text-center table-info">
                                                <th class="align-middle">No</th>
                                                <th
                                                    @if (!auth()->user()->is_admin) colspan="2" @else colspan="3" @endif>
                                                    Quality Standard</th>
                                                <th> Antimony, Sb </th>
                                                <th class="align-middle"> Arsenic (As) </th>
                                                <th class="align-middle"> Barium (Ba) </th>
                                                <th class="align-middle"> Beryllium, Be </th>
                                                <th class="align-middle"> Boron (B) </th>
                                                <th class="align-middle"> Cadmium (Cd) </th>
                                                <th class="align-middle"> Chromium Hexavalent (Cr-VI)
                                                </th>
                                                <th class="align-middle"> Chromium (Cr) </th>
                                                <th class="align-middle"> Copper (Cu) </th>
                                                <th class="align-middle"> Iodide, I- </th>
                                                <th class="align-middle"> Lead (Pb) </th>
                                                <th class="align-middle"> Mercury (Hg) </th>
                                                <th class="align-middle"> Molybdenum, Mo </th>
                                                <th class="align-middle"> Nickel, Ni </th>
                                                <th class="align-middle"> Selenium (Se) </th>
                                                <th class="align-middle"> Silver (Ag) </th>
                                                <th class="align-middle"> Tributyl Tin Oxide (as
                                                    Organotins) **
                                                </th>
                                                <th class="align-middle"> Zinc (Zn) </th>

                                            </tr>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($QualityStd as $standard)
                                                <tr>
                                                    <td class="align-middle">{{ $no++ }}</td>
                                                    <th
                                                        @if (!auth()->user()->is_admin) colspan="2" @else colspan="3" @endif>
                                                        {{ $standard->nama }}</th>
                                                    <td class="align-middle">{{ $standard->antimony }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->arsenic }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->barium }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->beryllium }}</td>
                                                    <td class="align-middle">{{ $standard->boron }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->cadmium }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->hexavalent }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->chromium_cr }}</td>
                                                    <td class="align-middle">{{ $standard->copper }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->iodide }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->lead }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->mercury }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->molybdenum }}</td>
                                                    <td class="align-middle">{{ $standard->nickel }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->selenium }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->silver }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->tributyl }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->zinc_zn }}
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </thead>
                                        <tbody style="text-align:center">
                                            @php
                                                $no = 1 + ($Tailing->currentPage() - 1) * $Tailing->perPage();
                                            @endphp
                                            <tr class="table-primary">
                                                <th class="align-middle">*</th>
                                                @can('admin')
                                                    <th class="align-middle"> Action</th>
                                                @endcan
                                                <th class="align-middle">Name</th>
                                                <th class="align-middle">Date</th>
                                                <th colspan="18">Data Entry</th>


                                            </tr>
                                            @foreach ($Tailing as $item)
                                                <tr style=" font-size: 11px">
                                                    <td class="align-middle">{{ $no++ }}</td>
                                                    @can('admin')
                                                        <td class="align-middle">
                                                            <div style="width: 50px">
                                                                <a href="/tailing/{{ $item->id }}/edit"
                                                                    class="btn btn-outline-warning btn-xs btn-group"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Edit">
                                                                    <i class="fas fa-pen"></i>
                                                                </a>
                                                                <form action="/tailing/{{ $item->id }}"
                                                                    method="POST" class="d-inline">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button
                                                                        class="btn btn btn-outline-danger btn-xs btn-group"
                                                                        onclick="return confirm('are you sure?')"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Delete">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>

                                                        </td>
                                                    @endcan
                                                    <td class="align-middle">
                                                        {{ $item->PointId->nama }}</td>
                                                    <td style="width: 80px" class="align-middle">
                                                        {{ date('d-M-Y', strtotime($item->date)) }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->antimony }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->arsenic }}</td>
                                                    <td class="align-middle">{{ $item->barium }}</td>
                                                    <td class="align-middle">{{ $item->beryllium }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->boron }}</td>
                                                    <td class="align-middle">{{ $item->cadmium }}</td>
                                                    <td class="align-middle">{{ $item->hexavalent }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->chromium_cr }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->copper }}</td>
                                                    <td class="align-middle">{{ $item->iodide }}</td>
                                                    <td class="align-middle">{{ $item->lead }}</td>
                                                    <td class="align-middle">{{ $item->mercury }}</td>
                                                    <td class="align-middle">{{ $item->molybdenum }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->nickel }}</td>
                                                    <td class="align-middle">{{ $item->selenium }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->silver }}</td>
                                                    <td class="align-middle">{{ $item->tributyl }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->zinc_zn }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-above-Inorganic" role="tabpanel"
                                aria-labelledby="custom-content-above-Inorganic-tab">
                                <div class="table-responsive card card-primary card-outline">

                                    <table role="grid"
                                        class="table table-striped table-bordered dt-responsive nowrap table-sm ">
                                        <thead class="text-center" style=" font-size: 11px">
                                            <tr class="table-info">
                                                <th class="align-middle">No</th>
                                                <th colspan="2">Quality Standard</th>
                                                <th class="align-middle"> Chloride, Cl- </th>
                                                <th class="align-middle"> Free Cyanide </th>
                                                <th class="align-middle"> Total Cyanide </th>
                                                <th class="align-middle"> Fluoride </th>
                                                <th class="align-middle"> Nitrite (NO2) </th>
                                                <th class="align-middle"> Nitrate/Nitrite </th>

                                            </tr>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($QualityStd as $standard)
                                                <tr>
                                                    <td class="align-middle">{{ $no++ }}</td>
                                                    <th colspan="2" colspan="2">
                                                        {{ $standard->nama }}
                                                    </th>
                                                    <td class="align-middle">
                                                        {{ $standard->chloride_cl }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->free_cyanide }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->total_cyanide }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->fluoride }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->nitrite_no2 }}</td>
                                                    <td class="align-middle">{{ $standard->nitrate }}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </thead>
                                        <tbody style="text-align:center">
                                            @php
                                                $no = 1 + ($Tailing->currentPage() - 1) * $Tailing->perPage();
                                            @endphp
                                            <tr class="table-primary">
                                                <th class="align-middle">*</th>
                                                <th class="align-middle">Name</th>
                                                <th class="align-middle">Date</th>
                                                <th colspan="6">Data Entry</th>
                                            </tr>
                                            @foreach ($Tailing as $item)
                                                <tr style=" font-size: 11px">
                                                    <td class="align-middle">{{ $no++ }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->PointId->nama }}</td>
                                                    <td style="width: 80px" class="align-middle">
                                                        {{ date('d-M-Y', strtotime($item->date)) }}
                                                    </td>

                                                    <td class="align-middle">{{ $item->chloride_cl }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->free_cyanide }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->total_cyanide }}</td>
                                                    <td class="align-middle">{{ $item->fluoride }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->nitrite_no2 }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->nitrate }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-above-Organic" role="tabpanel"
                                aria-labelledby="custom-content-above-Organic-tab">
                                <div class="table-responsive card card-primary card-outline">

                                    <table role="grid"
                                        class="table table-striped table-bordered dt-responsive nowrap table-sm ">
                                        <thead class="text-center" style=" font-size: 11px">
                                            <tr class="table-info">
                                                <th class="align-middle">No</th>
                                                <th colspan="2">Quality Standard</th>
                                                <th class="align-middle"> Aldrin + Dieldrin </th>
                                                <th class="align-middle"> Dieldrin </th>
                                                <th class="align-middle"> Benzene </th>
                                                <th class="align-middle"> Benzo (a) pyrene </th>
                                                <th class="align-middle"> Carbon tetrachloride </th>
                                                <th class="align-middle"> Chlordane </th>
                                                <th class="align-middle"> Chlorobenzene </th>
                                                <th class="align-middle"> 2-Chlorophenol </th>
                                                <th class="align-middle"> Chloroform </th>
                                                <th class="align-middle"> o-Cresol </th>
                                                <th class="align-middle"> m-Cresol </th>
                                                <th class="align-middle"> p-Cresol </th>
                                                <th class="align-middle"> Total-cresol </th>
                                                <th class="align-middle"> Di(2-Ethylhexyl)Phthalate**
                                                </th>
                                                <th class="align-middle"> 2,4-D </th>
                                                <th class="align-middle"> 1,2-Dichlorobenzene </th>
                                                <th class="align-middle"> 1,4-Dichlorobenzene </th>
                                                <th class="align-middle"> 1,2-Dichloroethane </th>
                                                <th class="align-middle"> 1,1-Dichloroethylene </th>
                                                <th class="align-middle"> 1,1-Dichloroethene </th>
                                                <th class="align-middle"> 1,2-Dichloroethene </th>
                                                <th class="align-middle"> Dichloromethane </th>
                                                <th class="align-middle"> 2,4-Dichlorophenol </th>
                                                <th class="align-middle"> 2,4-Dinitrotoluene </th>
                                                <th class="align-middle"> Ethyl Benzene </th>
                                                <th class="align-middle"> "thylenediaminetetraacetic
                                                    acid
                                                    (EDTA)**" </th>
                                                <th class="align-middle"> Formaldehyde </th>
                                                <th class="align-middle"> Hexachloro-1,3 butadiene
                                                </th>
                                                <th class="align-middle"> Endrin </th>
                                                <th class="align-middle"> Heptachlor + Heptachlor
                                                    epoxide </th>
                                                <th class="align-middle"> Hexachlorobenzene </th>
                                                <th class="align-middle"> Hexachlorobutadiene </th>
                                                <th class="align-middle"> Hexachloroethane </th>
                                                <th class="align-middle"> Total Phenols </th>
                                                <th class="align-middle"> Lindane </th>
                                                <th class="align-middle"> Methoxychlor </th>
                                                <th class="align-middle"> Methyl ethyl ketone </th>
                                                <th class="align-middle"> Methyl Parathion </th>
                                                <th class="align-middle"> Nitrobenzene </th>
                                                <th class="align-middle"> Styrene </th>
                                                <th class="align-middle"> 1,1,1,2-Tetrachloroethane
                                                </th>
                                                <th class="align-middle"> 1,1,2,2-Tetrachloroethane
                                                </th>
                                                <th class="align-middle"> Nitriloacetic acid </th>
                                                <th class="align-middle"> Pentachlorophenol </th>
                                                <th class="align-middle"> Pyridine </th>
                                                <th class="align-middle"> Toxaphene </th>
                                                <th class="align-middle"> Parathion </th>
                                                <th class="align-middle"> Total Poly Chlor Biphenyl
                                                    (PCB) </th>
                                                <th class="align-middle"> Tetrachloroethene (PCE) </th>
                                                <th class="align-middle"> Toluene </th>
                                                <th class="align-middle"> Trichlorobenzene </th>
                                                <th class="align-middle"> 1,1,1-Trichloroethane
                                                    (Methoxychlor)
                                                </th>
                                                <th class="align-middle"> 1,1,2-Trichloroethane </th>
                                                <th class="align-middle"> Trichloroethene* </th>
                                                <th class="align-middle"> Toxaphene </th>
                                                <th class="align-middle"> Trichloroethylene (TCE) </th>
                                                <th class="align-middle"> Trihalomethanes </th>
                                                <th class="align-middle"> 2,4,5-Trichlorophenol </th>
                                                <th class="align-middle"> 2,4,6-Trichlorophenol </th>
                                                <th class="align-middle"> 2,4,5-TP (Silvex) </th>
                                                <th class="align-middle"> Vinyl Chloride </th>
                                                <th class="align-middle"> Xylenes Total </th>
                                                <th class="align-middle"> DDT + DDD + DDE* </th>
                                                <th class="align-middle"> 2.4-D
                                                    (2.4-dichlorophenoxyacetic
                                                    acid)* </th>
                                                <th class="align-middle">LD50 </th>
                                            </tr>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($QualityStd as $standard)
                                                <tr>
                                                    <td class="align-middle">{{ $no++ }}</td>
                                                    <td colspan="2">{{ $standard->nama }}</td>
                                                    <td class="align-middle">{{ $standard->aldrin }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->dieldrin }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->benzene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->benzo_a_pyrene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->tetrachloride }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->chlordane }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->chlorobenzene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->chlorophenol2 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->chloroform }}</td>
                                                    <td class="align-middle">{{ $standard->o_cresol }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->m_cresol }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->p_cresol }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->total_cresol }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->ethylhexylphthalate }}</td>
                                                    <td class="align-middle">{{ $standard->d }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->dichlorobenzene2 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->dichlorobenzene4 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->dichloroethane1 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->dichloroethylene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->dichloroethene2 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->dichloroethene3 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->dichloromethane }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->dichlorophenol }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->dinitrotoluene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->ethyl_benzene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->thylenediaminetetraacetic }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->formaldehyde }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->hexachloro }}</td>
                                                    <td class="align-middle">{{ $standard->endrin }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->heptachlor }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->hexachlorobenzene }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->hexachlorobutadiene }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->hexachloroethane }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->total_phenols }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->lindane }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->methoxychlor1 }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->ketone }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->parathion1 }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->nitrobenzene }}
                                                    </td>
                                                    <td class="align-middle">{{ $standard->styrene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->tetrachloroethane1 }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->tetrachloroethane2 }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->nitriloacetic }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->pentachlorophenol }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->pyridine }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->toxaphene1 }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->parathion }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->total_chlor }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->tetrachloroethene }}</td>
                                                    <td class="align-middle">{{ $standard->toluene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->trichlorobenzene }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->methoxychlor2 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->trichloroethane1 }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->trichloroethene2 }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->toxaphene2 }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->trichloroethylene }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->trihalomethanes }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->trichlorophenol5 }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->trichlorophenol6 }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->tp_silvex }}</td>
                                                    <td class="align-middle">
                                                        {{ $standard->vinyl_chloride }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->xylenes_total }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->ddt_ddd_dde }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $standard->dichlorophenoxyacetic }}</td>
                                                    <td class="align-middle">{{ $standard->tom }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </thead>
                                        <tbody style="text-align:center">
                                            @php
                                                $no = 1 + ($Tailing->currentPage() - 1) * $Tailing->perPage();
                                            @endphp
                                            <tr class="table-primary">
                                                <th class="align-middle">*</th>
                                                <th class="align-middle">Name</th>
                                                <th class="align-middle">Date</th>
                                                <th colspan="65">Data Entry</th>
                                            </tr>
                                            @foreach ($Tailing as $item)
                                                <tr style=" font-size: 11px">
                                                    <td class="align-middle">{{ $no++ }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->PointId->nama }}</td>
                                                    <td class="align-middle">
                                                        <div style="width: 80px">
                                                            {{ date('d-M-Y', strtotime($item->date)) }}
                                                        </div>
                                                    </td>

                                                    <td class="align-middle">{{ $item->aldrin }}</td>
                                                    <td class="align-middle">{{ $item->dieldrin }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->benzene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->benzo_a_pyrene }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->tetrachloride }}</td>
                                                    <td class="align-middle">{{ $item->chlordane }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->chlorobenzene }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->chlorophenol2 }}</td>
                                                    <td class="align-middle">{{ $item->chloroform }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->o_cresol }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->m_cresol }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->p_cresol }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->total_cresol }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->ethylhexylphthalate }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->d }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->dichlorobenzene2 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->dichlorobenzene4 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->dichloroethane1 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->dichloroethylene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->dichloroethene2 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->dichloroethene3 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->dichloromethane }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->dichlorophenol }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->dinitrotoluene }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->ethyl_benzene }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->thylenediaminetetraacetic }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->formaldehyde }}</td>
                                                    <td class="align-middle">{{ $item->hexachloro }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->endrin }}</td>
                                                    <td class="align-middle">{{ $item->heptachlor }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->hexachlorobenzene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->hexachlorobutadiene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->hexachloroethane }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->total_phenols }}</td>
                                                    <td class="align-middle">{{ $item->lindane }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->methoxychlor1 }}</td>
                                                    <td class="align-middle">{{ $item->ketone }}</td>
                                                    <td class="align-middle">{{ $item->parathion1 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->nitrobenzene }}</td>
                                                    <td class="align-middle">{{ $item->styrene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->tetrachloroethane1 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->tetrachloroethane2 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->nitriloacetic }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->pentachlorophenol }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->pyridine }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->toxaphene1 }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->parathion }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->total_chlor }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->tetrachloroethene }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->toluene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->trichlorobenzene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->methoxychlor2 }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->trichloroethane1 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->trichloroethene2 }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->toxaphene2 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->trichloroethylene }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->trihalomethanes }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->trichlorophenol5 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->trichlorophenol6 }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->tp_silvex }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->vinyl_chloride }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->xylenes_total }}</td>
                                                    <td class="align-middle">{{ $item->ddt_ddd_dde }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->dichlorophenoxyacetic }}</td>
                                                    <td class="align-middle">{{ $item->tom }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>

                            </div>

                        </div>



                </div>
            </div>
        </div>
        <div class="card-footer p-0">
            <div class="card-tools mt-2 form-inline">
                <div class="col-4">
                    <div class="d-flex justify-content-start">
                        <h6>Showing {{ $Tailing->firstItem() }} to {{ $Tailing->lastItem() }} of
                            {{ $Tailing->total() }}</h6>
                    </div>
                </div>
                <div class="col-8 d-flex justify-content-end">
                    <div class=" pagination pagination-sm">
                        {{ $Tailing->links() }}
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
                                <input type="file" name="file"
                                    class="custom-file-input  @error('file') is-invalid @enderror"
                                    id="exampleInputFile" required>
                                <label class="custom-file-label" for="exampleInputFile">Choose
                                    file</label>
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
