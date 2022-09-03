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
                        <li class="breadcrumb-item"><a href="/airquality/ambien">Home</a></li>
                        <li class="breadcrumb-item active">{{$tittle}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="">
                <div class="card card-secondrary card-tabs">
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
                    </div>
                    <div class="card-body">
                        <section class="content mt-2">

                            <div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-tools row">
                                                
                                            <form action="/airquality/ambien/standard">
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
                                        <a href="/airquality/ambien/standard/create" class="btn bg-gradient-secondary btn-xs mt-2"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                                        <a href="/export/ambien/standart" class="btn  bg-gradient-secondary btn-xs mt-2" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                                        <a href="#" class="btn  bg-gradient-secondary btn-xs mt-2" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                            <i class="fas fa-upload mr-1"></i>Excel
                                        </a>
                                    </div>
                                    <!-- /.card-header -->
                                    @if ($QualityStandard->count())
                                    <div class="card-body table-responsive ">
                                        <table role="grid" id="example2" class="table table-bordered table-hover ">
                                            <thead style=" color:#005245">
                                                <tr class="text-center" style="font-size: 12px">
                                                    <th>No</th>
                                                    <th>Action</th>
                                                    <th>Quality Standard</th>
                                                    <th> Sulphur Dioxide (SO2) </th>
                                                    <th> Nitrogen Dioxide (NO2) </th>
                                                    <th> Carbon Monoxide </th>
                                                    <th> Ozone </th>
                                                    <th> Total Suspended Particulate (24 hours) </th>
                                                    <th> Particulate Matter 10 </th>
                                                    <th> Particulate Matter 2.5 </th>
                                                    <th> Temperature (Ambient) </th>
                                                    <th> Humidity </th>
                                                    <th> Wind Speed </th>
                                                    <th> Wind Direction </th>
                                                    <th> Weather </th>
                                                    <th> Barometric Pressure </th>
                                                    <th> Lead (Pb) </th>
                                                    <th> Hydrocarbon </th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-align: center">
                                                @php
                                                $no = 1 + ($QualityStandard->currentPage() - 1) * $QualityStandard->perPage();
                                                @endphp
                                                @foreach ($QualityStandard as $standard)
                                                <tr style="font-size: 12px">
                                                    <td>{{ $no++ }}</td>
                                                    <td>

                                                        <a href="/airquality/ambien/standard/{{ $standard->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <form action="/airquality/ambien/standard/{{ $standard->id }}" method="POST" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>{{ $standard->	nama	}}</td>
                                                    <td>{{ $standard->	sulphur_dioxide_so2	}}</td>
                                                    <td>{{ $standard->	nitrogen_dioxide_no2	}}</td>
                                                    <td>{{ $standard->	carbon_monoxide	}}</td>
                                                    <td>{{ $standard->	ozone	}}</td>
                                                    <td>{{ $standard->	total_suspended_particulate_24_hours	}}</td>
                                                    <td>{{ $standard->	particulate_matter_10	}}</td>
                                                    <td>{{ $standard->	particulate_matter_2_5	}}</td>
                                                    <td>{{ $standard->	temperature_ambient	}}</td>
                                                    <td>{{ $standard->	humidity	}}</td>
                                                    <td>{{ $standard->	wind_speed	}}</td>
                                                    <td>{{ $standard->	wind_direction	}}</td>
                                                    <td>{{ $standard->	weather	}}</td>
                                                    <td>{{ $standard->	barometric_pressure	}}</td>
                                                    <td>{{ $standard->	lead_pb	}}</td>
                                                    <td>{{ $standard->	hydrocarbon	}}</td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
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
                                                <div class="d-flex justify-content-end">
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
                                                <form action="/import/ambien/standart" method="POST" enctype="multipart/form-data">
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

                                <!-- /.card -->
                            </div>

                        </section>
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>


@endsection