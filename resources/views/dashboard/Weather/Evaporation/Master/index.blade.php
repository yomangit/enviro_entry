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

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">

            <div class="card card-primary card-outline">
                <div class="card-header p-0">
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
                    @can('admin')
                    <a href="/weather/evaporation/evaporationpointid" class="btn bg-gradient-info btn-xs my-1 ml-2 ">Point ID</a>
                    @endcan
                    <div class=" card-tools p-1 mr-2 form-inline">
                        <form action="/weather/evaporation" class="form-inline" autocomplete="off">
                            <div class="input-group date" id="reservationdate4" style="width: 85px;" data-target-input="nearest">
                                <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                            </div>
                            <span class="input-group-text form-control-sm ">To</span>

                            <div class="input-group date mr-2" id="reservationdate5" style="width: 85px;" data-target-input="nearest">
                                <input type="text" name="toDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate5" data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                            </div>
                            <div class="input-group date mr-2" id="reservationdate6" style="width: 85px;" data-target-input="nearest">
                                <input type="text" name="bulan" placeholder="Month" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate6" data-toggle="datetimepicker" value="{{ request('bulan') }}" />
                            </div>

                            <div class="input-group mr-1" style="width: 90px;">
                                <select class="form-control form-control-sm " name="search">
                                    <option value="" selected disabled>Point ID</option>
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
                        <form class="form-inline" action="/weather/evaporation">
                            <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                        </form>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <section class="content ">

                        @can('admin')
                        <div class="col-6 col-md-4 mb-2 form-inline">
                            <a href="/weather/evaporation/create" class="btn bg-gradient-secondary btn-xs  form-inline   ml-2"><i class="fas fa-plus mr-1 "></i>Add Data</a>
                            <a href="/export/evaporation" class="btn  bg-gradient-secondary btn-xs  form-inline   ml-2" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                            <a href="#" class="btn  bg-gradient-secondary btn-xs  form-inline   ml-2" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                <i class="fas fa-upload mr-1"></i>Excel
                            </a>
                        </div>
                        @endcan


                        <div class="table-responsive card card-primary card-outline">
                            <table role="grid" class="table table-striped table-bordered dt-responsive nowrap table-sm ">
                                <thead class="table-info">
                                    <tr class="text-center" style="font-size: 12px">
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Point Id</th>
                                        <th>Time Observation</th>
                                        <th>Day Rainfall (X) mm</th>
                                        <th>Initial Water Elevation(Po)</th>
                                        <th>Final Water Elevation (P1)</th>
                                        <th>Evaporasi (Eo)=(Po-P1)+X mm</th>
                                        <th>Evaporation</th>
                                        <th>Volume water added</th>
                                        <th>Initial Volume (V1)</th>
                                        <th>Final Volume (V2)</th>
                                        <th>V1-V2</th>
                                        @can('admin')
                                        <th>Action</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    @php
                                    $no = 1 + ($Evaporation->currentPage() - 1) * $Evaporation->perPage();

                                    $evaporation=0;$volume=0;$initial_v1=0;$final_v2=0;
                                    @endphp
                                    @foreach ($Evaporation as $code)

                                    <tr class="text-center " style="font-size: 12px">
                                        <td>{{ $no++ }}</td>
                                        <td style="width: 100px">{{ date('d-M-Y', strtotime( $code->date)) }}</td>
                                        <td>{{ $code->PointId->nama }}</td>
                                        <td>{{ $code->time_observation }}</td>
                                        <td>{{ $code->day_rainfall }}</td>
                                        <td>{{ $code->initial_water_elevation }}</td>
                                        <td>{{ $code->final_water_elevation }}</td>
                                        <td>{{$evaporation= $code->initial_water_elevation - $code->final_water_elevation + $code->day_rainfall}}</td>
                                        @php
                                        $null=0;
                                        if ($evaporation>0) {$evaporation;}
<<<<<<< HEAD
                                        elseif ($evaporation<0) {$evaporation=0; } @endphp <td>{{$evaporation}}</td>
=======
                                        elseif ($evaporation<0)
                                         {$evaporation=0; } @endphp <td>{{$evaporation}}</td>
>>>>>>> d0a6326defbeba8c21bdbfff3da64407ba3b31e3
                                            <td>{{ $code->initial_water_elevation - $code->final_water_elevation }}</td>
                                            <td>{{ number_format($initial_v1= 3.14*60*60* doubleval($code->initial_water_elevation)) }}</td>
                                            <td>{{number_format($final_v2= 3.14*60*60* doubleval($code->final_water_elevation)) }}</td>
                                            <td>{{ number_format(abs($final_v2 -$initial_v1))}}</td>
                                            @can('admin')
                                            <td>
                                                <div style="width: 60px">
                                                    <a href="/weather/evaporation/{{ $code->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <form action="/weather/evaporation/{{ $code->id }}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                            @endcan
                                    </tr>
<<<<<<< HEAD

                                    @endforeach
                                    <tr>
=======
                                   
                                    @endforeach
                                    <tr>
                                    @php $ass= max(array($evaporation)) @endphp
>>>>>>> d0a6326defbeba8c21bdbfff3da64407ba3b31e3
                                        <th class="text-center " colspan="7">Maximum Evaporation</th>
                                        <th class="text-center " colspan="7">{{$max_evaporation}}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center " colspan="7">Minimum Evaporation</th>

                                        <th class="text-center " colspan="7">{{$min_evaporation}}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center " colspan="7">Average Evaporation</th>
                                        <th class="text-center " colspan="7">{{$avg_evaporation}}</th>
                                    </tr>
                            </table>
                        </div>


                    </section>
                </div>
                <div class="card-footer">
                    <div class=" form-inline">
                        <div class="col-4">
                            <div class="d-flex justify-content-start">
                                <p>Showing {{ $Evaporation->firstItem() }} to {{$Evaporation->lastItem() }} of {{ $Evaporation->total() }}</p>
                            </div>
                        </div>
                        <div class="col-8 d-flex justify-content-end">
                            <div class=" pagination pagination-sm">
                                {{ $Evaporation->links() }}
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
                            <form action="/import/evaporation" method="POST" enctype="multipart/form-data">
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
<script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()
    
                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })
    
                //Datemask dd-mm-yyyy
                $('#datemask').inputmask('dd-mm-yyyy', {
                    'placeholder': 'dd/mm/yyyy'
                })
                //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', {
                    'placeholder': 'mm/dd/yyyy'
                })
                //Money Euro
                $('[data-mask]').inputmask()
    
                //Date picker
             
                $('#reservationdate2').datetimepicker({
                    format: 'DD-MM-YYYY'
                }); 
                $('#reservationdate4').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
                $('#reservationdate5').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
                $('#reservationdate6').datetimepicker({
                    format: 'MM'
                });
               
                //Timepicker
                $('#timepicker').datetimepicker({
                    format: 'LT'
                })
                $('#timepicker1').datetimepicker({
                    format: 'LT'
                })
    
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
           
        </script>
@endsection