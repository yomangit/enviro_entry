@extends('dashboard.layouts.main')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $breadcrumb }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/airquality/emission">Home</a></li>
                        <li class="breadcrumb-item active">{{ $tittle }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header p-0">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline m-2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session()->has('failures'))


                    <table style="font-size: 11px" class="table table-head-fixed table-sm table-danger">
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
                  @can('admin')
                  <p class="card-title"><a href="/airquality/emission/pointid" class="btn bg-gradient-info btn-xs ml-1 my-1 ">Point ID</a></p>
                    <p class="card-title"><a href="/airquality/emission/standard2" class="btn bg-gradient-info btn-xs my-1 ml-1 ">Quality Standard</a></p>
                  @endcan


                </div>
                <div class="card-body table-responsive">

                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="/airquality/emission">Table Emission 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  show active" id="custom-content-below-standard1-tab" data-toggle="pill" href="#custom-content-below-standard1" role="tab" aria-controls="custom-content-below-standard1" aria-selected="true">Table Emission 2</a>
                        </li>


                    </ul>
                    <div class="row m-2">
                        <div class="col-6"> 
                            @can('admin')
                            <a href="/airquality/emission2/create" class="btn bg-gradient-secondary btn-xs "><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                            <a href="/export/emission2" class="btn  bg-gradient-secondary btn-xs " data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                            <a href="#" class="btn  bg-gradient-secondary btn-xs " data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                <i class="fas fa-upload mr-1"></i>Excel
                            </a>
                            @endcan
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <div class=" row form-inline">
                                <form action="/airquality/emission2 mt-1" class="form-inline" autocomplete="off">
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
                                <form action="/airquality/emission2">
                                    <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                                </form>
                            </div>
                        </div>
                    </div>
                  
                    @if($Emission->count())
                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade show active" id="custom-content-below-standard1" role="tabpanel" aria-labelledby="custom-content-below-standard1-tab">
                            <div class="card-body table-responsive">
                                <table style="font-size: 11px" class="table  table-sm table-striped table-bordered">
                                    <thead class="text-center table-info">
                                        <tr>
                                            <th class="align-middle" rowspan="2">No
                                            </th>
                                            <th class="align-middle" rowspan="2" @if(!auth()->user()->is_admin)colspan="4"@else colspan="6"@endif>Quality Standard</th>
                                            <th colspan="14">Isokinetic Sampling Stack
                                                Condition</th>
                                            <th colspan="15">Emission Air (Actual)
                                            </th>

                                        </tr>
                                        <tr>
                                            <th class="align-middle"> Equipment </th>
                                            <th class="align-middle"> Fuel Type </th>
                                            <th class="align-middle"> Capacity </th>
                                            <th class="align-middle"> Ambient Temperature </th>
                                            <th class="align-middle"> Stack Temperature </th>
                                            <th class="align-middle"> Meter Temperature </th>
                                            <th class="align-middle"> Moisture Content </th>
                                            <th class="align-middle"> Actual Volume Sample </th>
                                            <th class="align-middle"> Standard Volume sample </th>
                                            <th class="align-middle"> Actual Oxygen, O2 </th>
                                            <th class="align-middle"> Velocity Linear </th>
                                            <th class="align-middle"> Dry Molecular Weight </th>
                                            <th class="align-middle"> Actual Stack Flowrate </th>
                                            <th class="align-middle"> Percent of Isokinetic </th>
                                            <th class="align-middle"> Ammonia (NH3) </th>
                                            <th class="align-middle"> Chlorine (Cl2) </th>
                                            <th class="align-middle"> Hydrogen Chloride (HCl) </th>
                                            <th class="align-middle"> Hydrogen Fluoride (HF) </th>
                                            <th class="align-middle"> Nitrogen Dioxide (NO2) </th>
                                            <th class="align-middle"> Opacity </th>
                                            <th class="align-middle"> Total Particulate (isokinetic) </th>
                                            <th class="align-middle"> Sulfur Dioxide (SO2) </th>
                                            <th class="align-middle"> Hydrogen Sulphide (H2S) </th>
                                            <th class="align-middle"> Mercury (Hg) </th>
                                            <th class="align-middle"> Arsenic (As) </th>
                                            <th class="align-middle"> Antimony (Sb) </th>
                                            <th class="align-middle"> Cadmium (Cd) </th>
                                            <th class="align-middle"> Zinc (Zn) </th>
                                            <th class="align-middle"> Lead (Pb) </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1 + ($QualityStandard->currentPage() - 1) * $QualityStandard->perPage();
                                        @endphp
                                        @foreach ($QualityStandard as $standard)
                                        <tr class="text-center" style="font-size: 11px">
                                            <td>{{ $no++ }}</td>

                                            <td @if(!auth()->user()->is_admin)colspan="4"@else colspan="6"@endif>{{$standard->nama}}</td>
                                            <td>{{$standard->equipment}}</td>
                                            <td>{{$standard->fuel_type}}</td>
                                            <td>{{$standard->capacity}}</td>
                                            <td>{{$standard->ambient_temperature}}</td>
                                            <td>{{$standard->stack_temperature}}</td>
                                            <td>{{$standard->meter_temperature}}</td>
                                            <td>{{$standard->moisture_content}}</td>
                                            <td>{{$standard->actual_volume_sample}}</td>
                                            <td>{{$standard->standard_volume_sample}}</td>
                                            <td>{{$standard->actual_oxygen_o2}}</td>
                                            <td>{{$standard->velocity_linear}}</td>
                                            <td>{{$standard->dry_molecular_weight}}</td>
                                            <td>{{$standard->actual_stack_flowrate}}</td>
                                            <td>{{$standard->percent_of_isokinetic}}</td>
                                            <td>{{$standard->ammonia_nh3}}</td>
                                            <td>{{$standard->chlorine_cl2}}</td>
                                            <td>{{$standard->hydrogen_chloride_hcl}}</td>
                                            <td>{{$standard->hydrogen_fluoride_hf}}</td>
                                            <td>{{$standard->nitrogen_oxide_nox_as_nitrogen_dioxide_no2}}</td>
                                            <td>{{$standard->opacity}}</td>
                                            <td>{{$standard->total_particulate_isokinetic}}</td>
                                            <td>{{$standard->sulfur_dioxide_so2}}</td>
                                            <td>{{$standard->hydrogen_sulphide_h2s}}</td>
                                            <td>{{$standard->mercury_hg}}</td>
                                            <td>{{$standard->arsenic_as}}</td>
                                            <td>{{$standard->antimony_sb}}</td>
                                            <td>{{$standard->cadmium_cd}}</td>
                                            <td>{{$standard->zinc_zn}}</td>
                                            <td>{{$standard->lead_pb}}</td>


                                        </tr>
                                        @endforeach
                                        <tr class="text-center table-info">
                                            <th class="align-middle">*</th>
                                           @can('admin')
                                           <th colspan="2">Action</th>
                                           @endcan
                                            <th colspan="2">Date</th>
                                            <th colspan="2">Point ID</th>
                                            <th colspan="29">Data Entry</th>
                                        </tr>
                                        @php
                                        $no2 = 1 + ($Emission->currentPage() - 1) * $Emission->perPage();
                                        @endphp

                                        @foreach($Emission as $item)
                                        <tr class="text-center">
                                            <td>{{$no2++}}</td>
                                            @can('admin')
                                            <td colspan="2">

<div style="width: 50px">
    <a href="/airquality/emission2/{{ $item->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
        <i class="fas fa-pen"></i>
    </a>
    <form action="/airquality/emission2/{{ $item->id }}" method="POST" class="d-inline">
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
                                                <div style="width: 60px">{{date('d-M-Y',strtotime($item->date))}}</div>
                                            </td>
                                            <td colspan="2">
                                                <div style="width: 60px">{{$item->PointId->nama}}</div>
                                            </td>
                                            <td>{{$item->equipment}}</td>
                                            <td>{{$item->fuel_type}}</td>
                                            <td>{{$item->capacity}}</td>
                                            <td>{{$item->ambient_temperature}}</td>
                                            <td>{{$item->stack_temperature}}</td>
                                            <td>{{$item->meter_temperature}}</td>
                                            <td>{{$item->moisture_content}}</td>
                                            <td>{{$item->actual_volume_sample}}</td>
                                            <td>{{$item->standard_volume_sample}}</td>
                                            <td>{{$item->actual_oxygen_o2}}</td>
                                            <td>{{$item->velocity_linear}}</td>
                                            <td>{{$item->dry_molecular_weight}}</td>
                                            <td>{{$item->actual_stack_flowrate}}</td>
                                            <td>{{$item->percent_of_isokinetic}}</td>
                                            <td>{{$item->ammonia_nh3}}</td>
                                            <td>{{$item->chlorine_cl2}}</td>
                                            <td>{{$item->hydrogen_chloride_hcl}}</td>
                                            <td>{{$item->hydrogen_fluoride_hf}}</td>
                                            <td>{{$item->nitrogen_oxide_nox_as_nitrogen_dioxide_no2}}</td>
                                            <td>{{$item->opacity}}</td>
                                            <td>{{$item->total_particulate_isokinetic}}</td>
                                            <td>{{$item->sulfur_dioxide_so2}}</td>
                                            <td>{{$item->hydrogen_sulphide_h2s}}</td>
                                            <td>{{$item->mercury_hg}}</td>
                                            <td>{{$item->arsenic_as}}</td>
                                            <td>{{$item->antimony_sb}}</td>
                                            <td>{{$item->cadmium_cd}}</td>
                                            <td>{{$item->zinc_zn}}</td>
                                            <td>{{$item->lead_pb}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="card-tools row form-inline">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-start">
                                            <small>Showing {{ $Emission->firstItem() }} to {{
                                                                    $Emission->lastItem() }} of
                                                {{ $Emission->total() }}
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex justify-content-end">
                                            {{ $Emission->links() }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @else
                    <p class="text-center fs-4 p-1">Not Data Found</p>
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
                                <form action="/import/emission2" method="POST" enctype="multipart/form-data">
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
        </div>
    </section>

</div>
@endsection