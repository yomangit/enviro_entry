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
                        <li class="breadcrumb-item"><a href="/hydrometric/wlvp">Home</a></li>
                        <li class="breadcrumb-item active">{{$tittle}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">

            <div class="card card-primary card-outline">
                <div class="card-header p-1">

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
                    <a href="/hydrometric/wlvp/qualitystandard/create" class="btn bg-gradient-secondary btn-xs "><i class="fas fa-plus mr-1 "></i>Add Data</a>
                    <a href="/export/standardhydro" class="btn  bg-gradient-secondary btn-xs " data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                    <a href="#" class="btn  bg-gradient-secondary btn-xs " data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                        <i class="fas fa-upload mr-1"></i>Excel
                    </a>
                    <div class="card-tools row m-1">
                        <form action="/hydrometric/wlvp/qualitystandard">
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
                @if($QualityStandard->count())


                <div class="card-body table-responsive">
                    <table role="grid" id="example2" class="table table-sm table-bordered table-hover ">
                        <thead style=" color:#005245">
                            <tr class="text-center" style="font-size: 12px">
                                <th>No</th>
                                <th>Action</th>
                                <th>TSS</th>
                                <th>PH Max</th>
                                <th>PH Min</th>
                                <th>DO</th>
                                <th>Redox</th>
                                <th>Conductivity</th>
                                <th>Temperatur</th>

                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            @php
                            $no = 1 + ($QualityStandard->currentPage() - 1) * $QualityStandard->perPage();
                            @endphp
                            @foreach ($QualityStandard as $point_id)
                            <tr style="font-size: 12px">
                                <td>{{ $no++ }}</td>
                                <td>

                                    <a href="/hydrometric/wlvp/qualitystandard/{{ $point_id->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="/hydrometric/wlvp/qualitystandard/{{ $point_id->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $point_id->tss }}</td>
                                <td>{{ $point_id->ph_max }}</td>
                                <td>{{ $point_id->ph_min }}</td>
                                <td>{{ $point_id->do }}</td>
                                <td>{{ $point_id->redox }}</td>
                                <td>{{ $point_id->tds }}</td>
                                <td>{{ $point_id->temperatur }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <div class="card-footer">
                    <div class="card-tools row form-inline">
                        <div class="col-4">
                            <div class="d-flex justify-content-start">
                                <small>Showing {{ $QualityStandard->firstItem() }} to {{$QualityStandard->lastItem() }} of {{ $QualityStandard->total() }}
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
                            <form action="/import/standardhydro" method="POST" enctype="multipart/form-data">
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

        </div><!-- /.container-fluid -->
    </section>
</div>
@section('footer')
<script>
    $(function() {
        $('#reservationdate1').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#reservationdate2').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() {
            myDropzone.enqueueFile(file)
        }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
</script>
@endsection

@endsection