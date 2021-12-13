
<!doctype html>
<html lang="en">

<head>

        <meta charset="utf-8" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>RCL | Lesson Learned</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        {{-- <link rel="shortcut icon" href="/assets/images/favicon.ico"> --}}
        <link rel="icon" type="image/png" href="/landingPage/assets/img/seo/favicon.png">

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- DataTables -->
        <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />



        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
        {{-- <link href="/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
        <link href="/assets/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css"> --}}
        <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

        <!-- For Image upload -->
        <link href="/assets/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
        <!-- Lightbox css -->
        <link href="/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
        <!-- Select2 css-->
        <link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="/assets/css/prevent.css" rel="stylesheet">

        <livewire:styles />

        <style>

            @media all and (min-width: 480px) {
                .deskContent {display:block;}
                .phoneContent {display:none;}
            }

            @media all and (max-width: 479px) {
                .deskContent {display:none;}
                .phoneContent {display:block;}
            }
            .text-justify {
                text-align: justify;
            }
         </style>

    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


            <header id="page-topbar">
                @include('layouts.includes.header')
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                        @include('layouts.includes.sidebar')
                        @include('layouts.includes.sweet-alert')
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                            @yield('content')
                            @include('sweetalert::alert')

                        <!-- end page title -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © RCLCD-IT.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by <a href="https://joreb.net" target="_blank" rel="noopener noreferrer">Jorem Belen</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="/assets/libs/jquery/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        {{-- <script src="/assets/js/scrollspyNav.js"></script>
        <script src="/assets/plugins/apex/apexcharts.min.js"></script>
        <script src="/assets/plugins/apex/custom-apexcharts.js"></script> --}}
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

        <!-- Select2 js-->
        <script src="/assets/libs/select2/js/select2.min.js"></script>

          <!-- Magnific Popup-->
          <script src="/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
        <!-- lightbox init js-->
        <script src="/assets/js/pages/lightbox.init.js"></script>

        <!-- Required datatable js -->
        <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="/assets/libs/jszip/jszip.min.js"></script>
        <script src="/assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="/assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <script src="/assets/js/prevent.js"></script>

        <!-- Responsive examples -->
        <script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <!-- Datatable init js -->
        <script src="/assets/js/pages/datatables.init.js"></script>



        <script src="/assets/js/app.js"></script>

        <!-- Laravel Javascript Validation -->
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
        {!! JsValidator::formRequest('App\Http\Requests\LessonStoreRequest', '#lesson-create'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\UserStoreRequest', '#create-user'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\UserUpdateRequest', '#update-user'); !!}

        <script>
            $('#category').on('change', function() {
                if($(this).val() === 'Positive') {
                    $('.riskLevel').hide();
                } else {
                    $('.riskLevel').show();
                }
         });
        </script>

        {{-- <script>
            var ss = $(".basic").select2({
        });
        </script> --}}

        <script>
            $(document).ready(function() {
            $('.basic').select2();
        });
        </script>


        @yield('script')

        <livewire:scripts />
    </body>

</html>
