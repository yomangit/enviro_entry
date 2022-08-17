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
                                @elseif (session()->has('fail'))
                                <div class="alert alert-danger alert-dismissible form-inline">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <h5 class="mr-2"><i class="icon fas fa-ban"></i>Fail</h5>
                                    {{ session('fail') }}
                                </div>
                        
                            @endif
                            @can('admin')
                            <a href="/dashboard/groundwater/masterttn/codesamplettn"
                            class="btn bg-gradient-info btn-xs ml-5 mt-3">Code Sample</a>@endcan
                        </div>
                        <div class="card-body">
                            <section class="content mt-2">
                                <div>
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header ">
                                                @if($code_units->count())
                                                @can('admin')
                                                <a href="/dashboard/groundwater/masterttn/create"class="btn bg-gradient-secondary btn-xs mt-2"><i class="fas fa-plus mr-1"></i>Add Data</a>
                                                <a href="/exportmasterttn" class="btn  bg-gradient-secondary btn-xs mt-2" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                                                <a href="#" class="btn  bg-gradient-secondary btn-xs mt-2" data-toggle="modal"data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                                    <i class="fas fa-upload mr-1"></i>Excel
                                                </a>@endcan
                                                <div class="card-tools">
                                                    <div class="card-tools row">
                                                        <form action="/auth/groundwater/ttn" class="form-inline">
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
                                                        <form action="/auth/groundwater/ttn">
                                                            <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="alert alert-info alert-dismissible form-inline">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×</button>
                                                    <h5 class="mr-2"><i class="icon fas fa-info"></i>Info</h5>
                                                    <b>You must enter code sample first!!</b>
                                                </div>
                                                @endif
                                            </div>
                                            <!-- /.card-header -->
                                            @if ($Master->count())
                                            <div class="card-body table-responsive ">
                                                <table role="grid" id="example2" class="table table-bordered table-hover table-sm">
                                                    <thead style=" color:#005245">
                                                        <tr class="text-center" style="font-size: 12px">
                                                            <th>No</th>
                                                           @can('admin') <th>Action</th>@endcan
                                                            <th>Code Sample</th>
                                                            <th><div style="width: 65px">Date</div></th>
                                                            <th>Start Time Sampling</th>
                                                            <th>Finish Time Sampling</th>
                                                            <th>Well</th>
                                                            <th>Well Water</th>
                                                            
                                                            <th>H</th>
                                                            <th>Diameter of the pipe (m)
                                                            </th>
                                                            <th>TT</th>
                                                            <th>r<sup>2</sup></th>
                                                            <th>Water Volumes (L)</th>
                                                            <th>Temperatur</th>
                                                            <th>pH</th>
                                                            <th>Conductivity (Us/cm)</th>
                                                            <th>TDS</th>
                                                            <th>Redox</th>
                                                            <th>Dissolved Oxigen (DO)</th>
                                                            <th>Salinity</th>
                                                            <th>Turbidity</th>
                                                            <th>water Color</th>
                                                            <th>Odor</th>
                                                            <th>Rain Before Sampling</th>
                                                            <th>Rain During Sampling</th>
                                                            <th>Oil Layer</th>
                                                            <th>Sorce of Pollution</th>
                                                            <th>Sampler</th>
                                                            <th>Hard Copy</th>
                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody style="text-align: center">
                                                        @php
                                                        $no = 1 + ($Master->currentPage() - 1) * $Master->perPage();
                                                        @endphp
                                                        @foreach ($Master as $data)
                                                        <tr style="font-size: 12px">
                                                            <td>{{ $no++ }}</td>
                                                           @can('admin') <td>
                                                                <div style="width: 50px">
    
                                                                    {{-- <a href="/dashboard/groundwater/mastergw/{{ $data->failed_at }}" class="btn btn btn-outline-primary btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Detail">
                                                                        <i class="far fa-eye"></i>
                                                                    </a> --}}
                                                                    <a href="/dashboard/groundwater/masterttn/{{ $data->failed_at }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                        <i class="fas fa-pen"></i>
                                                                    </a>
                                                                    <form action="/dashboard/groundwater/masterttn/{{ $data->failed_at }}" method="POST" class="d-inline">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
    
                                                                </div>
                                                            </td>@endcan
                                                            <td>{{ $data->CodeSampleTTN->nama }}</td>
                                                            <td>{{ date('d-m-Y',strtotime($data->date)) }}</td>
                                                            <td>{{ $data->start_time }}</td>
                                                            <td>{{ $data->stop_time }}</td>
                                                            <td>{{ $data->well }}</td>
                                                            <td>{{ $data->well_water }}</td>
                                                            <td>{{ $data->h }}</td>
                                                            <td>{{ $data->d_pipe }}</td>
                                                            <td>{{ $data->tt }}</td>
                                                            <td>{{ $data->r }}</td>
                                                            <td>{{ $data->water_volume }}</td>
                                                            <td>{{ $data->temperatur }}</td>
                                                            <td>{{ $data->ph }}</td>
                                                            <td>{{ $data->conductivity }}</td>
                                                            <td>{{ $data->tds }}</td>
                                                            <td>{{ $data->redox }}</td>
                                                            <td>{{ $data->do }}</td>
                                                            <td>{{ $data->salinity }}</td>
                                                            <td>{{ $data->turbidity }}</td>
                                                            <td>{{ $data->water_color }}</td>
                                                            <td>{{ $data->odor }}</td>
                                                            <td>{{ $data->rain }}</td>
                                                            <td>{{ $data->rain_during_sampling }}</td>
                                                            <td>{{ $data->oil_layer }}</td>
                                                            <td>{{ $data->source_pollution }}</td>
                                                            <td>{{ $data->sampler }}</td>
                                                            <td> <a href="/{{ $data->hard_copy }}">
                                                                    @if ($data->hard_copy)
                                                                    <img class="img-fluid" src="{{ asset('storage/' . $data->hard_copy) }}" style="width: 40px; height: 24px;">
                                                                    @endif
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
    
                                                    </tbody>
                                                </table>
                                            </div>
    
                                            <div class="card-footer">
                                                <div class="card-tools row form-inline">
                                                    <div class="col-4">
                                                        <div class="d-flex justify-content-start">
                                                            <small>Showing {{ $Master->firstItem() }} to
                                                                {{ $Master->lastItem() }} of {{ $Master->total() }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="d-flex justify-content-end">
                                                            {{ $Master->links() }}
                                                        </div>
                                                    </div>
                                                </div>
    
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <figure class="highcharts-figure">
                                                        <div class="invoice p-3 mb-3" id="container"></div>
                                                    </figure>
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
                                                        <form action="/importmasterttn" method="POST" enctype="multipart/form-data">
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
<script>
        Highcharts.chart('container', {
        chart: {
            type: 'spline'
        },
        title: {
            text: 'Monthly Average Temperature'
        },
      
        xAxis: {
            categories: {!!json_encode($date)!!}
        },
        yAxis: {
            title: {
                text: 'Value'
            },
            
        },
        tooltip: {
            crosshairs: true,
            shared: true
        },
        plotOptions: {
            spline: {
                marker: {
                    radius: 4,
                    lineColor: '#F4CC70',
                    lineWidth: 1
                }
            }
        },
        series: [{
            name: 'Temperature',
            marker: {
                symbol: 'square'
            },
            color:'#1F2833',
            data:{!!json_encode($suhu)!!}

        }, {
                name: 'PH',
                color:'#6AB187',
                marker: {
                    symbol: 'triangle-down'
                },
                data: {!! json_encode($ph) !!}
            }]
        });
</script>
@endsection
