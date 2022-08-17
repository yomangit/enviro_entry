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
                        <li class="breadcrumb-item"><a href="/groundwater/masterttn">Home</a></li>
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
                    <form action="/groundwater/masterttn" method="post" checked enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group row">
                                    <label style="font-size: 12px"
                                        class="col-sm-4 col-form-label">Code Sample</label>
                                    <div class="col-sm-7">
                                        <select class="form-control form-control-sm " name="codesamplettn_id">
                                            @foreach ($code_units as $code)
                                            @if (old('codesamplettn_id')==$code->id)
                                            <option value="{{$code->id}}" selected>{{$code->nama}}</option>
                                            @else
                                            <option value="{{$code->id}}" >{{$code->nama}}</option>
                                            @endif
                                            @endforeach
                                        </select>
    
                                    </div>
    
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group row">
                                    <label style="font-size: 12px"
                                        class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date" id="reservationdate4"
                                            data-target-input="nearest">
                                            <input type="text" name="date"
                                                class="form-control datetimepicker-input form-control-sm @error('date') is-invalid @enderror "
                                                data-target="#reservationdate4"
                                                data-toggle="datetimepicker"
                                                value="{{ old('date') }}" />
                                            @error('date')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
    
                                    </div>
    
                                </div>
                            </div>
                            {{-- end tanggal --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group row">
                                    <label style="font-size: 12px"
                                        class="col-sm-4 col-form-label">Start Time Sampling</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date" id="timepicker"
                                            data-target-input="nearest">
                                            <input name="start_time" type="text"
                                                value="{{ old('start_time') }}"
                                                class="form-control datetimepicker-input form-control-sm @error('start_time') is-invalid @enderror"
                                                data-target="#timepicker"
                                                data-toggle="datetimepicker" />
                                            @error('start_time')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            {{-- end start time sampling --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group row">
                                    <label style="font-size: 12px"
                                        class="col-sm-4 col-form-label">Finish Time Sampling</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date" id="timepicker1"
                                            data-target-input="nearest">
                                            <input name="stop_time" type="text"
                                                value="{{ old('stop_time') }}"
                                                class="form-control datetimepicker-input form-control-sm @error('stop_time') is-invalid @enderror"
                                                data-target="#timepicker1"
                                                data-toggle="datetimepicker" />
                                            @error('stop_time')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            {{-- end finish time sampling --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">Well</label>
                                        <div class="col-sm-7">
                                            <input name="well" type="number" step="0.01"
                                                class="form-control form-control-sm @error('well') is-invalid @enderror"
                                                value="{{ old('well') }}" />
                                            @error('well')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
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
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">Well Water</label>
                                        <div class="col-sm-7">
                                            <input name="well_water" type="number" step="0.01"
                                                class="form-control form-control-sm @error('well_water') is-invalid @enderror"
                                                value="{{ old('well_water') }}">
                                            @error('well_water')
                                                <span
                                                    class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end PH --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">H</label>
                                        <div class="col-sm-7">
                                            <input name="h" type="number" step="0.01"
                                                value="{{ old('h') }}"
                                                class="form-control form-control-sm @error('h') is-invalid @enderror">
                                            @error('h')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end ORP --}}
                           
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">Water Volumes (L)</label>
                                        <div class="col-sm-7">
                                            <input name="water_volume" type="number" step="0.01"
                                                class="form-control form-control-sm  @error('water_volume') is-invalid @enderror"
                                                value="{{ old('water_volume') }}" />
                                            @error('water_volume')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end tds --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">Temperatur
                                        <sup>0</sup>C</label>
                                        <div class="col-sm-7">
                                            <input name="temperatur" type="number" step="0.01"
                                                class="form-control form-control-sm @error('temperatur') is-invalid @enderror"
                                                value="{{ old('temperatur') }}" />
                                            @error('temperatur')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end salinity --}}
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">pH</label>
                                        <div class="col-sm-7">
                                            <input name="ph" type="number" step="0.01"
                                                value="{{ old('ph') }}"
                                                class="form-control form-control-sm @error('ph') is-invalid @enderror">
                                            @error('ph')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end tss --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px" class="col-sm-4 col-form-label">Conductivity (Us/cm)</label>
                                        <div class="col-sm-7">
                                            <input name="conductivity" type="number" step="0.01" class="form-control form-control-sm @error('conductivity') is-invalid @enderror" value="{{ old('conductivity') }}" />
                                            @error('conductivity')
                                            <span class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end Cyanide --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">TDS</label>
                                        <div class="col-sm-7">
                                            <input name="tds" type="number" step="0.01"
                                                class="form-control form-control-sm @error('tds') is-invalid @enderror"
                                                value="{{ old('tds') }}" />
                                            @error('tds')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end level --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">Redox</label>
                                        <div class="col-sm-7">
                                            <input name="redox" type="number" step="0.01"
                                                class="form-control form-control-sm @error('redox') is-invalid @enderror"
                                                value="{{ old('redox') }}" />
                                            @error('redox')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end level loger --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">Dissolved Oxigen (DO)</label>
                                        <div class="col-sm-7">
                                            <input name="do" type="number" step="0.01"
                                                class="form-control form-control-sm @error('do') is-invalid @enderror"
                                                value="{{ old('do') }}" />
                                            @error('do')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end debit --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">Salinity</label>
                                        <div class="col-sm-7">
                                            <input name="salinity" type="number" step="0.01"
                                                class="form-control form-control-sm @error('salinity') is-invalid @enderror"
                                                value="{{ old('salinity') }}" />
                                            @error('salinity')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end debit mday --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">Turbidity</label>
                                        <div class="col-sm-7">
                                            <input name="turbidity" type="number" step="0.01"
                                                class="form-control form-control-sm @error('turbidity') is-invalid @enderror"
                                                value="{{ old('turbidity') }}" />
                                            @error('turbidity')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end tl TSF --}}
                           
                            {{-- end tl Wall --}}
                            
                            {{-- kondisi Air --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label"> Water Color</label>
                                        <div class="col-sm-7">
                                            <div class="icheck-success d-inline col-sm-7">
                                                <input type="radio" name="water_color"
                                                    value="Normal" checked id="watercolor1">
                                                <label style="font-size: 12px" for="watercolor1">N
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="water_color"
                                                    value="Agak Keruh" id="watercolor2">
                                                <label style="font-size: 12px"
                                                    class="mr-1" for="watercolor2">AK
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="water_color"
                                                    value="Agak Keruh" id="watercolor3">
                                                <label style="font-size: 12px" for="watercolor3">K
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end Warna Air --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">Odor</label>
                                        <div class="col-sm-7">
                                            <div class="icheck-success d-inline col-sm-7">
    
                                                <input type="radio" name="odor" value="Ya" checked
                                                    id="waterScan1">
                                                <label style="font-size: 12px" for="waterScan1">Normal
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline">
    
                                                <input type="radio" name="odor" value="Tidak"
                                                    id="waterScant2">
                                                <label style="font-size: 12px"
                                                    for="waterScant2">Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end Bau Air --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 11px"
                                            class="col-sm-4 col-form-label"> Rain Before Sampling</label>
                                        <div class="col-sm-7">
                                            <div class="icheck-success d-inline col-sm-7">
    
                                                <input type="radio" name="rain_before_sampling" value="Ya" checked
                                                    id="rain1">
                                                <label style="font-size: 12px" for="rain1">Ya
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="rain_before_sampling" value="Tidak"
                                                    id="rain2">
                                                <label style="font-size: 12px" for="rain2">Tidak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            {{-- end sebelum sampling --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">Rain During Sampling
                                        </label>
                                        <div class="col-sm-7">
                                            <div class="icheck-success d-inline col-sm-7">
    
                                                <input type="radio" name="rain_during_sampling"
                                                    checked value="Ya" id="rainSampling1">
                                                <label style="font-size: 12px"
                                                    for="rainSampling1">Ya
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline">
    
                                                <input type="radio" name="rain_during_sampling"
                                                    @error('rain_during_sampling') checked @enderror
                                                    value="Tidak" id="rainSampling2">
                                                <label style="font-size: 12px"
                                                    for="rainSampling2">Tidak
                                                </label>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end saat sampling --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">Oil Layer
                                        </label>
                                        <div class="col-sm-7">
                                            <div class="icheck-success d-inline col-sm-7">
                                                <input type="radio" name="oil_layer" value="Tidak"
                                                    checked id="oilLayer1">
                                                <label style="font-size: 12px" for="oilLayer1">Ya
                                                </label>
                                            </div>
                                            <div class="icheck-success d-inline">
                                                <input type="radio" name="oil_layer" value="Tidak"
                                                    id="oilLayer2">
                                                <label style="font-size: 12px" for="oilLayer2">Tidak
                                                </label>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end lapisan minyak --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">Sources of Pollutants
                                        </label>
                                        <div class="col-sm-7">
                                            <input name="source_pollution" type="text"
                                                class="form-control form-control-sm @error('source_pollution') is-invalid @enderror"
                                                value="{{ old('source_pollution') }}" />
                                            @error('source_pollution')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- sumber pencemaran --}}
                            
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">Sampler</label>
                                        <div class="col-sm-7">
                                            <input name="sampler" type="text"
                                                class="form-control form-control-sm @error('sampler') is-invalid @enderror"
                                                value="{{ old('sampler') }}" />
                                            @error('sampler')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            {{-- end sampler --}}
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <label style="font-size: 12px"
                                            class="col-sm-4 col-form-label">Remarks</label>
                                        <div class="col-sm-7">
                                            <input name="remarks" type="text"
                                                class="form-control form-control-sm @error('remarks') is-invalid @enderror"
                                                value="{{ old('remarks') }}" />
                                            @error('remarks')
                                                <span
                                                    class=" invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            <!-- /.form-group -->
                            </div>
                        </div>
                        <!-- /.row -->
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit"
                                class="btn bg-gradient-primary btn-sm ">Create</button>
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
