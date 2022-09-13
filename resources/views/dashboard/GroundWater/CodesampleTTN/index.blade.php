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
                        <li class="breadcrumb-item"><a href="/groundwater/masterttn">Home</a></li>
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
                        @if (session()->has('failures'))
                        <div class="alert alert-danger alert-dismissible form-inline m-2">
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
                        <a href="/groundwater/masterttn/codesamplettn/create" class="btn bg-gradient-secondary btn-xs ml-2 my-1"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                        <a href="/exportcodesamplettn" class="btn  bg-gradient-secondary btn-xs my-1" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                        <a href="#" class="btn  bg-gradient-secondary btn-xs my-1" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                            <i class="fas fa-upload mr-1"></i>Excel
                        </a>
                        <div class="card-tools row p-2 mr-1 form-inline">
                            <form action="/groundwater/masterttn/codesamplettn">
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
                    <div class="card-body table-responsive ">
                        <section class="content ">
                            <table role="grid" id="example2" class="table table-bordered table-hover ">
                                <thead style=" color:#005245">
                                    <tr class="text-center" style="font-size: 12px">
                                        <th>No</th>
                                       
                                        <th>Name</th>
                                        <th>Lokasi</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    @php
                                    $no = 1 + ($Codes->currentPage() - 1) * $Codes->perPage();
                                    @endphp
                                    @foreach ($Codes as $code)
                                    <tr style="font-size: 12px">
                                        <td>{{ $no++ }}</td>
                                       

                                        <td>{{ $code->nama }}</td>
                                        <td>{{ $code->lokasi }}</td>
                                        <td>
                                                <a href="/groundwater/masterttn/codesamplettn/{{ $code->failed_at }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <form action="/groundwater/masterttn/codesamplettn/{{ $code->failed_at }}" method="POST" class="d-inline">
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
                    <div class="card-footer p-0 ">
                        <div class="row ">
                            <div class="col-6 col-md-4 form-inline ">

                                <h6 class="ml-2 mt-2 p-0">Showing {{ $Codes->firstItem() }} to
                                    {{ $Codes->lastItem() }} of {{ $Codes->total() }}
                                </h6>

                            </div>
                            <div class="col-8  form-inline d-flex justify-content-end pagination pagination-sm">
                                <div class="mt-3 mr-2 p-0"> {{ $Codes->links() }}</div>

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
                                <form action="/importcodesamplettn" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="custom-file">
                                            <input type="file" name="file" class="custom-file-input" required id="exampleInputFile">
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