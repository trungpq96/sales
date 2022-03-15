@include('admin.header')

<body class="g-sidenav-show  bg-gray-200">
    @include('admin.menu')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Admin</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Send Mail</li>
                    </ol>
                </nav>
                @include('admin.nav')
            </div>
        </nav>
        <hr>
        <!-- End Navbar -->
        <!-- Content -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Send Mail</h6>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-6 my-0" style="margin-top: -5% !important;">
                                <form action="{{route('sendMailAttach')}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="mb-3 mt-3">
                                        <label for="email_to" class="form-label">Email To : </label>
                                        <input type="email" class="form-control" id="email_to" placeholder="email to" name="email_to">
                                    </div>
                                    <div class="mb-3 mt-3">Title Mail : </label>
                                        <input type="text" class="form-control" id="email_title" placeholder="Title Mail" name="email_title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="contend_mail" class="form-label">Content mail : </label>
                                        <textarea class="form-control" rows="5" id="contend_mail" name="contend_mail" placeholder="Contend Mail"></textarea>
                                    </div>
                                    <div class="mb-3 mt-3">Signature : </label>
                                        <input type="signature" class="form-control" id="signature" placeholder="Signature" name="signature">
                                    </div>
                                    <div class="col-lg-4 mb-3 mt-3 ">
                                        <label for="file" class="form-label">File Attach : </label><br>
                                        <input type="file" name="file">
                                    </div>
                                    <button type="submit" onclick="return confirm ('Are you sure to want to send mail it ?')" data-toggle="tooltip" class="btn bg-gradient-primary w-20 my-4 mb-2">Send Mail</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.footer')
        </div>
        <!-- End Content -->
    </main>

    @include('admin.fixedplugin')
    <!--   Core JS Files   -->
    <script src="./public/assets/js/core/popper.min.js"></script>
    <script src="./public/assets/js/core/bootstrap.min.js"></script>
    <script src="./public/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./public/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./public/assets/js/plugins/chartjs.min.js"></script>

    <!-- <script src="./public/assets/js/sales/master.js"></script> -->
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./public/assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>