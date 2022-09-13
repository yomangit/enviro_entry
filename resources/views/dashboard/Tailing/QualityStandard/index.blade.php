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
                        <li class="breadcrumb-item"><a href="/tailing">Home</a></li>
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
            <div class="card card-primary card-outline">
                <div class="card-header p-0 ">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session()->has('failures'))
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-danger">
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
                    </div>
                    @endif


                    <a href="/tailing/qualitystandard/create" class="btn bg-gradient-secondary ml-2 my-1 btn-xs"><i class="fas fa-plus mr-1 mt"></i>Add Data</a>
                    <a href="/export/tailing/standard" class="btn  bg-gradient-secondary  my-1 btn-xs" data-toggle="tooltip" data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                    <a href="#" class="btn  bg-gradient-secondary  my-1 btn-xs" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default"><i class="fas fa-upload mr-1"></i>Excel</a>




                </div>
                <div class="card-body ">
                    <div class="content">
                        <ul class="nav nav-tabs mb-2" id="custom-content-above-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-content-above-Metals-tab" data-toggle="pill" href="#custom-content-above-Metals" role="tab" aria-controls="custom-content-above-Metals" aria-selected="true">TCLP Metals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-Inorganic-tab" data-toggle="pill" href="#custom-content-above-Inorganic" role="tab" aria-controls="custom-content-above-Inorganic" aria-selected="false">TCLP Inorganic</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-content-above-Organic-tab" data-toggle="pill" href="#custom-content-above-Organic" role="tab" aria-controls="custom-content-above-Organic" aria-selected="false">TCLP Organic**</a>
                            </li>
                            <div class="col-12">
                              


                        </ul>

                        <div class="tab-content" id="custom-content-above-tabContent">

                            <div class="tab-pane fade show active" id="custom-content-above-Metals" role="tabpanel" aria-labelledby="custom-content-above-Metals-tab">
                                <div class="card">

                                    <div class="card-body table-responsive">
                                        <table role="grid" id="example2" class="table table-bordered  table-sm  table-striped">
                                            <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                <tr>

                                                    <th>No</th>
                                                    <th>Quality Standard</th>
                                                    <th style="width: 100px"> Antimony, Sb </th>
                                                    <th> Arsenic (As) </th>
                                                    <th> Barium (Ba) </th>
                                                    <th> Beryllium, Be </th>
                                                    <th> Boron (B) </th>
                                                    <th> Cadmium (Cd) </th>
                                                    <th> Chromium Hexavalent (Cr-VI) </th>
                                                    <th> Chromium (Cr) </th>
                                                    <th> Copper (Cu) </th>
                                                    <th> Iodide, I- </th>
                                                    <th> Lead (Pb) </th>
                                                    <th> Mercury (Hg) </th>
                                                    <th> Molybdenum, Mo </th>
                                                    <th> Nickel, Ni </th>
                                                    <th> Selenium (Se) </th>
                                                    <th> Silver (Ag) </th>
                                                    <th> Tributyl Tin Oxide (as Organotins)</th>
                                                    <th> Zinc (Zn) </th>
                                                    <th style="width:100px">Action</th>

                                                </tr>

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
                                                    <td>{{$item->antimony}}</td>
                                                    <td>{{$item->arsenic}}</td>
                                                    <td>{{$item->barium}}</td>
                                                    <td>{{$item->beryllium}}</td>
                                                    <td>{{$item->boron}}</td>
                                                    <td>{{$item->cadmium}}</td>
                                                    <td>{{$item->hexavalent}}</td>
                                                    <td>{{$item->chromium_cr}}</td>
                                                    <td>{{$item->copper}}</td>
                                                    <td>{{$item->iodide}}</td>
                                                    <td>{{$item->lead}}</td>
                                                    <td>{{$item->mercury}}</td>
                                                    <td>{{$item->molybdenum}}</td>
                                                    <td>{{$item->nickel}}</td>
                                                    <td>{{$item->selenium}}</td>
                                                    <td>{{$item->silver}}</td>
                                                    <td>{{$item->tributyl}}</td>
                                                    <td>{{$item->zinc_zn}}</td>
                                                    <td style="width:100px">

                                                        <a href="/tailing/qualitystandard/{{ $item->id }}/edit" class="btn btn-outline-warning btn-xs btn-group" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <form action="/tailing/qualitystandard/{{ $item->id }}" method="POST" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn btn-outline-danger btn-xs btn-group" onclick="return confirm('are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-above-Inorganic" role="tabpanel" aria-labelledby="custom-content-above-Inorganic-tab">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table role="grid" id="example1" class="table table-bordered  table-sm  table-striped">
                                            <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Quality Standard</th>
                                                    <th> Chloride, Cl- </th>
                                                    <th> Free Cyanide </th>
                                                    <th> Total Cyanide </th>
                                                    <th> Fluoride </th>
                                                    <th> Nitrite (NO2) </th>
                                                    <th> Nitrate/Nitrite </th>

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
                                                    <td style="width: 80px">{{$item->chloride_cl}}</td>
                                                    <td style="width: 80px">{{$item->free_cyanide}}</td>
                                                    <td style="width: 80px">{{$item->total_cyanide}}</td>
                                                    <td style="width: 80px">{{$item->fluoride}}</td>
                                                    <td style="width: 80px">{{$item->nitrite_no2}}</td>
                                                    <td style="width: 80px">{{$item->nitrate}}</td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-content-above-Organic" role="tabpanel" aria-labelledby="custom-content-above-Organic-tab">
                                <div class="card">
                                <div class="card-body table-responsive">
                                        <table role="grid" id="example5" class="table table-bordered  table-sm  table-striped">
                                            <thead class="text-center" style=" color:#581845;font-size: 10px">
                                                <tr>
                                                    <th>No</th>
                                                    <th >Quality Standard</th>
                                                    <th> Aldrin + Dieldrin </th>
                                                    <th> Dieldrin </th>
                                                    <th> Benzene </th>
                                                    <th> Benzo (a) pyrene </th>
                                                    <th> Carbon tetrachloride </th>
                                                    <th> Chlordane </th>
                                                    <th> Chlorobenzene </th>
                                                    <th> 2-Chlorophenol </th>
                                                    <th> Chloroform </th>
                                                    <th> o-Cresol </th>
                                                    <th> m-Cresol </th>
                                                    <th> p-Cresol </th>
                                                    <th> Total-cresol </th>
                                                    <th> Di(2-Ethylhexyl)Phthalate** </th>
                                                    <th> 2,4-D </th>
                                                    <th> 1,2-Dichlorobenzene </th>
                                                    <th> 1,4-Dichlorobenzene </th>
                                                    <th> 1,2-Dichloroethane </th>
                                                    <th> 1,1-Dichloroethylene </th>
                                                    <th> 1,1-Dichloroethene </th>
                                                    <th> 1,2-Dichloroethene </th>
                                                    <th> Dichloromethane </th>
                                                    <th> 2,4-Dichlorophenol </th>
                                                    <th> 2,4-Dinitrotoluene </th>
                                                    <th> Ethyl Benzene </th>
                                                    <th> thylenediaminetetraacetic acid (EDTA) </th>
                                                    <th> Formaldehyde </th>
                                                    <th> Hexachloro-1,3 butadiene </th>
                                                    <th> Endrin </th>
                                                    <th> Heptachlor+Heptachlor epoxide </th>
                                                    <th> Hexachlorobenzene </th>
                                                    <th> Hexachlorobutadiene </th>
                                                    <th> Hexachloroethane </th>
                                                    <th> Total Phenols </th>
                                                    <th> Lindane </th>
                                                    <th> Methoxychlor </th>
                                                    <th> Methyl ethyl ketone </th>
                                                    <th> Methyl Parathion </th>
                                                    <th> Nitrobenzene </th>
                                                    <th> Styrene </th>
                                                    <th> 1,1,1,2-Tetrachloroethane </th>
                                                    <th> 1,1,2,2-Tetrachloroethane </th>
                                                    <th> Nitriloacetic acid </th>
                                                    <th> Pentachlorophenol </th>
                                                    <th> Pyridine </th>
                                                    <th> Toxaphene </th>
                                                    <th> Parathion </th>
                                                    <th> Total Poly Chlor Biphenyl (PCB) </th>
                                                    <th> Tetrachloroethene (PCE) </th>
                                                    <th> Toluene </th>
                                                    <th> Trichlorobenzene </th>
                                                    <th> 1,1,1-Trichloroethane (Methoxychlor) </th>
                                                    <th> 1,1,2-Trichloroethane </th>
                                                    <th> Trichloroethene* </th>
                                                    <th> Toxaphene </th>
                                                    <th> Trichloroethylene (TCE) </th>
                                                    <th> Trihalomethanes </th>
                                                    <th> 2,4,5-Trichlorophenol </th>
                                                    <th> 2,4,6-Trichlorophenol </th>
                                                    <th> 2,4,5-TP (Silvex) </th>
                                                    <th> Vinyl Chloride </th>
                                                    <th> Xylenes Total </th>
                                                    <th> DDT+DDD+DDE* </th>
                                                    <th> 2.4-D (2.4-dichlorophenoxyacetic acid) </th>

                                                </tr>

                                            </thead>
                                            <tbody style="text-align:center" class="table table-bordered table-sm table-striped">
                                                @php
                                                $no = 1 + ($QualityStd->currentPage() - 1) * $QualityStd->perPage();
                                                @endphp
                                                @foreach($QualityStd as $item)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td >{{$item->nama}}</td>
                                                    <td >{{$item->aldrin}}</td>
                                                    <td >{{$item->dieldrin}}</td>
                                                    <td >{{$item->benzene}}</td>
                                                    <td >{{$item->benzo_a_pyrene}}</td>
                                                    <td >{{$item->tetrachloride}}</td>
                                                    <td >{{$item->chlordane}}</td>
                                                    <td >{{$item->chlorobenzene}}</td>
                                                    <td >{{$item->chlorophenol2}}</td>
                                                    <td >{{$item->chloroform}}</td>
                                                    <td >{{$item->o_cresol}}</td>
                                                    <td >{{$item->m_cresol}}</td>
                                                    <td >{{$item->p_cresol}}</td>
                                                    <td >{{$item->total_cresol}}</td>
                                                    <td >{{$item->ethylhexylphthalate}}</td>
                                                    <td >{{$item->d}}</td>
                                                    <td >{{$item->dichlorobenzene2}}</td>
                                                    <td >{{$item->dichlorobenzene4}}</td>
                                                    <td >{{$item->dichloroethane1}}</td>
                                                    <td >{{$item->dichloroethylene}}</td>
                                                    <td >{{$item->dichloroethene2}}</td>
                                                    <td >{{$item->dichloroethene3}}</td>
                                                    <td >{{$item->dichloromethane}}</td>
                                                    <td >{{$item->dichlorophenol}}</td>
                                                    <td >{{$item->dinitrotoluene}}</td>
                                                    <td >{{$item->ethyl_benzene}}</td>
                                                    <td >{{$item->thylenediaminetetraacetic}}</td>
                                                    <td >{{$item->formaldehyde}}</td>
                                                    <td >{{$item->hexachloro}}</td>
                                                    <td >{{$item->endrin}}</td>
                                                    <td >{{$item->heptachlor}}</td>
                                                    <td >{{$item->hexachlorobenzene}}</td>
                                                    <td >{{$item->hexachlorobutadiene}}</td>
                                                    <td >{{$item->hexachloroethane}}</td>
                                                    <td >{{$item->total_phenols}}</td>
                                                    <td >{{$item->lindane}}</td>
                                                    <td >{{$item->methoxychlor1}}</td>
                                                    <td >{{$item->ketone}}</td>
                                                    <td >{{$item->parathion1}}</td>
                                                    <td >{{$item->nitrobenzene}}</td>
                                                    <td >{{$item->styrene}}</td>
                                                    <td >{{$item->tetrachloroethane1}}</td>
                                                    <td >{{$item->tetrachloroethane2}}</td>
                                                    <td >{{$item->nitriloacetic}}</td>
                                                    <td >{{$item->pentachlorophenol}}</td>
                                                    <td >{{$item->pyridine}}</td>
                                                    <td >{{$item->toxaphene1}}</td>
                                                    <td >{{$item->parathion}}</td>
                                                    <td >{{$item->total_chlor}}</td>
                                                    <td >{{$item->tetrachloroethene}}</td>
                                                    <td >{{$item->toluene}}</td>
                                                    <td >{{$item->trichlorobenzene}}</td>
                                                    <td >{{$item->methoxychlor2}}</td>
                                                    <td >{{$item->trichloroethane}}</td>
                                                    <td >{{$item->trichloroethene}}</td>
                                                    <td >{{$item->toxaphene2}}</td>
                                                    <td >{{$item->trichloroethylene}}</td>
                                                    <td >{{$item->trihalomethanes}}</td>
                                                    <td >{{$item->trichlorophenol5}}</td>
                                                    <td >{{$item->trichlorophenol6}}</td>
                                                    <td >{{$item->tp_silvex}}</td>
                                                    <td >{{$item->vinyl_chloride}}</td>
                                                    <td >{{$item->xylenes_total}}</td>
                                                    <td >{{$item->ddt_ddd_dde}}</td>
                                                    <td >{{$item->dichlorophenoxyacetic}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                       
                        
                    </div>
                </div>
                <div class="card-footer">
                        <div class="card-tools  form-inline">
                            <div class="col-4">
                                <div class="d-flex justify-content-start">
                                    <h6>Showing {{ $QualityStd->firstItem() }} to {{$QualityStd->lastItem() }} of {{ $QualityStd->total() }}</h6>
                                </div>
                            </div>
                            <div class="col-8 d-flex justify-content-end">
                                <div class=" pagination pagination-sm">
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
                                    <form action="/import/tailing/standard" method="POST" enctype="multipart/form-data">
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