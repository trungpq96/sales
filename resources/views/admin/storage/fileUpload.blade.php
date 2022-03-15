@include('admin.header')
<body class="g-sidenav-show  bg-gray-200">
    @include('admin.menu')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
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
                                <h6 class="text-white text-capitalize ps-3">Storage</h6>
                            </div>
                        </div>
    <div class="panel panel-primary">
        <br>
      <div class="panel-body">
      @if (session()->has('success'))
    <div class="alert alert-success">
        @if(is_array(session('success')))
            <ul>
                @foreach (session('success') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @else
            {{ session('success') }}
        @endif
    </div>
    @endif
  
        <form action="{{ route('file_upload_post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
  
                <div class="col-md-6">
                    <input type="file" name="file" class="form-control">
                </div>
   
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
   
            </div>
        </form>


        <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr> 
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name File</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($filesArr as $file)
                     <tr>
                         <td>{{$file['row_no']}}</td>
                        <td><a href="{{route('download',$file['fileName'])}}">{{$file['fileName']}}</a></td>             
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
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