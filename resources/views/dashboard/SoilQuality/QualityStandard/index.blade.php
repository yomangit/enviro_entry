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
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/soilquality">Home</a></li>
                        <li class="breadcrumb-item active">{{ $tittle }}</li>
                    </ol>
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
                        <div class="card-tools mr-3 mt-1 mb-1 ">

                            <form action="/soilquality/soilqualitystandard">
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

                        <a href="/soilquality/soilqualitystandard/create" class="btn bg-gradient-secondary btn-xs  ml-1 mb-1"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                        <a href="/export/soilquality/standard" class="btn  bg-gradient-secondary btn-xs  ml-1 mb-1" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                        <a href="#" class="btn  bg-gradient-secondary btn-xs  ml-1 mb-1" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                            <i class="fas fa-upload mr-1"></i>Excel
                        </a>

                    </div>
                    @if($QualityStandard->count())
                    <div class="card-body table-responsive">
                        <section class="content ">
                            <table style="font-size: 11px" class="table table-head-fixed table-sm table-striped table-bordered">
                                <thead style="background-color: #067eaa ;color:#ded8d8" class="text-center ">

                                    <tr>
                                        <th rowspan="2" style="background-color: #067eaa" class="align-middle">No</th>
                                        <th rowspan="2" style="background-color: #067eaa" class="align-middle">Action</th>
                                        <th rowspan="2" style="background-color: #067eaa" class="align-middle">Quality Standard</th>
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
                                        <td class="align-middle">{{ $no++ }}</td>
                                        <td class="align-middle">
                                            <div style="width: 50px">
                                                <a href="/soilquality/soilqualitystandard/{{ $standard->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <form action="/soilquality/soilqualitystandard/{{ $standard->id }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                        <td class="align-middle">{{ $standard->  nama    }}</td>
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
                                </tbody>
                            </table>
                        </section>
                    </div>

                    <div class="card-footer">
                        <div class="card-tools row form-inline">
                            <div class="col-4">
                                <div class="d-flex justify-content-start">
                                    <small>Showing {{ $QualityStandard->firstItem() }} to {{
                                                                    $QualityStandard->lastItem() }} of {{ $QualityStandard->total() }}
                                    </small>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="d-flex justify-content-end pagination pagination-sm">
                                    {{ $QualityStandard->links() }}
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
                                <form action="/import/soilquality/standard" method="POST" enctype="multipart/form-data">
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