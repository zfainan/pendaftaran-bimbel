<!DOCTYPE html>
<html lang="id">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- plugins:css -->
        <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="/assets/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.min.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="/assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="/assets/images/favicon.png" />

        @vite(['resources/js/app.js'])

        @yield('head')
    </head>

    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <nav aria-label="main_nav"
                class="navbar default-layout-navbar col-lg-12 col-12 fixed-top d-flex flex-row p-0">
                <div class="navbar-brand-wrapper d-flex align-items-center justify-content-start text-center">
                    <a class="navbar-brand brand-logo" href="/"><img src="/assets/images/logo.svg"
                            alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="/"><img src="/assets/images/logo-mini.svg"
                            alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="nav-profile-img">
                                    <img src="/assets/images/faces/face1.jpg" alt="image">
                                    <span class="availability-status online"></span>
                                </div>
                                <div class="nav-profile-text">
                                    <p class="mb-1 text-black">{{ auth()->user()->userable->nama }}</p>
                                </div>
                            </a>
                            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="mdi mdi-logout text-primary me-2"></i> Signout
                                    </button>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item d-none d-lg-block full-screen-link">
                            <a class="nav-link">
                                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                            </a>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                <nav aria-label="sidebar" class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item nav-profile">
                            <a href="#" class="nav-link">
                                <div class="nav-profile-image">
                                    <img src="/assets/images/faces/face1.jpg" alt="profile" />
                                    <span class="login-status online"></span>
                                    <!--change to offline or busy as needed-->
                                </div>
                                <div class="nav-profile-text d-flex flex-column">
                                    <span
                                        class="font-weight-bold mb-2">{{ explode(' ', auth()->user()->userable->nama)[0] }}</span>
                                    <span class="text-secondary text-small">{{ auth()->user()->role }}</span>
                                </div>
                                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                            </a>
                        </li>

                        @if (auth()->user()->userable instanceof App\Models\Admin)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">
                                    <span class="menu-title">Dashboard</span>
                                    <i class="mdi mdi-home menu-icon"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('registrations.index') }}">
                                    <span class="menu-title">Registrasi</span>
                                    <i class="mdi mdi-contacts menu-icon"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#side-master-data"
                                    aria-expanded="false" aria-controls="side-master-data">
                                    <span class="menu-title">Master Data</span>
                                    <i class="menu-arrow"></i>
                                    <i class="mdi mdi-table-large menu-icon"></i>
                                </a>
                                <div class="collapse" id="side-master-data">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('programs.index') }}">Program</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('students.index') }}">Siswa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admins.index') }}">Admin</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('branches.index') }}">Cabang</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('student.home') }}">
                                    <span class="menu-title">Home</span>
                                    <i class="mdi mdi-home menu-icon"></i>
                                </a>
                            </li>
                        @endif

                    </ul>
                </nav>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="container">

                            @yield('page-header')

                            @yield('content')

                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-sm-left d-block d-sm-inline-block text-center">Copyright ©
                                2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All
                                rights reserved.</span>
                            <span class="float-sm-right d-block mt-sm-0 float-none mt-1 text-center">Hand-crafted &
                                made with <i class="mdi mdi-heart text-danger"></i></span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="/assets/vendors/chart.js/chart.umd.js"></script>
        <script src="/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="/assets/js/off-canvas.js"></script>
        <script src="/assets/js/misc.js"></script>
        <script src="/assets/js/settings.js"></script>
        <script src="/assets/js/todolist.js"></script>
        <script src="/assets/js/jquery.cookie.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="/assets/js/dashboard.js"></script>
        <!-- End custom js for this page -->

        @yield('script')
    </body>

</html>
