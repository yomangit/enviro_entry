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
                                    <a href="/surfacewater/drinkwater/quantity/create" class="btn bg-gradient-secondary btn-xs"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                                    <a href="/export/drinkwater/std" class="btn  bg-gradient-secondary btn-xs" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                                    <a href="#" class="btn  bg-gradient-secondary btn-xs" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default"><i class="fas fa-upload mr-1"></i>Excel</a>
                                    @endif

                                    <!-- <div class="card-tools row">
                                        <form action="/surfacewater/drinkwater/quantity" class="form-inline">


                                            <div style="width: 118px;" class="input-group mr-1">
                                                <select class="form-control form-control-sm " name="search">
                                                    <option value="" selected>Point ID</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                </select>
                                            </div>
                                            <div class="mr-2">
                                                <button type="submit" class="btn bg-gradient-dark btn-xs">filter</button>
                                            </div>
                                        </form>
                                        <form action="/surfacewater/drinkwater/quantity">
                                            <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
                                        </form>

                                    </div> -->

                </div>
                <div class="card-body">
                    <div class="content">
                        <div class="col-12">
                            <div class="card">
                                <ul class="nav nav-tabs mt-2" id="custom-content-above-tab" role="tablist">
                                    <li class="nav-item">
                                        <a style="color:#581845" class="nav-link active" id="custom-content-above-Physical-tab" data-toggle="pill" href="#custom-content-above-Physical" role="tab" aria-controls="custom-content-above-Physical" aria-selected="true">Physical Chemical</a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="color:#581845" class="nav-link" id="custom-content-above-Anions-tab" data-toggle="pill" href="#custom-content-above-Anions" role="tab" aria-controls="custom-content-above-Anions" aria-selected="false">Anions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="color:#581845" class="nav-link" id="custom-content-above-Cyanide-tab" data-toggle="pill" href="#custom-content-above-Cyanide" role="tab" aria-controls="custom-content-above-Cyanide" aria-selected="false">Cyanide</a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="color:#581845" class="nav-link" id="custom-content-above-nutrients-tab" data-toggle="pill" href="#custom-content-above-nutrients" role="tab" aria-controls="custom-content-above-nutrients" aria-selected="false">Nutrients</a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="color:#581845" class="nav-link" id="custom-content-above-dissolved-tab" data-toggle="pill" href="#custom-content-above-dissolved" role="tab" aria-controls="custom-content-above-dissolved" aria-selected="false">Dissolved Metals</a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="color:#581845" class="nav-link" id="custom-content-above-microbiology-tab" data-toggle="pill" href="#custom-content-above-microbiology" role="tab" aria-controls="custom-content-above-microbiology" aria-selected="false">Microbiology</a>
                                    </li>

                                </ul>

                                <div class="tab-content" id="custom-content-above-tabContent">

                                    <div class="tab-pane fade show active" id="custom-content-above-Physical" role="tabpanel" aria-labelledby="custom-content-above-Physical-tab">
                                        <div class="card">

                                            <div class="card-body table-responsive">
                                                <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                                    <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                        <tr>
                                                            <th>Action</th>
                                                            <th>No</th>
                                                            <th>Quality Standard</th>
                                                            <th>Conductivity</th>
                                                            <th>TDS</th>
                                                            <th>TSS</th>
                                                            <th>Turbidity</th>
                                                            <th>Hardness</th>
                                                            <th>Color</th>
                                                            <th>Odor</th>
                                                            <th>Taste</th>

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
                                                                <a href="/surfacewater/drinkwater/quantity/{{ $item->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <i class="fas fa-pen"></i>
                                                                </a>
                                                                <form action="/surfacewater/drinkwater/quantity/{{ $item->id }}" method="POST" class="d-inline">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <td>{{$no++}}</td>
                                                            <td>{{$item->nama}}</td>
                                                            <td>{{$item->conductivity}}</td>
                                                            <td>{{$item->tds}}</td>
                                                            <td>{{$item->tss}}</td>
                                                            <td>{{$item->turbidity}}</td>
                                                            <td>{{$item->hardness}}</td>
                                                            <td>{{$item->color}}</td>
                                                            <td>{{$item->odor}}</td>
                                                            <td>{{$item->taste}}</td>
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
                                                            <th>Chloride (Cl)</th>
                                                            <th>Fluoride (F)</th>
                                                            <th>Residual Chlorine</th>
                                                            <th>Sulphate (SO4)</th>
                                                            <th>Sulphite (H2S)</th>
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
                                                            <td>{{$item->chloride}}</td>
                                                            <td>{{$item->fluoride}}</td>
                                                            <td>{{$item->residual_chlorine}}</td>
                                                            <td>{{$item->sulphate}}</td>
                                                            <td>{{$item->sulphite}}</td>
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
                                                            <th>Free Cyanide (FCN)</th>
                                                            <th>Total Cyanide (CN Tot)</th>
                                                            <th>WAD Cyanide (CN Wad)</th>
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
                                                            <td>{{$item->free_cyanide}}</td>
                                                            <td>{{$item->total_cyanide}}</td>
                                                            <td>{{$item->wad_cyanide}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="custom-content-above-nutrients" role="tabpanel" aria-labelledby="custom-content-above-nutrients-tab">
                                        <div class="card">
                                            <div class="card-body table-responsive">
                                                <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                                    <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Quality Standard</th>
                                                            <th>Ammonia (NH4)</th>
                                                            <th>Ammonia (N-NH3)</th>
                                                            <th>Nitrate (NO3)</th>
                                                            <th>Nitrite (NO2)</th>
                                                            <th>Phosphate (PO4)</th>
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
                                                            <td>{{$item->ammonia_nh4}}</td>
                                                            <td>{{$item->ammonia_nnh3}}</td>
                                                            <td>{{$item->nitrate_no3}}</td>
                                                            <td>{{$item->nitrate_no2}}</td>
                                                            <td>{{$item->phosphate_po4 }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="custom-content-above-dissolved" role="tabpanel" aria-labelledby="custom-content-above-dissolved-tab">
                                        <div class="card">
                                            <div class="card-body table-responsive">
                                                <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                                    <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Quality Standard</th>
                                                            <th>Aluminium (Al)</th>
                                                            <th>Arsenic (As)</th>
                                                            <th>Barium (Ba)</th>
                                                            <th>Cadmium (Cd)</th>
                                                            <th>Chromium (Cr)</th>
                                                            <th>Chromium Hexavalent (Cr6+)</th>
                                                            <th>Cobalt (Co)</th>
                                                            <th>Copper (Cu)</th>
                                                            <th>Iron (Fe)</th>
                                                            <th>Lead (Pb)</th>
                                                            <th>Manganese (Mn)</th>
                                                            <th>Mercury (Hg)</th>
                                                            <th>Nickel (Ni)</th>
                                                            <th>Selenium (Se)</th>
                                                            <th>Silver (Ag)</th>
                                                            <th>Zinc (Zn)</th>
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
                                                            <td>{{$item->aluminium_al}}</td>
                                                            <td>{{$item->arsenic_as}}</td>
                                                            <td>{{$item->barium_ba}}</td>
                                                            <td>{{$item->cadmium_cd}}</td>
                                                            <td>{{$item->chromium_cr}}</td>
                                                            <td>{{$item->chromium_hexavalent}}</td>
                                                            <td>{{$item->cobalt_co}}</td>
                                                            <td>{{$item->copper_cu}}</td>
                                                            <td>{{$item->iron_fe}}</td>
                                                            <td>{{$item->lead_pb}}</td>
                                                            <td>{{$item->manganese_mn}}</td>
                                                            <td>{{$item->mercury_hg}}</td>
                                                            <td>{{$item->nickel_ni}}</td>
                                                            <td>{{$item->selenium_se}}</td>
                                                            <td>{{$item->silver_ag}}</td>
                                                            <td>{{$item->zinc_zn}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-content-above-microbiology" role="tabpanel" aria-labelledby="custom-content-above-microbiology-tab">
                                        <div class="card">
                                            <div class="card-body table-responsive">
                                                <table role="grid" class="table table-bordered  table-sm table-head-fixed  table-striped">
                                                    <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Quality Standard</th>
                                                            <th>Fecal Coliform</th>
                                                            <th>E- Coli</th>
                                                            <th>Total Coliform Bacteria </th>
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
                                                            <td>{{$item->fecal_coliform}}</td>
                                                            <td>{{$item->c_coli}}</td>
                                                            <td>{{$item->total_coliform_bacteria}}</td>
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
                                            <form action="/import/drinkwater/std" method="POST" enctype="multipart/form-data">
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