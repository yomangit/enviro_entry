@extends('dashboard.layouts.main')
@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input {{ $breadcrumb }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard/monitoring/marine">Home</a></li>
                        <li class="breadcrumb-item active">Input Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header p-0 pt-1">

                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible form-inline">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/dashboard/monitoring/marine" method="post" checked enctype="multipart/form-data" autocomplete="off">
                        @csrf


                        @section('container')
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
                                                <li class="breadcrumb-item"><a href="/dashboard/monitoring/marine">Home</a></li>
                                                <li class="breadcrumb-item active">Input Data</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div><!-- /.container-fluid -->
                            </section>
                            <!-- Main content -->
                            <section class="content">
                                <div class="container-fluid">
                                    <!-- SELECT2 EXAMPLE -->
                                    <div class="card card-default">
                                        <div class="card-header p-0 pt-1">

                                            @if (session()->has('success'))
                                            <div class="alert alert-success alert-dismissible form-inline">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                                                {{ session('success') }}
                                            </div>
                                            @endif
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                        <form action="/dashboard/monitoring/marine/{{ $Marine->created_at }}" method="post"
                                            enctype="multipart/form-data" autocomplete="off">
                                            @method('put')
                                            @csrf
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group row">
                                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Biota</label>
                                                            <div class="col-sm-7">
                                                                <select class="form-control form-control-sm " name="biota_id">
                                                                    @foreach ($Biotum as $biota)
                                                                    @if (old('biota_id',$Marine->biota_id)==$biota->id)
                                                                    <option value="{{$biota->id}}" selected>{{$biota->nama}}</option>
                                                                    @else
                                                                    <option value="{{$biota->id}}">{{$biota->nama}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group row">
                                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Location</label>
                                                            <div class="col-sm-7">
                                                                <select class="form-control form-control-sm " name="location_id">
                                                                    @foreach ($LocationBiota as $location)
                                                                    @if (old('location_id',$Marine->location_id)==$location->id)
                                                                    <option value="{{$location->id}}" selected>{{$location->nama}}</option>
                                                                    @else
                                                                    <option value="{{$location->id}}">{{$location->nama}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group row">
                                                            <label style="font-size: 12px" class="col-sm-4 col-form-label">Date</label>
                                                            <div class="col-sm-7">
                                                                <div class="input-group date" id="reservationdate5" data-target-input="nearest">
                                                                    <input type="text" name="date" class="form-control datetimepicker-input form-control-sm @error('date') is-invalid @enderror " data-target="#reservationdate5" data-toggle="datetimepicker" value="{{ old('date',$Marine->date) }}" />
                                                                    @error('date')
                                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                
                                                            </div>

                                                        </div>
                                                    </div>
                                                    {{-- end tanggal --}}

                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-group row">
                                                                <label style="font-size: 12px" class="col-sm-4 col-form-label">Taxa Richness</label>
                                                                <div class="col-sm-7">
                                                                    <input name="taxa_richness" type="number" step="0.01" class="form-control form-control-sm @error('taxa_richness') is-invalid @enderror" value="{{ old('taxa_richness',$Marine->taxa_richness) }}" />
                                                                    @error('taxa_richness')
                                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    {{-- end temperatur --}}
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <div class="form-group row">
                                                                <label style="font-size: 12px" class="col-sm-4 col-form-label">Species Density (cell/m3)</label>
                                                                <div class="col-sm-7">
                                                                    <input name="species_density" type="number" step="0.01" class="form-control form-control-sm @error('species_density') is-invalid @enderror" value="{{ old('species_density',$Marine->species_density) }}">
                                                                    @error('species_density')
                                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- end PH --}}
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <div class="form-group row">
                                                                <label style="font-size: 12px" class="col-sm-4 col-form-label">Diversity Index</label>
                                                                <div class="col-sm-7">
                                                                    <input name="diversity_index" type="number" step="0.01" value="{{ old('diversity_index',$Marine->diversity_index) }}" class="form-control form-control-sm @error('diversity_index') is-invalid @enderror">
                                                                    @error('diversity_index')
                                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- end ORP --}}
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-group row">
                                                                <label style="font-size: 12px" class="col-sm-4 col-form-label">Evenness Value</label>
                                                                <div class="col-sm-7">
                                                                    <input name="evenness_value" type="number" step="0.01" class="form-control form-control-sm @error('evenness_value') is-invalid @enderror" value="{{ old('evenness_value',$Marine->evenness_value) }}" />
                                                                    @error('evenness_value')
                                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    {{-- end Conductivity --}}
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-group row">
                                                                <label style="font-size: 12px" class="col-sm-4 col-form-label">Dominance Index</label>
                                                                <div class="col-sm-7">
                                                                    <input name="dominance_index" type="number" step="0.01" class="form-control form-control-sm @error('dominance_index') is-invalid @enderror" value="{{ old('dominance_index',$Marine->dominance_index) }}" />
                                                                    @error('dominance_index')
                                                                    <span class=" invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                                                    {{-- end turbidity --}}

                                                </div>
                                                <!-- /.row -->
                                                <div class="card-footer d-flex justify-content-end">
                                                    <button type="submit" class="btn bg-gradient-success btn-sm ">Save</button>
                                                </div>
                                            </form>

                                        </div>
                                        <!-- /.card-body -->

                                    </div>
                                    <!-- /.card -->

                                    <!-- SELECT2 EXAMPLE -->

                                    <!-- /.row -->
                                </div>
                                <!-- /.container-fluid -->
                            </section>
                            <!-- /.content -->
                        </div>
                   
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

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input name="nama" type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" value="{{ old('nama') }}" />

                                            @error('nama')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end nama --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Lokasi</label>
                                        <div class="col-sm-7">
                                            <input name="lokasi" type="text" class="form-control form-control-sm @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}" />
                                            @error('lokasi')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end lokasi --}}


                        </div>
                        <!-- /.row -->
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-primary btn-sm ">Create</button>
                        </div>
                    </form>

                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->

            <!-- SELECT2 EXAMPLE -->

            <!-- /.row -->
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
        $('#reservationdate5').datetimepicker({
            format: 'DD-MM-YYYY'
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