<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Adminto - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Coderthemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="assets/images/favicon.ico" rel="shortcut icon">

    <link type="text/css" href="{{ asset('dashboard/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('dashboard/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('dashboard/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('dashboard/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css') }}" rel="stylesheet" />

    <link type="text/css" href="{{ asset('dashboard/assets/libs/quill/quill.core.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('dashboard/assets/libs/quill/quill.snow.css') }}" rel="stylesheet" />

    <link href="{{ asset('dashboard/assets/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('dashboard/assets/js/config.js') }}"></script>
    <link id="app-style" type="text/css" href="{{ asset('dashboard/assets/css/app.min.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('dashboard/assets/css/icons.min.css') }}" rel="stylesheet" />
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        @include('authors.partials._TopNav')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('authors.partials._SideNav')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    @yield('content')

                </div> <!-- container-fluid -->

            </div> <!-- content -->
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <script src="{{ asset('dashboard/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/feather-icons/feather.min.js') }}"></script>

    <script src="{{ asset('dashboard/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/pages/datatables.init.js') }}"></script>

    <script src="{{ asset('dashboard/assets/libs/quill/quill.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/pages/form-quilljs.init.js') }}"></script>

    <script src="{{ asset('dashboard/assets/libs/dropify/js/dropify.min.js') }}"></script>

    <script src="{{ asset('dashboard/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/morris.js06/morris.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/app.js') }}"></script>

</body>

</html>
