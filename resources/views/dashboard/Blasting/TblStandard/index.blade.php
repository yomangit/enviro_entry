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
                        <li class="breadcrumb-item"><a href="/blasting">Home</a></li>
                        <li class="breadcrumb-item active">{{$tittle}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="">
                <div class="card card-primary card-outline">
                    <div class="card-header p-0 ">

                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible form-inline m-2">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                            {{ session('success') }}
                        </div>
                        @endif
                        <a href="/blasting/tablestandard/create" class="btn bg-gradient-secondary btn-xs ml-2 my-2"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                        <a href="/export/blasting/standart" class="btn  bg-gradient-secondary btn-xs my-2" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                        <a href="#" class="btn  bg-gradient-secondary btn-xs my-2" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                            <i class="fas fa-upload mr-1"></i>Excel
                        </a>
                        <div class=" card-tools p-1 m-2 mr-2 form-inline">
                            <form action="/blasting/tablestandard">
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

                    </div>
                    <div class="card-body">
                        <section class="content ">
                            <table role="grid" id="example2" class="table table-bordered table-hover ">
                                <thead style=" color:#005245">
                                    <tr class="text-center" style="font-size: 12px">
                                        <th>No</th>
                                        <th>CI</th>
                                        <th>Frequency</th>
                                        <th>Peak Particle Velocity Standard</th>
                                        <th>kualitas Bangunan</th>
                                        <th>Noise Level Standard</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    @php
                                    $no = 1 + ($TableStandard->currentPage() - 1) * $TableStandard->perPage();
                                    @endphp
                                    @foreach ($TableStandard as $table)
                                    <tr style="font-size: 12px">
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $table->ci }}</td>
                                        <td>{{ $table->frequency }}</td>
                                        <td>{{ $table->ppv }}</td>
                                        <td>{{ $table->kualitas_bangunan }}</td>
                                        <td>{{$table->noise_level}}</td>
                                        <td>

                                            <a href="/blasting/tablestandard/{{ $table->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <form action="/blasting/tablestandard/{{ $table->id }}" method="POST" class="d-inline">
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
                        </section>
                    </div>
                    <div class="card-footer p-0">
                        <div class="card-tools mt-2 form-inline">
                            <div class="col-4">
                                <div class="d-flex justify-content-start">
                                    <p>Showing {{ $TableStandard    ->firstItem() }} to {{$TableStandard ->lastItem() }} of {{ $TableStandard  ->total() }}</p>
                                </div>
                            </div>
                            <div class="col-8 d-flex justify-content-end">
                                <div class=" pagination pagination-sm">
                                    {{ $TableStandard   ->links() }}
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
                                <form action="/import/blasting/standart" method="POST" enctype="multipart/form-data">
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