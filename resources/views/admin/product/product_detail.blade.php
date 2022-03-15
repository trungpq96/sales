@include('admin.header')
<body class="g-sidenav-show  bg-gray-200">
  @if(Auth::check())
  @include('admin.menu')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Product Detail</li>
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
                <div>
                  <h6 class="text-white text-capitalize ps-3">Product Detail </h6>
                </div>

              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-5" style="margin-top: -3% !important;">
                <br>
                <div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Desception</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Specifications</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  {!!$prd_detail[0]->description!!}
                </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <table class="table table-striped">
                                        <tr><td>Name Product </td><td>{{$prd_detail[0]->name_prd}}</td></tr>
                                        <tr><td>Screen </td><td>{{$prd_detail[0]->screen}}</td></tr>
                                        <tr><td>System</td><td>{{$prd_detail[0]->system}}</td></tr>
                                        <tr><td>front</td><td>{{$prd_detail[0]->front_camera}}</td></tr>
                                        <tr><td>rear</td><td>{{$prd_detail[0]->rear_camera}}</td></tr>
                                        <tr><td>storage</td><td>{{$prd_detail[0]->storage}}</td></tr>
                                        </table>
                  </div>
                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
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
  @else
  @endif
</body>

</html>