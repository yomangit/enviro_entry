<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $tittle }}</title>
    <style>
    a{
        cursor: pointer;
    }
</style>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/cylinder.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>

    <!-- Highchart
	<script src="assets/plugins/highcharts/js/highcharts.js"></script>
	<script src="assets/plugins/highcharts/js/highcharts-more.js"></script>
	<script src="assets/plugins/highcharts/js/variable-pie.js"></script>
	<script src="assets/plugins/highcharts/js/solid-gauge.js"></script>
	<script src="assets/plugins/highcharts/js/highcharts-3d.js"></script>
	<script src="assets/plugins/highcharts/js/cylinder.js"></script>
	<script src="assets/plugins/highcharts/js/funnel3d.js"></script>
	<script src="assets/plugins/highcharts/js/exporting.js"></script>
	<script src="assets/plugins/highcharts/js/export-data.js"></script>
	<script src="assets/plugins/highcharts/js/accessibility.js"></script>
	<script src="assets/plugins/highcharts/js/highcharts-custom.script.js"></script>
	<script src="assets/plugins/highcharts/js/highcharts.js"></script> -->
    <!-- Google Font: Source Sans Pro -->
    <link href="/assets/fontawsome/css/fontawesome.css" rel="stylesheet">
    <link href="/assets/fontawsome/css/brands.css" rel="stylesheet">
    <link href="/assets/fontawsome/css/solid.css" rel="stylesheet">
    <link href="/assets/fontawsome/css/all.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <!-- BS Stepper -->
    <link rel="stylesheet" href="/assets/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="/assets/plugins/dropzone/min/dropzone.min.css">
    <link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="/assets/plugins/highcharts/darkunica.css">
	<link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="/assets/plugins/tabledata/table.min.css"> -->

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">  
    <link rel="stylesheet" href="/assets/dist/css/data.css">  
<script src="https://kit.fontawesome.com/42d701198b.js" crossorigin="anonymous"></script>
@stack('styles')
</head>

<body class="sidebar-mini layout-fixed  accent-olive layout-navbar-fixed text-sm sidebar-mini-xs ">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('dashboard.layouts.header')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('dashboard.layouts.sidebar')
        @yield('container')
        
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
   @stack('scripts')
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/dist/js/adminlte.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="/assets/dist/js/pages/dashboard3.js"></script>
    <!-- Select2 -->
    <script src="/assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="/assets/plugins/moment/moment.min.js"></script>
    <script src="/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="/assets/plugins/dropzone/min/dropzone.min.js"></script>
    
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="/assets/plugins/chart.js/Chart.min.js"></script>
    <script src="/assets/plugins/toastr/toastr.min.js"></script>
    <script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/assets/plugins/jszip/jszip.min.js"></script>
    <script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "paging": false,
                "info": false,
                "autoWidth": true,
                "searching": false
                
            });
            $('#example2').DataTable({
                "responsive": true,
                "lengthChange": false,
                "paging": false,
                "info": false,
                "autoWidth": true,
                "searching": false
            });
            $('#example3').DataTable({
                "responsive": true,
                "lengthChange": false,
                "paging": false,
                "info": false,
                "autoWidth": true,
                "searching": false
            });
            $('#example4').DataTable({
                "responsive": true,
                "lengthChange": false,
                "paging": false,
                "info": false,
                "autoWidth": true,
                "searching": false
            });
            $('#example5').DataTable({
                "responsive": true,
                "lengthChange": false,
                "paging": false,
                "info": false,
                "autoWidth": true,
                "searching": false
            });
            $('#example6').DataTable({
                "responsive": true,
                "lengthChange": false,
                "paging": false,
                "info": false,
                "autoWidth": true,
                "searching": false
            });
            $('#example7').DataTable({
                "responsive": true,
                "lengthChange": false,
                "paging": false,
                "info": false,
                "autoWidth": true,
                "searching": false
            });
            $('#example8').DataTable({
                "responsive": true,
                "lengthChange": false,
                "paging": false,
                "info": false,
                "autoWidth": true,
                "searching": false
            });
        });
    </script>
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
                $('#reservationdate').datetimepicker({
                    format: 'YYYY/MM/DD'
                });
                $('#reservationdate1').datetimepicker({
                    format: 'YYYY/MM/DD'
                }); 
                $('#reservationdate4').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
                $('#reservationdate5').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
                $('#reservationdate6').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
                $('#reservationdate7').datetimepicker({
                    format: 'DD-MMM-YYYY'
                });
                $('#reservationdate8').datetimepicker({
                    format: 'DD-MMM-YYYY'
                });
                $('#reservationdate9').datetimepicker({
                    format: 'DD-MMM-YYYY'
                });
                $('#reservationdate11').datetimepicker({
                    format: 'DD-MMM-YYYY'
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
        
 @yield('footer')

    <!-- Page specific script -->

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
/*  show 1 - hide 1  */

$('.show-1-yes').click(function() {
    $('#target-1').show(500);
    $('.show-1-yes').hide(0);
    $('.hide-1-yes').show(0);
});
$('.hide-1-yes').click(function() {
    $('#target-1').hide(500);
    $('.show-1-yes').show(0);
    $('.hide-1-yes').hide(0);
});



/*  show 2 - hide 2  */

$('.show-2-yes').click(function() {
    $('#target-2').show(500);
    $('.show-2-yes').hide(0);
    $('.hide-2-yes').show(0);
});
$('.hide-2-yes').click(function() {
    $('#target-2').hide(500);
    $('.show-2-yes').show(0);
    $('.hide-2-yes').hide(0);
});





</script>
</body>

</html>
