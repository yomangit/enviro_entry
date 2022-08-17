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
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Input Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="">
                <div class="card card-secondrary card-tabs">
                    <div class="card-header p-0">

                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible form-inline">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                            {{ session('success') }}
                        </div>
                        @endif
                        @can('admin')
                        <a href="/dashboard/index/codesample" class="btn bg-gradient-info btn-xs ml-5 mt-3">Code
                            Sample</a>
                            @endcan
                    </div>
                    <div class="card-body">
                        <section class="content mt-2">

                            <div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header ">
                                        @can('admin')

                                            <a href="/dashboard/index/dataentry/create" class="btn bg-gradient-secondary btn-xs mt-2"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                                            <a href="/exportdata" class="btn  bg-gradient-secondary btn-xs mt-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-download mr-1"></i>Excel</a>
                                            <a href="#" class="btn  bg-gradient-secondary btn-xs mt-2" data-toggle="modal" data-target="#modal-default">
                                                <i class="fas fa-upload mr-1"></i>Exel
                                            </a>
                                            @endcan
                                            <div class="card-tools">
                                                <div class="card-tools row">
                                                    <form action="/auth/surfacewater" class="form-inline" autocomplete="off">
                                                        <label for="fromDate" class="mr-2">From</label>
                                                        <div class="input-group date" id="reservationdate7" style="width: 100px;" data-target-input="nearest">
                                                            <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate7" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                                                        </div>
                                                        <label for="fromDate" class="mr-2 ml-2">To</label>

                                                        <div class="input-group date mr-2" id="reservationdate8" style="width: 100px;" data-target-input="nearest">
                                                            <input type="text" name="toDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate8" data-toggle="datetimepicker" value="{{ request('toDate') }}" />
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
                                                    <form action="/auth/surfacewater">
                                                        <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                                                    </form>
                                                </div>
                                            </div>
                                     
                                        </div>
                                        <!-- /.card-header -->
                                        @if ($Input->count())
                                        <div class="card-body table-responsive ">
                                            <table role="grid" id="example2" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                                
                                                <thead style=" color:#005245">
                                                    <tr class="text-center" style="font-size: 12px">
                                                        <th>No</th>
                                                        @can('admin')
                                                        <th>Action</th>
                                                        @endcan
                                                        <th>Code Sample</th>
                                                        <th >
                                                        <div style="width: 65px"> Date</div>
                                                       </th>
                                                        <th>Start Time</th>
                                                        <th>TSS Standard</th>
                                                        <th>TSS (mg/L)</th>
                                                        <th>PH Standard Max.</th>
                                                        <th>PH Standard Min.</th>
                                                        <th>PH</th>
                                                        <th>DO Standard</th>
                                                        <th>DO</th>
                                                        <th>Redox Standard</th>
                                                        <th>Redox(mEV)</th>
                                                        <th>Conductivity Standard</th>
                                                        <th>Conductivity (uS/cm)</th>
                                                        <th>TDS Standard</th>
                                                        <th>TDS (mg/L)</th>
                                                        <th>Temperatur Standard</th>
                                                        <th>Temperatur </th>
                                                        <th>Salinity (ppt)</th>
                                                        <th>Turbidity (NTU)</th>
                                                        <th>Cyanide</th>
                                                        <th>Level GB(m)</th>
                                                        <th>Level Loger (m)</th>
                                                        <th>Debit (m<sup>3</sup>/<sub>s</sub>)</th>
                                                        <th>Debit (m<sup>3</sup>/<sub>day</sub>)</th>
                                                        <th>Water Condition</th>
                                                        <th><div style="width: 65px">water Color</div></th>
                                                        <th>Odor</th>
                                                        <th>Rain Before Sampling</th>
                                                        <th>Rain During Sampling</th>
                                                        <th>Oil Layer</th>
                                                        <th><div style="width:90px"></div>Sorce of Pollution</div></th>
                                                        <th><div style="width: 100px"> Sampler</div></th>
                                                        <!-- <th>Hard Copy</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody style="text-align: center">
                                                    @php
                                                    $no = 1 + ($Input->currentPage() - 1) * $Input->perPage();
                                                    @endphp
                                                    @foreach ($Input as $data)
                                                    <tr style="font-size: 12px">
                                                        <td>{{ $no++ }}</td>
                                                        @can('admin')
                                                        <td>
                                                            <div style="width: 80px">

                                                                <!-- <a href="/dashboard/index/dataentry/{{ $data->failed_at }}"
                                                                                class="btn btn btn-outline-primary btn-xs btn-group"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title="Detail">
                                                                                <i class="far fa-eye"></i>
                                                                            </a> -->
                                                                <a href="/dashboard/index/dataentry/{{ $data->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <i class="fas fa-pen"></i>
                                                                </a>
                                                                <form action="/dashboard/index/dataentry/{{ $data->id }}" method="POST" class="d-inline">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>

                                                            </div>
                                                        </td>
                                                        @endcan
                                                        <td>{{ $data->CodeSample->nama }}</td>
                                                        <td>{{ date('d-M-Y', strtotime( $data->date)) }}</td>
                                                        @If($data->start_time=='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                        <td>{{$data->start_time}}</td>
                                                        @endif
                                                        <td>{{ $data->standard->tss }}</td>
                                                       
                                                        @If($data->tss==='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                        <td>{{$data->tss}}</td>
                                                        @endif
                                                        <td>{{ $data->standard->ph_max }}</td>
                                                        <td>{{ $data->standard->ph_min }}</td>
                                                        @If($data->ph==='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                        <td>{{$data->ph}}</td>
                                                        @endif
                                                        <td>{{ $data->standard->do }}</td>
                                                        @If($data->do==='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                        <td>{{$data->do}}</td>
                                                        @endif
                                                        <td>{{ $data->standard->redox }}</td>
                                                        @If($data->orp==='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                        <td>{{$data->orp}}</td>
                                                        @endif
                                                        <td>{{ $data->standard->conductivity }}</td>
                                                        @If($data->conductivity==='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                        <td>{{$data->conductivity}}</td>
                                                        @endif
                                                        <td>{{ $data->standard->tds }}</td>
                                                        @If($data->tds==='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                        <td>{{$data->tds}}</td>
                                                        @endif
                                                        <td>{{ $data->standard->temperatur }}</td>
                                                        @If($data->temperatur==='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                        <td>{{ $data->temperatur }}<sup>0</sup>C
                                                        </td>
                                                        @endif
                                                      
                                                        <td>{{ $data->salinity }}</td>
                                                        <td>{{ $data->turbidity }}</td>
                                                        <td>{{ $data->cyanide }}</td>
                                                        <td>{{ $data->level }}</td>
                                                        <td>{{ $data->lvl_lgr }}</td>
                                                        <td>{{ $data->debit_s }}</td>
                                                        <td>{{ $data->debit_d }}</td>
                                                        @if($data->water_condition==='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                        <td>{{ $data->water_condition }}</td>
                                                        @endif
                                                        @if($data->water_color==='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                        <td>{{ $data->water_color }}</td>
                                                        @endif
                                                        @if($data->odor==='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                        <td>{{ $data->odor }}</td>
                                                        @endif
                                                        @if($data->rain==='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                        <td>{{ $data->rain }}</td>
                                                        @endif
                                                        @if($data->rain_during_sampling==='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                        <td>{{ $data->rain_during_sampling }}</td>
                                                        @endif
                                                        @if($data->oil_layer==='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                        <td>{{ $data->oil_layer }}</td>
                                                        @endif
                                                        @if($data->source_pollution==='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                        <td>{{ $data->source_pollution }}</td>
                                                        @endif
                                                        @if($data->sampler==='error')
                                                        <td style="color: red;">No Data</td>
                                                        @else
                                                      
                                                        <td>{{ $data->sampler }}</td>
                                                       
                                                       
                                                        @endif
                                                        <!-- <td> <a href="/{{ $data->hard_copy }}">
                                                                @if ($data->hard_copy)
                                                                <img class="img-fluid" src="{{ asset('storage/' . $data->hard_copy) }}" style="width: 40px; height: 24px;">
                                                                @endif

                                                            </a>
                                                        </td> -->
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="card-footer">
                                            <div  class="card-tools row form-inline">
                                                <div  class="col-4">
                                                    <div class="d-flex justify-content-start">
                                                        <small>Showing {{ $Input->firstItem() }} to
                                                            {{ $Input->lastItem() }} of {{ $Input->total() }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div style="font-size: 8" class="d-flex justify-content-end">
                                                        {{ $Input->links() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <!-- /.card-body -->
                                    </div>

                                    <!-- /.card -->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <figure class="highcharts-figure">
                                            <div class="invoice p-3 mb-3" id="line_chart"></div>
                                        </figure>
                                    </div>
                                </div>
                                @else
                                <p class="text-center fs-4">Not Data Found</p>
                                @endif
                            </div>
                            <!-- /.container-fluid -->
                        </section>

                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Import Data</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/importdata" method="POST" enctype="multipart/form-data">
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


                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
<script>
    $(function() {

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#reservationdate1').datetimepicker({
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
</script>
<script>
        Highcharts.chart('line_chart', {
            chart: {
                type: 'spline'
            },
            title: {
                text:' Surface Water Chart'
            },  
            xAxis: {
                categories: {!! json_encode($date) !!}
           },
            yAxis: {
                title: {
                    text: 'Value'
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                        name: 'Temperatur',
                        color:'#1F2833',
                        data: {!! json_encode($suhu) !!},
                        marker: {
                            symbol: 'square'
                        },
                        

                    }, {
                        name: 'Conductivity (µS/cm)',
                        color:'#DE7A22',
                        marker: {
                            symbol: 'diamond'
                        },
                        data: {!! json_encode($conductivity) !!}
                    }, {
                        name: 'TDS',
                        color:'#F4CC70',
                        marker: {
                            symbol: 'triangle'
                        },
                        data: {!! json_encode($tds) !!}
                    }, {
                        name: 'TSS',
                        color:'#20948B',
                        marker: {
                            symbol: 'circle'
                        },
                        data: {!! json_encode($tss) !!}
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