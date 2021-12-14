<!DOCTYPE html>
<html lang="en">

<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

        <!-- Favicon -->
		<link rel="icon" href="/assets/img/brand/favicon.ico" type="image/x-icon"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RCL | Lesson Learned</title>

		<!-- Bootstrap css-->
		<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

		<!-- Icons css-->
		<link href="/assets/plugins/web-fonts/icons.css" rel="stylesheet"/>
		<link href="/assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
		<link href="/assets/plugins/web-fonts/plugin.css" rel="stylesheet"/>

        <!-- For Image upload -->
        <link href="/assets/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
        <!-- Lightbox css -->
        <link href="/assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />

		<!-- Style css-->
		<link href="/assets/css/style/style.css" rel="stylesheet">
		<link href="/assets/css/skins.css" rel="stylesheet">
		<link href="/assets/css/dark-style.css" rel="stylesheet">
		<link href="/assets/css/colors/default.css" rel="stylesheet">
        <link href="/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<link href="/assets/css/prevent.css" rel="stylesheet">

		<!-- Color css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="/assets/css/colors/color.css">

		<!-- Select2 css-->
        <link href="/assets/plugins/select2/select2.min.css" rel="stylesheet">


             	<!-- InternalFileupload css-->
		<link href="/assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css"/>

		<!-- InternalFancy uploader css-->
		<link href="/assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />

		<!-- Sidemenu css-->
		<link href="/assets/css/sidemenu/sidemenu.css" rel="stylesheet">

		<!-- Switcher css-->
		<link href="/assets/switcher/css/switcher.css" rel="stylesheet">
		<link href="/assets/switcher/demo.css" rel="stylesheet">

        <style>
            pre {
              margin: 20px 0;
              padding: 20px;
              background: #fafafa;
            }
            .round { border-radius: 60%; }
            @media all and (min-width: 480px) {
                .deskContent {display:block;}
                .phoneContent {display:none;}
            }
            @media all and (max-width: 479px) {
                .deskContent {display:none;}
                .phoneContent {display:block;}
            }
        </style>

        @livewireStyles
	</head>

	<body class="main-body leftmenu">



		<!-- Loader -->
		<div id="global-loader">
			<img src="/assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
        <!-- End Loader -->

		<!-- Page -->
		<div class="page">

        <!-- Sidemenu -->
                @include('layouts.includes.sidebar')
                <!-- End Sidemenu -->        <!-- Main Header-->
                @include('layouts.includes.header')

			<!-- End Main Header-->		<!-- Mobile-header -->
            @include('layouts.includes.mobile-nav')
			<!-- Mobile-header closed -->
			<!-- Main Content-->
			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">


                        @yield('content')
                        @include('sweetalert::alert')
                        @include('layouts.includes.sweet-alert')



					</div>
				</div>
			</div>
			<!-- End Main Content-->

		<!-- Main Footer-->
        <div class="main-footer text-center d-print-none">
            <div class="container">
                <div class="row row-sm">
                    <div class="col-md-12">
                        <span>Copyright © 2021 | Coded by <a href="https://joreb.net/">Jorem Belen</a> All rights reserved.</span>
                    </div>
                </div>
            </div>
        </div>
			<!--End Footer-->				<!-- Sidebar -->

			<!-- End Sidebar -->
		</div>
        <!-- End Page -->

        <!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="fe fe-arrow-up d-print-none"></i></a>



		<!-- Jquery js-->
		<script src="/assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap js-->
		<script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Select2 js-->
		<script src="/assets/plugins/select2/select2.min.js"></script>

		<!-- Perfect-scrollbar js -->
		<script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

		<!-- Sidemenu js -->
		<script src="/assets/plugins/sidemenu/sidemenu.js"></script>

		<!-- Sidebar js -->
		<script src="/assets/plugins/sidebar/sidebar.js"></script>

        	<!-- Internal Fileuploads js-->
		<script src="/assets/plugins/fileuploads/js/fileupload.js"></script>
        <script src="/assets/plugins/fileuploads/js/file-upload.js"></script>

		<!-- Internal Data Table js -->
        <script src="/assets/plugins/datatable/jquery.dataTables.min.js"></script>
        <script src="/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
        <script src="/assets/plugins/datatable/dataTables.responsive.min.js"></script>
        <script src="/assets/plugins/datatable/fileexport/dataTables.buttons.min.js"></script>
        <script src="/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js"></script>
        <script src="/assets/plugins/datatable/fileexport/jszip.min.js"></script>
        <script src="/assets/plugins/datatable/fileexport/pdfmake.min.js"></script>
        <script src="/assets/plugins/datatable/fileexport/vfs_fonts.js"></script>
        <script src="/assets/plugins/datatable/fileexport/buttons.html5.min.js"></script>
        <script src="/assets/plugins/datatable/fileexport/buttons.print.min.js"></script>
        <script src="/assets/plugins/datatable/fileexport/buttons.colVis.min.js"></script>
        <script src="/assets/js/table-data.js"></script>

        <!-- Magnific Popup-->
        <script src="/assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
        <!-- lightbox init js-->
        <script src="/assets/js/plugins/lightbox.init.js"></script>

		<!-- Sticky js -->
		<script src="/assets/js/sticky.js"></script>

		<!-- Custom js -->
		<script src="/assets/js/custom.js"></script>
		<script src="/assets/js/prevent.js"></script>

		<!-- Switcher js -->
		<script src="/assets/switcher/js/switcher.js"></script>

        <script src="/assets/plugins/counters/jquery.missofis-countdown.js"></script>
        <script src="/assets/plugins/counters/counterup.min.js"></script>
        <script src="/assets/plugins/counters/waypoints.min.js"></script>
        <script src="/assets/plugins/counters/counter.js"></script>

        <script type="text/javascript" src="/vendor/jsvalidation/js/jsvalidation.js"></script>
        {!! JsValidator::formRequest('App\Http\Requests\LessonStoreRequest', '#lesson-create'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\UserStoreRequest', '#create-user'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\UserUpdateRequest', '#update-user'); !!}

        <script>
            $(document).ready(function() {
            $('.basic').select2();
        });
        </script>

        <script>
            $('#category').on('change', function() {
                if($(this).val() === 'Positive') {
                    $('.riskLevel').hide();
                } else {
                    $('.riskLevel').show();
                }
        });
        </script>

        @livewireScripts
	</body>

</html>
