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
                        <li class="breadcrumb-item"><a href="/dashboard/groundwater/mastergw">Home</a></li>
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
                                                {{-- <form action="/dashboard/codesample" class="form-inline">
                                                    <label for="fromDate" class="mr-2">From</label>
                                                    <div class="input-group date" id="reservationdate1"
                                                        style="width: 85px;" data-target-input="nearest">
                                                        <input type="text" name="fromDate" placeholder="Date"
                                                            class="form-control datetimepicker-input form-control-sm "
                                                            data-target="#reservationdate1" data-toggle="datetimepicker"
                                                            value="{{ request('fromDate') }}" />
                                                    </div>
                                                    <label for="fromDate" class="mr-2 ml-2">To</label>

                                                    <div class="input-group date mr-1" id="reservationdate2"
                                                        style="width: 85px;" data-target-input="nearest">
                                                        <input type="text" name="toDate" placeholder="Date"
                                                            class="form-control datetimepicker-input form-control-sm"
                                                            data-target="#reservationdate2" data-toggle="datetimepicker"
                                                            value="{{ request('toDate') }}" />
                                                    </div>
                                                    <div class="mr-2">
                                                        <button type="submit"
                                                            class="btn bg-gradient-dark btn-xs">filter</button>
                                                    </div>
                                                </form>
                                                <form action="/dashboard/codesample">
                                                    <button type="submit"
                                                        class="btn bg-gradient-dark btn-xs">refresh</button>
                                                </form> --}}

                                                <form action="/dashboard/codesample">
                                                    <div class="input-group input-group-sm" style="width: 150px;">
                                                        <input type="text" name="search"
                                                            class="form-control float-right" placeholder="Search"
                                                            value="{{ request('search') }}">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-default">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <a href="/dashboard/groundwater/mastergw/codesamplegw/create"
                                                class="btn bg-gradient-secondary btn-xs mt-2"><i
                                                    class="fas fa-plus mr-1 mt"></i>Add Data</a>
                                            <a href="/exportcodesamplegw" class="btn  bg-gradient-secondary btn-xs mt-2"
                                                data-toggle="tooltip" data-placement="top" title="download"><i
                                                    class="fas fa-download mr-1"></i>Excel</a>
                                            <a href="#" class="btn  bg-gradient-secondary btn-xs mt-2" data-toggle="modal"
                                                data-toggle="tooltip" data-placement="top" title="Upload"
                                                data-target="#modal-default">
                                                <i class="fas fa-upload mr-1"></i>Excel
                                            </a>
                                        </div>
                                        <!-- /.card-header -->
                                        @if ($Codes->count())
                                        <div class="card-body table-responsive ">
                                            <table role="grid" id="example2" class="table table-bordered table-hover ">
                                                <thead style=" color:#005245">
                                                    <tr class="text-center" style="font-size: 12px">
                                                        <th>No</th>
                                                        <th>Action</th>
                                                        <th>Name</th>
                                                        <th>Lokasi</th>
                                                        <th>Total Well Depth</th>
                                                        <th>Casing Above GL(m)</th>
                                                        <th>Ground Level RL</th>

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



                                                            <a href="/dashboard/groundwater/mastergw/codesamplegw/{{ $code->failed_at }}/edit"
                                                                class="btn btn-outline-warning btn-xs btn-group"
                                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                            <form
                                                                action="/dashboard/groundwater/mastergw/codesamplegw/{{ $code->failed_at }}"
                                                                method="POST" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button
                                                                    class="btn btn btn-outline-danger btn-xs btn-group"
                                                                    onclick="return confirm('are you sure?')"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Delete">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>


                                                        </td>

                                                        <td>{{ $code->nama }}</td>
                                                        <td>{{ $code->lokasi }}</td>
                                                        <td>{{$code->total}}</td>
                                                        <td>{{$code->gl}}</td>
                                                        <td>{{$code->rl}}</td>

                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="card-footer">
                                            <div class="card-tools row form-inline">
                                                <div class="col-4">
                                                    <div class="d-flex justify-content-start">
                                                        <small>Showing {{ $Codes->firstItem() }} to {{
                                                            $Codes->lastItem() }} of {{ $Codes->total() }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="d-flex justify-content-end">
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
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/importcodesamplegw" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="custom-file">
                                                                <input type="file" name="file" class="custom-file-input"
                                                                    id="exampleInputFile">
                                                                <label class="custom-file-label"
                                                                    for="exampleInputFile">Choose file</label>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Import</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                    </div>

                                    <!-- /.card -->
                                </div>
                            </div>
                            <!-- /.container-fluid -->
                        </section>
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
        thumbnailWidth: 80
        , thumbnailHeight: 80
        , parallelUploads: 20
        , previewTemplate: previewTemplate
        , autoQueue: false, // Make sure the files aren't queued until manually added
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