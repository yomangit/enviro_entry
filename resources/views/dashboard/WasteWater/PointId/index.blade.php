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
                        <li class="breadcrumb-item active">Code Sample</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            
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
                        <div class="card-tools p-2 mr-2">

                            <form action="/wastewater/wastewaterpointid">
                                <div class="input-group input-group-sm" style="width: 180px;">
                                    <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <a href="/wastewater/wastewaterpointid/create" class="btn bg-gradient-secondary btn-xs  ml-2"><i class="fas fa-plus mr-1 "></i>Add Data</a>
                        <a href="/export/wastewaterpointid" class="btn  bg-gradient-secondary btn-xs  ml-2" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                        <a href="#" class="btn  bg-gradient-secondary btn-xs  ml-2" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                            <i class="fas fa-upload mr-1"></i>Excel
                        </a>
                    </div>
                    @if ($Codes->count())
                    <div class="card-body">
                        <section class="content ">
                            <table role="grid" id="example2" class="table table-bordered table-hover ">
                                <thead style=" color:#005245">
                                    <tr class="text-center" style="font-size: 12px">
                                        <th>No</th>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Lokasi</th>


                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    @php
                                    $no = 1 + ($Codes->currentPage() - 1) * $Codes->perPage();
                                    @endphp
                                    @foreach ($Codes as $code)
                                    <tr style="font-size: 12px">
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            <div style="">
                                                <a href="/wastewater/wastewaterpointid/{{ $code->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <form action="/wastewater/wastewaterpointid/{{ $code->id }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>

                                        <td>{{ $code->nama }}</td>
                                        <td>{{ $code->lokasi }}</td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </section>
                    </div>
                    <div class="card-footer">
                        <div class="card-tools  form-inline">
                            <div class="col-4">
                                <div class="d-flex justify-content-start">
                                    <p>Showing {{ $Codes->firstItem() }} to {{$Codes->lastItem() }} of {{ $Codes->total() }}</p>
                                </div>
                            </div>
                            <div class="col-8 d-flex justify-content-end">
                                <div class=" pagination pagination-sm">
                                    {{ $Codes->links() }}
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
                                <form action="/import/wastewaterpointid" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="custom-file">
                                            <input type="file" name="file" class="custom-file-input" id="exampleInputFile" required>
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
            
        </div><!-- /.container-fluid -->
    </section>
</div>

@endsection