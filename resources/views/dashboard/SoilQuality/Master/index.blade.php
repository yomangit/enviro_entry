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

                        @can('admin')
                        <a href="/soilquality/soilqualitypointid" class="btn bg-gradient-info btn-xs ml-2 my-1 ">Point ID</a>
                        <a href="/soilquality/soilqualitystandard" class="btn bg-gradient-info btn-xs  my-1">Table Standard</a>
                        @endcan

                        <div class=" card-tools p-1 mr-2 form-inline">
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
                                        <option value="" selected>Point ID</option>
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
                    </div>
                    <div class="card-body table-responsive">

                        @can('admin')
                        <div class="d-flex justify-content-start mb-2">
                            <a href="/soilquality/create" class="btn bg-gradient-secondary btn-xs m-1 "><i class="fas fa-plus mr-3 mt"></i>Add Data</a>
                            <a href="/export/soilquality" class="btn  bg-gradient-secondary btn-xs m-1 " data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-3"></i>Excel</a>
                            <a href="#" class="btn  bg-gradient-secondary btn-xs m-1 " data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                <i class="fas fa-upload mr-3"></i>Excel
                            </a>
                        </div>
                        @endcan
                        @if($Soil->count())
                        <table style="font-size: 11px" class="table  table-striped table-sm table-bordered">
                            <thead class="text-center table-info ">

                                <tr>
                                    <th rowspan="2" class="align-middle">No</th>
                                    <th rowspan="2" @if(!auth()->user()->is_admin)colspan="4" @else colspan="6" @endif class="align-middle">Quality Standard</th>
                                    <th rowspan="2" class="align-middle"> pH</th>
                                    <th rowspan="2" class="align-middle">pH (H2O)</th>
                                    <th rowspan="2" class="align-middle">Total Organic Carbon</th>
                                    <th rowspan="2" class="align-middle">Total Nitrogen</th>
                                    <th rowspan="2" class="align-middle">C/N*</th>
                                    <th colspan="5" class="align-middle">Cation</th>
                                    <th colspan="5" class="align-middle">Caracteristic</th>
                                    <th colspan="2" class="align-middle">Alkalinity</th>
                                    <th colspan="3" class="align-middle">Tekstur</th>
                                    <th rowspan="2" class="align-middle"> Moisture Content </th>
                                    <th rowspan="2" class="align-middle"> Bulk Density </th>
                                    <th rowspan="2" class="align-middle"> Ruang Pori Total </th>
                                    <th rowspan="2" class="align-middle"> PD </th>
                                    <th colspan="3" class="align-middle"> Pori Drainase</th>
                                    <th rowspan="2" class="align-middle"> Air Tersedia </th>
                                    <th rowspan="2" class="align-middle"> Permeabilitas </th>
                                    <th colspan="4" class="align-middle"> Kadar Air </th>
                                    <th rowspan="2" class="align-middle"> Laboratory</th>


                                </tr>
                                <tr>

                                    <th class="align-middle">Calsium</th>
                                    <th class="align-middle">Magnesium</th>
                                    <th class="align-middle">Pottasium</th>
                                    <th class="align-middle"> Sodium </th>
                                    <th class="align-middle">Jumlah</th>
                                    <th class="align-middle">P<sub>2</sub>O<sub>5</sub>(HCl 25%)</th>
                                    <th class="align-middle"> K<sub>2</sub>(HCl 25%) </th>
                                    <th class="align-middle">P<sub>2</sub>O<sub>5</sub> (Olsen)</th>
                                    <th class="align-middle"> Kapasitas Tukar Kation</th>
                                    <th class="align-middle"> KB (Kejenuhan Basa) </th>
                                    <th class="align-middle"> Al - Tukar </th>
                                    <th class="align-middle"> H - Tukar </th>
                                    <th class="align-middle"> Pasir </th>
                                    <th class="align-middle"> Debu </th>
                                    <th class="align-middle"> Lempung </th>
                                    <th class="align-middle"> Sangat Cepat </th>
                                    <th class="align-middle"> Cepat </th>
                                    <th class="align-middle"> Lambat</th>
                                    <th class="align-middle"> pF 1 </th>
                                    <th class="align-middle"> pF 2 </th>
                                    <th class="align-middle"> pF 2.54 </th>
                                    <th class="align-middle"> pF 4.2</th>

                                </tr>
                            </thead>
                            <tbody class="text-center">

                                @php
                                $no = 1;
                                @endphp
                                @foreach ($QualityStandard as $standard)
                                <tr style="font-size: 12px;">
                                    <td>{{ $no++ }}</td>
                                    <td @if(!auth()->user()->is_admin)colspan="4" @else colspan="6" @endif>{{ $standard->  nama    }}</td>
                                    <td>{{ $standard->  ph }}</td>
                                    <td>{{ $standard->  ph_h2o    }}</td>
                                    <td>{{ $standard->  total_organic_carbon }}</td>
                                    <td>{{ $standard->  total_nitrogen   }}</td>
                                    <td>{{ $standard->  cn    }}</td>
                                    <td>{{ $standard->  calsium   }}</td>
                                    <td>{{ $standard->  magnesium  }}</td>
                                    <td>{{ $standard->  pottasium }}</td>
                                    <td>{{ $standard->  sodium    }}</td>
                                    <td>{{ $standard->  jumlah  }}</td>
                                    <td>{{ $standard->  p2o5_hcl_25  }}</td>
                                    <td>{{ $standard->  k2o_hcl_25 }}</td>
                                    <td>{{ $standard->  p2o5_olsen }}</td>
                                    <td>{{ $standard->  kapasitas_tukar_kation }}</td>
                                    <td>{{ $standard->  kb_kejenuhan_basa }}</td>
                                    <td>{{ $standard->  al_tukar }}</td>
                                    <td>{{ $standard->  h_tukar }}</td>
                                    <td>{{ $standard->  pasir }}</td>
                                    <td>{{ $standard->  debu }}</td>
                                    <td>{{ $standard->  lempung }}</td>
                                    <td>{{ $standard->  moisture_content }}</td>
                                    <td>{{ $standard->  bulk_density }}</td>
                                    <td>{{ $standard->  ruang_pori_total }}</td>
                                    <td>{{ $standard->  pd }}</td>
                                    <td>{{ $standard->  sangat_cepat }}</td>
                                    <td>{{ $standard->  cepat }}</td>
                                    <td>{{ $standard->  lambat }}</td>
                                    <td>{{ $standard->  air_tersedia }}</td>
                                    <td>{{ $standard->  permeabilitas }}</td>
                                    <td>{{ $standard->  pf_1 }}</td>
                                    <td>{{ $standard->  pf_2 }}</td>
                                    <td>{{ $standard->  pf_2_54 }}</td>
                                    <td>{{ $standard->  pf_4_2 }}</td>
                                    <td>{{ $standard->  laboratorium }}</td>

                                </tr>
                                @endforeach
                                <tr align="middle" class="table-primary" style="font-size: 11px">
                                    <th>*</th>
                                    @can('admin')
                                    <th colspan="2">Action</th>
                                    @endcan
                                    <th colspan="2">Point ID</th>
                                    <th colspan="2">Date</th>
                                    <th colspan="34">Data Entry</th>

                                </tr>
                                @php
                                $no = 1 + ($Soil->currentPage() - 1) * $Soil->perPage();
                                @endphp
                                @foreach ($Soil as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    @can('admin')
                                    <td colspan="2">
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
                                    @endcan
                                    <td colspan="2">
                                        <div style="width: 50px">{{ $item->PointId->nama }}</div>
                                    </td>
                                    <td colspan="2">
                                        <div style="width: 60px">{{date('d-m-Y',strtotime($item->date))}}
                                    </td>
                                    <td>{{ $item->  ph }}</td>
                                    <td>{{ $item->  ph_h2o    }}</td>
                                    <td>{{ $item->  total_organic_carbon }}</td>
                                    <td>{{ $item->  total_nitrogen   }}</td>
                                    <td>{{ $item->  cn    }}</td>
                                    <td>{{ $item->  calsium   }}</td>
                                    <td>{{ $item->  magnesium  }}</td>
                                    <td>{{ $item->  pottasium }}</td>
                                    <td>{{ $item->  sodium    }}</td>
                                    <td>{{ $item->  jumlah  }}</td>
                                    <td>{{ $item->  p2o5_hcl_25  }}</td>
                                    <td>{{ $item->  k2o_hcl_25 }}</td>
                                    <td>{{ $item->  p2o5_olsen }}</td>
                                    <td>{{ $item->  kapasitas_tukar_kation }}</td>
                                    <td>{{ $item->  kb_kejenuhan_basa }}</td>
                                    <td>{{ $item->  al_tukar }}</td>
                                    <td>{{ $item->  h_tukar }}</td>
                                    <td>{{ $item->  pasir }}</td>
                                    <td>{{ $item->  debu }}</td>
                                    <td>{{ $item->  lempung }}</td>
                                    <td>{{ $item->  moisture_content }}</td>
                                    <td>{{ $item->  bulk_density }}</td>
                                    <td>{{ $item->  ruang_pori_total }}</td>
                                    <td>{{ $item->  pd }}</td>
                                    <td>{{ $item->  sangat_cepat }}</td>
                                    <td>{{ $item->  cepat }}</td>
                                    <td>{{ $item->  lambat }}</td>
                                    <td>{{ $item->  air_tersedia }}</td>
                                    <td>{{ $item->  permeabilitas }}</td>
                                    <td>{{ $item->  pf_1 }}</td>
                                    <td>{{ $item->  pf_2 }}</td>
                                    <td>{{ $item->  pf_2_54 }}</td>
                                    <td>{{ $item->  pf_4_2 }}</td>
                                    <td>{{ $item->  laboratorium }}</td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer p-0">
                        <div class="card-tools mt-2 form-inline">
                            <div class="col-4">
                                <div class="d-flex justify-content-start">
                                    <h6>Showing {{ $Soil->firstItem() }} to {{$Soil->lastItem() }} of {{ $Soil->total() }}</h6>
                                </div>
                            </div>
                            <div class="col-8 d-flex justify-content-end">
                                <div class=" pagination pagination-sm">
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
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>


@endsection