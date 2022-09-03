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
                        <li class="breadcrumb-item"><a href="/surfacewater/drinkwater">Home</a></li>
                        <li class="breadcrumb-item active">{{$tittle}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">

            <div class="card card-primary card-outline">
                <div class="card-header p-0 ">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline  m-3">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session()->has('failures'))
                    <div class="alert alert-danger alert-dismissible form-inline  m-3">
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
                    <div class="card-tools row p-2 mr-1 form-inline">
                        <form action="/surfacewater/drinkwater/pointid">
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
                    <a href="/surfacewater/drinkwater/pointid/create" class="btn bg-gradient-secondary btn-xs ml-2 my-2"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                    <a href="/export/drinkwater/pointid" class="btn  bg-gradient-secondary btn-xs my-2" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                    <a href="#" class="btn  bg-gradient-secondary btn-xs my-2" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                        <i class="fas fa-upload mr-1"></i>Excel
                    </a>
                </div>

                <div class="card-body table-responsive">
                    <section class="content mt-2">
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
                                $no = 1 + ($PointID->currentPage() - 1) * $PointID->perPage();
                                @endphp
                                @foreach ($PointID as $code)
                                <tr style="font-size: 12px">
                                    <td>{{ $no++ }}</td>
                                    <td>

                                        {{-- <a href="/surfacewater/drinkwater/pointid/{{ $code->failed_at }}"
                                        class="btn btn btn-outline-primary btn-xs btn-group"
                                        data-toggle="tooltip"
                                        data-placement="top" title="Detail">
                                        <i class="far fa-eye"></i>
                                        </a> --}}
                                        <a href="/surfacewater/drinkwater/pointid/{{ $code->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="/surfacewater/drinkwater/pointid/{{ $code->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>


                                    </td>

                                    <td>{{ $code->nama }}</td>
                                    <td>{{ $code->lokasi }}</td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </section>
                </div>
                <div class="card-footer p-0 ">
                    <div class="row ">
                        <div class="col-6 col-md-4 form-inline ">

                            <h6 class="ml-2 mt-1 p-0">Showing {{ $PointID->firstItem() }} to
                                {{ $PointID->lastItem() }} of {{ $PointID->total() }}
                            </h6>

                        </div>
                        <div class="col-8  form-inline d-flex justify-content-end pagination pagination-sm">
                            <div class="mt-3 mr-2 p-0"> {{ $PointID->links() }}</div>

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
                            <form action="/import/drinkwater/pointid" method="POST" enctype="multipart/form-data">
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