@extends('layout.main')
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
                    <div class="card card-secondrary card-tabs">
                        <div class="card-header p-0 pt-1">
                          
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible form-inline">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                                    {{ session('success') }}
                                </div>
                            @endif
                           @can('admin')
                            <a href="/dashboard/dustgauge/dust/codesampledg"
                            class="btn bg-gradient-info btn-xs ml-5 mt-3">Code Sample</a>@endcan
                        </div>
                        <div class="card-body">
                            <section class="content mt-2">

                                <div>
                                    <div class="col-12">
                                        <div class="card">
                                        @if($code_units->count())
                                            <div class="card-header">
                                                <div class="card-tools">
                                                    <div class="card-tools row">
                                                        <form action="/auth/airquality/dust" class="form-inline">
                                                            <label for="fromDate" class="mr-2">From</label>
                                                            <div class="input-group date" id="reservationdate4" style="width: 85px;" data-target-input="nearest">
                                                                <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                                                            </div>
                                                            <label for="fromDate" class="mr-2 ml-2">To</label>
    
                                                            <div class="input-group date mr-2" id="reservationdate5" style="width: 85px;" data-target-input="nearest">
                                                                <input type="text" name="toDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate5" data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                                                            </div>
    
                                                            <div style="width: 118px;" class="input-group mr-1">
                                                                <select class="form-control form-control-sm " name="search">
                                                                  <option value="" selected>Code Sample</option>
                                                                  @foreach ($code_units as $code)
                                                                    @if ( request('search')==$code->nama)
                                                                    <option value="{{($code->nama)}}"  selected>{{$code->nama}}</option>
                                                                    @else
                                                                    <option value="{{$code->nama}}" >{{$code->nama}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mr-2">
                                                                <button type="submit" class="btn bg-gradient-dark btn-xs">filter</button>
                                                            </div>
                                                        </form>
                                                        <form action="/auth/airquality/dust">
                                                            <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                @can('admin')
                                                <a href="/dashboard/dustgauge/dust/create"
                                                    class="btn bg-gradient-secondary btn-xs mt-2"><i
                                                        class="fas fa-plus mr-1 mt"></i>Add Data</a>
                                                        <a href="/exportcodesampledg" class="btn  bg-gradient-secondary btn-xs mt-2" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                                                        <a href="#" class="btn  bg-gradient-secondary btn-xs mt-2" data-toggle="modal"data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                                            <i class="fas fa-upload mr-1"></i>Excel
                                                        </a>
                                                @endcan
                                            </div>
                                        @else
                                        <div class="alert alert-info alert-dismissible form-inline">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">×</button>
                                            <h5 class="mr-2"><i class="icon fas fa-info"></i>Info</h5>
                                            <b>You must enter code sample first!!</b>
                                        </div>
                                        @endif
                                            <!-- /.card-header -->
                                            @if ($Dust->count())
                                                <div class="card-body table-responsive ">
                                                    <table role="grid" id="example2"
                                                        class="table table-bordered table-hover table-sm ">
                                                        <thead style=" color:#005245">
                                                            <tr class="text-center" style="font-size: 12px">
                                                                <th>No</th>
                                                              @can('admin')  <th>Action</th>@endcan
                                                                <th>Code Sample</th>
                                                                <th>Month </th>
                                                                <th>Date In</th>
                                                                <th>Date Out</th>         
                                                                <th>Total Days</th>
                                                                <th>M4</th>
                                                                <th>M3</th>
                                                                <th>M6</th>
                                                                <th>M5</th>
                                                                <th>Diameter of the Funnel (mm)</th>
                                                                <th>F=30</th>
                                                                <th>Total Solid Insoluble</th>
                                                                <th>Total Solid soluble
                                                                </th>
                                                                <th>Total Solid </th>
                                                                <th>Number of Insect</th>
                                                                <th>Visible of Dirt</th>
                                                                <th>Visible of Algae</th>
                                                                <th>Area Observation</th>
                                                                <th>Observer by</th>
                                                                <th>Volume Filtrat (ml)</th>
                                                                <th>Total Volume water (ml)</th>
                                                                <th>Remarks</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center">
                                                            @php
                                                            $insoluble=0;$soluble=0;
                                                            $no = 1 + ($Dust->currentPage() - 1) * $Dust->perPage();
                                                        @endphp
                                                            @foreach ($Dust as  $code)
                                                                <tr style="font-size: 12px">
                                                                    <td>{{ $no++ }}</td>
                                                                    @can('admin')
                                                                    <td>
                                                                        
                                                                            <a href="/dashboard/dustgauge/dust/{{ $code->failed_at }}/edit"
                                                                                class="btn btn-outline-warning btn-xs btn-group"
                                                                                data-toggle="tooltip"
                                                                                data-placement="top" title="Edit">
                                                                                <i class="fas fa-pen"></i>
                                                                            </a>
                                                                            <form
                                                                                action="/dashboard/dustgauge/dust/{{ $code->failed_at }}"
                                                                                method="POST"
                                                                                class="d-inline">
                                                                                @method('delete')
                                                                                @csrf
                                                                                <button
                                                                                    class="btn btn btn-outline-danger btn-xs btn-group"
                                                                                    onclick="return confirm('are you sure?')"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    title="Delete">
                                                                                    <i class="fas fa-trash"></i>
                                                                                </button>
                                                                            </form>
                                                                    </td>
                                                                    @endcan
                                                                    <td>{{ $code->codedust->nama }}</td>
                                                                    <td>{{ date('m-Y', strtotime( $code->date_out)) }}</td>

                                                                    <td>{{ date('d-m-Y', strtotime( $code->date_in)) }}</td>
                                                                    <td>{{ date('d-m-Y', strtotime( $code->date_out)) }}</td>
                                                                    <td>{{ $selisi=(strtotime($code->date_out) - strtotime($code->date_in))/86400 }}</td>
                                                                    <td>{{ $code->m4 }}</td>
                                                                    <td>{{ $code->m3 }}</td>
                                                                    <td>{{ $code->m6 }}</td>
                                                                    <td>{{ $code->m5 }}</td>
                                                                    <td>150</td>
                                                                    <td>30</td>
                                                                    @if ($code->m4 ==='-' && $code->m3==='-')
                                                                    <td>-</td>
                                                                    @elseif($code->m6 ==='-' && $code->m5==='-')
                                                                    <td>{{ $insoluble= (round((doubleval($code->m4) - doubleval($code->m3))*1000000*4*30/(3.14*150*150*$selisi),2)) }}</td>
                                                                    @elseif($code->m4 !='-' && $code->m3!='-' && $code->m6 !='-' && $code->m5!='-') 
                                                                    <td>{{ $insoluble= (round((doubleval($code->m4) - doubleval($code->m3))/(3.14*0.005625*$selisi),2)) }}</td>
                                                                   
                                                                    @endif
                                                                    @if($code->m6 ==='-' && $code->m5==='-')
                                                                    <td>-</td>
                                                                    @else
                                                                    <td>{{ $soluble= (round(((doubleval($code->m6) - doubleval($code->m5))* doubleval($code->total_vlm_water) )/(3.14*0.005625*$selisi*$code->volume_filtrat),2)) }}</td>
                                                                    @endif
                                                                    <td>{{$total=round(($insoluble+$soluble),3)}}</td>
                                                                 
                                                                    <td>{{ $code->no_insect }}</td>
                                                                    <td>{{ $code->vb_dirt }}</td>
                                                                    <td>{{ $code->vb_algae }}</td>
                                                                    <td>{{ $code->area_observation }}</td>
                                                                    <td>{{ $code->observer }}</td>
                                                                    <td>{{ $code->volume_filtrat }}</td>
                                                                    <td>{{ $code->total_vlm_water }}</td>
                                                                    <td>{{ $code->remarks }}</td>
                                                                 
                                                                    
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="card-footer">
                                                    <div class="card-tools row form-inline">
                                                        <div class="col-4">
                                                            <div class="d-flex justify-content-start">
                                                                <small>Showing {{ $Dust->firstItem() }} to {{ $Dust->lastItem() }} of {{ $Dust->total() }}
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="d-flex justify-content-end">
                                                                {{ $Dust->links() }}
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
                                                        <form action="/importcodesampledg" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                        <div class="modal-body">
                                                            <div class="custom-file">
                                                                <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
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
