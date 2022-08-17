@extends('layout.main')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
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
                        <section class="content ">

                            <div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header ">
                                        @if($LocationBiota->count() && $Biotum->count())
                                        @can('admin')
                                            <a href="/dashboard/monitoring/freshwater/master/create" class="btn bg-gradient-secondary btn-xs mt-2"><i class="fas fa-plus mr-1"></i>Add Data</a>
                                            <a href="/exportfreshwater" class="btn  bg-gradient-secondary btn-xs mt-2" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                                            <a href="#" class="btn  bg-gradient-secondary btn-xs mt-2" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default">
                                                <i class="fas fa-upload mr-1"></i>Excel
                                            </a>
                                            @endcan
                                            <div class="card-tools">
                                                <div class="card-tools row">
                                                    <form action="/auth/biotasampling/freshwater" class="form-inline">
                                                        <!-- <label for="fromDate" class="mr-2">From</label> -->
                                                        <div class="input-group date mr-2" id="reservationdate4" style="width: 85px;" data-target-input="nearest">
                                                            <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                                                        </div>
                                                        <!-- <label for="fromDate" class="mr-2 ml-2">To</label>
    
                                                            <div class="input-group date mr-2" id="reservationdate" style="width: 85px;" data-target-input="nearest">
                                                                <input type="text" name="toDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate" data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                                                            </div> -->

                                                        <div style="width: 118px;" class="input-group mr-1">
                                                            <select class="form-control form-control-sm " name="search">
                                                                <option value="" selected>Biota</option>
                                                                @foreach ($Biotum as $biota)
                                                                @if ( request('search')==$biota->nama)
                                                                <option value="{{($biota->nama)}}" selected>{{$biota->nama}}</option>
                                                                @else
                                                                <option value="{{$biota->nama}}">{{$biota->nama}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div style="width: 118px;" class="input-group mr-1">
                                                            <select class="form-control form-control-sm " name="location">
                                                                <option value="" selected>Location</option>
                                                                @foreach ($LocationBiota as $location)
                                                                @if ( request('location')==$location->nama)
                                                                <option value="{{($location->nama)}}" selected>{{$location->nama}}</option>
                                                                @else
                                                                <option value="{{$location->nama}}">{{$location->nama}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mr-2">
                                                            <button type="submit" class="btn bg-gradient-dark btn-xs">filter</button>
                                                        </div>
                                                    </form>
                                                    <form action="/auth/biotasampling/freshwater">
                                                        <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                                                    </form>
                                                </div>
                                            </div>
                                            @else
                                            <div class="alert alert-info alert-dismissible form-inline">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h5 class="mr-2"><i class="icon fas fa-info"></i>Info</h5>
                                               <b> You must enter  location of biota and biota first </b>
                                            </div>
                                            @endif
                                        </div>
                                        <!-- /.card-header -->
                                        @if ($Freshwaters->count())
                                        <div class="card-body table-responsive ">
                                            <table role="grid" class="table table-bordered table-sm table-head-fixed ">
                                                <thead style=" color:#005245">
                                                    <tr class="text-center" style="font-size: 12px">
                                                        <th>No</th>
                                                       @can('admin') <th>Action</th>@endcan
                                                        <th>Location</th>
                                                        <th>Biota</th>
                                                        <th>Date</th>
                                                        <th>Taxa Richness</th>
                                                        <th>Species Density (cell/m3)</th>

                                                        <th>Diversity Index</th>
                                                        <th>Evenness Value</th>
                                                        <th>Dominance Index</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no = 1 + ($Freshwaters->currentPage() - 1) * $Freshwaters->perPage();
                                                    @endphp
                                                    @foreach ($Freshwaters as $freshwater)
                                                    <tr class="text-center" style="font-size: 12px">

                                                        <td>{{ $no++ }}</td>
                                                        @can('admin')<td>
                                                            <div style="width: 50px">

                                                                {{-- <a href="/dashboard/monitoring/freshwater/master/{{ $freshwater->created_at }}" class="btn btn btn-outline-primary btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Detail">
                                                                <i class="far fa-eye"></i>
                                                                </a> --}}
                                                                <a href="/dashboard/monitoring/freshwater/master/{{ $freshwater->created_at }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <i class="fas fa-pen"></i>
                                                                </a>
                                                                <form action="/dashboard/monitoring/freshwater/master/{{ $freshwater->created_at }}" method="POST" class="d-inline">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>

                                                            </div>
                                                        </td>@endcan
                                                        @if($freshwater->locationBiota->nama && $freshwater->Biota->nama == null)
                                                        <div class="alert alert-success alert-dismissible form-inline">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <h5 class="mr-2"><i class="icon fas fa-check"></i> Fail</h5>
                                                            the locations and biota have not been entered
                                                        </div>
                                                        @else
                                                        
                                                        <td>{{ $freshwater->locationBiota->nama }}</td>
                                                        <td>{{ $freshwater->Biota->nama }}</td>
                                                        <td>{{ date('d-m-Y', strtotime( $freshwater->date)) }}</td>
                                                        <td>{{ $freshwater->taxa_richness }}</td>
                                                        <td>{{ $freshwater->species_density }}</td>
                                                        <td>{{ $freshwater->diversity_index }}</td>
                                                        <td>{{ $freshwater->evenness_value }}</td>
                                                        <td>{{ $freshwater->dominance_index }}</td>
                                                        @endif

                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="card-footer">
                                            <div class="card-tools row form-inline">
                                                <div class="col-4">
                                                    <div class="d-flex justify-content-start">
                                                        <small>Showing {{ $Freshwaters->firstItem() }} to
                                                            {{ $Freshwaters->lastItem() }} of {{ $Freshwaters->total() }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="d-flex justify-content-end">
                                                        {{ $Freshwaters->links() }}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

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
                                                    <form action="/importfreshwater" method="POST" enctype="multipart/form-data">
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
                        <figure class="highcharts-figure">
                            <div class="invoice p-3 mb-3" id="container"></div>
                        </figure>
                       
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
@if ($Freshwaters->count())
<script>
   Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text:{!! json_encode($freshwater->Biota->nama) !!}
    },
    subtitle: {
        text: 'Location :  {!!json_encode($freshwater->locationBiota->nama)!!} '
    },
    xAxis: {
        categories:{!! json_encode($date) !!},  
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Value'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Taxa Richness',
        data: {!! json_encode($taxa_richness) !!}

    }, {
        name: 'Species Density',
        data: {!! json_encode($species_density) !!}

    }, {
        name: 'Diversity Index',
        data: {!! json_encode($diversity_index) !!}

    }, {
        name: 'Evenness Value',
        data: {!! json_encode($evenness_value) !!}

    }, {
        name: 'Dominance Index',
        data: {!! json_encode($dominance_index) !!}

    }]
});
</script>
@endif
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
