<!DOCTYPE html>
<html lang="en">

<!-- Header -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        .nav-link{
            color: #5c5c5c !important;
        }
    </style>
    @yield('css')
</head>

<body id="page-top" style="height: 100vh;">

    <!-- Page Wrapper -->
    <div id="wrapper" style="height: 100vh;">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('web.components.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <section style="border-bottom: solid 1px rgb(138, 138, 138, 0.5);">
                <div class="container mb-4">
                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <img src="https://beta.voffice.co.id/images/logo/voffice-google-partner-350.png" class="img img-fluid d-flex" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-none d-md-block">
                            <div class="row">
                                <div class="col-6 col-md-12">
                                    <h4 class="text-lg">vOffice Headquarter</h4>
                                    <p style="font-size: 0.9rem;">
                                        <i class="fas fa-fw fa-map-marker-alt"></i> Centennial Tower Level 29, Jl. Jend Gatot Suboto No.27, RT.2/RW.2, Karet Semanggi, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950
                                    </p>
                                    <p style="font-size: 0.9rem;">
                                        <i class="fas fa-fw fa-phone"></i> +62 21 2922 2999
                                    </p>
                                    <p style="font-size: 0.9rem;">
                                        <i class="fas fa-fw fa-envelope"></i> <a href="mailto:cs@voffice.co.id">cs@voffice.co.id</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <ul style="list-style: none;" class="pl-0">
                                <li>
                                    Philippines&nbsp;:
                                    <a href="http://voffice.com.ph/">
                                        Virtual Office Manila
                                    </a>
                                    |
                                    <a href="http://voffice.com.ph/">
                                        Virtual Office Makati
                                    </a>
                                    |
                                    <a href="http://voffice.com.ph/">
                                        Virtual
                                        Office BGC
                                    </a>
                                </li>
                                <li>
                                    Malaysia&nbsp;:
                                    <a href="http://voffice.com.my/">
                                        Virtual Office Kuala Lumpur
                                    </a>
                                    |
                                    <a href="http://voffice.com.my/">
                                        Virtual Office Selangor
                                    </a>
                                </li>
                                <li>
                                    Indonesia&nbsp;:
                                    <a href="http://voffice.co.id/" target="_blank">
                                        Virtual Office
                                        Jakarta
                                    </a>
                                    |
                                    <a href="http://surabayavirtualoffice.com/" target="_blank">
                                        Virtual Office
                                        Surabaya
                                    </a>
                                    |
                                    <a href="http://balivirtualoffice.com/" target="_blank">
                                        Virtual Office Bali
                                    </a>
                                </li>
                                <li>
                                    Singapore :
                                    <a href="http://instantoffice.sg/">
                                        Singapore Virtual Office
                                    </a>
                                </li>
                                <li>
                                    Australia&nbsp;:
                                    <a href="http://virtual-office.com.au/">
                                        Virtual Office Melbourne
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 d-block d-md-none">
                                    <h4 class="text-lg">vOffice Headquarter</h4>
                                    <p style="font-size: 0.9rem;">
                                        <i class="fas fa-fw fa-map-marker-alt"></i> Centennial Tower Level 29, Jl. Jend Gatot Suboto No.27, RT.2/RW.2, Karet Semanggi, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950
                                    </p>
                                    <p style="font-size: 0.9rem;">
                                        <i class="fas fa-fw fa-phone"></i> +62 21 2922 2999
                                    </p>
                                    <p style="font-size: 0.9rem;">
                                        <i class="fas fa-fw fa-envelope"></i> <a href="mailto:cs@voffice.co.id">cs@voffice.co.id</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto shadow">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Khairunnisa X vOffice 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('sbadmin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('sbadmin/js/sb-admin-2.min.js') }}"></script>
    @yield('js')
</body>

</html>
