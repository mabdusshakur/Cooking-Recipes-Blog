<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Admin Dashboard Template</title>
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

    <link href="{{ asset('assets/jquery.dataTables.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/jquery.dataTables.min.js') }}"></script>

    <link href="{{ asset('dashboard/assets/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('dashboard/assets/js/config.js') }}"></script>
    <link id="app-style" type="text/css" href="{{ asset('dashboard/assets/css/app.min.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('dashboard/assets/css/icons.min.css') }}" rel="stylesheet" />
           
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');

        axios.interceptors.response.use(function (response) {
            return response;
        }, function (error) {
            if (error.response && error.response.status === 401) {
                localStorage.removeItem('user');
                localStorage.removeItem('token');
                window.location.href = '{{route('front.auth.sign-in')}}';
            }
            return Promise.reject(error);
        });
    </script>
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        @include('admin.partials._TopNav')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.partials._SideNav')
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


    <script src="{{ asset('dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/feather-icons/feather.min.js') }}"></script>


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
