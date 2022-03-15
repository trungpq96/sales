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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;" style="text-decoration: none">Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a style="text-decoration: none" href="{{route('lst_payment')}}">List Payment</a></li>
          </ol>        
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <form class="card-body" action="{{route('search_payment')}}"; method="GET" role="search">
          {{ csrf_field() }}
            <div class="input-group input-group-outline">
              <!-- <label class="form-label">Search ...</label> -->
              <input type="text" id="search_payment" name="search_payment" placeholder="Search..." class="form-control" style="border-radius: 6px;" />
              <button type="submit" style="border: none; margin-left: -35px;background-color: #F0F2F5;"><i class="fas fa-search"></i></button>
            </div>
            </form>
          </div>
        @include('admin.nav')
        </div>
      </div>
    </nav>
    <hr>
    <!-- End Navbar -->
    <!-- Content -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
        <div class="col-12">
              @if(session('message'))
              <div class="col-offset-5 col-12 alter alter-success "
                  style="margin-top: -30px;color: #52AC56;font-size: 20px;font-style: italic;margin-left:45%">
                  {{session('message')}}
              </div>
              @endif
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 row">
                  <div class="col-sm-8 col-lg-8"  >
                  <h6 class="text-white text-capitalize ps-3">List Payment</h6>
                  </div>
                  <div class="col-sm-4 col-lg-4 row">
                  <div class="col-sm-10 col-lg-10">               
                  </div>
                  <div class="col-sm-2 col-lg-2">
                    <a href="{{route('g_crt_payment')}}"><i class="fas fa-plus-circle btn_prd_css"></i></a>
                  </div>
                  </div>   
                </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">               
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>                   
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name Payment</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Create Date</th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>                
                  @foreach($payment as $pm)                 
                    <tr>
                      <td>{{$pm->row}}</td>
                      <td>{{$pm->name_payment}}</td>
                      <td>{{$pm->description}}</td>                 
                      <td class="align-middle text-center text-sm">
                      @if($pm->status == 'Active')
                        <span class="badge badge-sm bg-gradient-success">{{$pm->status}}</span>
                      @else
                        <span class="badge badge-sm bg-gradient-danger">{{$pm->status}}</span>
                      @endif             
                      </td>  
                      <td>{{$pm->created_at}}</td>                   
                      <td><a href="{{route('g_edit_payment',$pm->id)}}" ><i class="fas fa-edit"></i></a></td>
                      <td><a href="delPayment/{{$pm->id}}" onclick="return confirm ('Are you sure towant to delete it ?')" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a></td>
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
      <div class="pagination">{{$payment->links()}}</div>
      <br>
      @include('admin.footer')
    </div>
    <!-- End Content -->
  </main>
  
  @include('admin.fixedplugin')
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>

<!-- <script src="./assets/js/sales/master.js"></script> -->
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
  <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
  @else
  @endif
</body>

</html>