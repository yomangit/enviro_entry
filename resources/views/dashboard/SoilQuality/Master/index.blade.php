@extends('dashboard.layouts.main')
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
        <div class="container-fluid">
            <div class="">
                <div class="card card-primary card-outline">
                    <div class="card-header p-0 pt-1">

                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible form-inline">
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

                        <a href="/soilquality/soilqualitypointid" class="btn bg-gradient-info btn-xs ml-2  mb-1">Code Sample</a>
                        <a href="/soilquality/soilqualitystandard" class="btn bg-gradient-info btn-xs  ml-1 mb-1 ">Table Standard</a>


                    </div>
                    <div class="card-body">
                        <div class="card card-secondary card-outline">
                            <div class="card-header">
                                <div class="card-tools row d-flex">
                                    <form action="/soilquality " class="form-inline" autocomplete="off">
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
                                    <form action="/soilquality">
                                        <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                                    </form>
                                </div>

                                <a href="/soilquality/create" class="btn bg-gradient-secondary btn-xs "><i class="fas fa-plus mr-3 mt"></i>Add Data</a>
                                <a href="/export/soilquality" class="btn  bg-gradient-secondary btn-xs " data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-3"></i>Excel</a>
                                <a href="#" class="btn  bg-gradient-secondary btn-xs " data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                    <i class="fas fa-upload mr-3"></i>Excel
                                </a>
                            </div>
                            <!-- /.card-header -->
                            @if($Soil->count())
                            <div class="card-body table-responsive">
                                <table style="font-size: 11px" class="table table-head-fixed table-striped table-sm table-bordered">
                                    <thead style="background-color: #067eaa ;color:#ded8d8" class="text-center ">

                                        <tr>
                                            <th rowspan="2" style="background-color: #067eaa" class="align-middle">No</th>
                                            <th rowspan="2" colspan="4" style="background-color: #067eaa" class="align-middle">Quality Standard</th>
                                            <th rowspan="2" style="background-color: #067eaa" class="align-middle"> pH</th>
                                            <th rowspan="2" style="background-color: #067eaa" class="align-middle">pH (H2O)</th>
                                            <th rowspan="2" style="background-color: #067eaa" class="align-middle">Total Organic Carbon</th>
                                            <th rowspan="2" style="background-color: #067eaa" class="align-middle">Total Nitrogen</th>
                                            <th rowspan="2" style="background-color: #067eaa" class="align-middle">C/N*</th>
                                            <th colspan="5" style="background-color: #067eaa" class="align-middle">Cation</th>
                                            <th colspan="5" style="background-color: #067eaa" class="align-middle">Caracteristic</th>
                                            <th colspan="2" style="background-color: #067eaa" class="align-middle">Alkalinity</th>
                                            <th colspan="3" style="background-color: #067eaa" class="align-middle">Tekstur</th>
                                            <th rowspan="2" style="background-color: #067eaa" class="align-middle"> Moisture Content </th>
                                            <th rowspan="2" style="background-color: #067eaa" class="align-middle"> Bulk Density </th>
                                            <th rowspan="2" style="background-color: #067eaa" class="align-middle"> Ruang Pori Total </th>
                                            <th rowspan="2" style="background-color: #067eaa" class="align-middle"> PD </th>
                                            <th colspan="3" style="background-color: #067eaa" class="align-middle"> Pori Drainase</th>
                                            <th rowspan="2" style="background-color: #067eaa" class="align-middle"> Air Tersedia </th>
                                            <th rowspan="2" style="background-color: #067eaa" class="align-middle"> Permeabilitas </th>
                                            <th colspan="4" style="background-color: #067eaa" class="align-middle"> Kadar Air </th>
                                            <th rowspan="2" style="background-color: #067eaa" class="align-middle"> Laboratory</th>


                                        </tr>
                                        <tr>

                                            <th style="background-color: #067eaa" class="align-middle">Calsium</th>
                                            <th style="background-color: #067eaa" class="align-middle">Magnesium</th>
                                            <th style="background-color: #067eaa" class="align-middle">Pottasium</th>
                                            <th style="background-color: #067eaa" class="align-middle"> Sodium </th>
                                            <th style="background-color: #067eaa" class="align-middle">Jumlah</th>
                                            <th style="background-color: #067eaa" class="align-middle">P<sub>2</sub>O<sub>5</sub>(HCl 25%)</th>
                                            <th style="background-color: #067eaa" class="align-middle"> K<sub>2</sub>(HCl 25%) </th>
                                            <th style="background-color: #067eaa" class="align-middle">P<sub>2</sub>O<sub>5</sub> (Olsen)</th>
                                            <th style="background-color: #067eaa" class="align-middle"> Kapasitas Tukar Kation</th>
                                            <th style="background-color: #067eaa" class="align-middle"> KB (Kejenuhan Basa) </th>
                                            <th style="background-color: #067eaa" class="align-middle"> Al - Tukar </th>
                                            <th style="background-color: #067eaa" class="align-middle"> H - Tukar </th>
                                            <th style="background-color: #067eaa" class="align-middle"> Pasir </th>
                                            <th style="background-color: #067eaa" class="align-middle"> Debu </th>
                                            <th style="background-color: #067eaa" class="align-middle"> Lempung </th>
                                            <th style="background-color: #067eaa" class="align-middle"> Sangat Cepat </th>
                                            <th style="background-color: #067eaa" class="align-middle"> Cepat </th>
                                            <th style="background-color: #067eaa" class="align-middle"> Lambat</th>
                                            <th style="background-color: #067eaa" class="align-middle"> pF 1 </th>
                                            <th style="background-color: #067eaa" class="align-middle"> pF 2 </th>
                                            <th style="background-color: #067eaa" class="align-middle"> pF 2.54 </th>
                                            <th style="background-color: #067eaa" class="align-middle"> pF 4.2</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                        $no = 1 + ($QualityStandard->currentPage() - 1) * $QualityStandard->perPage();
                                        @endphp
                                        @foreach ($QualityStandard as $standard)
                                        <tr style="font-size: 12px;">
                                            <td>{{ $no++ }}</td>
                                            <td class="align-middle" colspan="4">{{ $standard->  nama    }}</td>
                                            <td class="align-middle">{{ $standard->  ph }}</td>
                                            <td class="align-middle">{{ $standard->  ph_h2o    }}</td>
                                            <td class="align-middle">{{ $standard->  total_organic_carbon }}</td>
                                            <td class="align-middle">{{ $standard->  total_nitrogen   }}</td>
                                            <td class="align-middle">{{ $standard->  cn    }}</td>
                                            <td class="align-middle">{{ $standard->  calsium   }}</td>
                                            <td class="align-middle">{{ $standard->  magnesium  }}</td>
                                            <td class="align-middle">{{ $standard->  pottasium }}</td>
                                            <td class="align-middle">{{ $standard->  sodium    }}</td>
                                            <td class="align-middle">{{ $standard->  jumlah  }}</td>
                                            <td class="align-middle">{{ $standard->  p2o5_hcl_25  }}</td>
                                            <td class="align-middle">{{ $standard->  k2o_hcl_25 }}</td>
                                            <td class="align-middle">{{ $standard->  p2o5_olsen }}</td>
                                            <td class="align-middle">{{ $standard->  kapasitas_tukar_kation }}</td>
                                            <td class="align-middle">{{ $standard->  kb_kejenuhan_basa }}</td>
                                            <td class="align-middle">{{ $standard->  al_tukar }}</td>
                                            <td class="align-middle">{{ $standard->  h_tukar }}</td>
                                            <td class="align-middle">{{ $standard->  pasir }}</td>
                                            <td class="align-middle">{{ $standard->  debu }}</td>
                                            <td class="align-middle">{{ $standard->  lempung }}</td>
                                            <td class="align-middle">{{ $standard->  moisture_content }}</td>
                                            <td class="align-middle">{{ $standard->  bulk_density }}</td>
                                            <td class="align-middle">{{ $standard->  ruang_pori_total }}</td>
                                            <td class="align-middle">{{ $standard->  pd }}</td>
                                            <td class="align-middle">{{ $standard->  sangat_cepat }}</td>
                                            <td class="align-middle">{{ $standard->  cepat }}</td>
                                            <td class="align-middle">{{ $standard->  lambat }}</td>
                                            <td class="align-middle">{{ $standard->  air_tersedia }}</td>
                                            <td class="align-middle">{{ $standard->  permeabilitas }}</td>
                                            <td class="align-middle">{{ $standard->  pf_1 }}</td>
                                            <td class="align-middle">{{ $standard->  pf_2 }}</td>
                                            <td class="align-middle">{{ $standard->  pf_2_54 }}</td>
                                            <td class="align-middle">{{ $standard->  pf_4_2 }}</td>
                                            <td class="align-middle">{{ $standard->  laboratorium }}</td>

                                        </tr>
                                        @endforeach
                                        <tr align="middle" style="font-size: 11px">
                                            <th style="background-color: #6082b6;color:whitesmoke">*</th>
                                            <th style="background-color: #6082b6;color:whitesmoke" colspan="2">Point ID</th>
                                            <th style="background-color: #6082b6;color:whitesmoke" colspan="2">Date</th>
                                            <th style="background-color: #6082b6;color:whitesmoke" colspan="34">Data Entry</th>
                                            <th style="background-color: #6082b6;color:whitesmoke">Action</th>
                                        </tr>
                                        @php
                                        $no = 1 + ($Soil->currentPage() - 1) * $Soil->perPage();
                                        @endphp
                                        @foreach ($Soil as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td colspan="2">
                                                <div style="width: 50px">{{ $item->PointId->nama }}</div>
                                            </td>
                                            <td colspan="2">
                                                <div style="width: 60px">{{date('d-m-Y',strtotime($item->date))}}
                                            </td>
                                            <td class="align-middle">{{ $item->  ph }}</td>
                                            <td class="align-middle">{{ $item->  ph_h2o    }}</td>
                                            <td class="align-middle">{{ $item->  total_organic_carbon }}</td>
                                            <td class="align-middle">{{ $item->  total_nitrogen   }}</td>
                                            <td class="align-middle">{{ $item->  cn    }}</td>
                                            <td class="align-middle">{{ $item->  calsium   }}</td>
                                            <td class="align-middle">{{ $item->  magnesium  }}</td>
                                            <td class="align-middle">{{ $item->  pottasium }}</td>
                                            <td class="align-middle">{{ $item->  sodium    }}</td>
                                            <td class="align-middle">{{ $item->  jumlah  }}</td>
                                            <td class="align-middle">{{ $item->  p2o5_hcl_25  }}</td>
                                            <td class="align-middle">{{ $item->  k2o_hcl_25 }}</td>
                                            <td class="align-middle">{{ $item->  p2o5_olsen }}</td>
                                            <td class="align-middle">{{ $item->  kapasitas_tukar_kation }}</td>
                                            <td class="align-middle">{{ $item->  kb_kejenuhan_basa }}</td>
                                            <td class="align-middle">{{ $item->  al_tukar }}</td>
                                            <td class="align-middle">{{ $item->  h_tukar }}</td>
                                            <td class="align-middle">{{ $item->  pasir }}</td>
                                            <td class="align-middle">{{ $item->  debu }}</td>
                                            <td class="align-middle">{{ $item->  lempung }}</td>
                                            <td class="align-middle">{{ $item->  moisture_content }}</td>
                                            <td class="align-middle">{{ $item->  bulk_density }}</td>
                                            <td class="align-middle">{{ $item->  ruang_pori_total }}</td>
                                            <td class="align-middle">{{ $item->  pd }}</td>
                                            <td class="align-middle">{{ $item->  sangat_cepat }}</td>
                                            <td class="align-middle">{{ $item->  cepat }}</td>
                                            <td class="align-middle">{{ $item->  lambat }}</td>
                                            <td class="align-middle">{{ $item->  air_tersedia }}</td>
                                            <td class="align-middle">{{ $item->  permeabilitas }}</td>
                                            <td class="align-middle">{{ $item->  pf_1 }}</td>
                                            <td class="align-middle">{{ $item->  pf_2 }}</td>
                                            <td class="align-middle">{{ $item->  pf_2_54 }}</td>
                                            <td class="align-middle">{{ $item->  pf_4_2 }}</td>
                                            <td class="align-middle">{{ $item->  laboratorium }}</td>
                                            <td>
                                                <div style="width: 50px">
                                                    <a href="/soilquality/{{ $item->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <form action="/soilquality/{{ $item->id }}" method="POST" class="d-inline">
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
                                            <small>Showing {{ $Soil->firstItem() }} to {{
                                                                    $Soil->lastItem() }} of {{ $Soil->total() }}
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex justify-content-end">
                                            {{ $Soil->links() }}
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
                                        <form action="/import/soilquality" method="POST" enctype="multipart/form-data">
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
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>


@endsection