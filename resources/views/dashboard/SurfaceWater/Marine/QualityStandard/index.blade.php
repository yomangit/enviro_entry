@extends('dashboard.layouts.main')
@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> {{ $breadcrumb }}</h1>
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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card">
                <div class="card-header">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session()->has('failures'))

                    <table class="table table-danger">
                        <tr>
                            <th>Row</th>
                            <th>Attribute</th>
                            <th>Errors</th>
                            <th>Value</th>
                        </tr>
                        @foreach (session()->get('failures') as $validation)
                        <tr>
                            <td>{{$validation->row()}}</td>
                            <td>{{$validation->attribute()}}</td>
                            <td>
                                <ul>
                                    @foreach ($validation->errors() as $e)
                                    <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{$validation->values()[$validation->attribute()]}}</td>
                        </tr>
                        @endforeach
                    </table>
                    @endif

                    @if(empty($QualityStd->count()))
                    <a href="/surfacewater/marinesurfacewater/quality/create" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                    <a href="/export/marinesurfacewater/quality" class="btn  bg-gradient-secondary btn-xs" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                    <a href="#" class="btn  bg-gradient-secondary btn-xs" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default"><i class="fas fa-upload mr-1"></i>Excel</a>
                    @endif

                    <div class="card-tools row">
                        <form action="/surfacewater/marinesurfacewater/quality">
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
                <div class="card-body">
                    <div class="content">
                        <div class="col-12">
                            <div class="card">
                                <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-content-above-Physical-tab" data-toggle="pill" href="#custom-content-above-Physical" role="tab" aria-controls="custom-content-above-Physical" aria-selected="true">Physical Chemical</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-content-above-Anions-tab" data-toggle="pill" href="#custom-content-above-Anions" role="tab" aria-controls="custom-content-above-Anions" aria-selected="false">Chemical-Anion</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-content-above-Nutrient-tab" data-toggle="pill" href="#custom-content-above-Nutrient" role="tab" aria-controls="custom-content-above-Nutrient" aria-selected="false">Nutrient</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-content-above-Cyanide-tab" data-toggle="pill" href="#custom-content-above-Cyanide" role="tab" aria-controls="custom-content-above-Cyanide" aria-selected="false">Cyanide & Microbiology</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-content-above-Metal-tab" data-toggle="pill" href="#custom-content-above-Metal" role="tab" aria-controls="custom-content-above-Metal" aria-selected="false">Metal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-content-above-Organics-tab" data-toggle="pill" href="#custom-content-above-Organics" role="tab" aria-controls="custom-content-above-Organics" aria-selected="false">Organics</a>
                                    </li>

                                </ul>

                                <div class="tab-content" id="custom-content-above-tabContent">

                                    <div class="tab-pane fade show active" id="custom-content-above-Physical" role="tabpanel" aria-labelledby="custom-content-above-Physical-tab">
                                        <div class="card">

                                            <div class="card-body table-responsive">
                                                <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                                    <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                        <tr>
                                                            <th style="width:80px">Action</th>
                                                            <th>No</th>
                                                            <th>Quality Standard</th>
                                                            <th>Clarity</th>
                                                            <th>Temperature (Water)</th>
                                                            <th>Garbage</th>
                                                            <th>Oil Layer</th>
                                                            <th>Odor</th>
                                                            <th>Color</th>
                                                            <th>Turbidity</th>
                                                            <th>Total Suspended Solids</th>
                                                            <th>Salinity in situ</th>
                                                            <th>Total Dissolved Solids</th>
                                                            <th>Conductivity (Insitu)</th>

                                                        </tr>

                                                        </tr>
                                                    </thead>
                                                    <tbody style="text-align:center" class=" border-1">
                                                        @php
                                                        $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                                        @endphp
                                                        @foreach($QualityStd as $item)
                                                        <tr>
                                                            <td>
                                                                <a href="/surfacewater/marinesurfacewater/quality/{{ $item->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <i class="fas fa-pen"></i>
                                                                </a>
                                                                <form action="/surfacewater/marinesurfacewater/quality/{{ $item->id }}" method="POST" class="d-inline">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <td>{{$no++}}</td>
                                                            <td>{{$item->nama}}</td>
                                                            <td>{{$item->clarity}}</td>
                                                            <td>{{$item->temperature_water}}</td>
                                                            <td>{{$item->garbage}}</td>
                                                            <td>{{$item->oil_ayer}}</td>
                                                            <td>{{$item->odour}}</td>
                                                            <td>{{$item->colour}}</td>
                                                            <td>{{$item->turbidity}}</td>
                                                            <td>{{$item->total_suspended_solids}}</td>
                                                            <td>{{$item->salinity_in_situ}}</td>
                                                            <td>{{$item->total_dissolved_solids}}</td>
                                                            <td>{{$item->conductivity_insitu}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-content-above-Anions" role="tabpanel" aria-labelledby="custom-content-above-Anions-tab">
                                        <div class="card">
                                            <div class="card-body table-responsive">
                                                <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                                    <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Quality Standard</th>
                                                            <th>pH</th>
                                                            <th>Sulphide</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody style="text-align:center" class=" border-1">
                                                        @php
                                                        $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                                        @endphp

                                                        @foreach($QualityStd as $item)
                                                        <tr>
                                                            <td>{{$no++}}</td>
                                                            <td>{{$item->nama}}</td>
                                                            <td>{{$item->ph}}</td>
                                                            <td>{{$item->sulphide}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-content-above-Nutrient" role="tabpanel" aria-labelledby="custom-content-above-Nutrient-tab">
                                        <div class="card">
                                            <div class="card-body table-responsive">
                                                <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                                    <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Quality Standard</th>
                                                            <th>Ammonia (N-NH3)</th>
                                                            <th>Nitrate (N-NO3)</th>
                                                            <th>Total-Phosphate (P-PO4)</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody style="text-align:center" class=" border-1">
                                                        @php
                                                        $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                                        @endphp

                                                        @foreach($QualityStd as $item)
                                                        <tr>
                                                            <td>{{$no++}}</td>
                                                            <td>{{$item->nama}}</td>
                                                            <td>{{$item->ammonia_n_nh3}}</td>
                                                            <td>{{$item->nitrate_n_no3}}</td>
                                                            <td>{{$item->total_phosphate_p_po4}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="custom-content-above-Cyanide" role="tabpanel" aria-labelledby="custom-content-above-Cyanide-tab">
                                        <div class="card">
                                            <div class="card-body table-responsive">
                                                <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                                    <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Quality Standard</th>
                                                            <th>Cyanide (Total)</th>
                                                            <th>Total Coliform</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody style="text-align:center" class=" border-1">
                                                        @php
                                                        $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                                        @endphp
                                                        @foreach($QualityStd as $item)
                                                        <tr>
                                                            <td>{{$no++}}</td>
                                                            <td>{{$item->nama}}</td>
                                                            <td>{{$item->cyanide_total}}</td>
                                                            <td>{{$item->total_coliform}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="custom-content-above-Metal" role="tabpanel" aria-labelledby="custom-content-above-Metal-tab">
                                        <div class="card">
                                            <div class="card-body table-responsive">
                                                <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                                    <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Quality Standard</th>
                                                            <th>Chromium Hexavalent-Total(Cr-VI)</th>
                                                            <th>Arsenic-Hydrid Dissolved (As)</th>
                                                            <th>Boron-Dissolved (B)</th>
                                                            <th>Cadmium-Dissolved (Cd)</th>
                                                            <th>Copper-Dissolved (Cu)</th>
                                                            <th>Lead-Dissolved (Pb)</th>
                                                            <th>Nickel-Dissolved (Ni)</th>
                                                            <th>Zinc-Dissolved (Zn)</th>
                                                            <th>Mercury-Dissolved (Hg)</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody style="text-align:center" class=" border-1">
                                                        @php
                                                        $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                                        @endphp

                                                        @foreach($QualityStd as $item)
                                                        <tr>
                                                            <td>{{$no++}}</td>
                                                            <td>{{$item->nama}}</td>
                                                            <td>{{$item->chromium_hexavalent_total_cr_vi}}</td>
                                                            <td>{{$item->arsenic_hydrid_dissolved_as}}</td>
                                                            <td>{{$item->boron_dissolved_b}}</td>
                                                            <td>{{$item->cadmium_dissolved_cd}}</td>
                                                            <td>{{$item->copper_dissolved_cu}}</td>
                                                            <td>{{$item->lead_dissolved_pb}}</td>
                                                            <td>{{$item->nickel_dissolved_ni}}</td>
                                                            <td>{{$item->zinc_dissolved_zn}}</td>
                                                            <td>{{$item->mercury_dissolved_hg}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-content-above-Organics" role="tabpanel" aria-labelledby="custom-content-above-Organics-tab">
                                        <div class="card">
                                            <div class="card-body table-responsive">
                                                <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                                    <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Biologycal Oxygen Demand</th>
                                                            <th>Dissolved Oxygen</th>
                                                            <th>Oil & Grease</th>
                                                            <th>Surfactant</th>
                                                            <th>Total Phenol</th>
                                                            <th>Hydrocarbon</th>
                                                            <th>Tributyl Tin</th>
                                                            <th>Total Poly Chlor Biphenyl</th>
                                                            <th>Poly Aromatic Hydrocarbon</th>
                                                            <th>Total Pesticides as Organo Chlorine Pesticides</th>
                                                            <th>Benzene Hexa Chloride</th>
                                                            <th>Endrin</th>
                                                            <th>Dichloro Diphenyl Trichloroethane</th>
                                                            <th>Total Petroleum Hydrocarbons</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody style="text-align:center" class=" border-1">
                                                        @php
                                                        $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                                        @endphp

                                                        @foreach($QualityStd as $item)
                                                        <tr>
                                                            <td>{{$no++}}</td>
                                                            <td>{{$item->nama}}</td>
                                                            <td>{{$item->biologycal_oxygen_demand}}</td>
                                                            <td>{{$item->dissolved_oxygen}}</td>
                                                            <td>{{$item->oil_grease}}</td>
                                                            <td>{{$item->surfactant}}</td>
                                                            <td>{{$item->total_phenol}}</td>
                                                            <td>{{$item->hydrocarbon}}</td>
                                                            <td>{{$item->tributyl_tin}}</td>
                                                            <td>{{$item->total_poly_chlor_biphenyl}}</td>
                                                            <td>{{$item->poly_aromatic_hydrocarbon}}</td>
                                                            <td>{{$item->total_pesticides_as_organo_chlorine_pesticides}}</td>
                                                            <td>{{$item->benzene_hexa_chloride}}</td>
                                                            <td>{{$item->endrin}}</td>
                                                            <td>{{$item->dichloro_diphenyl_trichloroethane}}</td>
                                                            <td>{{$item->total_petroleum_hydrocarbons}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <div class="card-tools row form-inline">
                                        <div class="col-4">
                                            <div class="d-flex justify-content-start">
                                                <small>Showing {{ $QualityStd->firstItem() }} to
                                                    {{ $QualityStd->lastItem() }} of {{ $QualityStd->total() }}
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div style="font-size: 8" class="d-flex justify-content-end">
                                                {{ $QualityStd->links() }}
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
                                            <form action="/import/marinesurfacewater/quality" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="custom-file">
                                                        <input type="file" name="file" class="custom-file-input  @error('file') is-invalid @enderror" id="exampleInputFile" required>
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        @error('file')
                                                        <span class=" invalid-feedback ">{{ $message }}</span>
                                                        @enderror
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
                </div>
            </div>
        </div>
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@section('footer')
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })
        $('#timepicker2').datetimepicker({
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
<script>
    function previewImage() {
        const image = document.querySelector('#hard_copy');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection